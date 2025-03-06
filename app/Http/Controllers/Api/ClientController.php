<?php

namespace App\Http\Controllers\Api;

use App\Models\Client;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\SubscriptionPlan;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('subscription.active')->only(['index','create', 'store', 'destroy']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $clients = Client::where('tailor_id', $request->user()->id)
            ->orderByDesc('id')
            ->get();

        return response()->json([
            'status' => true,
            'message' => 'Clients retrieved successfully',
            'data' => ['clients' => $clients]
        ], Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'measure' => 'nullable|array',
            'note' => 'nullable|string',
        ]);

        $client = Client::create([
            'tailor_id' => $request->user()->id,
            'name' => $request->name,
            'phone' => $request->phone,
            'measure' => $request->measure,
            'note' => $request->note,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Client created successfully',
            'data' => ['client' => $client]
        ], Response::HTTP_CREATED);
    }


    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        return response()->json([
            'status' => true,
            'message' => 'Client retrieved successfully',
            'data' => ['client' => $client]
        ], Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        if ($client->tailor_id !== $request->user()->id) {
            return response()->json([
                'status' => false,
                'message' => 'Unauthorized action'
            ], Response::HTTP_FORBIDDEN);
        }

        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'phone' => 'sometimes|required|string|max:20',
            'measure' => 'nullable|array',
            'note' => 'nullable|string',
        ]);

        $client->update($request->only(['name', 'phone', 'measure', 'note']));

        return response()->json([
            'status' => true,
            'message' => 'Client updated successfully',
            'data' => ['client' => $client]
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Client $client)
    {
        if ($client->tailor_id !== $request->user()->id) {
            return response()->json([
                'status' => false,
                'message' => 'Unauthorized action'
            ], Response::HTTP_FORBIDDEN);
        }

        $client->delete();

        return response()->json([
            'status' => true,
            'message' => 'Client deleted successfully'
        ], Response::HTTP_OK);
    }
    public function renew_subscription(Request $request)
    {
        $request->validate([
            'subscription_plan_id' => ['required', 'exists:subscription_plans,id'],
        ]);

        $userId = $request->user()->id;
        $subscriptionPlan = SubscriptionPlan::findOrFail($request->subscription_plan_id);

        DB::beginTransaction();
        try {
            // Get the user's active or latest subscription
            $existingSubscription = Subscription::where('tailor_id', $userId)
                ->where('subscription_plan_id', $subscriptionPlan->id)
                ->latest('end_date')
                ->first();

            if ($existingSubscription && $existingSubscription->end_date->isFuture()) {
                // If the existing subscription is still active, extend it
                $existingSubscription->update([
                    'end_date' => $existingSubscription->end_date->addMonths($subscriptionPlan->duration),
                ]);
                $subscription = $existingSubscription;
                $message = 'Subscription extended successfully';
            } else {
                // If no active subscription or expired, create a new one
                $subscription = Subscription::create([
                    'tailor_id' => $userId,
                    'subscription_plan_id' => $subscriptionPlan->id,
                    'start_date' => now(),
                    'end_date' => now()->addMonths($subscriptionPlan->duration),
                    'status' => 'active',
                ]);
                $message = 'Subscription renewed successfully';
            }

            DB::commit();

            return response()->json([
                'status' => true,
                'message' => $message,
                'data' => ['subscription' => $subscription]
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => false,
                'message' => 'Failed to renew subscription',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}

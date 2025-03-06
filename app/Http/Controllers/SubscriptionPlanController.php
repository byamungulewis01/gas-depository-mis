<?php

namespace App\Http\Controllers;

use App\Models\SubscriptionPlan;
use Illuminate\Http\Request;

class SubscriptionPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $collection = SubscriptionPlan::all();
        return view('admin.subscription-plan', compact('collection'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:2|max:255',
            'price' => 'required|numeric|min:0',
            'duration' => 'required|numeric|min:1',
            'status' => 'required|in:active,inactive',
            'description' => 'nullable|string|min:2|max:255',
            'is_free_plan' => 'nullable',
        ]);
        $request->merge(['is_free_plan' => $request->has('is_free_plan') ? 1 : 0]);
        SubscriptionPlan::create($request->all());
        return back()->with('success', 'Subscription plan created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(SubscriptionPlan $subscription_plan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubscriptionPlan $subscription_plan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SubscriptionPlan $subscription_plan)
    {
        $request->validate([
            'name' => 'required|string|min:2|max:255',
            'price' => 'required|numeric|min:0',
            'duration' => 'required|numeric|min:1',
            'status' => 'required|in:active,inactive',
            'description' => 'nullable|string|min:2|max:255',
            'is_free_plan' => 'nullable',
        ]);
        $request->merge(['is_free_plan' => $request->has('is_free_plan') ? 1 : 0]);
        $subscription_plan->update($request->all());
        return back()->with('success', 'Subscription plan updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubscriptionPlan $subscription_plan)
    {
        $subscription_plan->delete();
        return back()->with('success', 'Subscription plan deleted successfully');
    }

    public function plan_list(Request $request)
    {
        $nonFreeOnly = $request->query('non_free', false);

        $plans = SubscriptionPlan::when($nonFreeOnly, function ($query) {
            return $query->where('is_free_plan', false);
        })->get();

        return response()->json([
            'status' => true,
            'message' => 'Subscription plans fetched successfully',
            'data' => $plans
        ]);
    }

}

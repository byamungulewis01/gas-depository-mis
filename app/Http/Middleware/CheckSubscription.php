<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Subscription;

class CheckSubscription
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'Unauthorized'
            ], Response::HTTP_UNAUTHORIZED);
        }

        // Check if the user has an active subscription
        $activeSubscription = Subscription::where('tailor_id', $user->id)
            ->where('end_date', '>', now()) // Ensure the subscription is still valid
            ->exists();

        if (!$activeSubscription) {
            return response()->json([
                'status' => false,
                'message' => 'Your subscription has expired. Please renew your subscription.'
            ], Response::HTTP_FORBIDDEN);
        }

        return $next($request);
    }
}

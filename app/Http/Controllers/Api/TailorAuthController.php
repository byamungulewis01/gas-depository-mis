<?php

namespace App\Http\Controllers\Api;

use App\Models\Tailor;
use Illuminate\Http\Request;
use App\Mail\PasswordResetMail;
use App\Models\SubscriptionPlan;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Subscription;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class TailorAuthController extends Controller
{
    /**
     * Register a new tailor
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */


    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:tailors'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone' => ['required', 'string', 'max:20', 'unique:tailors'],
            'address' => ['required', 'string', 'max:255'],
            'subscription_plan_id' => ['required', 'exists:subscription_plans,id'],
            'device_name' => ['required', 'string']
        ]);

        try {
            DB::beginTransaction();

            // Create tailor account
            $tailor = Tailor::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
                'phone' => $validated['phone'],
                'address' => $validated['address'],
            ]);

            // Fetch subscription plan
            $subscriptionPlan = SubscriptionPlan::findOrFail($validated['subscription_plan_id']);

            // Assign subscription to tailor
            $subscription = Subscription::create([
                'tailor_id' => $tailor->id,
                'subscription_plan_id' => $subscriptionPlan->id,
                'start_date' => now(),
                'end_date' => now()->addMonths($subscriptionPlan->duration),
                'status' => 'active',
                'is_trial' => $subscriptionPlan->is_free_plan
            ]);

            // Generate authentication token
            $token = $tailor->createToken($validated['device_name'])->plainTextToken;

            // Dispatch event for any post-registration tasks (e.g., welcome email)
            // event(new TailorRegistered($tailor));

            DB::commit();

            return response()->json([
                'status' => true,
                'message' => 'Tailor registered successfully',
                'data' => [
                    'tailor' => $tailor,
                    'subscription' => $subscription,
                    'token' => $token
                ]
            ], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => false,
                'message' => 'Registration failed',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Login a tailor
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
            'device_name' => ['required', 'string']
        ]);

        $tailor = Tailor::where('email', $request->email)->first();

        if (!$tailor || !Hash::check($request->password, $tailor->password)) {
            return response()->json([
                'status' => false,
                'message' => 'The provided credentials are incorrect.',
                'data' => null
            ], 401);
        }

        $token = $tailor->createToken($request->device_name)->plainTextToken;

        return response()->json([
            'status' => true,
            'message' => 'Login successful',
            'data' => [
                'tailor' => $tailor,
                'token' => $token
            ]
        ]);
    }

    /**
     * Logout a tailor
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        // Revoke the token that was used to authenticate the current request
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'status' => true,
            'message' => 'Logout successful',
            'data' => null
        ]);
    }

    /**
     * Get the authenticated tailor
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function me(Request $request)
    {
        return response()->json([
            'status' => true,
            'message' => 'Tailor profile retrieved successfully',
            'data' => [
                'tailor' => $request->user()->load('subscription')
            ]
        ]);
    }

    public function forgotPassword(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', 'exists:tailors,email']
        ]);

        $resetPin = str_pad(random_int(1, 999999), 6, '0', STR_PAD_LEFT);

        $tailor = Tailor::where('email', $request->email)->first();

        DB::table('password_reset_tokens')
            ->where('email', $tailor->email)
            ->delete();

        // Store the reset pin
        DB::table('password_reset_tokens')->insert([
            'email' => $tailor->email,
            'token' => Hash::make($resetPin),
            'created_at' => now()
        ]);

        // Send PIN via email using the new Markdown mailable
        Mail::to($tailor->email)->send(new PasswordResetMail($resetPin));

        return response()->json([
            'status' => true,
            'message' => 'Password reset PIN sent to your email',
            'data' => null
        ], 200);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'pin' => ['required', 'string', 'size:6'],
            'password' => ['required', 'min:8', 'confirmed']
        ]);

        // Find the password reset token
        $passwordReset = DB::table('password_reset_tokens')
            ->where('email', $request->email)
            ->first();

        // Check if token exists and is valid
        if (!$passwordReset || !Hash::check($request->pin, $passwordReset->token)) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid reset PIN',
                'data' => null
            ], 400);
        }

        // Check if PIN is expired (15 minutes)
        if (now()->diffInMinutes($passwordReset->created_at) > 15) {
            return response()->json([
                'status' => false,
                'message' => 'Reset PIN has expired',
                'data' => null
            ], 400);
        }

        // Find the tailor and update password
        $tailor = Tailor::where('email', $request->email)->first();
        $tailor->password = Hash::make($request->password);
        $tailor->save();

        // Delete the password reset token
        DB::table('password_reset_tokens')
            ->where('email', $request->email)
            ->delete();

        return response()->json([
            'status' => true,
            'message' => 'Password reset successfully',
            'data' => null
        ], 200);
    }

    /**
     * Update tailor profile
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateProfile(Request $request)
    {
        $tailor = $request->user();

        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:20', 'unique:tailors,phone,' . $tailor->id],
            'address' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:tailors,email,' . $tailor->id],
        ]);


        $tailor->fill($validatedData);

        $tailor->save();

        return response()->json([
            'status' => true,
            'message' => 'Profile updated successfully',
            'data' => [
                'tailor' => $tailor
            ]
        ]);
    }

    /**
     * Change tailor password
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function changePassword(Request $request)
    {
        $tailor = $request->user();

        $request->validate([
            'current_password' => ['required', 'string'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);

        // Check if the current password is correct
        if (!Hash::check($request->current_password, $tailor->password)) {
            return response()->json([
                'status' => false,
                'message' => 'Current password is incorrect',
                'data' => null
            ], 400);
        }

        // Update the password
        $tailor->password = Hash::make($request->password);
        $tailor->save();

        // Revoke all existing tokens
        $tailor->tokens()->delete();

        // Create a new token
        $newToken = $tailor->createToken('password-change-token')->plainTextToken;

        return response()->json([
            'status' => true,
            'message' => 'Password changed successfully',
            'data' => [
                'tailor' => $tailor,
                'token' => $newToken
            ]
        ]);
    }
}


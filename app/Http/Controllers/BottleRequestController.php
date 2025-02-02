<?php

namespace App\Http\Controllers;

use App\Models\Bottle;
use App\Models\Request as ModelsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BottleRequestController extends Controller
{
    //
    public function new_requests()
    {
        $bottles = Bottle::where('status', 'active')->get();
        return view('agent.request', compact('bottles'));
    }
    // store_requests
    public function store_requests(Request $request)
    {
        $request->validate([
            'bottle_id' => 'required|exists:bottles,id',
            'customer_name' => 'required|string',
            'customer_phone' => 'required|string',
            'customer_address' => 'required|string',
            'remaining_weight' => 'required|numeric',
            'notes' => 'nullable|string',
        ]);

        $bottle = Bottle::find($request->bottle_id);
        $request->user()->requests()->create([
            'bottle_id' => $bottle->id,
            'customer_name' => $request->customer_name,
            'customer_phone' => $request->customer_phone,
            'customer_address' => $request->customer_address,
            'remaining_weight' => $request->remaining_weight,
            'notes' => $request->notes,
            'code' => uniqid(),
        ]);

        return redirect()->route('agent.requests')->with('success', 'Request submitted successfully');
    }
    // lookup

    // my_requests
    public function my_requests(Request $request)
    {
        if ($request->status == 'picked_up') {
            $requests = ModelsRequest::where('approved_by', $request->user()->id)->orderByDesc('id')->get();
        } else {
            $requests = ModelsRequest::where('user_id', $request->user()->id)->where('status', $request->status)->orderByDesc('id')->get();
        }
        return view('agent.my-requests', compact('requests'));
    }

    public function lookup()
    {
        $requestDetails = [];
        $code = request('code') ?? "";
        if ($code) {
            $requestDetails = ModelsRequest::where('code', $code)
                ->with(['bottle', 'user'])
                ->first();
        }
        return view('agent.lookup', compact('requestDetails', 'code'));
    }

    public function request_approve($id)
    {

        $request = ModelsRequest::findOrFail($id);

        $request->update([
            'status' => 'approved',
            'approved_at' => now(),
            'approved_by' => Auth::user()->id,
        ]);

        return redirect()->back()->with('success', 'Bottle pickup submitted successfully');

    }

}

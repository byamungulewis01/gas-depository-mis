<?php

namespace App\Http\Controllers;

use App\Models\Bottle;
use Illuminate\Http\Request;

class BottleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bottles = Bottle::orderByDesc('id')->get();
        return view('admin.bottles', compact('bottles'));
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
            'amount' => 'required|numeric|min:1',
            'weight' => 'required|numeric|min:1',
            'status' => 'required|in:active,inactive',
        ]);
        Bottle::create($request->all());
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Bottle $bottle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bottle $bottle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bottle $bottle)
    {
        $request->validate([
            'name' => 'required|string|min:2|max:255',
            'amount' => 'required|numeric|min:1',
            'weight' => 'required|numeric|min:1',
            'status' => 'required|in:active,inactive',
        ]);
        $bottle->update($request->all());
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bottle $bottle)
    {
        $bottle->delete();
        return back();
    }
}

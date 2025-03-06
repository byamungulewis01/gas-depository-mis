<?php

namespace App\Http\Controllers;

use App\Models\Tailor;
use Illuminate\Http\Request;

class TailorsController extends Controller
{
    //

    public function index()
    {
        $tailors = Tailor::orderByDesc('id')->get();
        return view('admin.tailors.index', compact('tailors'));
    }
}

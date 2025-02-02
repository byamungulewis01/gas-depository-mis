<?php

namespace App\Http\Controllers;

use App\Models\Bottle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Request as ModelsRequest;
use App\Models\User;

class DashboardController extends Controller
{
    //
    public function admin()
    {
        $data = [
            'users' => User::count(),
            'requests' => ModelsRequest::count(),
            'bottles' => Bottle::count(),
            'successRate' => ModelsRequest::where('status', 'approved')->count() / ModelsRequest::count() * 100,
        ];
        $latestRequests = ModelsRequest::orderBy('created_at', 'desc')->take(10)->get();

        $bottleDistribution = ModelsRequest::join('bottles', 'requests.bottle_id', '=', 'bottles.id')
            ->selectRaw('bottles.name as bottle_name, count(*) as count')
            ->groupBy('bottles.name')
            ->get()
            ->pluck('count', 'bottle_name');


        return view('admin.dashboard', compact('data', 'latestRequests', 'bottleDistribution'));
    }
    public function agent()
    {
        $data = [
            'todayRequests' => ModelsRequest::where('user_id', Auth::user()->id)->whereDate('created_at', today())->count(),
            'completed' => ModelsRequest::where('user_id', Auth::user()->id)->where('status', 'approved')->count(),
            'pending' => ModelsRequest::where('user_id', Auth::user()->id)->where('status', 'pending')->count(),
            'successRate' => ModelsRequest::where('user_id', Auth::user()->id)->where('status', 'approved')->count() / ModelsRequest::count() * 100,
        ];

        $recentRequests = ModelsRequest::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->take(10)->get();



        return view('agent.dashboard', compact('data', 'recentRequests'));
    }
    public function requests()
    {
        $requests = ModelsRequest::orderByDesc('id')->get();
        return view('admin.requests', compact('requests'));
    }
}

<?php

namespace App\Http\Controllers\Admin;
use App\Models\User;
use App\Models\Transaction;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
        parent::__construct();
    }

    /**
     * Admin Dashboard
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {

        $monthly = Transaction::getTransactionMonthly();
        $statesCount = User::getStatesCount();
        $usersCount  = User::getUsersCount();
        
        foreach ($statesCount as $key => $state) {
            $percent = min(100, round($state['state_count'] * 100/$usersCount['total_users'], 2));
            $state['percentage'] = number_format($percent, 2);
        }

        return view('admin.dashboard.index', compact('statesCount','monthly')); 
    }
}

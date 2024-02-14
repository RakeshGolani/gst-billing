<?php

namespace App\Http\Controllers;

use App\Models\Party;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $count['total_party'] = Party::count();
        $count['total_client'] = Party::where('party_type', 'client')->count();
        $count['total_vendor'] = Party::where('party_type', 'vendor')->count();
        $count['total_employee'] = Party::where('party_type', 'employee')->count();
        return view('dashboard', $count);
    }
}

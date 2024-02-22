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
        $data['total_party'] = Party::count();
        $data['total_client'] = Party::where('party_type', 'client')->count();
        $data['total_vendor'] = Party::where('party_type', 'vendor')->count();
        $data['total_employee'] = Party::where('party_type', 'employee')->count();
        return view('dashboard', $data);
        
    }
}

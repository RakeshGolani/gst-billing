<?php

namespace App\Http\Controllers;

use App\Models\Party;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Opis\Closure\unserialize;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class PartyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        // Get All parties
        // $parties = Party::all();

        // Get all parties with specific columns
        $parties = Party::select(
            'id',
            'party_type',
            'full_name',
            'phone_no',
            'address',
            'account_holder_name',
            'account_no',
            'bank_name',
            'ifsc_code',
            'branch_address',
            'created_at'
        )->get();

        return view('party/index', compact('parties'));
    }

    public function addParty()
    {
        return view('party/add');
    }

    # Function to create/store party
    public function createParty(Request $request)
    {
        // Valildation
        $request->validate([
            'party_type' => 'required',
            'full_name' => 'required|string|min:2|max:20',
            'phone_no' => 'required|max:10',
            'address' => 'required|max:255',

            'account_holder_name' => 'required|string|min:2|max:20',
            'account_no' => 'required',
            'bank_name' => 'required|max:255',
            'ifsc_code' => 'required',
            'branch_address' => 'required|max:255',
        ]);

        $param = $request->all();

        # Remove token from post data before inserting
        unset($param['_token']);
        Party::create($param);

        // Redirect to add party back
        Session::flash('success', 'Party Added Successfully');
        return redirect()->route('manage-parties');
        //return redirect()->route('manage-parties')->withStatus("Party created successfully");
        //return redirect()->route('add-party')->with('success', 'Party created successfully');
    }

    public function editParty($party_id)
    {
        $data['party'] = Party::find($party_id);
        return view('party/edit', $data);
    }

    public function updateParty($id, Request $request)
    {
        $request->validate([
            'party_type' => 'required',
            'full_name' => 'required|string|min:2|max:20',
            'phone_no' => 'required|max:10',
            'address' => 'required|max:255',

            'account_holder_name' => 'required|string|min:2|max:20',
            'account_no' => 'required',
            'bank_name' => 'required|max:255',
            'ifsc_code' => 'required',
            'branch_address' => 'required|max:255',
        ]);
        // Update the record
        $param = $request->all();
        unset($param['_token']);
        unset($param['_method']);
        Party::where('id', $id)->update($param);

        Session::flash('success', 'Party Updated Successfully');
        return redirect()->route('manage-parties');
        //return redirect()->route('manage-parties')->withStatus('Party updated successfully');
    }
    
    // public function deleteParty(Party $party)
    // {
    //     $party->delete();
    //     return redirect()->route('manage-parties')->withStatus("Party deleted successfully");
    // }

    public function deleteParty(Request $request)
    {
        // $param = $request->all();

        // $party = Party::where('id', $param["id"])->first();
        // $party->delete();

        // Session::flash('success', 'Party Deleted Successfully');
        // return redirect()->route('manage-parties');

        $param = $request->all();
        
        $party = Party::with('gstBills')->find($param["id"]);

        if (!$party) {
            // Handle case where party with the given ID doesn't exist
            Session::flash('error', 'Party not found.');
            return redirect()->route('manage-parties');
        }
        foreach ($party->gstBills as $gstBill) {
            $gstBill->delete();
        }
        $party->delete();

        Session::flash('success', 'Party and associated GST bills deleted successfully.');

        return redirect()->route('manage-parties');

    }

}

<?php

namespace App\Http\Controllers;

use App\Models\Party;
use App\Models\GstBill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class GstBillController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $bills = GstBill::where('is_deleted', 0)->with('party')->get();
        return view('gst-bill/index', compact('bills'));
    }

    # Function to load add gst bill view
    public function addGstBill()
    {
        $parties = Party::where('party_type', 'employee')->orderBy('full_name')->get();

        return view('gst-bill/add', compact('parties'));    
    }

    public function createGstBill(Request $request)
    {
        // Valildation
        $request->validate([
            'party_id' => 'required|exists:parties,id',
            'invoice_date' => 'required|date',
            'invoice_no' => 'required|string|max:255',
            'item_description' => 'required|max:250',
            'total_amount' => 'required|numeric',
            'cgst_rate' => 'nullable|min:0|max:100',
            'cgst_amount' => 'numeric|min:0',
            'sgst_rate' => 'nullable|min:0|max:100',
            'sgst_amount' => 'numeric|min:0',
            'igst_rate' => 'nullable|min:0|max:100',
            'igst_amount' => 'numeric|min:0',
            'tax_amount' => 'numeric|min:0',
            'net_amount' => 'required|numeric|min:0',
            'declaration' => 'required',
            
        ]);

        $param = $request->all();

        // Remove token from post data before inserting
        unset($param['_token']);
        GstBill::create($param);

        // Redirect to manage bills
        Session::flash('success', 'Bill created successfully');
        return redirect()->route('manage-gst-bills');
        //return redirect()->route('manage-gst-bills')->withStatus("Bill created successfully");
    }

    public function print($id)
    {
        $bill = GstBill::where('id', $id)->with('party')->first();
        return view('gst-bill/print', compact('bill'));    
    }

    public function editGstBill($gst_id)
    {
        $bill = GstBill::where('id', $gst_id)->with('party')->first();
        $parties = Party::where('party_type', 'employee')->orderBy('full_name')->get();
        
        return view('gst-bill/edit', compact('parties', 'bill'));
    }

    public function updateGstBill($gst_id, Request $request)
    {
        //echo "Hello";exit;
        $request->validate([
            'party_id' => 'required|exists:parties,id',
            'invoice_date' => 'required|date',
            'invoice_no' => 'required|string|max:255',
            'item_description' => 'required|max:250',
            'total_amount' => 'required|numeric',
            'cgst_rate' => 'nullable|min:0|max:100',
            'cgst_amount' => 'numeric|min:0',
            'sgst_rate' => 'nullable|min:0|max:100',
            'sgst_amount' => 'numeric|min:0',
            'igst_rate' => 'nullable|min:0|max:100',
            'igst_amount' => 'numeric|min:0',
            'tax_amount' => 'numeric|min:0',
            'net_amount' => 'required|numeric|min:0',
        ]);
        
        $param = $request->all();
        unset($param['_token']);
        unset($param['_method']);
        GstBill::where('id', $gst_id)->update($param);

        Session::flash('success', 'Gst Bill updated successfully');
        return redirect()->route('manage-gst-bills');
        //return redirect()->route('manage-gst-bills')->withStatus("Gst Bill updated successfully");
    }

    // public function delete($table, $id)
    // {
    //     //return $table . '' . $id;exit;
    //     $param = array('is_deleted' => 1);
    //     DB::table($table)->where('id', $id)->update($param);

    //     Session::flash('success', 'Record deleted successfully');
    //     return redirect()->back();
    //     //return redirect()->back()->withStatus("Record deleted successfully");
    // }

    public function delete(Request $request)
    {
        $param = $request->all();

        // if (!isset($param['id'])) {
        //     Session::flash('error', 'No ID provided for deletion');
        //     return redirect()->back();
        // }
        
        GstBill::where('id', $param['id'])->update(['is_deleted' => 1]);

        Session::flash('success', 'Record deleted successfully');
        return redirect()->back();
    }
    

}
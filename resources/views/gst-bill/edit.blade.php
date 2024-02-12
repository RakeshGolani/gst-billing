@extends('layout.app')

@section('content')
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title font-weight-bold"> CREATE GST BILL </h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <!--Include alert file-->
                    
                    <div class="row">
                        <div class="col-6">
                            <h4 class="header-title text-uppercase">Invoice Basic Info</h4>
                        </div>
                        <div class="col-6">
                            <a href="{{ route('manage-gst-bills') }}" class="btn btn-sm btn-secondary float-right">BACK</a>
                        </div>
                    </div>
                    <hr>
                    <form action="{{ route('update-gst-bill', $bill->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label>Party</label>
                                    <select class="form-control @error('party_id') is-invalid @enderror border-bottom" name="party_id" id="validationCustom01">
                                    @error('full_name')
                                    <div class="invalid-feedback text-danger">
                                        {{ $message}}
                                    </div>
                                    @enderror
                                        <option value="">Please select</option>
                                        @foreach($parties as $party)
                                        <!-- <option value="{{ $party->id }}">{{ $party->full_name }}</option> -->
                                        <option value="{{$party->id}}" {{ $party->selected ? 'selected' : '' }}>{{ $party->full_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label>Invoice Date</label>
                                    <input type="date" name="invoice_date" value="{{ $bill->invoice_date }}" class="form-control border-bottom" id="validationCustom02">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label>Invoice Number</label>
                                    <input type="text" name="invoice_no" value="{{ $bill->invoice_no }}" class="form-control border-bottom" id="validationCustom02" placeholder="Enter Invoice number">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <h4 class="header-title text-uppercase">Item Details</h4>
                                <hr>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-8 border p-1 text-center">
                                <b>DESCRIPTIONS</b>
                            </div>
                            <div class="col-md-4 border p-1 text-center">
                                <b>TOTAL AMOUNT</b>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-8 border p-2">
                                <input class="form-control" name="item_description" value="{{ $bill->item_description}}" />
                            </div>
                            <div class="col-md-4 border p-2">
                                <input class="form-control" type="text" name="total_amount" value="{{ $bill->total_amount}}" id="totalAmountInput" oninput="calculateNetAmount()">
                            </div>
                        </div>

                        <div class="row mt-0">
                            <div class="col-md-3">
                                <label>CGST (%)</label>
                                <input type="text" class="form-control border-bottom" value="{{ $bill->cgst_rate}}" placeholder="CGST Rate" name="cgst_rate" id="cgst" oninput="calculateNetAmount()">
                                <span class="float-right gststyle" id="cgstDisplay">0</span>
                                <input type="hidden" id="cgstAmount" name="cgst_amount" value="0">
                            </div>

                            <div class="col-md-3">
                                <label>SGST (%)</label>
                                <input type="text" class="form-control border-bottom" value="{{ $bill->sgst_rate}}" placeholder="SGST Rate" name="sgst_rate" id="sgst" oninput="calculateNetAmount()">
                                <span class="float-right gststyle" id="sgstDisplay">0</span>
                                <input type="hidden" id="sgstAmount" name="sgst_amount" value="0">
                            </div>

                            <div class="col-md-3">
                                <label>IGST (%)</label>
                                <input type="text" class="form-control border-bottom" value="{{ $bill->igst_rate}}" placeholder="IGST Rate" name="igst_rate" id="igst" oninput="calculateNetAmount()">
                                <span class="float-right gststyle" id="igstDisplay">0</span>
                                <input type="hidden" id="igstAmount" name="igst_amount" value="0">
                            </div>

                            <div class="col-md-3">
                                <ul style="list-style: none;float: right;">
                                    <li>
                                        <b>Total Amount:</b> ₹ <span type="text" name='total_amount' id="totalAmountDisplay">0</span>
                                    </li>
                                    <li>
                                        <b>Tax:</b> ₹ <span type="text" id="taxDisplay">0</span>
                                        <input type="hidden" value="0" name="tax_amount" id="taxAmount">
                                    </li>
                                    <li>
                                        <b>Net Amount:</b> ₹ <span type="text" id="netAmountDisplay">0</span>
                                        <input type="hidden" value="0" name="net_amount" id="netAmount">
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" name="declaration" class="form-control border-bottom" value="{{ $bill->declaration}}" id="validationCustom05" placeholder="Declaration">
                                </div>

                                <button type="submit" class="btn btn-primary mb-2">Update</button>
                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>
@endsection

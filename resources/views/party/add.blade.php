@extends('layout.app')

@section('content')
<!-- Start Content-->
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title font-weight-bold text-uppercase"> Add Party </h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <!-- Start Form  -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <!--Include alert file-->
                    
                    <!-- @if(session('status'))
                        <div class="alert alert-success">{{ session('status') }}</div>
                    @endif -->
                    <div class="row">
                        <div class="col-6">
                            <h4 class="header-title text-uppercase"> Basic Info</h4>
                        </div>
                        <div class="col-6">
                            <a href="{{ route('manage-parties') }}" class="btn btn-sm btn-secondary float-right">BACK</a>
                        </div>
                    </div>

                    <hr>
                    <form class="needs-validation" method="post" action="{{ route('create-party') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="validationCustom01">Type</label>
                                    <select name="party_type" class="form-control @error('party_type') is-invalid @enderror border-bottom" id="validationCustom01" placeholder="Please select Type">
                                        <option value="">Please select</option>
                                        <option value="client" @if(old('party_type')=='client' ) selected @endif>Client</option>
                                        <option value="vendor" @if(old('party_type')=='vendor' ) selected @endif>Vendor</option>
                                        <option value="employee" @if(old('party_type')=='employee' ) selected @endif>Employee</option>
                                    </select>
                                    @error('party_type')
                                    <div class="invalid-feedback text-danger">
                                        {{ $message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="validationCustom01">Full Name</label>
                                    <input type="text" value="{{ old('full_name') }}" name="full_name" class="form-control @error('full_name') is-invalid @enderror border-bottom" id="validationCustom01" placeholder="Enter client's full name">
                                    @error('full_name')
                                    <div class="invalid-feedback text-danger">
                                        {{ $message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="validationCustom02">Phone/Mobile Number</label>
                                    <input type="text" name="phone_no" value="{{ old('phone_no') }}" class="form-control @error('phone_no') is-invalid @enderror border-bottom" id="validationCustom02" placeholder="Enter phone/mobile number">
                                    @error('phone_no')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="validationCustom03">Address</label>
                                    <input type="text" name="address" value="{{ old('address') }}" class="form-control @error('address') is-invalid @enderror border-bottom" id="validationCustom02" placeholder="Enter Address">
                                    @error('address')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>


                        <h4 class="header-title text-uppercase">Bank Details</h4>
                        <hr>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="validationCustom04">Account Holder Name</label>
                                    <input type="text" name="account_holder_name" value="{{ old('account_holder_name') }}" class="form-control @error('account_holder_name') is-invalid @enderror border-bottom" id="validationCustom04" placeholder="Enter Accoumt Holder name">
                                    @error('account_holder_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="validationCustom05">Account Number</label>
                                    <input type="text" name="account_no" value="{{ old('account_no') }}" class="form-control @error('account_no') is-invalid @enderror border-bottom" id="validationCustom05" placeholder="Enter Account Number">
                                    @error('account_no')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="validationCustom02">Bank Name</label>
                                    <input type="text" name="bank_name" value="{{ old('bank_name') }}" class="form-control @error('bank_name') is-invalid @enderror border-bottom" id="validationCustom02" placeholder="Enter Bank Name">
                                    @error('bank_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="validationCustom02">IFSC Code</label>
                                    <input type="text" name="ifsc_code" value="{{ old('ifsc_code') }}" class="form-control @error('ifsc_code') is-invalid @enderror border-bottom" id="validationCustom02" placeholder="Enter IFSC Code">
                                    @error('ifsc_code')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-8">
                                <div class="form-group mb-3">
                                    <label for="validationCustom02">Branch Address</label>
                                    <input type="text" name="branch_address" value="{{ old('branch_address') }}" class="form-control @error('branch_address') is-invalid @enderror border-bottom" id="validationCustom02" placeholder="Enter Branch Address">
                                    @error('branch_address')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <br>

                        <button class="btn btn-primary" type="submit">Submit</button>
                        <button class="btn btn-secondary" type="reset">Reset</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

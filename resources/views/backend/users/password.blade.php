@extends('layouts.master')
@section('title')
    Password
@endsection
@section('content')

    <!-- Change Password -->
    <div class="col-lg-6 col-md-6 col-xs-12 padding-left-30">
        <div class="dashboard-list-box margin-top-0">
            <h4 class="gray">Your Address</h4>
            <div class="dashboard-list-box-static">

                <!-- Change Password -->
                <div class="my-profile">
                    <label class="margin-top-0">Company Name</label>
                    <input type="text">

                    <label>Address *</label>
                    <input type="text">

                    <label>Zip Code *</label>
                    <input type="text">

                    <label>Country *</label>
                    <input type="text">

                    <label>City *</label>
                    <input type="text">

                    <label>Region/State *</label>
                    <input type="text">
                </div>

            </div>
        </div>
    </div>
@endsection

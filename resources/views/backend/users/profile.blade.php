@extends('layouts.master')
@section('title')
    Profile
@endsection
@section('css')
    <style>
      fieldset{
        color:#00f;
         background-color:#ddd
      }
    </style>
@endsection
@section('content')
<div class="row">

    <!-- Profile -->
    <div class="col-lg-12 col-md-12 col-xs-12 padding-right-30">
        <div class="dashboard-list-box">
            <fieldset disabled="disabled">
                <h4 class="gray">Profile Details</h4>
            <div class="dashboard-list-box-static">

                <!-- Avatar -->
                <div class="edit-profile-photo">
                    <img src="{{asset('assets')}}/images/user-avatar.jpg" alt="">
                    <div class="change-photo-btn">
                        <div class="photoUpload">
                            <span><i class="fa fa-upload"></i> Upload Photo</span>
                            <input type="file" class="upload" />
                        </div>
                    </div>
                </div>

                <!-- Details -->
                <div class="my-profile">
                     <div class="row">
                         <div class="col-md-6">
                            <label>Your Name *</label>
                            <input  type="text" disabled value="{{ $client->name }}">
                         </div>
                         <div class="col-md-6">
                            <label>Your Surname *</label>
                            <input  type="text" disabled value="{{ $client->surname  }}">
                         </div>
                     </div>


                     <div class="row">
                            <div class="col-md-6">
                               <label>Email *</label>
                               <input  type="text" name="email"  value="{{ $client->getUser->email }}">
                            </div>
                            <div class="col-md-6">
                                    <label>Phone Number </label>
                                    <input value="{{ $client->getUser->telephone  }}" name="telephone" type="text" >
                                </div>
                        </div>


                    <label>User Role</label>
                    <input  type="text" disabled value="{{ $client->getUser->getRole->name }}">
                </div>


            </div>
            </fieldset>

            <a class="button" href="{{ route('profile.edit') }}">Edit Profile</a>

        </div>
    </div>

</div>
@endsection

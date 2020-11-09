@extends('layouts.master')
@section('title')
    Profile Edit
@endsection
@section('content')
<div class="row">

    <!-- Profile -->
    <div class="col-lg-12 col-md-12 col-xs-12 padding-right-30">
        <div class="dashboard-list-box">

                <h4 class="gray">Profile Details</h4>
            <div class="dashboard-list-box-static">
                    <form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">

                        <!-- Avatar -->
                <div class="edit-profile-photo">
                    <img src="{{  asset('assets/avatars/')}}/{{ $client->getUser->avatar }}" alt=""  id="avatar">
                    <div class="change-photo-btn">
                        <div class="photoUpload">
                            <span><i class="fa fa-upload"></i> Upload Photo</span>
                            <input type="file" name="avatar" value="{{ $client->getUser->avatar }}" class="upload" onchange="readURL(this)"; />
                        </div>
                    </div>
                </div>

                {{ csrf_field() }}

                <!-- Details -->
                <div class="my-profile">
                     <div class="row">
                         <input type="hidden" value="{{ $client->slug }}" name="client_slug">
                         <div class="col-md-6">
                            <label>Your Name *</label>
                            <input  type="text" name="name"  value="{{ $client->name }}">
                         </div>
                         <div class="col-md-6">
                            <label>Your Surname *</label>
                            <input  type="text"  name="surname"  value="{{ $client->surname  }}">
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
                    <input  type="text"  value="{{ $client->getUser->getRole->name }}" disabled>
                </div>


            </div>
            <button class="button" type="submit" >Save</button>
        </form>

        </div>
    </div>

</div>
@endsection
@section('js')
<script>

function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#avatar')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
</script>
@endsection

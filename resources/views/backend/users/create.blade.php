@extends('layouts.master')
@section('title')
Ajout d'un nouveau bibliothécaire
@stop


@section('content')

@if(session()->has('success'))
@include('alert.alert_success')
@endif
@if(session()->has('error'))
    <div class="alert alert-danger alert-dismissable">
        @include('alert.alert_error')
    </div>
@endif


@if ($errors->any())
<ul class="alert alert-danger">
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
</ul>
@endif


<div class="add-listing-section">

    <!-- Headline -->
    <div class="add-listing-headline"  >
        <h3><i class="sl sl-icon-doc"></i> Nouveau bibliothécaire</h3>
    </div>

    <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
        @csrf





        <div class="row with-forms">
            <div class="col-md-4">
                <label>Nom </label>
                <input class="search-field" type="text" name="first_name">

            </div>

            <div class="col-md-4">
                <label>Prenom </label>
                <input class="search-field" type="text" name="last_name">

            </div>

            <div class="col-md-4">
                <label>Pseudo </label>
                <input class="search-field" type="text" name="username">

            </div>

        
            

        </div>




        <!-- Row -->
        <div class="row with-forms">

           <div class="col-md-12">
                <label>Email </label>
                <input class="search-field" type="email" name="email">

            </div>

        </div>

        

        <div class="row with-form">
            <button class="button " style="background: #106eea; color: #ffffff;" type="submit">Enregistrer</button> &nbsp; &nbsp;
            <a href="{{ url('bibliothecaire') }}" style="color: #ffffff;"><button class="button btn-secondary" type="button" >Retour</button> &nbsp; &nbsp;</a>

        </div>

   </form>
    <!-- Title -->

    <!-- Row / End -->
</div>


@endsection

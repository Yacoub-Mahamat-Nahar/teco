@extends('layouts.master')
@section('title')
Ajout de contenu à la gallerie
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
        <h3><i class="sl sl-icon-doc"></i> Ajout de contenu à la gallerie </h3>
    </div>

    <form action="{{ route('gallerie-add') }}" method="POST" enctype="multipart/form-data">
        @csrf





        <div class="row with-forms">
            <div class="col-md-5">
                <label>Titre </label>
                <input class="search-field" type="text" name="titre">

            </div>



        </div>




        <!-- Row -->

        <input type="hidden" name="gallerie" value="1">

        <div class="row with-forms">
            <div class="col-md-12">
                <div class="col-md-3">
                    <div class="form-group">
                        <div class="file-upload">
                            <button class="file-upload-btn" type="button"
                                    onclick="$('.file-upload-input').trigger( 'click' )">Ajouter une image
                            </button>
                            <div class="image-upload-wrap">
                                <input class="file-upload-input" type='file' onchange="readURL(this);"
                                       accept="image/*" name="media"/>
                                <div class="drag-text">
                                    <h3>Glissez et Deposez ou Cliquez ici pour selection une image</h3>
                                </div>
                            </div>
                            <div class="file-upload-content">
                                <img class="file-upload-image" src="#" alt="your image"/>
                                <div class="image-title-wrap">
                                    <div class="row">
                                        <button type="button" onclick="removeUpload()" class="remove-image">Retirer
                                            <span
                                                    class="image-title">Image chargée</span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                       </div>
                </div>
            </div>

        </div>

        <div class="row with-form">
            <button class="button " style="background: #106eea; color: #ffffff;" type="submit">Enregistrer</button> &nbsp; &nbsp;
            <a href="{{ url('articles') }}" style="color: #ffffff;"><button class="button btn-secondary" type="button" >Retour</button> &nbsp; &nbsp;</a>

        </div>

   </form>
    <!-- Title -->

    <!-- Row / End -->
</div>


@endsection

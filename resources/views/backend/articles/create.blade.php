@extends('layouts.master')
@section('title')
Livres
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
        <h3><i class="sl sl-icon-doc"></i> Nouveau livre</h3>
    </div>

    <form action="{{ route('livres.store') }}" method="POST" enctype="multipart/form-data">
        @csrf


        <div class="row with-forms">
            <div class="col-md-12">
                <label>Titre </label>
                <input class="search-field" type="text" name="titre">
            </div>
        </div>


        <div class="row with-forms">
            <div class="col-md-6">
                <label>Date de publication </label>
                <input class="search-field" type="date" name="date_publication">
            </div>

            <div class="col-md-6">
                <label>Catégorie </label>
                <select class="chosen-select-no-single" name="categorie">
                    <option label="Selectionnez une Categorie" disabled selected>Selectionnez une categorie</option>

                    @foreach ($categories as $i)
                    <option value="{{ $i->id }}">{{ $i->nom }}</option>
                    @endforeach

                </select>
            </div>


        </div>


        <div class="row with-forms">
            <div class="col-md-6">
                <label>Auteur </label>
                <input class="search-field" type="text" name="auteur">
            </div>

            <div class="col-md-6">
                <label>Livre numérique </label>
                <input class="search-field" type="text" name="livre_numerique">

            </div>


        </div>

        <!-- Row -->
        <div class="row with-forms">

            <!-- Status -->
            <div class="col-md-6">
                <label>Résumé</label>

            </div>

            <!-- Type -->
            <textarea class="WYSIWYG" name="resume" cols="40" rows="3" ></textarea>

        </div>

        <div class="row with-forms">
            <div class="col-md-9">
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
            <div class="col-md-3">
                <label>Fichier PDF </label>
                <input class="search-field" type="file" name="fichier_pdf">

            </div>
        </div>

        <div class="row with-form">
            <button class="button " style="background: #106eea; color: #ffffff;" type="submit">Enregistrer</button> &nbsp; &nbsp;
            <a href="{{ url('livres') }}" style="color: #ffffff;"><button class="button btn-secondary" type="button" >Retour</button> &nbsp; &nbsp;</a>

        </div>

   </form>
    <!-- Title -->

    <!-- Row / End -->
</div>


@endsection

@extends('layouts.master')
@section('title')
Categorie
@stop

@section('content')



    <div class="add-listing-section">

        <!-- Headline -->
        <div class="add-listing-headline"  >
            <h3><i class="sl sl-icon-doc"></i> Création Categorie d'Article</h3>
        </div>

        <form action="{{ route('categorie-article.store') }}" method="POST">
            @csrf


            <div class="row with-forms">
                <div class="col-md-12">
                    <label>Libellé </label>
                    <input class="search-field" type="text" name="nom">
                </div>
            </div>

            <!-- Row -->
            <div class="row with-forms">

                <!-- Status -->
                <div class="col-md-6">
                    <label>Description</label>

                </div>

                <!-- Type -->
                <textarea class="WYSIWYG" name="description" cols="40" rows="3" ></textarea>

            </div>

            <div class="row with-form">
                <button class="button " style="background: #106eea; color: #ffffff;" type="submit">Enregistrer</button> &nbsp; &nbsp;
                <a href="{{ url('categories') }}" style="color: #ffffff;"><button class="button btn-secondary" type="button" >Retour</button> &nbsp; &nbsp;</a>

            </div>

       </form>
        <!-- Title -->

        <!-- Row / End -->
    </div>



    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

@endsection

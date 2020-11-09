@extends('layouts.app')
@section('content')
<div class="container">

    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Detail du livre : {{$livre->titre}}</h2>
          <ol>
            <li><a href="{{ url('')}}">Accueil</a></li>
          <li><a href="{{ url('/livre')}}">Livres</a></li>
            <li>Portfolio Details</li>
          </ol>
        </div>

      </div>
    </section><!-- Breadcrumbs Section -->

    <!-- ======= Portfolio Details Section ======= -->
     <br>
     <br>
     <br>
    <section class="portfolio-details">
      <div class="container">

        <div class="portfolio-details-container">

          <div class="owl-carousel portfolio-details-carousel">
            <img src="uploads/livres/{{ $livre->couverture }}" class="img-fluid" alt="">
            <img src="uploads/livres/{{ $livre->couverture }}" class="img-fluid" alt="">
            <img src="uploads/livres/{{ $livre->couverture }}" class="img-fluid" alt="">
          </div>

          <div class="portfolio-info" style="padding-top: 2%">
            <br>
     <br><br>
     <br>
            <h3>{{ $livre->titre }}</h3>
            <ul>
              <li><strong>Categorie</strong>: {{ $livre->category->nom }}</li>
              <li><strong>Auteur</strong>: {{ $livre->auteur }}</li>
              <li><strong>Date de publication </strong>: 01 March, 2020</li>
              <li><strong>Project URL</strong>: <a href="#">www.example.com</a></li>
            </ul>
          </div>

        </div>

        <div class="portfolio-description">
          <h2>Resumé : </h2>
          <p>
            {{$livre->resume}}
          </p>
        </div>
      </div>
    </section><!-- End Portfolio Details Section -->

  </div><!-- End #main -->

@endsection

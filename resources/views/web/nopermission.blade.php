@extends('layouts.app')
@section('content')
    <div class="container" style="padding-top: 10% ">
        <div class="jumbotron">
             <p class="text-center">
                 Vous n'etes pas autorisé à acceder à ce espace
             </p>
             <br>
             <p class="text-center">
                 <a href="{{ url('/forum') }}">
                    Clickez ici pour acceder au forum
                </a>
             </p>
        </div>
    </div>
@endsection

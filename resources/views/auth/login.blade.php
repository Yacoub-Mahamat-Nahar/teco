@extends('layouts.base')
@section('css')
    <style>
    </style>
@endsection
@section('content')
<header class="video-header">
<video src="{{url('assets/img/portfolio/background.mp4')}}" autoplay loop playsinline muted></video>
    <div class="viewport-header">

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group row">

                <div class="col-md-12">
                    <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="{{ __('Address E-Mail ou Pseudo') }}">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">

                <div class="col-md-12">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="{{ __('Mot de passe') }}">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>



            <div class="form-group row mb-0">
                <div class="col-md-12">

                    @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}" style="color: white;">
                        {{ __('Mode pass oublié?') }}
                    </a>
                @endif

                    <button type="submit" class="btn btn-primary">
                        {{ __('Se connecter') }}
                    </button>


                </div>
            </div>


            <div class="mt-5 text-center">
                <p style="color : #fffff0;">Besoin d'un compte ? <a href="{{url('register')}}" class="font-weight-medium text-primary text-white"> S'inscrire </a> </p>
            </div>
        </form>
    </div>
  </header>

  <main>

  </main>

@endsection

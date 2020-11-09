@extends('layouts.base')

@section('content')
<div class="container" style="padding-top: 10%;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Connectez-vous pour accedez au forum</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login-rewrite') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Address E-Mail ou Pseudo') }}</label>

                            <div class="col-md-6">
                                <input id="emailOrPassword" type="text" class="form-control @error('emailOrPassword') is-invalid @enderror" name="emailOrPassword" value="{{ old('emailOrPassword') }}" required autocomplete="email" autofocus>

                                @error('emailOrPassword')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Mot de pass') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Se souvernir de moi') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Se connecter') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Mode pass oublié?') }}
                                    </a>
                                @endif
                            </div>
                        </div>


                        <div class="mt-5 text-center">
                            <p>Besoin d'un compte ? <a href="{{url('register')}}" class="font-weight-medium text-primary"> S'inscrire </a> </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

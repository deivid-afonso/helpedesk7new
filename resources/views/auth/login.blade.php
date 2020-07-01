@extends('layouts.app')

@section('content')
<section id="login" class="section">
    <div class="container" id="login-container">
        <div class="columns is-centered is-vcentered">
            <div class="column is-10-tablet is-8-desktop is-6-widescreen">
                <div class="columns is-centered py-4">
                    <div class="column">
                        <h2 class="title has-text-centered has-text-white mx-auto">
                            <div class="tag is-dark is-size-2">
                                <span class="has-text-danger">Fatec</span>&nbsp
                                HelpDesk
                            </div>
                        </h2>
                    </div>
                </div>
                <div class="box is-dark is-marginless pb-4">
                    <div class="columns is-centered py-4">
                        <div class="column is-6">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="field has-text-centered">
                                    <label for="email" class="label">{{ __('E-Mail:') }}</label>
                                    <div class="control is-expanded">
                                        <input id="email" type="email" class="input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    </div>
                                    @error('email')
                                        <p class="title is-7 has-text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </p>
                                    @enderror
                                </div>
                                <div class="field has-text-centered">
                                    <label for="password" class="label">{{ __('Password:') }}</label>
                                    <div class="control is-expanded">
                                        <input id="password" type="password" class="input @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="control is-expanded">
                                        <button type="submit" class="button is-warning is-fullwidth">
                                            {{ __('Login') }}
                                        </button>
                                    </div>
                                </div>
                                {{-- <div class="form-group row">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                </div> --}}
                            </form>
                        </div>
                    </div>
                </div>
                <p class="title is-size-7 has-text-centered has-text-grey mt-4">
                    FATEC © 2020
                </p>
            </div>
        </div>
    </div>
</section>
@endsection

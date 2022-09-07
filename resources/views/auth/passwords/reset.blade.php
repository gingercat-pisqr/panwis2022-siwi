@extends('layouts.appauth')

@section('content')
@include('part.notification')
<div class="content-auth col-md-10">
    <div class="card-auth" style="width: 600px">
                <div id="main" class="main col-md-12 text-md-center">
                    <div class="preloader" id="preloader">
                        <div class="preloader__square" id="preloader__square"></div>
                        <div class="preloader__square" id="preloader__square"></div>
                        <div class="preloader__square" id="preloader__square"></div>
                        <div class="preloader__square" id="preloader__square"></div>
                    </div>
                    {{-- <div class="status">Memuat<span class="status__dot">.</span><span class="status__dot">.</span><span class="status__dot">.</span></div> --}}
                </div>

                <div class="auth-header" style="margin-bottom: 50px">
                    <b>Atur ulang kata sandi</b>
                </div>

                    <form method="POST" action="{{ route('password.update') }}" class="form-auth col-md-8">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                            <!-- <div class="card-auth-title">
                                <label class="text-md-right">Alamat surel</i><label>
                            </div>
                            -->
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Alamat surel') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus readonly>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Kata sandi') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Konfirmasi kata sandi') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="ow mb-0 form-footer text-md-center">
                            <button type="submit" class="btn-auth btn-primary">
                                    {{ __('Ubah kata sandi') }}
                                </button>
                        </div>
                    </form>
                </div>
            </div>
@endsection

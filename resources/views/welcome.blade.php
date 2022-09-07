@extends('layouts.app')

@section('content')
@include('part.notification')
<div class="flex-center position-ref full-height" style="top: 50%; left:50%">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                {{-- <a href="{{ url('/home') }}">Home</a> --}}
            {{-- @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif --}}
            @endauth
        </div>
    @endif
    

    <div class=" content-center">
        <div class="content-auth center col-md-8" >
               
            <div class="card-auth flex-lg-row" style="width: 700px; padding: 0;border:0px;">
                <div class="image-auth col-md-4">
                    <img src="{{asset('img/bungadalam.png')}}" class="logo-rotating">
                    <img src="{{asset('img/bungaluar.png')}}" class="logo-rotating-2" alt="">
                </div>
                <div class=" col-md-6">
                    <form method="POST" action="/authentication" class="form-auth" style="margin:0px">
                            @csrf
                            <div class="card-auth-title" style="margin-top: 30px">
                                <label class="text-md-center">Masukkan NPM Anda<label>
                            </div>
                            <div class="form-group row">
                                    <input id="npm" type="text" class="form-control col-md-12 auth-input @error('npm') is-invalid @enderror" name="npm" value="{{ old('npm') }}" required autocomplete="npm" autofocus placeholder="Nomor Pokok Mahasiswa">

                                    @error('npm')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                            <div class="form-group row mb-0 form-footer text-md-center" style="margin:0px">
                                <div class="text-md-center">
                                    <button type="submit" class="btn-auth btn-primary">
                                        {{ __('Selanjutnya') }}
                                    </button>
                                </div>
                            </div>

                        </form>
                    
                </div>
            </div>
                
        </div>
    </div>  
</div>

@endsection

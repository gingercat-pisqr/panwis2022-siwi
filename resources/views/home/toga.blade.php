@extends('layouts.appdash')

@section('content')


<div id="main" class="main" style="width: 100%">
    <div class="preloader" id="preloader">
        <div class="preloader__square" id="preloader__square"></div>
        <div class="preloader__square" id="preloader__square"></div>
        <div class="preloader__square" id="preloader__square"></div>
        <div class="preloader__square" id="preloader__square"></div>
    </div>
</div>

<div class="container">
    @include('part.notification')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="home-card" style="margin-bottom:80px ">

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>

                @if($status_toga->status == 1)

                    <div class="locked col-md-12 text-md-right">
                        <div class="alert alert-light alert-block animate alert-dismissible fade show shadow text-md-center"  role="alert" aria-live="polite" aria-atomic="true" data-delay="3000" data-autohide="true" data-animate="fadeInUp" role="alert">
                            <strong>SEGERA</strong>
                        </div>
                    </div>

                @elseif($status_toga->status == 2)

                    <div class="locked col-md-12 text-md-right">
                        <div class="alert alert-light alert-block animate alert-dismissible fade show shadow text-md-center"  role="alert" aria-live="polite" aria-atomic="true" data-delay="3000" data-autohide="true" data-animate="fadeInUp" role="alert">
                            <strong>Pendataan Toga Telah Ditutup</strong>
                        </div>
                    </div>

                @else
                    @if ( $mahasiswas->status_ambil_toga == 0 )

                        <div class="home-card-step">
                            <div class="step">
                                <div class="step-number">1</div>
                                <div class="step-caption">Isi Data</div>
                            </div>
                            <div class="step">
                                <div class="step-number non-active-number">2</div>
                                <div class="step-caption non-active-caption">Kunci Data</div>
                            </div>
                        </div>

                        <form action="/createToga" class="form-auth col-md-10" method="POST"  enctype="multipart/form-data">
                            @csrf

                            <div class="home-card-title">
                                Silakan Isi Data Berikut<br>
                            </div>

                            <div class="card-auth-subtitle">
                                <label class="text-md-center">Ukuran Toga &nbsp;<i class="fas fa-info-circle" data-toggle="modal" data-target="#exampleModal"></i> <label>
                            </div>
                            <div class="form-group row">
                                        {{-- <input id="size_toga" type="text" class="form-control col-md-12 auth-input @error('size_toga') is-invalid @enderror" name="size_toga" value="{{ $togas->size_toga ?? '' }}" required autocomplete="size_toga"> --}}
                                        <select name="size_toga" id="size_toga" class="form-control col-md-12 auth-input @error('size_toga') is-invalid @enderror">
                                            <option value="" selected disabled ></option>
                                            <option value="XS" @if(!empty($togas->size_toga)) @if($togas->size_toga == "XS") selected @endif @endif >XS</option>
                                            <option value="S" @if(!empty($togas->size_toga)) @if($togas->size_toga == "S") selected @endif @endif >S</option>
                                            <option value="M" @if(!empty($togas->size_toga)) @if($togas->size_toga == "M") selected @endif @endif >M</option>
                                            <option value="L" @if(!empty($togas->size_toga)) @if($togas->size_toga == "L") selected @endif @endif >L</option>
                                            <option value="XL" @if(!empty($togas->size_toga)) @if($togas->size_toga == "XL") selected @endif @endif >XL</option>
                                            <option value="XXL" @if(!empty($togas->size_toga)) @if($togas->size_toga == "XXL") selected @endif @endif >XXL</option>
                                            <option value="XXXL" @if(!empty($togas->size_toga)) @if($togas->size_toga == "XXXL") selected @endif @endif >XXXL</option>
                                        </select>
                                        @error('size_toga')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                            </div>

                            {{-- <div class="agreement form-group row col-md-12 text-danger">
                                <div id="aggreement" name="aggreement" class="agreement-check"><h5><b>*</b></h5></div>
                                <label for="aggreement"  class="agreement-label" style="height: 40px"><b>Dengan menyimpan data, Anda telah melakukan pendataan untuk pengiriman toga</b></label>
                            </div> --}}

                            <div class="form-group row" style="margin: 30px 0 18px 0">
                                <div class="btn-area col-md-12 text-md-center">
                                    <button type="submit" class="btn-auth btn-primary">
                                        {{ __('Simpan') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    
                   
                    <!-- Edit/Kunci Data -->
                    @elseif($mahasiswas->status_ambil_toga == 1)

                        <div class="home-card-step">
                            <div class="step">
                                <div class="step-number non-active-number">1</div>
                                <div class="step-caption non-active-caption">Isi Data</div>
                            </div>
                            <div class="step">
                                <div class="step-number">2</div>
                                <div class="step-caption">Kunci Data</div>
                            </div>
                        </div>

                        <form action="/lockToga" class="form-auth col-md-10" method="POST"  enctype="multipart/form-data">
                            @csrf

                            <div class="card-auth-subtitle">
                                <label class="text-md-center">Ukuran Toga &nbsp;<i class="fas fa-info-circle" data-toggle="modal" data-target="#exampleModal"></i> <label>
                            </div>
                            <div class="form-group row">
                                <select name="size_toga" id="size_toga" class="form-control col-md-12 auth-input @error('size_toga') is-invalid @enderror">
                                    <option value="XS" @if(!empty($togas->size_toga)) @if($togas->size_toga == "XS") selected @else disabled @endif @endif >XS</option>
                                    <option value="S" @if(!empty($togas->size_toga)) @if($togas->size_toga == "S") selected @else disabled @endif @endif >S</option>
                                    <option value="M" @if(!empty($togas->size_toga)) @if($togas->size_toga == "M") selected @else disabled @endif @endif >M</option>
                                    <option value="L" @if(!empty($togas->size_toga)) @if($togas->size_toga == "L") selected @else disabled @endif @endif >L</option>
                                    <option value="XL" @if(!empty($togas->size_toga)) @if($togas->size_toga == "XL") selected @else disabled @endif @endif >XL</option>
                                    <option value="XXL" @if(!empty($togas->size_toga)) @if($togas->size_toga == "XXL") selected @else disabled @endif @endif >XXL</option>
                                    <option value="XXXL" @if(!empty($togas->size_toga)) @if($togas->size_toga == "XXXL") selected @else disabled @endif @endif >XXXL</option>
                                </select>
                                        {{-- <input id="prodi_id" type="text" class="form-control col-md-12 auth-input @error('prodi_id') is-invalid @enderror" name="prodi_id" value="{{ $mahasiswas->prodi_id ?? '' }}" required autocomplete="prodi_id"  > --}}

                                        @error('size_toga')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                            </div>

                            
                            <br>
                            <div class="agreement form-group row col-md-12 text-danger">
                                <div id="aggreement" name="aggreement" class="agreement-check"><h5><b>*</b></h5></div>
                                <label for="aggreement"  class="agreement-label" style="height: 40px"><b>Pastikan data yang Anda isi sudah benar sebelum mengunci data</b></label>
                            </div>
                            <hr>
                            <div class="form-group row justify-content-between" style="margin: 30px 0 18px 0">
                                    <div class="btn-area col-md-6 text-md-left">
                                        <a href="{{ route('edittoga') }}" class="btn-auth-secondary btn-secondary">
                                            {{ __('Ubah Data') }} <i class="fas fa-edit"></i>
                                        </a>
                                    </div>
                                    <div class="btn-area col-md-6 text-md-right" style="border-top:0">
                                        <button type="submit" class="btn-auth btn-primary">
                                            {{ __('Kunci Data') }} &nbsp;<i class="fas fa-lock"></i>
                                        </button>
                                    </div>
                                </div>
                        </form>

                    
                    <!-- Kunci Data -->
                    @elseif($mahasiswas->status_ambil_toga >= 2 )


                        <div class="locked col-md-12 text-md-right">
                            <i class="fas fa-lock"></i>
                        </div>

                        <div class="home-card-step">
                        <div class="step">
                            <div class="step-caption" style="color:#11343a">DATA UKURAN TOGA</div>
                        </div>
                        </div>

                        <form action="/lockToga" class="form-auth col-md-10" method="POST"  enctype="multipart/form-data" style="border-top: 0">
                            @csrf

                            <div class="card-auth-subtitle">
                                <label class="text-md-center">Ukuran Toga &nbsp;<i class="fas fa-info-circle" data-toggle="modal" data-target="#exampleModal"></i> <label>
                            </div>
                            <div class="form-group row">
                                <select name="size_toga" id="size_toga" class="form-control col-md-12 auth-input @error('size_toga') is-invalid @enderror">
                                    <option value="XS" @if(!empty($togas->size_toga)) @if($togas->size_toga == "XS") selected @else disabled @endif @endif >XS</option>
                                    <option value="S" @if(!empty($togas->size_toga)) @if($togas->size_toga == "S") selected @else disabled @endif @endif >S</option>
                                    <option value="M" @if(!empty($togas->size_toga)) @if($togas->size_toga == "M") selected @else disabled @endif @endif >M</option>
                                    <option value="L" @if(!empty($togas->size_toga)) @if($togas->size_toga == "L") selected @else disabled @endif @endif >L</option>
                                    <option value="XL" @if(!empty($togas->size_toga)) @if($togas->size_toga == "XL") selected @else disabled @endif @endif >XL</option>
                                    <option value="XXL" @if(!empty($togas->size_toga)) @if($togas->size_toga == "XXL") selected @else disabled @endif @endif >XXL</option>
                                    <option value="XXXL" @if(!empty($togas->size_toga)) @if($togas->size_toga == "XXXL") selected @else disabled @endif @endif >XXXL</option>
                                </select>
                                        {{-- <input id="prodi_id" type="text" class="form-control col-md-12 auth-input @error('prodi_id') is-invalid @enderror" name="prodi_id" value="{{ $mahasiswas->prodi_id ?? '' }}" required autocomplete="prodi_id"  > --}}

                                        @error('size_toga')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                            </div>
                            <br>
                        </form>


                    
                   
                    @endif
                @endif
            </div>
        </div>
    </div>


</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog rounded border-0" role="document">
      <div class="modal-content rounded border-0">
        <div class="modal-header header-popup">
          <h5 class="modal-title title-popup" style="font-family: Fontin" id="exampleModalLabel">Rincian Ukuran Toga</h5>
          <button type="button" class="close white" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <img src="{{ asset('img/size_toga.png') }}" class="col-md-12">
        </div>
      </div>
    </div>
  </div>

<!-- Modal -->
<div class="modal fade" id="modalIntroPendataan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Pendataan Toga</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <img src="{{ asset('img/size_toga.png') }}" class="col-md-12">
        </div>
        {{-- <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div> --}}
      </div>
    </div>
  </div>
@endsection

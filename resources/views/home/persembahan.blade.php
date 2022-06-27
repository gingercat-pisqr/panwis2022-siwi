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
@include('part.notification')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @if($status_persembahan->status == 2)

            <div class="home-card" style="margin-bottom:80px ">
            <br><br>
            <div class="locked col-md-12 text-md-center">
                <div class="alert alert-light alert-block animate alert-dismissible fade show shadow text-md-center"  role="alert" aria-live="polite" aria-atomic="true" data-delay="3000" data-autohide="true" data-animate="fadeInUp" role="alert">
                    <strong>Pendaftaran Persembahan Wisudawan Telah Ditutup</strong>
                </div>
            </div>

                @if ( $persem == 1)
                    <br><br>
                    <div class="col-md-10 m-auto text-md-center d-flex flex-nowrap">
                        <div class="alert col-md-12 alert-success shadow text-md-left">
                            <strong>Anda telah menyelesaikan pendaftaran audisi persembahan wisuda. &nbsp;Silakan bergabung ke grup Whatsapp dengan cara klik <a class="btn-link-verif" href="https://chat.whatsapp.com/Im9PfDSWtjN0onLXCeqYnd" target="_blank"> di sini</a>
                            <br><br>
                            Grup akan aktif memberikan informasi setelah pendaftaran audisi persembahan wisudawan ditutup.
                        </strong>
                        </div>
                    </div>
                    <form action="/lockRegistrasi" style="margin-top: -20px; border:none" class="form-auth col-md-10" style="border-top:none" method="POST"  enctype="multipart/form-data">
                        @csrf
                        <div class="card-auth-subtitle">
                            <label class="text-md-center">Nama Penanggung Jawab<label>
                        </div>
                        <div class="form-group row">
                                    <input id="nama" type="text" class="form-control col-md-12 auth-input @error('nama') is-invalid @enderror" name="nama" value="{{ $mahasiswas->nama ?? '' }}" required autocomplete="nama" readonly  >

                                    @error('nama')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                        </div>

                        <div class="card-auth-subtitle">
                            <label class="text-md-center">Alamat Surel <i>(e-mail)</i><label>
                        </div>
                        <div class="form-group row">
                                    <input id="email" type="text" class="form-control col-md-12 auth-input @error('email') is-invalid @enderror" name="email" value="{{ $mahasiswas->email ?? '' }}" required autocomplete="email" readonly  >

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                        </div>

                        <div class="card-auth-subtitle">
                            <label class="text-md-center">NPM<label>
                        </div>
                        <div class="form-group row">
                                    <input id="npm" type="text" class="form-control col-md-12 auth-input @error('npm') is-invalid @enderror" name="npm" value="{{ $mahasiswas->npm ?? '' }}" required autocomplete="npm" readonly >

                                    @error('npm')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                        </div>

                        <div class="card-auth-subtitle">
                            <label class="text-md-center">Program Studi<label>
                        </div>
                        <div class="form-group row">
                            <select id="prodi_id" name="prodi_id" class="form-control col-md-12 auth-input @error('prodi_id') is-invalid @enderror" readonly>
                                <option value="11" @if($mahasiswas->prodi_id == 11) selected @else disabled @endif >D III AKUNTANSI</option>
                                <option value="12" @if($mahasiswas->prodi_id == 12) selected @else disabled @endif >D III AKUNTANSI ALIH PROGRAM</option>
                                <option value="13" @if($mahasiswas->prodi_id == 13) selected @else disabled @endif >D IV AKUNTANSI </option>
                                <option value="14" @if($mahasiswas->prodi_id == 14) selected @else disabled @endif >D IV AKUNTANSI ALIH PROGRAM (Non Akt) </option>
                                <option value="15" @if($mahasiswas->prodi_id == 15) selected @else disabled @endif >D IV AKUNTANSI ALIH PROGRAM (Akt) </option>
                                <option value="21" @if($mahasiswas->prodi_id == 21) selected @else disabled @endif >D III PAJAK </option>
                                <option value="22" @if($mahasiswas->prodi_id == 22) selected @else disabled @endif >D III PAJAK ALIH PROGRAM </option>
                                <option value="23" @if($mahasiswas->prodi_id == 23) selected @else disabled @endif >D III PBB/PENILAI </option>
                                <option value="24" @if($mahasiswas->prodi_id == 24) selected @else disabled @endif >D III PBB/PENILAI ALIH PROGRAM 2018 </option>
                                <option value="25" @if($mahasiswas->prodi_id == 25) selected @else disabled @endif >D III PBB/PENILAI ALIH PROGRAM 2019 </option>
                                <option value="31" @if($mahasiswas->prodi_id == 31) selected @else disabled @endif >D III KEPABEANAN DAN CUKAI </option>
                                <option value="32" @if($mahasiswas->prodi_id == 32) selected @else disabled @endif >D III KEPABEANAN DAN CUKAI ALIH PROGRAM </option>
                                <option value="41" @if($mahasiswas->prodi_id == 41) selected @else disabled @endif >D III KEBENDAHARAAN NEGARA </option>
                                <option value="42" @if($mahasiswas->prodi_id == 42) selected @else disabled @endif >D III KEBENDAHARAAN NEGARA ALIH PROGRAM</option>
                                <option value="43" @if($mahasiswas->prodi_id == 43) selected @else disabled @endif >D III MANAJEMEN ASET </option>
                            </select>
                                    {{-- <input id="prodi_id" type="text" class="form-control col-md-12 auth-input @error('prodi_id') is-invalid @enderror" name="prodi_id" value="{{ $mahasiswas->prodi_id ?? '' }}" required autocomplete="prodi_id"  > --}}

                                    @error('prodi_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                        </div>

                        <div class="card-auth-subtitle">
                            <label class="text-md-center">Kelas<label>
                        </div>
                        <div class="form-group row">
                                    <input id="kelas" type="text" class="form-control col-md-12 auth-input @error('kelas') is-invalid @enderror" name="kelas" value="{{ $mahasiswas->kelas ?? '' }}" required autocomplete="kelas" readonly  >

                                    @error('kelas')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                        </div>

                        <div class="card-auth-subtitle">
                            <label class="text-md-center">Nama Tim<label>
                        </div>
                        <div class="form-group row">
                                    <input id="nama_tim" type="text" class="form-control col-md-12 auth-input @error('nama_tim') is-invalid @enderror" name="nama_tim" value="{{ $persembahan->nama_tim ?? '' }}" required autocomplete="nama_tim" readonly  >

                                    @error('nama_tim')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                        </div>

                        <div class="card-auth-subtitle">
                            <label class="text-md-center">Jenis Persembahan<label>
                        </div>
                        <div class="form-group row">
                            <select id="jenis_persembahan" name="jenis_persembahan" class="form-control col-md-12 auth-input @error('jenis_persembahan') is-invalid @enderror" readonly>
                                <option value="puisi" @if($persembahan->jenis_persembahan  ?? '' == "puisi" ) selected @else disabled @endif >Puisi</option>
                                <option value="band" @if($persembahan->jenis_persembahan ?? '' == "band" ) selected @else disabled @endif >Band</option>
                                <option value="solo" @if($persembahan->jenis_persembahan ?? '' == "solo" ) selected @else disabled @endif >Solo Vocal</option>
                                <option value="rap" @if($persembahan->jenis_persembahan ?? '' == "rap" ) selected @else disabled @endif >Rap Battle</option>
                                <option value="pwh" @if($persembahan->jenis_persembahan ?? '' == "pwh" ) selected @else disabled @endif >Performed with Household</option>
                            </select>
                                    {{-- <input id="jenis_persembahan" type="text" class="form-control col-md-12 auth-input @error('jenis_persembahan') is-invalid @enderror" name="jenis_persembahan" value="{{ $persembahan->jenis_persembahan ?? '' }}" required autocomplete="jenis_persembahan"  > --}}

                                    @error('jenis_persembahan')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                        </div>

                        <div class="card-auth-subtitle">
                            <label class="text-md-center">Nomor Whatsapp<label>
                        </div>
                        <div class="form-group row">
                                    <input id="wa_pj" type="text" class="form-control col-md-12 auth-input @error('wa_pj') is-invalid @enderror" name="wa_pj" value="{{ $persembahan->wa_pj ?? '' }}" required autocomplete="wa_pj" readonly  >

                                    @error('wa_pj')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                        </div>

                        <div class="card-auth-subtitle">
                            <label class="text-md-center">ID Line<label>
                        </div>
                        <div class="form-group row">
                                    <input id="line_pj" type="text" class="form-control col-md-12 auth-input @error('line_pj') is-invalid @enderror" name="line_pj" value="{{ $persembahan->line_pj ?? '' }}" autocomplete="line_pj" readonly  >

                                    @error('line_pj')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                        </div>
                    </form>
                    </div>
                @else
                @endif
            @endif

            @if (  $status_persembahan->status == 1 && $persem == 1  )
                <div class="home-card" style="margin-bottom:80px ">
                <br><br>
                <div class="col-md-10 m-auto text-md-center d-flex flex-nowrap">
                    <div class="alert col-md-12 alert-success shadow text-md-left">
                        <strong>Anda telah menyelesaikan pendaftaran audisi persembahan wisuda. &nbsp;Silakan bergabung ke grup Whatsapp dengan cara klik <a class="btn-link-verif" href="https://chat.whatsapp.com/Im9PfDSWtjN0onLXCeqYnd" target="_blank"> di sini</a>
                        <br><br>
                        Grup akan aktif memberikan informasi setelah pendaftaran audisi persembahan wisudawan ditutup.
                    </strong>
                    </div>
                </div>
                <form action="/lockRegistrasi" style="margin-top: -20px; border:none" class="form-auth col-md-10" style="border-top:none" method="POST"  enctype="multipart/form-data">
                    @csrf
                    <div class="card-auth-subtitle">
                        <label class="text-md-center">Nama Penanggung Jawab<label>
                    </div>
                    <div class="form-group row">
                                <input id="nama" type="text" class="form-control col-md-12 auth-input @error('nama') is-invalid @enderror" name="nama" value="{{ $mahasiswas->nama ?? '' }}" required autocomplete="nama" readonly  >

                                @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>

                    <div class="card-auth-subtitle">
                        <label class="text-md-center">Alamat Surel <i>(e-mail)</i><label>
                    </div>
                    <div class="form-group row">
                                <input id="email" type="text" class="form-control col-md-12 auth-input @error('email') is-invalid @enderror" name="email" value="{{ $mahasiswas->email ?? '' }}" required autocomplete="email" readonly  >

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>

                    <div class="card-auth-subtitle">
                        <label class="text-md-center">NPM<label>
                    </div>
                    <div class="form-group row">
                                <input id="npm" type="text" class="form-control col-md-12 auth-input @error('npm') is-invalid @enderror" name="npm" value="{{ $mahasiswas->npm ?? '' }}" required autocomplete="npm" readonly >

                                @error('npm')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>

                    <div class="card-auth-subtitle">
                        <label class="text-md-center">Program Studi<label>
                    </div>
                    <div class="form-group row">
                        <select id="prodi_id" name="prodi_id" class="form-control col-md-12 auth-input @error('prodi_id') is-invalid @enderror" readonly>
                            <option value="11" @if($mahasiswas->prodi_id == 11) selected @else disabled @endif >D III AKUNTANSI</option>
                            <option value="12" @if($mahasiswas->prodi_id == 12) selected @else disabled @endif >D III AKUNTANSI ALIH PROGRAM</option>
                            <option value="13" @if($mahasiswas->prodi_id == 13) selected @else disabled @endif >D IV AKUNTANSI </option>
                            <option value="14" @if($mahasiswas->prodi_id == 14) selected @else disabled @endif >D IV AKUNTANSI ALIH PROGRAM (Non Akt) </option>
                            <option value="15" @if($mahasiswas->prodi_id == 15) selected @else disabled @endif >D IV AKUNTANSI ALIH PROGRAM (Akt) </option>
                            <option value="21" @if($mahasiswas->prodi_id == 21) selected @else disabled @endif >D III PAJAK </option>
                            <option value="22" @if($mahasiswas->prodi_id == 22) selected @else disabled @endif >D III PAJAK ALIH PROGRAM </option>
                            <option value="23" @if($mahasiswas->prodi_id == 23) selected @else disabled @endif >D III PBB/PENILAI </option>
                            <option value="24" @if($mahasiswas->prodi_id == 24) selected @else disabled @endif >D III PBB/PENILAI ALIH PROGRAM 2018 </option>
                            <option value="25" @if($mahasiswas->prodi_id == 25) selected @else disabled @endif >D III PBB/PENILAI ALIH PROGRAM 2019 </option>
                            <option value="31" @if($mahasiswas->prodi_id == 31) selected @else disabled @endif >D III KEPABEANAN DAN CUKAI </option>
                            <option value="32" @if($mahasiswas->prodi_id == 32) selected @else disabled @endif >D III KEPABEANAN DAN CUKAI ALIH PROGRAM </option>
                            <option value="41" @if($mahasiswas->prodi_id == 41) selected @else disabled @endif >D III KEBENDAHARAAN NEGARA </option>
                            <option value="42" @if($mahasiswas->prodi_id == 42) selected @else disabled @endif >D III KEBENDAHARAAN NEGARA ALIH PROGRAM</option>
                            <option value="43" @if($mahasiswas->prodi_id == 43) selected @else disabled @endif >D III MANAJEMEN ASET </option>
                        </select>
                                {{-- <input id="prodi_id" type="text" class="form-control col-md-12 auth-input @error('prodi_id') is-invalid @enderror" name="prodi_id" value="{{ $mahasiswas->prodi_id ?? '' }}" required autocomplete="prodi_id"  > --}}

                                @error('prodi_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>

                    <div class="card-auth-subtitle">
                        <label class="text-md-center">Kelas<label>
                    </div>
                    <div class="form-group row">
                                <input id="kelas" type="text" class="form-control col-md-12 auth-input @error('kelas') is-invalid @enderror" name="kelas" value="{{ $mahasiswas->kelas ?? '' }}" required autocomplete="kelas" readonly  >

                                @error('kelas')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>

                    <div class="card-auth-subtitle">
                        <label class="text-md-center">Nama Tim<label>
                    </div>
                    <div class="form-group row">
                                <input id="nama_tim" type="text" class="form-control col-md-12 auth-input @error('nama_tim') is-invalid @enderror" name="nama_tim" value="{{ $persembahan->nama_tim ?? '' }}" required autocomplete="nama_tim" readonly  >

                                @error('nama_tim')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>

                    <div class="card-auth-subtitle">
                        <label class="text-md-center">Jenis Persembahan<label>
                    </div>
                    <div class="form-group row">
                        <select id="jenis_persembahan" name="jenis_persembahan" class="form-control col-md-12 auth-input @error('jenis_persembahan') is-invalid @enderror" readonly>
                            <option value="puisi" @if($persembahan->jenis_persembahan  ?? '' == "puisi" ) selected @else disabled @endif >Puisi</option>
                            <option value="band" @if($persembahan->jenis_persembahan ?? '' == "band" ) selected @else disabled @endif >Band</option>
                            <option value="solo" @if($persembahan->jenis_persembahan ?? '' == "solo" ) selected @else disabled @endif >Solo Vocal</option>
                            <option value="rap" @if($persembahan->jenis_persembahan ?? '' == "rap" ) selected @else disabled @endif >Rap Battle</option>
                            <option value="pwh" @if($persembahan->jenis_persembahan ?? '' == "pwh" ) selected @else disabled @endif >Performed with Household</option>
                        </select>
                                {{-- <input id="jenis_persembahan" type="text" class="form-control col-md-12 auth-input @error('jenis_persembahan') is-invalid @enderror" name="jenis_persembahan" value="{{ $persembahan->jenis_persembahan ?? '' }}" required autocomplete="jenis_persembahan"  > --}}

                                @error('jenis_persembahan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>

                    <div class="card-auth-subtitle">
                        <label class="text-md-center">Nomor Whatsapp<label>
                    </div>
                    <div class="form-group row">
                                <input id="wa_pj" type="text" class="form-control col-md-12 auth-input @error('wa_pj') is-invalid @enderror" name="wa_pj" value="{{ $persembahan->wa_pj ?? '' }}" required autocomplete="wa_pj" readonly  >

                                @error('wa_pj')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>

                    <div class="card-auth-subtitle">
                        <label class="text-md-center">ID Line<label>
                    </div>
                    <div class="form-group row">
                                <input id="line_pj" type="text" class="form-control col-md-12 auth-input @error('line_pj') is-invalid @enderror" name="line_pj" value="{{ $persembahan->line_pj ?? '' }}" autocomplete="line_pj" readonly  >

                                @error('line_pj')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                </form>
                </div>
            @endif


            <div class="home-card" style="margin-bottom:80px;height:auto;flex-direction:column;justify-content:start ">

                <div class="home-card-step-audisi">
                        <div class="step-caption-audisi">PENDAFTARAN AUDISI<br> PERSEMBAHAN WISUDAWAN</div>
                </div>
                <br>
                <div class="tile  col-md-12" id="tile-1">
                    <div class="col-faq">
                        <h3 class="h1-faq audisi">Lini Masa Persembahan Wisudawan</h3>
                        <br>
                    </div>
                    <br><br>
                    <div class="col-md-12">
                        @include('home.timeline')
                    </div>
                    <br><br>
                    <div class="col-faq">
                        <h3 class="h1-faq audisi">Ketentuan Persembahan Wisudawan</h3>
                    </div>
                        @include('home.ketentuan.ket')
                    <br><br>
                    <div class="col-faq">
                        <h3 class="h1-faq audisi">Ketentuan Jenis Persembahan Wisudawan</h3>
                        <br>
                    </div>
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs nav-justified d-flex flex-sm-row flex-wrap align-items-center" role="tablist" >
                      <div class="slider"></div>
                       <li class="nav-item d-flex flex-sm-row align-items-center justify-content-center" style="height: 80px;margin:0;padding:auto">
                          <a class="nav-link active d-flex flex-lg-column align-items-center " id="puisi-tab" data-toggle="tab" href="#puisi" role="tab"> Puisi</a>
                        </li>
                        <li class="nav-item d-flex flex-sm-row align-items-center justify-content-center" style="height: 80px;margin:0;padding:auto">
                          <a class="nav-link" id="band-tab" data-toggle="tab" href="#band" role="tab"> Band</a>
                        </li>
                        <li class="nav-item d-flex flex-sm-row align-items-center justify-content-center" style="height: 80px;margin:0;padding:auto">
                          <a class="nav-link" id="solo-tab" data-toggle="tab" href="#solo" role="tab"> Vokal Solo</a>
                        </li>
                        <li class="nav-item d-flex flex-sm-row align-items-center justify-content-center" style="height: 80px;margin:0;padding:auto">
                          <a class="nav-link" id="rap-tab" data-toggle="tab" href="#rap" role="tab"> <i>Rap Battle</i></a>
                        </li>
                        <li class="nav-item d-flex flex-sm-row align-items-center justify-content-center" style="height: 80px;margin:0;padding:auto">
                          <a class="nav-link" id="pwh-tab" data-toggle="tab" href="#pwh" role="tab"> PWH</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content" style="display: inline-block">
                    <div  class="tab-pane fade show active" id="puisi" role="tabpanel" aria-labelledby="puisi-tab">@include('home.ketentuan.ket-puisi')</div>
                    <div  class="tab-pane fade" id="band" role="tabpanel" aria-labelledby="band-tab">@include('home.ketentuan.ket-band')</div>
                    <div  class="tab-pane fade" id="solo" role="tabpanel" aria-labelledby="solo-tab">@include('home.ketentuan.ket-solo')</div>
                    <div  class="tab-pane fade" id="rap" role="tabpanel" aria-labelledby="rap-tab">@include('home.ketentuan.ket-rap')</div>
                    <div  class="tab-pane fade" id="pwh" role="tabpanel" aria-labelledby="pwh-tab">@include('home.ketentuan.ket-pwh')</div>

            <div class="modal-footer">
                {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
                    <br>
                    <div class="col-md-12 d-flex flex-nowrap justify-content-between"  style="padding: 0px;">
                        <div class="text-md-left">
                            <a href="https://ketpersem.wisudapknstan.id" target="_blank" class="btn-auth-secondary btn-secondary">
                                {{ __('Unduh Ketentuan') }} &nbsp;<i class="fas fa-file"></i>
                            </a>
                        </div>
                    @if($status_persembahan->status == 2 || empty($status_persembahan->status) || $persem == 1)
                    @else
                        <div class="text-md-right">
                            <a href="{{ route('daftarpersembahan') }}" class="btn-auth-primary btn-primary" style="background-color:#273e6c;">
                                {{ __('Daftar Sekarang') }} &nbsp;<i class="fa fa-angle-double-right"></i>
                            </a>
                        </div>
                    @endif
                    </div>
                    <br>
                </div>

                </div>
                </div>

            </div>
        </div>
    </div>
</div>
<script>

var fileinput = document.querySelector('.file-input');
var filedroparea = document.querySelector('.file-drop-area');
var jssetnumber = document.querySelector('.js-set-number');
fileinput.addEventListener('dragenter', isactive);
fileinput.addEventListener('focus', isactive);
fileinput.addEventListener('click', isactive);

// back to normal state
fileinput.addEventListener('dragleave', isactive);
fileinput.addEventListener('blur', isactive);
fileinput.addEventListener('drop', isactive);

// add Class
function isactive() {
  filedroparea.classList.add('is-active');
}

// change inner text
fileinput.addEventListener('change', function() {
  var count = fileinput.files.length;
  if (count === 1) {
    // if single file then show file name
    jssetnumber.innerText = fileinput.value.split('\\').pop();
  } else {
    // otherwise show number of files
    jssetnumber.innerText = count + ' files selected';
  }
});

</script>
<script>
    $("#tile-1 .nav-tabs a").click(function() {
    var position = $(this).parent().position();
    var width = $(this).parent().width();
    $("#tile-1 .slider").css({"left":+ position.left,"width":width});
});
var actWidth = $("#tile-1 .nav-tabs").find(".active").parent("li").width();
var actPosition = $("#tile-1 .nav-tabs .active").position();
$("#tile-1 .slider").css({"left":+ actPosition.left,"width": actWidth});

</script>
@endsection

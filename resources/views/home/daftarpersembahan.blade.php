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
            <div class="home-card" style="margin-bottom:80px ">

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>

                @if($status_persembahan->status == 2)

                <div class="locked col-md-12 text-md-right">
                    <div class="alert alert-light alert-block animate alert-dismissible fade show shadow text-md-center"  role="alert" aria-live="polite" aria-atomic="true" data-delay="3000" data-autohide="true" data-animate="fadeInUp" role="alert">
                        <strong>Pendaftaran Persembahan Wisudawan Telah Ditutup</strong>
                    </div>
                </div>

                @if ( $persem == 1 )
                <form action="/lockRegistrasi" class="form-auth col-md-10" style="border-top:none" method="POST"  enctype="multipart/form-data">
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
                        <label class="text-md-center">Nama Penampil (vokal solo/puisi) atau Nama Grup<label>
                    </div>
                    <div class="form-group row">
                                <input id="nama_tim" type="text" class="form-control col-md-12 auth-input @error('nama_tim') is-invalid @enderror" name="nama_tim" value="{{ $persembahan->nama_tim ?? '' }}" required autocomplete="nama_tim" readonly  >

                                @error('nama_tim')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>

                    {{-- <div class="card-auth-subtitle">
                        <label class="text-md-center">Anggota Tim<label>
                    </div>
                    <div class="form-group row">
                                <input id="nama_tim" type="text" class="form-control col-md-12 auth-input @error('nama_tim') is-invalid @enderror" name="nama_tim" value="{{ $persembahan->nama_tim ?? '' }}" required autocomplete="nama_tim" readonly  >
                                <button onclick="addFields()">
                                @error('nama_tim')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div> --}}

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
                @else

                @endif
                @else

                @if ( $persem == 1 )
                <div class="col-md-10 m-auto text-md-center d-flex flex-nowrap">
                    <div class="alert col-md-12 alert-success shadow text-md-left">
                        <strong>Selamat! Anda telah menyelesaikan pendaftaran audisi persembahan wisudawan.
                        Silakan bergabung ke grup Whatsapp dengan cara klik <a class="btn-link-verif" href="https://chat.whatsapp.com/Im9PfDSWtjN0onLXCeqYnd" target="_blank"> di sini</a>
                        <br><br>
                        Grup akan aktif memberikan informasi setelah pendaftaran audisi persembahan wisudawan ditutup.
                    </strong>
                    </div>
                </div>
                <form action="/lockRegistrasi" class="form-auth col-md-10" style="border-top:none" method="POST"  enctype="multipart/form-data">
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
                        <label class="text-md-center">Nama Penampil (vokal solo/puisi) atau Nama Grup<label>
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
{{--
                @elseif($mahasiswas->status_registrasi == 1)

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

                    <form action="/lockRegistrasi" class="form-auth col-md-10" method="POST"  enctype="multipart/form-data">
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
                                     <input id="prodi_id" type="text" class="form-control col-md-12 auth-input @error('prodi_id') is-invalid @enderror" name="prodi_id" value="{{ $mahasiswas->prodi_id ?? '' }}" required autocomplete="prodi_id"  >

                                    @error('prodi_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                        </div>

                        <div class="form-group row justify-content-between" style="margin: 30px 0 18px 0">
                                <div class="btn-area col-md-6 text-md-left">
                                    <a href="{{ route('editregistrasi') }}" class="btn-auth-secondary btn-secondary">
                                        {{ __('Ubah Data') }} <i class="fas fa-edit"></i>
                                    </a>
                                </div>
                                <div class="btn-area col-md-6 text-md-right">
                                    <button type="submit" class="btn-auth btn-primary">
                                        {{ __('Kunci Data') }} <i class="fas fa-lock"></i>
                                    </button>
                                </div>
                            </div>
                    </form>--}}
                @else

                <form action="/lockdaftarPersembahan" class="form-auth col-md-10" style="border-top:none" method="POST"  enctype="multipart/form-data">
                    @csrf

                    <div class="home-card-title" style="font-size: 36px;margin-top: -50px">
                        Silakan Isi Data Berikut<br>
                        <div style="font-size: 14px; font-weight:500">
                            <b>(Pengisian hanya dapat dilakukan satu kali)</b>
                        </div>
                    </div>

                    <hr><br>

                    <div class="card-auth-subtitle">
                        <label class="text-md-center">Nama Penanggung Jawab<label>
                    </div>
                    <div class="form-group row">
                                <input id="nama" type="text" class="form-control col-md-12 auth-input @error('nama') is-invalid @enderror" name="nama" value="{{ $mahasiswas->nama ?? '' }}" required autocomplete="nama"  >

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
                                <input id="email" type="text" class="form-control col-md-12 auth-input @error('email') is-invalid @enderror" name="email" value="{{ $mahasiswas->email ?? '' }}" required autocomplete="email"  >

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
                                <input id="npm" type="text" class="form-control col-md-12 auth-input @error('npm') is-invalid @enderror" name="npm" value="{{ $mahasiswas->npm ?? '' }}" required autocomplete="npm" >

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
                        <select id="prodi_id" name="prodi_id" class="form-control col-md-12 auth-input @error('prodi_id') is-invalid @enderror">
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
                                <input id="kelas" type="text" class="form-control col-md-12 auth-input @error('kelas') is-invalid @enderror" name="kelas" value="{{ $mahasiswas->kelas ?? '' }}" required autocomplete="kelas"  >

                                @error('kelas')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>

                    <div class="card-auth-subtitle">
                        <label class="text-md-center">Nama Penampil (vokal solo/puisi) atau Nama Grup<label>
                    </div>
                    <div class="form-group row">
                                <input id="nama_tim" type="text" class="form-control col-md-12 auth-input @error('nama_tim') is-invalid @enderror" name="nama_tim" value="{{ $persembahan->nama_tim ?? '' }}" required autocomplete="nama_tim"  >

                                @error('nama_tim')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>

                    {{-- <div class="card-auth-subtitle">
                        <label class="text-md-center">Anggota Tim<label>
                    </div>
                    <div class="form-group row field_wrapper">
                            <div class="col-md-12 d-flex flex-nowrap" style="margin: 8px -12px 0 -12px">
                                <input type="text" name="field_name[]" class="form-control col-md-10 auth-input" value=""/>
                                <a href="javascript:void(0);" class="add_button col-md-2 text-md-center" title="Add field"><i class="fas fa-plus-circle"></i> </a>
                            </div>
                            <br><br>
                        @error('nama_tim')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div> --}}

                    <div class="card-auth-subtitle">
                        <label class="text-md-center">Jenis Persembahan<label>
                    </div>
                    <div class="form-group row">
                        <select id="jenis_persembahan" name="jenis_persembahan" class="form-control col-md-12 auth-input @error('jenis_persembahan') is-invalid @enderror">
                            <option value="" selected disabled ></option>
                            <option value="puisi" @if(!empty($persembahan->jenis_persembahan)) @if($persembahan->jenis_persembahan == "puisi") selected @endif @endif >Puisi</option>
                            <option value="band" @if(!empty($persembahan->jenis_persembahan)) @if($persembahan->jenis_persembahan == "band") selected @endif @endif >Band</option>
                            <option value="solo" @if(!empty($persembahan->jenis_persembahan)) @if($persembahan->jenis_persembahan == "solo") selected @endif @endif >Solo Vocal</option>
                            <option value="rap" @if(!empty($persembahan->jenis_persembahan)) @if($persembahan->jenis_persembahan == "rap") selected @endif @endif >Rap Battle</option>
                            <option value="pwh" @if(!empty($persembahan->jenis_persembahan)) @if($persembahan->jenis_persembahan == "pwh") selected @endif @endif >Performed with Household</option>
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
                                <input id="wa_pj" type="text" class="form-control col-md-12 auth-input @error('wa_pj') is-invalid @enderror" name="wa_pj" value="{{ $persembahan->wa_pj ?? '' }}" required autocomplete="wa_pj"  >

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
                                <input id="line_pj" type="text" class="form-control col-md-12 auth-input @error('line_pj') is-invalid @enderror" name="line_pj" value="{{ $persembahan->line_pj ?? '' }}"  autocomplete="line_pj"  >

                                @error('line_pj')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>

                    <div class="agreement form-group row col-md-12">
                        <input type="checkbox" id="aggreement" name="aggreement" class="agreement-check" required value="Donut">
                        <label for="aggreement"  class="agreement-label">Dengan menyimpan data, saya menyatakan bahwa jika terpilih saya siap mengikuti seluruh arahan panitia, jadwal latihan yang ditetapkan, dan juga bersedia untuk melakukan kolaborasi dengan penampilan wisudawan lainnya.</label><br>
                    </div>

                    <div class="form-group row" style="margin: 30px 0 18px 0">
                        <div class="btn-area col-md-12 text-md-center">
                            <button type="submit" class="btn-auth btn-primary">
                                {{ __('Simpan') }}
                            </button>
                        </div>
                    </div>

                    </form>
                @endif
                @endif
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        var maxField = 9; //Input fields increment limitation
        var addButton = $('.add_button'); //Add button selector
        var wrapper = $('.field_wrapper'); //Input field wrapper
        var fieldHTML = '<div class="col-md-12 d-flex flex-nowrap" style="margin: 8px -12px 0 -12px"><input type="text" class="form-control col-md-10 auth-input col-md-4" name="field_name[]" value=""/><a href="javascript:void(0);" class="remove_button col-md-2 text-md-center"><i class="fas fa-minus-circle"></i></a></div><br><br>'; //New input field html
        var x = 1; //Initial field counter is 1

        //Once add button is clicked
        $(addButton).click(function(){
            //Check maximum number of input fields
            if(x < maxField){
                x++; //Increment field counter
                $(wrapper).append(fieldHTML); //Add field html
            }
        });

        //Once remove button is clicked
        $(wrapper).on('click', '.remove_button', function(e){
            e.preventDefault();
            $(this).parent('div').remove(); //Remove field html
            x--; //Decrement field counter
        });
    });
    </script>
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
@endsection

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
            <br>
            @include("home.countdown")
            <div class="home-title" style="color: #11343A;">Selamat {{$salam ??''}}, {{ $mahasiswas->nama ??'' }}</div>

            @include("home.slide")

            <div class="home-card">
                <div class="home-card-body col-md-12">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="col-md-12">
                    <tr>
                    <td>
                    <div class="status col-md-8 text-md-left">

                        <p><b>Status Pendaftaran Wisuda</b></p>

                    </div>
                    </td>
                    <td class="float-right">
                    <div class="status col-md-4 text-md-right">
                        @if ( $mahasiswas->status_registrasi  == 1)
                            <button class="btn btn-warning">Belum Dikunci</button>
                        @elseif ($mahasiswas->status_registrasi  == 2)
                            <button class="btn btn-success">Berhasil <i class="fas fa-check-circle"></i></button>
                        @else
                            <button class="btn btn-danger">Kosong</button>
                        @endif
                    </div>
                    </td>
                    </tr>
                    <tr>
                    <td>
                    <div class="status col-md-8 text-md-left">

                        <p><b>Status Konfirmasi Pendataan Ukuran Toga</b></p>

                    </div>
                    </td>
                    <td class="float-right">
                    <div class="status col-md-4 text-md-right">
                        @if ($mahasiswas->status_ambil_toga  == 1)
                            <button class="btn btn-warning">Belum Dikunci</button>
                        @elseif ($mahasiswas->status_ambil_toga  == 2 || $mahasiswas->status_ambil_toga == 3)
                            <button class="btn btn-success">Berhasil <i class="fas fa-check-circle"></i></button>
                        @else
                            <button class="btn btn-danger">Kosong</button>
                        @endif
                    </div>
                    </td>
                    </tr>
                    <tr>
                    <td>
                    
                    </td>
                    </tr>
                    @if($status_iuran->status >= 0)
                    <tr>
                    <td>
                    <div class="status col-md-8 text-md-left">

                        <p><b>Status Pembayaran</b></p>

                    </div>
                    </td>
                    <td class="float-right">
                    <div class="status col-md-4 text-md-right">
                        @if ($getInvoices['status'] == "EXPIRED" ?? $mahasiswas->status_iuran  == 0)
                            <button class="btn btn-warning">Belum Dibayar</button>
                        @elseif ( $getInvoices['status'] == "PENDING" ?? $mahasiswas->status_iuran  == 1)
                            <button class="btn btn-warning">Belum Dibayar</button>
                        @elseif ($getInvoices['status'] == "PAID" ?? $mahasiswas->status_iuran == 3 )
                            <button class="btn btn-success">Berhasil <i class="fas fa-check-circle"></i></button>
                        @elseif ($getInvoices['status'] == "SETTLED" ?? $mahasiswas->status_iuran == 3)
                            <button class="btn btn-success">Berhasil <i class="fas fa-check-circle"></i></button>
                        @else
                            <button class="btn btn-danger">Kosong</button>
                        @endif
                    </div>
                    </td>
                    </tr>
                    @endif
                    </table>
                </div>
            </div>

            <div class="menus col-md-12">
                <a class="menus-link" href="{{ route('registrasi') }}">
                    <div class="col-md-6">
                    <div class="menus-button">
                        <div class="menus-icon">
                            <img src="{{ asset('img/regist.png')}}">
                        </div>
                        <div class="menus-caption" style="color: #11343a">
                            {{ __('Pendaftaran Wisuda') }}
                        </div>
                    </div>
                    </div>
                </a>
                <a class="menus-link"  >
                    <div class="col-md-6" data-toggle="modal" data-target="#exampleModal2">
                    <div @if($status_toga->status == 1) class="menus-button-nonactive" @else class="menus-button" @endif>
                        <div class="menus-icon">
                            <img src="{{ asset('img/toga.png')}}">
                        </div>
                        <div class="menus-caption" style="color: #11343a">
                            {{ __('Konfirmasi Pendataan Ukuran Toga') }}
                        </div>
                    </div>
                    </div>
                </a>
                
                @if($status_iuran->status >= 0)
                    <a class="menus-link" href="{{ route('iuran') }}">
                        <div class="col-md-6">
                        <div class="menus-button ">
                            <div class="menus-icon">
                                <img src="{{ asset('img/bayar.png')}}">
                            </div>
                            <div class="menus-caption" style="color: #11343a">
                                {{ __('Pembayaran') }}
                            </div>
                        </div>
                        </div>
                    </a>
                @endif
            </div>

        </div>
    </div>
</div>

<div class="modal fade bd-example-modal-lg" id="exampleModal2" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog rounded border-0 modal-lg" role="document">
      <div class="modal-content rounded border-0">
        <div class="modal-header header-popup" style="background-color: #11343A;">
          <h5 class="modal-title title-popup" style="font-family: Fontin;" id="exampleModalLabel">Pendataan Toga</h5>
          <button type="button" class="close white" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="row-faq">
                <div class="col-faq">
                    <h1 class="h1-faq">F.A.Q Pendataan Toga</h1>
                    <br>
                  <div class="tabs">
                    <div class="tab">
                      <input class="input-faq" type="radio" id="rd1" name="rd" checked>
                      <label class="tab-label" for="rd1">Apa itu pendataan toga wisudawan?</label>
                      <div class="tab-content">
                        Pendataan toga wisudawan merupakan pendataan mengenai ukuran toga wisudawan dan alamat pengiriman paket toga nantinya, sehingga diharapkan calon wisudawan mengisi data dengan selengkap-lengkapnya.
                      </div>
                    </div>
                    <div class="tab">
                      <input class="input-faq" type="radio" id="rd2" name="rd">
                      <label class="tab-label" for="rd2">Berapa jumlah iuran wisudawan dan bagaimana rincian biayanya?</label>
                      <div class="tab-content">
                        Hingga saat ini kami masih menunggu hasil keputusan dari pihak Lembaga dan BPPK. Jika sudah ada hasil keputusannya, akan kami beritahukan mengenai jumlah dan rincian iuran wisudawan.
                      </div>
                    </div>
                    <div class="tab">
                      <input class="input-faq" type="radio" id="rd3" name="rd">
                      <label class="tab-label" for="rd3">Apakah wajib mengisi Pendataan Toga mengingat belum adanya jumlah iuran wisudawan?</label>
                      <div class="tab-content">
                        Seluruh wisudawan diharapkan tetap mengisi pendataan toga meskipun belum ada keputusan mengenai jumlah iuran wisudawan. Data yang diterima akan digunakan sebagai bahan pertimbangan oleh Lembaga untuk memberikan subsidi.
                      </div>
                    </div>
                    <div class="tab">
                      <input class="input-faq" type="radio" id="rd4" name="rd">
                      <label class="tab-label" for="rd4">Kapan batas akhir pengisian Pendataan Toga?</label>
                      <div class="tab-content">
                        Masa pengisian Pendataan Toga dapat dilakukan hingga waktu yang ditentukan
                        <!-- <b>Minggu, 8 Agustus 2021 pukul 20.00 WIB.</b> -->
                      </div>
                    </div>
                    <div class="tab">
                      <input class="input-faq" type="radio" id="rd5" name="rd">
                      <label class="tab-label" for="rd5">Jika ingin melakukan pengisian untuk pendataan toga, apakah harus melakukan pendaftaran wisuda?</label>
                      <div class="tab-content">
                        Ya. Wisudawan harus melakukan pendaftaran terlebih dahulu sebelum melakukan pendataan toga.
                      </div>
                    </div>
                    
                    <div class="tab">
                      <input class="input-faq" type="radio" id="rd7" name="rd">
                      <label class="tab-label" for="rd7">Jika waktu pengisian pendataan toga wisudawan telah ditutup, apakah calon wisudawan masih dapat melakukan perubahan data?</label>
                      <div class="tab-content">
                        Wisudawan dapat menghubungi LO masing-masing jika ada perubahan data.
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <br><br>
        </div>
        <div class="modal-footer">
        {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
            <br>
            <div class="col-md-12 text-md-right">
                <a href="{{ route('toga') }}" class="btn-auth-primary btn-primary" style="background-color: #11343A;">
                    {{ __('Lakukan Pendataan Toga') }} &nbsp;<i class="fa fa-angle-double-right"></i>
                </a>
            </div>
            <br>
        </div>
      </div>
    </div>
  </div>




  <script>
    window.addEventListener('load', function(){
            var myAudio = document.getElementById("myAudio");

            myAudio.onplaying = function() {
              isPlaying = true;
            };
            myAudio.onpause = function() {
              isPlaying = false;
            };
        });

        audioElement.addEventListener('ended', function() {
            this.currentTime = 0;
            this.play();
        }, false)

        var isPlaying = false;

        function togglePlay() {
            if (isPlaying) {
                myAudio.pause();
                document.getElementById("playBtn").className = "fas fa-play shake";
            } else {
                myAudio.play();
                document.getElementById("myAudio").loop = true;
                document.getElementById("playBtn").className = "fas fa-pause";
            }
        }
</script>
  @endsection

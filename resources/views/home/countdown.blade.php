
<div class="home-title" style="text-align: center;font-size:28px;margin-bottom:0px; color: #11343A;">Menuju Wisuda Akbar PKN STAN 2022</div>
    <div class="countdown d-flex flex-nowrap justify-content-between align-items-center">
        <div class="image-rotate-countdown " >
            <img src="{{asset('img/logo_angkatan.png')}}" class="logo-rotating-countdown" alt="" style="margin: 0 20px 0 20px;" >
        </div>
        <div class="timer flex-w flex-c cd100 col-md-9">
            <div class="flex-col-c-m size2 how-countdown" style="background:#11343A">
                <span class="l1-txt1 p-b-9 days">35</span>
                <span class="s1-txt1">Hari</span>
            </div>

            <div class="flex-col-c-m size2 how-countdown" style="background:#11343A">
                <span class="l1-txt1 p-b-9 hours">17</span>
                <span class="s1-txt1">Jam</span>
            </div>

            <div class="flex-col-c-m size2 how-countdown" style="background:#11343A">
                <span class="l1-txt1 p-b-9 minutes">50</span>
                <span class="s1-txt1">Menit</span>
            </div>

            <div class="flex-col-c-m size2 how-countdown" style="background:#11343A">
                <span class="l1-txt1 p-b-9 seconds">39</span>
                <span class="s1-txt1">Detik</span>
            </div>
        </div>
        <div class="image-rotate-2-countdown">
            <img src="{{asset('img/logo_angkatan.png')}}" class="logo-rotating-countdown" alt=""style="margin: 0 -20px 0 -20px;" >
        </div>
</div>
<audio id="myAudio" src="{{asset('audio/backsound_wisuda.mp3')}}" preload="auto"></audio>
<div class="home-title btn-countdown d-flex flex-nowrap justify-content-between">4 Oktober 2022 &nbsp; <i onClick="togglePlay()" class="fas fa-play shake" id="playBtn" style="background:#11343A"></i></div>


<!--===============================================================================================-->
    <script src="{{asset('js/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('js/vendor/bootstrap/js/popper.js')}}"></script>
	<script src="{{asset('js/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('js/vendor/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('js/vendor/countdowntime/moment.min.js')}}"></script>
	<script src="{{asset('js/vendor/countdowntime/moment-timezone.min.js')}}"></script>
	<script src="{{asset('js/vendor/countdowntime/moment-timezone-with-data.min.js')}}"></script>
	<script src="{{asset('js/vendor/countdowntime/countdowntime.js')}}"></script>
	<script>
		$('.cd100').countdown100({
			/*Set Endtime here*/
			/*Endtime must be > current time*/
			endtimeYear: 2022,
			endtimeMonth: 10,
			endtimeDate: 4,
			endtimeHours: 0,
			endtimeMinutes: 0,
			endtimeSeconds: 0,
			timeZone: "Asia/Jakarta"
			// ex:  timeZone: "America/New_York"
			//go to " http://momentjs.com/timezone/ " to get timezone
		});
	</script>
<!--===============================================================================================-->
	<script src="{{asset('js/vendor/tilt/tilt.jquery.min.js')}}"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="{{asset('js/js/main.js')}}"></script>

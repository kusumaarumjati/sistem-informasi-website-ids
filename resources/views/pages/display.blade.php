@extends('layout.template')
@section('page_title','Scoreboard')
@section('custom_css')
<meta name="csrf-token" konten="{{ csrf_token() }}">
<!-- Data tables -->
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset ('assets')}}/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset ('assets')}}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{asset ('assets')}}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset ('assets')}}/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
@endsection

@section('title', 'Scoreboard')

@section('breadcrumb')
 <li class="breadcrumb-item"><a href="#">Home</a></li>
  <li class="breadcrumb-item active">Scoreboard</li>
@endsection

@section('content')
<div class="content ">
<audio id="audio1">
 <source src="{{ asset('assets/audio-1/sound1.mp3') }}" type="audio/mpeg">
  Your browser does not support the audio element.
</audio>

<audio id="audio2">
 <source src="{{ asset('assets/audio-1/sound2.mp3') }}" type="audio/mpeg">
  Your browser does not support the audio element.
</audio>

<audio id="audio3">
 <source src="{{ asset('assets/audio-1/sound3.mp3') }}" type="audio/mpeg">
  Your browser does not support the audio element.
</audio>

<audio id="audio4">
 <source src="{{ asset('assets/audio-1/sound4.mp3') }}" type="audio/mpeg">
  Your browser does not support the audio element.
</audio>

<br>
<div class="container" style="padding-left: 200px">
<div class="table-responsive">
  <table class="table table-bordered table-hover">
    <thead class="thead-dark" style="text-align: center;">
      <tr style="color: black">
        <td>
          <h1 style="color: red" class="col md-4" id="name_home">A</h1>
        </td>
         <td>
          <h2>Timer = <span id="timer">09 : 00</span></h2>
        </td>
        <td>
          <h1 style="color: blue" class="col md-4" id="name_away">B</h1>
        </td>
      </tr>

      <tr style="color: black">
        <td>
          <h1 class="col md-4" id="score_home">0</h1>
        </td>
         <td>
          <div></span></div>
        </td>
        <td>
          <h1 class="col md-4" id="score_away">0</h1>
        </td>
      </tr>
    </thead>
  </table>
</div>  
</div>
    

@endsection

@section('js_custom')
<script>
var stop;
var menit;
var detik;
window.onload = function() {
    var sse = new EventSource("/scoreboard/sse");
      sse.onmessage = function(e) {
          console.log(e);
          var data_json = JSON.parse(e.data);
          document.getElementById("name_home").innerHTML=data_json[0].name_home;
          document.getElementById("name_away").innerHTML=data_json[0].name_away;
          document.getElementById("score_home").innerHTML=data_json[0].score_home;
          document.getElementById("score_away").innerHTML=data_json[0].score_away;

      
          

          if(data_json[0].musik==1){
            var audio1 = document.getElementById("audio1");
            stop_audio2_audio3();
            audio1.play();
            update_sound();
          }

          if(data_json[0].musik==2){
            var audio2 = document.getElementById("audio2");
            stop_audio1_audio3();
            audio2.play();
            update_sound();
          }

          if(data_json[0].musik==3){
            var audio3 = document.getElementById("audio3");
            stop_audio1_audio2();
            audio3.play();
            update_sound();
          }
          
          document.getElementById('timer').innerHTML = data_json[0].menit + ":" + data_json[0].detik;
          
          if(data_json[0].status_waktu==1){
            startTimer();


            function startTimer() {
            
                    var presentTime = document.getElementById('timer').innerHTML;
                    var timeArray = presentTime.split(/[:]+/);
                    var m = timeArray[0];
                    var s = checkSecond((timeArray[1] - 1));
                    if(s==59){m=m-1}
                    if(m<0){
                        if(data_json[0].menit==0 && data_json[0].detik==00){
                            var audio4 = document.getElementById("audio4");
                            audio4.play();
                            
                        }
                        
                    }
                    else{
                        menit = m;
                        detik = s;
                        insert_menit_detik();
                        console.log(m);
                        console.log(s);
                        setTimeout(startTimer, 1000*1000);
                    }
                }

                function checkSecond(sec) {
                        if (sec < 10 && sec >= 0) {sec = "0" + sec}; 
                        if (sec < 0) {sec = "59"};
                        return sec;
                }
          }
      
          


        //   tutup-sse
      }
}



function insert_menit_detik(){
             
      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
        var url = '{{ url('update-menit-detik') }}';

        $.ajax({
           url:url,
           method:'POST',
           data:{
              name_menit:menit, 
              name_detik:detik, 
           },
           success:function(response){
              if(response.success){
                  // console.log(response.message);
              }else{
                  // alert("Error")
              }
           },
           error:function(error){
              console.log(error)
           }
                });
}

function stop_audio1_audio2(){
      audio1.pause();
      audio1.currentTime = 0;
      audio2.pause();
      audio2.currentTime = 0;
}

function stop_audio2_audio3(){
      audio2.pause();
      audio2.currentTime = 0;
      audio3.pause();
      audio3.currentTime = 0;
}

function stop_audio1_audio3(){
      audio1.pause();
      audio1.currentTime = 0;
      audio3.pause();
      audio3.currentTime = 0;
}

function update_sound(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
        var url = '{{ url('update-sound') }}';

        $.ajax({
           url:url,
           method:'POST',
           data:{
              
           },
           success:function(response){
              if(response.success){
                  console.log(response.message);
              }else{
                  // alert("Error")
              }
           },
           error:function(error){
              console.log(error)
           }
                });
        }
</script>

@endsection
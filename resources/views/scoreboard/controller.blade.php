<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <title>Scoreboard</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('/assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('/assets/css/components.css') }}">
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <br><br>
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col d-flex align-items-center justify-content-center">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="col d-flex align-items-center justify-content-center">
                                            <div class="table-responsive col-md-8">
                                                <table class="table table-active text-center table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <td colspan="3">
                                                                <h4>SCOREBOARD CONTROLLER</h4>
                                                            </td>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td align="center">
                                                                <br>
                                                                <input type="text" id="home" name="home" class="form-control" value="" placeholder="Home"><hr>
                                                                <h6>HOME SCORE</h6>
                                                                <div class="form-inline" style="display: flex; justify-content: center; align-items: center;">
                                                                    <div class="form-group mb-2">
                                                                        <button type="button" class="btn btn-outline-primary home_score_min" style="margin-right:5px">
                                                                            <i class="fas fa-minus"></i>
                                                                        </button>
                                                                        <div id="home_score" style="display:table-cell; border: 5px solid black; width: 80px; height: 80px; vertical-align: middle; text-align: center; font-size: 48px;">
                                                                            0
                                                                        </div>
                                                                        <button type="button" class="btn btn-outline-primary home_score_plus" style="margin-left:5px">
                                                                            <i class="fas fa-plus"></i>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                                <button type="button" class="btn btn-warning home_score_reset">
                                                                    Reset
                                                                </button>
                                                                <button type="button" class="btn btn-primary update">
                                                                    Update
                                                                </button><hr>
                                                                <h6>FOUL</h6>
                                                                <div class="form-inline" style="display: flex; justify-content: center; align-items: center;">
                                                                    <div class="form-group mb-2">
                                                                        <button type="button" class="btn btn-outline-primary home_foul_min" style="margin-right:5px">
                                                                            <i class="fas fa-minus"></i>
                                                                        </button>
                                                                        <div id="home_foul" style="display:table-cell; border: 5px solid black; width: 80px; height: 80px; vertical-align: middle; text-align: center; font-size: 48px;">
                                                                            0
                                                                        </div>
                                                                        <button type="button" class="btn btn-outline-primary home_foul_plus" style="margin-left:5px">
                                                                            <i class="fas fa-plus"></i>
                                                                        </button>
                                                                    </div>
                                                                </div></br>
                                                                <button type="button" class="btn btn-warning home_foul_reset">
                                                                    Reset
                                                                </button>

                                                                <button type="button" class="btn btn-primary update">
                                                                    Update
                                                                </button>
                                                            </td>
                                                            <td>

                                                            <button type="button" class="btn btn-warning reset_scoreboard">
                                                                    Reset
                                                            </button>
                                                            <button type="button" class="btn btn-primary update">
                                                                    Update
                                                            </button><hr>
                                                            <h6>BABAK</h6>
                                                                <div class="form-inline" style="display: flex; justify-content: center; align-items: center;">
                                                                    <div class="form-group mb-2">
                                                                        <button type="button" class="btn btn-outline-primary min_period" style="margin-right:5px">
                                                                            <i class="fas fa-minus"></i>
                                                                        </button>
                                                                        <div id="period" style="display:table-cell; border: 5px solid black; width: 80px; height: 80px; vertical-align: middle; text-align: center; font-size: 48px;">
                                                                            1
                                                                        </div>
                                                                        <button type="button" class="btn btn-outline-primary plus_period" style="margin-right:5px">
                                                                            <i class="fas fa-plus"></i>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                                <button type="button" class="btn btn-primary update">
                                                                    Update
                                                                </button><hr>
                                                                <h6>Timer</h6>
                                                                <button type="button" class="btn btn-warning reset_timer">
                                                                    Reset
                                                                </button>
                                                                <button type="button" class="btn btn-danger stop">
                                                                    Stop
                                                                </button>
                                                                <button type="button" class="btn btn-primary start">
                                                                    Start
                                                                </button>
                                                                <hr>
                                                                <!-- <h6>Sound</h6>
                                                                <input type="hidden" value="0" id="sound_status">
                                                                <button type="button" class="btn btn-outline-dark sound1">
                                                                    Sound 1
                                                                </button>
                                                                <button type="button" class="btn btn-outline-dark sound2">
                                                                    Sound 2
                                                                </button>
                                                                <button type="button" class="btn btn-outline-dark sound3">
                                                                    Sound 3
                                                                </button> -->
                                                            </td>
                                                            <td align="center">
                                                                <br>
                                                                <input type="text" id="away" name="away" class="form-control" value="" placeholder="Away"><hr>
                                                                <h6>AWAY SCORE</h6>
                                                                <div class="form-inline" style="display: flex; justify-content: center; align-items: center;">
                                                                    <div class="form-group mb-2">
                                                                        <button type="button" class="btn btn-outline-primary away_score_min" style="margin-right:5px">
                                                                            <i class="fas fa-minus"></i>
                                                                        </button>
                                                                        <div id="away_score" style="display:table-cell; border: 5px solid black; width: 80px; height: 80px; vertical-align: middle; text-align: center; font-size: 48px;">
                                                                            0
                                                                        </div>
                                                                        <button type="button" class="btn btn-outline-primary away_score_plus" >
                                                                            <i class="fas fa-plus"></i>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                                <button type="button" class="btn btn-warning away_score_reset">
                                                                    Reset
                                                                </button>
                                                                <button type="button" class="btn btn-primary update">
                                                                    Update
                                                                </button><hr>
                                                                <h6>FOUL</h6>
                                                                <div class="form-inline" style="display: flex; justify-content: center; align-items: center;">
                                                                    <div class="form-group mb-2">
                                                                        <button type="button" class="btn btn-outline-primary away_foul_min" style="margin-right:5px">
                                                                            <i class="fas fa-minus"></i>
                                                                        </button>
                                                                        <div id="away_foul" style="display:table-cell; border: 5px solid black; width: 80px; height: 80px; vertical-align: middle; text-align: center; font-size: 48px;">
                                                                            0
                                                                        </div>
                                                                        <button type="button" class="btn btn-outline-primary away_foul_plus" style="margin-left:5px">
                                                                            <i class="fas fa-plus"></i>
                                                                        </button>
                                                                    </div>
                                                                </div></br>
                                                                <button type="button" class="btn btn-warning away_foul_reset">
                                                                    Reset
                                                                </button>
                                                                <button type="button" class="btn btn-primary update">
                                                                    Update
                                                                </button>
                                                            </td>
                                                        </tr> 
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="{{ asset('assets/js/stisla.js')}}"></script>

  <!-- JS Libraies -->

  <!-- Template JS File -->
  <script src="{{ asset('assets/js/scripts.js')}}"></script>
  <script src="{{ asset('assets/js/custom.js')}}"></script>

</body>
<!-- <script src="{{ asset('/assets/scoreboard.js') }}"></script> -->
<script>
    $(document).ready(function() {

// const menu = document.getElementById("scoreboard");
// menu.classList.add("active"); 

// SCOREBOARD
// Home Score
$('.home_score_plus').on('click', function(){
    let score = document.getElementById('home_score').innerHTML;
    // console.log(score);
    if(score >= 0){
        document.getElementById('home_score').innerHTML = parseInt(score) + 1;
    }
    var id = 1;

    let home_score = document.getElementById('home_score').innerHTML;
    let away_score = document.getElementById('away_score').innerHTML;
    let home_foul = document.getElementById('home_foul').innerHTML;
    let away_foul = document.getElementById('away_foul').innerHTML;
    let home = document.getElementById('home').value;
    let away = document.getElementById('away').value;
    let period = document.getElementById('period').innerHTML;

    $.ajax({
        type: 'POST',
        url: '/scoreboard-controller/update',
        data: {
            "_token": "{{ csrf_token() }}",
            id : id,
            home : home,
            away : away,
            home_score : home_score,
            away_score : away_score,
            home_foul : home_foul,
            away_foul : away_foul,
            period : period
        },
    });
});

$('.home_score_min').on('click', function(){
    let score = document.getElementById('home_score').innerHTML;
    if(score > 0){
        document.getElementById('home_score').innerHTML = parseInt(score) - 1;
    }
});

$('.home_score_reset').on('click', function(){
    if(document.getElementById('home_score').innerHTML != 0){
        document.getElementById('home_score').innerHTML = 0;
    }
    
});

// Away Score
$('.away_score_plus').on('click', function(){
    let score = document.getElementById('away_score').innerHTML;
    if(score >= 0){
        document.getElementById('away_score').innerHTML = parseInt(score) + 1;
    }
});

$('.away_score_min').on('click', function(){
    let score = document.getElementById('away_score').innerHTML;
    if(score > 0){
        document.getElementById('away_score').innerHTML = parseInt(score) - 1;
    }
});
$('.away_score_reset').on('click', function(){
    if(document.getElementById('away_score').innerHTML != 0){
        document.getElementById('away_score').innerHTML = 0;
    }
    
});

// Home Foul
$('.home_foul_plus').on('click', function(){
    let foul = document.getElementById('home_foul').innerHTML;
    if(foul >= 0 && foul < 6){
        document.getElementById('home_foul').innerHTML = parseInt(foul) + 1;
    }
});

$('.home_foul_min').on('click', function(){
    let foul = document.getElementById('home_foul').innerHTML;
    if(foul > 0){
        document.getElementById('home_foul').innerHTML = parseInt(foul) - 1;
    }
});

$('.home_foul_reset').on('click', function(){
    if(document.getElementById('home_foul').innerHTML != 0){
        document.getElementById('home_foul').innerHTML = 0;
    }
    
});

// Away Foul
$('.away_foul_plus').on('click', function(){
    let foul = document.getElementById('away_foul').innerHTML;
    if(foul >= 0 && foul < 6){
        document.getElementById('away_foul').innerHTML = parseInt(foul) + 1;
    }
});

$('.away_foul_min').on('click', function(){
    let foul = document.getElementById('away_foul').innerHTML;
    if(foul > 0){
        document.getElementById('away_foul').innerHTML = parseInt(foul) - 1;
    }
});

$('.away_foul_reset').on('click', function(){
    if(document.getElementById('away_foul').innerHTML != 0){
        document.getElementById('away_foul').innerHTML = 0;
    }
});

// Period
$('.min_period').on('click', function(){
    let period = document.getElementById('period').innerHTML;
    if(period > 1){
        period = 1;
    }
    document.getElementById('period').innerHTML = period;
});

$('.plus_period').on('click', function(){
    let period = document.getElementById('period').innerHTML;
    if(period < 2){
        period = 2;
    }
    document.getElementById('period').innerHTML = period;
});

// CONTROL
// Reset Scoreboard
$('.reset_scoreboard').on('click', function(){
    document.getElementById('home_score').innerHTML = 0;
    document.getElementById('away_score').innerHTML = 0;
    document.getElementById('home_foul').innerHTML = 0;
    document.getElementById('away_foul').innerHTML = 0;
    document.getElementById('home').value = "";
    document.getElementById('away').value = "";
});

// Update Scoreboard
$(document).on('click','.update',function(){
    // var token = $('meta[name="csrf-token"]').attr('content');
    var id = 1;

    let home_score = document.getElementById('home_score').innerHTML;
    let away_score = document.getElementById('away_score').innerHTML;
    let home_foul = document.getElementById('home_foul').innerHTML;
    let away_foul = document.getElementById('away_foul').innerHTML;
    let home = document.getElementById('home').value;
    let away = document.getElementById('away').value;
    let period = document.getElementById('period').innerHTML;

    $.ajax({
        type: 'POST',
        url: '/scoreboard-controller/update',
        data: {
            "_token": "{{ csrf_token() }}",
            id : id,
            home : home,
            away : away,
            home_score : home_score,
            away_score : away_score,
            home_foul : home_foul,
            away_foul : away_foul,
            period : period
        },
    });
});

// Count Down
$(document).on('click','.start',function(){
    // var token = $('meta[name="csrf-token"]').attr('content');
    var id = 1;

    let countdown = 1;

    $.ajax({
        type: 'POST',
        url: '/scoreboard-controller/update',
        data: {
            "_token": "{{ csrf_token() }}",
            id : id,
            countdown : countdown
        },
    });
});

$(document).on('click','.stop',function(){
    // var token = $('meta[name="csrf-token"]').attr('content');
    var id = 1;

    let countdown = 0;

    $.ajax({
        type: 'POST',
        url: '/scoreboard-controller/update',
        data: {
            "_token": "{{ csrf_token() }}",
            id : id,
            countdown : countdown
        },
    });
});

$(document).on('click','.reset_timer',function(){
    // var token = $('meta[name="csrf-token"]').attr('content');
    var id = 1;

    let countdown = 3;

    $.ajax({
        type: 'POST',
        url: '/scoreboard-controller/update',
        data: {
            "_token": "{{ csrf_token() }}",
            id : id,
            countdown : countdown
        },
    });
});

// Audio
$(document).on('click','.sound1',function(){
    // var token = $('meta[name="csrf-token"]').attr('content');
    var id = 1;

    let aud = 1;
    let status = document.getElementById('sound_status').value;

    if(status == 0){
        status = 1
        document.getElementById('sound_status').value = 1;
    }
    else{
        status = 0;
        document.getElementById('sound_status').value = 0;
    }

    $.ajax({
        type: 'POST',
        url: '/scoreboard-controller/update',
        data: {
            "_token": "{{ csrf_token() }}",
            id : id,
            id_sound : aud,
            status : status
        },
    });
});

$(document).on('click','.sound2',function(){
    // var token = $('meta[name="csrf-token"]').attr('content');
    var id = 1;

    let aud = 2;
    let status = document.getElementById('sound_status').value;

    if(status == 0){
        status = 1
        document.getElementById('sound_status').value = 1;
    }
    else{
        status = 0;
        document.getElementById('sound_status').value = 0;
    }

    $.ajax({
        type: 'POST',
        url: '/scoreboard-controller/update',
        data: {
            "_token": "{{ csrf_token() }}",
            id : id,
            id_sound : aud,
            status : status
        },
    });
});

$(document).on('click','.sound3',function(){
    // var token = $('meta[name="csrf-token"]').attr('content');
    var id = 1;

    let aud = 3;
    let status = document.getElementById('sound_status').value;

    if(status == 0){
        status = 1
        document.getElementById('sound_status').value = 1;
    }
    else{
        status = 0;
        document.getElementById('sound_status').value = 0;
    }

    $.ajax({
        type: 'POST',
        url: '/scoreboard-controller/update',
        data: {
            "_token": "{{ csrf_token() }}",
            id : id,
            id_sound : aud,
            status : status
        },
    });
});
});

</script>
</html>
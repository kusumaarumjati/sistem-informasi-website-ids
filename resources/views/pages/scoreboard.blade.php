@extends('layout.template')
@section('page_title','DATA CUST')
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
 
<div class="container" style="padding-left: 200px">
<div class="table-responsive">
  <table class="table table-bordered table-hover table-striped">
    <thead class="thead-dark">
      <tr>
        <td>
          <form action=""  method="POST">
            <h2 style="color: black ; text-align: center;" for="validationCustom03">Home</h2>
            <input type="text" class="form-control" name ="nama_home" id="nama" placeholder="Masukkan Home" >
            <div class="col-md-2 mb-3" style="margin-top:4px;">
            <button type="submit" class="mt-4 btn-primary btn-submit-home">Submit</button>
          </form>
        </td>

        <td>
          <form action="" method="POST">
          <h2 style="color: black; text-align: center;" for="validationCustom03">Away</h2>
          <input type="text" class="form-control" name ="nama_away" id="nama" placeholder="Masukkan Away" >
          <div class="col-md-2 mb-3" style="margin-top:4px;">
          <button type="submit" class="mt-4 btn-primary btn-submit-away"  >Submit</button>
          </div>
          </form>          
        </td>        

      </tr>

      <tr>
        <td>
          <form action="" method="POST">
            <button type="submit" class="btn-info btn-submit-homeplus2" name="homeplus2">+ 2 Home</button>
            <button type="submit" class="btn-warning btn-submit-homeminus2" name="homeminus2">- 2 Home</button>
          </form>
        </td>
        <td>
           <form action="" method="POST">
            <button type="submit" class="btn-info btn-submit-awayplus2" name="awayplus2">+ 2 Away</button>
            <button type="submit" class="btn-warning btn-submit-awayminus2" name="awayminus2">- 2 Away</button>
        </form>
        </td>
      </tr>

      <tr>
        <td>
          <form action="" method="POST">
            <button type="submit" class="btn-info btn-submit-homeplus3" name="homeplus3">+ 3 Home</button>
            <button type="submit" class="btn-warning btn-submit-homeminus3" name="homeminus2">- 3 Home</button>
        </form>
        </td>

        <td>
          <form action="" method="POST">
            <button type="submit" class="btn-info btn-submit-awayplus3" name="awayplus3">+ 3 Away</button>
            <button type="submit" class="btn-warning btn-submit-awayminus3" name="awayminus3">- 3 Away</button>
        </form>
        </td>
      </tr>
      <tr>
        <td>
          <h4 style="color: black; text-align: center;" class="mt-4">Timer</h4>
        </td>
        <td>
          <h4 style="color: black; text-align: center;" class="mt-4">Music</h4>
        </td>
      </tr>

      <tr>
        <td>
          <form action="/reset-menit-detik" method="POST">
            <button type="submit" class="btn-primary btn-submit-start-timer" name="start_timer">Start Timer</button>
          </form>
          <br>
          <form action="/resume-menit-detik" method="POST">
            <button type="submit" class="btn btn-info btn-submit-resume-timer" name="resume_timer">Resume Timer</button>
          </form>
          <br>
           <form action="/stop-menit-detik" method="POST">
            <button type="submit" class="btn-danger btn-submit-stop-timer" name="stop_timer">Stop Timer</button>
        </form>
        </td>
        <td style="text-align: center;">
          <form action="" method="POST">
            <button type="submit" class="btn-success btn-submit-sound1" name="homeminus2">Sound 1</button>

            <button type="submit" class="btn-success  btn-submit-sound2" name="homeminus2">Sound 2</button>

            <button type="submit" class="btn-success  btn-submit-sound3" name="homeminus2">Sound 3</button>
        </form>
        </td>
      </tr>
    </div>
  </form>
</td>
</tr>
</thead>
</table>
</div>
</div>

@endsection

@section('js_custom')
<script>
 $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('konten')
        }
    });

    $(".btn-submit-home").click(function(e){
        e.preventDefault();

        var home = $("input[name=nama_home]").val();
        var url = '{{ url('store-home') }}';

        $.ajax({
           url:url,
           method:'POST',
           data:{
                  name_home:home, 
                },
           success:function(response){
              if(response.success){
                  console.log('sukses')
              }else{
                 // alert("Error")
              }
           },
           error:function(error){
              console.log(error)
           }
        });
	});
</script>

<script>
 $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('konten')
        }
    });

    $(".btn-submit-away").click(function(e){
        e.preventDefault();

        var away = $("input[name=nama_away]").val();
        var url = '{{ url('store-away') }}';

        $.ajax({
           url:url,
           method:'POST',
           data:{
                  name_away:away, 
                },
           success:function(response){
              if(response.success){
                  console.log('sukses')
              }else{
                  //alert("Error")
              }
           },
           error:function(error){
              console.log(error)
           }
        });
	});
</script>

<script>
 $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('konten')
        }
    });

    $(".btn-submit-homeplus2").click(function(e){
        console.log('masukplus2home');
        e.preventDefault();

        var homeplus2 = $("input[name=homeplus2]").val();
        var url = '{{ url('store-homeplus2') }}';

        $.ajax({
           url:url,
           method:'POST',
           data:{
              
           },
           success:function(response){
              if(response.success){
                  console.log('sukses')
                  
              }else{
                 // alert("Error")
              }
           },
           error:function(error){
              console.log(error)
           }
        });
    });
    
</script>

<script>
 $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('konten')
        }
    });

    $(".btn-submit-homeminus2").click(function(e){
        console.log('masukminus2home');
        e.preventDefault();

        var url = '{{ url('store-homeminus2') }}';

        $.ajax({
           url:url,
           method:'POST',
           data:{
              
           },
           success:function(response){
              if(response.success){
                  console.log('sukses')
              }else{
                 // alert("Error")
              }
           },
           error:function(error){
              console.log(error)
           }
        });
    });
</script>

<script>
 $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('konten')
        }
    });

    $(".btn-submit-homeplus3").click(function(e){
        console.log('masukhomeplus3');
        e.preventDefault();

        var url = '{{ url('store-homeplus3') }}';

        $.ajax({
           url:url,
           method:'POST',
           data:{
              
           },
           success:function(response){
              if(response.success){
                  console.log('sukses')
              }else{
                  //alert("Error")
              }
           },
           error:function(error){
              console.log(error)
           }
        });
    });
</script>

<script>
 $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('konten')
        }
    });

    $(".btn-submit-homeminus3").click(function(e){
        console.log('masukhomeminus3');
        e.preventDefault();

        var url = '{{ url('store-homeminus3') }}';

        $.ajax({
           url:url,
           method:'POST',
           data:{
              
           },
           success:function(response){
              if(response.success){
                  console.log('sukses')
              }else{
                 // alert("Error")
              }
           },
           error:function(error){
              console.log(error)
           }
        });
    });
</script>



<script>
 $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('konten')
        }
    });

    $(".btn-submit-awayplus2").click(function(e){
        console.log('masukawayplus2');
        e.preventDefault();

        var url = '{{ url('store-awayplus2') }}';

        $.ajax({
           url:url,
           method:'POST',
           data:{
              
           },
           success:function(response){
              if(response.success){
                  console.log('sukses')
              }else{
                 // alert("Error")
              }
           },
           error:function(error){
              console.log(error)
           }
        });
    });
</script>

<script>
 $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('konten')
        }
    });

    $(".btn-submit-awayplus3").click(function(e){
        console.log('awayplus3');
        e.preventDefault();

        var url = '{{ url('store-awayplus3') }}';

        $.ajax({
           url:url,
           method:'POST',
           data:{
              
           },
           success:function(response){
              if(response.success){
                  console.log('sukses')
              }else{
                 // alert("Error")
              }
           },
           error:function(error){
              console.log(error)
           }
        });
    });
</script>

<script>
 $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('konten')
        }
    });

    $(".btn-submit-awayminus3").click(function(e){
        console.log('awayminus3');
        e.preventDefault();

        var url = '{{ url('store-awayminus3') }}';

        $.ajax({
           url:url,
           method:'POST',
           data:{
              
           },
           success:function(response){
              if(response.success){
                  console.log('sukses')
              }else{
                  //alert("Error")
              }
           },
           error:function(error){
              console.log(error)
           }
        });
    });
</script>

<script>
 $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('konten')
        }
    });

    $(".btn-submit-awayminus2").click(function(e){
        console.log('awayminus2');
        e.preventDefault();

        var url = '{{ url('store-awayminus2') }}';

        $.ajax({
           url:url,
           method:'POST',
           data:{
              
           },
           success:function(response){
              if(response.success){
                  console.log('sukses')
              }else{
                 // alert("Error")
              }
           },
           error:function(error){
              console.log(error)
           }
        });
    });
</script>


<script>
 $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('konten')
        }
    });

    $(".btn-submit-sound1").click(function(e){
        console.log('sound1');
        e.preventDefault();

        var url = '{{ url('store-sound1') }}';

        $.ajax({
           url:url,
           method:'POST',
           data:{
              
           },
           success:function(response){
              if(response.success){
                  console.log('sukses')
              }else{
                 // alert("Error")
              }
           },
           error:function(error){
              console.log(error)
           }
        });
    });
</script>

<script>
 $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('konten')
        }
    });

    $(".btn-submit-sound2").click(function(e){
        console.log('sound2');
        e.preventDefault();

        var url = '{{ url('store-sound2') }}';

        $.ajax({
           url:url,
           method:'POST',
           data:{
              
           },
           success:function(response){
              if(response.success){
                  console.log('sukses')
              }else{
                 // alert("Error")
              }
           },
           error:function(error){
              console.log(error)
           }
        });
    });
</script>

<script>
 $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('konten')
        }
    });

    $(".btn-submit-sound3").click(function(e){
        console.log('sound3');
        e.preventDefault();

        var url = '{{ url('store-sound3') }}';

        $.ajax({
           url:url,
           method:'POST',
           data:{
              
           },
           success:function(response){
              if(response.success){
                  console.log('sukses')
              }else{
                //  alert("Error")
              }
           },
           error:function(error){
              console.log(error)
           }
        });
    });
</script>

<script>
 $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('konten')
        }
    });

    $(".btn-submit-start-timer").click(function(e){
        console.log('start-timer');
        e.preventDefault();

        var url = '{{ url('reset-menit-detik') }}';

        $.ajax({
           url:url,
           method:'POST',
           data:{
              
           },
           success:function(response){
              if(response.success){
                  console.log('sukses')
              }else{
                //  alert("Error")
              }
           },
           error:function(error){
              console.log(error)
           }
        });
    });
</script>

<script>
 $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('konten')
        }
    });

    $(".btn-submit-resume-timer").click(function(e){
        console.log('resume-timer');
        e.preventDefault();

        var url = '{{ url('resume-menit-detik') }}';

        $.ajax({
           url:url,
           method:'POST',
           data:{
              
           },
           success:function(response){
              if(response.success){
                  console.log('sukses')
              }else{
                //  alert("Error")
              }
           },
           error:function(error){
              console.log(error)
           }
        });
    });
</script>

<script>
 $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('konten')
        }
    });

    $(".btn-submit-stop-timer").click(function(e){
        console.log('stop-timer');
        e.preventDefault();

        var url = '{{ url('stop-menit-detik') }}';

        $.ajax({
           url:url,
           method:'POST',
           data:{
              
           },
           success:function(response){
              if(response.success){
                  console.log('sukses')
              }else{
                 // alert("Error")
              }
           },
           error:function(error){
              console.log(error)
           }
        });
    });
</script>

@endsection
@extends('layout.template')
@section('page_title','DATA TOKO')
@section('custom_css')

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

@section('title', 'Data Toko')

@section('breadcrumb')
 <li class="breadcrumb-item"><a href="#">Home</a></li>
  <li class="breadcrumb-item active">Data toko</li>
@endsection

@section('content')
<div class="row">
        <div class="col-6">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Toko</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="col-6 col-md-6 col-lg-12 col-sm-6">
                    <section class="container" id="demo-content">
                        <h1 class="title">Scan Code from Video Camera</h1>

                        <div>
                            <a class="btn btn-primary" id="startButton">Start</a>
                            <a class="btn btn-success" id="resetButton">Reset</a>
                        </div>
                            <br>
                        <div>
                            <video id="video" width="300" height="200" style="border: 1px solid gray"></video>
                        </div>

                        <div id="sourceSelectPanel" style="display:none">
                            <label for="sourceSelect">Change video source:</label>
                            <select class="form-control" id="sourceSelect" style="max-width:400px">
                            </select>
                        </div>

                        <label>Result:</label>
                        <code class="form-control" style="width:400px" name="result" id="result"></code>
                        <br>
                        <input href="findToko" class="btn btn-primary" type="button" id="find_toko" name="find_toko" value="Details"><br>

                    </section>
                </div>
                 </div>
                  
           
            <!-- /.card-body -->
            <div class="card-footer">
          
          </div>
          <!-- /.card-footer-->
          </div>
        </div>

        <div class="col-6">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Detail Toko</h3>
            </div>
            <!-- /.card-header -->
           
                  <div class="card-body">
                    <div class="col-12 col-md-6 col-lg-12 col-sm-12">
                        <!-- Lokasi Toko -->
                        <div class="form-group">
                            <label>Nama Toko</label>
                            <p type="text" class="form-control"  name="nam" id="nam"></p>
                        </div>
                       
                        <div class="form-group">
                            <label for="">Latitude</label>
                             <p type="text" class="form-control"  name="lat" id="lat"></p>
                        </div>
                        <div class="form-group">
                            <label for="">Longitude</label>
                            <p type="text" class="form-control"  name="long" id="long"></p>
                        </div>
                        <div class="form-group">
                            <label for="">Accuracy</label>
                           <p type="text" class="form-control"  name="ac" id="ac"></p>
                        </div>
                      <!-- Lokasi Sekarang -->
                        <label>Lokasi Sekarang</label>
                        <div class="form-group">
                            <label for="">Latitude</label>
                           <p type="text" class="form-control"  name="lat2" id="lat2"></p>
                        </div>
                        <div class="form-group">
                            <label for="">Longitude</label>
                             <p type="text" class="form-control"  name="long2" id="long2"></p>
                        </div>
                        <div class="form-group">
                            <label for="">Accuracy</label>
                          <p type="text" class="form-control"  name="acc2" id="acc2"></p>
                        </div>
                        <p id="demo"></p>
                            
                            <button type="submit" class="btn btn-primary">Submit</button><br><br>
                
              </div>
          </div>
           
            <!-- /.card-body -->
            <div class="card-footer">
          
          </div>
          <!-- /.card-footer-->

        </div>

      </div>
          <!-- /.card -->
          @endsection
          @section('js_custom')
<!-- DataTables  & Plugins -->
<script src="{{asset ('assets')}}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset ('assets')}}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{asset ('assets')}}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{asset ('assets')}}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{asset ('assets')}}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{asset ('assets')}}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="{{asset ('assets')}}/plugins/jszip/jszip.min.js"></script>
<script src="{{asset ('assets')}}/plugins/pdfmake/pdfmake.min.js"></script>
<script src="{{asset ('assets')}}/plugins/pdfmake/vfs_fonts.js"></script>
<script src="{{asset ('assets')}}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="{{asset ('assets')}}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="{{asset ('assets')}}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<!-- CUSTOM JS -->
<!-- GetLocation -->
<script>
    
</script>

<!-- Kamera -->
<script type="text/javascript" src="https://unpkg.com/@zxing/library@0.18.3-dev.7656630/umd/index.js "></script>
  <script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui-1.8.17.custom.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script type="text/javascript">
    window.addEventListener('load', function () {
      let selectedDeviceId;
      const codeReader = new ZXing.BrowserMultiFormatReader()
      console.log('ZXing code reader initialized')
      codeReader.listVideoInputDevices()
        .then((videoInputDevices) => {
          const sourceSelect = document.getElementById('sourceSelect')
          selectedDeviceId = videoInputDevices[0].deviceId
          if (videoInputDevices.length >= 1) {
            videoInputDevices.forEach((element) => {
              const sourceOption = document.createElement('option')
              sourceOption.text = element.label
              sourceOption.value = element.deviceId
              sourceSelect.appendChild(sourceOption)
            })

            sourceSelect.onchange = () => {
              selectedDeviceId = sourceSelect.value;
            };

            const sourceSelectPanel = document.getElementById('sourceSelectPanel')
            sourceSelectPanel.style.display = 'block'
          }

          document.getElementById('startButton').addEventListener('click', () => {
            codeReader.decodeFromVideoDevice(selectedDeviceId, 'video', (result, err) => {
              if (result) {
                console.log(result)
                document.getElementById('result').textContent = result.text

                $.ajax({success: function()
                      {
                        const audio = new Audio('assets/chat_01.mp3');
                        audio.play();
                      }
                    });

                

                var id_toko = document.getElementById('result').innerHTML;
                console.log(id_toko);
                // var token = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                type:"get",
                url:"findToko",
                data:"tk_id="+id_toko,
                success:function(data){
                  //console.log(scan_id);
                  for(var i=0;i<data.length;i++){
                    // $('#ket').append('<label value="'+data[i].id_barang+'">'+data[i].ny
                    document.getElementById("nam").innerHTML = data[i].nama_toko;
                    document.getElementById("lat").innerHTML = data[i].latitude;
                    document.getElementById("long").innerHTML = data[i].longitude;
                    document.getElementById("ac").innerHTML = data[i].accuracy;
                  }
                  getLocation();
                      $.ajax({success: function()
                      {
                        konfirmasi();
                      }
                    });
                }
                });
                codeReader.reset();
              }

              if (err && !(err instanceof ZXing.NotFoundException)) {
                console.error(err)
                document.getElementById('result').textContent = err
              }
            })
            console.log(`Started continous decode from camera with id ${selectedDeviceId}`)
          })

          document.getElementById('resetButton').addEventListener('click', () => {
            codeReader.reset()
            document.getElementById('result').textContent = '';
            console.log('Reset.')
          })

        })
        .catch((err) => {
          console.error(err)
        })
    })

    // $("#tokos").click(function(){
    // var scan_id = document.querySelector('code').innerText; // find <code> tag and get text
    // // var scan_id = console.log(val);
    // // element.innerText = console.log(val);
    // $.ajax({
    //   type:"get",
    //   url:"findToko",
    //   data:"tk_id="+scan_id,
    //   success:function(data){
    //     //console.log(scan_id);
    //     for(var i=0;i<data.length;i++){
    //       // $('#ket').append('<label value="'+data[i].id_barang+'">'+data[i].ny
    //       document.getElementById("nam").innerHTML = data[i].nama_toko;
    //       document.getElementById("lat").innerHTML = data[i].latitude;
    //       document.getElementById("long").innerHTML = data[i].longitude;
    //       document.getElementById("ac").innerHTML = data[i].accuracy;
    //     }
    //   }
    //   });
    // });
   
    var lat = document.getElementById("lat2");
    var long = document.getElementById("long2");
    var acc = document.getElementById("acc2");

    function getLocation() {
      if (navigator.geolocation) {
        navigator.geolocation.watchPosition(showPosition);
      } else { 
        lat.innerHTML = "Geolocation is not supported by this browser.";
        long.innerHTML = "Geolocation is not supported by this browser.";
        acc.innerHTML = "Geolocation is not supported by this browser.";
      }
    }
        
    function showPosition(position) {
        lat.innerHTML=position.coords.latitude;
        long.innerHTML=position.coords.longitude;
        acc.innerHTML=position.coords.accuracy;
    }

function getDistanceFromLatLonInKm(lat,long,lat2,long2) {   
  var R = 6371; // Radius of the earth in km   
  var dLat = deg2rad(lat2-lat);  // deg2rad below   
  var dLon = deg2rad(long2-long);    
  var a = Math.sin(dLat/2) * Math.sin(dLat/2) + Math.cos(deg2rad(lat)) * Math.cos(deg2rad(lat2)) * Math.sin(dLon/2) * Math.sin(dLon/2);    
  var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));    
  var d = R * c; // Distance in km 
  return d; } 
 
  function deg2rad(deg) {   
    return deg * (Math.PI/180) 
  } 

  function konfirmasi(){
      var lat = document.getElementById("lat").innerHTML;
      var long = document.getElementById("long").innerHTML;
      var ac = Number(document.getElementById("ac").innerHTML);
      var lat2 = document.getElementById("lat2").innerHTML;
      var long2 = document.getElementById("long2").innerHTML;
      var acc2 = Number(document.getElementById("acc2").innerHTML);
      var jarak = Number(getDistanceFromLatLonInKm(lat,long,lat2,long2)*1000);
      console.log(jarak);
      var rataAcc = Number((ac+acc2)/2);
      console.log(rataAcc);
      if (jarak <= rataAcc)
        window.alert("Anda berada diarea toko");
      else
        window.alert("Anda tidak berada diarea toko");
    }
  </script>

@endsection
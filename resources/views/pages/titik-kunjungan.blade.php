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
                        <!-- <input href="findToko" class="btn btn-primary" type="button" id="find_toko" name="find_toko" value="Details"><br> -->

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
                            <input type="text" class="form-control" id="nama_toko12" name="nama_toko" placeholder="" readonly>
                        </div>
                       
                        <div class="form-group">
                            <label for="">Latitude</label>
                            <input type="text" class="form-control" id="latitude12" name="latitude1" placeholder="" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Longitude</label>
                            <input type="text" class="form-control" id="longitude12" name="longitude1" placeholder="" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Accuracy</label>
                            <input type="text" class="form-control" id="accuracy12" name="accuracy1" placeholder="" readonly>
                        </div>
                      <!-- Lokasi Sekarang -->
                        <label>Lokasi Sekarang</label>
                        <div class="form-group">
                            <label for="">Latitude</label>
                            <input type="text" class="form-control" id="latitude_now1" name="latitude_now1" placeholder="" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Longitude</label>
                            <input type="text" class="form-control" id="longitude_now1" name="longitude_now1" placeholder="" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Accuracy</label>
                            <input type="text" class="form-control" id="accuracy_now1" name="accuracy_now1" placeholder="" readonly>
                        </div>
                        <p id="demo"></p>
                            
                            <button type="submit" class="btn btn-primary" onclick="konfirmasi();">Submit</button><br><br>
                
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
  var lat1 = document.getElementById("latitude12");
  var lon1 = document.getElementById("longitude12");
  var acc1 = document.getElementById("accuracy12");
  var lat2 = document.getElementById("latitude_now1");
  var lon2 = document.getElementById("longitude_now1");
  var acc2 = document.getElementById("accuracy_now1");
    var x = document.getElementById("demo");
    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.watchPosition(showPosition);
          // konfirmasi();
        } else { 
            x.innerHTML = "Geolocation is not supported by this browser.";
        }
    }


    function showPosition(position) {
    lat2.value = position.coords.latitude;
    lon2.value= position.coords.longitude;
    acc2.value= position.coords.accuracy;
    }

    function konfirmasi( ){
      var lat1 = document.getElementById("latitude12").value;
      var lon1 = document.getElementById("longitude12").value;
      var acc1 = Number(document.getElementById("accuracy12").value);
      var lat2 = document.getElementById("latitude_now1").value;
      var lon2 = document.getElementById("longitude_now1").value;
      var acc2 = Number(document.getElementById("accuracy_now1").value);
      var rac = Number((acc1+acc2)/2);
      var b = Number(getDistanceFromLatLonInKm(lat1,lon1,lat2,lon2)*1000);
      console.log(acc1);
      console.log(lat1);
      console.log(lon1);
      console.log(acc2);
      console.log(lat2);
      console.log(lon2);
      console.log(rac);
      console.log(b);
      if (b <= rac) {
        alert("Anda Berada Jangkauan Toko");
      } else {
        alert("Anda Diluar Jangkauan Toko");
      }
    }

    function getDistanceFromLatLonInKm(lat1,lon1,lat2,lon2) {
      var R = 6371; // Radius of the earth in km
      var dLat = deg2rad(lat2-lat1); // deg2rad below
      var dLon = deg2rad(lon2-lon1);
      var a =
      Math.sin(dLat/2) * Math.sin(dLat/2) +
      Math.cos(deg2rad(lat1)) * Math.cos(deg2rad(lat2)) *
      Math.sin(dLon/2) * Math.sin(dLon/2)
      ;
      var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));
      var d = R * c; // Distance in km
      return d;
    }
    function deg2rad(deg) {
      return deg * (Math.PI/180)
    }

</script>

<!-- Kamera -->
<script type="text/javascript" src="https://unpkg.com/@zxing/library@0.18.3-dev.7656630/umd/index.js"></script>
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
                const audio = new Audio('assets/dc.mpeg');
                audio.play();
                // AJAX FIND RESULT
                var id_toko = document.getElementById('result').innerHTML;
                console.log(id_toko);
                $.ajax({
                  type:"get",
                  url:"findToko",
                  data:"tk_id="+id_toko,
                  success: function(data){
                    
                    for(var i=0;i<data.length;i++){
                      document.getElementById("nama_toko12").value = data[i].nama_toko;
                      document.getElementById("longitude12").value = data[i].longitude;
                      document.getElementById("latitude12").value = data[i].latitude;
                      document.getElementById("accuracy12").value = data[i].accuracy;
                    }
                  }
                });
                codeReader.reset();
                getLocation();
                
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
  </script>
@endsection
@extends('layout.template')
@section('page_title', 'Form tambah toko')
@section('title', 'Tambah data toko')

@section('breadcrumb')
 <li class="breadcrumb-item"><a href="#">Home</a></li>
  <li class="breadcrumb-item active">Tambah data toko</li>
@endsection

@section('content')
<div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Tambah data toko</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                   <form method="POST" action="{{url('/tambahtoko/simpan/')}}">
                    {{ csrf_field() }}
                    <div class="form-group">
                    <input type="hidden" name="barcode" id="barcode" class="form-control" required="required">
                  </div>
                  <div class="form-group">
                    <label for="nama_toko">Nama toko</label>
                    <input type="text" name="nama_toko" id="nama_toko" class="form-control" placeholder="Nama Toko" required="required" >
                  </div>
                  
                   

                  <div class="form-group">
                    <label for="alamat">Latitude</label>
                    <input type="text" name="latitude" id="latitude" class="form-control"  placeholder="latitude" required="required" readonly>
                  </div>

                  <div class="form-group">
                    <label for="alamat">Longitude</label>
                    <input type="text" name="longitude" id="longitude" class="form-control"  placeholder="longitude" required="required" readonly>
                  </div>

                  <div class="form-group">
                    <label for="alamat">Accuracy</label>
                    <input type="text" name="accuracy" id="accuracy" class="form-control"  placeholder="accuracy" required="required" readonly>
                  </div> 
                  
                  <button  class="btn btn-outline-primary mb-2" type="button" onclick="getLocation()">Geolocation</button> 
                  <button type="submit"  name="simpan" value="simpan" class="btn btn-outline-success mb-2 ml-1">Submit</button>
                  </form>

                </div>
              </div>
            </div>
        </div>
        <!-- /.card-body -->
        <!-- <div class="card-footer">
          <input type="submit" onclick="getLocation()" name="simpan" value="simpan" class="btn btn-outline-info"> 
          </form>
        </div> -->
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->
@endsection
@section('js_custom')
<script>
var lati = document.getElementById("latitude");
var long = document.getElementById("longitude");
var accu = document.getElementById("accuracy");

function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else { 
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}

function showPosition(position) {
    lati.value=position.coords.latitude;
    long.value=position.coords.longitude;
    accu.value=position.coords.accuracy;
}
</script>
@endsection

@extends('layout.template')
@section('page_title', 'Form tambah customer')
@section('title', 'Tambah Data customer 1')

@section('breadcrumb')
 <li class="breadcrumb-item"><a href="#">Home</a></li>
  <li class="breadcrumb-item active">Tambah customer 1</li>
@endsection

@section('content')
<div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Tambah data customer</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                   <form method="POST" action="{{url('/tambahcust1/simpan/')}}">
                    {{ csrf_field() }}
                    <div class="form-group">
                    <input type="hidden" name="id_customer" id="id_customer" class="form-control" required="required">
                  </div>
                  <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama" required="required">
                  </div>
                  <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" name="alamat" id="alamat" class="form-control"  placeholder="Alamat" required="required">
                  </div>

                  <!--data sementara-->
                  <input type="hidden" name="foto" id="foto" class="form-control" required="required" value="foto">
                  <input type="hidden" name="filepath" required="required" id="filepath" class="form-control" value="filepath">

                  <div class="form-group">
                  <label>Provinsi</label>
                  <select class="form-control select2" required="required" id="province-a" name="prov_id">
                     <option value="0" disabled="true" selected="true"> - Pilih Provinsi - </option>
                    @foreach ($province as $prov)
                    <option value="{{ $prov->prov_id }}">{{ $prov->prov_name }}
                    </option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label>Kota</label>
                  <select class="form-control select2" required="required" id="city-a" name=" ">
                     <option value="0" disabled="true" selected="true"> - Pilih Kota- </option>
                    @foreach ($city as $cit)
                    <option value="{{ $cit->city_id}}">{{ $cit->scity_name }}
                    </option>
                    @endforeach
                    </select>
                </div>


                <div class="form-group">
                  <label>Kecamatan</label>
                  <select class="form-control select2" required="required" id="district-a" name=" ">
                     <option value="0" disabled="true" selected="true"> - Pilih Kecamatan- </option>
                    @foreach ($district as $dis)
                    <option value="{{ $dis->dis_id }}">{{ $dis->dis_name }}
                    </option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label>Kelurahan</label>
                  <select class="form-control select2" required="required" id="subdis-a" name="subdis_id">
                     <option value="0" disabled="true" selected="true"> - Pilih Kelurahan - </option>
                    @foreach ($subdis as $sub)
                    <option value="{{ $sub->subdis_id }}">{{ $sub->subdis_name }}
                    </option>
                    @endforeach
                    </select>
                </div>

                <div class="row">
                <div class="col-md-6">
                <div id="my_camera"></div>
                <br/>
                <input type=button value="Take Snapshot" onClick="take_snapshot()">
                <input type="hidden" name="foto" class="image-tag">
                </div>
                <div class="col-md-6">
                    <div id="results">Your captured image will appear here...</div>
                </div>
                <div class="col-md-12 text-center">
                    <br/>
                   <!--  <button class="btn btn-success">Submit</button> -->
                   <input type="submit" name="simpan" value="simpan" class="btn btn-outline-info">
                </div>
                </div>

                </div>
              </div>
            </div>
        </div>
        <!-- /.card-body -->
        <!-- <div class="card-footer">
          <input type="submit" name="simpan" value="simpan" class="btn btn-outline-info"> -->
          </form>
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->
@endsection
@section('js_custom')
<!-- <script type="text/javascript" src={!! asset('js/jquery-1.7.1.min.js') !!}></script>
<script type="text/javascript" src={!! asset('js/jquery-ui-1.8.17.custom.min.js') !!}></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
 <script type="text/javascript">
$(document).ready(function(){

  $('#province-a').on('change', function(){
    var prov_id=$(this).val();
    $.ajax({
      type:'get',
      url:'/findKota/'+prov_id,
      //data:'prov_id='+prov_id,
      success:function(data){
       $('#city-a').html('');
       $('#city-a').append('<option value="">-Pilih Kota-</option>');
        for (var i=0; i<data.length; i++){
      $('#city-a').append('<option value="'+data[i].city_id+'">'+data[i].city_name+'</option>');
        }
        }
      
    });
  });
 
  $('#city-a').on('change', function(){
    var city_id=$(this).val();
    $.ajax({
      type:'get',
      url:'/findKecamatan/'+city_id,
      //data:'prov_id='+prov_id,
      success:function(data){
          $('#district-a').html('');
          $('#district-a').append('<option value="">-Pilih Kecamatan-</option>');
        for (var i=0; i<data.length; i++){
          $('#district-a').append('<option value="'+data[i].dis_id+'">'+data[i].dis_name+'</option>');
        }
        }
      
    });
  });

  $('#district-a').on('change', function(){
    var dis_id=$(this).val();
    $.ajax({
      type:'get',
      url:'/findKelurahan/'+dis_id,
      //data:'prov_id='+prov_id,
      success:function(data){
        $('#subdis-a').html('');
        $('#subdis-a').append('<option value="">-Pilih Kelurahan-</option>');
        for (var i=0; i<data.length; i++){
          $('#subdis-a').append('<option value="'+data[i].subdis_id+'">'+data[i].subdis_name+'</option>');
        }
        }
      
    });
  });
});
</script>

<script language="JavaScript">
    Webcam.set({
        width: 490,
        height: 390,
        image_format: 'jpeg',
        jpeg_quality: 90
    });
  
    Webcam.attach( '#my_camera' );
  
    function take_snapshot() {
        Webcam.snap( function(data_uri) {
            $(".image-tag").val(data_uri);
            document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';
        } );
    }
</script>
@endsection

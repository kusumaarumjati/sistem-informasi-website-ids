@extends('layout.template')
@section('page_title','DATA CUST')
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

@section('title', 'Data Customer')

@section('breadcrumb')
 <li class="breadcrumb-item"><a href="#">Home</a></li>
  <li class="breadcrumb-item active">Data customer</li>
@endsection

@section('content')
<div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Customer</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
             
              <table id="example2" class="table table-bordered table-hover">
              <form>  
              <thead>
                  {{csrf_field()}}
                <tr>
                  <th>Nama</th>
                  <th>Alamat</th>
                  <th>Provinsi</th>
                  <th>Kota</th>
                  <th>Foto</th>
                  <th>Filepath</th>
                  <th>Kecamatan</th>
                  <th>Kelurahan</th>
               
                </tr>
                </thead>
                <tbody>
                    @foreach ($customer as $c)
                <tr>
                  <td>{{$c->nama}}</td>
                  <td>{{$c->alamat}}</td>
                  <td>{{$c->province->prov_name}}</td>
                  <td>{{$c->subdis->district->city->city_name}}</td>
                  <td>  <img src="{{ $c->foto }}" style="width: 100px; height: 100px">
                    </td>
                    <td> 
                      <img src="{{ asset('/storage/'.$c->filepath) }}" style="width: 90px; height: 100px">
                     <!--  <img src="{{ Storage::url($c->filepath) }}" style="width: 100px; height: 100px"> -->
                    </td>
                  <td>{{$c->subdis->district->dis_name}}</td>
                  <td>{{$c->subdis->subdis_name}}</td>
                </tr>
                @endforeach
</tbody>
</form>
</table>
</div>
            <!-- /.card-body -->
            <div class="card-footer">
          
          </div>
          <!-- /.card-footer-->
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
@endsection



@extends('layout.template')
@section('page_title','DATA TOKO')
@section('custom_css')

<!-- Data tables -->

  
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset ('assets')}}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{asset ('assets')}}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
 
@endsection

@section('title', 'Data Toko')

@section('breadcrumb')
 <li class="breadcrumb-item"><a href="#">Home</a></li>
  <li class="breadcrumb-item active">Data toko</li>
@endsection

@section('content')
<div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Toko</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-hover">
              <form> 
              <thead>
                  {{csrf_field()}}
                <tr>
                  <th>Barcode</th>
                   <th>Barcode</th>
                  <th>Nama toko</th>
                  <th>Latitude</th>
                  <th>Longitude</th>
                  <th>Accurancy</th>
                  <th>Cetak</th>
               
                </tr>
                </thead>
                <tbody>
                    @foreach ($lokasi as $l)
                <tr>
                </td>

                  <td align="center">{!! DNS2D::getBarcodeHTML($l->barcode, 'QRCODE') !!}
                  </td>
                   <td>{{$l->barcode}}</td>
                  <td>{{$l->nama_toko}}</td>
                  <td>{{$l->latitude}}</td>
                  <td>{{$l->longitude}}</td>
                  <td>{{$l->accuracy}}</td>
                  <td>
                    <a href="{{url('/PDF_toko/'.$l->barcode)}}" class="btn btn-info" target="_blank">Cetak</a>
                        </td> 
                  
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
      // "responsive": true, "lengthChange": false, "autoWidth": false,
      // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
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



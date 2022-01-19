@extends('layout.template')
@section('page_title','Import Excel')
@section('custom_css')

<!-- Data tables -->
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset ('assets')}}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{asset ('assets')}}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  
@endsection

@section('title', 'Import Excel')

@section('breadcrumb')
 <li class="breadcrumb-item"><a href="/dataexcel">Data Excel</a></li>
  <li class="breadcrumb-item">Import Excel</li>
  
@endsection

@section('content')
<div class="row">
        <div class="col-12">
            @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (isset($errors) && $errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                {{ $error }}
                            @endforeach
                        </div>
                    @endif
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Import Excel</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                   @if (isset($errors) && $errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                {{ $error }}
                            @endforeach
                        </div>
                    @endif

                    @if (session()->has('failures'))

                        <table class="table table-danger">
                            <tr>
                                <th>Row</th>
                                <th>Attribute</th>
                                <th>Errors</th>
                                <th>Value</th>
                            </tr>

                            @foreach (session()->get('failures') as $validation)
                                <tr>
                                    <td>{{ $validation->row() }}</td>
                                    <td>{{ $validation->attribute() }}</td>
                                    <td>
                                        <ul>
                                            @foreach ($validation->errors() as $e)
                                                <li>{{ $e }}</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td>
                                        {{ $validation->values()[$validation->attribute()] }}
                                    </td>
                                </tr>
                            @endforeach
                        </table>

                    @endif

                   <form action="/users/import" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <input type="file" name="file" />

                            <button type="submit" class="btn btn-primary">Import</button>
                        </div>
                   </form>
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
<script src="{{asset ('asset/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset ('asset/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset ('asset/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset ('asset/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>

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



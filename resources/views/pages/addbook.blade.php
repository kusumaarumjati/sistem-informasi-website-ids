@extends('layout.template')
@section('page_title', 'Form tambah')
@section('title', 'Tambah Data Buku')

@section('breadcrumb')
 <li class="breadcrumb-item"><a href="#">Home</a></li>
  <li class="breadcrumb-item active">Tambah Buku</li>
@endsection

@section('content')
<div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Tambah Buku</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                <form action="/book/tambahBooks" method='post'>
                    {{ csrf_field() }}
                    <!-- <div class="form-group">
                    <input type="hidden" name="id_customer" id="id_customer" class="form-control" required="required">
                  </div> -->
                  <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Nama" required="required">
                  </div>
                  <div class="form-group">
                    <label for="alamat">Author</label>
                    <input type="text" name="author" id="author" class="form-control"  placeholder="Author" required="required">
                  </div>
                  <input type="submit" name="simpan" value="simpan" class="btn btn-outline-info">

                </div>
              </div>
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <!-- <input type="submit" name="simpan" value="simpan" class="btn btn-outline-info"> -->
          </form>
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->
@endsection
@section('js_custom')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
@endsection
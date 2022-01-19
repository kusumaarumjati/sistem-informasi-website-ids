@extends('layout.template')
@section('page_title','PRINT BARCODE')
@section('custom_css')

<!-- Data tables -->
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset ('assets')}}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{asset ('assets')}}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  
@endsection

@section('title', 'Print Barcode Barang')

@section('breadcrumb')
 <li class="breadcrumb-item"><a href="#">Home</a></li>
  <li class="breadcrumb-item active">Print barcode</li>
@endsection

@section('content')
<div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Print barcode barang</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="row">
                <br>
                <a data-toggle="modal" data-target="#pdf" class="btn btn-sm btn-success" style="margin-bottom: 10px">Cetak Barcode</a>
               
              </div>
              
              
              <form id="frm-example" action="" method="">
                <table id="example" class="table table-bordered table-hover display" cellspacing="0" width="100%" align="center">
                  <thead align="center">
                  <tr align="center">
                    
                    <th align="center">
                      <input name="select_all" value="" id="example-select-all" type="checkbox" /></th>
                    </th>
                    
                     <th >Barcode</th>
                    <th >ID Barang</th>
                    <th >Nama Barang</th>
                    <th >Timestamp</th>
                    
                </tr>
            </thead>
            <tbody>
              @foreach($barang as $data)

              <tr align="center">
                <td align="center">{{ $data->id_barang }}</td>
                
                <?php
                  $generatorPNG = new Picqer\Barcode\BarcodeGeneratorPNG();
                ?>
                   <td style="text-align: center;" width="100" height="40">
            <img width="120" src="data:image/png;base64,{{ base64_encode($generatorPNG->getBarcode($data->id_barang, $generatorPNG::TYPE_CODE_128)) }}"><br>
            
            {{ $data->id_barang }}<br>
            {{ $data->nama_barang }}
        </td>
                <td align="center">{{ $data->id_barang}}</td>
                <td align="center">{{ $data->nama_barang}}</td>
                <td align="center">{{ $data->timestamp}}</td>
               
              </tr>
              @endforeach
            </tbody>
            </table>
          </form>
</div>
            <!-- /.card-body -->
            <div class="card-footer">
          
          </div>
          <!-- /.card-footer-->
          </div>
          <!-- /.card -->

<div class="modal fade" id="pdf" tabindex="-1" role="dialog" aria-labelledby="pdfLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="pdfLabel">Export Mulai Baris & Kolom?</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('/cetakpdf/') }}" method="post" >
                @csrf
                    <div class="form-group">
                        <label for="row">Baris</label>
                        <input type="number" class="form-control" id="row" placeholder="baris Barang" name="row" required>
                    </div>
                    <div class="form-group">
                        <label for="col">Kolom</label>
                        <input type="number" class="form-control" id="col" placeholder="kolom Barang" name="col" required>
                    </div>
                    <button type="submit" class="btn btn-primary" id="generate">Simpan</button>
                </form>
            </div>
            <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

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
$(document).ready(function (){   

   var table = $('#example').DataTable({
    "paging": false,
    "responsive": true,
    "autoWidth": false,  
    'columnDefs': [{
         'targets': 0,
         'searchable':false,
         'orderable':false,
         'className': 'dt-body-center',
         'render': function (data, type, full, meta){
             return '<input type="checkbox" name="check" value="' 
                + $('<div/>').text(data).html() + '">';
         }
      }],
      'order': [1, 'asc']
   });

   

 // Handle click on "Select all" control
   $('#example-select-all').on('click', function(){
      // Check/uncheck all checkboxes in the table
      var rows = table.rows({ 'search': 'applied' }).nodes();
      $('input[type="checkbox"]', rows).prop('checked', this.checked);
   });

   // Handle click on checkbox to set state of "Select all" control
   $('#example tbody').on('change', 'input[type="checkbox"]', function(){
      // If checkbox is not checked
      if(!this.checked){
         var el = $('#example-select-all').get(0);
         // If "Select all" control is checked and has 'indeterminate' property
         if(el && el.checked && ('indeterminate' in el)){
            // Set visual state of "Select all" control 
            // as 'indeterminate'
            el.indeterminate = true;
         }
      }
   });

   $('#generate').on('click', function(e){
      var favorite = [];
      var row =  Number(document.getElementById("row").value);
      var col =  Number(document.getElementById("col").value);
      $.each($("input[name='check']:checked"), function(){
          favorite.push($(this).val());
      });
      parameter= "/"+ favorite.join()+"/"+col+"/"+row;
      url= "{{url('/cetakpdf')}}";
      document.location.href=url+parameter;
       e.preventDefault(); 
   });


   });
</script>
@endsection



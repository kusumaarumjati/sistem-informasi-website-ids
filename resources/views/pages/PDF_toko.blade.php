<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko-{{$toko_barcode}}</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
  <style type="text/css">
    table tr td,
    table tr th{
      font-size: 9pt;
    }
  </style>
  <center>
    <h5>Data Toko</h4>
  </center>

  <table class='table table-bordered' width="100%">
    <thead>
      <tr style="text-align: center;">
        <th>Barcode</th>
            <th>Toko</th>
        <th>Latitude</th>
        <th>Longitude</th>
        <th>Accuracy</th>
      </tr>
    </thead>
    <tbody>
      @foreach($toko as $t)
      <tr align="center">
                <td float="center">
               <!--  <?php
                      $number = $t->barcode;
                      $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
                      $barcode = $generator->getBarcode($number, $generator::TYPE_CODE_128);
                      ?>
                    
                  {!! $barcode !!} -->
                
                      <br>
                    <img src="data:image/png;base64,{{ DNS2D::getBarcodePNG($t->barcode, 'QRCODE') }}" 

                        alt="{{ $t->barcode }}"
                        width="200"
                        height="200">
                     <br>
                    {{$t->barcode}}
                    <br>
                    {{$t->nama_toko}}
                  </br>
                
                </td>
        
        <td>{{$t -> nama_toko}}</td>
        <td>{{$t -> latitude}}</td>
        <td>{{$t -> longitude}}</td>
        <td>{{$t -> accuracy}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</body>
</html>
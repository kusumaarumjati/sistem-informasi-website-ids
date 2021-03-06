@extends('layout.template')
@section('page_title', 'Scanner barcode')
@section('css custom')
<zxing-scanner [tryHarder]="true" [formats]="formats" (scanSuccess)="onScanSuccessHandler($event)"></zxing-scanner>
@section('title', 'Scan barcode')
@section('breadcrumb')
 <li class="breadcrumb-item"><a href="#">Home</a></li>
  <li class="breadcrumb-item active">Scanner barcode</li>
@endsection

@section('content')
<div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Scan barcode</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                  <main class="wrapper" style="padding-top:2em">

    <section class="container" id="demo-content">

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

    </section>

    <footer class="footer">
      <section class="container">
      </section>
    </footer>

  </main>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
          
                </div>
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->
@endsection
@section('js_custom')
<script type="text/javascript" src="https://unpkg.com/@zxing/library@0.18.3-dev.7656630/umd/index.js "></script>

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
@extends('layouts.template')

@section('head')

   <!-- Custom styles for this template -->
   <link href="{{asset('/css/form-validation.css')}}" rel="stylesheet">

@endsection
@section('index')
  <header>
    <nav class="navbar navbar-expand-md fixed-top navbar-dark bg-dark">
      <a class="navbar-brand mr-auto mr-lg-0" href="#">PCC</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse offcanvas-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="/">Peminjaman<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="lihatpeminjaman">Lihat Peminjaman</a>
          </li>
          
          
        </ul>
        
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </nav>
    </header>
    </br>
    </br>
    </br>
    </br>



    <div class="container">
      <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="{{asset('PCC.png')}}" alt="" width="120" height="120">
        <h2>Polytechnic Computer Club</h2>
        <p class="lead">Peminjaman Alat</p>
      </div>

      <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Total Peminjaman</span>
            <span class="badge badge-secondary badge-pill">{{$count}}</span>
            
          </h4>
          
          <ul class="list-group mb-3">
          @foreach($peminjaman as $data)
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">{{$data->alat}} x {{$data->jumlah}}</h6>
                <small class="text-muted">{{$data->nama}}</small>
              </div>
              <span class="text-muted">Rp.{{$data->biaya}}</span>
            </li>
          @endforeach
            
            
            <li class="list-group-item d-flex justify-content-between" onclick="">
            <div>
            <span data-feather="more-horizontal"></span>
            </div>
            <a href="lihatpeminjaman" class="text-muted"><small>Lihat Lainnya</small></a>
            
              <!-- <strong>$20</strong> -->
            </li>
          </ul>

        </div>


        <div class="col-md-8 order-md-1">
          @if (session('update'))
          <div class="alert alert-danger alert-dismissable custom-success-box" style="margin: 15px;">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong> {{ session('update') }} </strong> Periksa kembali jumlah peminjaman anda!
          </div>
          @endif
          <h4 class="mb-3">Input Data</h4>
          <form action="./peminjaman" method="post" enctype="multipart/form-data" class="needs-validation" id="frm" novalidate>
          {{ csrf_field() }}
          <div class="row">
              <div class="col-md-6 mb-3">
                <label for="cc-name">Nama Peminjam</label>
                <input type="text" class="form-control" name="nama" placeholder="" required>
                <small class="text-muted">Nama Lengkap</small>
                <div class="invalid-feedback">
                  Full Name is required
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="cc-number">Nama KTM</label>
                <input type="text" class="form-control" name="namaktm" placeholder="" required>
                <div class="invalid-feedback">
                  Name is required
                </div>
              </div>
            </div>
            

            <div class="mb-3">
              <label for="email">Email <span class="text-muted">(Opsional)</span></label>
              <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com">
              <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
              </div>
            </div>

            <div class="mb-3">
              <label for="hp">No.HP</label>
              <input type="number" class="form-control" id="hp" name="hp" min="0" placeholder="0896" required>
              <div class="invalid-feedback">
                Please enter your Phone number.
              </div>
            </div>
            <div class="mb-3">
                <label for="country">Nama UKM</label>
                <select name="ukm" class="custom-select d-block w-100" required>
                  <option value="">Pilih UKM...</option>
                  <option>PCC</option>
                  <option>PP</option>
                  <option>WAPALHI</option>
                  <option>KSR</option>
                  <option>KWU</option>
                  <option>JAZIRAH</option>
                  <option>ROHKRIS</option>
                  <option>SPORT</option>
                  <option>KONSEP
                  <option>DIMENSI</option>
                  <option>BEM</option>
                  <option>BPM</option>
                  <option>RACANA</option>
                  <option>KOPMA</option>
                  <option>HIMA</option>
                  <option>HME</option>
                  <option>HMS</option>
                  <option>HMM</option>
                  <option>HMAB</option>
                  <option>PANITIA P3 PEMIRA</option>
                  <option>PECC</option>
                  <option>PRIBADI</option>
                </select>
                <div class="invalid-feedback">
                  Please select a valid Organization.
                </div>
              </div>


            <div class="row">
              <div class="col-md-5 mb-3">
                <label for="country">Jenis Alat</label>
                <select onchange="myFunction(this.value)" class="custom-select d-block w-100" id="alat" name="alat" required>
                <option value="">Pilih Alat...</option>
                @foreach($alat as $data)
                  <option value="{{$data->id}}|{{$data->biaya}}|{{$data->stok}}">{{$data->nama}}</option>
                @endforeach
                </select>
                <div class="invalid-feedback">
                  Please select a valid item.
                </div>
              </div>
              <div class="col-md-4 mb-3">
                <label for="state">Tanggal Kembali</label>
                <input type="text" name="tanggal" class="form-control tanggal" required/>
                <div class="invalid-feedback">
                  Please provide a valid date.
                </div>
              </div>
              <div class="col-md-3 mb-3">
                <label for="zip">Jumlah</label>
                <input type="number" class="form-control" id="jumlah" name="jumlah" min="1" placeholder="" required >
                <div id="jumlahfeed" class="invalid-feedback">
                  Qty is required.
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-5 mb-3">
                <label for="cc-name">Stok Tersedia</label>
                <input type="text" class="form-control" name="stok" id="stok" placeholder="" value="-" readonly>
                <div class="invalid-feedback">
                Lack amount of stock
                </div>
              </div>
              <div class="col-md-7 mb-3">
              <label for="email">Nama Staff</label>
              <input type="text" class="form-control" id="staff" name="staff" required>
              <div class="invalid-feedback">
                Please enter a valid staff name for shipping updates.
              </div>
              </div>
            </div>
            
            <hr class="mb-4">

            <h4 class="mb-3">Biaya</h4>
            <div class="row">
              <div class="col-md-3 mb-3">
                <label for="cc-expiration">Total Biaya</label>
                <input type="text" name="biaya" class="form-control" id="biaya" value="-" placeholder="" readonly>
                <div class="invalid-feedback">
                  Expiration date required
                </div>
              </div>
              
            </div>
            <hr class="mb-4">
            <button id="btn" class="btn btn-primary btn-lg btn-block" type="submit">Submit</button>
          </form>
        </div>
      </div>

      <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; 2018-2019 PCC</p>
        <ul class="list-inline">
          <li class="list-inline-item"><a href="#">Privacy</a></li>
          <li class="list-inline-item"><a href="#">Terms</a></li>
          <li class="list-inline-item"><a href="#">Support</a></li>
        </ul>
      </footer>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="{{('/js/jquery-3.3.1.min.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="{{asset('/js/popper.min.js')}}"></script>
    <script src="{{asset('/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('/js/holder.min.js')}}"></script>

    
    <!-- DatePicker -->
    <link href="{{asset('/datepicker/css/bootstrap-datepicker.min.css')}}" rel="stylesheet">
    <script type="text/javascript" src="{{asset('/datepicker/js/bootstrap-datepicker.min.js')}}"></script>

    <script>
      var biaya =0;
     $('#jumlah').bind('input', function() { 
       
       var jumlah= $(this).val() // get the current value of the input field.
       var total = jumlah*biaya;

      document.getElementById('biaya').value= total; 
    });
    </script>

    <script>
    function myFunction(val) {
        
        var explode = val.split('|');
        var jumlah = document.getElementById("jumlah").value;
        biaya = explode[1];

        document.getElementById('biaya').value=biaya ; 
        document.getElementById('stok').value=explode[2] ; 

    }
    </script>

    <script>
     $(document).ready(function () {
                $('.tanggal').datepicker({
                    format: "dd-mm-yyyy",
                    autoclose:true
                });
    });

    </script>

    <script>
        $("#btn").on("click", function(){

          //Validasi stok dan jumlah
          var stok = document.getElementById("stok").value;
          var jumlah = document.getElementById("jumlah").value;

          // if(stok < jumlah){
          //     // Ketika jumlah melebihi stok
          //     document.getElementById('jumlahfeed').innerHTML="Use less amount than stok!"; 
          //     $('#stok').addClass('is-invalid');
          //     $('#jumlah').removeClass('is-valid').addClass('is-invalid');
          //     $('#frm').addClass('was-validated');
          //     event.preventDefault();
          //     event.stopPropagation();
            
          // }else{
          //     document.getElementById('jumlahfeed').innerHTML="Qty is required"; 
          //     $('#stok').removeClass('is-invalid');
          //     $('#jumlah').removeClass('is-invalid').addClass('is-isvalid');
          // }
        });
    </script>


    <script>
      // Example starter JavaScript for disabling form submissions if there are invalid fields
      (function() {
        'use strict';

        window.addEventListener('load', function() {
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.getElementsByClassName('needs-validation');

          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {

              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();
    </script>
    <!-- Icons -->
    <script src="{{asset('js/feather.min.js')}}"></script>
    <script>
      feather.replace()
    </script>
    

@endsection
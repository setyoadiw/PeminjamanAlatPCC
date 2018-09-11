@extends('layouts.template')

@section('head')

    <link href="{{asset('/css/dashboard.css')}}" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{asset('DataTables/datatables.min.css')}}"/>


@endsection

@section('index')
<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-pcc">
      <a class="navbar-brand mr-auto mr-lg-0" href="#">PCC</a>
      <button class="navbar-toggler p-0 border-0" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse offcanvas-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item ">
            <a class="nav-link" href="/">Peminjaman</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="lihatpeminjaman">Lihat Peminjaman<span class="sr-only">(current)</span></a>
          </li>
        </ul>

        @guest
        <div class="navbar-nav form-inline nav-item my-2 my-lg-0">
          <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
          <li><a class="nav-link disabled" >{{ __('Register') }}</a></li>

        </div>
        @else
          <li class="navbar-nav form-inline nav-item dropdown my-2 my-lg-0">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  {{ Auth::user()->name }} <span class="caret"></span>
              </a>

              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
              </div>
          </li>
        @endguest
      </div>
    </nav>
    <br/>
    

    <!-- dawdawd -->
  
    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
              <a class="nav-link " href="lihatpeminjaman">
                  <span data-feather="home"></span>
                  Dashboard 
                </a>
              </li>
              <li class="nav-item " >
                <a class="nav-link active" href="dataalat">
                  <span data-feather="bar-chart-2"></span>
                  Data Alat<span class="sr-only">(current)</span>
                </a>
              </li>
             
            </ul>

            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
              <span>Saved reports</span>
              <a class="d-flex align-items-center text-muted" href="#">
                <span data-feather="plus-circle"></span>
              </a>
            </h6>
            <ul class="nav flex-column mb-2">
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  Current month
                </a>
              </li>
              
            </ul>
          </div>
        </nav>

        
        

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Inventaris</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
              <button onclick="@if (Auth::guest())
                    
                     window.location='{{ url("/login") }}'
                     @else
                     
                @endif" data-toggle="modal" data-target="#myModal" type="button" class="btn btn-sm btn-outline-primary ">
                <span data-feather="file-plus"></span>
                Tambah Alat
              </button>
            </div>
          </div>

            <!-- Modal -->
            <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                <div class="modal-header">
                <h4 class="modal-title">Tambah Alat</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>
                <div class="modal-body">
                    <form action="/dataalat/add" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-5 mb-3">
                          <label for="cc-name">Nama Barang</label>
                          <input type="text" class="form-control" name="nama" placeholder="" required>
                        </div>
                        <div class="col-md-4 mb-3">
                          <label for="cc-number">Kategori</label>
                          <select class="custom-select d-block w-100" id="kategori" name="kategori" required>
                            <option value="">Pilih Kategori...</option>
                            <option>Alat Elektronik</option>
                            <option value="Dokumentasi dan Dekorasi">Dokumentasi dan Dekorasi</option>
                            <option>Buku/Pustaka</option>
                            <option value="Alat Tulis Kantor">Alat Tulis Kantor</option>
                            <option value="Alat Kebersihan">Alat Kebersihan</option>
                            <option value="Alat Ibadah">Alat Ibadah</option>
                            <option value="Aset Tetap/Perlengkapan">Aset Tetap/Perlengkapan</option>
                            <option value="Barang Maintenance">Barang Maintenance</option>
                            <option value="Persediaan">Persediaan</option>
                          </select>
                        </div>
                        <div class="col-md-3 mb-3">
                          <label for="cc-number">Stok</label>
                          <input type="number" class="form-control" name="stok" placeholder="" min="0" required>
                        </div>
                    </div>
                    <div class="row">
                      <div class="col-md-5 mb-3">
                        <label for="cc-name">No.Inventaris</label>
                        <input type="text" class="form-control" name="noinventaris" placeholder="PCC/01/01/01" required>
                      </div>
                      <div class=" col-md-4 mb-3">
                        <label for="country">Peminjaman</label>
                        <select name="peminjaman" class="custom-select d-block w-100" required>
                          <option value="">Pilih...</option>
                          <option>Dipinjamkan</option>
                          <option>Tidak Dipinjamkan</option>
                        </select>
                      </div>
                      <div class="col-md-3 mb-3">
                        <label for="cc-name">Biaya Pinjam</label>
                        <input type="number" class="form-control" name="biaya" min="0" placeholder="" required>
                      </div>
                    </div>
                    <div class="mb-3">
                      <div class="form-group">
                        <label for="exampleFormControlTextarea1">Keterangan<span class="text-muted">(Opsional)</span></label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="ket" rows="3"></textarea>
                      </div>

                    </div>
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Submit</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
                </div>
            </div>
            </div>

            <!-- Modal Edit -->
            <div id="myModalEdit" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                <div class="modal-header">
                <h4 class="modal-title">Edit Alat</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>
                <div class="modal-body">
                    <form id="myFormEdit" action="/dataalat/" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="row">
                        <div class="col-md-5 mb-3">
                          <label for="cc-name">Nama Barang</label>
                          <input type="text" class="form-control" name="nama" id="nama" placeholder="" required>
                        </div>
                        <div class="col-md-4 mb-3">
                          <label for="cc-number">Kategori</label>
                          <select class="custom-select d-block w-100" id="kategori" name="kategori" required>
                            <option value="">Pilih Kategori...</option>
                            <option>Alat Elektronik</option>
                            <option value="Dokumentasi dan Dekorasi">Dokumentasi dan Dekorasi</option>
                            <option>Buku/Pustaka</option>
                            <option value="Alat Tulis Kantor">Alat Tulis Kantor</option>
                            <option value="Alat Kebersihan">Alat Kebersihan</option>
                            <option value="Alat Ibadah">Alat Ibadah</option>
                            <option value="Aset Tetap/Perlengkapan">Aset Tetap/Perlengkapan</option>
                            <option value="Barang Maintenance">Barang Maintenance</option>
                            <option value="Persediaan">Persediaan</option>
                          </select>
                        </div>
                        <div class="col-md-3 mb-3">
                          <label for="cc-number">Stok</label>
                          <input type="number" class="form-control" name="stok" id="stok" placeholder="" min="0" required>
                        </div>
                    </div>
                    <div class="row">
                      <div class="col-md-5 mb-3">
                        <label for="cc-name">No.Inventaris</label>
                        <input type="text" class="form-control" id="noinventaris" name="noinventaris" placeholder="PCC/01/01/01" required>
                      </div>
                      <div class=" col-md-4 mb-3">
                        <label for="country">Peminjaman</label>
                        <select name="peminjaman" class="custom-select d-block w-100" id="peminjaman" required>
                          <option value="">Pilih...</option>
                          <option>Dipinjamkan</option>
                          <option>Tidak Dipinjamkan</option>
                        </select>
                      </div>
                      <div class="col-md-3 mb-3">
                        <label for="cc-name">Biaya Pinjam</label>
                        <input type="number" class="form-control" id="biaya" name="biaya" min="0" placeholder="" required>
                      </div>
                    </div>
                    <div class="mb-3">
                      <div class="form-group">
                        <label for="exampleFormControlTextarea1">Keterangan<span class="text-muted">(Opsional)</span></label>
                        <textarea class="form-control" id="ket" name="ket" rows="3"></textarea>
                      </div>
                    </div>
                    <input type="hidden" id="id" value="" name="id">
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Update</button>
                    
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
                </div>
            </div>
            </div>

          <div class="table">
          <table id="table_id" class="display" style="text-align:center;">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Alat</th>
                    <th>Kategori</th>
                    <th>No Inventaris</th>
                    <th>Stok</th>
                    <th>Biaya</th>
                    <th>Peminjaman</th>
                    <th>Ket</th>
                    <th>Edit</th>                    
                </tr>
            </thead>
            <tbody>

                @foreach($alat as $data)

                <tr>
                    <td>{{$data->id}}</td>
                    <td>{{$data->nama}}</td>
                    <td>{{$data->kategori}}</td>
                    <td>{{$data->noinventaris}}</td>
                    <td>{{$data->stok}}</td>
                    <td>{{$data->biaya}}</td>
                    <td>{{$data->peminjaman}}</td>
                    <td>{{$data->ket}}</td>
                    <td>

                        <form action="./dataalat/{{$data->id}}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('delete') }}

                        <button onclick="@if (Auth::guest())
                    
                          window.location='{{ url("/login") }}'
                          @else

                          @endif" data-toggle="modal" data-target="#myModalEdit" 
                          data-id="{{$data->id}}"
                          data-nama="{{$data->nama}}" 
                          data-noinventaris="{{$data->noinventaris}}"
                          data-stok="{{$data->stok}}"
                          data-biaya="{{$data->biaya}}"
                          data-peminjaman="{{$data->peminjaman}}"
                          data-ket="{{$data->ket}}"
                          data-kategori="{{$data->kategori}}" type="button" id="edit" class="btn btn-sm btn-outline-secondary ">
                          <span data-feather="edit"></span>
                          Edit
                        </button>
                        
                        
                        <button type="submit" class="btn btn-sm btn-outline-danger" @if (Auth::guest()) disabled @else @endif >
                        <span data-feather="delete"></span>
                            Delete
                        </button>
                        </form>
                    </td>
                </tr>

                @endforeach


              
                
            </tbody>
          </table>
          </div>
        </main>
      </div>
    </div>

    <script type="text/javascript" src="{{asset('DataTables/datatables.min.js')}}"></script>
    <script>
        $('#table_id').DataTable( {
            buttons: [
                'copy', 'excel', 'pdf'
            ]

        } );
    </script>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="{{('/js/jquery-3.3.1.min.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="{{asset('/js/dashboard/popper.min.js')}}"></script>
    <script src="{{asset('/js/dashboard/bootstrap.min.js')}}"></script>

    <!-- Icons -->
    <script src="{{asset('js/feather.min.js')}}"></script>
    <script>
      feather.replace()
    </script>

    <script>
      $(document).ready(function() {

        $("#edit").click(function () {

          var data_id = $(this).data('id');
          var data_nama = $(this).data('nama');
          var data_kategori = $(this).data('kategori');
          var data_stok = $(this).data('stok');
          var data_noinventaris = $(this).data('noinventaris');
          var data_peminjaman = $(this).data('peminjaman');
          var data_biaya = $(this).data('biaya');
          var data_ket = $(this).data('ket');
         
          document.getElementById('id').value= data_id ; 
          document.getElementById('nama').value= data_nama ; 
          document.getElementById('stok').value= data_stok ; 
          document.getElementById('noinventaris').value= data_noinventaris ; 
          document.getElementById('biaya').value= data_biaya ; 
          document.getElementById('ket').innerHTML=data_ket; 

          $('#myFormEdit').attr('action', '/dataalat/'+data_id);

        })
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
    

@endsection
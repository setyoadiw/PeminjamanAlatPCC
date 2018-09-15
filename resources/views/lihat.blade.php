@extends('layouts.template')

@section('head')

    <link href="{{asset('/css/dashboard.css')}}" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{asset('DataTables/datatables.min.css')}}"/>


@endsection

@section('index')
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-pcc">
      <a class="navbar-brand mr-auto mr-lg-0" href="#">PCC</a>
      <button class="navbar-toggler p-0 border-0" type="button"  data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse offcanvas-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item ">
            <a class="nav-link" href="./">Peminjaman</a>
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
                <a class="nav-link active" href="lihatpeminjaman">
                  <span data-feather="home"></span>
                  Dashboard <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="dataalat">
                  <span data-feather="bar-chart-2"></span>
                  Data Alat
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
            <h1 class="h2">Daftar Peminjaman</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
              
                <button class="btn btn-sm btn-outline-secondary">Export</button>
              </div>
              <button class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar"></span>
                This week
              </button>
            </div>
          </div>

          <div class="table table-responsive">
          <table id="table_id" class="display" style="text-align:center;">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Lengkap</th>
                    <th>Nama KTM</th>
                    <th>No HP</th>
                    <th>Nama UKM</th>
                    <th>Jenis Alat</th>
                    <th>Tanggal Kembali</th>
                    <th>Jumlah</th>
                    <th>Biaya</th>
                    <th>Staff</th>
                    <th>Waktu Pinjam</th>
                    <th>Alat Kembali</th>
                </tr>
            </thead>
            <tbody>

                @foreach($peminjaman as $data)

                <tr>
                    <td>{{$data->id}}</td>
                    <td>{{$data->nama}}</td>
                    <td>{{$data->namaktm}}</td>
                    <td>{{$data->hp}}</td>
                    <td>{{$data->ukm}}</td>
                    <td>{{$data->alat}}</td>
                    <td>{{$data->tanggalkembali}}</td>
                    <td>{{$data->jumlah}}</td>
                    <td>{{$data->biaya}}</td>
                    <td>{{$data->staff}}</td>
                    <td>{{$data->created_at}}</td>
                    <td>
                    @if ($data->kembali == 0) 
                    <button onclick="@if (Auth::guest())
                            window.location='{{ url("/login") }}'
                            @else   
                        @endif" rel="tooltip" data-toggle="modal" data-id="{{$data->id}}" data-jumlah="{{$data->jumlah}}" data-alat="{{$data->alat}}" data-target="#myModal" title="Klik Apabila Sudah Dikembalikan" type="button" class="btn btn-sm btn-outline-danger" style="border-radius: 4px;">
                        <span data-feather="x-circle"></span>
                        Belum
                    </button>
                    @else
                    <button type="button" class="btn btn-sm btn-outline-success" style="border-radius: 4px;" disabled>
                        <span data-feather="check-circle"></span>
                        Kembali
                    </button>
                    @endif
                    </td>
                </tr>

                @endforeach
                
            </tbody>
          </table>
          </div>
        </main>
      </div>
    </div>

    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                <div class="modal-header">
                <h4 class="modal-title">Konfirmasi Pengembalian Alat</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>
                <div class="modal-body">
                    <form action=get_action() id="myFormId" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                    {{ csrf_field() }}
                    
                    <p>Jumlah stok alat akan dikembalikan. Pastikan kembali alat dan jumlah sudah sesuai dengan yang dipinjamkan .</p>
                    <div class="container">
                    <p id="alat"></p>
                    
                    </div>
                    <input type="hidden" id="id" value="" name="id">
                    <input type="hidden" id="jumlah" value="" name="jumlah">
                    <p class="text-muted"><span data-feather="alert-triangle"></span> Aksi ini tidak dapat diulangi</p>
                    
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Konfirmasi</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
                </div>
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
    <script>
        $(document).ready(function(){
            $('[rel='tooltip']').tooltip();   
        });
    </script>
    <script>
      $(document).ready(function() {

        $('button[data-toggle = modal]').click(function () {

          var data_id = '';
          var data_jumlah = '';
          var data_alat = '';

          if (typeof $(this).data('id') !== 'undefined') {

            data_id = $(this).data('id');
            data_jumlah = $(this).data('jumlah');
            data_alat = $(this).data('alat');
          }

          document.getElementById('id').value= data_id ; 
          document.getElementById('jumlah').value= data_jumlah ; 
          document.getElementById('alat').innerHTML=data_alat +" x "+data_jumlah; 

          $('#myFormId').attr('action', '/lihatpeminjaman/'+data_id+"/kembali");

        })
      });
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
    

@endsection
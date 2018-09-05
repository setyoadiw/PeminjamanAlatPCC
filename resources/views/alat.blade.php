@extends('layouts.app')

@section('head')

    <link href="{{asset('/css/dashboard.css')}}" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{asset('DataTables/datatables.min.css')}}"/>


@endsection

@section('index')
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
      <a class="navbar-brand mr-auto mr-lg-0" href="#">PCC</a>
      <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item ">
            <a class="nav-link" href="/">Peminjaman</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="lihatpeminjaman">Lihat Peminjaman<span class="sr-only">(current)</span></a>
          </li>
          
          
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
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
                  <span data-feather="file"></span>
                  Data Alat<span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="shopping-cart"></span>
                  Products
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="users"></span>
                  Customers
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="bar-chart-2"></span>
                  Reports
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="layers"></span>
                  Integrations
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
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  Last quarter
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  Social engagement
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  Year-end sale
                </a>
              </li>
            </ul>
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Daftar Alat</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
              <button data-toggle="modal" data-target="#myModal" type="button" class="btn btn-sm btn-outline-primary ">
                <span data-feather="folder-plus"></span>
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
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="/dataalat/add" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-6 mb-3">
                        <label for="cc-name">Nama Barang</label>
                        <input type="text" class="form-control" name="nama" placeholder="" required>

                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="cc-number">Stok</label>
                        <input type="text" class="form-control" name="stok" placeholder="" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 mb-3">
                        <label for="cc-name">Biaya</label>
                        <input type="text" class="form-control" name="biaya" placeholder="" required>
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
          
          <div class="table">
          <table id="table_id" class="display" style="text-align:center;">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Alat</th>
                    <th>Stok</th>
                    <th>Edit</th>                    
                </tr>
            </thead>
            <tbody>

                @foreach($alat as $data)

                <tr>
                    <td>{{$data->id}}</td>
                    <td>{{$data->nama}}</td>
                    <td>{{$data->stok}}</td>
                    <td><button class="btn btn-sm btn-outline-secondary">
                        <span data-feather="edit"></span>
                            Edit
                        </button>
                        <button class="btn btn-sm btn-outline-danger">
                        <span data-feather="delete"></span>
                            Delete
                        </button>
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
    

@endsection
@extends('layout.master')

@section('content')
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Tambah User</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>


            <div class="clearfix"></div>
              <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                @if($flash = session('message'))
                <div class="alert alert-success alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    {{$flash}}
                </div>
                @endif

                <div class="x_panel">
                  <div class="x_title">
                    <h2>Daftar User <small>different form elements</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <table class="table">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Peminjam</th>
                          <th>Buku</th>
                          <th>Tnggal Pinjam</th>
                          <th>Tanggal Kembali</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($borrows as $index => $borrow)
                        <tr>
                          <th scope="row">{{$index+1}}</th>
                          <td>
                            @foreach ($borrow->user as $user)
                              {{$user->name}}
                            @endforeach
                          </td>
                          <td>
                            @foreach ($borrow->book as $book)
                              {{$book->title}}
                            @endforeach
                          </td>
                          <td>{{ Carbon\Carbon::parse($borrow->borrow_date)->formatLocalized('%d %B %Y')}}</td>
                          <td>{{$borrow->return_date}}</td>
                          <td>
                            <a href="end/{{$borrow->id}}"><button type="button" class="btn btn-default  ">Selesai</button></a>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>

                  </div>
                </div>
              </div>
                  </div>
                </div>
              </div>
            </div>

        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>
@endsection
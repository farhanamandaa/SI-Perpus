@extends('layout.master')

@section('content')
	<!-- page content -->
        <div class="right_col" role="main">

          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Informasi Buku</h3>
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
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Detail Buku</h2>
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

                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <div class="product-image">
                        <img src="{{ asset("storage/books/$book->images") }}" alt="..." />
                      </div>
                    </div>

                    <div class="col-md-6 col-sm-6 col-xs-12" style="border:0px solid #e5e5e5;">

                      <h3 class="prod_title"> {{$book->title}} </h3>

                      <p>

                        <div class="form-group">
                          <label class="control-label col-md-5 col-sm-3 col-xs-12" for="name">Penulis :
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">{{$book->author}} </label>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="control-label col-md-5 col-sm-3 col-xs-12" for="name">Penerbit :
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">{{$book->publisher}} </label>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="control-label col-md-5 col-sm-3 col-xs-12" for="name">Tahun Terbit :
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">{{$book->year}} </label>
                          </div>
                        </div>
                        
                        <div class="form-group">
                          <label class="control-label col-md-5 col-sm-3 col-xs-12" for="name">Jumlah Halaman :
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">{{$book->pages}} </label>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="control-label col-md-5 col-sm-3 col-xs-12" for="name">Kategori:
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">{{$book->category->category}} </label>
                          </div>
                        </div>

                      </p>

                      <br />

                    </div>


                    
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

@endsection
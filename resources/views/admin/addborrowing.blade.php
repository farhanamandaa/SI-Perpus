@extends('layout.master')

@section('content')
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Informasi Peminjaman</h3>
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
                    <h2>Input Peminjaman <small>different form elements</small></h2>
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
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="{{route('admin.store.borrowing')}}">
                      @csrf
                      <div class="item form-group">
                        <label for="status" class="control-label col-md-3 col-sm-3 col-xs-12">Peminjam<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" id="user_id" name="user_id">
                          </select>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label for="status" class="control-label col-md-3 col-sm-3 col-xs-12">Buku<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" id="book_id" name="book_id">
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Jumlah Buku<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control" required="required" type="number" name="quantity" value="" min="1">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Peminjaman<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="date" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text" name="borrow_date" value="">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Pengembalian <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="date" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text" name="return_date" value="">
                        </div>
                      </div>
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>

                    </form>
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

@section('script')
  <script type="text/javascript">
    $(document).ready(function () {
      $('input[id="date"]') .datetimepicker({
        format: 'Y-MM-DD HH:mm:ss'
      });

      $('#user_id').select2({
        placeholder : 'Cari User..',
        ajax: {
          url: '/search',
          dataType: 'json',
          delay: 250,
        processResults: function (data) {
          return {
            results: data
        };
      },
      cache: true
        }
      });

      $('#book_id').select2({
        placeholder : 'Cari Buku..',
        ajax: {
          url: '/search_book',
          dataType: 'json',
          delay: 250,
        processResults: function (data) {
          return {
            results:  $.map(data, function (item) {
              return {
              id: item.id,  
              text: item.title
            }
          })
        };
      },
      cache: true
        }
      });

    });
  </script>

@endsection


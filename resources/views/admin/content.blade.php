@extends('layout.master')

@section('content')
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Index Dashboard</h3>
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
                <div class="col-md-12">
                  <div class="">
                    <div class="x_content">
                      <div class="row">
                        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                          <div class="tile-stats">
                            <div class="icon"><i class="fa fa-user"></i>
                            </div>
                            <div class="count">{{$user}}</div>

                            <h3>Anggota Terdaftar</h3>
                            <p>Lorem ipsum psdea itgum rixt.</p>
                          </div>
                        </div>
                        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                          <div class="tile-stats">
                            <div class="icon"><i class="fa fa-book"></i>
                            </div>
                            <div class="count">{{$book}}</div>

                            <h3>Jumlah Buku</h3>
                            <p>Lorem ipsum psdea itgum rixt.</p>
                          </div>
                        </div>
                        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                          <div class="tile-stats">
                            <div class="icon"><i class="fa fa-book"></i>
                            </div>
                            <div class="count">{{$borrow}}</div>

                            <h3>Peminjaman</h3>
                            <p>Lorem ipsum psdea itgum rixt.</p>
                          </div>
                        </div>
                        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                          <div class="tile-stats">
                            <div class="icon"><i class="fa fa-book"></i>
                            </div>
                            <div class="count">{{$returned}}</div>

                            <h3>Pengembalian</h3>
                            <p>Lorem ipsum psdea itgum rixt.</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
                    <div class="x_title">
                      <h2>Grafik Peminjaman<small>Sessions</small></h2>
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
                      <canvas id="tester" ></canvas>
                    </div>
                  </div>
                </div>
              </div>
              </div>
        <!-- /page content -->

      </div>
    </div>
@endsection

@section('script')
  <script type="text/javascript">
    var ctx = document.getElementById("tester");
    var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: {!! json_encode($name) !!},
        datasets: [{
            label: 'Jumlah',
            data: {{ json_encode($count) }},
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});

  </script>
@endsection
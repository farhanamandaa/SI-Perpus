@extends('layout.master')

@section('content')
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Profil</h3>
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
                    <h2>Data User <small>different form elements</small></h2>
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
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="{{route('user.update.profile')}}">
                      @csrf
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="name" name="name" required="required" class="form-control col-md-7 col-xs-12" value="{{ $userData->name }}" disabled="disabled">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="email" id="email" name="email" required="required" class="form-control col-md-7 col-xs-12" value="{{ $userData->email }}" disabled="disabled">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label for="phone" class="control-label col-md-3 col-sm-3 col-xs-12">No. Telepon <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="phone" class="form-control col-md-7 col-xs-12" type="text" name="phone_number" 
                          @if (!empty($profileData->phone_number))
                            value="{{$profileData->phone_number}}" 
                          @endif>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label for="status" class="control-label col-md-3 col-sm-3 col-xs-12">Alamat<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="phone" class="form-control col-md-7 col-xs-12" type="text" name="address"
                          @if (!empty($profileData->address))
                            value="{{$profileData->address}}" 
                          @endif>
                        </div>
                      </div>
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-success">Save Changes</button>
                        </div>
                      </div>

                    </form>
                  </div>

                  <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="#" enctype="multipart/form-data" >
                      @csrf
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Image Profile <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file" id="images" name="images" required="required" class="form-control col-md-7 col-xs-12">
                           <div class="img-container">
                                    <img id="image"   alt="your image" style="height: 85%; width: 85%; display: block; margin-left: auto; margin-right: auto;" />
                                    <input type="hidden" id="source" value="">
                                  </div>
                        </div>

                      </div>
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              <a class="btn btn-primary" id="download" href="javascript:void(0);" download="cropped.png">Download</a>
                              
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
$(function() {
  var $image = $("#image");
  var $input = $("[name='images']");

  $("input:file").change(function() {
    var oFReader = new FileReader();

    oFReader.readAsDataURL(this.files[0]);

    oFReader.onload = function (oFREvent) {

      // Destroy the old cropper instance
      $image.cropper('destroy');

      // Replace url
      $image.attr('src', this.result);

      // Start cropper
      $image.cropper({
        aspectRatio: 1,
        movable: false,
        zoomable: false,
        rotatable: false,
        scalable: false,
        crop: function(e) {
          $input.val(e.x + ", " + e.y +"," + e.width + "," + e.height);
        }
      });
    };
  });
});
</script>
@endsection


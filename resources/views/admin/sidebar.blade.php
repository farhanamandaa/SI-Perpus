i<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
  <div class="menu_section">
    <h3>General</h3>
    <ul class="nav side-menu">
      <li><a href="{{ route('admin.home') }}"><i class="fa fa-home"></i> Dashboard {{-- <span class="fa fa-chevron-down"></span> --}}</a>
{{--         <ul class="nav child_menu">
          <li><a href="form.html">General Form</a></li>
          <li><a href="form_advanced.html">Advanced Components</a></li>
          <li><a href="form_validation.html">Form Validation</a></li>
          <li><a href="form_wizards.html">Form Wizard</a></li>
          <li><a href="form_upload.html">Form Upload</a></li>
          <li><a href="form_buttons.html">Form Buttons</a></li>
        </ul> --}}
      </li>
      <li><a><i class="fa fa-book"></i> Informasi Buku {{-- <span class="fa fa-chevron-down"></span> --}}</a>
        <ul class="nav child_menu">
          <li><a href="{{ route('admin.book') }}">Data Buku</a></li>
          <li><a href="{{ route('admin.book.categories') }}">Data Kategori Buku</a></li>
        </ul>
      </li>
      <li><a><i class="fa fa-user"></i> Informasi User {{-- <span class="fa fa-chevron-down"></span> --}}</a>
        <ul class="nav child_menu">
          <li><a href="{{route('admin.list.user')}}">Data User</a></li>
          <li><a href="{{route('admin.add.user')}}">Tambah User Baru</a></li>
        </ul>
      </li>
      <li><a><i class="fa fa-pencil-square"></i> Informasi Peminjaman {{-- <span class="fa fa-chevron-down"></span> --}}</a>
        <ul class="nav child_menu">
          <li><a href="{{ route('admin.borrowing.list') }}">Data Peminjaman</a></li>
          <li><a href="{{ route('admin.add.borrowing') }}">Input Peminjaman</a></li>
          <li><a href="{{ route('admin.returning.list') }}">Data Pengembalian</a></li>
        </ul>
      </li>
    </ul>
  </div>

</div>
    <!-- /sidebar menu -->
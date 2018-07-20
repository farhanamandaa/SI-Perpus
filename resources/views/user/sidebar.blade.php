<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
  <div class="menu_section">
    <h3>General</h3>
    <ul class="nav side-menu">
      <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="index.html">Dashboard</a></li>
          <li><a href="index2.html">Dashboard2</a></li>
          <li><a href="index3.html">Dashboard3</a></li>
        </ul>
      </li>
      <li><a><i class="fa fa-book"></i> Informasi Buku {{-- <span class="fa fa-chevron-down"></span> --}}</a>
        <ul class="nav child_menu">
          <li><a href=" {{ route('user.list.book') }} ">Daftar Buku</a></li>
          <li><a href="#">Data Kategori Buku</a></li>
        </ul>
      </li>
      <li><a><i class="fa fa-shopping-cart"></i> Informasi Peminjaman {{-- <span class="fa fa-chevron-down"></span> --}}</a>
        <ul class="nav child_menu">
          <li><a href=" {{ route('user.borrowing.list') }} ">Daftar Peminjaman</a></li>
          <li><a href="#">Data Kategori Buku</a></li>
        </ul>
      </li>
      <li><a><i class="fa fa-user"></i> Menu User </a>
        <ul class="nav child_menu">
          <li><a href="{{ route('user.profile') }}">Profil</a></li>
          <li><a href="#">Data Kategori Buku</a></li>
        </ul>
      </li>
    </ul>
  </div>

</div>
    <!-- /sidebar menu -->
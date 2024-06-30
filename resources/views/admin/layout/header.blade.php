<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
    <?php
    use Illuminate\Support\Facades\Session;$mes = Session::get('id');
        if ($mes=='2'){
    ?>
      <li class="nav-item active">
      <a class="nav-link" href="{{route('homeadmin')}}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
    <?php
    }else if($mes=='3'){
    ?>
    <li class="nav-item active">
        <a class="nav-link" href="{{route('staff')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <?php
    }
    ?>
      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Quản lý
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse4" aria-expanded="true" aria-controls="collapse4">
          <i class="fas fa-fw fa-cog"></i>
          <span>Tài khoản</span>
        </a>
        <div id="collapse4" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
              <?php
              if($mes==2){
              ?>
            <a class="collapse-item" href="{{ route('danhsachtaikhoan')}}">Danh sách tài khoản</a>
            <a class="collapse-item" href="{{ route('themtaikhoan')}}">Thêm tài khoản</a>
              <?php
              }else if($mes==3){
                  ?>
                      <a class="collapse-item" href="{{ route('danhsachtaikhoannhanvien')}}">Tài khoản của {{\Illuminate\Support\Facades\Auth::user()->name}}</a>
              <?php
              }
                  ?>
          </div>
        </div>
      </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <?php
    if($mes==2){
        ?>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsenguoidung" aria-expanded="true" aria-controls="collapsenguoidung">
            <i class="fas fa-fw fa-cog"></i>
            <span>Loại Người Dùng</span>
        </a>
        <div id="collapsenguoidung" class="collapse" aria-labelledby="headingnguoidung" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('danhsachloainguoidung')}}">Danh sách loại người dùng</a>
                <a class="collapse-item" href="{{ route('themloainguoidung')}}">Thêm loại người dùng</a>
            </div>
        </div>
    </li>
    <?php
    }
    ?>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-cog"></i>
          <span>Món ăn</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
              <?php
              if($mes==2){
              ?>
            <a class="collapse-item" href="{{ route('danhsachmonan')}}">Danh sách món ăn</a>
            <a class="collapse-item" href="{{ route('themmonan')}}">Thêm món ăn</a>
              <?php
              }else if($mes==3){
              ?>
                  <a class="collapse-item" href="{{ route('danhsachmonan1')}}">Danh sách món ăn</a>
                  <a class="collapse-item" href="{{ route('themmonan1')}}">Thêm món ăn</a>
              <?php } ?>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse3" aria-expanded="true" aria-controls="collapse3">
          <i class="fas fa-fw fa-cog"></i>
          <span>Đặt bàn</span>
        </a>
        <div id="collapse3" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
              <?php
              if($mes==2){
              ?>
            <a class="collapse-item" href="{{ route('danhsachdatban')}}">Danh sách đặt bàn</a>
              <?php
                  }else if($mes==3){
              ?>
                  <a class="collapse-item" href="{{ route('danhsachdatban1')}}">Danh sách đặt bàn</a>
              <?php
              }
              ?>
          </div>
        </div>
      </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsean" aria-expanded="true" aria-controls="collapsean">
            <i class="fas fa-fw fa-cog"></i>
            <span>Đặt món ăn</span>
        </a>
        <div id="collapsean" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <?php
                if($mes==2){
                ?>
                <a class="collapse-item" href="{{ route('danhsachdatban')}}">Danh sách món ăn</a>
                <?php
                }else if($mes==3){
                ?>
                <a class="collapse-item" href="{{ route('danhsachdatban1')}}">Danh sách món ăn</a>
                <?php
                }
                ?>
            </div>
        </div>
    </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Danh mục</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
              <?php
              if($mes==2){
              ?>
                  <a class="collapse-item" href="{{ route('danhsachdanhmuc')}}">Danh sách danh mục</a>
                  <a class="collapse-item" href="{{ route('themdanhmuc')}}">Thêm danh mục</a>
              <?php
              }else if($mes==3){
              ?>
                  <a class="collapse-item" href="{{ route('danhsachdanhmuc1')}}">Danh sách danh mục</a>
                  <a class="collapse-item" href="{{ route('themdanhmuc1')}}">Thêm danh mục</a>
              <?php
              }
              ?>

          </div>
        </div>
      </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePhong" aria-expanded="true" aria-controls="collapsePhong">
            <i class="fas fa-fw fa-cog"></i>
            <span>Phong</span>
        </a>
        <div id="collapsePhong" class="collapse" aria-labelledby="headingPhong" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <?php
                if($mes==2){
                ?>
                    <a class="collapse-item" href="{{ route('danhsachphong')}}">Danh sách Phòng</a>
                    <a class="collapse-item" href="{{ route('themphong')}}">Thêm Phòng</a>
                <?php
                }else if($mes==3){
                ?>
                    <a class="collapse-item" href="{{ route('danhsachphong1')}}">Danh sách Phòng</a>
                    <a class="collapse-item" href="{{ route('themphong1')}}">Thêm Phòng</a>
                <?php
                }
                ?>

            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLoaiPhong" aria-expanded="true" aria-controls="collapseLoaiPhong">
            <i class="fas fa-fw fa-cog"></i>
            <span>Loại Phòng</span>
        </a>
        <div id="collapseLoaiPhong" class="collapse" aria-labelledby="headingLoaiPhong" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <?php
                if($mes==2){
                ?>
                    <a class="collapse-item" href="{{ route('danhsachloaiphong')}}">Danh sách Loại Phòng</a>
                    <a class="collapse-item" href="{{ route('themloaiphong')}}">Thêm Loại Phòng</a>
                <?php
                }else if($mes==3){
                ?>
                    <a class="collapse-item" href="{{ route('danhsachloaiphong1')}}">Danh sách Loại Phòng</a>
                    <a class="collapse-item" href="{{ route('themloaiphong1')}}">Thêm Loại Phòng</a>
                <?php
                }
                ?>

            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseEvent" aria-expanded="true" aria-controls="collapseEvent">
            <i class="fas fa-fw fa-cog"></i>
            <span>Lich</span>
        </a>
        <div id="collapseEvent" class="collapse" aria-labelledby="headingEvent" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <?php
                if($mes==2){
                ?>
                    <a class="collapse-item" href="{{ route('fullcalender')}}">Lịch</a>
                    <a class="collapse-item" href="{{ route('show')}}">Danh sách sự kiện</a>
                    {{--                <a class="collapse-item" href="{{ route('show')}}">Danh sách sự kiện</a>--}}
                    <a class="collapse-item" href="{{ route('them_event')}}">Thêm sự kiện</a>
                <?php
                }else if($mes==3){
                ?>
                    <a class="collapse-item" href="{{ route('fullcalender1')}}">Lịch</a>
                    <a class="collapse-item" href="{{ route('show1')}}">Danh sách sự kiện</a>
                    {{--                <a class="collapse-item" href="{{ route('show')}}">Danh sách sự kiện</a>--}}
                    <a class="collapse-item" href="{{ route('them_event1')}}">Thêm sự kiện</a>
                <?php
                }
                ?>

            </div>
        </div>
    </li>

      <li class="nav-item">
          <?php
          if($mes==2){
          ?>
              <a class="nav-link collapsed" href="{{ route('thongke')}}">
          <?php
          }else if($mes==3){
          ?>
              <a class="nav-link collapsed" href="{{ route('thongke1')}}">
          <?php
          }
          ?>

          <i class="fas fa-fw fa-cog"></i>
          <span>Thống kê</span>
        </a>
      </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('trangchu')}}">
            <i class="fas fa-home"></i>
            <span>Trang chủ</span>
        </a>
    </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>

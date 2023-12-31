<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
      <div class="navbar nav_title" style="border: 0;">
        <a href="{{ url('/') }}" class="site_title"><i class="fa fa-paw"></i> <span>Nandonik</span></a>
      </div>

      <div class="clearfix"></div>

      <!-- menu profile quick info -->
      <div class="profile clearfix">
        <div class="profile_pic">
          <img src="{{asset('backend/images/img.jpg')}}" alt="..." class="img-circle profile_img">
        </div>
        <div class="profile_info">
          <span>Welcome,</span>
          <h2>{{ auth()->user()->name }}</h2>
        </div>
      </div>
      <!-- /menu profile quick info -->

      <br />

      <!-- sidebar menu -->
      <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
        <div class="menu_section">
          <h3>General</h3>
          <ul class="nav side-menu">
                <li><a href=""><i class="fa fa-home"></i>Dashboard</a></li>
                <li><a><i class="fa fa-user"></i> User Management <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="#">Role Manage</a></li>
                        <li><a href="#">User Lists</a></li>
                        <li><a href="#">Add User</a></li>
                        <li><a href="#">Permission Manage</a></li>
                    </ul>
                </li>
                <li><a><i class="fa fa-user"></i> Products <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="">Category</a></li>
                        <li><a href="">Sub Category</a></li>
                        <li><a href="">Products</a></li>
                        <li><a href="">Offer</a></li>
                        <li><a href="">Brand</a></li>
                    </ul>
                </li>
                <li><a><i class="fa fa-user"></i> Orders <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="">All Order</a></li>

                    </ul>
                </li>
                <li><a><i class="fa fa-user"></i> Pages <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="">Home</a></li>
                        <li><a href="">Our Story</a></li>
                        <li><a href="">Privacy Policy</a></li>
                        <li><a href="">Contact Us Messages</a></li>
                        <li><a href="">FAQs</a></li>
                        <li><a href="">Terms &amp; Conditions</a></li>
                        <li><a href="">Shipping &amp; Return Policy</a></li>
                    </ul>
                </li>
                <li><a href=""><i class="fa fa-user"></i>Site Settings</a></li>
          </ul>
        </div>
      </div>
      <div class="sidebar-footer hidden-small">
        <a data-toggle="tooltip" data-placement="top" title="Logout" href=""
            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
        </a>
        <form id="logout-form" action="" method="POST" class="d-none">
            @csrf
        </form>
      </div>
    </div>
</div>

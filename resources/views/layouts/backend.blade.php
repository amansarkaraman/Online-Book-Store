<!DOCTYPE html>
<html lang="en">
  <head>
    @include('backend.assets.meta')
    <title>
        @yield('title')
    </title>
    @include('backend.assets.css')
  </head>

  @guest
    @yield('auth')
  @else
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
            @include('backend.includes.sidebar')
            <!-- top navigation -->
            @include('backend.includes.top_nav')
            <!-- page content -->
            <div class="right_col" role="main">
                @yield('content')
            </div>
            <!-- footer content -->
            @include('backend.includes.footer')
      </div>
    </div>
    @include('backend.assets.js')
  </body>
  @endguest
</html>

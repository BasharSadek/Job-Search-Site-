<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="6mL1qLBdknIfGlAOfZZDsKLqXfD2fmx3puiXZ2cH">
    <title>  @yield('title')</title>
  @include('layoutAdmin.css')
</head>
<body dir="rtl">
    <!-- Page Wrapper -->
    <div id="wrapper">
   @include('layoutAdmin.sidebar')
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand bg-gradient-new  topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>
                        <!-- Nav Item - Messages -->
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow float-left">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                
                                <img class="img-profile rounded-circle" src="{{asset(auth()->user()->selfie)}}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{url('showProfileAdmin')}}">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i> الملف الشخصي
                                </a>

                                <div class="dropdown-divider"></div>
                                <form action="{{url('logoutWebsite')}}"  method="POST" class="text-center"><input type="hidden" name="_token" value="6mL1qLBdknIfGlAOfZZDsKLqXfD2fmx3puiXZ2cH">                                      
                                    @csrf  <button type="submit" class="btn btn-link text-danger py-0 my-0"> <i
                                            class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        تسجيل الخروج</button>
                                </form>
                            </div>
                        </li>
                    </ul>
                </nav>
                <div id="alertPlace"></div>
                <!-- End of Topbar -->
                    <!-- Begin Page Content -->
@yield('body')
            </div>
           @include('layoutAdmin.footer')
        </div>
        <!-- End of Content Wrapper -->
    </div>
 @include('layoutAdmin.js')
</body>

</html>

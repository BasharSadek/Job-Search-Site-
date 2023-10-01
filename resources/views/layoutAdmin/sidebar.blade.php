     <!-- Sidebar -->
     <ul class="navbar-nav bg-gradient-new sidebar sidebar-dark accordion text-center" id="accordionSidebar">
        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
            <div class="sidebar-brand-text navbar-brand mx-3" style="font-size: 30px">  دليل</div>
        </a>
        <!-- Divider -->
        <hr class="sidebar-divider my-0 bg-white">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="{{url('homeAdmin')}}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>الصفحة الاساسية</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">
        <!-- Nav Item - Pages Collapse Menu -->
        {{-- <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-fw fa-folder"></i>
                <span> بيانات المستخدمين </span>
            </a>
            <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">

                    <div class="collapse-divider"></div>
                    <h6 class="collapse-header">صفحات  الشركات</h6>
                    <a class="collapse-item" href="{{url('viewCompanies')}}">شركات الموقع</a>
                    <a class="collapse-item" href="{{url('viewJobsType')}}">أنواع الوظائف</a>
                    <div class="collapse-divider"></div>
                    <h6 class="collapse-header">صفحات العملاء</h6>
                    <a class="collapse-item" href="{{url('viewClients')}}">العملاء الموقع</a>
                    <a class="collapse-item" href="#">المخابر</a>
                    <a class="collapse-item" href="#">بشار صادق</a>
                </div>
            </div>
        </li> --}}
        <!-- Nav Item - Pages Collapse Menu -->
        {{-- <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages2"
                aria-expanded="true" aria-controls="collapsePages2">
                <i class="fas fa-fw fa-folder"></i>
                <span>صفحات الاضافة</span>
            </a>
            <div id="collapsePages2" class="collapse" aria-labelledby="headingPages"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">

                    <a class="collapse-item" href="{{url('addCompany')}}"> شركة</a>
                    <a class="collapse-item" href="{{url('addJobType')}}">نوع الوظائف</a>
                    <a class="collapse-item" href="#">الاخبار</a>
                    <a class="collapse-item" href="#">اعلانات</a>


                </div>
            </div>
        </li> --}}
        
        <li class="nav-item">
            <a class="nav-link" href="{{url('viewCompanies')}}">
                <i class="fas fa-fw fa-table"></i>
                <span>شركات الموقع</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{url('viewJobsType')}}">
                <i class="fas fa-fw fa-marker"></i>
                <span> <b>    أنواع التخصصات </b></span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{url('viewClients')}}">
                <i class="fas fa-fw fa-sticky-note"></i>
                <span> العملاء</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{url('viewJobAdmin')}}">
                <i class="fas fa-fw fa-table"></i>
                <span>الوظائف </span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{url('viewCourseAdmin')}}">
                <i class="fas fa-fw fa-table"></i>
                <span>الدورات </span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{url('viewRequests')}}">
                <i class="fas fa-fw fa-marker"></i>
                     طلبات للنشر </b></span></a>    {{-- <span> <b> <p class="notifiction" > @if ($_COOKIE['admin1'] != 0)
                        <p style="content: {{ $_COOKIE['admin1']}}  "></p>  
                      @endif
                          </p> --}}
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{url('viewAccept')}}">
                <i class="fas fa-fw fa-marker"></i>
                <span> <b>تأكيد للنشر </b></span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{url('/')}}">
                <i class="fas fa-fw fa-book"></i>
                <span> العودة للموقع</span></a>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">
        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
    </ul>
    <!-- End of Sidebar -->

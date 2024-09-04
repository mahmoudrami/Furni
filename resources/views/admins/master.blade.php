<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>@yield('title', env('APP_NAME'))</title>



        <!-- Custom fonts for this template-->
        <link href="{{ asset('back/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
        <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="{{ asset('back/css/sb-admin-2.min.css') }}" rel="stylesheet">

        {{-- toastr --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

        <style>
            .wrapper-color {
                position: fixed;
                right: -60px;
                top: 60px;
                width: 100px;
                display: flex;
                transition: all 0.3s ease;
            }

            .wrapper-open {
                right: 10px;
            }

            .wrapper-color button {
                font-size: 23px;
                margin: 2px;
                width: 40px;
                height: 40px;
                border: 0
            }

            .wrapper-color ul {
                list-style: none;
                background-color: #eee;
                padding: 5px 0;
                margin: 0 4px;
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
                width: 100%;


            }

            .wrapper-color ul li {
                width: 20px;
                height: 20px;
                margin: 2px;
                padding: 2px;
            }
        </style>

        @yield('css')


    </head>

    <body id="page-top">
        <div class="wrapper-color">
            <button><i class="fas fa-cog" style="width: 20px; font-size:23px"></i></button>
            <ul>
                <li class="bg-gradient-success"></li>
                <li class="bg-gradient-danger"></li>
                <li class="bg-gradient-info"></li>
                <li class="bg-gradient-dark"></li>
                <li class="bg-gradient-primary"></li>
                <li class="bg-gradient-warning"></li>
            </ul>
        </div>

        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Sidebar -->
            <div class="bg-gradient-primary" id="sideBar-color">
                <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">

                    <!-- Sidebar - Brand -->
                    <a class="sidebar-brand d-flex align-items-center justify-content-center"
                        href="{{ route('admin.index') }}">
                        <div class="sidebar-brand-icon rotate-n-15">
                            <i class="fas fa-laugh-wink"></i>
                        </div>
                        <div class="sidebar-brand-text mx-3">{{ env('APP_NAME') }}</div>
                    </a>

                    <!-- Divider -->
                    <hr class="sidebar-divider my-0">

                    <!-- Nav Item - Dashboard -->
                    <li class="nav-item">
                        <a class="nav-link {{ Str::contains(Route::currentRouteName(), 'admin.index') ? 'active' : '' }}"
                            href="{{ route('admin.index') }}">
                            <i class="fas fa-fw fa-tachometer-alt"></i>
                            <span>Dashboard</span></a>
                    </li>


                    <!-- Divider -->
                    <hr class="sidebar-divider my-0">



                    <!-- Nav Item - Pages Collapse Menu -->
                    <li class="nav-item show {{ Str::contains(Route::currentRouteName(), 'Product') ? 'active' : '' }}">
                        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseProducts"
                            aria-expanded="true" aria-controls="collapseProducts">
                            <i class="fas fa-fw fa-folder"></i>
                            <span>Products</span>
                        </a>
                        <div id="collapseProducts"
                            class="collapse {{ Str::contains(Route::currentRouteName(), 'Product') ? 'show' : '' }}"
                            aria-labelledby="headingPages" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <a class="collapse-item {{ Str::contains(Route::currentRouteName(), 'Product.index') ? 'active' : '' }}"
                                    href="{{ route('admin.Product.index') }}">All Products</a>
                                <a class="collapse-item {{ Str::contains(Route::currentRouteName(), 'Product.create') ? 'active' : '' }}"
                                    href="{{ route('admin.Product.create') }}">Add New</a>
                            </div>
                        </div>
                    </li>
                    <!-- Divider -->
                    <hr class="sidebar-divider my-0">
                    <!-- Nav Item - Pages Collapse Menu -->
                    <li
                        class="nav-item show {{ Str::contains(Route::currentRouteName(), 'Service') ? 'active' : '' }}">
                        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseService"
                            aria-expanded="true" aria-controls="collapseService">
                            <i class="fas fa-fw fa-folder"></i>
                            <span>Services</span>
                        </a>
                        <div id="collapseService"
                            class="collapse {{ Str::contains(Route::currentRouteName(), 'Service') ? 'show' : '' }}"
                            aria-labelledby="headingPages" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <a class="collapse-item {{ Str::contains(Route::currentRouteName(), 'Service.index') ? 'active' : '' }}"
                                    href="{{ route('admin.Service.index') }}">All Products</a>
                                <a class="collapse-item {{ Str::contains(Route::currentRouteName(), 'Service.create') ? 'active' : '' }}"
                                    href="{{ route('admin.Service.create') }}">Add New</a>
                            </div>
                        </div>
                    </li>
                    <!-- Divider -->
                    <hr class="sidebar-divider my-0">
                    <!-- Nav Item - Pages Collapse Menu -->
                    <li class="nav-item show {{ Str::contains(Route::currentRouteName(), 'Post') ? 'active' : '' }}">
                        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePost"
                            aria-expanded="true" aria-controls="collapsePost">
                            <i class="fas fa-fw fa-folder"></i>
                            <span>Posts</span>
                        </a>
                        <div id="collapsePost"
                            class="collapse {{ Str::contains(Route::currentRouteName(), 'Post') ? 'show' : '' }}"
                            aria-labelledby="headingPages" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <a class="collapse-item {{ Str::contains(Route::currentRouteName(), 'Post.index') ? 'active' : '' }}"
                                    href="{{ route('admin.Post.index') }}">All Products</a>
                                <a class="collapse-item {{ Str::contains(Route::currentRouteName(), 'Post.create') ? 'active' : '' }}"
                                    href="{{ route('admin.Post.create') }}">Add New</a>
                            </div>
                        </div>
                    </li>

                    <!-- Divider -->
                    <hr class="sidebar-divider my-0">
                    <!-- Nav Item - Pages Collapse Menu -->
                    <li class="nav-item show {{ Str::contains(Route::currentRouteName(), 'Member') ? 'active' : '' }}">
                        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseMember"
                            aria-expanded="true" aria-controls="collapseMember">
                            <i class="fas fa-fw fa-folder"></i>
                            <span>Members</span>
                        </a>
                        <div id="collapseMember"
                            class="collapse {{ Str::contains(Route::currentRouteName(), 'Member') ? 'show' : '' }}"
                            aria-labelledby="headingPages" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <a class="collapse-item {{ Str::contains(Route::currentRouteName(), 'Member.index') ? 'active' : '' }}"
                                    href="{{ route('admin.Member.index') }}">All Members</a>
                                <a class="collapse-item {{ Str::contains(Route::currentRouteName(), 'Member.create') ? 'active' : '' }}"
                                    href="{{ route('admin.Member.create') }}">Add New</a>
                            </div>
                        </div>
                    </li>

                    <!-- Divider -->
                    <hr class="sidebar-divider my-0">
                    <!-- Nav Item - Pages Collapse Menu -->
                    <li
                        class="nav-item show {{ Str::contains(Route::currentRouteName(), 'Testimonial') ? 'active' : '' }}">
                        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseTestimonial"
                            aria-expanded="true" aria-controls="collapseTestimonial">
                            <i class="fas fa-fw fa-folder"></i>
                            <span>Testimonials</span>
                        </a>
                        <div id="collapseTestimonial"
                            class="collapse {{ Str::contains(Route::currentRouteName(), 'Testimonial') ? 'show' : '' }}"
                            aria-labelledby="headingPages" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <a class="collapse-item {{ Str::contains(Route::currentRouteName(), 'Testimonial.index') ? 'active' : '' }}"
                                    href="{{ route('admin.Testimonial.index') }}">All Testimonials</a>
                                <a class="collapse-item {{ Str::contains(Route::currentRouteName(), 'Testimonial.create') ? 'active' : '' }}"
                                    href="{{ route('admin.Testimonial.create') }}">Add New</a>
                            </div>
                        </div>
                    </li>
                    <hr class="sidebar-divider my-0">
                    <!-- Nav Item - Pages Collapse Menu -->
                    <li
                        class="nav-item show {{ Str::contains(Route::currentRouteName(), 'Coupon') ? 'active' : '' }}">
                        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseCoupon"
                            aria-expanded="true" aria-controls="collapseCoupon">
                            <i class="fas fa-fw fa-folder"></i>
                            <span>Coupons</span>
                        </a>
                        <div id="collapseCoupon"
                            class="collapse {{ Str::contains(Route::currentRouteName(), 'Coupon') ? 'show' : '' }}"
                            aria-labelledby="headingPages" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <a class="collapse-item {{ Str::contains(Route::currentRouteName(), 'Coupon.index') ? 'active' : '' }}"
                                    href="{{ route('admin.Coupon.index') }}">All Coupons</a>
                                <a class="collapse-item {{ Str::contains(Route::currentRouteName(), 'Coupon.create') ? 'active' : '' }}"
                                    href="{{ route('admin.Coupon.create') }}">Add New</a>
                            </div>
                        </div>
                    </li>





                    <!-- Divider -->
                    <hr class="sidebar-divider d-none d-md-block">

                    <!-- Sidebar Toggler (Sidebar) -->
                    <div class="text-center d-none d-md-inline">
                        <button class="rounded-circle border-0" id="sidebarToggle"></button>
                    </div>

                </ul>
            </div>
            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">


                    <!-- Topbar -->
                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                        <!-- Sidebar Toggle (Topbar) -->
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>


                        <!-- Topbar Navbar -->
                        <ul class="navbar-nav ml-auto">

                            <!-- Nav Item - Alerts -->
                            <li class="nav-item dropdown no-arrow mx-1">
                                <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown"
                                    role="button" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i class="fas fa-bell fa-fw"></i>
                                    <!-- Counter - Alerts -->
                                    <span class="badge badge-danger badge-counter">3+</span>
                                </a>
                                <!-- Dropdown - Alerts -->
                                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                    aria-labelledby="alertsDropdown">
                                    <h6 class="dropdown-header">
                                        Alerts Center
                                    </h6>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <div class="mr-3">
                                            <div class="icon-circle bg-primary">
                                                <i class="fas fa-file-alt text-white"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="small text-gray-500">December 12, 2019</div>
                                            <span class="font-weight-bold">A new monthly report is ready to
                                                download!</span>
                                        </div>
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <div class="mr-3">
                                            <div class="icon-circle bg-success">
                                                <i class="fas fa-donate text-white"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="small text-gray-500">December 7, 2019</div>
                                            $290.29 has been deposited into your account!
                                        </div>
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <div class="mr-3">
                                            <div class="icon-circle bg-warning">
                                                <i class="fas fa-exclamation-triangle text-white"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="small text-gray-500">December 2, 2019</div>
                                            Spending Alert: We've noticed unusually high spending for your account.
                                        </div>
                                    </a>
                                    <a class="dropdown-item text-center small text-gray-500" href="#">Show All
                                        Alerts</a>
                                </div>
                            </li>

                            <div class="topbar-divider d-none d-sm-block"></div>

                            <!-- Nav Item - User Information -->
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span
                                        class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::guard('admin')->user()->name }}</span>
                                    <img class="img-profile rounded-circle"
                                        src="{{ Auth::guard('admin')->user()->image }}" style="object-fit: cover">
                                </a>
                                <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                    aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="{{ route('admin.profile') }}">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Profile
                                    </a>
                                    <a class="dropdown-item" href="{{ route('admin.setting') }}">
                                        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Settings
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Activity Log
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <form action="{{ route('admin.logout') }}" method="POST" class="dropdown-item">
                                        @csrf

                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        <button class="btn btn-sm">Logout</button>
                                    </form>
                                </div>
                            </li>

                        </ul>

                    </nav>
                    <!-- End of Topbar -->

                    <!-- Begin Page Content -->
                    <div class="container-fluid">

                        @yield('content')


                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; Your Website 2020</span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->

            </div>

            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->


        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="login.html">Logout</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="{{ asset('back/vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('back/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

        <!-- Core plugin JavaScript-->
        <script src="{{ asset('back/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

        <!-- Custom scripts for all pages-->
        <script src="{{ asset('back/js/sb-admin-2.min.js') }}"></script>

        <script>
            function showImg(e) {
                const [file] = e.target.files
                console.log(file);

                if (file) {
                    previwe.src = URL.createObjectURL(file)
                }
            }
        </script>

        <script>
            let btn = document.querySelector('.wrapper-color button');

            btn.onclick = () => {
                document.querySelector('.wrapper-color').classList.toggle('wrapper-open');
            }

            document.querySelectorAll('.wrapper-color ul li').forEach(ele => {
                ele.onclick = () => {
                    document.querySelector('#sideBar-color').className = ''
                    console.log(ele.className);
                    document.querySelector('#sideBar-color').className = ele.className;
                    window.localStorage.setItem('color', ele.className);
                }

            });
            window.onload = () => {
                let oldClass = localStorage.getItem('color') || 'bg-gradient-primary';
                document.querySelector('#sideBar-color').classList.add(oldClass);
            }
        </script>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


        <script>
            function deleteItem(e) {

                Swal.fire({
                    title: "Are you Sure",
                    text: "Are you Sure",
                    icon: "Are you Sure",
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes Delete it',
                }).then((result) => {
                    if (result.isConfirmed) {

                        e.target.closest('form').submit();

                    }
                })
            }
        </script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        @vite(['resources/js/app.js'])
        @yield('js')
    </body>

</html>

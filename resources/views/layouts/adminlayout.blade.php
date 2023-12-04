<!DOCTYPE html>

<html
  lang="en"
  class="light-style layout-navbar-fixed layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../admin/assets/"
  data-template="vertical-menu-template"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Adorepal</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('../admin/assets/logo/logo2.png') }}" type="image/x-icon">


    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons -->
    <link href="{{ asset('../admin/assets/vendor/fonts/fontawesome.css') }}" rel="stylesheet">
    {{--  <link rel="stylesheet" href="../admin/assets/vendor/fonts/fontawesome.css" />  --}}

    <link href="{{ asset('../admin/assets/vendor/fonts/tabler-icons.css') }}" rel="stylesheet">
    {{--  <link rel="stylesheet" href="../admin/assets/vendor/fonts/tabler-icons.css" />  --}}

    <link href="{{ asset('../admin/assets/vendor/fonts/flag-icons.css') }}" rel="stylesheet">

    {{--  <link rel="stylesheet" href="../admin/assets/vendor/fonts/flag-icons.css" />  --}}

    <!-- Core CSS -->
    <link href="{{ asset('../admin/assets/vendor/css/rtl/core.css') }}" class="template-customizer-core-css" rel="stylesheet">

    {{--  <link rel="stylesheet" href="../admin/assets/vendor/css/rtl/core.css" class="template-customizer-core-css" />  --}}
    <link href="{{ asset('../admin/assets/vendor/css/rtl/theme-default.css') }}" class="template-customizer-core-css" rel="stylesheet">
    {{--  <link rel="stylesheet" href="../admin/assets/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />  --}}
    <link href="{{ asset('../admin/assets/css/demo.css') }}" class="template-customizer-core-css" rel="stylesheet">

    {{--  <link rel="stylesheet" href="../admin/assets/css/demo.css" />  --}}

    <!-- Vendors CSS -->
    <link href="{{ asset('../admin/assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}" class="template-customizer-core-css" rel="stylesheet">

    {{--  <link rel="stylesheet" href="../admin/assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css" />  --}}
    <link href="{{ asset('../admin/assets/vendor/libs/flatpickr/flatpickr.css') }}" class="template-customizer-core-css" rel="stylesheet">

    {{--  <link rel="stylesheet" href="../admin/assets/vendor/libs/flatpickr/flatpickr.css" />  --}}
    <link href="{{ asset('../admin/assets/vendor/libs/datatables-rowgroup-bs5/rowgroup.bootstrap5.css') }}" class="template-customizer-core-css" rel="stylesheet">

    {{--  <link rel="stylesheet" href="../admin/assets/vendor/libs/datatables-rowgroup-bs5/rowgroup.bootstrap5.css" />  --}}
    <!-- Vendors CSS -->
    <link href="{{ asset('../admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet">

    {{--  <link rel="stylesheet" href="../admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />  --}}
    <link href="{{ asset('../admin/assets/vendor/libs/node-waves/node-waves.css') }}" rel="stylesheet">

    {{--  <link rel="stylesheet" href="../admin/assets/vendor/libs/node-waves/node-waves.css" />  --}}
    <link href="{{ asset('../admin/assets/vendor/libs/typeahead-js/typeahead.css') }}" rel="stylesheet">

    {{--  <link rel="stylesheet" href="../admin/assets/vendor/libs/typeahead-js/typeahead.css" />  --}}
    <link href="{{ asset('../admin/assets/vendor/libs/apex-charts/apex-charts.css') }}" rel="stylesheet">

    {{--  <link rel="stylesheet" href="../admin/assets/vendor/libs/apex-charts/apex-charts.css" />  --}}
    <link href="{{ asset('../admin/assets/vendor/libs/swiper/swiper.css') }}" rel="stylesheet">

    {{--  <link rel="stylesheet" href="../admin/assets/vendor/libs/swiper/swiper.css" />  --}}

    <link href="{{ asset('../admin/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" rel="stylesheet">

    {{--  <link rel="stylesheet" href="../admin/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css" />  --}}
    <link href="{{ asset('../admin/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" rel="stylesheet">

    {{--  <link rel="stylesheet" href="../admin/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css" />  --}}
    <link href="{{ asset('../admin/assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css') }}" rel="stylesheet">

    {{--  <link rel="stylesheet" href="../admin/assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css" />  --}}

    <!-- Page CSS -->
    <link href="{{ asset('../admin/assets/vendor/css/pages/cards-advance.css') }}" rel="stylesheet">

    {{--  <link rel="stylesheet" href="../admin/assets/vendor/css/pages/cards-advance.css" />  --}}
    <!-- Helpers -->
    <script type="text/javascript" src="{{URL::asset('../admin/assets/vendor/js/helpers.js')}}"></script>

    {{--  <script src="../admin/assets/vendor/js/helpers.js"></script>  --}}

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->

    <script src="../admin/assets/vendor/js/template-customizer.js"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../admin/assets/js/config.js"></script>
    <script src="https://kit.fontawesome.com/20b6f01eda.js" crossorigin="anonymous"></script>

  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="/admin/home" class="app-brand-link d-flex align-items-end">
              <span class="app-brand-logo">
                <img src="../admin/assets/logo/logo2.png">
              </span>
              <span style="font-family: 'Courier New', Courier, monospace; font-size:13px;" class="app-brand-text demo menu-text fw-bold" >
                A D O R E P A L
              </span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
              <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
              <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1" >
            <!-- Dashboards -->
            <li class="menu-item active">
                <a href="/admin/home" class="menu-link" style="background-color: #451514">
                  <i class="menu-icon tf-icons ti ti-smart-home"></i>
                  <div data-i18n="Dashboard">Dashboard</div>
                </a>
            </li>




            <!-- Apps & Pages -->

            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-users"></i>
                <div data-i18n="Users">Users</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="/admin/staff_list" class="menu-link">
                    <div data-i18n="Staff">Staff</div>
                  </a>
                </li>
                <li class="menu-item">
                    <a href="/admin/customer_list" class="menu-link">
                      <div data-i18n="Customer">Customer</div>
                    </a>
                  </li>

              </ul>
            </li>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-id"></i>
                <div data-i18n="Products">Products</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="/admin/active_products" class="menu-link">
                    <div data-i18n="Active Prodcuts">Active Prodcuts</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="/admin/slides" class="menu-link">
                    <div data-i18n="Main Slides">Main Slides</div>
                  </a>
                </li>
                <li class="menu-item">
                    <a href="/admin/catgories" class="menu-link">
                      <div data-i18n="Main Slides">Categories</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="/admin/sub_catgory" class="menu-link">
                      <div data-i18n="Main Slides">Sub Categories</div>
                    </a>
                </li>
                
              </ul>
            </li>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-layout-grid"></i>
                <div data-i18n="Orders">Orders</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                    <a href="/admin/new_orders" class="menu-link">
                      <div data-i18n="New Orders">New Orders</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="/admin/complete_orders_list" class="menu-link">
                      <div data-i18n="New Orders">Complete Orders</div>
                    </a>
                </li>
              </ul>
            </li>
            
            {{--  <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-color-swatch"></i>
                <div data-i18n="Blogs">Blogs</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                    <a href="app-access-permission.html" class="menu-link">
                      <div data-i18n="Active Blogs">Active Blogs</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="app-access-permission.html" class="menu-link">
                      <div data-i18n="De-Active Blogs">Deactive Blogs</div>
                    </a>
                </li>

              </ul>
            </li>  --}}

            <!-- Misc -->
            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Settings</span>
            </li>
            <li class="menu-item">
              <a href="https://pixinvent.ticksy.com/" target="_blank" class="menu-link">
                <i class="menu-icon tf-icons ti ti-lifebuoy"></i>
                <div data-i18n="Settings">Settings</div>
              </a>
            </li>

          </ul>
        </aside>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar"
          >
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="ti ti-menu-2 ti-sm"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">


              <ul class="navbar-nav flex-row align-items-center ms-auto">


                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      <img src="../admin/assets/img/avatars/1.png" alt class="h-auto rounded-circle" />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="pages-account-settings-account.html">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <img src="../admin/assets/img/avatars/1.png" alt class="h-auto rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <span class="fw-semibold d-block">{{Auth::User()->name}}</span>
                            <small class="text-muted">Admin</small>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="pages-profile-user.html">
                        <i class="ti ti-user-check me-2 ti-sm"></i>
                        <span class="align-middle">My Profile</span>
                      </a>
                    </li>




                    <li>

                      <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();" target="_blank">
                        <i class="ti ti-logout me-2 ti-sm"></i>

                        <span class="align-middle">{{ __('Logout') }}</span>
                      </a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    </li>
                  </ul>
                </li>
                <!--/ User -->
              </ul>
            </div>

            <!-- Search Small Screens -->
            <div class="navbar-search-wrapper search-input-wrapper d-none">
              <input
                type="text"
                class="form-control search-input container-xxl border-0"
                placeholder="Search..."
                aria-label="Search..."
              />
              <i class="ti ti-x ti-sm search-toggler cursor-pointer"></i>
            </div>
          </nav>

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">

            @yield("admincontent")
<!-- Footer -->
<footer class="content-footer footer bg-footer-theme">
    <div class="container-xxl">
      <div
        class="footer-container d-flex align-items-center justify-content-between py-2 flex-md-row flex-column"
      >
        <div>
          ©
          <script>
            document.write(new Date().getFullYear());
          </script>
          , made with ❤️ by <a href="https://adorepal.com" target="_blank" class="fw-semibold">Adorepal</a>
        </div>

      </div>
    </div>
  </footer>
  <!-- / Footer -->

  <div class="content-backdrop fade"></div>
</div>
<!-- Content wrapper -->
</div>
<!-- / Layout page -->
</div>

<!-- Overlay -->
<div class="layout-overlay layout-menu-toggle"></div>

<!-- Drag Target Area To SlideIn Menu On Small Screens -->
<div class="drag-target"></div>
</div>
<!-- / Layout wrapper -->

<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
<script src="../admin/assets/vendor/libs/jquery/jquery.js"></script>
<script src="../admin/assets/vendor/libs/popper/popper.js"></script>
<script src="../admin/assets/vendor/js/bootstrap.js"></script>
<script src="../admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="../admin/assets/vendor/libs/node-waves/node-waves.js"></script>

<script src="../admin/assets/vendor/libs/hammer/hammer.js"></script>
<script src="../admin/assets/vendor/libs/i18n/i18n.js"></script>
<script src="../admin/assets/vendor/libs/typeahead-js/typeahead.js"></script>

<script src="../admin/assets/vendor/js/menu.js"></script>
<!-- endbuild -->

<!-- Vendors JS -->
<script src="../admin/assets/vendor/libs/apex-charts/apexcharts.js"></script>
<script src="../admin/assets/vendor/libs/swiper/swiper.js"></script>
<script src="../admin/assets/vendor/libs/datatables/jquery.dataTables.js"></script>
<script src="../admin/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
<script src="../admin/assets/vendor/libs/datatables-responsive/datatables.responsive.js"></script>
<script src="../admin/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.js"></script>
<script src="../admin/assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.js"></script>

<!-- Vendors JS -->
<script src="../admin/assets/vendor/libs/datatables-buttons/datatables-buttons.js"></script>
<script src="../admin/assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.js"></script>
<script src="../admin/assets/vendor/libs/jszip/jszip.js"></script>
<script src="../admin/assets/vendor/libs/pdfmake/pdfmake.js"></script>
<script src="../admin/assets/vendor/libs/datatables-buttons/buttons.html5.js"></script>
<script src="../admin/assets/vendor/libs/datatables-buttons/buttons.print.js"></script>

<!-- Row Group JS -->
<script src="../admin/assets/vendor/libs/datatables-rowgroup/datatables.rowgroup.js"></script>
<script src="../admin/assets/vendor/libs/datatables-rowgroup-bs5/rowgroup.bootstrap5.js"></script>
<!-- Main JS -->
<script src="../admin/assets/js/main.js"></script>

<script src="../admin/assets/js/tables-datatables-basic.js"></script>

<!-- Page JS -->
<script src="../admin/assets/js/dashboards-analytics.js"></script>

{{-- extra --}}
{{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"> --}}
{{-- <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" ></script> --}}
<script>
    $(document).ready( function () {
    $('#myTable').DataTable();
    } );
    </script>
    @include('sweetalert::alert')
</body>
</html>


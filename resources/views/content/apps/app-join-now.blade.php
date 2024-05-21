<!DOCTYPE html>

<html lang="en" class="light-style  layout-menu-fixed   " dir="ltr" data-theme="theme-default"
    data-framework="laravel" data-template="vertical-menu-theme-default-light">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Join Now</title>
    <meta name="description"
        content="Most Powerful &amp; Comprehensive Bootstrap 5 HTML Admin Dashboard Template built for developers!" />
    <meta name="keywords" content="dashboard, bootstrap 5 dashboard, bootstrap 5 design, bootstrap 5">
    <!-- laravel CRUD token -->
    <meta name="csrf-token" content="U0EUTYRFkKWlnq6ZIpkI4nNb8KnTSYeTz2w2RB7X">
    <!-- Canonical SEO -->
    <link rel="canonical" href="https://themeselection.com/item/sneat-bootstrap-html-laravel-admin-template/">
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon/favicon.ico') }}" />



    <!-- Include Styles -->
    <!-- BEGIN: Theme CSS-->
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/boxicons.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/fontawesome.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/flag-icons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/rtl/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/rtl/theme-default.css') }}"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />


    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/typeahead-js/typeahead.css') }}" />

    <!-- Vendor Styles -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/bs-stepper/bs-stepper.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/tagify/tagify.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/animate-css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/dropzone/dropzone.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/friendkit/css/app.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/friendkit/css/core.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/toastr/toastr.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/animate-css/animate.css') }}" />

    <!-- Page Styles -->

    <style>
        .custom-option-icon .form-check-input {
            background-color: transparent !important;
            border: none !important;
        }

        #wizard-create-deal-form .form-check-input:checked,
        #wizard-create-deal-form .form-check-input[type=checkbox] {
            background-color: transparent !important;
            border: none !important;
            box-shadow: none !important;
            background-image: none !important;
        }

        .dropdown.is-right .dropdown-menu {
            left: 56px;
            right: auto;
            padding: 0;
            top: -22px;
        }

        .dropdown-item h6,
        .h6,
        h5,
        .h5,
        h4,
        .h4,
        h3,
        .h3,
        h2,
        .h2,
        h1,
        .h1 {
            margin-bottom: 0 !important;
        }

        .modal-content,
        .modal-card {
            overflow-x: hidden !important;
        }

        .modal-header .btn-close {
            top: 10px;
            position: relative;
            right: 14px;
        }

        .modal-body .btn-close {
            top: -20px !important;
            right: -20px !important;
        }

        .page-wrapper-chat {
            margin-left: unset !important;
            padding-top: unset !important;
        }
    </style>

    <link rel="stylesheet" href="{{ asset('assets/dreamschat/css/bootstrap.min.css') }}">

    <!-- Fontawesome CSS -->

    <link rel="stylesheet" href="{{ asset('assets/dreamschat/css/fontawesome.min.css') }}">

    <!-- Feather CSS -->
    <link rel="stylesheet" href="{{ asset('assets/dreamschat/css/feather.css') }}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('assets/dreamschat/css/style.css') }}">

    <!-- Include Scripts for customizer, helper, analytics, config -->
    <!-- laravel style -->
    <script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>

  <script src="{{ asset('assets/vendor/js/template-customizer.js') }}"></script>

  <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
  <script src="{{ asset('assets/js/config.js') }}"></script>

</head>

<body>


      <!-- Main Wrapper -->
      <div class="main-wrapper">

        <div class="page-wrapper-chat">
          <div class="content">
            <div class="row">
              <div class="col-xl-12">
                <!-- Chat -->
                <div class="card chat-empty card-comman">
                  <div class="card-body p-0">
                    <div class="chat-body meet-chat-blk">
                      <div class="join-call">
                        <div class="join-video">
                          <img src="{{ asset('assets/dreamschat/images/video-call.jpg') }}" class="img-fluid" alt="Logo">
                          <div class="video-avatar"><h4>Camera is off</h4></div>
                          <div class="call-icons">
                            <ul class="call-items">
                              <li class="call-item">
                                <a class="mute-bt" href="#" title="" data-bs-placement="top" data-bs-toggle="tooltip" data-bs-original-title="Mute Audio">
                                  <i class="fa fa-microphone"></i>
                                </a>
                              </li>
                              <li class="call-item">
                                <a class="mute-video" href="#" title="" data-bs-placement="top" data-bs-toggle="tooltip" data-bs-original-title="Stop Camera">
                                  <i class="fa fa-video"></i>
                                </a>
                              </li>
                            </ul>
                          </div>
                        </div>
                        <div class="join-content">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="form-control-label">Morning Status Call</label>
                              </div>
                            </div>
                          </div>
                          <p>Enter a meeting nickname or the code provided by the meeting organizer</p>
                          <div class="btn-infos">
                            <a href="{{url('app/user/live')}}" class="btn btn-info btn-join text-white">Back</a>
                            <a href="{{url('app/live-meeting')}}" class="btn btn-primary btn-join">Join Now</a>
                            <div class="d-flex align-items-center">
                              <span class="icon-mic"><i class="fa fa-microphone"></i></span> <span>Your microphone is working properly</span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /Chat -->
              </div>
            </div>
          </div>
        </div>

      </div>
      <!-- /Main Wrapper -->



    <!-- Include Scripts -->
    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/hammer/hammer.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/i18n/i18n.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/typeahead-js/typeahead.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/menu.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/js/wizard-ex-property-listing.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/bs-stepper/bs-stepper.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/flatpickr/flatpickr.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/tagify/tagify.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
    <!-- Concatenated js plugins and jQuery -->
    <script src="{{ asset('assets/friendkit/js/app.js') }}"></script>

    <!-- Core js -->
    <script src="{{ asset('assets/friendkit/js/global.js') }}"></script>

    <!-- Navigation options js -->
    <script src="{{ asset('assets/friendkit/js/navbar-v1.js') }}"></script>
    <script src="{{ asset('assets/friendkit/js/navbar-v2.js') }}"></script>
    <script src="{{ asset('assets/friendkit/js/navbar-mobile.js') }}"></script>
    <script src="{{ asset('assets/friendkit/js/navbar-options.js') }}"></script>
    <script src="{{ asset('assets/friendkit/js/sidebar-v1.js') }}"></script>

    <!-- Core instance js -->
    <script src="{{ asset('assets/friendkit/js/main.js') }}"></script>
    <script src="{{ asset('assets/friendkit/js/chat.js') }}"></script>
    <script src="{{ asset('assets/friendkit/js/touch.js') }}"></script>
    <script src="{{ asset('assets/friendkit/js/tour.js') }}"></script>

    <!-- Components js -->
    <script src="{{ asset('assets/friendkit/js/explorer.js') }}"></script>
    <script src="{{ asset('assets/friendkit/js/widgets.js') }}"></script>
    <script src="{{ asset('assets/friendkit/js/modal-uploader.js') }}"></script>
    <script src="{{ asset('assets/friendkit/js/popovers-users.js') }}"></script>
    <script src="{{ asset('assets/friendkit/js/popovers-pages.js') }}"></script>
    <script src="{{ asset('assets/friendkit/js/lightbox.js') }}"></script>

    <!-- Landing page js -->

    <!-- Signup page js -->

    <!-- Feed pages js -->
    <script src="{{ asset('assets/friendkit/js/feed.js') }}"></script>

    <script src="{{ asset('assets/friendkit/js/webcam.js') }}"></script>
    <script src="{{ asset('assets/friendkit/js/compose.js') }}"></script>
    <script src="{{ asset('assets/friendkit/js/autocompletes.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/toastr/toastr.js') }}"></script>
    <!-- END: Page Vendor JS-->
    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('assets/js/main.js') }}"></script>

  <!-- Bootstrap Core JS -->
  <script src="{{ asset('assets/dreamschat/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Painterro JS -->
  <script src="{{ asset('assets/dreamschat/js/painterro.min.js') }}"></script>

  <!-- Custom JS -->
  <script src="{{ asset('assets/dreamschat/js/script.js') }}"></script>



</body>

</html>

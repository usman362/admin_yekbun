<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="http://127.0.0.1:2002/assets/" data-base-url="http://127.0.0.1:2002" data-framework="laravel"
    data-template="vertical-menu-theme-default-light" data-arp="">

<head>
    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">

    <title>Artists - List
    </title>
    <meta name="description"
        content="Most Powerful &amp; Comprehensive Bootstrap 5 HTML Admin Dashboard Template built for developers!">
    <meta name="keywords" content="dashboard, bootstrap 5 dashboard, bootstrap 5 design, bootstrap 5">
    <!-- laravel CRUD token -->
    <meta name="csrf-token" content="PXqkvSzrXblopu90lUJzrI4CSrSJUSRoY6qOEJ4v">
    <!-- Canonical SEO -->
    <link rel="canonical" href="https://themeselection.com/item/sneat-bootstrap-html-laravel-admin-template/">
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="http://127.0.0.1:2002/assets/svg/Yb_01062023_final.svg">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Genos:ital,wght@0,100..900;1,100..900&amp;display=swap"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="http://127.0.0.1:2002/assets/css/daterangepicker.css">


    <!-- Include Styles -->
    <!-- BEGIN: Theme CSS-->
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="http://127.0.0.1:2002/assets/vendor/fonts/boxicons.css">
    <link rel="stylesheet" href="http://127.0.0.1:2002/assets/vendor/fonts/fontawesome.css">
    <link rel="stylesheet" href="http://127.0.0.1:2002/assets/vendor/fonts/flag-icons.css">

    <!-- Core CSS -->
    <link rel="stylesheet" href="http://127.0.0.1:2002/assets/vendor/css/rtl/core.css"
        class="template-customizer-core-css">
    <link rel="stylesheet" href="http://127.0.0.1:2002/assets/vendor/css/rtl/theme-default.css"
        class="template-customizer-theme-css">
    <link rel="stylesheet" href="http://127.0.0.1:2002/assets/css/demo.css">


    <link rel="stylesheet" href="http://127.0.0.1:2002/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="http://127.0.0.1:2002/assets/vendor/libs/typeahead-js/typeahead.css">

    <!-- Vendor Styles -->
    <link rel="stylesheet" href="http://127.0.0.1:2002/assets/vendor/libs/animate-css/animate.css">
    <link rel="stylesheet" href="http://127.0.0.1:2002/assets/vendor/libs/sweetalert2/sweetalert2.css">
    <link rel="stylesheet" href="http://127.0.0.1:2002/assets/vendor/libs/dropzone/dropzone.css">
    <link rel="stylesheet" href="http://127.0.0.1:2002/assets/vendor/libs/toastr/toastr.css">
    <link rel="stylesheet" href="http://127.0.0.1:2002/assets/vendor/libs/animate-css/animate.css">
    <link rel="stylesheet" href="http://127.0.0.1:2002/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css">
    <link rel="stylesheet"
        href="http://127.0.0.1:2002/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css">
    <link rel="stylesheet"
        href="http://127.0.0.1:2002/assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css">
    <link rel="stylesheet"
        href="http://127.0.0.1:2002/assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css">
    <link rel="stylesheet" href="http://127.0.0.1:2002/assets/vendor/libs/flatpickr/flatpickr.css">
    <!-- Row Group CSS -->
    <link rel="stylesheet"
        href="http://127.0.0.1:2002/assets/vendor/libs/datatables-rowgroup-bs5/rowgroup.bootstrap5.css">
    <!-- Form Validation -->
    <link rel="stylesheet" href="http://127.0.0.1:2002/assets/vendor/libs/@form-validation/form-validation.css">

    <style>
        div.dataTables_wrapper div.dataTables_processing {
            background-color: #696eff !important;
            background-image: none !important;
            color: #fff !important;
            padding: 30px !important;
            line-height: 0 !important;
            border-radius: 8px !important;
            opacity: 0.9 !important;
        }

        .layout-page .modal {
            z-index: 99999;
        }
    </style>
    <!-- Page Styles -->
    <link rel="stylesheet" href="http://127.0.0.1:2002/assets/vendor/css/pages/page-icons.css">
    <style>
        #DataTables_Table_0_wrapper .row:first-child {
            display: none;
        }
    </style>

    <!-- Include Scripts for customizer, helper, analytics, config -->
    <!-- laravel style -->
    <script src="http://127.0.0.1:2002/assets/vendor/js/helpers.js"></script>
    <style type="text/css">
        .layout-menu-fixed .layout-navbar-full .layout-menu,
        .layout-menu-fixed-offcanvas .layout-navbar-full .layout-menu {
            top: 0px !important;
        }

        .layout-page {
            padding-top: 0px !important;
        }

        .content-wrapper {
            padding-bottom: 0px !important;
        }
    </style>
    <!-- beautify ignore:start -->

  <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
  <script src="http://127.0.0.1:2002/assets/js/config.js"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async="async" src="https://www.googletagmanager.com/gtag/js?id=GA_MEASUREMENT_ID"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'GA_MEASUREMENT_ID');
</script>
<style type="text/css">
@font-face {
 font-family: 'Atlassian Sans';
 font-style: normal;
 font-weight: 400 653;
 font-display: swap;
 src:
  local('AtlassianSans'),
  local('Atlassian Sans Text'),
  url('chrome-extension://liecbddmkiiihnedobmlmillhodjkdmb/fonts/AtlassianSans-latin.woff2') format('woff2');
 unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0304,
  U+0308, U+0329, U+2000-206F, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
}</style></head>

<body data-new-gr-c-s-check-loaded="14.1233.0" data-gr-ext-installed="" class="" style="">


    <!-- Layout Content -->
    <div class="layout-wrapper layout-content-navbar ">
  <div class="layout-container">

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme" data-bg-class="bg-menu-theme" style="touch-action: none; user-select: none; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">

    <!-- ! Hide app brand if navbar-full -->
    <div class="app-brand demo ">
        <a href="http://127.0.0.1:2002" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="http://127.0.0.1:2002/assets/svg/YeKbun _logo.svg" alt="yekbun">
            </span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow" style="display: none;"></div>

    <ul class="menu-inner py-1 ps ps--active-y">

                    <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Dashboard</span>
            </li>
            <li class="menu-item ">
                <a href="http://127.0.0.1:2002" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-home-circle"></i>
                    <div>Dashboard</div>
                </a>
            </li>

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Assistent</span>
        </li>

                    <li class="menu-item    ">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-bot"></i>
                    <div>Avatar </div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item ">
                        <a href="http://127.0.0.1:2002/avatars" class="menu-link">
                            <div>Add/Manage Avatars</div>
                        </a>
                    </li>
                    <li class="menu-item ">
                        <a href="http://127.0.0.1:2002/manage-avatars" class="menu-link">
                            <div>Manage AI Posts</div>
                        </a>
                    </li>
                </ul>
            </li>

        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-group"></i>
                <div>Agents </div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item ">
                    <a href="javascript:void(0)" class="menu-link">
                        <div>Add/Manage Agents</div>
                    </a>
                </li>
            </ul>
        </li>

                    <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Customers</span>
            </li>
            <li class="menu-item " style="">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-group"></i>
                    <div>Users</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item  ">
                        <a href="http://127.0.0.1:2002/users/educated" class="menu-link">
                            <div>Educated Users</div>
                        </a>
                    </li>
                    <li class="menu-item  ">
                        <a href="http://127.0.0.1:2002/users/cultivated" class="menu-link">
                            <div>Cultivated Users</div>
                        </a>
                    </li>
                    <li class="menu-item  ">
                        <a href="http://127.0.0.1:2002/users/academic" class="menu-link">
                            <div>Academic Users</div>
                        </a>
                    </li>
                    <li class="menu-item ">
                        <a href="javascript:void(0)" class="menu-link menu-toggle">
                            <div>Settings</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item ">

                                <a href="http://127.0.0.1:2002/settings/profile-banner" class="menu-link">
                                    <div>Profile Banner</div>
                                </a>
                            </li>
                            <li class="menu-item ">
                                <a href="http://127.0.0.1:2002/settings/user-roles/educated" class="menu-link">
                                    <div>User Roles</div>
                                </a>
                            </li>

                            <li class="menu-item ">
                                <a href="http://127.0.0.1:2002/settings/reasons" class="menu-link">
                                    <div>Reasons</div>
                                </a>
                            </li>
                            <li class="menu-item ">
                                <a href="http://127.0.0.1:2002/settings/user/prefix" class="menu-link">
                                    <div>User Prefix</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
                            <li class="menu-item ">
                <a href="http://127.0.0.1:2002/reports/flagged-users" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-flag"></i>
                    <div>Flagged User</div>
                </a>
            </li>

                    <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Channels</span>
            </li>
            <li class="menu-item         ">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-file "></i>
                    <div>Channels</div>
                </a>
                <ul class="menu-sub">

                    <li class="menu-item ">
                        <a href="http://127.0.0.1:2002/managecategories" class="menu-link">
                            <div>Manage Categories</div>
                        </a>
                    </li>
                    <li class="menu-item ">
                        <a href="http://127.0.0.1:2002/channelrequest?view=new_request" class="menu-link">
                            <div>Channel Request</div>
                        </a>
                    </li>
                    <li class="menu-item ">
                        <a href="http://127.0.0.1:2002/managechannel?view=new_request" class="menu-link">
                            <div>Manage Channel</div>
                        </a>
                    </li>
                    <li class="menu-item ">
                        <a href="http://127.0.0.1:2002/channeladmin" class="menu-link">
                            <div>Channel Admin</div>
                        </a>
                    </li>
                    <li class="menu-item    ">
                        <a href="javascript:void(0)" class="menu-link menu-toggle">
                            <div>Settings</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item ">
                                <a href="http://127.0.0.1:2002/channels/reason" class="menu-link">
                                    <div>Reasons</div>
                                </a>
                            </li>

                            <li class="menu-item ">
                                <a href="http://127.0.0.1:2002/channels/policy_terms" class="menu-link">
                                    <div>Channels Policy </div>
                                </a>
                            </li>

                        </ul>
                    </li>
                </ul>
            </li>


                            <li class="menu-item ">
                <a href="http://127.0.0.1:2002/flaggedfanpage" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-flag"></i>
                    <div>Flagged Channels</div>
                </a>
            </li>

                    <li class="menu-header small text-uppercase">
                <span class="menu-header-text">E-Commerce</span>
            </li>


            <li class="menu-item ">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-store"></i>
                    <div>Online Shop</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item ">
                        <a href="javascript:void(0)" class="menu-link">
                            <div>Add Online Shop</div>
                        </a>
                    </li>
                    <li class="menu-item ">
                        <a href="javascript:void(0)" class="menu-link">
                            <div>New Shop Request</div>
                        </a>


                    </li>



                    <li class="menu-item ">
                        <a href="javascript:void(0)" class="menu-link">
                            <div>Manage Online Shops</div>
                        </a>


                    </li>



                    <li class="menu-item ">
                        <a href="javascript:void(0)" class="menu-link">
                            <div>Manage Items</div>
                        </a>


                    </li>



                    <li class="menu-item ">
                        <a href="javascript:void(0)" class="menu-link">
                            <div>Commission Setting</div>
                        </a>


                    </li>



                    <li class="menu-item ">
                        <a href="javascript:void(0)" class="menu-link">
                            <div>Tax Settings</div>
                        </a>


                    </li>



                    <li class="menu-item ">
                        <a href="javascript:void(0)" class="menu-link">
                            <div>Shipping</div>
                        </a>


                    </li>



                    <li class="menu-item ">
                        <a href="javascript:void(0)" class="menu-link">
                            <div>Currency</div>
                        </a>


                    </li>



                    <li class="menu-item ">
                        <a href="javascript:void(0)" class="menu-link">
                            <div>Payment Method</div>
                        </a>


                    </li>



                    <li class="menu-item ">
                        <a href="javascript:void(0)" class="menu-link">
                            <div>Additional Services</div>
                        </a>


                    </li>



                    <li class="menu-item ">
                        <a href="javascript:void(0)" class="menu-link menu-toggle">
                            <div>Settings</div>
                        </a>


                        <ul class="menu-sub">



                            <li class="menu-item ">
                                <a href="javascript:void(0)" class="menu-link">
                                    <div>Reasons</div>
                                </a>


                            </li>

                            <li class="menu-item ">
                                <a href="javascript:void(0)" class="menu-link">
                                    <div>Policy and Terms</div>
                                </a>


                            </li>
                        </ul>
                    </li>
                </ul>
            </li>




                    <li class="menu-item ">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-store"></i>
                    <div>Bazar</div>
                </a>


                <ul class="menu-sub">



                    <li class="menu-item ">
                        <a href="javascript:void(0)" class="menu-link">
                            <div>Category - Subcategory</div>
                        </a>


                    </li>



                    <li class="menu-item ">
                        <a href="javascript:void(0)" class="menu-link">
                            <div>Manage for Sale Items</div>
                        </a>


                    </li>



                    <li class="menu-item ">
                        <a href="javascript:void(0)" class="menu-link">
                            <div>Manage Search Items</div>
                        </a>


                    </li>



                    <li class="menu-item ">
                        <a href="javascript:void(0)" class="menu-link">
                            <div>Pricing Plan</div>
                        </a>


                    </li>



                    <li class="menu-item ">
                        <a href="javascript:void(0)" class="menu-link menu-toggle">
                            <div>Settings</div>
                        </a>


                        <ul class="menu-sub">



                            <li class="menu-item ">
                                <a href="javascript:void(0)" class="menu-link">
                                    <div>Reasons</div>
                                </a>


                            </li>


                            <li class="menu-item ">
                                <a href="javascript:void(0)" class="menu-link">
                                    <div>Policy and Terms</div>
                                </a>


                            </li>
                        </ul>
                    </li>
                </ul>
            </li>





                    <li class="menu-item ">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-intersect"></i>
                    <div>Service Portal</div>
                </a>


                <ul class="menu-sub">



                    <li class="menu-item ">
                        <a href="javascript:void(0)" class="menu-link">
                            <div>Add/Manage Categories</div>
                        </a>


                    </li>



                    <li class="menu-item ">
                        <a href="javascript:void(0)" class="menu-link">
                            <div>Manage Service Offers</div>
                        </a>


                    </li>



                    <li class="menu-item ">
                        <a href="javascript:void(0)" class="menu-link">
                            <div>Manage Search Services</div>
                        </a>


                    </li>



                    <li class="menu-item ">
                        <a href="javascript:void(0)" class="menu-link menu-toggle">
                            <div>Settings</div>
                        </a>


                        <ul class="menu-sub">



                            <li class="menu-item ">
                                <a href="javascript:void(0)" class="menu-link">
                                    <div>Reasons</div>
                                </a>


                            </li>


                            <li class="menu-item ">
                                <a href="javascript:void(0)" class="menu-link">
                                    <div>Policy and Terms</div>
                                </a>


                            </li>
                        </ul>
                    </li>
                </ul>
            </li>

                    <li class="menu-item ">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-intersect"></i>
                    <div>Advertisment</div>
                </a>

                <ul class="menu-sub">
                    <li class="menu-item ">
                        <a href="javascript:void(0)" class="menu-link menu-toggle">
                            <div>Add / Manage Cards</div>
                        </a>

                        <ul class="menu-sub">
                            <li class="menu-item ">
                                <a href="http://127.0.0.1:2002/specialcards" class="menu-link">
                                    <div>Manage Special Cards</div>
                                </a>
                            </li>
                            <li class="menu-item ">
                                <a href="http://127.0.0.1:2002/businesscards" class="menu-link">
                                    <div>Manage Business Cards</div>
                                </a>
                            </li>
                            <li class="menu-item ">
                                <a href="http://127.0.0.1:2002/Servicecards" class="menu-link">
                                    <div>Manage Services Cards</div>
                                </a>
                            </li>
                            <li class="menu-item ">
                                <a href="http://127.0.0.1:2002/FoodDrinkcards" class="menu-link">
                                    <div>Manage Food &amp; Drinks Cards</div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="menu-item ">
                        <a href="javascript:void(0)" class="menu-link menu-toggle">
                            <div>Add / Manage Ads</div>
                        </a>

                        <ul class="menu-sub">
                            <li class="menu-item ">
                                <a href="http://127.0.0.1:2002/specialAds" class="menu-link">
                                    <div>Manage Special Ads</div>
                                </a>
                            </li>
                            <li class="menu-item ">
                                <a href="http://127.0.0.1:2002/businessAds" class="menu-link">
                                    <div>Manage Business Ads</div>
                                </a>
                            </li>
                            <li class="menu-item ">
                                <a href="http://127.0.0.1:2002/ServiceAds" class="menu-link">
                                    <div>Manage Services Ads</div>
                                </a>
                            </li>
                            <li class="menu-item ">
                                <a href="http://127.0.0.1:2002/FoodDrinkAds" class="menu-link">
                                    <div>Manage Food &amp; Drinks Ads</div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="menu-item ">
                        <a href="javascript:void(0)" class="menu-link menu-toggle">
                            <div>Settings</div>
                        </a>

                        <ul class="menu-sub">
                            <li class="menu-item ">
                                <a href="http://127.0.0.1:2002/adver-manage-song" class="menu-link">
                                    <div>Add Manage/Songs</div>
                                </a>
                            </li>

                            <li class="menu-item ">
                                <a href="http://127.0.0.1:2002/advertisement_time" class="menu-link">
                                    <div>Ads Time</div>
                                </a>
                            </li>

                            <li class="menu-item ">
                                <a href="http://127.0.0.1:2002/adver-reason" class="menu-link">
                                    <div>Reasons</div>
                                </a>
                            </li>

                            <li class="menu-item ">
                                <a href="http://127.0.0.1:2002/advertisement-policy" class="menu-link">
                                    <div>Add Policy</div>
                                </a>
                            </li>

                            <li class="menu-item ">
                                <a href="http://127.0.0.1:2002/advertisement/advert/pricing" class="menu-link">
                                    <div>Pricing</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>


                    <li class="menu-header small text-uppercase">
                <span class="menu-header-text">User adds</span>
            </li>









            <li class="menu-item         ">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-book-content"></i>
                    <div>Feeds</div>
                </a>


                <ul class="menu-sub">

                    <li class="menu-item ">
                        <a href="http://127.0.0.1:2002/manage-user-feeds" class="menu-link">
                            <div>Manage User Feeds</div>
                        </a>


                    </li>



                    <li class="menu-item ">
                        <a href="http://127.0.0.1:2002/manage-channel-feeds" class="menu-link">
                            <div>Manage Channel Feed</div>
                        </a>


                    </li>



                    <li class="menu-item      ">
                        <a href="javascript:void(0)" class="menu-link menu-toggle">
                            <div>Settings</div>
                        </a>


                        <ul class="menu-sub">



                            <li class="menu-item ">
                                <a href="javascript:void(0)" class="menu-link menu-toggle">
                                    <div>Post Filter</div>
                                </a>


                                <ul class="menu-sub">



                                    <li class="menu-item ">
                                        <a href="javascript:void(0)" class="menu-link">
                                            <div>Image Filter</div>
                                        </a>


                                    </li>



                                    <li class="menu-item ">
                                        <a href="javascript:void(0)" class="menu-link">
                                            <div>Video Filter</div>
                                        </a>


                                    </li>



                                    <li class="menu-item ">
                                        <a href="javascript:void(0)" class="menu-link">
                                            <div>Keywords Filter</div>
                                        </a>


                                    </li>
                                </ul>
                            </li>



                            <li class="menu-item ">
                                <a href="http://127.0.0.1:2002/feed-background" class="menu-link">
                                    <div>Feed Background</div>
                                </a>


                            </li>



                            <li class="menu-item ">
                                <a href="http://127.0.0.1:2002/feed-emoji" class="menu-link">
                                    <div>Add Emojis</div>
                                </a>


                            </li>



                            <li class="menu-item ">
                                <a href="http://127.0.0.1:2002/feeds-reasons" class="menu-link">
                                    <div>Reasons</div>
                                </a>


                            </li>

                        </ul>
                    </li>
                </ul>
            </li>



                    <li class="menu-item       ">

                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-video"></i>
                    <div>Videos</div>
                </a>


                <ul class="menu-sub">



                    <li class="menu-item  ">
                        <a href="http://127.0.0.1:2002/manage_video" class="menu-link">
                            <div>Manage Videos</div>
                        </a>


                    </li>


                    <li class="menu-item   ">
                        <a href="javascript:void(0)" class="menu-link menu-toggle">
                            <div>Settings</div>
                        </a>


                        <ul class="menu-sub">

                        <li class="menu-item">
                                <a href="javascript:void(0)" class="menu-link">
                                    <div>Max. Upload Page</div>
                                </a>
                        </li>
                        </ul>
                    </li>
                </ul>
            </li>



                    <li class="menu-item  ">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-calendar-event"></i>
                    <div>Events</div>
                </a>


                <ul class="menu-sub">



                    <li class="menu-item ">
                        <a href="http://127.0.0.1:2002/events?view=new_request" class="menu-link">

                            <div>Add a Event</div>
                        </a>


                    </li>





                    <li class="menu-item ">
                        <a href=" http://127.0.0.1:2002/events/manage?view=new_request" class="menu-link">
                            <div>Manage Event</div>
                        </a>


                    </li>



                    <li class="menu-item ">
                        <a href="http://127.0.0.1:2002/events/tickets" class="menu-link">
                            <div>Event Tickets</div>
                        </a>


                    </li>



                    <li class="menu-item ">
                        <a href=" http://127.0.0.1:2002/ticket-service" class="menu-link">
                            <div>Event Services</div>
                        </a>


                    </li>




                    <li class="menu-item ">
                        <a href="javascript:void(0)" class="menu-link menu-toggle">
                            <div>Settings</div>
                        </a>


                        <ul class="menu-sub">



                            <li class="menu-item ">
                                <a href=" http://127.0.0.1:2002/events/reasons" class="menu-link">

                                    <div>Reasons</div>
                                </a>


                            </li>



                            <li class="menu-item ">
                                <a href="http://127.0.0.1:2002/events/policy_and_terms" class="menu-link">
                                    <div>Policy and Terms</div>
                                </a>


                            </li>
                        </ul>
                    </li>
                </ul>
            </li>





                    <li class="menu-item  ">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-credit-card"></i>
                    <div>Wishes &amp; Thanks</div>
                </a>


                <ul class="menu-sub">

                    <!--first add-->
                    <li class="menu-item ">
                        <a href="javascript:void(0)" class="menu-link menu-toggle">
                            <div>Greetings</div>
                        </a>


                        <ul class="menu-sub">



                            <li class="menu-item ">

                                <a href="http://127.0.0.1:2002/wishes/manage_greeting?view=new_request " class="menu-link">
                                    <div>Manage Greeting</div>
                                </a>


                            </li>


                            <li class="menu-item ">

                                <a href="http://127.0.0.1:2002/wishes/upload_cardtwo?view=new_request " class="menu-link">
                                    <div>Upload Cards</div>
                                </a>


                            </li>





                        </ul>
                    </li>






                    <li class="menu-item ">
                        <a href="javascript:void(0)" class="menu-link menu-toggle">
                            <div>Prays</div>
                        </a>


                        <ul class="menu-sub">


                            <li class="menu-item ">
                                <a href="http://127.0.0.1:2002/wishes/manage_pray?view=new_request" class="menu-link">
                                    <div>Manage Prays</div>
                                </a>
                            </li>

                            <li class="menu-item ">

                                <a href="http://127.0.0.1:2002/wishes/upload_card?view=new_request " class="menu-link">
                                    <div>Upload Cards</div>
                                </a>


                            </li>






                        </ul>
                    </li>

                    <!--sec add-->





                    <!--thi add-->
                    <li class="menu-item ">
                        <a href="javascript:void(0)" class="menu-link menu-toggle">
                            <div>Sympathy</div>
                        </a>


                        <ul class="menu-sub">


                            <li class="menu-item ">
                                <a href="http://127.0.0.1:2002/wishes/manage_sympathy?view=new_request" class="menu-link">
                                    <div>Manage Sympathy</div>
                                </a>


                            </li>

                            <li class="menu-item ">

                                <a href="http://127.0.0.1:2002/wishes/upload_cardone?view=new_request " class="menu-link">
                                    <div>Upload Cards</div>
                                </a>


                            </li>






                        </ul>
                    </li>









            <li class="menu-item ">
                <a href="javascript:void(0)" class="menu-link menu-toggle">
                    <div>Setting</div>
                </a>


                <ul class="menu-sub">



                    <li class="menu-item ">
                        <a href="http://127.0.0.1:2002/wishes/setting/pricing" class="menu-link">
                            <div>Pricing</div>
                        </a>


                    </li>

                    <li class="menu-item  ">
                        <a href="http://127.0.0.1:2002/wishes/setting/reasons" class="menu-link">
                            <div>Reasons</div>
                        </a>


                    </li>

                    <li class="menu-item ">
                        <a href="http://127.0.0.1:2002/wishes/setting/policy_terms" class="menu-link">
                            <div>Wishes Policy </div>
                        </a>


                    </li>


                </ul>
            </li>
        </ul>
        </li>

            <li class="menu-item ">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bxs-videos"></i>
                <div>Clips</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item ">
                    <a href="http://127.0.0.1:2002/manage-clips" class="menu-link">
                        <div>Manage Clips</div>
                    </a>
                </li>
                <li class="menu-item ">
                    <a href="javascript:void(0)" class="menu-link menu-toggle">
                        <div>Settings</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item ">
                            <a href="http://127.0.0.1:2002/reels/song" class="menu-link">
                                <div>Add Manage/Songs</div>
                            </a>
                        </li>
                        <li class="menu-item ">
                            <a href="http://127.0.0.1:2002/reels/stories_time" class="menu-link">
                                <div>Stories Time</div>
                            </a>
                        </li>
                        <li class="menu-item ">
                            <a href="http://127.0.0.1:2002/reels/reasons" class="menu-link">
                                <div>Reasons</div>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>




        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Content Adds</span>
        </li>





            <li class="menu-item   active open    ">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-music"></i>
                <div>Music</div>
            </a>


            <ul class="menu-sub">

                <li class="menu-item  active">
                    <a href="http://127.0.0.1:2002/artist" class="menu-link">
                        <div>Add Artist</div>
                    </a>
                </li>

                <li class="menu-item  ">
                    <a href="javascript:void(0)" class="menu-link menu-toggle">
                        <div>Settings</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item ">
                            <a href="http://127.0.0.1:2002/setting/music/pricing" class="menu-link">
                                <div>Pricing</div>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>




            <li class="menu-item   ">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-sort"></i>
                <div>Voting</div>
            </a>


            <ul class="menu-sub">







                <li class="menu-item  ">
                    <a href="http://127.0.0.1:2002/vote" class="menu-link">
                        <div>Manage Vote</div>
                    </a>


                </li>



            </ul>
        </li>






            <li class="menu-item   ">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-history"></i>
                <div>History</div>
            </a>


            <ul class="menu-sub">







                <li class="menu-item   ">
                    <a href="http://127.0.0.1:2002/history" class="menu-link">
                        <div>Add Manage History</div>
                    </a>


                </li>




            </ul>
        </li>






            <li class="menu-item  ">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-donate-heart"></i>
                <div>Donation</div>
            </a>


            <ul class="menu-sub">



                <li class="menu-item ">
                    <a href="http://127.0.0.1:2002/donations" class="menu-link">
                        <div>Add Manage Donation</div>
                    </a>


                </li>



                <li class="menu-item ">
                    <a href="http://127.0.0.1:2002/donations/organizations" class="menu-link">
                        <div>Add Manage Organization</div>
                    </a>


                </li>
            </ul>
        </li>

            <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Yekbun TV</span>
        </li>

        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-tv"></i>
                <div>Zarok TV</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="javascript:void(0)" class="menu-link">
                        <div>Add Stories</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="javascript:void(0)" class="menu-link">
                        <div>Add Movies</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="javascript:void(0)" class="menu-link">
                        <div>Add Series</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="javascript:void(0)" class="menu-link">
                        <div>Add Videos</div>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-tv"></i>
                <div>Malbat TV</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="javascript:void(0)" class="menu-link">
                        <div>Add Movies</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="javascript:void(0)" class="menu-link">
                        <div>Add Series</div>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-cog"></i>
                <div>Settings</div>
            </a>
            <ul class="menu-sub">

            </ul>
        </li>

            <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Bank &amp; Payments</span>
        </li>
        <li class="menu-item ">
            <a href="http://127.0.0.1:2002/currency" class="menu-link">
                <i class="menu-icon tf-icons bx bx-devices"></i>
                <div>Currency</div>
            </a>
        </li>
        <li class="menu-item ">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-money"></i>
                <div>Income</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item ">
                    <a href="http://127.0.0.1:2002/app/user-income" class="menu-link">
                        <div>User Income</div>
                    </a>
                </li>
                <li class="menu-item ">
                    <a href="http://127.0.0.1:2002/app/online-shop-income" class="menu-link">
                        <div>Online Shop Income</div>
                    </a>
                </li>
                <li class="menu-item ">
                    <a href="http://127.0.0.1:2002/app/service-income" class="menu-link">
                        <div>Service Income</div>
                    </a>
                </li>
                <li class="menu-item ">
                    <a href="http://127.0.0.1:2002/app/events-income" class="menu-link">
                        <div>Events Income</div>
                    </a>
                </li>
                <li class="menu-item ">
                    <a href="http://127.0.0.1:2002/app/music-income" class="menu-link">
                        <div>Music Income</div>
                    </a>
                </li>
                <li class="menu-item ">
                    <a href="http://127.0.0.1:2002/app/video-income" class="menu-link">
                        <div>Videos Income</div>
                    </a>
                </li>
                <li class="menu-item ">
                    <a href="http://127.0.0.1:2002/app/donation-income" class="menu-link">
                        <div>Donation Income</div>
                    </a>
                </li>
                <li class="menu-item ">
                    <a href="http://127.0.0.1:2002/app/total-income" class="menu-link">
                        <div>Total Income</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item ">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-file"></i>
                <div>Invoice</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item ">
                    <a href="http://127.0.0.1:2002/app/invoice/list" class="menu-link">
                        <div>User Invoice</div>
                    </a>
                </li>
                <li class="menu-item ">
                    <a href="http://127.0.0.1:2002/app/invoice/list" class="menu-link">
                        <div>FanPage Invoice</div>
                    </a>
                </li>
                <li class="menu-item ">
                    <a href="http://127.0.0.1:2002/app/invoice/list" class="menu-link">
                        <div>Bazar Invoice</div>
                    </a>
                </li>
                <li class="menu-item ">
                    <a href="http://127.0.0.1:2002/app/invoice/list" class="menu-link">
                        <div>OnlineShop Invoice</div>
                    </a>
                </li>
                <li class="menu-item ">
                    <a href="http://127.0.0.1:2002/app/invoice/list" class="menu-link">
                        <div>Ads Service Invoice</div>
                    </a>
                </li>
                <li class="menu-item ">
                    <a href="http://127.0.0.1:2002/app/invoice/list" class="menu-link">
                        <div>Donation Invoice</div>
                    </a>
                </li>
                <li class="menu-item ">
                    <a href="javascript:void(0)" class="menu-link menu-toggle">
                        <div>Setting</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item ">
                            <a href="http://127.0.0.1:2002/app/invoice/edit" class="menu-link">
                                <div>Edit Invoice</div>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
        <li class="menu-item ">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-credit-card"></i>
                <div>Payments</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item ">
                    <a href="http://127.0.0.1:2002/settings/payment-offices" class="menu-link">
                        <div>Payment Office</div>
                    </a>
                </li>
                <li class="menu-item  ">
                    <a href="http://127.0.0.1:2002/settings/bank-transfer" class="menu-link">
                        <div>Add Manage Bank Transfer</div>
                    </a>
                </li>
                <li class="menu-item ">
                    <a href="http://127.0.0.1:2002/settings/paypal-stripe" class="menu-link">
                        <div>Add Manage Paypal Transfer</div>
                    </a>
                </li>
                <li class="menu-item ">
                    <a href="http://127.0.0.1:2002/settings/payment-methods" class="menu-link">
                        <div>Add Manage DebitCard</div>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">App Settings</span>
        </li>
        <li class="menu-item ">
            <a href="http://127.0.0.1:2002/app/portal-notification" class="menu-link">
                <i class="menu-icon tf-icons bx bx-notification"></i>
                <div>Portal Notifications</div>
            </a>
        </li>
                <li class="menu-item ">
            <a href="http://127.0.0.1:2002/app-policy" class="menu-link">
                <i class="menu-icon tf-icons bx bx-list-ul"></i>
                <div>App Policy</div>
            </a>
        </li>
                <li class="menu-item ">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-map"></i>
                <div>Manage Origin</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item ">
                    <a href="http://127.0.0.1:2002/settings/countries" class="menu-link">
                        <div>Add Country</div>
                    </a>
                </li>
                <li class="menu-item ">
                    <a href="http://127.0.0.1:2002/settings/provinces" class="menu-link">
                        <div>Add Provinces</div>
                    </a>
                </li>
                <li class="menu-item ">
                    <a href="http://127.0.0.1:2002/settings/cities" class="menu-link">
                        <div>Add City and Zipcode</div>
                    </a>
                </li>
            </ul>
        </li>


        <li class="menu-item  ">
            <a href="http://127.0.0.1:2002/app/popup" class="menu-link">
                <i class="menu-icon tf-icons bx bx-message-square-add"></i>
                <div>Add Popup</div>
            </a>
        </li>
                <li class="menu-item ">
            <a href="http://127.0.0.1:2002/settings/app-setting/app-info" class="menu-link">
                <i class="menu-icon tf-icons bx bx-info-square"></i>
                <div>App Info</div>
            </a>
        </li>

            <li class="menu-item " style="">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-devices"></i>
                <div>Add Ringtone</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item ">
                    <a href="http://127.0.0.1:2002/settings/app-setting/message-ringtone" class="menu-link">
                        <div>Message Ringtone</div>
                    </a>
                </li>
                <li class="menu-item  ">
                    <a href="http://127.0.0.1:2002/settings/app-setting/call-ringtone" class="menu-link">
                        <div>Calls Ringtone</div>
                    </a>
                </li>
                <li class="menu-item  ">
                    <a href="http://127.0.0.1:2002/settings/app-setting/notification-ringtone" class="menu-link">
                        <div>Notifications Ringtone</div>
                    </a>
                </li>
            </ul>
        </li>

            <li class="menu-item ">
            <a href="http://127.0.0.1:2002/settings/app-setting/maintainance" class="menu-link">
                <i class="menu-icon tf-icons bx bx-wrench"></i>
                <div>Maintainance</div>
            </a>
        </li>

        <li class="menu-item ">
            <a href="http://127.0.0.1:2002/nationality" class="menu-link">
                <i class="menu-icon tf-icons bx bx-flag"></i>
                <div>Manage Nationality</div>
            </a>
        </li>

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">System Settings</span>
        </li>
        <li class="menu-item ">
            <a href="http://127.0.0.1:2002/logs" class="menu-link">
                <i class="menu-icon tf-icons bx bx-file"></i>
                <div>System Log</div>
            </a>
        </li>
                <li class="menu-item ">
            <a href="http://127.0.0.1:2002/language" class="menu-link">
                <i class="menu-icon tf-icons bx bx-transfer"></i>
                <div>Languages</div>
            </a>
        </li>
                <li class="menu-item ">
            <a href="http://127.0.0.1:2002/app/ftp/list" class="menu-link">
                <i class="menu-icon tf-icons bx bx-network-chart"></i>
                <div>FTP Settings</div>
            </a>
        </li>
        <li class="menu-item ">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-cloud-upload"></i>
                <div>Backup Section</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item ">
                    <a href="javascript:void(0)" class="menu-link">
                        <div>Add/Manage Backup Plan</div>
                    </a>
                </li>
                <li class="menu-item ">
                    <a href="javascript:void(0)" class="menu-link">
                        <div>Backup Setting</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item ">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-file"></i>
                <div>Team &amp; Role</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item ">
                    <a href="http://127.0.0.1:2002/settings/team/members" class="menu-link">
                        <div>Add/Manage Team</div>
                    </a>
                </li>
                <li class="menu-item ">
                    <a href="http://127.0.0.1:2002/settings/team/roles" class="menu-link">
                        <div>Add/Manage Roles</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item ">
            <a href="http://127.0.0.1:2002/app-setting/department" class="menu-link">
                <i class="menu-icon tf-icons bx bx-devices"></i>
                <div>Departments</div>
            </a>
        </li>
        <li class="menu-item ">
            <a href="http://127.0.0.1:2002/storage_setting" class="menu-link">
                <i class="menu-icon tf-icons bx bx-devices"></i>
                <div>Storage Setting</div>
            </a>
        </li>
        <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
        <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
    </div>
    <div class="ps__rail-y" style="top: 0px; height: 298px; right: 4px;">
        <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 37px;"></div>
    </div>
    <div class="ps__rail-x" style="left: 0px; bottom: -1045px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 1045px; height: 494px; right: 4px;"><div class="ps__thumb-y" tabindex="0" style="top: 192px; height: 90px;"></div></div></ul>

</aside>


    <!-- Layout page -->
    <div class="layout-page">
      <!-- BEGIN: Navbar-->
            <!-- Navbar -->
<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar" style="box-shadow: none; background: transparent !important;">

            <!--  Brand demo (display only for navbar-full and hide on below xl) -->

            <!-- ! Not required for layout-without-menu -->
                        <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0  d-xl-none ">
                <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                    <i class="bx bx-menu bx-sm"></i>
                </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center row" id="navbar-collapse">

                                <div class="col-7 card mb-0 px-3 search-wrap d-flex justify-content-center" style="height:54px;">
                    <!-- Search -->
                    <div class="navbar-nav">
                        <div class="nav-item navbar-search-wrapper mb-0">
                            <a class="nav-item nav-link search-toggler px-0" href="javascript:void(0);">
                                <i class="bx bx-search bx-sm"></i>
                                <span class="d-none d-md-inline-block text-muted">Search (Ctrl+/)</span>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /Search -->
                <div class="col-1 mb-0"></div>
                                <div class="col-4 card mb-0 d-flex justify-content-between align-items-center">
                    <ul class="navbar-nav flex-row align-items-center justify-content-around" style="width: 100%;">
                                                <!-- Language -->
                        <li class="nav-item dropdown-notifications navbar-dropdown dropdown me-3 me-xl-1">
                            <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                                <i class="bx bx-globe bx-sm"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item">
                                        <span class="align-middle">English</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item">
                                        <span class="align-middle">French</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item">
                                        <span class="align-middle">Arabic</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item">
                                        <span class="align-middle">German</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- <li class="nav-item me-2 me-xl-0">
                            <a class="nav-item nav-link" href="http://127.0.0.1:2002/app/user/notes?type=all-news">
                                <img src="http://127.0.0.1:2002/assets/svg/icons/sticky-notes.svg" width="25" alt="">
                            </a>
                        </li>




                         -->

                        <!--/ Language -->


                        <!-- Quick links  -->
                        <li class="nav-item dropdown-shortcuts navbar-dropdown dropdown me-2 me-xl-0">
                            <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                                <i class="bx bx-grid-alt bx-sm"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end py-0">
                                <div class="dropdown-menu-header border-bottom">
                                    <div class="dropdown-header d-flex align-items-center py-3">
                                        <h5 class="text-body mb-0 me-auto">Shortcuts</h5>
                                        <a href="javascript:void(0)" class="dropdown-shortcuts-add text-body" data-bs-toggle="tooltip" data-bs-placement="top" title="Add shortcuts"><i class="bx bx-sm bx-plus-circle"></i></a>
                                    </div>
                                </div>
                                <div class="dropdown-shortcuts-list scrollable-container">
                                    <div class="row row-bordered overflow-visible g-0">
                                        <div class="dropdown-shortcuts-item col">
                                            <span class="dropdown-shortcuts-icon bg-label-secondary rounded-circle mb-2">
                                                <i class="bx bx-calendar fs-4"></i>
                                            </span>
                                            <a href="http://127.0.0.1:2002/app/calendar" class="stretched-link">Calendar</a>
                                            <small class="text-muted mb-0">Appointments</small>
                                        </div>
                                        <div class="dropdown-shortcuts-item col">
                                            <span class="dropdown-shortcuts-icon bg-label-secondary rounded-circle mb-2">
                                                <i class="bx bx-food-menu fs-4"></i>
                                            </span>
                                            <a href="http://127.0.0.1:2002/app/invoice/list" class="stretched-link">Invoice App</a>
                                            <small class="text-muted mb-0">Manage Accounts</small>
                                        </div>
                                    </div>
                                    <div class="row row-bordered overflow-visible g-0">
                                        <div class="dropdown-shortcuts-item col">
                                            <span class="dropdown-shortcuts-icon bg-label-secondary rounded-circle mb-2">
                                                <i class="bx bx-user fs-4"></i>
                                            </span>
                                            <a href="http://127.0.0.1:2002/app/user/list" class="stretched-link">User App</a>
                                            <small class="text-muted mb-0">Manage Users</small>
                                        </div>
                                        <div class="dropdown-shortcuts-item col">
                                            <span class="dropdown-shortcuts-icon bg-label-secondary rounded-circle mb-2">
                                                <i class="bx bx-check-shield fs-4"></i>
                                            </span>
                                            <a href="http://127.0.0.1:2002/app/access-roles" class="stretched-link">Role
                                                Management</a>
                                            <small class="text-muted mb-0">Permission</small>
                                        </div>
                                    </div>
                                    <div class="row row-bordered overflow-visible g-0">
                                        <div class="dropdown-shortcuts-item col">
                                            <span class="dropdown-shortcuts-icon bg-label-secondary rounded-circle mb-2">
                                                <i class="bx bx-pie-chart-alt-2 fs-4"></i>
                                            </span>
                                            <a href="http://127.0.0.1:2002" class="stretched-link">Dashboard</a>
                                            <small class="text-muted mb-0">User Profile</small>
                                        </div>
                                        <div class="dropdown-shortcuts-item col">
                                            <span class="dropdown-shortcuts-icon bg-label-secondary rounded-circle mb-2">
                                                <i class="bx bx-cog fs-4"></i>
                                            </span>
                                            <a href="http://127.0.0.1:2002/pages/account-settings-account" class="stretched-link">Setting</a>
                                            <small class="text-muted mb-0">Account Settings</small>
                                        </div>
                                    </div>
                                    <div class="row row-bordered overflow-visible g-0">
                                        <div class="dropdown-shortcuts-item col">
                                            <span class="dropdown-shortcuts-icon bg-label-secondary rounded-circle mb-2">
                                                <i class="bx bx-help-circle fs-4"></i>
                                            </span>
                                            <a href="http://127.0.0.1:2002/pages/help-center-landing" class="stretched-link">Help
                                                Center</a>
                                            <small class="text-muted mb-0">FAQs &amp; Articles</small>
                                        </div>
                                        <div class="dropdown-shortcuts-item col">
                                            <span class="dropdown-shortcuts-icon bg-label-secondary rounded-circle mb-2">
                                                <i class="bx bx-window-open fs-4"></i>
                                            </span>
                                            <a href="http://127.0.0.1:2002/modal-examples" class="stretched-link">Modals</a>
                                            <small class="text-muted mb-0">Useful Popups</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <!-- Quick links -->

                        <!-- Style Switcher -->
                        <li class="nav-item dropdown-notifications navbar-dropdown dropdown me-3 me-xl-1">
                            <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                                <i class="bx bx-bell bx-sun bx-sm"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item">
                                        <i class="bx bx-sun me-2"></i>
                                        <span class="align-middle">Light</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item">
                                        <i class="bx bx-moon me-2"></i>
                                        <span class="align-middle">Dark</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item">
                                        <i class="bx bx-desktop me-2"></i>
                                        <span class="align-middle">System</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!--/ Style Switcher -->

                        <!-- Notification -->
                        <li class="nav-item dropdown-notifications navbar-dropdown dropdown me-3 me-xl-1">
                            <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                                <i class="bx bx-bell bx-sm"></i>
                                <span class="badge bg-danger rounded-pill badge-notifications">5</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end py-0">
                                <li class="dropdown-menu-header border-bottom">
                                    <div class="dropdown-header d-flex align-items-center py-3">
                                        <h5 class="text-body mb-0 me-auto">Notification</h5>
                                        <a href="javascript:void(0)" class="dropdown-notifications-all text-body" data-bs-toggle="tooltip" data-bs-placement="top" title="Mark all as read"><i class="bx fs-4 bx-envelope-open"></i></a>
                                    </div>
                                </li>
                                <li class="dropdown-notifications-list scrollable-container">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item list-group-item-action dropdown-notifications-item">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar">
                                                        <img src="http://127.0.0.1:2002/assets/img/avatars/1.png" alt="" class="w-px-40 h-auto rounded-circle">
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-1">Congratulation Lettie 🎉</h6>
                                                    <p class="mb-0">Won the monthly best seller gold badge</p>
                                                    <small class="text-muted">1h ago</small>
                                                </div>
                                                <div class="flex-shrink-0 dropdown-notifications-actions">
                                                    <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                                                    <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="bx bx-x"></span></a>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item list-group-item-action dropdown-notifications-item">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar">
                                                        <span class="avatar-initial rounded-circle bg-label-danger">CF</span>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-1">Charles Franklin</h6>
                                                    <p class="mb-0">Accepted your connection</p>
                                                    <small class="text-muted">12hr ago</small>
                                                </div>
                                                <div class="flex-shrink-0 dropdown-notifications-actions">
                                                    <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                                                    <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="bx bx-x"></span></a>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar">
                                                        <img src="http://127.0.0.1:2002/assets/img/avatars/2.png" alt="" class="w-px-40 h-auto rounded-circle">
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-1">New Message ✉️</h6>
                                                    <p class="mb-0">You have new message from Natalie</p>
                                                    <small class="text-muted">1h ago</small>
                                                </div>
                                                <div class="flex-shrink-0 dropdown-notifications-actions">
                                                    <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                                                    <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="bx bx-x"></span></a>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item list-group-item-action dropdown-notifications-item">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar">
                                                        <span class="avatar-initial rounded-circle bg-label-success"><i class="bx bx-cart"></i></span>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-1">Whoo! You have new order 🛒 </h6>
                                                    <p class="mb-0">ACME Inc. made new order $1,154</p>
                                                    <small class="text-muted">1 day ago</small>
                                                </div>
                                                <div class="flex-shrink-0 dropdown-notifications-actions">
                                                    <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                                                    <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="bx bx-x"></span></a>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar">
                                                        <img src="http://127.0.0.1:2002/assets/img/avatars/9.png" alt="" class="w-px-40 h-auto rounded-circle">
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-1">Application has been approved 🚀 </h6>
                                                    <p class="mb-0">Your ABC project application has been approved.</p>
                                                    <small class="text-muted">2 days ago</small>
                                                </div>
                                                <div class="flex-shrink-0 dropdown-notifications-actions">
                                                    <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                                                    <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="bx bx-x"></span></a>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar">
                                                        <span class="avatar-initial rounded-circle bg-label-success"><i class="bx bx-pie-chart-alt"></i></span>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-1">Monthly report is generated</h6>
                                                    <p class="mb-0">July monthly financial report is generated </p>
                                                    <small class="text-muted">3 days ago</small>
                                                </div>
                                                <div class="flex-shrink-0 dropdown-notifications-actions">
                                                    <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                                                    <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="bx bx-x"></span></a>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar">
                                                        <img src="http://127.0.0.1:2002/assets/img/avatars/5.png" alt="" class="w-px-40 h-auto rounded-circle">
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-1">Send connection request</h6>
                                                    <p class="mb-0">Peter sent you connection request</p>
                                                    <small class="text-muted">4 days ago</small>
                                                </div>
                                                <div class="flex-shrink-0 dropdown-notifications-actions">
                                                    <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                                                    <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="bx bx-x"></span></a>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item list-group-item-action dropdown-notifications-item">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar">
                                                        <img src="http://127.0.0.1:2002/assets/img/avatars/6.png" alt="" class="w-px-40 h-auto rounded-circle">
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-1">New message from Jane</h6>
                                                    <p class="mb-0">Your have new message from Jane</p>
                                                    <small class="text-muted">5 days ago</small>
                                                </div>
                                                <div class="flex-shrink-0 dropdown-notifications-actions">
                                                    <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                                                    <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="bx bx-x"></span></a>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar">
                                                        <span class="avatar-initial rounded-circle bg-label-warning"><i class="bx bx-error"></i></span>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-1">CPU is running high</h6>
                                                    <p class="mb-0">CPU Utilization Percent is currently at 88.63%,</p>
                                                    <small class="text-muted">5 days ago</small>
                                                </div>
                                                <div class="flex-shrink-0 dropdown-notifications-actions">
                                                    <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                                                    <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="bx bx-x"></span></a>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                <li class="dropdown-menu-footer border-top">
                                    <a href="javascript:void(0);" class="dropdown-item d-flex justify-content-center text-primary p-2 h-px-40">
                                        View all notifications
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!--/ Notification -->

                        <!-- User -->
                        <li class="nav-item navbar-dropdown dropdown-user dropdown">
                            <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                                <div class="avatar avatar-online">
                                    <img src="http://127.0.0.1:2002/storage/images/user/67d99941bf425___men-avatar.png" alt="" class="w-px-40 h-px-40 rounded-circle">
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item" href="http://127.0.0.1:2002/admin/profile">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0 me-3">
                                                <div class="avatar avatar-online">
                                                    <img src="http://127.0.0.1:2002/storage/images/user/67d99941bf425___men-avatar.png" alt="" class="w-px-40 h-px-40 rounded-circle">
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <span class="fw-semibold d-block">
                                                                                                        Super
                                                                                                    </span>
                                                <small class="text-muted">admin@gmail.com</small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                                                <li>
                                    <div class="dropdown-divider"></div>
                                </li>

                                <li>
                                    <a class="dropdown-item" href="http://127.0.0.1:2002/admin/profile">
                                        <i class="bx bx-user me-2"></i>
                                        <span class="align-middle">My Profile </span>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="http://127.0.0.1:2002/admin_activity">
                                        <i class="bx bx-user me-2"></i>
                                        <span class="align-middle">Admin Activity</span>
                                    </a>
                                </li>

                                <li>
                                    <a class="dropdown-item" href="http://127.0.0.1:2002/system-status">
                                        <i class="bx bx-chart me-2"></i>
                                        <span class="align-middle">System Status</span>
                                    </a>
                                </li>

                                                                <li>
                                    <div class="dropdown-divider"></div>
                                </li>
                                                                <li>
                                    <a class="dropdown-item" href="http://127.0.0.1:2002/logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="bx bx-power-off me-2"></i>
                                        <span class="align-middle">Logout</span>
                                    </a>
                                </li>
                                <form method="POST" id="logout-form" action="http://127.0.0.1:2002/logout">
                                    <input type="hidden" name="_token" value="PXqkvSzrXblopu90lUJzrI4CSrSJUSRoY6qOEJ4v">                                </form>
                                                            </ul>
                        </li>
                        <!--/ User -->
                    </ul>
                </div>
            </div>

            <!-- Search Small Screens -->
            <div class="navbar-search-wrapper search-input-wrapper  d-none">
                <input type="text" class="form-control search-input container-xxl border-0" placeholder="Search..." aria-label="Search...">
                <i class="bx bx-x bx-sm search-toggler cursor-pointer"></i>
            </div>

                </nav>
    <!-- / Navbar -->

    <!-- Category Model -->
    <div class="modal fade" id="livestreammodel" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="col-xl-6">
                    <div class="nav-align-top mb-4">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-home" aria-controls="navs-top-home" aria-selected="true">Publish</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-profile" aria-controls="navs-top-profile" aria-selected="false" tabindex="-1">Album</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button type="button" class="nav-link" role="tab" data-bs-toggle="modal" data-bs-target="#onboardingSlideModal" aria-controls="onboardingSlideModal" aria-selected="false" tabindex="-1">Video</button>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="modal-body">
                    <div class="tab-content tabcontent--1">
                        <div class="tab-pane fade show active" id="navs-top-home" role="tabpanel">
                            <div class="row">
                                <form method="POST" action="http://127.0.0.1:2002/news-category">
                                    <input type="hidden" name="_token" value="PXqkvSzrXblopu90lUJzrI4CSrSJUSRoY6qOEJ4v">                                    <div class="col-12 d-flex">
                                        <div>
                                            <img src="http://127.0.0.1:2002/assets/img/avatars/1.png" width="50" class="rounded-circle">
                                        </div>
                                        <textarea type="text" id="nameLarge" class="form-control border-0" placeholder="Write Something here"
                                            name="news_category"></textarea>
                                    </div>
                                </form>
                                <div class="col-12 " style="display:flex;gap:16px;margin-top:100px; border-top:1px solid #f7f7f7 ">
                                    <div>
                                        <button class="btn" style="background-color:#f7f7f7; border-radius:500px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-camera">
                                                <path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z">
                                                </path>
                                                <circle cx="12" cy="13" r="4"></circle>
                                            </svg>&nbsp;Media</button>
                                    </div>
                                    <div>
                                        <button class="btn " style="background-color:#f7f7f7; border-radius:500px;">
                                            <img src="http://127.0.0.1:2002/assets/img/emoji-1.svg" width="25">&nbsp;Activity</button>
                                    </div>

                                    <div>
                                        <button class="btn " style="background-color:#f7f7f7; border-radius:500px;">
                                            <i class="bx bx-dots-horizontal-rounded "></i></button>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="navs-top-profile" role="tabpanel">
                            <div class="row">
                                <form method="POST" action="http://127.0.0.1:2002/news-category">
                                    <input type="hidden" name="_token" value="PXqkvSzrXblopu90lUJzrI4CSrSJUSRoY6qOEJ4v">                                    <div class="col-12 d-flex">
                                        <div>
                                            <img src="http://127.0.0.1:2002/assets/img/avatars/1.png" width="50" class="rounded-circle">
                                        </div>
                                        <textarea type="text" id="nameLarge" class="form-control border-0" placeholder="Write Something here"
                                            name="news_category"></textarea>
                                    </div>
                                </form>
                                <div class="col-12" style="display:flex;gap:16px;margin-top:100px; border-top:1px solid #f7f7f7 ">
                                    <div><button class="btn " style="background-color:#f7f7f7; border-radius:500px;"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-camera">
                                                <path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z">
                                                </path>
                                                <circle cx="12" cy="13" r="4"></circle>
                                            </svg>&nbsp;Media</button></div>
                                    <div> <button class="btn " style="background-color:#f7f7f7; border-radius:500px;"><img src="http://127.0.0.1:2002/assets/img/emoji-1.svg" width="25">&nbsp;Activity</button></div>
                                    <button class="btn " style="background-color:#f7f7f7; border-radius:500px;"><i class="bx bx-dots-horizontal-rounded "></i></button>
                                    <div></div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>


    <!-- slider modal -->
    <div class="modal-onboarding modal fade animate__animated" id="onboardingSlideModal" tabindex="-1" aria-hidden="true" role="tabpanel">
        <div class="modal-dialog" role="document">
            <div class="modal-content text-center">
                <div class="modal-header border-0">
                    <a class="text-muted close-label" href="javascript:void(0);" data-bs-dismiss="modal">Skip Intro</a>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div id="modalCarouselControls" class="carousel slide pb-4 mb-2" data-bs-interval="false">
                    <ol class="carousel-indicators">
                        <li data-bs-target="#modalCarouselControls" data-bs-slide-to="0" class="active"></li>
                        <li data-bs-target="#modalCarouselControls" data-bs-slide-to="1"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="onboarding-media">
                                <div class="mx-2">
                                    <img src="http://127.0.0.1:2002/assets/img/videotrip.svg" alt="girl-with-laptop-light" width="335" class="img-fluid">
                                </div>
                            </div>
                            <div class="onboarding-content">
                                <h4 class="onboarding-title text-body">Share live videos</h4>
                                <p>Lorem ipsum sit dolor amet is a dummy text used by the typography industry and the
                                    web industry.</p>
                                <br><br>
                            </div>
                            <a class="carousel-control-next" href="#modalCarouselControls" role="button" data-bs-slide="next">
                                <button type="button" class="btn btn-primary">
                                    Next
                                </button>
                            </a>
                        </div>
                        <div class="carousel-item">
                            <div class="onboarding-media">
                                <div class="mx-2">
                                    <img src="http://127.0.0.1:2002/assets/img/videocall.svg" alt="boy-with-laptop-light" width="300" class="img-fluid">
                                </div>
                            </div>
                            <div class="onboarding-content">
                                <h4 class="onboarding-title text-body">To build your audience</h4>
                                <div class="onboarding-info">Lorem ipsum sit dolor amet is a dummy text used by the
                                    typography industry and the web industry.</div> <br><br>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#animationModal">
                                    Got it
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ slider modal -->

    <!-- Modal -->
    <div class="modal fade animate__animated fadeIn" id="animationModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel5">Go Live</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="row ">
                    <div class="col-md-7">
                        <div class="video-container">
                            <iframe width="100%" height="680" src="https://media.istockphoto.com/id/1365258482/video/adaptive-interface-design-video-concept.mp4?s=mp4-640x640-is&amp;k=20&amp;c=tf7tups5Y05BtaiZnfdCfyMrt3lhDbH3sX_H6R8Tji8=">
                            </iframe>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="d-flex justify-content-start align-items-center user-name ">
                                    <div class="avatar-wrapper">
                                        <div class="avatar avatar-sm me-3"><img src="http://127.0.0.1:2002/assets/img/10.png" alt="Avatar" class="rounded-circle"></div>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <a href="javascript:void(0)" class="text-body text-truncate">
                                            <span class="fw-semibold">Jenna Devis <span>is live</span></span>
                                        </a>
                                        <small class="text-muted">right now</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <button class="btn border rounded">Follow</button>
                                <div class="dropup d-none d-sm-block" style="position: absolute; right:10px; top:55px;">
                                    <button class="btn p-0" type="button" id="sharedList" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="bx bx-dots-vertical"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="sharedList" style="padding:10px;">

                                        <strong>Who can see this ?</strong>
                                        <ul class="list-group list-unstyled">
                                            <li><a>
                                                    </a><div class="d-flex justify-content-center align-items-center user-name "><a>
                                                        <div class="avatar-wrapper">
                                                            <div class="avatar avatar-sm me-3 text-center"><i class="bx bx-world"></i></div>
                                                        </div>
                                                        </a><div class="d-flex flex-column"><a>
                                                            </a><a href="javascript:void(0)" class="text-body text-truncate">
                                                                <span class="fw-semibold">Public</span>
                                                            </a>
                                                            <small class="text-muted">Anyone can see this
                                                                publication.</small>
                                                        </div>
                                                    </div>
                                                </li>
                                            <li><a>
                                                    </a><div class="d-flex justify-content-center align-items-center user-name "><a>
                                                        <div class="avatar-wrapper">
                                                            <div class="avatar avatar-sm me-3 text-center"><i class="bx bx-group"></i></div>
                                                        </div>
                                                        </a><div class="d-flex flex-column"><a>
                                                            </a><a href="javascript:void(0)" class="text-body text-truncate">
                                                                <span class="fw-semibold">Friends</span>
                                                            </a>
                                                            <small class="text-muted">Only Friends can see this
                                                                publication.</small>
                                                        </div>
                                                    </div>
                                                </li>
                                            <li><a>
                                                    </a><div class="d-flex justify-content-center align-items-center user-name "><a>
                                                        <div class="avatar-wrapper">
                                                            <div class="avatar avatar-sm me-3 text-center"><i class="bx bxs-right-arrow-alt"></i></div>
                                                        </div>
                                                        </a><div class="d-flex flex-column"><a>
                                                            </a><a href="javascript:void(0)" class="text-body text-truncate">
                                                                <span class="fw-semibold">Specific Friends</span>
                                                            </a>
                                                            <small class="text-muted">Dont Show it to some
                                                                friends.</small>
                                                        </div>
                                                    </div>
                                                </li>
                                            <hr>
                                            <li><a>
                                                    </a><div class="d-flex justify-content-center align-items-center user-name "><a>
                                                        <div class="avatar-wrapper">
                                                            <div class="avatar avatar-sm me-3 text-center"><i class="bx bxs-user"></i></div>
                                                        </div>
                                                        </a><div class="d-flex flex-column"><a>
                                                            </a><a href="javascript:void(0)" class="text-body text-truncate">
                                                                <span class="fw-semibold">Only me</span>
                                                            </a>
                                                            <small class="text-muted">Only me can see this
                                                                publication.</small>
                                                        </div>
                                                    </div>
                                                </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-11 mt-4">
                                <input type="text" class="form-control form-rounded" placeholder="what is this live about?">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-8 ">
                                <span style="margin-left:10px;">
                                    <i class="bx bx-heart"></i>&nbsp;&nbsp;0</span>
                                <span style="margin-left:10px;">
                                    <i class="bx bx-share"></i>&nbsp;&nbsp;0</span>
                                <span style="margin-left:10px;">
                                    <i class="bx bx-chat"></i>&nbsp;&nbsp;0</span>
                            </div>

                            <div class="col-md-4 ">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#888da8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                        <circle cx="12" cy="12" r="3"></circle>
                                    </svg>&nbsp;&nbsp;0</span><span>&nbsp;&nbsp;views</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-11">
                                <hr>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-3">
                                <span class="feeds_icons">
                                    <i class="bx bx-like"></i>&nbsp;Like
                                </span>
                            </div>
                            <div class="col-md-3">
                                <span class="feeds_icons">
                                    <i class="bx bx-chat"></i>&nbsp;Comment
                                </span>
                            </div>
                            <div class="col-md-3">
                                <span class="feeds_icons">
                                    <i class="bx bx-share"></i>&nbsp;Share
                                </span>
                            </div>

                            <div class="col-md-3">
                                <div class="dropdown show">
                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <img src="http://127.0.0.1:2002/assets/img/10.png" alt="Avatar" class="rounded-circle" width="20" height="20">
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink" style="padding:10px;">
                                        <div class="d-flex justify-content-start align-items-center user-name">
                                            <div class="avatar-wrapper">
                                                <div class="avatar avatar-sm me-3"><img src="http://127.0.0.1:2002/assets/img/10.png" alt="Avatar" class="rounded-circle"></div>
                                            </div>
                                            <div class="d-flex flex-column">
                                                <a href="javascript:void(0)" class="text-body text-truncate">
                                                    <span class="fw-semibold">Jenna Devis <span>is live</span></span>
                                                </a>
                                                <small class="text-muted">right now</small>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="d-flex justify-content-start align-items-center user-name">
                                            <div class="avatar-wrapper">
                                                <div class="avatar avatar-sm me-3"><img src="http://127.0.0.1:2002/assets/img/10.png" alt="Avatar" class="rounded-circle"></div>
                                            </div>
                                            <div class="d-flex flex-column">
                                                <a href="javascript:void(0)" class="text-body text-truncate">
                                                    <span class="fw-semibold">Jenna Devis <span>is live</span></span>
                                                </a>
                                                <small class="text-muted">right now</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-5">

                            <div class="col-md-6 ">
                                <h6 class="comments_section"><a>Comments</a></h6>
                                <hr class="hr__commemnts">
                            </div>
                            <div class="col-md-6">
                                <h6><a>UpComing</a></h6>
                                <hr>
                            </div>

                        </div>

                        <div class="section_feeds overflow-auto" style="height:300px">
                            <div class="container-fluid">

                                <div class="row mb-1">
                                    <div class="col">
                                        <div class="d-flex justify-content-start align-items-center user-name">
                                            <div class="avatar-wrapper">
                                                <div class="avatar avatar-sm me-3"><img src="http://127.0.0.1:2002/assets/img/10.png" alt="Avatar" class="rounded-circle"></div>
                                            </div>
                                            <div class="d-flex flex-column p-2" style="background: #f5f6f7">
                                                <a href="javascript:void(0)" class="text-body text-truncate">
                                                    <span class="fw-semibold">Jenna Devis <span>is live</span></span>
                                                </a>
                                                <small class="text-muted">Lorem ipsum dolor sit amet, consectetur
                                                    adipiscing elit. Proin ornare magna eros</small>
                                                <span style=" color: #5596e6;">Like</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row mb-1">
                                    <div class="col">
                                        <div class="d-flex justify-content-start align-items-center user-name">
                                            <div class="avatar-wrapper">
                                                <div class="avatar avatar-sm me-3"><img src="http://127.0.0.1:2002/assets/img/10.png" alt="Avatar" class="rounded-circle"></div>
                                            </div>
                                            <div class="d-flex flex-column p-2" style="background: #f5f6f7">
                                                <a href="javascript:void(0)" class="text-body text-truncate">
                                                    <span class="fw-semibold">Jenna Devis <span>is live</span></span>
                                                </a>
                                                <small class="text-muted">Lorem ipsum dolor sit amet, consectetur
                                                    adipiscing elit. Proin ornare magna eros</small>
                                                <span style=" color: #5596e6;">Like</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row mb-1">
                                    <div class="col">
                                        <div class="d-flex justify-content-start align-items-center user-name">
                                            <div class="avatar-wrapper">
                                                <div class="avatar avatar-sm me-3"><img src="http://127.0.0.1:2002/assets/img/10.png" alt="Avatar" class="rounded-circle"></div>
                                            </div>
                                            <div class="d-flex flex-column p-2" style="background: #f5f6f7">
                                                <a href="javascript:void(0)" class="text-body text-truncate">
                                                    <span class="fw-semibold">Jenna Devis <span>is live</span></span>
                                                </a>
                                                <small class="text-muted">Lorem ipsum dolor sit amet, consectetur
                                                    adipiscing elit. Proin ornare magna eros</small>
                                                <span style=" color: #5596e6;">Like</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row mb-1">
                                    <div class="col">
                                        <div class="d-flex justify-content-start align-items-center user-name">
                                            <div class="avatar-wrapper">
                                                <div class="avatar avatar-sm me-3"><img src="http://127.0.0.1:2002/assets/img/10.png" alt="Avatar" class="rounded-circle"></div>
                                            </div>
                                            <div class="d-flex flex-column p-2" style="background: #f5f6f7">
                                                <a href="javascript:void(0)" class="text-body text-truncate">
                                                    <span class="fw-semibold">Jenna Devis <span>is live</span></span>
                                                </a>
                                                <small class="text-muted">Lorem ipsum dolor sit amet, consectetur
                                                    adipiscing elit. Proin ornare magna eros</small>
                                                <span style=" color: #5596e6;">Like</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-11">
                                <div class="d-flex gap-2">
                                    <img src="http://127.0.0.1:2002/assets/img/10.png" alt="Avatar" class="rounded-circle" width="40" height="40">
                                    <input type="text" class="form-control form-rounded">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
            <!-- END: Navbar-->


      <!-- Content wrapper -->
      <div class="content-wrapper">

        <!-- Content -->
                  <div class="container-xxl flex-grow-1 container-p-y">

                <script>
                    const dropZoneInitFunctions = [];
                </script>

    <div class="d-flex justify-content-between">
        <div>
            <h4 class="fw-bold py-3 mb-4">
                <span class="text-muted fw-light">Artist /</span> All Artist
            </h4>
        </div>
        <div class="">

            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createartistModal">Add Artist</button>


            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createmusicModal">Add Songs</button>


            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createvideoModal">Add Video
                Clips</button>

        </div>
    </div>

    <!-- Artist List Table -->
    <div class="card">
        <h5 class="card-header">Artist List</h5>
        <div class="table-responsive container pb-4 text-nowrap">
            <div class="row">
                <div class="col-md-6"></div>
                <div class="col-md-6">
                    <div class="row m-4">
                        <div class="col-md-6">
                            <label for="search">Search</label>
                            <input type="search" class="form-control" id="search" name="search">
                        </div>
                        <div class="col-md-6">
                            <label for="sort_by">Sort By</label>
                            <select name="sort_by" id="sort_by" class="form-control">
                                <option value="">Select Sort By</option>
                                <option value="songs">Most Songs</option>
                                <option value="videos">Most Videos</option>
                                <option value="likes">Most Likes</option>
                                <option value="followers">Most Followers</option>
                            </select>

                        </div>
                    </div>
                </div>
            </div>
            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer"><div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="DataTables_Table_0_length"><label>Show <select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" class="form-select form-select-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-12 col-md-6"><div id="DataTables_Table_0_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="DataTables_Table_0"></label></div></div></div><div class="row dt-row"><div class="col-sm-12"><table class="table artist-table dataTable no-footer" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" style="width: 1318px;">
                <thead>
                    <tr><th class="sorting_disabled sorting_asc" rowspan="1" colspan="1" aria-label="#" style="width: 55px;">#</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Artist: activate to sort column ascending" style="width: 241px;">Artist</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Total Songs: activate to sort column ascending" style="width: 216px;">Total Songs</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Total Video Clips: activate to sort column ascending" style="width: 285px;">Total Video Clips</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Like: activate to sort column ascending" style="width: 96px;">Like</th><th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Actions" style="width: 155px;">Actions</th></tr>
                </thead><tbody><tr class="odd"><td class="sorting_1">1</td><td><div class="d-flex justify-content-start align-items-center user-name">
                            <div class="avatar-wrapper">
                                <div class="avatar avatar-sm me-3">
                                    <img src="http://127.0.0.1:2002/storage/music/67df34d5b5524___men-avatar.png" alt="Test User" class="rounded-circle">
                                </div>
                            </div>
                            <div class="d-flex flex-column">
                                <a href="javascript:void(0)" class="text-body text-truncate">
                                    <span class="fw-semibold">Test User</span>
                                </a>
                                <small class="fw-semibold">male - N/A</small>
                            </div>
                        </div></td><td><a href="javascript:void(0)" class="text-black artistDetail" data-id="67dd6696a4710174ee04d494" data-section="songs" data-bs-toggle="modal" data-image="http://127.0.0.1:2002/storage/music/67df34d5b5524___men-avatar.png" data-name="Test User" data-gender="male" data-province="N/A" data-bs-target="#artistDetailModal">4</a></td><td><a href="javascript:void(0)" class="text-black artistDetail" data-id="67dd6696a4710174ee04d494" data-section="videos" data-bs-toggle="modal" data-name="Test User" data-image="http://127.0.0.1:2002/storage/music/67df34d5b5524___men-avatar.png" data-gender="male" data-province="N/A" data-bs-target="#artistDetailModal">5</a></td><td>0</td><td><div class="d-flex justify-content-start align-items-center">

    <!-- Edit -->
    <span data-bs-toggle="modal" data-bs-target="#editModal67dd6696a4710174ee04d494">
        <button class="btn" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" data-bs-original-title="Edit">
            <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path opacity="0.5" d="M4.76562 22.0449H20.7656" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path>
                <path d="M15.3952 2.96634L14.6537 3.70785L7.83668 10.5248C7.37495 10.9866 7.14409 11.2174 6.94554 11.472C6.71133 11.7723 6.51053 12.0972 6.3467 12.4409C6.20781 12.7324 6.10457 13.0421 5.89807 13.6616L5.02307 16.2866L4.80918 16.9282C4.70757 17.2331 4.78691 17.5692 5.01413 17.7964C5.24135 18.0236 5.57745 18.103 5.8823 18.0014L6.52396 17.7875L9.14897 16.9125L9.14902 16.9125C9.76846 16.706 10.0782 16.6027 10.3696 16.4638C10.7134 16.3 11.0383 16.0992 11.3386 15.865C11.5931 15.6665 11.824 15.4356 12.2857 14.9739L12.2857 14.9739L19.1027 8.15687L19.8442 7.41537C21.0728 6.1868 21.0728 4.19491 19.8442 2.96634C18.6156 1.73778 16.6237 1.73778 15.3952 2.96634Z" stroke="#1C274C" stroke-width="1.5"></path>
                <path opacity="0.5" d="M14.654 3.70801C14.654 3.70801 14.7467 5.2837 16.1371 6.67402C17.5274 8.06434 19.1031 8.15703 19.1031 8.15703M6.52433 17.7876L5.02344 16.2867" stroke="#1C274C" stroke-width="1.5"></path>
            </svg>
        </button>
    </span>


</div>

<div class="modal fade modal-6811e2b70a3fd" id="editModal67dd6696a4710174ee04d494" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">

                            <div class="modal-header">
                                            <div class=" w-100">

                            <h4>
                                                                    Edit Artist
                                                            </h4>
                        </div>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                        <div class="modal-body">
                <style>
    .edit-form .dropzone {
        display: flex;
        flex-wrap: wrap;
    }

    .edit-form .dropzone .dz-message {
        width: 100%;
    }
</style>


<form id="editForm67dd6696a4710174ee04d494" class="edit-form" method="post" action="http://127.0.0.1:2002/artist/67dd6696a4710174ee04d494" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="PXqkvSzrXblopu90lUJzrI4CSrSJUSRoY6qOEJ4v">    <input type="hidden" name="_method" value="PUT">    <div class="hidden-inputs">
        <input type="hidden" name="image" value="music/67df34d5b5524___men-avatar.png" data-path="music/67df34d5b5524___men-avatar.png">
    </div>
    <div class="row">
        <div class="col-lg-12 mx-auto">

            <div class="row g-3">

                <div class="col-md-6">
                    <label class="form-label" for="fullname">Gender</label>
                    <select name="gender" class="form-select">
                        <option>Select Gender</option>
                                                    <option value="male" selected="">Male</option>
                            <option value="female">Female</option>
                                            </select>
                </div>

                <div class="col-md-6">
                    <label class="form-label" for="fullname">Province</label>
                    <select name="province" class="form-control province_id" id="province_id" data-url="http://127.0.0.1:2002/get/city" value="" data-selected="">
                        <option value="">Select province</option>
                                            </select>
                </div>

                <div class="col-md-12">
                    <label class="form-label" for="fullname">Artist Name - Lastname</label>
                    <input type="text" id="fullname" class="form-control" placeholder="lorem" name="name" value="Test User">
                </div>

                <div class="col-12">
                    <div class="card">
                        <h5 class="card-header">Image</h5>
                        <div class="card-body">
                            <div class="dropzone needsclick dz-clickable" action="/" id="dropzone-img67dd6696a4710174ee04d494" data-initialized="true">
                                <div class="dz-message needsclick">
                                    Drop files here or click to upload
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <label class="form-label" for="status">Status</label>
                    <select class="form-select" name="status">
                        <option selected="" value="">Select</option>
                        <option value="1" selected="">Publish</option>
                        <option value="0">UnPublish</option>

                    </select>

                </div>
            </div>
        </div>
    </div>
</form>

<script>
    'use strict';

    function initializeDropzones() {
        if (window.dropzonesInitialized) return; // Prevent multiple initializations
        window.dropzonesInitialized = true;

        document.querySelectorAll(".dropzone").forEach((dropzoneElement) => {
            if (dropzoneElement.dataset.initialized) return; // Prevent duplicate initialization

            dropzoneElement.dataset.initialized = true; // Mark as initialized

            const dropzoneInstance = new Dropzone(dropzoneElement, {
                url: 'http://127.0.0.1:2002/file/upload',
                previewTemplate: `<div class="row">
                    <div class="col-md-12 col-12 d-flex justify-content-center">
                        <div class="dz-preview dz-file-preview w-100">
                            <div class="dz-details">
                                <div class="dz-thumbnail" style="width:95%">
                                    <img data-dz-thumbnail >
                                    <span class="dz-nopreview">No preview</span>
                                    <div class="dz-success-mark"></div>
                                    <div class="dz-error-mark"></div>
                                    <div class="dz-error-message"><span data-dz-errormessage></span></div>
                                </div>
                                <div class="dz-filename" data-dz-name></div>
                                <div class="dz-size" data-dz-size></div>
                            </div>
                        </div>
                    </div>
                </div>`,
                parallelUploads: 1,
                maxFilesize: 100,
                addRemoveLinks: true,
                headers: {
                    'X-CSRF-TOKEN': 'PXqkvSzrXblopu90lUJzrI4CSrSJUSRoY6qOEJ4v'
                },
                acceptedFiles: 'image/*',
                maxFiles: 1,
                sending: function(file, xhr, formData) {
                    formData.append('folder', 'music');
                },
                success: function(file, response) {
                    file.previewElement.classList.add("dz-success");
                    file.previewElement.dataset.path = response.path;
                    const hiddenInputsContainer = dropzoneElement.closest('.dropzone-container')
                        .querySelector('.hidden-inputs');
                    hiddenInputsContainer.innerHTML +=
                        `<input type="hidden" name="image" value="${response.path}" data-path="${response.path}">`;
                },
                removedfile: function(file) {
                    const hiddenInputsContainer = dropzoneElement.closest('.dropzone-container')
                        .querySelector('.hidden-inputs');
                    hiddenInputsContainer.querySelector(
                        `input[data-path="${file.previewElement.dataset.path}"]`).remove();

                    file.previewElement.parentNode.removeChild(file.previewElement);

                    $.ajax({
                        url: 'http://127.0.0.1:2002/artists/67dd6696a4710174ee04d494/image',
                        method: 'delete',
                        headers: {
                            'X-CSRF-TOKEN': 'PXqkvSzrXblopu90lUJzrI4CSrSJUSRoY6qOEJ4v'
                        },
                        data: {
                            path: file.previewElement.dataset.path
                        },
                        success: function() {}
                    });

                    return this._updateMaxFilesReachedClass();
                }

            });
        });
    }
    initializeDropzones();
    // Attach event listener to the button
    // document.getElementById("initDropzones").addEventListener("click", initializeDropzones);
</script>
<script>
    async function imageUrlToFile(imageUrl, fileName) {
        // Fetch the image
        const response = await fetch(imageUrl);
        const blob = await response.blob();

        // Create a File object
        const file = new File([blob], fileName[1], {
            type: blob.type
        });

        return file;
    }
</script>
            </div>
                            <div class="modal-footer">
                                            <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" form="editForm67dd6696a4710174ee04d494" class="btn btn-primary" onclick="">Update</button>
                                                            </div>
                    </div>
    </div>
</div>


</td></tr><tr class="even"><td class="sorting_1">2</td><td><div class="d-flex justify-content-start align-items-center user-name">
                            <div class="avatar-wrapper">
                                <div class="avatar avatar-sm me-3">
                                    <img src="http://127.0.0.1:2002/storage/music/67ded76c5516c___women-avatar.png" alt="asd asd" class="rounded-circle">
                                </div>
                            </div>
                            <div class="d-flex flex-column">
                                <a href="javascript:void(0)" class="text-body text-truncate">
                                    <span class="fw-semibold">asd asd</span>
                                </a>
                                <small class="fw-semibold">female - N/A</small>
                            </div>
                        </div></td><td><a href="javascript:void(0)" class="text-black artistDetail" data-id="67ded4a75b63cc18f807f0ef" data-section="songs" data-bs-toggle="modal" data-image="http://127.0.0.1:2002/storage/music/67ded76c5516c___women-avatar.png" data-name="asd asd" data-gender="female" data-province="N/A" data-bs-target="#artistDetailModal">0</a></td><td><a href="javascript:void(0)" class="text-black artistDetail" data-id="67ded4a75b63cc18f807f0ef" data-section="videos" data-bs-toggle="modal" data-name="asd asd" data-image="http://127.0.0.1:2002/storage/music/67ded76c5516c___women-avatar.png" data-gender="female" data-province="N/A" data-bs-target="#artistDetailModal">5</a></td><td>0</td><td><div class="d-flex justify-content-start align-items-center">

    <!-- Edit -->
    <span data-bs-toggle="modal" data-bs-target="#editModal67ded4a75b63cc18f807f0ef">
        <button class="btn" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" data-bs-original-title="Edit">
            <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path opacity="0.5" d="M4.76562 22.0449H20.7656" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path>
                <path d="M15.3952 2.96634L14.6537 3.70785L7.83668 10.5248C7.37495 10.9866 7.14409 11.2174 6.94554 11.472C6.71133 11.7723 6.51053 12.0972 6.3467 12.4409C6.20781 12.7324 6.10457 13.0421 5.89807 13.6616L5.02307 16.2866L4.80918 16.9282C4.70757 17.2331 4.78691 17.5692 5.01413 17.7964C5.24135 18.0236 5.57745 18.103 5.8823 18.0014L6.52396 17.7875L9.14897 16.9125L9.14902 16.9125C9.76846 16.706 10.0782 16.6027 10.3696 16.4638C10.7134 16.3 11.0383 16.0992 11.3386 15.865C11.5931 15.6665 11.824 15.4356 12.2857 14.9739L12.2857 14.9739L19.1027 8.15687L19.8442 7.41537C21.0728 6.1868 21.0728 4.19491 19.8442 2.96634C18.6156 1.73778 16.6237 1.73778 15.3952 2.96634Z" stroke="#1C274C" stroke-width="1.5"></path>
                <path opacity="0.5" d="M14.654 3.70801C14.654 3.70801 14.7467 5.2837 16.1371 6.67402C17.5274 8.06434 19.1031 8.15703 19.1031 8.15703M6.52433 17.7876L5.02344 16.2867" stroke="#1C274C" stroke-width="1.5"></path>
            </svg>
        </button>
    </span>


</div>

<div class="modal fade modal-6811e2b70a637" id="editModal67ded4a75b63cc18f807f0ef" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">

                            <div class="modal-header">
                                            <div class=" w-100">

                            <h4>
                                                                    Edit Artist
                                                            </h4>
                        </div>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                        <div class="modal-body">
                <style>
    .edit-form .dropzone {
        display: flex;
        flex-wrap: wrap;
    }

    .edit-form .dropzone .dz-message {
        width: 100%;
    }
</style>


<form id="editForm67ded4a75b63cc18f807f0ef" class="edit-form" method="post" action="http://127.0.0.1:2002/artist/67ded4a75b63cc18f807f0ef" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="PXqkvSzrXblopu90lUJzrI4CSrSJUSRoY6qOEJ4v">    <input type="hidden" name="_method" value="PUT">    <div class="hidden-inputs">
        <input type="hidden" name="image" value="music/67ded76c5516c___women-avatar.png" data-path="music/67ded76c5516c___women-avatar.png">
    </div>
    <div class="row">
        <div class="col-lg-12 mx-auto">

            <div class="row g-3">

                <div class="col-md-6">
                    <label class="form-label" for="fullname">Gender</label>
                    <select name="gender" class="form-select">
                        <option>Select Gender</option>
                                                    <option value="female" selected="">Female</option>
                            <option value="male">Male</option>
                                            </select>
                </div>

                <div class="col-md-6">
                    <label class="form-label" for="fullname">Province</label>
                    <select name="province" class="form-control province_id" id="province_id" data-url="http://127.0.0.1:2002/get/city" value="" data-selected="">
                        <option value="">Select province</option>
                                            </select>
                </div>

                <div class="col-md-12">
                    <label class="form-label" for="fullname">Artist Name - Lastname</label>
                    <input type="text" id="fullname" class="form-control" placeholder="lorem" name="name" value="asd asd">
                </div>

                <div class="col-12">
                    <div class="card">
                        <h5 class="card-header">Image</h5>
                        <div class="card-body">
                            <div class="dropzone needsclick dz-clickable" action="/" id="dropzone-img67ded4a75b63cc18f807f0ef" data-initialized="true">
                                <div class="dz-message needsclick">
                                    Drop files here or click to upload
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <label class="form-label" for="status">Status</label>
                    <select class="form-select" name="status">
                        <option selected="" value="">Select</option>
                        <option value="1">Publish</option>
                        <option value="0" selected="">UnPublish</option>

                    </select>

                </div>
            </div>
        </div>
    </div>
</form>

<script>
    'use strict';

    function initializeDropzones() {
        if (window.dropzonesInitialized) return; // Prevent multiple initializations
        window.dropzonesInitialized = true;

        document.querySelectorAll(".dropzone").forEach((dropzoneElement) => {
            if (dropzoneElement.dataset.initialized) return; // Prevent duplicate initialization

            dropzoneElement.dataset.initialized = true; // Mark as initialized

            const dropzoneInstance = new Dropzone(dropzoneElement, {
                url: 'http://127.0.0.1:2002/file/upload',
                previewTemplate: `<div class="row">
                    <div class="col-md-12 col-12 d-flex justify-content-center">
                        <div class="dz-preview dz-file-preview w-100">
                            <div class="dz-details">
                                <div class="dz-thumbnail" style="width:95%">
                                    <img data-dz-thumbnail >
                                    <span class="dz-nopreview">No preview</span>
                                    <div class="dz-success-mark"></div>
                                    <div class="dz-error-mark"></div>
                                    <div class="dz-error-message"><span data-dz-errormessage></span></div>
                                </div>
                                <div class="dz-filename" data-dz-name></div>
                                <div class="dz-size" data-dz-size></div>
                            </div>
                        </div>
                    </div>
                </div>`,
                parallelUploads: 1,
                maxFilesize: 100,
                addRemoveLinks: true,
                headers: {
                    'X-CSRF-TOKEN': 'PXqkvSzrXblopu90lUJzrI4CSrSJUSRoY6qOEJ4v'
                },
                acceptedFiles: 'image/*',
                maxFiles: 1,
                sending: function(file, xhr, formData) {
                    formData.append('folder', 'music');
                },
                success: function(file, response) {
                    file.previewElement.classList.add("dz-success");
                    file.previewElement.dataset.path = response.path;
                    const hiddenInputsContainer = dropzoneElement.closest('.dropzone-container')
                        .querySelector('.hidden-inputs');
                    hiddenInputsContainer.innerHTML +=
                        `<input type="hidden" name="image" value="${response.path}" data-path="${response.path}">`;
                },
                removedfile: function(file) {
                    const hiddenInputsContainer = dropzoneElement.closest('.dropzone-container')
                        .querySelector('.hidden-inputs');
                    hiddenInputsContainer.querySelector(
                        `input[data-path="${file.previewElement.dataset.path}"]`).remove();

                    file.previewElement.parentNode.removeChild(file.previewElement);

                    $.ajax({
                        url: 'http://127.0.0.1:2002/artists/67ded4a75b63cc18f807f0ef/image',
                        method: 'delete',
                        headers: {
                            'X-CSRF-TOKEN': 'PXqkvSzrXblopu90lUJzrI4CSrSJUSRoY6qOEJ4v'
                        },
                        data: {
                            path: file.previewElement.dataset.path
                        },
                        success: function() {}
                    });

                    return this._updateMaxFilesReachedClass();
                }

            });
        });
    }
    initializeDropzones();
    // Attach event listener to the button
    // document.getElementById("initDropzones").addEventListener("click", initializeDropzones);
</script>
<script>
    async function imageUrlToFile(imageUrl, fileName) {
        // Fetch the image
        const response = await fetch(imageUrl);
        const blob = await response.blob();

        // Create a File object
        const file = new File([blob], fileName[1], {
            type: blob.type
        });

        return file;
    }
</script>
            </div>
                            <div class="modal-footer">
                                            <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" form="editForm67ded4a75b63cc18f807f0ef" class="btn btn-primary" onclick="">Update</button>
                                                            </div>
                    </div>
    </div>
</div>


</td></tr></tbody>
            </table></div></div><div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Showing 1 to 2 of 2 entries</div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="DataTables_Table_0_previous"><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="previous" tabindex="0" class="page-link">Previous</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="0" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item next disabled" id="DataTables_Table_0_next"><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="next" tabindex="0" class="page-link">Next</a></li></ul></div></div></div></div>
        </div>
    </div>

    <script>
        // function delete_service(el) {
        //     let link = $(el).data('id');
        //     $('.deleted-modal').modal('show');
        //     $('#delete_form').attr('action', link);
        // }
    </script>

    <div class="modal fade modal-6811e2b364b3d" id="createartistModal" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">

                            <div class="modal-header">
                                            <div class=" w-100">

                            <h4>
                                                                    Create Artist
                                                            </h4>
                        </div>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                        <div class="modal-body">
                <form id="createartistForm" method="POST" action="http://127.0.0.1:2002/artist" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="PXqkvSzrXblopu90lUJzrI4CSrSJUSRoY6qOEJ4v">    <div class="hidden-inputs"></div>
    <div class="row">
        <div class="col-lg-12 mx-auto">
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label" for="fullname">Gender</label>
                    <select name="gender" class="form-select">
                        <option selected="">Select Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="fullname">Province</label>
                    <select name="province" class="form-control province_id" id="province_id" data-url="http://127.0.0.1:2002/get/city" value="">
                        <option value="">Select province</option>
                                            </select>
                </div>
                <div class="col-md-12">
                    <label class="form-label" for="fullname">Artist Name - Lastname</label>
                    <input type="text" id="fullname" class="form-control" placeholder="lorem" name="name">
                </div>





                <div class="col-12">
                    <div class="card">
                        <h5 class="card-header">Image</h5>
                        <div class="card-body">
                            <div class="dropzone needsclick dz-clickable" action="/" id="dropzone-artist-img" data-initialized="true">
                                <div class="dz-message needsclick">
                                    Drop files here or click to upload
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <label class="form-label" for="status">Status</label>
                    <select class="form-select" name="status">
                        <option selected="" value="">Select</option>
                        <option value="1">Publish</option>
                        <option value="0">UnPublish</option>

                    </select>

                </div>
            </div>
        </div>
    </div>
</form>
            </div>
                            <div class="modal-footer">
                                            <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" form="createartistForm" class="btn btn-primary" onclick="">Create</button>
                                                            </div>
                    </div>
    </div>
</div>



    <div class="modal fade modal-6811e2b36523d" id="createmusicModal" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">

                            <div class="modal-header">
                                            <div class=" w-100">

                            <h4>
                                                                    Create Song
                                                            </h4>
                        </div>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                        <div class="modal-body">
                <form id="createmusicForm" method="POST" action="http://127.0.0.1:2002/musics/store_song" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="PXqkvSzrXblopu90lUJzrI4CSrSJUSRoY6qOEJ4v">    <div class="hidden-inputs"></div>
    <div class="row">
        <div class="col-lg-12 mx-auto">
            <div class="row g-3">


                <div class="col-md-6">
                    <label class="form-label" for="fullname">Choose Artist</label>
                    <select class="form-select" aria-label="Default select example" name="artist_id">
                        <option selected="">Select</option>
                                                                                    <option value="67dd6696a4710174ee04d494">Test User
                                </option>
                                                            <option value="67ded4a75b63cc18f807f0ef">asd asd
                                </option>
                                                                        </select>
                                    </div>
                <div class="col-md-6">
                    <label class="form-label" for="music_type">Music Type</label>
                    <select class="form-select" name="music_type" id="music_type">
                            <option value="" selected="">Select Music Type</option>
                            <option value="new-upload">New Upload</option>
                            <option value="new-song">New Song</option>
                    </select>
                                    </div>
                <div id="song-upload" style="display: none">
                    <div class="col-12">
                        <div class="card">
                            <h5 class="card-header">Song Upload</h5>
                            <div class="card-body">
                                <div class="dropzone needsclick dz-clickable" action="/" id="dropzone-song">
                                    <div class="dz-message needsclick">
                                        Drop files here or click to upload
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mt-4">
                        <label class="form-label" for="status">Status</label>
                        <select class="form-select" aria-label="Default select example" id="status" name="status">
                            <option selected="" value="">Select</option>
                            <option value="0">UnPublish</option>
                            <option value="1">Publish</option>

                        </select>
                                            </div>
                </div>
            </div>
        </div>
    </div>
</form>
            </div>
                            <div class="modal-footer">
                                            <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" form="createmusicForm" class="btn btn-primary" onclick="">Create</button>
                                                            </div>
                    </div>
    </div>
</div>



    <div class="modal fade modal-6811e2b3655fb" id="createvideoModal" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">

                            <div class="modal-header">
                                            <div class=" w-100">

                            <h4>
                                                                    Create Video Clips
                                                            </h4>
                        </div>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                        <div class="modal-body">
                <form id="createvideoForm" method="POST" action="http://127.0.0.1:2002/video-clips" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="PXqkvSzrXblopu90lUJzrI4CSrSJUSRoY6qOEJ4v">    <div class="hidden-inputs"></div>
    <div class="row">
        <div class="col-lg-12 mx-auto">
            <div class="row g-3">



                <div class="col-md-12">
                    <label class="form-label" for="fullname">Select Artist</label>
                    <select class="form-select" aria-label="Default select example" name="artist_id">
                        <option selected="" value="">Select</option>
                                                <option value="67dd6696a4710174ee04d494">Test User </option>
                                                <option value="67ded4a75b63cc18f807f0ef">asd asd </option>
                                            </select>
                                    </div>

               <div class="col-12">
                  <div class="card">
                    <h5 class="card-header">Video Clip Upload</h5>
                    <div class="card-body">
                        <div class="dropzone needsclick dz-clickable" action="/" id="dropzone-video">
                            <div class="dz-message needsclick">
                                Drop files here or click to upload
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <label class="form-label" for="fullname">Status</label>
                <select class="form-select" aria-label="Default select example" name="status">
                    <option selected="" value="1">Select</option>
                    <option value="0">UnPublish</option>
                    <option value="1">Publish</option>

                </select>
                            </div>
        </div>
    </div>
    </div>
</form>
            </div>
                            <div class="modal-footer">
                                            <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" form="createvideoForm" class="btn btn-primary" onclick="">Create</button>
                                                            </div>
                    </div>
    </div>
</div>


    <div class="modal fade modal-6811e2b36578a" id="musicCategoryModal" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">

                            <div class="modal-header">
                                            <div class=" w-100">

                            <h4>
                                                                    Move the Songs
                                                            </h4>
                        </div>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                        <div class="modal-body">
                <form id="musicCategoryForm" method="POST" action="http://127.0.0.1:2002/change-music-category" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="PXqkvSzrXblopu90lUJzrI4CSrSJUSRoY6qOEJ4v">    <div class="row">
        <div class="col-lg-12 mx-auto">
            <div class="row g-3">
                <input type="hidden" name="music_id" id="music_id">
                <div class="col-md-12">
                    <label class="form-label" for="fullname">Select Category</label>
                    <select class="form-select" aria-label="Default select example" name="category_id">
                        <option selected="" value="">Select Category</option>
                                            </select>
                                    </div>
            </div>
        </div>
    </div>
</form>
            </div>
                            <div class="modal-footer">
                                            <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" form="musicCategoryForm" class="btn btn-primary" onclick="">Save</button>
                                                            </div>
                    </div>
    </div>
</div>


    <div class="modal fade modal-6811e2b36585f" id="artistDetailModal" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">

                            <div class="modal-header">
                    <div class="d-flex w-100">
                        <div>
                            <img src="" id="artistImage" alt="" style="width: 50px;height: 50px;border-radius: 49px;margin: 0 10px;">
                        </div>
                        <div>
                            <h4 class="m-0"><span id="artistName"></span></h4>
                            <p class="m-0"><i><span id="artistGender"></span> - <span id="artistProvince"></span></i></p>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                        <div class="modal-body">
                <div class="nav-align-top mb-4">
            <ul class="nav nav-tabs nav-fill" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="songs-tab" data-toggle="tab" href="#songs" role="tab" aria-controls="songs" aria-selected="true">
                        Total Songs &nbsp;<span id="total_songs">0</span>
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="videos-tab" data-toggle="tab" href="#videos" role="tab" aria-controls="videos" aria-selected="false">
                        Total Video Clips &nbsp;<span id="total_videos">0</span>
                    </a>
                </li>
            </ul>
            <div class="tab-content p-0">
                <div class="tab-pane fade show active" id="songs" role="tabpanel" aria-labelledby="songs-tab">
                    <div class="table-responsive text-nowrap pd-t-24px">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Song ID</th>
                                    <th>Song Title</th>
                                    <th>Tracks</th>
                                    <th>Total Listen</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tbody id="songs-tbody" class="table-border-bottom-0">
                                <tr>
                                    <td class="text-center" colspan="8"><b>No Data found.</b></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="videos" role="tabpanel" aria-labelledby="videos-tab">
                    <div class="row container pb-4" id="videos-tbody">

                    </div>
                </div>
            </div>
        </div>
            </div>
                            <div class="modal-footer">
                                            <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="button" form="" class="btn btn-primary" onclick="">Save changes</button>
                                                            </div>
                    </div>
    </div>
</div>



            <!-- pricingModal -->
                        <!--/ pricingModal -->

          </div>
          <!-- / Content -->


          <div class="content-backdrop fade"></div>
        </div>
        <!--/ Content wrapper -->
      </div>
      <!-- / Layout page -->
    </div>

        <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
        <!-- Drag Target Area To SlideIn Menu On Small Screens -->
    <div class="drag-target" style="touch-action: pan-y; user-select: none; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></div>
  </div>
  <!-- / Layout wrapper -->
      <!--/ Layout Content -->



    <!-- Include Scripts -->
    <!-- BEGIN: Vendor JS-->
<script src="http://127.0.0.1:2002/assets/vendor/libs/jquery/jquery.js?id=be95af1b7fa35aa4b1dec268626264d2"></script>
<script src="http://127.0.0.1:2002/assets/vendor/libs/popper/popper.js?id=62b540407346f16042446be395a1de9b"></script>
<script src="http://127.0.0.1:2002/assets/vendor/js/bootstrap.js?id=78abe8c016e9085012911d16f3c2d410"></script>
<script
    src="http://127.0.0.1:2002/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js?id=91a15b5a6abe136b3a259607c4985984">
</script>
<script src="http://127.0.0.1:2002/assets/vendor/libs/hammer/hammer.js?id=58f8e2d88db3256252e130eb0bf65102"></script>
<script src="http://127.0.0.1:2002/assets/vendor/libs/i18n/i18n.js?id=d84587ac552cc6b5c83ae3c49f1e543c"></script>
<script src="http://127.0.0.1:2002/assets/vendor/libs/typeahead-js/typeahead.js?id=70e819040bc904810817c06de6a77130">
</script>
<script src="http://127.0.0.1:2002/assets/vendor/js/menu.js?id=9a70d8747378d2e5603b6b09560c5b74"></script>
<script src="http://127.0.0.1:2002/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
    <script src="http://127.0.0.1:2002/assets/vendor/libs/flatpickr/flatpickr.js"></script>
    <script src="http://127.0.0.1:2002/assets/vendor/libs/select2/select2.js"></script>
    <script src="http://127.0.0.1:2002/assets/vendor/libs/tagify/tagify.js"></script>
    <script src="http://127.0.0.1:2002/assets/vendor/libs/sweetalert2/sweetalert2.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="http://127.0.0.1:2002/assets/vendor/libs/toastr/toastr.js?id=721bf49c50441c757c2edf0cfae6b542"></script>
<!-- END: Page Vendor JS-->
<!-- BEGIN: Theme JS-->
<script src="http://127.0.0.1:2002/assets/js/main-typeahead.js"></script>
<script src="http://127.0.0.1:2002/assets/js/main.js?id=ef69c07373e4b8fc24d19104a28ccaf8"></script>
<script src="http://127.0.0.1:2002/assets/js/utils.js"></script>

<!-- END: Theme JS-->
<!-- Pricing Modal JS-->
<!-- END: Pricing Modal JS-->
<!-- BEGIN: Page JS-->

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.min.js"></script>

<!-- Form Validation -->
<script src="http://127.0.0.1:2002/assets/vendor/libs/@form-validation/popular.js"></script>
<script src="http://127.0.0.1:2002/assets/vendor/libs/@form-validation/bootstrap5.js"></script>
<script src="http://127.0.0.1:2002/assets/vendor/libs/@form-validation/auto-focus.js"></script>
<script>
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>
    <script>
        function confirmAction(event, callback) {
            event.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "Are you sure you want to delete this?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                customClass: {
                    confirmButton: 'btn btn-danger me-3',
                    cancelButton: 'btn btn-label-secondary'
                },
                buttonsStyling: false
            }).then(function(result) {
                if (result.value) {
                    callback();
                }
            });
        }

        $(document).ready(function() {
            $('table').on('click', '.delete-btn', function(event) {
                event.preventDefault(); // Stop any default action
                let form = $(this).closest('.delete-form'); // Get the closest form

                Swal.fire({
                    title: 'Are you sure?',
                    text: "Are you sure you want to delete this?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'No, cancel!',
                    customClass: {
                        confirmButton: 'btn btn-danger me-3',
                        cancelButton: 'btn btn-label-secondary'
                    },
                    buttonsStyling: false
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit(); // Submit the form after confirmation
                    }
                });
            });
        });
    </script>

    <script>
        $('.province_id').change(function() {
            let url = $(this).data('url');
            let id = $(this).val();
            const self = this;

            $.ajax({
                type: 'get',
                url: url + '/' + id,
                success: function(response) {
                    const cityIdEl = $(self).closest('form').find('.city_id');
                    cityIdEl.html('');
                    $.each(response, function(index, value) {
                        console.log(index, value);
                        cityIdEl.append('<option value="' + value.id + '">' + value.name +
                            '</option>')
                    })
                }
            })

        });

        $(document).ready(function() {
            $('.edit-form .province_id').each(function(index, provinceEl) {
                let url = $(provinceEl).data('url');
                let id = $(provinceEl).val();
                let selected = $(provinceEl).data('selected');

                $.ajax({
                    type: 'get',
                    url: url + '/' + id,
                    success: function(response) {
                        const cityIdEl = $(provinceEl).closest('form').find('.city_id');
                        cityIdEl.html('');
                        $.each(response, function(index, value) {
                            cityIdEl.append('<option value="' + value.id + '" ' + (value
                                    .id == selected ? 'selected' : '') + '>' + value
                                .name + '</option>')
                        })
                    }
                })

            });
        });
    </script>

    <script>
        'use strict';

        function initializeDropzone(dropzoneId, hiddenInputName, folder, acceptedFiles, limit = 1) {
            const previewTemplate = `<div class="row"><div class="col-md-12 d-flex justify-content-center"><div class="dz-preview dz-file-preview w-100">
                                    <div class="dz-details">
                                      <div class="dz-thumbnail" style="width:95%">
                                        <img data-dz-thumbnail >
                                        <span class="dz-nopreview">No preview</span>
                                        <div class="dz-success-mark"></div>
                                        <div class="dz-error-mark"></div>
                                        <div class="dz-error-message"><span data-dz-errormessage></span></div>
                                        <div class="progress">
                                          <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuemin="0" aria-valuemax="100" data-dz-uploadprogress></div>
                                        </div>
                                      </div>
                                      <div class="dz-filename" data-dz-name></div>
                                      <div class="dz-size" data-dz-size></div>
                                    </div>
                                    </div></div></div>`;
            let dropzoneKey = 0;
            return new Dropzone(dropzoneId, {
                url: 'http://127.0.0.1:2002/file/upload',
                previewTemplate: previewTemplate,
                parallelUploads: 1,
                maxFilesize: 100,
                addRemoveLinks: true,
                headers: {
                    'X-CSRF-TOKEN': 'PXqkvSzrXblopu90lUJzrI4CSrSJUSRoY6qOEJ4v'
                },
                acceptedFiles: acceptedFiles, // Accept specified file types
                maxFiles: limit, // Allow only one file to be selected
                sending: function(file, xhr, formData) {
                    formData.append('folder', folder);
                },
                success: function(file, response) {
                    if (file.previewElement) {
                        file.previewElement.classList.add("dz-success");
                    }
                    file.previewElement.dataset.path = response.path;
                    const hiddenInputsContainer = file.previewElement.closest('form').querySelector(
                        '.hidden-inputs');
                    hiddenInputsContainer.innerHTML +=
                        `<input type="hidden" name="${hiddenInputName}" value="${response.path}" data-path="${response.path}">`;
                    let fileInputName = hiddenInputName.replace(/\w+\[\]/g, function(match) {
                        return match.slice(0, -2);
                    });
                    if (limit == 1) {

                        hiddenInputsContainer.innerHTML +=
                            `<input type="hidden" name="${fileInputName}_file_name" value="${$('.dz-filename').eq(dropzoneKey).text()}">`;
                        hiddenInputsContainer.innerHTML +=
                            `<input type="hidden" name="${fileInputName}_file_length" value="${response.duration}">`;
                        hiddenInputsContainer.innerHTML +=
                            `<input type="hidden" name="${fileInputName}_file_size" value="${response.size}">`;
                    } else {
                        hiddenInputsContainer.innerHTML +=
                            `<input type="hidden" name="${fileInputName}_file_name[]" value="${$('.dz-filename').eq(dropzoneKey).text()}">`;
                        hiddenInputsContainer.innerHTML +=
                            `<input type="hidden" name="${fileInputName}_file_length[]" value="${response.duration}">`;
                        hiddenInputsContainer.innerHTML +=
                            `<input type="hidden" name="${fileInputName}_file_size[]" value="${response.size}">`;
                        dropzoneKey++;
                    }

                },
                removedfile: function(file) {
                    const hiddenInputsContainer = file.previewElement.closest('form').querySelector(
                        '.hidden-inputs');
                    hiddenInputsContainer.querySelector(
                        `input[data-path="${file.previewElement.dataset.path}"]`).remove();

                    if (file.previewElement != null && file.previewElement.parentNode != null) {
                        file.previewElement.parentNode.removeChild(file.previewElement);
                    }

                    $.ajax({
                        url: 'http://127.0.0.1:2002/file/delete',
                        method: 'delete',
                        headers: {
                            'X-CSRF-TOKEN': 'PXqkvSzrXblopu90lUJzrI4CSrSJUSRoY6qOEJ4v'
                        },
                        data: {
                            path: file.previewElement.dataset.path
                        },
                        success: function() {
                            dropzoneKey--;
                        }
                    });

                    return this._updateMaxFilesReachedClass();
                }
            });
        }

        // Initialize multiple Dropzones
        document.addEventListener('DOMContentLoaded', function() {
            initializeDropzone('#dropzone-artist-img', 'image', 'images', 'image/*');
            initializeDropzone('#dropzone-video', 'video', 'videos', 'video/*');
            initializeDropzone('#dropzone-song', 'songs[]', 'audios', 'audio/*', 100);
            initializeDropzone('#dropzone-audio', 'audio', 'audios', 'audio/*');

        });
    </script>

    <script>
        function drpzone_init() {
            dropZoneInitFunctions.forEach(callback => callback());
        }
    </script>
    <script src="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone-min.js" onload="drpzone_init()"></script>

    <script>
        $(document).ready(function() {
            $('table').on('click', '.artistDetail', function() {
                let id = $(this).attr('data-id');
                let artistName = $(this).attr('data-name');
                let artistImage = $(this).attr('data-image');
                let artistGender = $(this).attr('data-gender');
                let artistProvince = $(this).attr('data-province');
                let totalSongs = 0;
                let totalSongsMbs = 0;
                let totalVideos = 0;
                let totalVideosMbs = 0;
                let section = $(this).attr('data-section');

                $('#artistName').text(artistName);
                $('#artistImage').text(artistImage);
                $('#artistGender').text(artistGender);
                $('#artistProvince').text(artistProvince);
                $('#artistImage').attr('src', artistImage);
                $.ajax({
                    url: 'http://127.0.0.1:2002/get-artist-detail',
                    method: 'get',
                    data: {
                        id: id,
                        section: section
                    },
                    success: function(response) {
                        // Log the response to see the structure


                        // Clear existing data
                        $('#songs-tbody').empty();
                        $('#videos-tbody').empty();

                        // Update Songs Tab
                        if (response.songs && response.songs.length > 0) {
                            response.songs.forEach(song => {
                                totalSongsMbs += parseFloat(song.file_size);
                                const deleteUrl =
                                    'http://127.0.0.1:2002/musics/delete_song/' + song
                                    ._id;
                                $('#songs-tbody').append(`
                                    <tr>
                                        <td>${song.custom_id || song._id}</td>
                                        <td><p class="m-0">${song.name}</p>
                                            <small><i>${song.file_size >= 1024 ? (song.file_size/1024)+'GB' : song.file_size+'MB'}&nbsp; - ${song.length} - &nbsp;${formatDate(song.created_at)}</i></small>
                                        </td>
                                        <td><audio src="http://127.0.0.1:2002/storage/${song.audio}" controls></audio></td>
                                        <td>${song.total_listen || 'N/A'}</td>
                                        <td>
                                            <div class="d-flex justify-content-start align-items-center">
                                                <!-- Delete -->
                                                <form action="${deleteUrl}" onsubmit="confirmAction(event, () => event.target.submit())" method="post" class="d-inline">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="PXqkvSzrXblopu90lUJzrI4CSrSJUSRoY6qOEJ4v">
                                                    <button type="submit" class="btn btn-sm btn-icon" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" data-bs-original-title="Remove">
                                                        <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path opacity="0.5" d="M9.84961 4.04492C10.2614 2.87973 11.3727 2.04492 12.6789 2.04492C13.9851 2.04492 15.0964 2.87973 15.5082 4.04492" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path>
                                                            <path d="M21.1798 6.04492H4.17969" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path>
                                                            <path d="M19.5124 8.54492L19.0524 15.444C18.8754 18.0989 18.7869 19.4264 17.9219 20.2357C17.0569 21.0449 15.7265 21.0449 13.0657 21.0449H12.2924C9.63155 21.0449 8.30115 21.0449 7.43614 20.2357C6.57113 19.4264 6.48264 18.0989 6.30564 15.444L5.8457 8.54492" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path>
                                                            <path opacity="0.5" d="M10.1797 11.0449L10.6797 16.0449" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path>
                                                            <path opacity="0.5" d="M15.1797 11.0449L14.6797 16.0449" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path>
                                                        </svg>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                `);
                            });

                            totalSongs = response.songs.length;
                            totalSongsMbs = (totalSongsMbs >= 1024 ? (totalSongsMbs / 1024)
                                .toFixed(1) + 'GB' : totalSongsMbs.toFixed(1) + 'MB');
                            $('#total_songs').html(`<i>${totalSongs} / ${totalSongsMbs}</i>`);

                        } else {
                            $('#songs-tbody').append(
                                '<tr><td class="text-center" colspan="8"><b>No Data found.</b></td></tr>'
                            );
                        }

                        // Update Videos Tab
                        if (response.clips && response.clips.length > 0) {
                            response.clips.forEach(video => {
                                totalVideosMbs += parseFloat(video.video_file_size);
                                const deleteVideoUrl =
                                    'http://127.0.0.1:2002/video-clips/' + video._id;

                                $('#videos-tbody').append(`
                                    <div class="col-md-4">
                                            <div id="feed-post-1" class="card is-post mt-4 pl-4 pr-4">
                                                <!-- Main wrap -->
                                                <div class="content-wrap">
                                                    <!-- Post header -->
                                                    <div class="card-heading d-flex p-3">
                                                        <!-- User meta -->
                                                        <div class="user-block">
                                                            <div class="user-info">
                                                                <span class="d-flex"><img src="${artistImage}" width="34px" height="34px"><a href="javascript:void(0)" style="line-height:2;">${artistName}</a></span>
                                                                <small class="time"><i>${video.video_file_size >= 1024 ? (video.video_file_size/1024)+'GB' : video.video_file_size+'MB'}&nbsp; - ${video.video_file_length} - &nbsp;${formatDate(video.created_at)}</i></small>
                                                            </div>
                                                        </div>


                                                        <div class="dropdown is-spaced is-right is-neutral dropdown-trigger" style=" position: absolute;left: auto;right: 8px;">
                                                            <div>
                                                               <form action="${deleteVideoUrl}" onsubmit="confirmAction(event, () => event.target.submit())" method="post" class="d-inline">
                                                                 <input type="hidden" name="_token" value="PXqkvSzrXblopu90lUJzrI4CSrSJUSRoY6qOEJ4v">                                                                 <input type="hidden" name="_method" value="DELETE">                                                                 <button type="submit" class="btn btn-sm btn-icon" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" data-bs-original-title="Remove"><svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                         <path opacity="0.5" d="M9.84961 4.04492C10.2614 2.87973 11.3727 2.04492 12.6789 2.04492C13.9851 2.04492 15.0964 2.87973 15.5082 4.04492" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path>
                                                                         <path d="M21.1798 6.04492H4.17969" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path>
                                                                         <path d="M19.5124 8.54492L19.0524 15.444C18.8754 18.0989 18.7869 19.4264 17.9219 20.2357C17.0569 21.0449 15.7265 21.0449 13.0657 21.0449H12.2924C9.63155 21.0449 8.30115 21.0449 7.43614 20.2357C6.57113 19.4264 6.48264 18.0989 6.30564 15.444L5.8457 8.54492" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path>
                                                                         <path opacity="0.5" d="M10.1797 11.0449L10.6797 16.0449" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path>
                                                                         <path opacity="0.5" d="M15.1797 11.0449L14.6797 16.0449" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path>
                                                                     </svg>
                                                                 </button>
                                                             </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- /Post header -->

                                                    <!-- Post body -->
                                                    <div class="card-body pt-0 pb-2">
                                                        <div class="post-image">
                                                            <a data-fancybox="post1" data-lightbox-type="comments">
                                                                <video controls="" class="videoclass w-100">
                                                                <source src="http://127.0.0.1:2002/storage/${video.video}">
                                                            </video>
                                                            </a>
                                                            <!-- Action buttons -->

                                                        </div>
                                                        <small>${video.video_file_name || 'N/A'}</small>&nbsp;&nbsp;
                                                        <small>${video.total_listen || '0'} Views</small>
                                                    </div>
                                                    <!-- /Post body -->
                                                </div>
                                                <!-- /Main wrap -->
                                            </div>
                                        </div>
                                    `);
                            });

                            totalVideos = response.clips.length;
                            totalVideosMbs = (totalVideosMbs >= 1024 ? (totalVideosMbs / 1024)
                                .toFixed(1) + 'GB' : totalVideosMbs.toFixed(1) + 'MB');
                            $('#total_videos').html(
                                `<i>${totalVideos} / ${totalVideosMbs}</i>`);
                        } else {
                            $('#videos-tbody').append(
                                '<tr><td class="text-center" colspan="8"><b>No Data found.</b></td></tr>'
                            );
                        }
                    }
                });
            });

            function formatDate(dateString) {
                let date = new Date(dateString);
                let options = {
                    day: '2-digit',
                    month: 'short',
                    year: 'numeric'
                };
                return date.toLocaleDateString('en-GB', options).replace(',', '');
            }

            $('form').on('submit', function(event) {
                event.preventDefault();
                const form = $(this);
                const formData = new FormData(form[0]);

                $.ajax({
                    url: form.attr('action'),
                    type: form.attr('method'),
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        // Handle success
                        $('#editAlbumModal' + formData.get('id')).modal('hide');
                        window.location.reload();
                    },
                    error: function(error) {
                        // Handle error
                        alert('Failed to Submit!');
                    }
                });
            });


            $(document).on('click', '.change_music_category', function() {
                let music_id = $(this).attr('data-music_id');
                $('#music_id').val(music_id);
            });

            $('button').click(function() {
                $('audio, video').each(function() {
                    this.pause(); // Pause the media
                    this.currentTime = 0; // Reset to start
                });
            });

            $('[name="music_type"]').change(function() {
                if ($(this).val() !== "" && $(this).val() !== null) {
                    $('#song-upload').css('display', 'block');
                } else {
                    $('#song-upload').css('display', 'none');
                }
            })
        });

        $(document).ready(function() {
            let table = $('.artist-table').DataTable({
                // processing: true,
                serverSide: true,
                ajax: {
                    url: "http://127.0.0.1:2002/artist",
                    data: function(d) {
                        d.sort_by = $('#sort_by').val();
                        d.table = 'dataTable';
                    }
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'artist_info',
                        name: 'artist_info'
                    },
                    {
                        data: 'total_songs',
                        name: 'total_songs'
                    },
                    {
                        data: 'total_videos',
                        name: 'total_videos'
                    },
                    {
                        data: 'like',
                        name: 'like'
                    },
                    {
                        data: 'actions',
                        name: 'actions',
                        orderable: false,
                        searchable: false
                    }
                ]
            });

            $('#sort_by').on('change', function() {
                table.draw();
            });

            $('#search').on('keyup', function() {
                table.search($(this).val()).draw();
            });
        });
    </script>

<!-- END: Page JS-->

        <script>
            $(document).ready(function() {
                setTimeout(function() {
                    $(".alert").fadeOut("slow");
                }, 3000); // 3 seconds
            });
        </script>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>



<input type="file" class="dz-hidden-input" accept="image/*" tabindex="-1" style="visibility: hidden; position: absolute; top: 0px; left: 0px; height: 0px; width: 0px;"><input type="file" class="dz-hidden-input" accept="video/*" tabindex="-1" style="visibility: hidden; position: absolute; top: 0px; left: 0px; height: 0px; width: 0px;"><input type="file" multiple="multiple" class="dz-hidden-input" accept="audio/*" tabindex="-1" style="visibility: hidden; position: absolute; top: 0px; left: 0px; height: 0px; width: 0px;"><div id="loom-companion-mv3" ext-id="liecbddmkiiihnedobmlmillhodjkdmb"><div id="shadow-host-companion"></div></div><input type="file" class="dz-hidden-input" accept="image/*" tabindex="-1" style="visibility: hidden; position: absolute; top: 0px; left: 0px; height: 0px; width: 0px;"><input type="file" class="dz-hidden-input" accept="image/*" tabindex="-1" style="visibility: hidden; position: absolute; top: 0px; left: 0px; height: 0px; width: 0px;"></body><grammarly-desktop-integration data-grammarly-shadow-root="true"></grammarly-desktop-integration></html>

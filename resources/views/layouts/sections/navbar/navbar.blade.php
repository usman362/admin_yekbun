@php
    $containerNav = $containerNav ?? 'container-fluid';
    $navbarDetached = $navbarDetached ?? '';

@endphp
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.x.x/...">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.6.2/js/bootstrap.min.js"></script>
<style>
    /* For nested dropdowns */
    .dropdown-submenu {
        position: relative;
    }



    .dropdown-menu {
        width: 220px;
        padding: 0.25rem 0;
    }

    .dropdown-item {
        padding: 0.5rem 1rem;
        font-size: 0.85rem;
    }

    /* Force dropdown sizing */
    .navbar-nav .dropdown-menu {
        min-width: 220px !important;
        width: 220px !important;
        padding: 0 !important;
    }

    /* Style dropdown items */
    .navbar-nav .dropdown-item {
        font-size: 0.85rem !important;
        padding: 0.5rem 1rem !important;
        display: flex !important;
        align-items: center !important;
    }

    /* Icon sizing */
    .navbar-nav .dropdown-item i {
        font-size: 1rem !important;
        width: 20px !important;
        text-align: center !important;
    }

    .dropdown-submenu>.dropdown-menu {
        top: 0;
        left: 100%;
        margin-top: -1px;
        display: none;
        position: absolute;
    }

    .dropdown-submenu:hover>.dropdown-menu {
        display: block;
    }
</style>
<!-- Navbar -->
@if (isset($navbarDetached) && $navbarDetached == 'navbar-detached')
    <nav class="layout-navbar {{ $containerNav }} navbar navbar-expand-xl {{ $navbarDetached }} align-items-center bg-navbar-theme"
        id="layout-navbar" style="box-shadow: none; background: transparent !important;">
@endif
@if (isset($navbarDetached) && $navbarDetached == '')
    <nav class="layout-navbar navbar navbar-expand-xl align-items-center bg-navbar-theme" id="layout-navbar"
        style="box-shadow: none; background: transparent !important;">
        <div class="{{ $containerNav }}">
@endif
@php
    // Count how many cards will be visible
    $cardCount = 0;

    if (!isset($menuHorizontal)) $cardCount++;
    if (auth()->user()?->can('channels.read')) $cardCount++;
    if (auth()->user()?->can('users.read')) $cardCount++;
    if (auth()->user()?->can('avatars.read')) $cardCount++;
    if (auth()->user()?->can('flaggedUser.read')) $cardCount++;
    if (auth()->user()?->can('flaggedchannels.read')) $cardCount++;

    // Final column for profile, shortcuts, notifications
    $cardCount++;

    $colWidth = 75 / $cardCount;
@endphp

<!--  Brand demo (display only for navbar-full and hide on below xl) -->
@if (isset($navbarFull))
    <div class="navbar-brand app-brand demo d-none d-xl-flex py-0 me-4">
        <a href="{{ url('/') }}" class="app-brand-link gap-1">
            <span class="app-brand-logo demo">
                @include('_partials.macros', ['width' => 25, 'withbg' => '#696cff'])
            </span>
            <span class="app-brand-text demo menu-text fw-bolder">{{ config('variables.templateName') }}</span>
        </a>
    </div>
@endif

<!-- ! Not required for layout-without-menu -->
@if (!isset($navbarHideToggle))
    <div
        class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0{{ isset($menuHorizontal) ? ' d-xl-none ' : '' }} {{ isset($contentNavbar) ? ' d-xl-none ' : '' }}">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
            <i class="bx bx-menu bx-sm"></i>
        </a>
    </div>
@endif

<div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse" style="gap: 4px;">
    <!-- Search Column -->
    @if (!isset($menuHorizontal))
    <div class="card mb-0 px-3 search-wrap d-flex justify-content-center align-items-center" style="height:54px; min-width: 200px;">


            <div class="navbar-nav">
                <div class="nav-item navbar-search-wrapper mb-0">
                    <div class="nav-item nav-link px-0 d-flex align-items-center">
                        <i class="bx bx-search bx-sm me-1"></i>
                        <input type="text" class="form-control form-control-sm" placeholder="Search (Ctrl+/)"
                            style="border: none; box-shadow: none;" />
                    </div>
                </div>
            </div>
        </div>
    @endif


    @can('channels.read')
        <!-- Channels Column -->
        <div class="card mb-0 d-flex justify-content-center mx-1 ms-4" style="height:54px; min-width: 90px; flex: 0 0 {{ $colWidth }}%;">


            <ul class="navbar-nav">
                <li class="nav-item dropdown-notifications navbar-dropdown dropdown">
                    <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown"
                        data-bs-auto-close="outside" aria-expanded="false">
                        <div class="d-flex align-items-center gap-1">
                            <img src="{{ asset('assets/img/Channels.svg') }}" alt="channel"
                                style="width: 20px; height: 20px;">
                            <span class="fw-semibold" style="font-size: 0.85rem;">Channels</span>

                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end p-0" style="min-width: 220px;">
                        <li>
                            <a class="dropdown-item d-flex align-items-center py-2 px-3"
                                href="{{ url('managecategories') }}">
                                <i class="bx bx-moon me-2"></i>
                                <span>Manage Categories</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center py-2 px-3"
                                href="{{ url('channelrequest?view=new_request') }}">
                                <i class="bx bx-desktop me-2"></i>
                                <span>Channel Request</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center py-2 px-3"
                                href="{{ url('managechannel?view=new_request') }}">
                                <i class="bx bx-desktop me-2"></i>
                                <span>Manage Channel</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center py-2 px-3" href="{{ url('channeladmin') }}">
                                <i class="bx bx-user me-2"></i>
                                <span>Channel Admin</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    @endcan
    <!-- Users Column -->
    @can('users.read')
      <div class="card mb-0 d-flex justify-content-center mx-1 ms-4" style="height:54px; min-width: 90px; flex: 0 0 {{ $colWidth }}%;">


            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle hide-arrow" href="#" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <div class="d-flex align-items-center gap-1">
                            <img src="{{ asset('assets/img/Users.svg') }}" alt="user"
                                style="width: 20px; height: 20px;">
                            <span class="fw-semibold" style="font-size: 0.85rem;">User</span>

                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end p-0" style="min-width: 220px;">
                        <li>
                            <a class="dropdown-item d-flex align-items-center py-2 px-3"
                                href="{{ url('/users/cultivated') }}">
                                <img src="{{ asset('assets/svg/svg-dialog/cultivated.svg') }}" alt="cul"
                                    style="width: 20px; height: 20px; margin-right: 10px;">
                                <span>Cultivated User</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center py-2 px-3"
                                href="{{ url('/users/educated') }}">
                                <img src="{{ asset('assets/svg/svg-dialog/educated.svg') }}" alt="edu"
                                    style="width: 20px; height: 20px; margin-right: 10px;">
                                <span>Educated User</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center py-2 px-3"
                                href="{{ url('/users/academic') }}">
                                <img src="{{ asset('assets/svg/svg-dialog/academic.svg') }}" alt="acad"
                                    style="width: 20px; height: 20px; margin-right: 10px;">
                                <span>Academic User</span>
                            </a>
                        </li>
                        <li class="dropdown-submenu">
                            <a class="dropdown-item d-flex justify-content-between align-items-center py-2 px-3"
                                href="#">
                                <span>Setting</span>
                                <i class="bx bx-chevron-right"></i>
                            </a>
                            <ul class="dropdown-menu" style="min-width: 200px;">
                                <li>
                                    <a class="dropdown-item d-flex align-items-center py-2 px-3"
                                        href="{{ url('settings/profile-banner') }}">
                                        Profile Banner
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item d-flex align-items-center py-2 px-3"
                                        href="{{ url('/settings/user-roles/cultivated') }}">
                                        User Roles
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item d-flex align-items-center py-2 px-3"
                                        href="{{ url('/settings/reasons') }}">
                                        Reasons
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item d-flex align-items-center py-2 px-3"
                                        href="{{ url('/settings/user/prefix') }}">
                                        User Prefix
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    @endcan
    <!-- Avatars Column -->
    @can('avatars.read')
      <div class="card mb-0 d-flex justify-content-center mx-1 ms-4" style="height:54px; min-width: 90px; flex: 0 0 {{ $colWidth }}%;">


            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle hide-arrow" href="#" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <div class="d-flex align-items-center gap-1">
                            <img src="{{ asset('assets/img/Avatar.svg') }}" alt="avatars"
                                style="width: 20px; height: 20px;">
                            <span class="fw-semibold" style="font-size: 0.85rem;">Avatars</span>

                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" style="min-width: 200px;">
                        <li><a class="dropdown-item" href="{{ url('/avatars') }}">Add/manage Avatars</a></li>
                        <li><a class="dropdown-item" href="{{ url('/avatars') }}">Manage AI Posts</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    @endcan
    <!-- Flag User Column -->
    @can('flaggedUser.read')
      <div class="card mb-0 d-flex justify-content-center mx-1 ms-4" style="height:54px; min-width: 90px; flex: 0 0 {{ $colWidth }}%;">


            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-1" href="{{ url('reports/flagged-users') }}">
                        <img src="{{ asset('assets/img/flaged.svg') }}" alt="Flagged User Icon"
                            style="width: 20px; height: 20px;">
                        <span class="fw-semibold">Flag user</span>

                    </a>
                </li>
            </ul>
        </div>
    @endcan
    <!-- Flag Channels Column -->
    @can('flaggedchannels.read')
         <div class="card mb-0 d-flex justify-content-center mx-1 ms-4" style="height:54px; min-width: 90px; flex: 0 0 {{ $colWidth }}%;">

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-1" href="{{ url('flaggedfanpage') }}">
                        <img src="{{ asset('assets/img/flaged.svg') }}" alt="Flagged Channel Icon"
                            style="width: 20px; height: 20px;">
                        <span class="fw-semibold">Flag Channels</span>

                    </a>
                </li>
            </ul>
        </div>

        <!-- Agents Column -->
           <div class="card mb-0 d-flex justify-content-center mx-1 ms-4" style="height:54px; min-width: 90px; flex: 0 0 {{ $colWidth }}%;">

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-1" href="">
                        <img src="{{ asset('assets/img/Agents.svg') }}" alt="Agents Icon"
                            style="width: 20px; height: 20px;">
                        <span class="fw-semibold">Agents</span>

                    </a>
                </li>
            </ul>
        </div>
    @endcan
    <!-- Combined Layout for Shortcuts, Notifications, and Profile -->
      <div class="card mb-0 d-flex justify-content-center mx-1 ms-4" style="height:54px; min-width: 90px; flex: 0 0 {{ $colWidth }}%;">


        <ul class="navbar-nav d-flex flex-row gap-3 align-items-center mb-0">

            <!-- Shortcuts -->
            <li class="nav-item dropdown-shortcuts dropdown">
                <a class="nav-link dropdown-toggle hide-arrow d-flex align-items-center" href="javascript:void(0);"
                    data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                    <i class='bx bx-grid-alt bx-sm'></i>
                </a>
                <div class="dropdown-menu dropdown-menu-end py-0" style="width: 300px;">
                    <div class="dropdown-menu-header border-bottom">
                        <div class="dropdown-header d-flex align-items-center py-3">
                            <h5 class="text-body mb-0 me-auto">Shortcuts</h5>
                            <a href="javascript:void(0)" class="dropdown-shortcuts-add text-body"
                                title="Add shortcuts">
                                <i class="bx bx-sm bx-plus-circle"></i>
                            </a>
                        </div>
                    </div>
                    <div class="dropdown-shortcuts-list scrollable-container">

                        <!-- Shortcut Item -->
                        <a href="{{ url('/artist') }}"
                            class="dropdown-shortcuts-item d-flex align-items-center px-3 py-2">
                            <span
                                class="dropdown-shortcuts-icon bg-label-secondary rounded-circle d-flex align-items-center justify-content-center me-3"
                                style="width: 35px; height: 35px;">
                                <img src="{{ asset('assets/img/Add Music.svg') }}" alt="Music Icon"
                                    style="width: 20px; height: 20px;">
                            </span>
                            <span class="text-body">Add Music</span>
                        </a>

                        <!-- Shortcut Item -->
                        <a href="{{ url('/history') }}"
                            class="dropdown-shortcuts-item d-flex align-items-center px-3 py-2">
                            <span
                                class="dropdown-shortcuts-icon bg-label-secondary rounded-circle d-flex align-items-center justify-content-center me-3"
                                style="width: 35px; height: 35px;">
                                <img src="{{ asset('assets/img/Add History.svg') }}" alt="Music Icon"
                                    style="width: 20px; height: 20px;">
                            </span>
                            <span class="text-body">Add History</span>
                        </a>

                        <!-- Shortcut Item -->
                        <a href="{{ url('/vote') }}"
                            class="dropdown-shortcuts-item d-flex align-items-center px-3 py-2">
                            <span
                                class="dropdown-shortcuts-icon bg-label-secondary rounded-circle d-flex align-items-center justify-content-center me-3"
                                style="width: 35px; height: 35px;">
                                <img src="{{ asset('assets/img/Add Surveys.svg') }}" alt="Music Icon"
                                    style="width: 20px; height: 20px;">

                            </span>
                            <span class="text-body">Add Survey</span>
                        </a>

                        <!-- Shortcut Item -->
                        <a href="{{ url('/language') }}"
                            class="dropdown-shortcuts-item d-flex align-items-center px-3 py-2">
                            <span
                                class="dropdown-shortcuts-icon bg-label-secondary rounded-circle d-flex align-items-center justify-content-center me-3"
                                style="width: 35px; height: 35px;">
                                <img src="{{ asset('assets/img/Add Language.svg') }}" alt="Music Icon"
                                    style="width: 20px; height: 20px;">

                            </span>
                            <span class="text-body">Add Languages</span>
                        </a>

                    </div>
                </div>
            </li>

            {{-- asim --}}
            <!-- Notifications -->
            <li class="nav-item dropdown-notifications dropdown">
                <a class="nav-link dropdown-toggle hide-arrow d-flex align-items-center" href="javascript:void(0);"
                    data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                    <div class="position-relative">
                        <i class="bx bx-bell bx-sm"></i>
                        <span
                            class="position-absolute top-0 start-100 translate-middle badge bg-danger rounded-pill badge-notifications">5</span>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end py-0" style="width: 320px;">
                    <li class="dropdown-menu-header border-bottom">
                        <div class="dropdown-header d-flex align-items-center py-3">
                            <h5 class="text-body mb-0 me-auto">Notifications</h5>
                            <a href="javascript:void(0)" class="dropdown-notifications-all text-body"
                                title="Mark all as read">
                                <i class="bx fs-4 bx-envelope-open"></i>
                            </a>
                        </div>
                    </li>
                    <li class="dropdown-notifications-list scrollable-container">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">No new notifications</li>
                        </ul>
                    </li>
                    <li class="dropdown-menu-footer border-top">
                        <a href="javascript:void(0);"
                            class="dropdown-item d-flex justify-content-center text-primary p-2">
                            View all notifications
                        </a>
                    </li>
                </ul>
            </li>

            <!-- User Profile -->
            <li class="nav-item dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow d-flex align-items-center" href="javascript:void(0);"
                    data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                        <img src="{{ Auth::user() && Auth::user()->image && Auth::user()->image != 'NULL' ? asset('storage/' . Auth::user()->image) : asset('https://www.w3schools.com/howto/img_avatar.png') }}"
                            alt  style="width: 40px; height: 40px; object-fit: cover;" class="rounded-circle">
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" style="min-width: 240px;">
                    <li class="px-3 py-2">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0 me-3">
                                <div class="avatar avatar-online">
                                    <img src="{{ Auth::user() && Auth::user()->image ? asset('storage/' . Auth::user()->image) : asset('https://www.w3schools.com/howto/img_avatar.png') }}"
                                        alt class="w-px-40 h-px-40 rounded-circle">
                                </div>
                            </div>
                            <div class="flex-grow-1">
                                <span class="fw-semibold d-block">{{ Auth::user()->name ?? 'John Doe' }}</span>
                                <small class="text-muted">{{ Auth::user()->email }}</small>
                            </div>
                        </div>
                    </li>


                    @if (Auth::user() && Auth::user()->email === 'admin@gmail.com')
                     <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    <li><a class="dropdown-item" href="{{ route('admin_profile') }}"><i
                                class="bx bx-user me-2"></i>My Profile</a></li>
                    <li><a class="dropdown-item" href="{{ route('admin_activity') }}"><i
                                class="bx bx-list-ul me-2"></i>Admin Activity</a></li>
@endif

                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('admin.logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class='bx bx-power-off me-2'></i>Logout
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>


</div>

<!-- Hidden logout form -->
<form method="POST" id="logout-form" action="{{ route('admin.logout') }}">
    @csrf
</form>

{{-- <!-- Search Small Screens -->
<div class="navbar-search-wrapper search-input-wrapper {{ isset($menuHorizontal) ? $containerNav : '' }} d-none">
    <input type="text"
        class="form-control search-input {{ isset($menuHorizontal) ? '' : $containerNav }} border-0"
        placeholder="Search..." aria-label="Search...">
    <i class="bx bx-x bx-sm search-toggler cursor-pointer"></i>
</div> --}}

@if (!isset($navbarDetached))
    </div>
@endif
</nav>
<!-- / Navbar -->

<!-- Category Model -->
<div class="modal fade" id="livestreammodel" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="col-xl-6">
                <div class="nav-align-top mb-4">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                                data-bs-target="#navs-top-home" aria-controls="navs-top-home"
                                aria-selected="true">Publish</button>
                        </li>
                        <li class="nav-item">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                data-bs-target="#navs-top-profile" aria-controls="navs-top-profile"
                                aria-selected="false">Album</button>
                        </li>
                        <li class="nav-item">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="modal"
                                data-bs-target="#onboardingSlideModal" aria-controls="onboardingSlideModal"
                                aria-selected="false">Video</button>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="modal-body">
                <div class="tab-content tabcontent--1">
                    <div class="tab-pane fade show active" id="navs-top-home" role="tabpanel">
                        <div class="row">
                            <form method="POST" action="{{ route('news-category.store') }}">
                                @csrf
                                <div class="col-12 d-flex">
                                    <div>
                                        <img src="{{ asset('assets/img/avatars/1.png') }}" width="50"
                                            class="rounded-circle">
                                    </div>
                                    <textarea type="text" id="nameLarge" class="form-control border-0" placeholder="Write Something here"
                                        name="news_category"></textarea>
                                </div>
                            </form>
                            <div class="col-12 "
                                style="display:flex;gap:16px;margin-top:100px; border-top:1px solid #f7f7f7 ">
                                <div>
                                    <button class="btn" style="background-color:#f7f7f7; border-radius:500px;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-camera">
                                            <path
                                                d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z">
                                            </path>
                                            <circle cx="12" cy="13" r="4"></circle>
                                        </svg>&nbsp;Media</button>
                                </div>
                                <div>
                                    <button class="btn " style="background-color:#f7f7f7; border-radius:500px;">
                                        <img src={{ asset('assets/img/emoji-1.svg') }}
                                            width="25">&nbsp;Activity</button>
                                </div>

                                <div>
                                    <button class="btn " style="background-color:#f7f7f7; border-radius:500px;">
                                        <i class='bx bx-dots-horizontal-rounded '></i></button>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="navs-top-profile" role="tabpanel">
                        <div class="row">
                            <form method="POST" action="{{ route('news-category.store') }}">
                                @csrf
                                <div class="col-12 d-flex">
                                    <div>
                                        <img src="{{ asset('assets/img/avatars/1.png') }}" width="50"
                                            class="rounded-circle">
                                    </div>
                                    <textarea type="text" id="nameLarge" class="form-control border-0" placeholder="Write Something here"
                                        name="news_category"></textarea>
                                </div>
                            </form>
                            <div class="col-12"
                                style="display:flex;gap:16px;margin-top:100px; border-top:1px solid #f7f7f7 ">
                                <div><button class="btn "
                                        style="background-color:#f7f7f7; border-radius:500px;"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-camera">
                                            <path
                                                d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z">
                                            </path>
                                            <circle cx="12" cy="13" r="4"></circle>
                                        </svg>&nbsp;Media</button></div>
                                <div> <button class="btn "
                                        style="background-color:#f7f7f7; border-radius:500px;"><img
                                            src={{ asset('assets/img/emoji-1.svg') }}
                                            width="25">&nbsp;Activity</button></div>
                                <button class="btn " style="background-color:#f7f7f7; border-radius:500px;"><i
                                        class='bx bx-dots-horizontal-rounded '></i></button>
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
<div class="modal-onboarding modal fade animate__animated" id="onboardingSlideModal" tabindex="-1"
    aria-hidden="true">
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
                                <img src="{{ asset('assets/img/videotrip.svg') }}" alt="girl-with-laptop-light"
                                    width="335" class="img-fluid">
                            </div>
                        </div>
                        <div class="onboarding-content">
                            <h4 class="onboarding-title text-body">Share live videos</h4>
                            <p>Lorem ipsum sit dolor amet is a dummy text used by the typography industry and the
                                web industry.</p>
                            <br><br>
                        </div>
                        <a class="carousel-control-next" href="#modalCarouselControls" role="button"
                            data-bs-slide="next">
                            <button type="button" class="btn btn-primary">
                                Next
                            </button>
                        </a>
                    </div>
                    <div class="carousel-item">
                        <div class="onboarding-media">
                            <div class="mx-2">
                                <img src="{{ asset('assets/img/videocall.svg') }}" alt="boy-with-laptop-light"
                                    width="300" class="img-fluid">
                            </div>
                        </div>
                        <div class="onboarding-content">
                            <h4 class="onboarding-title text-body">To build your audience</h4>
                            <div class="onboarding-info">Lorem ipsum sit dolor amet is a dummy text used by the
                                typography industry and the web industry.</div> <br><br>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#animationModal">
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
            {{-- <div class="modal-body"> --}}
            <div class="row ">
                <div class="col-md-7">
                    <div class="video-container">
                        <iframe width="100%" height="680"
                            src="https://media.istockphoto.com/id/1365258482/video/adaptive-interface-design-video-concept.mp4?s=mp4-640x640-is&k=20&c=tf7tups5Y05BtaiZnfdCfyMrt3lhDbH3sX_H6R8Tji8=">
                        </iframe>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="d-flex justify-content-start align-items-center user-name ">
                                <div class="avatar-wrapper">
                                    <div class="avatar avatar-sm me-3"><img src="{{ asset('assets/img/10.png') }}"
                                            alt="Avatar" class="rounded-circle"></div>
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
                                <button class="btn p-0" type="button" id="sharedList" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="bx bx-dots-vertical"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="sharedList"
                                    style="padding:10px;">

                                    <strong>Who can see this ?</strong>
                                    <ul class="list-group list-unstyled">
                                        <li><a>
                                                <div
                                                    class="d-flex justify-content-center align-items-center user-name ">
                                                    <div class="avatar-wrapper">
                                                        <div class="avatar avatar-sm me-3 text-center"><i
                                                                class='bx bx-world'></i></div>
                                                    </div>
                                                    <div class="d-flex flex-column">
                                                        <a href="javascript:void(0)" class="text-body text-truncate">
                                                            <span class="fw-semibold">Public</span>
                                                        </a>
                                                        <small class="text-muted">Anyone can see this
                                                            publication.</small>
                                                    </div>
                                                </div>
                                            </a></li>
                                        <li><a>
                                                <div
                                                    class="d-flex justify-content-center align-items-center user-name ">
                                                    <div class="avatar-wrapper">
                                                        <div class="avatar avatar-sm me-3 text-center"><i
                                                                class='bx bx-group'></i></div>
                                                    </div>
                                                    <div class="d-flex flex-column">
                                                        <a href="javascript:void(0)" class="text-body text-truncate">
                                                            <span class="fw-semibold">Friends</span>
                                                        </a>
                                                        <small class="text-muted">Only Friends can see this
                                                            publication.</small>
                                                    </div>
                                                </div>
                                            </a></li>
                                        <li><a>
                                                <div
                                                    class="d-flex justify-content-center align-items-center user-name ">
                                                    <div class="avatar-wrapper">
                                                        <div class="avatar avatar-sm me-3 text-center"><i
                                                                class='bx bxs-right-arrow-alt'></i></div>
                                                    </div>
                                                    <div class="d-flex flex-column">
                                                        <a href="javascript:void(0)" class="text-body text-truncate">
                                                            <span class="fw-semibold">Specific Friends</span>
                                                        </a>
                                                        <small class="text-muted">Dont Show it to some
                                                            friends.</small>
                                                    </div>
                                                </div>
                                            </a></li>
                                        <hr>
                                        <li><a>
                                                <div
                                                    class="d-flex justify-content-center align-items-center user-name ">
                                                    <div class="avatar-wrapper">
                                                        <div class="avatar avatar-sm me-3 text-center"><i
                                                                class='bx bxs-user'></i></div>
                                                    </div>
                                                    <div class="d-flex flex-column">
                                                        <a href="javascript:void(0)" class="text-body text-truncate">
                                                            <span class="fw-semibold">Only me</span>
                                                        </a>
                                                        <small class="text-muted">Only me can see this
                                                            publication.</small>
                                                    </div>
                                                </div>
                                            </a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-11 mt-4">
                            <input type="text" class="form-control form-rounded"
                                placeholder="what is this live about?" />
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-8 ">
                            <span style="margin-left:10px;">
                                <i class='bx bx-heart'></i>&nbsp;&nbsp;0</span>
                            <span style="margin-left:10px;">
                                <i class='bx bx-share'></i>&nbsp;&nbsp;0</span>
                            <span style="margin-left:10px;">
                                <i class='bx bx-chat'></i>&nbsp;&nbsp;0</span>
                        </div>

                        <div class="col-md-4 ">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    viewBox="0 0 24 24" fill="none" stroke="#888da8" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye">
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
                                <i class='bx bx-like'></i>&nbsp;Like
                            </span>
                        </div>
                        <div class="col-md-3">
                            <span class="feeds_icons">
                                <i class='bx bx-chat'></i>&nbsp;Comment
                            </span>
                        </div>
                        <div class="col-md-3">
                            <span class="feeds_icons">
                                <i class='bx bx-share'></i>&nbsp;Share
                            </span>
                        </div>

                        <div class="col-md-3">
                            <div class="dropdown show">
                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="{{ asset('assets/img/10.png') }}" alt="Avatar"
                                        class="rounded-circle" width="20" height="20">
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink"
                                    style="padding:10px;">
                                    <div class="d-flex justify-content-start align-items-center user-name">
                                        <div class="avatar-wrapper">
                                            <div class="avatar avatar-sm me-3"><img
                                                    src="{{ asset('assets/img/10.png') }}" alt="Avatar"
                                                    class="rounded-circle"></div>
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
                                            <div class="avatar avatar-sm me-3"><img
                                                    src="{{ asset('assets/img/10.png') }}" alt="Avatar"
                                                    class="rounded-circle"></div>
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
                            {{-- item 1 --}}
                            <div class="row mb-1">
                                <div class="col">
                                    <div class="d-flex justify-content-start align-items-center user-name">
                                        <div class="avatar-wrapper">
                                            <div class="avatar avatar-sm me-3"><img
                                                    src="{{ asset('assets/img/10.png') }}" alt="Avatar"
                                                    class="rounded-circle"></div>
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

                            {{-- item 2 --}}
                            <div class="row mb-1">
                                <div class="col">
                                    <div class="d-flex justify-content-start align-items-center user-name">
                                        <div class="avatar-wrapper">
                                            <div class="avatar avatar-sm me-3"><img
                                                    src="{{ asset('assets/img/10.png') }}" alt="Avatar"
                                                    class="rounded-circle"></div>
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

                            {{-- item 2 --}}
                            <div class="row mb-1">
                                <div class="col">
                                    <div class="d-flex justify-content-start align-items-center user-name">
                                        <div class="avatar-wrapper">
                                            <div class="avatar avatar-sm me-3"><img
                                                    src="{{ asset('assets/img/10.png') }}" alt="Avatar"
                                                    class="rounded-circle"></div>
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

                            {{-- item 3 --}}
                            <div class="row mb-1">
                                <div class="col">
                                    <div class="d-flex justify-content-start align-items-center user-name">
                                        <div class="avatar-wrapper">
                                            <div class="avatar avatar-sm me-3"><img
                                                    src="{{ asset('assets/img/10.png') }}" alt="Avatar"
                                                    class="rounded-circle"></div>
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
                            <div class="d-flex gap-1">
                                <img src="{{ asset('assets/img/10.png') }}" alt="Avatar" class="rounded-circle"
                                    width="40" height="40">
                                <input type="text" class="form-control form-rounded" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- </div> --}}
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('.dropdown-submenu > a').on("click", function(e) {
            var submenu = $(this).next('.dropdown-menu');
            $('.dropdown-submenu .dropdown-menu').not(submenu).hide();
            submenu.toggle();
            e.stopPropagation();
            e.preventDefault();
        });
    });
</script>

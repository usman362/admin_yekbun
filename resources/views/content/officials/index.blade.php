@extends('layouts/layoutMaster')

@section('title', 'Officials')

@section('page-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-icons.css') }}" />
    <style>
        .officials-container {
            display: flex;
            min-height: 100vh;
            max-width: 1400px;
            margin: 0 auto;
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .officials-sidebar {
            width: 240px;
            background: white;
            padding: 25px 20px;
            border-right: 1px solid #eee;
            box-shadow: 4px 0 25px rgba(0, 0, 0, 0.04);
        }

        .officials-sidebar-header {
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 30px;
            padding: 12px;
            color: #1C274C;
            letter-spacing: -0.3px;
        }

        .officials-menu-item {
            display: flex;
            align-items: center;
            padding: 14px 16px;
            margin-bottom: 8px;
            cursor: pointer;
            transition: all 0.25s ease;
            font-size: 14px;
            font-weight: 500;
            color: #4a5568;
            border-radius: 10px;
        }

        .officials-menu-item:hover {
            color: #00A86B;
            background: rgba(0, 168, 107, 0.08);
        }

        .officials-menu-item.active {
            border: 2px solid #dc3545;
            border-radius: 10px;
            color: #00A86B;
            font-weight: 600;
            background: rgba(220, 53, 69, 0.04);
        }

        .officials-menu-item i {
            margin-right: 12px;
            font-size: 16px;
        }

        .officials-main-content {
            flex: 1;
            padding: 20px;
            background: #f8f9fa;
        }

        .officials-content-card {
            background: white;
            border-radius: 16px;
            padding: 30px;
            border: 2px solid #dc3545;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.06);
        }

        .officials-form-card {
            min-height: 500px;
        }

        .officials-form-title {
            font-size: 20px;
            font-weight: 600;
            color: #1C274C;
            margin-bottom: 25px;
        }

        .officials-form-row {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 15px;
            margin-bottom: 20px;
        }

        .officials-form-row-3 {
            grid-template-columns: repeat(3, 1fr);
        }

        .officials-about-row {
            align-items: end;
        }

        .officials-about-label {
            font-size: 14px !important;
            font-weight: 600 !important;
            color: #1C274C !important;
            padding-bottom: 10px;
        }

        .officials-form-group {
            display: flex;
            flex-direction: column;
        }

        .officials-form-group label {
            font-size: 13px;
            color: #666;
            margin-bottom: 8px;
        }

        .officials-form-group input {
            padding: 10px 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            color: #999;
        }

        .officials-form-group input:focus {
            outline: none;
            border-color: #00A86B;
        }

        .officials-upload-field {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            cursor: pointer;
            color: #999;
            font-size: 14px;
        }

        .officials-upload-field:hover {
            border-color: #00A86B;
        }

        .officials-upload-field i {
            color: #00A86B;
        }

        .officials-stand-info {
            font-size: 13px;
            color: #666;
            margin-bottom: 20px;
        }

        .officials-text-editor {
            border: 1px solid #ddd;
            border-radius: 5px;
            min-height: 250px;
            margin-bottom: 20px;
        }

        .officials-editor-placeholder {
            padding: 20px;
            color: #999;
            font-size: 14px;
        }

        .officials-form-actions {
            display: flex;
            justify-content: center;
        }

        .officials-save-btn {
            display: flex;
            align-items: center;
            gap: 10px;
            background: linear-gradient(135deg, #00A86B 0%, #00916d 100%);
            border: none;
            color: white;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            padding: 12px 28px;
            border-radius: 10px;
            transition: all 0.25s ease;
            box-shadow: 0 4px 15px rgba(0, 168, 107, 0.3);
        }

        .officials-save-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0, 168, 107, 0.4);
        }


        .officials-save-btn i {
            font-size: 14px;
        }

        .officials-right-panel {
            width: 300px;
            background: white;
            padding: 25px;
            border: 2px solid #dc3545;
            border-radius: 16px;
            margin: 20px;
            height: fit-content;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.06);
        }

        .officials-panel-header {
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid #f0f0f0;
        }

        .officials-panel-header h3 {
            font-size: 16px;
            font-weight: 600;
            color: #1C274C;
            margin-bottom: 5px;
        }

        .officials-total-count {
            font-size: 12px;
            color: #999;
        }

        .officials-entry-card {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 14px 12px;
            margin-bottom: 8px;
            border-radius: 10px;
            position: relative;
            cursor: pointer;
            transition: all 0.25s ease;
            border: 1px solid transparent;
        }

        .officials-entry-card:hover {
            background: #f8f9fa;
            border-color: #e8e8e8;
            margin: 0 -10px;
            padding: 12px 10px;
            border-radius: 8px;
        }

        .officials-entry-card:last-child {
            border-bottom: none;
        }

        .officials-entry-actions {
            display: none;
            position: absolute;
            right: 40px;
            top: 50%;
            transform: translateY(-50%);
            gap: 8px;
        }

        .officials-entry-card:hover .officials-entry-actions {
            display: flex;
        }

        .officials-action-icon {
            width: 28px;
            height: 28px;
            border-radius: 5px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .officials-action-icon.edit {
            background: #e3f2fd;
            color: #1976d2;
        }

        .officials-action-icon.edit:hover {
            background: #1976d2;
            color: white;
        }

        .officials-action-icon.remove {
            background: #ffebee;
            color: #dc3545;
        }

        .officials-action-icon.remove:hover {
            background: #dc3545;
            color: white;
        }

        .officials-action-icon i {
            font-size: 12px;
        }

        .entry-content h4 {
            font-size: 14px;
            font-weight: 500;
            color: #1C274C;
            margin-bottom: 4px;
        }

        .entry-content p {
            font-size: 12px;
            color: #999;
        }

        .entry-flag {
            width: 30px;
            height: 20px;
            border-radius: 3px;
            overflow: hidden;
        }

        .entry-flag img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .kurd-flag {
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .kurd-flag .red {
            flex: 1;
            background: #dc3545;
        }

        .kurd-flag .white {
            flex: 1;
            background: white;
        }

        .kurd-flag .green {
            flex: 1;
            background: #00A86B;
        }

        @media (max-width: 1200px) {
            .officials-right-panel {
                display: none;
            }

            .officials-form-row {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        .hidden {
            display: none !important;
        }

        .officials-form-row-2 {
            grid-template-columns: repeat(2, 1fr) !important;
        }

        .full-width {
            grid-column: 1 / -1;
        }

        .section-label {
            font-size: 14px;
            font-weight: 600;
            color: #1C274C;
            margin: 20px 0 15px 0;
        }

        .ministry-header-row {
            display: flex;
            gap: 20px;
            margin-bottom: 20px;
        }

        .logo-upload-box {
            width: 80px;
            height: 80px;
            border: 2px dashed #ddd;
            border-radius: 8px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            color: #999;
            transition: all 0.3s ease;
        }

        .logo-upload-box:hover {
            border-color: #00A86B;
            color: #00A86B;
        }

        .logo-upload-box i {
            font-size: 20px;
            margin-bottom: 5px;
        }

        .logo-upload-box span {
            font-size: 12px;
        }

        .ministry-inputs {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .ministry-input {
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            color: #1C274C;
        }

        .ministry-input:focus {
            outline: none;
            border-color: #00A86B;
        }

        .ministry-input::placeholder {
            color: #999;
        }

        .input-with-icon {
            position: relative;
            display: flex;
            align-items: center;
        }

        .input-with-icon i {
            position: absolute;
            left: 12px;
            font-size: 14px;
            z-index: 1;
        }

        .input-with-icon i.icon-red {
            color: #dc3545;
        }

        .input-with-icon input {
            width: 100%;
            padding: 12px 15px 12px 38px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            color: #1C274C;
            transition: all 0.3s ease;
        }

        .input-with-icon input:focus {
            outline: none;
            border-color: #00A86B;
            box-shadow: 0 0 0 3px rgba(0, 168, 107, 0.1);
        }

        .input-with-icon input::placeholder {
            color: #999;
        }

        .opening-times-header {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 15px;
        }

        .durchgehend-toggle {
            display: flex;
            align-items: center;
            gap: 10px;
            cursor: pointer;
        }

        .durchgehend-toggle input {
            display: none;
        }

        .durchgehend-slider {
            width: 44px;
            height: 24px;
            background: #ccc;
            border-radius: 24px;
            position: relative;
            transition: 0.3s;
        }

        .durchgehend-slider:before {
            content: "";
            position: absolute;
            width: 18px;
            height: 18px;
            background: white;
            border-radius: 50%;
            top: 3px;
            left: 3px;
            transition: 0.3s;
        }

        .durchgehend-toggle input:checked+.durchgehend-slider {
            background: #00A86B;
        }

        .durchgehend-toggle input:checked+.durchgehend-slider:before {
            transform: translateX(20px);
        }

        .durchgehend-label {
            font-size: 14px;
            font-weight: 500;
            color: #1C274C;
        }

        .opening-times {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .opening-times.durchgehend .pause-block {
            display: none !important;
        }

        .time-row {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px 0;
            border-bottom: 1px solid #f0f0f0;
        }

        .time-row:last-child {
            border-bottom: none;
        }

        .day-label {
            width: 90px;
            font-size: 14px;
            font-weight: 500;
            color: #1C274C;
        }

        .time-block {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .time-separator {
            color: #999;
            font-size: 14px;
        }

        .pause-block {
            margin-left: 10px;
            padding-left: 10px;
            border-left: 2px solid #f0f0f0;
        }

        .time-input {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 8px 12px;
            background: #f5f5f5;
            border-radius: 20px;
        }

        .time-input i {
            color: #00A86B;
            font-size: 14px;
        }

        .time-input input {
            border: none;
            background: transparent;
            width: 50px;
            font-size: 14px;
            color: #1C274C;
        }

        .time-input input:focus {
            outline: none;
        }

        .toggle {
            position: relative;
            display: inline-block;
            width: 44px;
            height: 24px;
        }

        .toggle input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: 0.4s;
            border-radius: 24px;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 18px;
            width: 18px;
            left: 3px;
            bottom: 3px;
            background-color: white;
            transition: 0.4s;
            border-radius: 50%;
        }

        input:checked+.slider {
            background-color: #00A86B;
        }

        input:checked+.slider:before {
            transform: translateX(20px);
        }

        .ministry-icon {
            width: 35px;
            height: 35px;
            position: relative;
            margin-right: 10px;
        }

        .icon-shape {
            position: absolute;
            width: 20px;
            height: 20px;
            border-radius: 4px;
            transform: rotate(45deg);
        }

        .icon-shape.green {
            background: #00A86B;
            top: 0;
            left: 5px;
        }

        .icon-shape.red {
            background: #dc3545;
            bottom: 0;
            left: 10px;
        }

        .kurdistan-flag {
            width: 30px;
            height: 20px;
            border-radius: 3px;
            overflow: hidden;
            display: flex;
            flex-direction: column;
        }

        .flag-stripe {
            flex: 1;
        }

        .flag-stripe.red {
            background: #dc3545;
        }

        .flag-stripe.white {
            background: #ffffff;
            border-top: 1px solid #eee;
            border-bottom: 1px solid #eee;
        }

        .flag-stripe.green {
            background: #00A86B;
        }

        .holiday-header-row {
            display: flex;
            gap: 20px;
            margin-bottom: 20px;
        }

        .upload-icon-box {
            width: 80px;
            height: 80px;
            border: 2px dashed #ddd;
            border-radius: 8px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            color: #999;
            transition: all 0.3s ease;
        }

        .upload-icon-box:hover {
            border-color: #00A86B;
            color: #00A86B;
        }

        .upload-icon-box i {
            font-size: 20px;
            margin-bottom: 5px;
        }

        .upload-icon-box span {
            font-size: 10px;
            text-align: center;
        }

        .holiday-inputs {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .holiday-row {
            display: flex;
            gap: 15px;
        }

        .holiday-input {
            flex: 1;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            color: #1C274C;
        }

        .holiday-input:focus {
            outline: none;
            border-color: #00A86B;
        }

        .holiday-input.full {
            width: 100%;
        }

        .upload-media-row {
            display: flex;
            gap: 20px;
            margin-bottom: 20px;
        }

        .upload-media-box {
            flex: 1;
            height: 200px;
            border: 2px dashed #1C274C;
            border-radius: 12px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            background: #f8f9fa;
        }

        .upload-media-box:hover {
            border-color: #00A86B;
            background: #f0fff5;
        }

        .upload-media-box i {
            font-size: 48px;
            color: #1C274C;
            margin-bottom: 15px;
            opacity: 0.6;
        }

        .upload-media-box .upload-label {
            font-size: 14px;
            color: #1C274C;
            font-weight: 500;
        }

        .upload-media-box .upload-format {
            font-size: 12px;
            color: #999;
            margin-top: 5px;
        }

        .holiday-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 20px;
            background: #1C274C;
            border-radius: 8px;
            margin-top: 20px;
        }

        .holiday-tag {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .holiday-tag i {
            color: #00A86B;
            font-size: 18px;
        }

        .tag-info {
            display: flex;
            flex-direction: column;
        }

        .tag-title {
            color: white;
            font-size: 14px;
            font-weight: 500;
        }

        .tag-subtitle {
            color: #999;
            font-size: 11px;
        }

        .toggle.small {
            width: 36px;
            height: 20px;
        }

        .toggle.small .slider:before {
            width: 14px;
            height: 14px;
        }

        .toggle.small input:checked+.slider:before {
            transform: translateX(16px);
        }

        .holiday-footer .officials-save-btn {
            background: transparent;
            color: #00A86B;
        }

        .holiday-icon {
            font-size: 24px;
            margin-right: 10px;
        }

        .holiday-emoji {
            font-size: 28px;
            margin-right: 12px;
            display: flex;
            align-items: center;
        }

        .holiday-entry {
            padding: 15px;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .holiday-entry:hover {
            background: #f8f9fa;
        }

        .holiday-entry .entry-content h4 {
            font-size: 15px;
            font-weight: 600;
            margin-bottom: 4px;
        }

        .holiday-entry .entry-content p {
            font-size: 12px;
            color: #666;
        }

        .officials-action-icon.settings {
            color: #999;
        }

        .officials-action-icon.settings:hover {
            color: #1C274C;
        }

        .officials-action-icon.view {
            background: #00A86B;
            color: white;
        }

        .officials-action-icon.view:hover {
            background: #008f5b;
        }

        .officials-action-icon.options {
            background: #1C274C;
            color: white;
        }

        .officials-action-icon.options:hover {
            background: #0d1526;
        }

        @media (max-width: 768px) {
            .officials-sidebar {
                width: 60px;
                padding: 10px;
            }

            .officials-sidebar-header,
            .officials-menu-item span {
                display: none;
            }

            .officials-form-row {
                grid-template-columns: 1fr;
            }
        }
    </style>
@endsection

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/bs-stepper/bs-stepper.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/flatpickr/flatpickr.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/tagify/tagify.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/animate-css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/dropzone/dropzone.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/friendkit/css/app-2.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/rtl/core.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/friendkit/css/core.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/js/main.js') }}"></script>
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
    <script src="{{ asset('assets/friendkit/js/popovers-pages.js') }}"></script>
    <script src="{{ asset('assets/friendkit/js/lightbox.js') }}"></script>

    <!-- Landing page js -->

    <!-- Signup page js -->

    <!-- Feed pages js -->
    <script src="{{ asset('assets/friendkit/js/feed.js') }}"></script>

    <script src="{{ asset('assets/friendkit/js/webcam.js') }}"></script>
    <script src="{{ asset('assets/friendkit/js/compose.js') }}"></script>
    <script src="{{ asset('assets/friendkit/js/autocompletes.js') }}"></script>
@endsection

@section('content')

    <div class="officials-container">
        <aside class="officials-sidebar">
            <div class="officials-sidebar-header">Officials Settings</div>

            <nav>
                <div class="officials-menu-item active" data-section="constitution">
                    <span>Constitution of Kurdistan</span>
                </div>
                <div class="officials-menu-item" data-section="people">
                    <span>People & Territory</span>
                </div>
                <div class="officials-menu-item" data-section="structure">
                    <span>Structure & Ministries</span>
                </div>
                <div class="officials-menu-item" data-section="civil">
                    <span>Civil Law & Daily Life</span>
                </div>
                <div class="officials-menu-item" data-section="holidays">
                    <span>Holidays & Memory's</span>
                </div>
            </nav>
        </aside>

        <main class="officials-main-content">
            <div class="officials-content-card officials-form-card" id="section-constitution">
                <h2 class="officials-form-title">Constitution of Kurdistan</h2>

                <div class="officials-form-row">
                    <div class="officials-form-group">
                        <label>Title of Constitution</label>
                        <input type="text" placeholder="Type Title Here">
                    </div>
                    <div class="officials-form-group">
                        <label>Version</label>
                        <input type="text" placeholder="Type Title Here">
                    </div>
                    <div class="officials-form-group">
                        <label>Language</label>
                        <div class="officials-upload-field">
                            <span>Upload Icon</span>
                            <i class="fas fa-upload"></i>
                        </div>
                    </div>
                    <div class="officials-form-group">
                        <label>Audio</label>
                        <div class="officials-upload-field">
                            <span>Upload Audio</span>
                            <i class="fas fa-upload"></i>
                        </div>
                    </div>
                </div>

                <div class="officials-stand-info">Stand 01# - 16.01.2026</div>

                <div class="officials-text-editor">
                    <div class="officials-editor-placeholder">Text Editor Here</div>
                </div>

                <div class="officials-form-actions">
                    <button class="officials-save-btn">
                        Save <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
            </div>

            <div class="officials-content-card officials-form-card hidden" id="section-people">
                <h2 class="officials-form-title">People & Territory</h2>

                <div class="officials-form-row officials-form-row-3">
                    <div class="officials-form-group">
                        <label>Country Name</label>
                        <input type="text" placeholder="Type Title Here">
                    </div>
                    <div class="officials-form-group">
                        <label>Country Capital</label>
                        <input type="text" placeholder="Type Title Here">
                    </div>
                    <div class="officials-form-group">
                        <label>Mass</label>
                        <input type="text" placeholder="Type Title Here">
                    </div>
                </div>

                <div class="officials-form-row officials-form-row-3 officials-about-row">
                    <div class="officials-form-group">
                        <label class="officials-about-label">About Kurdistan</label>
                    </div>
                    <div class="officials-form-group">
                        <label>Language</label>
                        <div class="officials-upload-field">
                            <span>Upload Icon</span>
                            <i class="fas fa-upload"></i>
                        </div>
                    </div>
                    <div class="officials-form-group">
                        <label>Audio</label>
                        <div class="officials-upload-field">
                            <span>Upload Audio</span>
                            <i class="fas fa-upload"></i>
                        </div>
                    </div>
                </div>

                <div class="officials-text-editor">
                    <div class="officials-editor-placeholder">Here Text Editor</div>
                </div>

                <div class="officials-form-actions">
                    <button class="officials-save-btn">
                        Save <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
            </div>

            <div class="officials-content-card officials-form-card hidden" id="section-structure">
                <h2 class="officials-form-title">Add new Ministrie</h2>

                <div class="ministry-header-row">
                    <div class="logo-upload-box">
                        <i class="fas fa-plus"></i>
                        <span>Logo</span>
                    </div>
                    <div class="ministry-inputs">
                        <div class="input-with-icon">
                            <i class="fas fa-building icon-red"></i>
                            <input type="text" placeholder="Ministries Name">
                        </div>
                        <div class="input-with-icon">
                            <i class="fas fa-align-left icon-red"></i>
                            <input type="text" placeholder="Describtion">
                        </div>
                    </div>
                </div>

                <div class="section-label">About</div>
                <div class="officials-form-row officials-form-row-2">
                    <div class="officials-form-group">
                        <div class="input-with-icon">
                            <i class="fas fa-map-marker-alt icon-red"></i>
                            <input type="text" placeholder="Select Provinz">
                        </div>
                    </div>
                    <div class="officials-form-group">
                        <div class="input-with-icon">
                            <i class="fas fa-city icon-red"></i>
                            <input type="text" placeholder="Select City">
                        </div>
                    </div>
                </div>
                <div class="officials-form-row">
                    <div class="officials-form-group full-width">
                        <div class="input-with-icon">
                            <i class="fas fa-home icon-red"></i>
                            <input type="text" placeholder="Address And Housnumber">
                        </div>
                    </div>
                </div>

                <div class="section-label">Details</div>
                <div class="officials-form-row officials-form-row-2">
                    <div class="officials-form-group">
                        <div class="input-with-icon">
                            <i class="fas fa-globe icon-red"></i>
                            <input type="text" placeholder="Web">
                        </div>
                    </div>
                    <div class="officials-form-group">
                        <div class="input-with-icon">
                            <i class="fas fa-envelope icon-red"></i>
                            <input type="text" placeholder="Mail">
                        </div>
                    </div>
                </div>
                <div class="officials-form-row officials-form-row-2">
                    <div class="officials-form-group">
                        <div class="input-with-icon">
                            <i class="fas fa-phone icon-red"></i>
                            <input type="text" placeholder="Phone">
                        </div>
                    </div>
                    <div class="officials-form-group">
                        <div class="input-with-icon">
                            <i class="fas fa-calendar-check icon-red"></i>
                            <input type="text" placeholder="Appointment">
                        </div>
                    </div>
                </div>

                <div class="section-label">Opening Times</div>
                <div class="opening-times-header">
                    <label class="durchgehend-toggle">
                        <input type="checkbox" id="durchgehendToggle">
                        <span class="durchgehend-slider"></span>
                        <span class="durchgehend-label">Durchgehend</span>
                    </label>
                </div>
                <div class="opening-times">
                    <div class="time-row">
                        <span class="day-label">Montag</span>
                        <div class="time-block">
                            <div class="time-input">
                                <i class="fas fa-clock"></i>
                                <input type="text" placeholder="08:00">
                            </div>
                            <span class="time-separator">-</span>
                            <div class="time-input">
                                <i class="fas fa-clock"></i>
                                <input type="text" placeholder="12:00">
                            </div>
                        </div>
                        <div class="time-block pause-block">
                            <div class="time-input">
                                <i class="fas fa-clock"></i>
                                <input type="text" placeholder="13:00">
                            </div>
                            <span class="time-separator">-</span>
                            <div class="time-input">
                                <i class="fas fa-clock"></i>
                                <input type="text" placeholder="17:00">
                            </div>
                        </div>
                        <label class="toggle">
                            <input type="checkbox" checked>
                            <span class="slider"></span>
                        </label>
                    </div>
                    <div class="time-row">
                        <span class="day-label">Dienstag</span>
                        <div class="time-block">
                            <div class="time-input">
                                <i class="fas fa-clock"></i>
                                <input type="text" placeholder="08:00">
                            </div>
                            <span class="time-separator">-</span>
                            <div class="time-input">
                                <i class="fas fa-clock"></i>
                                <input type="text" placeholder="12:00">
                            </div>
                        </div>
                        <div class="time-block pause-block">
                            <div class="time-input">
                                <i class="fas fa-clock"></i>
                                <input type="text" placeholder="13:00">
                            </div>
                            <span class="time-separator">-</span>
                            <div class="time-input">
                                <i class="fas fa-clock"></i>
                                <input type="text" placeholder="17:00">
                            </div>
                        </div>
                        <label class="toggle">
                            <input type="checkbox" checked>
                            <span class="slider"></span>
                        </label>
                    </div>
                    <div class="time-row">
                        <span class="day-label">Mittwoch</span>
                        <div class="time-block">
                            <div class="time-input">
                                <i class="fas fa-clock"></i>
                                <input type="text" placeholder="08:00">
                            </div>
                            <span class="time-separator">-</span>
                            <div class="time-input">
                                <i class="fas fa-clock"></i>
                                <input type="text" placeholder="12:00">
                            </div>
                        </div>
                        <div class="time-block pause-block">
                            <div class="time-input">
                                <i class="fas fa-clock"></i>
                                <input type="text" placeholder="13:00">
                            </div>
                            <span class="time-separator">-</span>
                            <div class="time-input">
                                <i class="fas fa-clock"></i>
                                <input type="text" placeholder="17:00">
                            </div>
                        </div>
                        <label class="toggle">
                            <input type="checkbox" checked>
                            <span class="slider"></span>
                        </label>
                    </div>
                    <div class="time-row">
                        <span class="day-label">Donnerstag</span>
                        <div class="time-block">
                            <div class="time-input">
                                <i class="fas fa-clock"></i>
                                <input type="text" placeholder="08:00">
                            </div>
                            <span class="time-separator">-</span>
                            <div class="time-input">
                                <i class="fas fa-clock"></i>
                                <input type="text" placeholder="12:00">
                            </div>
                        </div>
                        <div class="time-block pause-block">
                            <div class="time-input">
                                <i class="fas fa-clock"></i>
                                <input type="text" placeholder="13:00">
                            </div>
                            <span class="time-separator">-</span>
                            <div class="time-input">
                                <i class="fas fa-clock"></i>
                                <input type="text" placeholder="17:00">
                            </div>
                        </div>
                        <label class="toggle">
                            <input type="checkbox" checked>
                            <span class="slider"></span>
                        </label>
                    </div>
                    <div class="time-row">
                        <span class="day-label">Freitag</span>
                        <div class="time-block">
                            <div class="time-input">
                                <i class="fas fa-clock"></i>
                                <input type="text" placeholder="08:00">
                            </div>
                            <span class="time-separator">-</span>
                            <div class="time-input">
                                <i class="fas fa-clock"></i>
                                <input type="text" placeholder="12:00">
                            </div>
                        </div>
                        <div class="time-block pause-block">
                            <div class="time-input">
                                <i class="fas fa-clock"></i>
                                <input type="text" placeholder="13:00">
                            </div>
                            <span class="time-separator">-</span>
                            <div class="time-input">
                                <i class="fas fa-clock"></i>
                                <input type="text" placeholder="17:00">
                            </div>
                        </div>
                        <label class="toggle">
                            <input type="checkbox" checked>
                            <span class="slider"></span>
                        </label>
                    </div>
                    <div class="time-row">
                        <span class="day-label">Samstag</span>
                        <div class="time-block">
                            <div class="time-input">
                                <i class="fas fa-clock"></i>
                                <input type="text" placeholder="08:00">
                            </div>
                            <span class="time-separator">-</span>
                            <div class="time-input">
                                <i class="fas fa-clock"></i>
                                <input type="text" placeholder="17:00">
                            </div>
                        </div>
                        <div class="time-block pause-block hidden">
                            <div class="time-input">
                                <i class="fas fa-clock"></i>
                                <input type="text" placeholder="00:00">
                            </div>
                            <span class="time-separator">-</span>
                            <div class="time-input">
                                <i class="fas fa-clock"></i>
                                <input type="text" placeholder="00:00">
                            </div>
                        </div>
                        <label class="toggle">
                            <input type="checkbox">
                            <span class="slider"></span>
                        </label>
                    </div>
                    <div class="time-row">
                        <span class="day-label">Sonntag</span>
                        <div class="time-block">
                            <div class="time-input">
                                <i class="fas fa-clock"></i>
                                <input type="text" placeholder="00:00">
                            </div>
                            <span class="time-separator">-</span>
                            <div class="time-input">
                                <i class="fas fa-clock"></i>
                                <input type="text" placeholder="00:00">
                            </div>
                        </div>
                        <div class="time-block pause-block hidden">
                            <div class="time-input">
                                <i class="fas fa-clock"></i>
                                <input type="text" placeholder="00:00">
                            </div>
                            <span class="time-separator">-</span>
                            <div class="time-input">
                                <i class="fas fa-clock"></i>
                                <input type="text" placeholder="00:00">
                            </div>
                        </div>
                        <label class="toggle">
                            <input type="checkbox">
                            <span class="slider"></span>
                        </label>
                    </div>
                </div>

                <div class="officials-form-actions">
                    <button class="officials-save-btn">
                        Save <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
            </div>

            <div class="officials-content-card officials-form-card hidden" id="section-civil">
                <h2 class="officials-form-title">Civil Law & Daily Life</h2>

                <div class="officials-form-row">
                    <div class="officials-form-group">
                        <label>Title of Constitution</label>
                        <input type="text" placeholder="Type Title Here">
                    </div>
                    <div class="officials-form-group">
                        <label>Version</label>
                        <input type="text" placeholder="Type Title Here">
                    </div>
                    <div class="officials-form-group">
                        <label>Language</label>
                        <div class="officials-upload-field">
                            <span>Upload Icon</span>
                            <i class="fas fa-upload"></i>
                        </div>
                    </div>
                    <div class="officials-form-group">
                        <label>Audio</label>
                        <div class="officials-upload-field">
                            <span>Upload Audio</span>
                            <i class="fas fa-upload"></i>
                        </div>
                    </div>
                </div>

                <div class="officials-stand-info">Stand 01# - 16.01.2026</div>

                <div class="officials-text-editor">
                    <div class="officials-editor-placeholder">Text Editor Here</div>
                </div>

                <div class="officials-form-actions">
                    <button class="officials-save-btn">
                        Save <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
            </div>

            <div class="officials-content-card officials-form-card hidden" id="section-holidays">
                <h2 class="officials-form-title">Add new Ministrie</h2>

                <div class="holiday-header-row">
                    <div class="upload-icon-box">
                        <i class="fas fa-plus"></i>
                        <span>Upload Icon</span>
                    </div>
                    <div class="holiday-inputs">
                        <div class="holiday-row">
                            <input type="text" placeholder="Ministries Name" class="holiday-input">
                            <input type="text" placeholder="Memories Date" class="holiday-input">
                        </div>
                        <input type="text" placeholder="Describtion" class="holiday-input full">
                    </div>
                </div>

                <div class="upload-media-row">
                    <div class="upload-media-box">
                        <i class="fas fa-image"></i>
                        <span class="upload-label">Upload Banner Image</span>
                        <span class="upload-format">JPG - PNG</span>
                    </div>
                    <div class="upload-media-box">
                        <i class="fas fa-video"></i>
                        <span class="upload-label">Upload Banner Video</span>
                        <span class="upload-format">MP4</span>
                    </div>
                </div>

                <div class="holiday-footer">
                    <div class="holiday-tag">
                        <i class="fas fa-flag"></i>
                        <div class="tag-info">
                            <span class="tag-title">Komara</span>
                            <span class="tag-subtitle">National Day</span>
                        </div>
                        <label class="toggle small">
                            <input type="checkbox" checked>
                            <span class="slider"></span>
                        </label>
                    </div>
                    <button class="officials-save-btn">
                        Save <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
            </div>
        </main>

        <aside class="officials-right-panel" id="panel-constitution">
            <div class="officials-panel-header">
                <h3>Constitution of Kurdistan</h3>
                <span class="officials-total-count">Total 5</span>
            </div>

            <div class="officials-entry-card">
                <div class="entry-content">
                    <h4>About Kurdistan</h4>
                    <p>Stand 01# - 01.2026</p>
                </div>
                <div class="officials-entry-actions">
                    <div class="officials-action-icon edit"><i class="fas fa-pen"></i></div>
                    <div class="officials-action-icon remove"><i class="fas fa-trash"></i></div>
                </div>
                <div class="entry-flag">
                    <img src="https://flagcdn.com/w40/in.png" alt="Flag">
                </div>
            </div>

            <div class="officials-entry-card">
                <div class="entry-content">
                    <h4>About Kurdistan</h4>
                    <p>Stand 01# - 01.2026</p>
                </div>
                <div class="officials-entry-actions">
                    <div class="officials-action-icon edit"><i class="fas fa-pen"></i></div>
                    <div class="officials-action-icon remove"><i class="fas fa-trash"></i></div>
                </div>
                <div class="entry-flag">
                    <img src="https://flagcdn.com/w40/tj.png" alt="Flag">
                </div>
            </div>

            <div class="officials-entry-card">
                <div class="entry-content">
                    <h4>About Kurdistan</h4>
                    <p>Stand 01# - 01.2026</p>
                </div>
                <div class="officials-entry-actions">
                    <div class="officials-action-icon edit"><i class="fas fa-pen"></i></div>
                    <div class="officials-action-icon remove"><i class="fas fa-trash"></i></div>
                </div>
                <div class="entry-flag flag-kurdistan">
                    <div class="kurd-flag">
                        <div class="red"></div>
                        <div class="white"></div>
                        <div class="green"></div>
                    </div>
                </div>
            </div>

            <div class="officials-entry-card">
                <div class="entry-content">
                    <h4>About Kurdistan</h4>
                    <p>Stand 01# - 01.2026</p>
                </div>
                <div class="officials-entry-actions">
                    <div class="officials-action-icon edit"><i class="fas fa-pen"></i></div>
                    <div class="officials-action-icon remove"><i class="fas fa-trash"></i></div>
                </div>
                <div class="entry-flag">
                    <img src="https://flagcdn.com/w40/de.png" alt="Flag">
                </div>
            </div>

            <div class="officials-entry-card">
                <div class="entry-content">
                    <h4>About Kurdistan</h4>
                    <p>Stand 01# - 01.2026</p>
                </div>
                <div class="officials-entry-actions">
                    <div class="officials-action-icon edit"><i class="fas fa-pen"></i></div>
                    <div class="officials-action-icon remove"><i class="fas fa-trash"></i></div>
                </div>
                <div class="entry-flag">
                    <img src="https://flagcdn.com/w40/gb.png" alt="Flag">
                </div>
            </div>
        </aside>

        <aside class="officials-right-panel hidden" id="panel-people">
            <div class="officials-panel-header">
                <h3>People & Territory</h3>
                <span class="officials-total-count">Total 5</span>
            </div>

            <div class="officials-entry-card">
                <div class="entry-content">
                    <h4>About Kurdistan</h4>
                    <p>Stand 01# - 01.2026</p>
                </div>
                <div class="officials-entry-actions">
                    <div class="officials-action-icon edit"><i class="fas fa-pen"></i></div>
                    <div class="officials-action-icon remove"><i class="fas fa-trash"></i></div>
                </div>
                <div class="entry-flag">
                    <img src="https://flagcdn.com/w40/in.png" alt="Flag">
                </div>
            </div>

            <div class="officials-entry-card">
                <div class="entry-content">
                    <h4>About Kurdistan</h4>
                    <p>Stand 01# - 01.2026</p>
                </div>
                <div class="officials-entry-actions">
                    <div class="officials-action-icon edit"><i class="fas fa-pen"></i></div>
                    <div class="officials-action-icon remove"><i class="fas fa-trash"></i></div>
                </div>
                <div class="entry-flag">
                    <img src="https://flagcdn.com/w40/tj.png" alt="Flag">
                </div>
            </div>

            <div class="officials-entry-card">
                <div class="entry-content">
                    <h4>About Kurdistan</h4>
                    <p>Stand 01# - 01.2026</p>
                </div>
                <div class="officials-entry-actions">
                    <div class="officials-action-icon edit"><i class="fas fa-pen"></i></div>
                    <div class="officials-action-icon remove"><i class="fas fa-trash"></i></div>
                </div>
                <div class="entry-flag flag-kurdistan">
                    <div class="kurd-flag">
                        <div class="red"></div>
                        <div class="white"></div>
                        <div class="green"></div>
                    </div>
                </div>
            </div>

            <div class="officials-entry-card">
                <div class="entry-content">
                    <h4>About Kurdistan</h4>
                    <p>Stand 01# - 01.2026</p>
                </div>
                <div class="officials-entry-actions">
                    <div class="officials-action-icon edit"><i class="fas fa-pen"></i></div>
                    <div class="officials-action-icon remove"><i class="fas fa-trash"></i></div>
                </div>
                <div class="entry-flag">
                    <img src="https://flagcdn.com/w40/de.png" alt="Flag">
                </div>
            </div>

            <div class="officials-entry-card">
                <div class="entry-content">
                    <h4>About Kurdistan</h4>
                    <p>Stand 01# - 01.2026</p>
                </div>
                <div class="officials-entry-actions">
                    <div class="officials-action-icon edit"><i class="fas fa-pen"></i></div>
                    <div class="officials-action-icon remove"><i class="fas fa-trash"></i></div>
                </div>
                <div class="entry-flag">
                    <img src="https://flagcdn.com/w40/gb.png" alt="Flag">
                </div>
            </div>
        </aside>

        <aside class="officials-right-panel hidden" id="panel-structure">
            <div class="officials-panel-header">
                <h3>Minstries</h3>
                <span class="officials-total-count">Total 5</span>
            </div>

            <div class="officials-entry-card">
                <div class="ministry-icon">
                    <div class="icon-shape green"></div>
                    <div class="icon-shape red"></div>
                </div>
                <div class="entry-content">
                    <h4>Wezareta</h4>
                    <p>Tenduristi ü Pişeyên Bijîşkî...</p>
                </div>
                <div class="officials-entry-actions">
                    <div class="officials-action-icon edit"><i class="fas fa-pen"></i></div>
                    <div class="officials-action-icon remove"><i class="fas fa-trash"></i></div>
                </div>
            </div>

            <div class="officials-entry-card">
                <div class="ministry-icon">
                    <div class="icon-shape green"></div>
                    <div class="icon-shape red"></div>
                </div>
                <div class="entry-content">
                    <h4>Wezareta</h4>
                    <p>Tenduristi ü Pişeyên Bijîşkî...</p>
                </div>
                <div class="officials-entry-actions">
                    <div class="officials-action-icon edit"><i class="fas fa-pen"></i></div>
                    <div class="officials-action-icon remove"><i class="fas fa-trash"></i></div>
                </div>
            </div>

            <div class="officials-entry-card">
                <div class="ministry-icon">
                    <div class="icon-shape green"></div>
                    <div class="icon-shape red"></div>
                </div>
                <div class="entry-content">
                    <h4>Wezareta</h4>
                    <p>Tenduristi ü Pişeyên Bijîşkî...</p>
                </div>
                <div class="officials-entry-actions">
                    <div class="officials-action-icon edit"><i class="fas fa-pen"></i></div>
                    <div class="officials-action-icon remove"><i class="fas fa-trash"></i></div>
                </div>
            </div>

            <div class="officials-entry-card">
                <div class="ministry-icon">
                    <div class="icon-shape green"></div>
                    <div class="icon-shape red"></div>
                </div>
                <div class="entry-content">
                    <h4>Wezareta</h4>
                    <p>Tenduristi ü Pişeyên Bijîşkî...</p>
                </div>
                <div class="officials-entry-actions">
                    <div class="officials-action-icon edit"><i class="fas fa-pen"></i></div>
                    <div class="officials-action-icon remove"><i class="fas fa-trash"></i></div>
                </div>
            </div>

            <div class="officials-entry-card">
                <div class="ministry-icon">
                    <div class="icon-shape green"></div>
                    <div class="icon-shape red"></div>
                </div>
                <div class="entry-content">
                    <h4>Wezareta</h4>
                    <p>Tenduristi ü Pişeyên Bijîşkî...</p>
                </div>
                <div class="officials-entry-actions">
                    <div class="officials-action-icon edit"><i class="fas fa-pen"></i></div>
                    <div class="officials-action-icon remove"><i class="fas fa-trash"></i></div>
                </div>
            </div>
        </aside>

        <aside class="officials-right-panel hidden" id="panel-civil">
            <div class="officials-panel-header">
                <h3>Constitution of Kurdistan</h3>
                <span class="officials-total-count">Total 5</span>
            </div>

            <div class="officials-entry-card">
                <div class="entry-content">
                    <h4>About Kurdistan</h4>
                    <p>Stand 01# - 01.2026</p>
                </div>
                <div class="entry-flag kurdistan-flag">
                    <div class="flag-stripe red"></div>
                    <div class="flag-stripe white"></div>
                    <div class="flag-stripe green"></div>
                </div>
                <div class="officials-entry-actions">
                    <div class="officials-action-icon edit"><i class="fas fa-pen"></i></div>
                    <div class="officials-action-icon remove"><i class="fas fa-trash"></i></div>
                </div>
            </div>

            <div class="officials-entry-card">
                <div class="entry-content">
                    <h4>About Kurdistan</h4>
                    <p>Stand 01# - 01.2026</p>
                </div>
                <div class="entry-flag kurdistan-flag">
                    <div class="flag-stripe red"></div>
                    <div class="flag-stripe white"></div>
                    <div class="flag-stripe green"></div>
                </div>
                <div class="officials-entry-actions">
                    <div class="officials-action-icon edit"><i class="fas fa-pen"></i></div>
                    <div class="officials-action-icon remove"><i class="fas fa-trash"></i></div>
                </div>
            </div>
        </aside>

        <aside class="officials-right-panel hidden" id="panel-holidays">
            <div class="officials-panel-header">
                <h3>Holidays & Memory's</h3>
                <span class="officials-total-count">Total 5</span>
            </div>

            <div class="officials-entry-card holiday-entry">
                <div class="holiday-emoji">🔥</div>
                <div class="entry-content">
                    <h4>Neworz</h4>
                    <p>the Kurdish National Day......</p>
                </div>
                <div class="officials-entry-actions">
                    <div class="officials-action-icon view"><i class="fas fa-eye"></i></div>
                    <div class="officials-action-icon options"><i class="fas fa-ellipsis-v"></i></div>
                </div>
            </div>

            <div class="officials-entry-card holiday-entry">
                <div class="holiday-emoji">🔥</div>
                <div class="entry-content">
                    <h4>Neworz</h4>
                    <p>the Kurdish National Day......</p>
                </div>
                <div class="officials-entry-actions">
                    <div class="officials-action-icon view"><i class="fas fa-eye"></i></div>
                    <div class="officials-action-icon options"><i class="fas fa-ellipsis-v"></i></div>
                </div>
            </div>
        </aside>
    </div>

    <script>
        document.querySelectorAll('.officials-menu-item').forEach(item => {
            item.addEventListener('click', function() {
                document.querySelectorAll('.officials-menu-item').forEach(m => m.classList.remove('active'));
                this.classList.add('active');

                const section = this.getAttribute('data-section');

                document.querySelectorAll('.officials-content-card').forEach(card => card.classList.add('hidden'));
                document.getElementById('section-' + section).classList.remove('hidden');

                document.querySelectorAll('.officials-right-panel').forEach(panel => panel.classList.add('hidden'));
                document.getElementById('panel-' + section).classList.remove('hidden');
            });
        });

        const durchgehendToggle = document.getElementById('durchgehendToggle');
        const openingTimes = document.querySelector('.opening-times');

        if (durchgehendToggle && openingTimes) {
            durchgehendToggle.addEventListener('change', function() {
                if (this.checked) {
                    openingTimes.classList.add('durchgehend');
                } else {
                    openingTimes.classList.remove('durchgehend');
                }
            });
        }
    </script>
@endsection

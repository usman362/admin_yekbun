@extends('layouts/layoutMaster')

@section('title', 'Api Status - List')

@section('page-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-icons.css') }}" />
    <style>
        #DataTables_Table_0_wrapper .row:first-child {
            display: none;
        }

        .btn-primary {
            color: #fff !important;
            background-color: #696cff !important;
            border-color: #696cff !important;
            box-shadow: 0 0.125rem 0.25rem 0 rgba(105, 108, 255, 0.4) !important;
        }

        .modal-content {
            overflow: unset !important;
        }

        .pop-img {
            width: 100%;
        }

        .pop-heading {
            font-weight: bold;
            color: #000;
        }

        .pop-txt {
            color: #000;
            font-size: 14px;
        }

        .pop_action_div {
            display: flex;
            align-items: center;
            justify-content: center;
            position: absolute;
            top: 24px;
            left: auto;
            right: 20px;
        }

        .pop_action {
            background: #F2F2F2;
            border-radius: 7px;
            width: 30px;
            height:
                30px;
            margin: 5px;
            cursor: pointer;
            border: 0px;
        }

        .pop_action_image {
            width: 30px;
            padding: 5px;
            height: 30px;
            object-fit: cover
        }

        .pop_div {
            background-color: #fff;
            border-radius: 10px;
            padding: 5px
        }

        .pop_sub {
            height: 30;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 0;
            top: 10px
        }

        .pop_head {
            background-color: #f8f9fa;
            border-radius: 5px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 5px
        }

        .pop_tit {
            display: flex;
            align-items: start;
            align-items: center
        }

        .pop_heading {
            display: flex;
            flex-direction: column;
            justify-content: start;
            align-items: flex-start;
            margin-left: 5px;
            gap: 8px
        }

        .pop_head_line {
            font-family: Genos;
            font-size: 20px;
            text-underline-position: from-font;
            text-decoration-skip-ink: none;
            display: flex;
            align-items: center;
            gap: 5px
        }

        .pop_title {
            border-radius: 45%;
            background: #00000066
        }

        .pop_description {
            font-size: 14px;
            font-weight: 400;
            color: gray;
            text-align: left;
            background: #f7f7f7;
            padding: 7px;
            font-family: Genos;
            margin-top: 7px;
            margin-bottom: 7px;
            border-radius: 5px;
            display: flex;
            align-items: center;
            justify-content: left
        }

        .pop_main_image {
            position: relative;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, .1)
        }

        .pop_overlay {
            position: absolute;
            bottom: 10px;
            left: 10px;
            display: flex;
            align-items: center;
            border-radius: 5px;
            background: #1c274C99;
            gap: 5px
        }

        .modal-content {
            max-height: 90vh !important;
            /* Set max height */
            overflow: unset !important;
            /* Prevent overflow */
        }

        .modal-body {
            max-height: 70vh !important;
            /* Adjust based on your layout */
            overflow-y: auto !important;
            /* Enables scrolling if content exceeds max height */
        }
    </style>
    <style>
        .card-post {
            box-shadow: none;
            cursor: pointer;
        }

        .card-post:hover {
            box-shadow: 0 2px 6px 0 rgba(67, 89, 113, 0.12);
            background-clip: padding-box;
            cursor: pointer;
            background: #f6f6f6;
        }

        .card-post-thumbnail {
            height: 200px;
            width: 100%;
            background-size: cover;
            background-repeat: no-repeat;
            position: relative;
            border-radius: 12px;
        }

        .post-image {
            position: relative;
        }

        .post-image .dropdown {
            margin-top: -215px;
            display: none;
        }

        .dropdown-content {
            border: none !important;
        }

        .fancybox__container {
            z-index: 99999 !important;
        }

        .fancybox__nav {
            display: none !important;
        }

        .fancybox__thumbs {
            display: none !important;
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
    <link rel="stylesheet" href="{{ asset('assets/friendkit/css/core.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/rtl/core.css') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css" />
@endsection
@section('vendor-script')
    <!-- Fancybox -->

    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.umd.js"></script>

    <script src="{{ asset('assets/vendor/libs/flatpickr/flatpickr.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/tagify/tagify.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection

@section('content')
    <script>
        const dropZoneInitFunctions = [];
    </script>
    {{-- Nav TAb --}}
    <div class="d-flex justify-content-between">
        <div>
            <h4 class="fw-bold py-3 mb-4">
                <span class="text-muted fw-light">Api Status /</span> All Api
            </h4>
        </div>
    </div>

    <!-- Artist List Table -->
    <div class="card">

        <div class="table-responsive container pb-4 text-nowrap">
            <table id="apiTable" class="table artist-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Method</th>
                        <th>URL</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

@section('page-script')

    <script>
        $(document).ready(function() {
            const table = $('#apiTable').DataTable({
                ajax: '{{ route('api.list') }}',
                columns: [{
                        data: null,
                        render: (data, type, row, meta) => meta.row + 1
                    },
                    {
                        data: 'method'
                    },
                    {
                        data: 'url'
                    },
                    {
                        data: 'status',
                        render: data => `<span class="status-text">${data}</span>`
                    },
                    {
                        data: null,
                        render: (data) => `
                    <button class="test-btn btn btn-sm btn-primary" data-url="${data.url}" data-method="${data.method}">
                        Test
                    </button>
                `
                    }
                ]
            });

            // On click test single API
            $('#apiTable').on('click', '.test-btn', function() {
                const btn = $(this);
                const row = btn.closest('tr');
                const url = btn.data('url');
                const method = btn.data('method');
                const statusCell = row.find('.status-text');

                statusCell.text('⏳ Testing...');

                $.get('{{ route('api.check') }}', {
                        url,
                        method
                    })
                    .done(function(res) {
                        const msg = `${res.message} (${res.status_code}) – ${res.time}`;
                        statusCell.html(
                            `<span style="color: ${res.message.includes('✅') ? 'green' : 'red'}">${msg}</span>`
                            );
                    })
                    .fail(function() {
                        statusCell.html('<span style="color:red">❌ Request failed</span>');
                    });
            });
        });
    </script>

@endsection
@endsection

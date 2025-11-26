@extends('layouts/layoutMaster')

@section('title', 'Languages')


@section('page-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-icons.css') }}" />

@endsection
@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/flatpickr/flatpickr.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/tagify/tagify.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/animate-css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.css') }}" />
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/flatpickr/flatpickr.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/tagify/tagify.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
@endsection

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.css" />
<style>
    img,
    svg {
        vertical-align: middle !important;
        height: 48px !important;
    }

    html:not([dir=rtl]) .progress .progress-bar:first-child {
        border-top-right-radius: 10rem;
        border-bottom-right-radius: 10rem;
    }

    .progessDiv {
        position: relative;
    }

    .progessDiv span {
        position: absolute;
        left: 32;
        top: 0;
        font-size: 9px;
        font-weight: bold;
        color: #262626;
    }
</style>
@section('content')

    <div class="d-flex justify-content-between">
        <div>
            <h4 class="fw-bold py-3 mb-4">
                <span class="text-muted fw-light">Language /</span> All Language
            </h4>
        </div>
        <div class="">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createlanguageModal">Add
                Language</button>
        </div>
    </div>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <!-- Basic Bootstrap Table -->
    <div class="card">
        <h5 class="card-header">List of Language</h5>
        <div class="card-datatable table-responsive">
            <input type="hidden" id="checkbox_value">
            <table class="datatables-basic table border-top">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Language</th>
                        <th>Icon</th>
                        <th>Code</th>
                        <th>Status</th>
                        <th>Progress</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @if (count($languages))
                        @foreach ($languages as $language)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $language->title ?? '' }}</td>
                                <td>
                                    @if (is_array($language->icon) && isset($language->icon['path']))
                                        <img src="{{ asset('storage/' . $language->icon['path']) }}" width="50"
                                            height="50">
                                    @elseif(is_string($language->icon))
                                        <img src="{{ asset('storage/' . $language->icon) }}" width="50" height="50">
                                    @else
                                        <!-- Handle the case where $language->icon is neither a valid array nor a string -->
                                        <img src="{{ asset('path/to/default/icon.png') }}" width="50" height="50">
                                    @endif
                                </td>
                                <td>{{ $language->code ?? '' }}</td>
                                <td><span
                                        class="badge bg-{{ $language->status == '1' ? 'success' : 'danger' }}">{{ $language->status == '1' ? 'Published' : 'Unpublished' }}</span>
                                </td>
                                <td>
                                    <div class="progessDiv">
                                        <div class="progress">
                                            <div class="progress-bar bg-success" role="progressbar"
                                                style="width: {{ $language->progress }}%"
                                                aria-valuenow="{{ $language->progress }}" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                        <span style="left: 65">{{ $language->progress }}%</span>
                                    </div>

                                </td>
                                <td>
                                    <div class="">
                                        <span data-bs-toggle="modal" data-bs-target="#editDetailsModal">
                                            <button class="btn pl-0 edit-details-btn" data-bs-toggle="tooltip"
                                                data-bs-offset="0,4" data-id="{{ $language->id }}"
                                                data-name="{{ $language->title }}" data-bs-placement="top"
                                                data-bs-html="true" data-bs-original-title="Details">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M9 9H15" stroke="#1C274C" stroke-width="1.5"
                                                        stroke-linecap="round" />
                                                    <path d="M12 15L12 9" stroke="#1C274C" stroke-width="1.5"
                                                        stroke-linecap="round" />
                                                    <path
                                                        d="M6 4C6 5.10457 5.10457 6 4 6C2.89543 6 2 5.10457 2 4C2 2.89543 2.89543 2 4 2C5.10457 2 6 2.89543 6 4Z"
                                                        stroke="#1C274C" stroke-width="1.5" />
                                                    <path
                                                        d="M6 20C6 21.1046 5.10457 22 4 22C2.89543 22 2 21.1046 2 20C2 18.8954 2.89543 18 4 18C5.10457 18 6 18.8954 6 20Z"
                                                        stroke="#1C274C" stroke-width="1.5" />
                                                    <path
                                                        d="M22 4C22 5.10457 21.1046 6 20 6C18.8954 6 18 5.10457 18 4C18 2.89543 18.8954 2 20 2C21.1046 2 22 2.89543 22 4Z"
                                                        stroke="#1C274C" stroke-width="1.5" />
                                                    <path
                                                        d="M22 20C22 21.1046 21.1046 22 20 22C18.8954 22 18 21.1046 18 20C18 18.8954 18.8954 18 20 18C21.1046 18 22 18.8954 22 20Z"
                                                        stroke="#1C274C" stroke-width="1.5" />
                                                    <path opacity="0.5" d="M6 20H18" stroke="#1C274C" stroke-width="1.5"
                                                        stroke-linecap="round" />
                                                    <path opacity="0.5" d="M18 4H6" stroke="#1C274C" stroke-width="1.5"
                                                        stroke-linecap="round" />
                                                    <path opacity="0.5" d="M20 18L20 6" stroke="#1C274C" stroke-width="1.5"
                                                        stroke-linecap="round" />
                                                    <path opacity="0.5" d="M4 6L4 18" stroke="#1C274C" stroke-width="1.5"
                                                        stroke-linecap="round" />
                                                </svg>
                                            </button>
                                        </span>

                                        <span data-bs-toggle="modal"
                                            data-bs-target="#EditlanguageModal{{ $language->id }}">
                                            <button class="btn text-danger btn-language pl-0" data-bs-toggle="tooltip"
                                                data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true"
                                                data-bs-original-title="Edit">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path opacity="0.5" d="M4 22H20" stroke="#1C274C" stroke-width="1.5"
                                                        stroke-linecap="round" />
                                                    <path
                                                        d="M14.6296 2.92142L13.8881 3.66293L7.07106 10.4799C6.60933 10.9416 6.37846 11.1725 6.17992 11.4271C5.94571 11.7273 5.74491 12.0522 5.58107 12.396C5.44219 12.6874 5.33894 12.9972 5.13245 13.6167L4.25745 16.2417L4.04356 16.8833C3.94194 17.1882 4.02128 17.5243 4.2485 17.7515C4.47573 17.9787 4.81182 18.0581 5.11667 17.9564L5.75834 17.7426L8.38334 16.8675L8.3834 16.8675C9.00284 16.6611 9.31256 16.5578 9.60398 16.4189C9.94775 16.2551 10.2727 16.0543 10.5729 15.8201C10.8275 15.6215 11.0583 15.3907 11.5201 14.929L11.5201 14.9289L18.3371 8.11195L19.0786 7.37044C20.3071 6.14188 20.3071 4.14999 19.0786 2.92142C17.85 1.69286 15.8581 1.69286 14.6296 2.92142Z"
                                                        stroke="#1C274C" stroke-width="1.5" />
                                                    <path opacity="0.5"
                                                        d="M13.8879 3.66406C13.8879 3.66406 13.9806 5.23976 15.3709 6.63008C16.7613 8.0204 18.337 8.11308 18.337 8.11308M5.75821 17.7437L4.25732 16.2428"
                                                        stroke="#1C274C" stroke-width="1.5" />
                                                </svg>
                                            </button>
                                        </span>

                                        @if ($language->progress == 0)
                                            <form action="{{ route('language.destroy', $language->id) }}"
                                                onsubmit="confirmAction(event, () => event.target.submit())"
                                                method="post" class="d-inline">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-icon"
                                                    data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top"
                                                    data-bs-html="true" data-bs-original-title="Remove">
                                                    <svg width="24" height="24" viewBox="0 0 24 24"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M20.5001 6H3.5" stroke="#1C274C" stroke-width="1.5"
                                                            stroke-linecap="round" />
                                                        <path
                                                            d="M18.8334 8.5L18.3735 15.3991C18.1965 18.054 18.108 19.3815 17.243 20.1907C16.378 21 15.0476 21 12.3868 21H11.6134C8.9526 21 7.6222 21 6.75719 20.1907C5.89218 19.3815 5.80368 18.054 5.62669 15.3991L5.16675 8.5"
                                                            stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" />
                                                        <path opacity="0.5" d="M9.5 11L10 16" stroke="#1C274C"
                                                            stroke-width="1.5" stroke-linecap="round" />
                                                        <path opacity="0.5" d="M14.5 11L14 16" stroke="#1C274C"
                                                            stroke-width="1.5" stroke-linecap="round" />
                                                        <path opacity="0.5"
                                                            d="M6.5 6C6.55588 6 6.58382 6 6.60915 5.99936C7.43259 5.97849 8.15902 5.45491 8.43922 4.68032C8.44784 4.65649 8.45667 4.62999 8.47434 4.57697L8.57143 4.28571C8.65431 4.03708 8.69575 3.91276 8.75071 3.8072C8.97001 3.38607 9.37574 3.09364 9.84461 3.01877C9.96213 3 10.0932 3 10.3553 3H13.6447C13.9068 3 14.0379 3 14.1554 3.01877C14.6243 3.09364 15.03 3.38607 15.2493 3.8072C15.3043 3.91276 15.3457 4.03708 15.4286 4.28571L15.5257 4.57697C15.5433 4.62992 15.5522 4.65651 15.5608 4.68032C15.841 5.45491 16.5674 5.97849 17.3909 5.99936C17.4162 6 17.4441 6 17.5 6"
                                                            stroke="#1C274C" stroke-width="1.5" />
                                                    </svg>
                                                </button>
                                            </form>
                                        @endif

                                        @include('content.include.language.editForm', [
                                            'language' => $language,
                                        ])
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td class="text-center" colspan="8">No Language found.</td>
                        </tr>
                    @endif
                </tbody>
            </table>

        </div>
    </div>

    <div class="modal fade" id="editDetailsModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" style="max-width:52rem" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="d-flex justify-content-between">
                        <h5 class="modal-title" id="modalCenterTitle">Edit
                            <span class="text-info languageName">{{ @$language->title }}</span>
                            Language
                        </h5>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ul class="nav nav-pills sections-tabs mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                aria-selected="true">Home Page</button>
                        </li>
                    </ul>
                    <div class="card">
                        <div class="table-responsive text-nowrap">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Section</th>
                                        <th>Progress</th>
                                        <th>Done</th>
                                        <th>Total</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>

                                <tbody id="sectionsTable">
                                    <tr>
                                        <td colspan="5" class="text-center">
                                            <img src="{{ asset('images/spin-loader.gif') }}" alt=""
                                                width="100">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editKeywordsModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="row w-100">
                        <div class="col-md-8">
                            <h5 class="modal-title" id="modalCenterTitle">
                                Edit <span class="text-primary">"<span class="sectionName"></span>"</span>
                                <span class="text-info languageName">- {{ @$language->title }}</span>
                                Language
                            </h5>
                        </div>
                        <div class="col-md-4">
                            <!-- Select for sorting -->
                            <select id="sortSelect" class="form-control" onchange="sortKeywords()">
                                <option value="">-- Sort By --</option>
                                <option value="name">Sort by Name</option>
                                <option value="empty">Sort by Empty Translation</option>
                            </select>
                        </div>
                    </div>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>


                <form id="updateKeywordsForm" action="{{ route('languages.keywords.store') }}" method="POST">
                    @csrf
                    <input type="hidden" id="keyword_language_id" name="language_id">
                    <input type="hidden" id="keyword_section_name" name="language_section">
                    <div class="modal-body">
                        {{-- <div class="container"> --}}
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <h5>English Language</h5>
                            </div>
                            <div class="col-md-6">
                                <h5><span class="languageName">{{ @$language->title }}</span> Language</h5>
                            </div>
                        </div>
                        <div id="keywordsTable">
                            <tr>
                                <td colspan="5" class="text-center">
                                    <img src="{{ asset('images/spin-loader.gif') }}" alt="" width="100">
                                </td>
                            </tr>
                        </div>
                        {{-- </div> --}}
                    </div>
                    <div class="container-fluid">
                        <div class="ajax_status" style="text-align: right"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-label-primary">Save Changes</button>
                        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="uploadFileModal" tabindex="-1" aria-labelledby="uploadFileModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <form id="uploadFileForm" enctype="multipart/form-data" method="POST">
                @csrf
                <input type="hidden" id="upload_section_name" name="section_name">
                <input type="hidden" id="upload_language_id" name="language_id">
                <input type="hidden" name="main_section" id="main_section_input">
                <input type="hidden" id="upload_language_code" name="language_code">


                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Upload File for <span class="upload-section-name"></span></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="file" name="file" id="uploadFileInput" class="form-control" required>
                        <div class="ajax_upload_status mt-2"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary json-btn-submit">Upload</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <x-modal id="createlanguageModal" title="Create Language" saveBtnText="Create" saveBtnType="submit"
        saveBtnForm="createForm2" size="md">
        @include('content.include.language.createForm')
    </x-modal>

@section('page-script')
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
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.js"></script>
    <script type="text/javascript">
        function custom_template(obj) {
            var data = $(obj.element).data();
            var text = $(obj.element).text();
            if (data && data['img_src']) {
                img_src = data['img_src'];
                template = $("<div style=\"display:flex;gap:4px;margin-top:10px;\"><img src=\"" + img_src +
                    "\" style=\"width:20px;height:20px;border-radius:20px;\"/><p style=\"font-weight: 400;font-size:10pt; margin-top:-5px;\">" +
                    text + "</p></div>");
                return template;
            }
        }
        var options = {
            'templateSelection': custom_template,
            'templateResult': custom_template,
        }
        $('#id_select2_example').select2(options);
        $('.select2-container--default .select2-selection--single').css({
            'height': '47px'
        });

        $(".btn-language").click(function() {
            $("#modalCenterTitle").text("Edit language");
        })
    </script>
    <script>
        const uploadFileIcon = "{{ asset('assets/svg/upload-file.svg') }}";
        const downloadFileIcon = "{{ asset('assets/svg/download-file.svg') }}";
        const editIconSvg = `
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <path d="M9 9H15" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" />
            <path d="M12 15L12 9" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" />
            <path d="M6 4C6 5.10457 5.10457 6 4 6C2.89543 6 2 5.10457 2 4C2 2.89543 2.89543 2 4 2C5.10457 2 6 2.89543 6 4Z" stroke="#1C274C" stroke-width="1.5" />
            <path d="M6 20C6 21.1046 5.10457 22 4 22C2.89543 22 2 21.1046 2 20C2 18.8954 2.89543 18 4 18C5.10457 18 6 18.8954 6 20Z" stroke="#1C274C" stroke-width="1.5" />
            <path d="M22 4C22 5.10457 21.1046 6 20 6C18.8954 6 18 5.10457 18 4C18 2.89543 18.8954 2 20 2C21.1046 2 22 2.89543 22 4Z" stroke="#1C274C" stroke-width="1.5" />
            <path d="M22 20C22 21.1046 21.1046 22 20 22C18.8954 22 18 21.1046 18 20C18 18.8954 18.8954 18 20 18C21.1046 18 22 18.8954 22 20Z" stroke="#1C274C" stroke-width="1.5" />
            <path opacity="0.5" d="M6 20H18" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" />
            <path opacity="0.5" d="M18 4H6" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" />
            <path opacity="0.5" d="M20 18L20 6" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" />
            <path opacity="0.5" d="M4 6L4 18" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" />
        </svg>`;

        $(document).ready(function() {
            function renderSectionRow(section, languageId) {
                const progress = section.total > 0 ? Math.round((section.done / section.total) * 100) : 0;
                return `
                <tr>
                    <td>
                        <input type="checkbox" class="row-check" id="chk-${section.section_name.toLowerCase().replace(/\s+/g, '-')}">
                        ${section.section_name}</td>
                    <td>
                        <div class="progessDiv">
                            <div class="progress">
                                <div class="progress-bar bg-success" role="progressbar" style="width: ${progress}%" aria-valuenow="${progress}" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <span>${progress}%</span>
                        </div>
                    </td>
                    <td>${section.done}</td>
                    <td>${section.total}</td>
                    <td>
                        <a href="#" data-section_name="${section.section_name}" data-language_id="${languageId}" class="edit_section_details me-3" title="Edit">${editIconSvg}</a>
                        <a href="#" class="add_section_details me-3" data-section_name="${section.section_name}" data-language_id="${languageId}" title="Upload JSON">
                            <img src="${uploadFileIcon}" width="30" height="30" alt="Upload JSON">
                        </a>
                        <a href="#" class="download_section_details" data-section_name="${section.section_name}" data-language_id="${languageId}" title="Download JSON">
                            <img src="${downloadFileIcon}" width="30" height="30" alt="Download JSON">
                        </a>
                    </td>
                </tr>`;
            }

            function camelCaseToTitle(str) {
                return str.replace(/([A-Z])/g, ' $1').replace(/^./, s => s.toUpperCase());
            }

            $('.edit-details-btn').on('click', function() {
                const id = $(this).data('id');
                $('.languageName').text($(this).data('name'));
                $('.add_language_section').attr('data-id', id);
                $('.ajax_status').html('');

                $.get(`/languages/${id}/sections`, function(data) {
                    const rows = data.sections.map(s => renderSectionRow(s, data.language_id)).join(
                        '');
                    const tabs = data.main_sections.map((s, i) => {
                        // console.log('main',s.main_section);
                        if (s.main_section !== null) {
                            const slug = s.main_section.toLowerCase().replace(/\s+/g, '-');
                            return `
                            <li class="nav-item" role="presentation">
                                <button class="nav-link ${i === 0 ? 'active' : ''} change-section-tab" id="pills-${slug}-tab" data-bs-toggle="pill" data-bs-target="#pills-${slug}" type="button" role="tab" aria-controls="pills-${slug}" aria-selected="true" data-id="${id}" data-section_name="${slug}">
                                    ${s.main_section}
                                </button>
                            </li>`;
                        }
                    }).join('');

                    $('.sections-tabs').html(tabs);
                    $('#sectionsTable').html(rows);
                    sortKeywordsSectionn();
                    $('#'+$('#checkbox_value').val()).prop('checked', true);
                });

            });

            $('body').on('click', '.change-section-tab', function() {
                const id = $(this).data('id');
                const section_name = $(this).data('section_name');

                $.get(`/languages/${id}/sections/${section_name}`, function(data) {
                    const rows = data.sections.map(s => renderSectionRow(s, data.language_id)).join(
                        '');
                    $('#sectionsTable').html(rows);
                    sortKeywordsSectionn();
                    $('#'+$('#checkbox_value').val()).prop('checked', true);
                });

            });

            $('table').on('click', '.edit_section_details', function(e) {
                e.preventDefault();

                const sectionName = $(this).data('section_name');
                const languageId = $(this).data('language_id');

                $('.ajax_status').html('');
                $('#keyword_section_name').val(sectionName);
                $('#keyword_language_id').val(languageId);
                $('.sectionName').text(sectionName);

                // 👉 Hide editDetailsModal first
                const editDetailsModalEl = document.getElementById('editDetailsModal');
                const editDetailsModal = bootstrap.Modal.getInstance(editDetailsModalEl);
                if (editDetailsModal) {
                    editDetailsModal.hide();
                }

                $.get(`/languages/${languageId}/keywords/${sectionName}`, function(data) {
                    const html = data.keywords.map(k => `
            <div class="row">
                <div class="col-md-6">
                    <h6 class="m-0">${camelCaseToTitle(k.keyword)}</h6>
                    <input type="hidden" name="keyword[]" value="${k.keyword}">
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="translated[]" value="${k.translated}" placeholder="${camelCaseToTitle(k.keyword)}">
                </div>
            </div><hr>
        `).join('');

                    $('#keywordsTable').html(html);

                    // 👉 Show editKeywordsModal after hiding the first
                    const editKeywordsModal = new bootstrap.Modal(document.getElementById(
                        'editKeywordsModal'), {
                        backdrop: 'static',
                        keyboard: false
                    });
                    editKeywordsModal.show();
                });
            });


            document.getElementById('editKeywordsModal').addEventListener('hidden.bs.modal', function() {
                new bootstrap.Modal(document.getElementById('editDetailsModal')).show();
            });

            $('#updateKeywordsForm').on('submit', function(e) {
                e.preventDefault();
                let form = this;
                const formData = new FormData(this);
                let submitBtn = $(form).find(':submit');
                submitBtn.prop('disabled', true).text('Please wait...');
                $.ajax({
                    url: $(this).attr('action'),
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        // window.location.reload();
                        $('.ajax_status').html(
                            `<span class="text-success">Keywords Created Successfully!</span>`
                        );
                        $('#pills-' + response.main_section + '-tab').trigger('click');
                    },
                    error: function() {
                        $('.ajax_status').html(
                            `<span class="text-danger">Something Went Wrong!</span>`);
                    },
                    complete: function() {
                        submitBtn.prop('disabled', false).text(
                            'Save Changes'); // re-enable button
                    }
                });
            });

            $('table').on('click', '.add_section_details', function(e) {
                e.preventDefault();
                const sectionName = $(this).data('section_name');
                const languageId = $(this).data('language_id');
                const mainSection = $('.nav-link.active').text().replace(/\s+/g, ' ').trim();

                $('.upload-section-name').text(sectionName);
                $('#main_section_input').val(mainSection);
                $('#upload_language_id').val(languageId);
                $('#upload_section_name').val(sectionName);
                $('.ajax_upload_status').html('');
                $('#uploadFileInput').val('');

                const formActionUrl = `/languages/${languageId}/keywords/${sectionName}/upload-json`;
                $('#uploadFileForm').attr('action', formActionUrl);
                $('.json-btn-submit').css('display', 'block');
                $('.json-btn-submit').prop('disabled', false).text('Save Changes');
                new bootstrap.Modal(document.getElementById('uploadFileModal'), {
                    backdrop: 'static',
                    keyboard: false
                }).show();
            });

            $('body').on('click', '.edit_section_details, .add_section_details, .download_section_details',
                function(e) {
                    e.preventDefault();

                    // Uncheck all
                    $('.row-check').prop('checked', false);

                    // Check only in the clicked row
                    $(this).closest('tr').find('.row-check').prop('checked', true);

                    $('#checkbox_value').val($(this).closest('tr').find('.row-check').attr('id'));
                });


            $('#uploadFileForm').on('submit', function(e) {
                e.preventDefault();

                let form = this;
                let formData = new FormData(form);
                let submitBtn = $(form).find(':submit');
                submitBtn.prop('disabled', true).text('Please wait...');

                $.ajax({
                    url: form.action, // 👈 use form's action
                    type: form.method, // 👈 use form's method (POST/GET)
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        console.log('Success:', response);
                        $('.ajax_upload_status').html(`
                        <div class="alert alert-success text-dark" role="alert">
                            Upload is done. Thank you for your effort. Please check the app to see if all the words are translated correctly.
                        </div>`);
                        $('#pills-' + response.main_section + '-tab').trigger('click');
                    },
                    error: function(xhr) {
                        $('.ajax_upload_status').html(`
                        <div class="alert alert-danger" role="alert">
                            Something went wrong!
                        </div>`);
                        console.error('Error:', xhr.responseText);
                    },
                    complete: function() {
                        submitBtn.css('display', 'none');
                    }
                });
            });

            // ✅ Handle download JSON with main_section
            $('body').on('click', '.download_section_details', function(e) {
                e.preventDefault();

                const sectionName = $(this).data('section_name');
                const languageId = $(this).data('language_id');
                const mainSection = $('.nav-link.active').text()
                    .trim(); // Gets the active main_section tab text

                if (!sectionName || !languageId || !mainSection) {
                    alert('Missing section name, language ID, or main section.');
                    return;
                }

                const downloadUrl =
                    `/languages/${languageId}/download-json/${encodeURIComponent(sectionName)}?main_section=${encodeURIComponent(mainSection)}`;
                window.location.href = downloadUrl;
            });

        });
    </script>

    <script>
        function sortKeywords() {
            const sortType = document.getElementById("sortSelect").value;
            const container = document.getElementById("keywordsTable");

            // Get all rows (excluding <hr>)
            let rows = Array.from(container.querySelectorAll(".row"));

            rows.sort((a, b) => {
                let nameA = a.querySelector("h6").innerText.trim().toLowerCase();
                let nameB = b.querySelector("h6").innerText.trim().toLowerCase();
                let valA = a.querySelector("input[name='translated[]']").value.trim();
                let valB = b.querySelector("input[name='translated[]']").value.trim();

                if (sortType === "name") {
                    return nameA.localeCompare(nameB);
                } else if (sortType === "empty") {
                    if (valA === "" && valB !== "") return -1;
                    if (valA !== "" && valB === "") return 1;
                    return 0;
                }
                return 0;
            });

            // Re-append rows + their following <hr>
            container.innerHTML = "";
            rows.forEach(row => {
                container.appendChild(row);
                container.appendChild(document.createElement("hr"));
            });
        }

        function sortKeywords() {
            const sortType = document.getElementById("sortSelect").value;
            const container = document.getElementById("keywordsTable");

            // Get all rows (excluding <hr>)
            let rows = Array.from(container.querySelectorAll(".row"));

            rows.sort((a, b) => {
                let nameA = a.querySelector("h6").innerText.trim().toLowerCase();
                let nameB = b.querySelector("h6").innerText.trim().toLowerCase();
                let valA = a.querySelector("input[name='translated[]']").value.trim();
                let valB = b.querySelector("input[name='translated[]']").value.trim();

                if (sortType === "name") {
                    return nameA.localeCompare(nameB);
                } else if (sortType === "empty") {
                    if (valA === "" && valB !== "") return -1;
                    if (valA !== "" && valB === "") return 1;
                    return 0;
                }
                return 0;
            });

            // Re-append rows + their following <hr>
            container.innerHTML = "";
            rows.forEach(row => {
                container.appendChild(row);
                container.appendChild(document.createElement("hr"));
            });
        }

        function sortKeywordsSectionn() {
            let tbody = document.getElementById("sectionsTable");
            let rows = Array.from(tbody.querySelectorAll("tr"));

            rows.sort((a, b) => {
                let nameA = a.querySelector("td").innerText.toLowerCase();
                let nameB = b.querySelector("td").innerText.toLowerCase();
                return nameA.localeCompare(nameB);
            });

            // Re-append sorted rows
            rows.forEach(row => tbody.appendChild(row));
        }
    </script>

@endsection
@endsection

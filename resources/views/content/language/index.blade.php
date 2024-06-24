@extends('layouts/layoutMaster')

@section('title', 'Languages')


@section('page-style')
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-icons.css')}}" />

@endsection
@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/flatpickr/flatpickr.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/tagify/tagify.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/animate-css/animate.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.css')}}" />
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/flatpickr/flatpickr.js')}}"></script>
<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
<script src="{{asset('assets/vendor/libs/tagify/tagify.js')}}"></script>
<script src="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.js')}}"></script>
@endsection

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.css" />
@section('content')

<div class="d-flex justify-content-between">
    <div>
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Language /</span> All Language
        </h4>
    </div>
    <div class="">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createlanguageModal">Add Language</button>
    </div>
</div>
<!-- Basic Bootstrap Table -->
<div class="card">
    <h5 class="card-header">List of Language</h5>
    <div class="card-datatable table-responsive">
        <table class="datatables-basic table border-top">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Language</th>
                    <th>Icon</th>
                    {{-- <th>Progress</th> --}}
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @if(count($languages))
                @foreach($languages as $language)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $language->title ?? '' }}</td>
                    <td>
                        <img src="{{ asset('storage/'.$language->icon) }}" width="50" height="50">
                    </td>
                    {{-- <td>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: {{ ( $language->translations_count *100)/$language->texts_count}}%" aria-valuenow="{{ $language->translations_count }}" aria-valuemin="0" aria-valuemax="{{ $language->texts_count }}">{{  floor(($language->translations_count *100)/$language->texts_count)}}%</div>
                        </div>
                    </td> --}}
                    <td>
                        <div class="">
                            <span data-bs-toggle="modal" data-bs-target="#languageModal{{ $language->id }}">
                                <button class="btn pl-0" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" data-bs-original-title="Edit">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9 9H15" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/>
                                        <path d="M12 15L12 9" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/>
                                        <path d="M6 4C6 5.10457 5.10457 6 4 6C2.89543 6 2 5.10457 2 4C2 2.89543 2.89543 2 4 2C5.10457 2 6 2.89543 6 4Z" stroke="#1C274C" stroke-width="1.5"/>
                                        <path d="M6 20C6 21.1046 5.10457 22 4 22C2.89543 22 2 21.1046 2 20C2 18.8954 2.89543 18 4 18C5.10457 18 6 18.8954 6 20Z" stroke="#1C274C" stroke-width="1.5"/>
                                        <path d="M22 4C22 5.10457 21.1046 6 20 6C18.8954 6 18 5.10457 18 4C18 2.89543 18.8954 2 20 2C21.1046 2 22 2.89543 22 4Z" stroke="#1C274C" stroke-width="1.5"/>
                                        <path d="M22 20C22 21.1046 21.1046 22 20 22C18.8954 22 18 21.1046 18 20C18 18.8954 18.8954 18 20 18C21.1046 18 22 18.8954 22 20Z" stroke="#1C274C" stroke-width="1.5"/>
                                        <path opacity="0.5" d="M6 20H18" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/>
                                        <path opacity="0.5" d="M18 4H6" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/>
                                        <path opacity="0.5" d="M20 18L20 6" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/>
                                        <path opacity="0.5" d="M4 6L4 18" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/>
                                    </svg>
                                </button>
                            </span>

                            <span data-bs-toggle="modal" data-bs-target="#EditlanguageModal{{ $language->id }}">
                                <button class="btn text-danger btn-language pl-0" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" data-bs-original-title="Edit">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.5" d="M4 22H20" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/>
                                        <path d="M14.6296 2.92142L13.8881 3.66293L7.07106 10.4799C6.60933 10.9416 6.37846 11.1725 6.17992 11.4271C5.94571 11.7273 5.74491 12.0522 5.58107 12.396C5.44219 12.6874 5.33894 12.9972 5.13245 13.6167L4.25745 16.2417L4.04356 16.8833C3.94194 17.1882 4.02128 17.5243 4.2485 17.7515C4.47573 17.9787 4.81182 18.0581 5.11667 17.9564L5.75834 17.7426L8.38334 16.8675L8.3834 16.8675C9.00284 16.6611 9.31256 16.5578 9.60398 16.4189C9.94775 16.2551 10.2727 16.0543 10.5729 15.8201C10.8275 15.6215 11.0583 15.3907 11.5201 14.929L11.5201 14.9289L18.3371 8.11195L19.0786 7.37044C20.3071 6.14188 20.3071 4.14999 19.0786 2.92142C17.85 1.69286 15.8581 1.69286 14.6296 2.92142Z" stroke="#1C274C" stroke-width="1.5"/>
                                        <path opacity="0.5" d="M13.8879 3.66406C13.8879 3.66406 13.9806 5.23976 15.3709 6.63008C16.7613 8.0204 18.337 8.11308 18.337 8.11308M5.75821 17.7437L4.25732 16.2428" stroke="#1C274C" stroke-width="1.5"/>
                                    </svg>
                                </button>
                            </span>

                            @if ($language->title != "English")
                            <form action="{{ route('language.destroy', $language->id) }}" onsubmit="confirmAction(event, () => event.target.submit())" method="post" class="d-inline">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-sm btn-icon" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" data-bs-original-title="Remove">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M20.5001 6H3.5" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/>
                                        <path d="M18.8334 8.5L18.3735 15.3991C18.1965 18.054 18.108 19.3815 17.243 20.1907C16.378 21 15.0476 21 12.3868 21H11.6134C8.9526 21 7.6222 21 6.75719 20.1907C5.89218 19.3815 5.80368 18.054 5.62669 15.3991L5.16675 8.5" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/>
                                        <path opacity="0.5" d="M9.5 11L10 16" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/>
                                        <path opacity="0.5" d="M14.5 11L14 16" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/>
                                        <path opacity="0.5" d="M6.5 6C6.55588 6 6.58382 6 6.60915 5.99936C7.43259 5.97849 8.15902 5.45491 8.43922 4.68032C8.44784 4.65649 8.45667 4.62999 8.47434 4.57697L8.57143 4.28571C8.65431 4.03708 8.69575 3.91276 8.75071 3.8072C8.97001 3.38607 9.37574 3.09364 9.84461 3.01877C9.96213 3 10.0932 3 10.3553 3H13.6447C13.9068 3 14.0379 3 14.1554 3.01877C14.6243 3.09364 15.03 3.38607 15.2493 3.8072C15.3043 3.91276 15.3457 4.03708 15.4286 4.28571L15.5257 4.57697C15.5433 4.62992 15.5522 4.65651 15.5608 4.68032C15.841 5.45491 16.5674 5.97849 17.3909 5.99936C17.4162 6 17.4441 6 17.5 6" stroke="#1C274C" stroke-width="1.5"/>
                                    </svg>
                                </button>
                            </form>
                            @endif

                            {{-- <x-modal id="editlanguageModal{{$language->id}}" title="Update Language" saveBtnText="Update" saveBtnType="submit" saveBtnForm="editForm{{$language->id}}" size="md">
                            @include('content.include.movies.editForm')
                            </x-modal> --}}

                            {{-- Add Categroy modal --}}
                            <div class="modal fade" id="languageModal{{ $language->id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalCenterTitle">Edit <span class="text-info">{{ $language->title }}</span> Language</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="card">
                                                <div class="table-responsive text-nowrap">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">Section</th>
                                                                <th scope="col">Progress</th>
                                                                <th scope="col">Done</th>
                                                                <th scope="col">Total</th>
                                                                <th scope="col">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="table-border-bottom-0">
                                                            <tr>
                                                                <td>Start Section</td>
                                                                <td>
                                                                    <div class="progress">
                                                                        <div class="progress-bar" role="progressbar" style="width: {{ rand(0,100) }}%;" aria-valuenow="{{ rand(0,100) }}" aria-valuemin="0" aria-valuemax="100"></div>
                                                                    </div>
                                                                </td>
                                                                <td>{{ rand(0,100) }}</td>
                                                                <td>{{ rand(0,100) }}</td>
                                                                <td> <span data-bs-toggle="modal" data-bs-target="#languageModal__1{{ $language->id }}">
                                                                        <button class="btn" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" data-bs-original-title="Edit"><i class="bx bx-edit"></i></button>
                                                                    </span></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Home Section</td>
                                                                <td>
                                                                    <div class="progress">
                                                                        <div class="progress-bar" role="progressbar" style="width: {{ rand(0,100) }}%;" aria-valuenow="{{ rand(0,100) }}" aria-valuemin="0" aria-valuemax="100"></div>
                                                                    </div>
                                                                </td>
                                                                <td>{{ rand(0,100) }}</td>
                                                                <td>{{ rand(0,100) }}</td>
                                                                <td> <span data-bs-toggle="modal" data-bs-target="#languageModal__1{{ $language->id }}">
                                                                        <button class="btn" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" data-bs-original-title="Edit"><i class="bx bx-edit"></i></button>
                                                                    </span></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Contact Section</td>
                                                                <td>
                                                                    <div class="progress">
                                                                        <div class="progress-bar" role="progressbar" style="width: {{ rand(0,100) }}%;" aria-valuenow="{{ rand(0,100) }}" aria-valuemin="0" aria-valuemax="100"></div>
                                                                    </div>
                                                                </td>
                                                                <td>{{ rand(0,100) }}</td>
                                                                <td>{{ rand(0,100) }}</td>
                                                                <td> <span data-bs-toggle="modal" data-bs-target="#languageModal__1{{ $language->id }}">
                                                                        <button class="btn" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" data-bs-original-title="Edit"><i class="bx bx-edit"></i></button>
                                                                    </span></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Chat Section</td>
                                                                <td>
                                                                    <div class="progress">
                                                                        <div class="progress-bar" role="progressbar" style="width: {{ rand(0,100) }}%;" aria-valuenow="{{ rand(0,100) }}" aria-valuemin="0" aria-valuemax="100"></div>
                                                                    </div>
                                                                </td>
                                                                <td>{{ rand(0,100) }}</td>
                                                                <td>{{ rand(0,100) }}</td>
                                                                <td> <span data-bs-toggle="modal" data-bs-target="#languageModal__1{{ $language->id }}">
                                                                        <button class="btn" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" data-bs-original-title="Edit"><i class="bx bx-edit"></i></button>
                                                                    </span></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Call Section</td>
                                                                <td>
                                                                    <div class="progress">
                                                                        <div class="progress-bar" role="progressbar" style="width: {{ rand(0,100) }}%;" aria-valuenow="{{ rand(0,100) }}" aria-valuemin="0" aria-valuemax="100"></div>
                                                                    </div>
                                                                </td>
                                                                <td>{{ rand(0,100) }}</td>
                                                                <td>{{ rand(0,100) }}</td>
                                                                <td> <span data-bs-toggle="modal" data-bs-target="#languageModal__1{{ $language->id }}">
                                                                        <button class="btn" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" data-bs-original-title="Edit"><i class="bx bx-edit"></i></button>
                                                                    </span></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Group Section</td>
                                                                <td>
                                                                    <div class="progress">
                                                                        <div class="progress-bar" role="progressbar" style="width: {{ rand(0,100) }}%;" aria-valuenow="{{ rand(0,100) }}" aria-valuemin="0" aria-valuemax="100"></div>
                                                                    </div>
                                                                </td>
                                                                <td>{{ rand(0,100) }}</td>
                                                                <td>{{ rand(0,100) }}</td>
                                                                <td> <span data-bs-toggle="modal" data-bs-target="#languageModal__1{{ $language->id }}">
                                                                        <button class="btn" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" data-bs-original-title="Edit"><i class="bx bx-edit"></i></button>
                                                                    </span></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Setting Section</td>
                                                                <td>
                                                                    <div class="progress">
                                                                        <div class="progress-bar" role="progressbar" style="width: {{ rand(0,100) }}%;" aria-valuenow="{{ rand(0,100) }}" aria-valuemin="0" aria-valuemax="100"></div>
                                                                    </div>
                                                                </td>
                                                                <td>{{ rand(0,100) }}</td>
                                                                <td>{{ rand(0,100) }}</td>
                                                                <td> <span data-bs-toggle="modal" data-bs-target="#languageModal__1{{ $language->id }}">
                                                                        <button class="btn" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" data-bs-original-title="Edit"><i class="bx bx-edit"></i></button>
                                                                    </span></td>
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

                            {{-- Edit language model __1 --}}
                            <div class="modal fade" id="languageModal__1{{ $language->id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                                    <form class="modal-content" action="{{ route('languageData.store')}}" method="post">
                                        @method('PUT')
                                        @csrf
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalCenterTitle">Edit
                                              {{-- <span class="text-info">{{ $language->title }}</span> --}}
                                               Section</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <h5>English Language</h5>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h5>{{ $language->title }} Language</h5>
                                                        <input type="hidden" name="language_id" value="{{$language->language_id}}">
                                                    </div>
                                                </div>
                                                @foreach($languageData as $languageD)
                                                <div class="row mt-3">
                                                    <div class="col-md-6">
                                                        <p class="">{{$languageD->name}}</p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input type="hidden" name="languageDataId[]" value="{{$languageD->_id}}">
                                                        <input type="text" class="form-control" name="languageData[]" value="{{ $languageD->{$language->language_id} }}" placeholder="{{ $languageD->name }} text">
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-label-secondary" data-bs-dismiss="modal">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            {{-- Edit language model --}}
                            @include('content.include.language.editForm', ['language' => $language])

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

<x-modal id="createlanguageModal" title="Create Language" saveBtnText="Create" saveBtnType="submit" saveBtnForm="createForm" size="md">
    @include('content.include.language.createForm')
</x-modal>

@section('page-script')
<script>
    function confirmAction(event, callback) {
        event.preventDefault();
        Swal.fire({
            title: 'Are you sure?'
            , text: "Are you sure you want to delete this?"
            , icon: 'warning'
            , showCancelButton: true
            , confirmButtonText: 'Yes, delete it!'
            , customClass: {
                confirmButton: 'btn btn-danger me-3'
                , cancelButton: 'btn btn-label-secondary'
            }
            , buttonsStyling: false
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
            template = $("<div style=\"display:flex;gap:4px;margin-top:10px;\"><img src=\"" + img_src + "\" style=\"width:20px;height:20px;border-radius:20px;\"/><p style=\"font-weight: 400;font-size:10pt; margin-top:-5px;\">" + text + "</p></div>");
            return template;
        }
    }
    var options = {
        'templateSelection': custom_template
        , 'templateResult': custom_template
    , }
    $('#id_select2_example').select2(options);
    $('.select2-container--default .select2-selection--single').css({
        'height': '47px'
    });

    $(".btn-language").click(function() {
        $("#modalCenterTitle").text("Edit language");
    })
</script>
@endsection
@endsection

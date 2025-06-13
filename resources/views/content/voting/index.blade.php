@extends('layouts/layoutMaster')

@section('title', 'Boxicons - Icons')

@section('page-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/bs-stepper/bs-stepper.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/bootstrap-select/bootstrap-select.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/formvalidation/dist/css/formValidation.min.css') }}" />
@endsection

@section('page-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-icons.css') }}" />
@endsection

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/animate-css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/dropzone/dropzone.css') }}" />

@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/jquery-repeater/jquery-repeater.js') }}"></script>
@endsection

@section('content')
    <script>
        const dropZoneInitFunctions = [];
    </script>
   
           <style>
        @import url('https://fonts.googleapis.com/css2?family=Genos:ital,wght@0,100..900;1,100..900&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap');
        .modal-content {
            border-radius: 15px;
            font-family: 'Segoe UI', sans-serif;
        }

        .bg-tropy-column {
            /* border: 1px dashed #d1d1d1; */
            border-radius: 12px;
            background: #f9f9f9;
        }
.gender-status{
     border-radius: 15px;
     padding: 15px ;
           background: #F2F2F2;
}
        .trophy-count {
            font-family: "Genos", sans-serif;
            font-weight: 600;
            font-size: 22px;
            color: #333;
        }
.detail-progress span{
            font-family: "Genos", sans-serif;
            font-weight: 500;  
        }
        .trophy-card {
            flex: 1;
            text-align: center;
        }

        .mini-stat-box {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 5px 10px;
            background-color: #fff;
            border-radius: 10px;
            margin-bottom: 5px;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.05);
            font-size: 14px;
        }

        .age-bar {
            height:12px;
            border-radius: 5px;
            margin-bottom: 5px;
            background-color: #fff;
            position: relative;
        }

        .age-bar .male {
            background: #3d2dd6;
            height: 100%;
            width: 50%;
            border-radius: 5px;
            border-top-left-radius: 5px;
            border-bottom-left-radius: 5px;
            position: absolute;
            z-index: 11111;
        }

        .age-bar .female {
            background: #cc8ff5;
            height: 100%;
            width: 50%;
            left: 15%;
            position: absolute;
            border-top-right-radius: 5px;
            border-bottom-right-radius: 5px;
        }

        .province-2 {}

        .province-item {
            color: white;
            padding: 5px 10px;
            border-radius: 8px;
            /* margin-bottom: 5px; */
            display: flex;
            justify-content: space-between;
            font-weight: 600;

        }
       

        .province-1 {
            background: #F72585;
            width: 90%;
                border-top-left-radius: 0px !important;
    border-bottom-left-radius: 0px !important;
        }

        .province-2 {
            background: #B5179E;
            border-top-left-radius: 0px !important;
            border-bottom-left-radius: 0px !important;
            border-top-right-radius: 0px !important;
            width: 85%;
        }

        .province-3 {
            background: #7209B7;
            border-top-left-radius: 0px !important;
            border-bottom-left-radius: 0px !important;
            border-top-right-radius: 0px !important;
            width: 80%;
        }

        .province-4 {
            background: #560BAD;
            border-top-left-radius: 0px !important;
            /* border-bottom-left-radius: 0px !important; */
            border-top-right-radius: 0px !important;
            width: 70%;
        }

        .bg-trophy-loader{
            background: #F2F2F2;
            padding: 12px;
            border-radius: 15px;
        }
        
        .text-states{
            color: #9291A5;
            font-family: 'Poppins';
            font-weight: 500 !important;
        }
        .text-gender{
             font-family: 'Poppins';
            font-weight: 600 !important;
        }
        .text-male{
            font-family: 'Poppins';
            font-weight: 500 !important;
        }
        .text-age{
             font-family: "Inter", sans-serif;
             font-weight: 500;
             color: #615E83;
             font-size: 14px;
        }
        .text-province{
           font-family: "Genos", sans-serif;
            font-weight: 500 !important;  
            color: #000;   
        }
         .province-item span{
              font-family: "Genos", sans-serif;
            font-weight: 500 !important; 
            font-size: 20px;
        }
        .bg-success-01{
            background: #1BC469;
        }
        .bg-warning-01{
            background: #F1C21B;
        }
        .bg-info-01{
            background: #1CA2ED;
        }
        .text-vote{
            font-family: "Genos", sans-serif;
            font-weight: 500 !important; 
            color: #000000;  
        }
        .para-vote{
            font-family: "Genos", sans-serif;
            font-weight: 400 !important; 
            color: #000000;  
        }
    </style>
    <div class="row g-4 mb-4">
        <div class="col-sm-6  col-xl-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                            <span>Total Category</span>
                            <div class="d-flex align-items-end mt-2">
                                <h4 class="mb-0 me-2">21,459</h4>
                                <small class="text-success">(+29%)</small>
                            </div>
                            <small>Last week analytics</small>
                        </div>
                        <span class="badge bg-label-primary rounded p-2">
                            <i class="bx bx-user bx-sm"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                            <span>Total Vote</span>
                            <div class="d-flex align-items-end mt-2">
                                <h4 class="mb-0 me-2">4,567</h4>
                                <small class="text-success">(+18%)</small>
                            </div>
                            <small>Last week analytics </small>
                        </div>
                        <span class="badge bg-label-danger rounded p-2">
                            <i class="bx bx-user-plus bx-sm"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Basic Bootstrap Table -->
    <div class="card">
        <div class="card-header d-flex align-items-center">
            <h5 class="m-0">Voting List</h5>
            {{-- @can('voting.create') --}}
            <div class="flex-fluid d-flex justify-content-end align-items-center">
                <button class="btn btn-primary btn-create-vote" data-vote-type='single_vote'><i
                        class="bx bx-plus me-0 me-sm-1"></i>Single Vote</button>
                <button class="btn btn-primary btn-create-vote ms-2" data-vote-type='individual_vote'><i
                        class="bx bx-plus me-0 me-sm-1"></i>Individual Vote</button>
            </div>
            {{-- @endcan --}}
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Vote Title</th>
                        <th>Vote Banner</th>
                        <th>Created Date</th>
                        <th>Statistic</th>
                        <th>Option</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @forelse($votes as $index => $vote)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>
                                <div class="">
                                    <div style="font-size:110%; font-weight:bold;">{{ $vote->name }}</div>
                                    <div style="font-size:90%">{{ $vote->voting_category->name ?? '' }}</div>
                                </div>
                            </td>
                            <td>
                                @if (!empty($vote->banner))
                                    <img class="vote-banner-image" src='{{ asset('storage/' . $vote->banner) }}'
                                        width="100" />
                                @endif
                            </td>
                            <td>
                                <div>
                                    <div>{{ date('d.m.Y', strtotime($vote->created_at)) }}</div>
                                    <div>{{ date('H:i', strtotime($vote->created_at)) }}</div>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex">
                                    @foreach ($vote->options as $index => $option)
                                        <div class="d-flex align-items-center {{ $index > 0 ? 'ms-3' : '' }}"
                                            style="background:#f5f5f5; border-radius:5px; padding: 5px 10px;">
                                            @if (!empty($option['image']))
                                                <img src="{{ asset('storage/' . $option['image']) }}"
                                                    class="vote-option-image" />
                                            @else
                                                @if ($index == 0)
                                                    {{-- Success --}}
                                                    <svg width="31" height="31" viewBox="0 0 31 31" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M25.7788 21.2912L26.6608 16.1914C26.881 14.9177 25.9015 13.7527 24.6103 13.7527H18.1339C17.4921 13.7527 17.0033 13.1766 17.1072 12.5424L17.9355 7.48674C18.0701 6.6654 18.0316 5.82496 17.8227 5.01937C17.6496 4.35201 17.1347 3.81615 16.4575 3.59862L16.2763 3.5404C15.8671 3.40894 15.4204 3.43953 15.0346 3.62545C14.6099 3.8301 14.2992 4.20338 14.184 4.64732L13.5894 6.93964C13.4002 7.669 13.1246 8.37303 12.7693 9.03823C12.2501 10.0102 11.4473 10.788 10.6129 11.5071L8.8145 13.0568C8.30743 13.4938 8.04113 14.1482 8.09883 14.8155L9.11404 26.5563C9.20716 27.6332 10.1075 28.46 11.1873 28.46H16.998C21.3496 28.46 25.0634 25.428 25.7788 21.2912Z"
                                                            fill="#4BB543" />
                                                        <path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M4.15148 12.8163C4.65306 12.7947 5.08266 13.172 5.12591 13.6722L6.34041 27.7178C6.41842 28.6201 5.70775 29.3977 4.80028 29.3977C3.94551 29.3977 3.25439 28.7043 3.25439 27.8511V13.7529C3.25439 13.2509 3.6499 12.838 4.15148 12.8163Z"
                                                            fill="#4BB543" />
                                                    </svg>
                                                @elseif ($index == 1)
                                                    {{-- Neutral --}}
                                                    <svg width="31" height="31" viewBox="0 0 31 31" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M3.01367 15.4048C3.01367 21.2973 3.01367 24.2436 4.84425 26.0742L26.1831 4.73537C24.3525 2.90479 21.4062 2.90479 15.5137 2.90479C9.62112 2.90479 6.67484 2.90479 4.84425 4.73537C3.01367 6.56595 3.01367 9.51223 3.01367 15.4048Z"
                                                            fill="#1BC469" />
                                                        <path
                                                            d="M10.5137 6.34229C11.0314 6.34229 11.4512 6.76202 11.4512 7.27979L11.4512 9.46731H13.6387C14.1564 9.46731 14.5762 9.88704 14.5762 10.4048C14.5762 10.9226 14.1564 11.3423 13.6387 11.3423H11.4512L11.4512 13.5298C11.4512 14.0476 11.0314 14.4673 10.5137 14.4673C9.9959 14.4673 9.57617 14.0476 9.57617 13.5298L9.57617 11.3423H7.38867C6.87091 11.3423 6.45117 10.9226 6.45117 10.4048C6.45117 9.88704 6.8709 9.46731 7.38867 9.46731H9.57617V7.27979C9.57617 6.76202 9.99591 6.34229 10.5137 6.34229Z"
                                                            fill="white" />
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M15.5137 27.9048C9.6211 27.9048 6.67482 27.9048 4.84424 26.0742L26.1831 4.73535C28.0137 6.56593 28.0137 9.51221 28.0137 15.4048C28.0137 21.2973 28.0137 24.2436 26.1831 26.0742C24.3525 27.9048 21.4062 27.9048 15.5137 27.9048ZM23.0138 22.5924C23.5316 22.5924 23.9513 22.1727 23.9513 21.6549C23.9513 21.1371 23.5316 20.7174 23.0138 20.7174H16.7638C16.246 20.7174 15.8263 21.1371 15.8263 21.6549C15.8263 22.1727 16.246 22.5924 16.7638 22.5924H23.0138Z"
                                                            fill="#ED1C24" />
                                                    </svg>
                                                @else
                                                    {{-- Red --}}
                                                    <svg width="31" height="31" viewBox="0 0 31 31" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M25.7791 11.5663L26.661 16.666C26.8813 17.9397 25.9018 19.1047 24.6105 19.1047H18.1342C17.4923 19.1047 17.0035 19.6809 17.1074 20.315L17.9358 25.3707C18.0703 26.192 18.0319 27.0325 17.8229 27.8381C17.6498 28.5054 17.1349 29.0413 16.4578 29.2588L16.2766 29.317C15.8673 29.4485 15.4207 29.4179 15.0348 29.232C14.6101 29.0273 14.2994 28.654 14.1843 28.2101L13.5896 25.9178C13.4004 25.1884 13.1248 24.4844 12.7695 23.8192C12.2503 22.8472 11.4476 22.0694 10.6132 21.3503L8.81474 19.8006C8.30767 19.3636 8.04137 18.7093 8.09908 18.042L9.11428 6.30112C9.2074 5.2242 10.1078 4.39746 11.1875 4.39746H16.9983C21.3499 4.39746 25.0637 7.42947 25.7791 11.5663Z"
                                                            fill="red" />
                                                        <path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M4.15148 20.0413C4.65306 20.063 5.08266 19.6857 5.12591 19.1855L6.34041 5.13982C6.41842 4.23758 5.70775 3.45996 4.80028 3.45996C3.94551 3.45996 3.25439 4.15339 3.25439 5.00653V19.1047C3.25439 19.6068 3.6499 20.0197 4.15148 20.0413Z"
                                                            fill="red" />
                                                    </svg>
                                                @endif
                                            @endif
                                            <div class="ms-3">
                                                <div>{{ ucwords(str_replace('-', ' ', $option['title'])) }}</div>
                                                {{-- <div style="font-size:80%">215</div> --}}
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </td>
                            <td>
                                <div class="dropdown d-inline-block">
                                    <!-- Edit -->
                                    <span>
                                        {{-- @can('voting.write') --}}
                                        <button class="btn btn-sm btn-icon btn-edit-vote" data-bs-toggle="tooltip"
                                            data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true"
                                            data-vote-id="{{ $vote->id }}" data-bs-original-title="Edit"
                                            aria-describedby="tooltip557134">
                                            <i class="bx bx-edit"></i>
                                        </button>
                                        {{-- @endcan --}}
                                    </span>

                                    <!-- Delete -->
                                    <form action="{{ route('vote.destroy', $vote->id) }}"
                                        onsubmit="confirmAction(event, () => event.target.submit())" method="post"
                                        class="d-inline">
                                        @method('DELETE')
                                        @csrf
                                        {{-- @can('voting.delete') --}}
                                        <button type="submit" class="btn btn-sm btn-icon" data-bs-toggle="tooltip"
                                            data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true"
                                            data-bs-original-title="Remove"><i class="bx bx-trash me-1"></i></button>
                                        {{-- @endcan --}}
                                    </form>

                                    <span>
                                        <button class="btn btn-sm btn-icon btn-statistic-vote" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                            data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true"
                                            data-vote-id="{{ $vote->id }}"
                                            data-vote-name="{{ 'Vote for ' . $vote->name }}"
                                            data-bs-original-title="Statistic" aria-describedby="tooltip557134">
                                            <i class="bx bx-bar-chart-alt-2"></i>
                                        </button>
                                    </span>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-center" colspan="8"><b>No Voting found.<b></td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div> 
     <div class="modal fade" id="exampleModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content p-0">
                    <div
                        class="modal-header flex-column align-items-start border-bottom-0 p-3 pt-1"
                        style="background: #0000000D;
">
                        <h4 class="modal-title text-muted text-vote mb-0">Vote
                            Title</h4>
                        <p class="text-muted mb-0 para-vote">Category Name</p>
                    </div>
                    <div class="modal-body p-0 pt-0">
                        <div class="bg-tropy-column p-3">
                            <!-- Top Trophy Section -->
                            <div class="bg-trophy-loader">
                                <div class="d-flex justify-content-between">
                                    <div class="trophy-card">
                                        <div class="spinner-border text-success"
                                            style="width: 110px; height: 110px;"
                                            role="status">
                                            <span
                                                class="visually-hidden">Loading...</span>
                                        </div>
                                        <div
                                            class="d-flex justify-content-center align-items-center">
                                            <img
                                                src="{{ asset('assets/svg/svg-dialog/academic.svg') }}"
                                                class="d-flex justify-content-center position-absolute"
                                                width="50"
                                                
                                                style="transform: translate(3px, -55px);height: 57px;">
                                        </div>

                                        <div class="trophy-count">10,258</div>
                                    </div>
                                    <div class="trophy-card">
                                        <div class="spinner-border text-warning"
                                            style="width: 110px; height: 110px;"
                                            role="status">
                                            <span
                                                class="visually-hidden">Loading...</span>
                                        </div>
                                        <div
                                            class="d-flex justify-content-center align-items-center">
                                            <img
                                                src="{{ asset('assets/svg/svg-dialog/cultivated.svg') }}"
                                                class="d-flex justify-content-center position-absolute"
                                                width="50"
                                                style="transform: translate(3px, -55px);height: 57px;">
                                        </div>
                                        <div class="trophy-count">5,258</div>

                                    </div>
                                    <div class="trophy-card">
                                        <div class="spinner-border text-info"
                                            style="width: 110px; height: 110px;"
                                            role="status">
                                            <span
                                                class="visually-hidden">Loading...</span>
                                        </div>
                                        <div
                                            class="d-flex justify-content-center align-items-center">
                                            <img
                                                src="{{ asset('assets/svg/svg-dialog/educated.svg') }}"
                                                class="d-flex justify-content-center position-absolute"
                                                width="50"
                                                style="transform: translate(3px, -55px);height: 57px;">
                                        </div>
                                        <div class="trophy-count">15,258</div>
                                    </div>
                                </div>
                                <!-- Medal Bars -->
                                <div class="mini-stat-box mt-3">
                                    <div class="d-flex">
                                        <img
                                            src="{{ asset('assets/svg/svg-dialog/male.svg') }}"
                                            width="35" style="height: 30px">
                                        <div class="detail-progress mx-2">
                                            <span><img
                                                    src="{{ asset('assets/svg/svg-dialog/academic.svg') }}"
                                                    width="18" alt >&nbsp;
                                                1258</span>
                                            <div class="progress mt-1"
                                                style="width: 60px; height: 8px; background: #1BC4694D;
">
                                                <div
                                                    class="progress-bar bg-success-01"
                                                    role="progressbar"
                                                    style="width: 50%"
                                                    aria-valuenow="25"
                                                    aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="detail-progress ">
                                        <span><img
                                                src="{{ asset('assets/svg/svg-dialog/educated.svg') }}"
                                                width="18" alt>&nbsp;
                                            1258</span>
                                        <div class="progress mt-1"
                                            style="width: 60px; height: 8px; background: #F9E59E80;">
                                            <div
                                                class="progress-bar bg-warning-01"
                                                role="progressbar"
                                                style="width: 80%"
                                                aria-valuenow="25"
                                                aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="detail-progress">
                                        <span><img
                                                src="{{ asset('assets/svg/svg-dialog/cultivated.svg') }}"
                                                width="18" alt>&nbsp;
                                            1258</span>
                                        <div class="progress mt-1"
                                            style="width: 60px; height: 8px; background: #1CA2ED4D;
">
                                            <div class="progress-bar bg-info-01"
                                                role="progressbar"
                                                style="width: 80%"
                                                aria-valuenow="25"
                                                aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                    </div>

                                </div>
                                <div class="mini-stat-box mt-3">
                                    <div class="d-flex">
                                        <img
                                            src="{{ asset('assets/svg/svg-dialog/female.svg') }}"
                                            width="35" style="height: 30px">
                                        <div class="detail-progress mx-2">
                                            <span><img
                                                    src="{{ asset('assets/svg/svg-dialog/academic.svg') }}"
                                                    width="18" alt>&nbsp;
                                                1258</span>
                                            <div class="progress mt-1"
                                                style="width: 60px; height: 8px; background: #1BC4694D;
">
                                                <div
                                                    class="progress-bar bg-success-01"
                                                    role="progressbar"
                                                    style="width: 50%"
                                                    aria-valuenow="25"
                                                    aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="detail-progress ">
                                        <span><img
                                                src="{{ asset('assets/svg/svg-dialog/educated.svg') }}"
                                                width="18" alt>&nbsp;
                                            1258</span>
                                        <div class="progress mt-1"
                                            style="width: 60px; height: 8px; background: #F9E59E80;">
                                            <div
                                                class="progress-bar bg-warning-01"
                                                role="progressbar"
                                                style="width: 80%"
                                                aria-valuenow="25"
                                                aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="detail-progress">
                                        <span><img
                                                src="{{ asset('assets/svg/svg-dialog/cultivated.svg') }}"
                                                width="18" alt>&nbsp;
                                            1258</span>
                                        <div class="progress mt-1"
                                            style="width: 60px; height: 8px; background: #1CA2ED4D;
">
                                            <div class="progress-bar bg-info-01"
                                                role="progressbar"
                                                style="width: 80%"
                                                aria-valuenow="25"
                                                aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                    </div>

                                </div>

                            </div>

                            <!-- Age and Gender Stats -->
                            <div class="gender-status mt-3">
                                <h6
                                    class="text-muted text-states fw-bold">Statistics</h6>
                                <div
                                    class="d-flex justify-content-between align-items-center">
                                    <p class="fw-bold text-gender">Age and
                                        gender</p>
                                    <div
                                        class="d-flex justify-content-end mb-2">
                                        <small class="me-3 text-male"><span
                                                class="me-1"
                                                style="color:#3d2dd6; font-size: 20px;">●</span>Male</small>
                                        <small class="text-male"><span
                                                class="me-1 "
                                                style="color:#cc8ff5;font-size: 20px;">●</span>Female</small>
                                    </div>
                                </div>
                                <!-- Bar 1 -->
                                <div class="d-flex align-items-center mb-2">
                                    <span class="me-2 text-age"
                                        style="width: 50px;">18–24</span>
                                    <div class="flex-grow-1 age-bar mb-0">
                                        <div class="male"
                                            style="width: 25%"></div>
                                        <div class="female"
                                            style="width: 30%"></div>
                                    </div>
                                    <span class="ms-2">12.7%</span>
                                </div>
                                <!-- Repeat for more bars -->
                                <div class="d-flex align-items-center mb-2">
                                    <span class="me-2 text-age"
                                        style="width: 50px;">18–24</span>
                                    <div class="flex-grow-1 age-bar mb-0">
                                        <div class="male"
                                            style="width: 60%"></div>
                                        <div class="female"
                                            style="width: 60%"></div>
                                    </div>
                                    <span class="ms-2">12.7%</span>
                                </div>
                                <div class="d-flex align-items-center mb-2">
                                    <span class="me-2 text-age"
                                        style="width: 50px;">18–24</span>
                                    <div class="flex-grow-1 age-bar mb-0">
                                        <div class="male"
                                            style="width: 35%"></div>
                                        <div class="female"
                                            style="width: 35%"></div>
                                    </div>
                                    <span class="ms-2">12.7%</span>
                                </div>
                                <div class="d-flex align-items-center mb-2">
                                    <span class="me-2 text-age"
                                        style="width: 50px;">18–24</span>
                                    <div class="flex-grow-1 age-bar mb-0">
                                        <div class="male"
                                            style="width: 20%"></div>
                                        <div class="female"
                                            style="width: 25%"></div>
                                    </div>
                                    <span class="ms-2">12.7%</span>
                                </div>
                            </div>

                            <!-- Province List -->
                            <div class="gender-status mt-3">
                                <h6 class="fw-bold text-province">List of
                                    Provinces</h6>
                                <div class="province-item province-1">
                                    <span>Kurdistan – Rojava</span>
                                    <span>1,200</span>
                                </div>
                                <div class="province-item province-2">
                                    <span>Kurdistan – Bakûr</span>
                                    <span>1,200</span>
                                </div>
                                <div class="province-item province-3">
                                    <span>Kurdistan – Rojhilat</span>
                                    <span>1,200</span>
                                </div>
                                <div class="province-item province-4">
                                    <span>Kurdistan – Başûr</span>
                                    <span>950</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="modal-footer justify-content-center border-top-0 p-0">
                       <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    <div class="modal fade deleted-modal" id="exampleModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" style="padding-right: 17px;" aria-modal="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Banner</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="mb-0">Are you Sure to delete this!</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <form action="" method="post" id="delete_form">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Yes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        function delete_service(el) {
            let link = $(el).data('id');
            $('.deleted-modal').modal('show');
            $('#delete_form').attr('action', link);
        }
    </script>

    {{-- Create Vote model --}}
    <x-modal id="createvotingModal" title="Single Vote" saveBtnText="Create" saveBtnType="submit"
        saveBtnForm="createForm" :showHeader="false" size="md">
        @include('content.include.voting.createForm')
    </x-modal>

    {{-- Edit Model Form --}}
    <x-modal id="editvotingModal" title="Edit Vote" saveBtnText="Update" saveBtnType="submit" saveBtnForm="editForm"
        :showHeader="false" size="md">
        @include('content.include.voting.editForm')
    </x-modal>

   

@endsection

@section('page-script')

    @if (config('app.asset_mode') === 'public')
        <script src="assets/js/app-voting.js"></script>
        <script src="assets/js/app-upload-audio.js"></script>
    @else
        <script src="{{ asset('assets/js/app-voting.js') }}"></script>
        <script src="{{ asset('assets/js/app-upload-audio.js') }}"></script>
    @endif

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

    <script>
        // bootstrap-maxlength & repeater (jquery)
        $(function() {
            var formRepeater = $('.form-repeater');

            if (formRepeater.length) {
                var row = 2;
                var col = 1;
                formRepeater.on('submit', function(e) {
                    e.preventDefault();
                });
                formRepeater.repeater({
                    // initEmpty: true,
                    show: function() {
                        var fromControl = $(this).find('.form-control, .form-select');
                        var formLabel = $(this).find('.form-label');

                        fromControl.each(function(i) {
                            var id = 'form-repeater-' + row + '-' + col;
                            $(fromControl[i]).attr('id', id);
                            $(formLabel[i]).attr('for', id);
                            col++;
                        });

                        row++;

                        $(this).slideDown();
                    },
                    hide: function(e) {
                        $(this).slideUp(e);
                    }
                });
            }
        });

        $(document).on("change", ".individual-vote-react-option-image input[type='file']", function(event) {
            let input = event.target;
            if (input.files && input.files[0]) {
                let reader = new FileReader();
                reader.onload = function(e) {
                    $(input).closest('.individual-vote-react-option-image').find('img').attr('src', e.target
                        .result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        });

        $('')
    </script>

    <script>
        var votes = @json(!empty($votes) ? $votes : []);
        var vote_categories = @json(!empty($vote_categories) ? $vote_categories : []);

        function drpzone_init() {
            dropZoneInitFunctions.forEach(callback => callback());
        }
    </script>
    <script src="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone-min.js" onload="drpzone_init()"></script>
@endsection

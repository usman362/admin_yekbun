@extends('layouts/layoutMaster')

@section('title', 'System Status')

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

    <!-- Basic Bootstrap Table -->
    <div class="card">
        <div class="card-header d-flex align-items-center">
            <h5 class="m-0">System Status</h5>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Service Name</th>
                        <th>Service Status</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    <tr>
                        <td>1</td>
                        <th>
                            Apache
                        </th>
                        <td>
                            <span class="badge bg-success">{{$statuses['Apache']}}</span>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <th>
                            MongoDB
                        </th>
                        <td>
                            <span class="badge bg-success">{{$statuses['MongoDB']}}</span>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <th>
                            API
                        </th>
                        <td>
                            <span class="badge bg-success">{{$statuses['API']}}</span>
                        </td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <th>
                            Storage
                        </th>
                        <td>
                           <table class="table" border="1">
                            <tbody>
                                @foreach ($statuses['Storage'] as $key => $storage)
                                <tr style="border-bottom: 1px solid">
                                    <th>
                                        {{$key}}
                                    </th>
                                    <td style="text-align:right">
                                        {{$key == 'percent_used' ? round($storage).'%' : $storage}}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                           </table>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <!--/ Basic Bootstrap Table -->

@endsection

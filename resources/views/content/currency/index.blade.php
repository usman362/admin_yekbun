@extends('layouts/layoutMaster')

@section('title', 'Boxicons - Icons')

@section('page-style')
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-icons.css')}}" />
@endsection

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/flatpickr/flatpickr.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/tagify/tagify.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/animate-css/animate.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/dropzone/dropzone.css')}}" />

@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/flatpickr/flatpickr.js')}}"></script>
<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
<script src="{{asset('assets/vendor/libs/tagify/tagify.js')}}"></script>
<script src="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.js')}}"></script>
@endsection

@section('content')
<style>
    .swal2-icon .swal2-icon-content {
        font-size: 66px !important;
    }
    .btn-danger {
        background-color: #ff3e1d !important;
    }
</style>
<script>
  const dropZoneInitFunctions = [];
</script>

{{-- Nav TAb --}}
<div class="d-flex justify-content-between">
  <div>
<h4 class="fw-bold py-3 mb-4">
    <span class="text-muted fw-light">Currencies
</h4>
</div>
 
</div>

 {{-- //currency --}}
  <div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
    <h5 class="mb-0">Currency List</h5>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createserviceModal">Add Currency</button>
  </div>
    <div class="table-responsive text-nowrap">
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Symbol</th>
            <th>Code</th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th>Option</th>
          </tr>
        </thead>
        <tbody>
            @forelse($currencies as $currency)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{$currency->name}}</td>
                <td>{{$currency->symbol}}</td>
                <td>{{$currency->code}}</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                    {{-- @can('location.delete') --}}
                    <!-- Delete -->
                    <form action="{{ route('currency_discount.destroy', $currency->id) }}" onsubmit="confirmAction(event, () => event.target.submit())" method="post" class="d-inline">
                      @method('DELETE')
                      @csrf
                      <button type="submit" class="btn btn-sm btn-icon" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" data-bs-original-title="Remove"><i class="bx bx-trash me-1"></i></button>
                    </form>
                  {{-- @endcan   --}}
            </tr>
            @empty
            <tr>
                <td class="text-center" colspan="5"><b>No Currency found.<b></td>
            </tr>
            @endforelse
        </tbody>
      </table>
    </div>
  </div>

<div style="height: 30px;"></div>
 <div class="d-flex justify-content-between">
  <div>
<h4 class="fw-bold py-3 mb-4">
    <span class="text-muted fw-light">Discounts
</h4>
</div>
 
</div>
  <div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
    <h5 class="mb-0">Discounts</h5>
     <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#creatediscount">Create Discount</button> 
  </div>


    <div class="table-responsive text-nowrap">
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>Title</th>
            <th>Type</th>
            <th>Amount</th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th>Option</th>
          </tr>
        </thead>
        <tbody>
            
            <tr>
                <td></td>
                <td> </td>
                <td></td>
                <td> </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                    
                    <form action="{{ route('currency_discount.destroy', $currency->id) }}" onsubmit="confirmAction(event, () => event.target.submit())" method="post" class="d-inline">
                      @method('DELETE')
                      @csrf
                      <button type="submit" class="btn btn-sm btn-icon" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" data-bs-original-title="Remove"><i class="bx bx-trash me-1"></i></button>
                    </form>
               
            </tr>
           
           
        </tbody>
      </table>
    </div>
  </div>


<x-modal
id="creatediscount"
title="Create Discount"
 saveBtnText="Add"
 saveBtnType="submit"
  saveBtnForm="createForm"
  size="md">

 @include('content.include.discount.createForm')
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
    }).then(function (result) {
      if (result.value) {
        callback();
      }
    });
  }
</script>
@endsection
@endsection

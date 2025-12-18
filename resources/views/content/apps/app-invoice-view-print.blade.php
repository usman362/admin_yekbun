@extends('layouts/layoutMaster')

@section('title', 'Invoice (Print version) - Pages')

@section('page-style')
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/app-invoice-print.css')}}" />
@endsection

@section('page-script')
<script src="{{asset('assets/js/app-invoice-print.js')}}"></script>
@endsection

@section('content')
<div class="invoice-print p-5">

  <div class="d-flex justify-content-between flex-row">
    <div class="mb-4">
      <div class="d-flex svg-illustration mb-3 gap-2">
        <span class="app-brand-logo demo">
          @include('_partials.macros',["width"=>25,"withbg"=>'#696cff'])
        </span>
      </div>
        <p class="mb-1">{{$appinfo->company_name}}</p>
        <p class="mb-1">{{$appinfo->house_number.', '.$appinfo->address.', '.$appinfo->city_zipcode}}</p>
        @if($email)
            <p class="mb-1"><strong>E-mail:</strong> {{ $email }}</p>
        @endif

        @if($fax)
            <p class="mb-1"><strong>Fax:</strong> {{ $fax }}</p>
        @endif

        @if($stnr)
            <p class="mb-1"><strong>St.-Nr.:</strong> {{ $stnr }}</p>
        @endif
    </div>
    <div>
       <h4>Invoice #{{str_replace('INV-','',$invoice->invoice_id)}}</h4>
        <div class="mb-2">
            <span class="me-1">Date Issues:</span>
            <span class="fw-semibold">{{\Carbon\Carbon::parse($date)->format('d/m/Y')}}</span>
        </div>
    </div>
  </div>

  <hr />

  <div class="row d-flex justify-content-between mb-4">
    <div class="col-sm-6 w-50">
      <h6>Invoice To:</h6>
        <p class="mb-1">{{@$invoice->first_name.' '.@$invoice->last_name }}</p>
        {{-- <p class="mb-1">Shelby Company Limited</p> --}}
        <p class="mb-1">{{@$invoice->city.','.@$invoice->country}}</p>
        {{-- <p class="mb-1">718-986-6062</p> --}}
        <p class="mb-0">{{@$invoice->email}}</p>
    </div>
    <div class="col-sm-6 w-50">
    </div>
  </div>

  <div class="table-responsive">
        <table class="table border-top m-0">
          <thead>
            <tr>
              <th>Item</th>
              <th>Description</th>
              <th>Cost</th>
              <th>Qty</th>
              <th>Price</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($invoice->items as $key => $item)
                <tr>
                <td class="text-nowrap">{{$item['title']}}</td>
                <td class="text-nowrap">{{$item['description']}}</td>
                <td>{{$item['amount']}}€</td>
                <td>{{$item['quantity']}}</td>
                <td>{{number_format($item['amount'] * $item['quantity'],2,'.','')}}€</td>
                </tr>
            @endforeach
            <tr>
              <td colspan="3" class="align-top px-4 py-5">

              </td>
              <td class="text-end px-4 py-5">
                <p class="mb-0">Total:</p>
              </td>
              <td class="px-4 py-5">
                <p class="fw-semibold mb-0">{{number_format(array_sum(array_column($invoice->items, 'amount')),2,'.','');}}€</p>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

  <div class="row">
    <div class="col-12">
      <span class="fw-semibold">Note:</span>
      <span>{{$invoice->note ?? 'Thank you for your purchase and continued support.'}}</span>
    </div>
  </div>
</div>
@endsection

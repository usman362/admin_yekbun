<?php

namespace App\Http\Controllers\apps;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoicePreview extends Controller
{
  public function index()
  {
    return view('content.apps.app-invoice-preview');
  }

  public function view($tId)
  {
    $invoice = Invoice::with(['user','transaction'])->where('transaction_id',$tId)->first();
    return view('content.apps.app-invoice-view',compact());
  }
}

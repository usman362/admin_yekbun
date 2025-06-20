<?php

namespace App\Http\Controllers\apps;

use App\Models\AppInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InvoiceEdit extends Controller
{
  public function index()
  {
    $appinfo = AppInfo::first();
    return view('content.apps.app-invoice-edit' , compact('appinfo'));
  }
}

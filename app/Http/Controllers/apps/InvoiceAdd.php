<?php

namespace App\Http\Controllers\apps;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AppInfo;
class InvoiceAdd extends Controller
{
  public function index()
  {
     $appinfo = AppInfo::first();    
    return view('content.apps.app-invoice-add',compact('appinfo'));
  }
}

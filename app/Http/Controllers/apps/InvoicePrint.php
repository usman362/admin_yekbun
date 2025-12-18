<?php

namespace App\Http\Controllers\apps;

use App\Http\Controllers\Controller;
use App\Models\AppInfo;
use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoicePrint extends Controller
{
  public function index()
  {
    $pageConfigs = ['myLayout' => 'blank'];
    return view('content.apps.app-invoice-print', ['pageConfigs' => $pageConfigs]);
  }

  public function view($id)
  {
    $appinfo = AppInfo::first();
    $description = strip_tags($appinfo->description);
    preg_match('/E-mail:\s*(.*?)(?=Fax:|St\.-Nr\.|$)/i', $description, $email);
    preg_match('/Fax:\s*(.*?)(?=St\.-Nr\.|$)/i', $description, $fax);
    preg_match('/St\.-Nr\.\s*:\s*([A-Z0-9]+)/i', $description, $stnr);
    $email = trim($email[1] ?? '');
    $fax   = trim($fax[1] ?? '');
    $stnr  = trim($stnr[1] ?? '');
    $invoice = Invoice::with(['user','transaction'])->find($id);
    $date = $invoice->date ?? $invoice->created_at;
    $pageConfigs = ['myLayout' => 'blank'];
    return view('content.apps.app-invoice-view-print',compact('pageConfigs','invoice','appinfo','email','fax','stnr','date'));
  }
}

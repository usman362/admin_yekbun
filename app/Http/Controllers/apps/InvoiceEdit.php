<?php

namespace App\Http\Controllers\apps;

use App\Models\AppInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Invoice;

class InvoiceEdit extends Controller
{
    public function index($tId)
    {
        $appinfo = AppInfo::first();
        $description = strip_tags($appinfo->description);
        preg_match('/E-mail:\s*(.*?)(?=Fax:|St\.-Nr\.|$)/i', $description, $email);
        preg_match('/Fax:\s*(.*?)(?=St\.-Nr\.|$)/i', $description, $fax);
        preg_match('/St\.-Nr\.\s*:\s*([A-Z0-9]+)/i', $description, $stnr);
        $email = trim($email[1] ?? '');
        $fax   = trim($fax[1] ?? '');
        $stnr  = trim($stnr[1] ?? '');
        $invoice = Invoice::with(['user','transaction'])->where('transaction_id',$tId)->first();
        $date = $invoice->date ?? $invoice->created_at;
        return view('content.apps.app-invoice-edit',compact('invoice','appinfo','email','fax','stnr','date'));
    }

    public function update(Request $request, $id)
    {
        $invoice = Invoice::findOrFail($id);
        $invoice->date = $request->date;
        $items = [];
        foreach (request('group-a') as $item) {
            $items[] = [
                'amount' => $item['item_amount'] ?? 0,
                'title' => $item['item_title'] ?? '',
                'subscription_type' => $item['item_subscription_type'] ?? '',
                'userType' => $item['item_userType'] ?? '',
                'description' => $item['item_description'] ?? '',
                'quantity' => $item['item_quantity'] ?? 1,
            ];
        }
        $invoice->items = $items;
        $invoice->note = $request->note;
        $invoice->save();
        return redirect()->back()->with('success', 'Invoice updated successfully');
    }

}

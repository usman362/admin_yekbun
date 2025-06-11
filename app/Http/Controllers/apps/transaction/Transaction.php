<?php

namespace App\Http\Controllers\apps\transaction;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Transaction extends Controller
{
  public function index()
  {
    return view('content.transactions.index');
  }
}

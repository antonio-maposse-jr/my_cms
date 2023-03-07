<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CashPaymentController extends Controller
{
    public function index()
    {
        return view('cash_payment.index');
    }
}

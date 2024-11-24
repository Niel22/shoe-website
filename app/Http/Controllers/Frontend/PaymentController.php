<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use Paystack;

class PaymentController extends Controller
{


    public function pay(){

        return view('frontend.checkout.payment');
    }


}

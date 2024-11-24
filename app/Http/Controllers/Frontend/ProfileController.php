<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(){
        return view('frontend.profile.index');
    }

    public function track($trackingNo){
        $order = Order::where('tracking_no', $trackingNo)->first();

        if($order){
        return view('frontend.profile.track-order', compact('order'));
        }else{
            return abort(404);
        }
    }
}

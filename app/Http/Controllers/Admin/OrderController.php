<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        return view('admin.orders.index');
    }

    public function show($id){
        return view('admin.orders.view', compact('id'));
    }

    public function viewInvoice($id){
        $order = Order::findOrFail($id);

        return view('admin.invoice.generate-invoice', compact('order'));
    }
}

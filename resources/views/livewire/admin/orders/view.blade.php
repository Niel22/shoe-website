<div class="row">

    <div class="m-3">
        @include('layouts.inc.admin.flash-message')
    </div>

    <div class="col-md-12">
        <div class="card-body">
            <h4 class="text-primary">
                <i class="fa fa-shopping-cart text-dark"></i> Order Details
                <button wire:click="generateInvoice({{ $order->id }})" class="btn btn-primary btn-sm float-right">Download Invoice</button>
                <a href="{{ route('order.invoice', $order->id) }}" class="btn btn-warning btn-sm float-right">View Invoice</a>
            </h4>
            <hr>

            <div class="row">
                <div class="col-md-6">
                    <h5>Order Details </h5>
                    <hr>
                    <h6>Order Id: {{ $order->id }}</h6>
                    <h6>Tracking No: {{ $order->tracking_no }}</h6>
                    <h6>Ordered Date: {{ $order->created_at->format('d D M, Y') }}</h6>
                    <h6>Payment Mode: {{ $order->payment_mode }}</h6>
                    <h6>Payment Status: {{ $order->payment_status }}</h6>
                    <h6>Total Price: {{ number_format($order->total_price) }}</h6>
                    <h6 class="border p-2 text-success">
                        Order Status Message: <span class="text-uppercase">{{ $order->status_message }}</span>
                    </h6>
                </div>
                <div class="col-md-6">
                    <h5>Customer Details </h5>
                    <hr>
                    <h6>Full Name: {{ $order->full_name }}</h6>
                    <h6>Email: {{ $order->email }}</h6>
                    <h6>Phone: {{ $order->phone }}</h6>
                    <h6>Address: {{ $order->street_address . ', ' . $order->state }}</h6>
                    <h6>ZIP Code: {{ $order->postcode_zip }}</h6>
                </div>
            </div>
            <br>
            <h5>Order Item</h5>
            <hr>
            <div class="table-responsive">
                <table class="table table-bordered table-stripped">
                    <thead>
                        <tr>
                            <th>Item ID</th>
                            <th>Image</th>
                            <th>Product</th>
                            <th>Color</th>
                            <th>Size</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->orderItems as $orderItem)
                            <tr>
                                <td width="10%">{{ $orderItem->id }}</td>
                                <td width="10%">
                                    @if ($orderItem->products->productImages)
                                        <img src="{{ asset('storage/uploads/products/' . $orderItem->products->productImages[0]->image) }}"
                                            width="50px" height="50px" alt="{{ $orderItem->products->name }}">
                                    @else
                                        <img src="" width="50px" height="50px" alt="">
                                    @endif
                                </td>
                                <td>{{ $orderItem->products->name }}</td>
                                <td>{{ $orderItem->color }}</td>
                                <td>{{ $orderItem->size }}</td>
                                <td>{{ number_format($orderItem->products->selling_price, 2) }}</td>
                                <td>{{ $orderItem->quantity }}</td>
                                <td>{{ number_format($orderItem->quantity * $orderItem->products->selling_price, 2) }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <td colspan="7">Total Amount:</td>
                        <td>{{ number_format($order->total_price - 3000) }}</td>
                    </tfoot>
                </table>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h4>Order Process( Order Status Update)</h4>
                <hr>
                <div class="row">
                    <div class="col-md-5">
                        <form wire:submit="updateStatus({{ $order->id }})">
                            <label>Update order status</label>
                            <select wire:model="status" class="form-select">
                                <option value="">Select order status</option>
                                <option {{ $order->status_message === "in progress" ? 'selected' : '' }} value="in progress">In progress</option>
                                <option {{ $order->status_message === "completed" ? 'selected' : '' }} value="completed">Completed</option>
                                <option {{ $order->status_message === "pending" ? 'selected' : '' }} value="pending">Pending</option>
                                <option {{ $order->status_message === "cancelled" ? 'selected' : '' }} value="cancelled">Cancelled</option>
                                <option {{ $order->status_message === "out of stock" ? 'selected' : '' }} value="out of stock">Out of stock</option>
                            </select>
                            <button type="submit" class="btn btn-primary mt-3">Update</button>
                        </form>
                    </div>

                    <div class="col-md-7">
                        <br>
                        <h4 class="mt-3">
                            Current Order Status: <span class="text-uppercase">{{ $order->status_message }}</span>
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Order Details
                    <a href="{{ route('orders.index') }}" class="btn btn-primary btn-sm float-right">Back</a>
                </h3>
            </div>
            <livewire:admin.orders.view :id="$id" />
        </div>
    </div>
</div>
@endsection

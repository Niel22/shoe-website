@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Users
                </h3>
            </div>
            <livewire:admin.users.index lazy />
        </div>
    </div>
</div>
@endsection

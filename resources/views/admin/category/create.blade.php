@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Add Category
                        <a href="{{ route('category.index') }}" class="btn btn-primary btn-sm float-right">Back</a>
                    </h3>
                </div>
                <livewire:admin.category.create />
            </div>
        </div>
    </div>
@endsection

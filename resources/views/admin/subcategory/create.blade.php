@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Add Sub Category
                        <a href="{{ route('subcategory.index') }}" class="btn btn-primary btn-sm float-right">Back</a>
                    </h3>
                </div>
                <livewire:admin.sub-category.create :categories="$categories"/>
            </div>
        </div>
    </div>
@endsection

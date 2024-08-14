@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Create Color
                        <a href="{{ route('color.index') }}" class="btn btn-primary btn-sm float-right">Back</a>
                    </h3>
                </div>
                <livewire:admin.color.create />
            </div>
        </div>
    </div>
@endsection

@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('layouts.inc.admin.flash-message')
            <div class="card">
                <div class="card-header">
                    <h3>Category
                        <a href="{{ route('category.create') }}" class="btn btn-primary btn-sm float-right">Add Category</a>
                    </h3>
                </div>
                <livewire:admin.category.index lazy/>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        window.addEventListener('close-modal', event => {

            $('#deleteModal').modal('hide');
        });
    </script>
@endpush

@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            {{-- @include('layouts.inc.admin.flash-message') --}}
            <div class="card">
                <div class="card-header">
                    <h3>Sub Category
                        <a href="{{ route('subcategory.create') }}" class="btn btn-primary btn-sm float-right">Add Sub Category</a>
                    </h3>
                </div>
                <livewire:admin.sub-category.index />
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

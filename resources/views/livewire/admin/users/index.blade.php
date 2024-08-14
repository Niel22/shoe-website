<div class="card-body text-nowrap table-responsive">
    @if ($users->count() > 0)
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Role</th>
                    <th>Total Order</th>
                    <th>Date Joined</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $index => $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->email_verified_at ? 'Verified' : 'Not Verified' }}</td>
                        <td>{{ $user->is_admin ? 'Admin' : 'User' }}</td>
                        <td>{{ $user->ViewAllOrder->count() }}</td>
                        <td>{{ $user->created_at->format('d D M, Y') }}</td>
                        <td>
                            <a class="btn btn-sm btn-dark btn-icon-text"
                                href="javascript:void(0)">Edit
                                <i class="mdi mdi-file-check btn-icon-append"></i></a>
                            <a href="javascript:void(0)"
                                class="btn btn-sm btn-danger btn-icon-text" data-bs-toggle="modal"
                                data-bs-target="#deleteModal"><i
                                    class="mdi mdi-delete btn-icon-append"></i>Delete</a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    @else
        <div class="alert alert-info text-center">
            {{ $none }}
        </div>
    @endif
    {{ $users->links() }}
</div>

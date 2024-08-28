@extends('admins.master')
@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">All Services</h1>
    <table class="table table-hover table-striped">
        <tr class="table-dark">
            <th>#</th>
            <th>image</th>
            <th>name</th>
            <th>Actions</th>
        </tr>
        @forelse ($items as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td><img src="{{ $item->image_path }}" width="140" alt=""></td>
                <td>{{ $item->name }}</td>
                <td>
                    <a href="{{ route('admin.Service.edit', $item->id) }}" class="btn  btn-primary"><i
                            class="fas fa-edit"></i></a>
                    <form action="{{ route('admin.Service.destroy', $item->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger" type="button" onclick="deleteItem(event)"><i
                                class="fas fa-trash"></i></button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="text-center">no Data Found</td>
            </tr>
        @endforelse

    </table>
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function deleteItem(e) {

            Swal.fire({
                title: "Are you Sure",
                text: "Are you Sure",
                icon: "Are you Sure",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes Delete it',
            }).then((result) => {
                if (result.isConfirmed) {

                    e.target.closest('form').submit();

                }
            })
        }
    </script>
@endsection

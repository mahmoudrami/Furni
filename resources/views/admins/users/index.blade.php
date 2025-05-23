@extends('admins.master')
@section('title', 'User')
@section('content')
    <!-- Page Heading -->
    <div class="d-flex justify-content-between mb-3">
        <h1 class="h3 mb-4 text-gray-800">All Users</h1>
    </div>
    <table class="table table-hover table-striped">
        <tr class="table-dark">
            <th>#</th>
            <th>image</th>
            <th>name</th>
            <th>email</th>
            <th>Actions</th>
        </tr>
        @forelse ($items as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td><img src="{{ $item->image_path }}" width="140px" alt=""></td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->email }}</td>
                <td>
                    {{-- <a href="{{ route('admin.User.edit', $item->id) }}" class="btn  btn-primary"><i
                            class="fas fa-edit"></i></a> --}}
                    <form action="{{ route('admin.User.destroy', $item->id) }}" method="POST" class="d-inline">
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

@endsection

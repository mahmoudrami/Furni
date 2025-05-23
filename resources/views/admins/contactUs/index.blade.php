@extends('admins.master')
@section('title', 'Contact')
@section('content')
    <!-- Page Heading -->
    <div class="d-flex justify-content-between mb-3">
        <h1 class="h3 mb-4 text-gray-800">All contacts</h1>
    </div>
    <table class="table table-hover table-striped">
        <tr class="table-dark">
            <th>#</th>
            <th>name</th>
            <th>email</th>
            <th>Status</th>

            <th>Actions</th>
        </tr>
        @forelse ($items as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>

                <td>{{ $item->first_name }} {{ $item->last_name }}</td>
                <td>{{ $item->email }}</td>
                <td><button class="btn {{ $item->is_open == 1 ? 'btn-success' : 'btn-danger' }}">
                        {{ $item->is_open != 0 ? 'Read' : 'UnRead' }}
                    </button></td>
                <td>
                    <a href="{{ route('admin.Contact.edit', $item->id) }}" class="btn  btn-primary"><i
                            class="fas fa-edit"></i></a>
                    <form action="{{ route('admin.Contact.destroy', $item->id) }}" method="POST" class="d-inline">
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

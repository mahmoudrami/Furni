@extends('admins.master')
@section('title', 'Member')
@section('content')
    <!-- Page Heading -->
    <div class="d-flex justify-content-between mb-3">
        <h1 class="h3 mb-4 text-gray-800">All Members</h1>
        <a href="{{ route('admin.Member.create') }}" class="btn btn-secondary mr-5 h-75 p-2">add new</a>
    </div>
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
                <td><img src="{{ $item->image_path }}" width="140px" alt=""></td>
                <td>{{ $item->name }}</td>
                <td>
                    <a href="{{ route('admin.Member.edit', $item->id) }}" class="btn  btn-primary"><i
                            class="fas fa-edit"></i></a>
                    <form action="{{ route('admin.Member.destroy', $item->id) }}" method="POST" class="d-inline">
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

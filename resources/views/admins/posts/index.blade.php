@extends('admins.master')
@section('title', 'Post')
@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">All Post</h1>
    <table class="table table-hover table-striped">
        <tr class="table-dark">
            <th>#</th>
            <th>image</th>
            <th>title</th>
            <th>Actions</th>
        </tr>
        @forelse ($items as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td><img src="{{ $item->image_path }}" width="140px" alt=""></td>
                <td>{{ $item->title }}</td>
                <td>
                    <a href="{{ route('admin.Post.edit', $item->id) }}" class="btn  btn-primary"><i
                            class="fas fa-edit"></i></a>
                    <form action="{{ route('admin.Post.destroy', $item->id) }}" method="POST" class="d-inline">
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

@extends('admins.master')
@section('content')

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">All Product</h1>
<table class="table table-hover table-striped">
    <tr class="table-dark">
        <th>#</th>
        <th>image</th>
        <th>name</th>
        <th>price</th>
        <th>Quantity</th>
        <th>Actions</th>
    </tr>
    @forelse ($items as $item)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td><img src="{{ $item->image_path }}" width="140" alt=""></td>
        <td>{{ $item->name }}</td>
        <td>{{ $item->price }}</td>
        <td>{{ $item->quantity }}</td>
        <td>
            <a href="{{ route('admin.Product.edit', $item->id) }}" class="btn  btn-primary"><i class="fas fa-edit"></i></a>
            <form action="{{ route('admin.Product.destroy', $item->id) }}" method="POST" class="d-inline">
                @csrf
                @method('delete')
                <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
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

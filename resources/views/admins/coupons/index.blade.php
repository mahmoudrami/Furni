@extends('admins.master')
@section('title', 'Coupons')
@section('content')
    <!-- Page Heading -->
    <div class="d-flex justify-content-between mb-3">
        <h1 class="h3 mb-4 text-gray-800">All Coupons</h1>
        <a href="{{ route('admin.Coupon.create') }}" class="btn btn-secondary mr-5 h-75 p-2">add new</a>
    </div>
    <table class="table table-hover table-striped">
        <tr class="table-dark">
            <th>#</th>
            <th>code</th>
            <th>percentage</th>
            <th>Actions</th>
        </tr>
        @forelse ($items as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->code }}</td>
                <td>{{ $item->percentage }}%</td>
                <td>
                    <a href="{{ route('admin.Coupon.edit', $item->id) }}" class="btn  btn-primary"><i
                            class="fas fa-edit"></i></a>
                    <form action="{{ route('admin.Coupon.destroy', $item->id) }}" method="POST" class="d-inline">
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

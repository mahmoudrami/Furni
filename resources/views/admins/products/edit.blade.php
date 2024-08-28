@extends('admins.master')
@section('title', 'Products')

@section('content')
<h1 class="h3 mb-4 text-gray-800">Edit Product</h1>
    <form action="{{ route('admin.Product.update', @$item->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        @include('admins.products._form')
    </form>

@endsection

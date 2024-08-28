@extends('admins.master')
@section('title', 'Products')

@section('content')
<h1 class="h3 mb-4 text-gray-800">Add New Product</h1>
    <form action="{{ route('admin.Product.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('admins.products._form')
    </form>

@endsection

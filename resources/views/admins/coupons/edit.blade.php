@extends('admins.master')
@section('title', 'Coupons')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Edit Coupons</h1>
    <form action="{{ route('admin.Coupon.update', @$item->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        @include('admins.coupons._form')
    </form>

@endsection

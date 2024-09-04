@extends('admins.master')
@section('title', 'Coupons')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Add New Coupons</h1>
    <form action="{{ route('admin.Coupon.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('admins.coupons._form')
    </form>

@endsection

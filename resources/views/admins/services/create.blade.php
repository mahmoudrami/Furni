@extends('admins.master')
@section('title', 'Services')

@section('content')
<h1 class="h3 mb-4 text-gray-800">Add New Service</h1>
    <form action="{{ route('admin.Service.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('admins.services._form')
    </form>

@endsection

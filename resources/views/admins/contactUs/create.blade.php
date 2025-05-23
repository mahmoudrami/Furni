@extends('admins.master')
@section('title', 'Post')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Add New Post</h1>
    <form action="{{ route('admin.Post.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('admins.contactUs._form')
    </form>

@endsection

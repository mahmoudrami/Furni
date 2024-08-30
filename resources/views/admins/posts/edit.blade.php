@extends('admins.master')
@section('title', 'Post')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Edit Post</h1>
    <form action="{{ route('admin.Post.update', @$item->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        @include('admins.posts._form')
    </form>

@endsection

@extends('admins.master')
@section('title', 'Member')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Add New Member</h1>
    <form action="{{ route('admin.Member.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('admins.members._form')
    </form>

@endsection

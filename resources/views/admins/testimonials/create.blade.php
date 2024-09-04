@extends('admins.master')
@section('title', 'Testimonial')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Add New Testimonial</h1>
    <form action="{{ route('admin.Testimonial.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('admins.testimonials._form')
    </form>

@endsection

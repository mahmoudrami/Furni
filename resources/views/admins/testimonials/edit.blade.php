@extends('admins.master')
@section('title', 'Testimonial')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Edit Testimonial</h1>
    <form action="{{ route('admin.Testimonial.update', @$item->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        @include('admins.testimonials._form')
    </form>

@endsection

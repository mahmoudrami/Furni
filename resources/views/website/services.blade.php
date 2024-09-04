@extends('website.master')
@section('content')
    <!-- Start Why Choose Us Section -->
    <div class="why-choose-section">
        <div class="container">


            <div class="row my-5">
                @foreach ($services as $service)
                    <div class="col-6 col-md-6 col-lg-3 mb-4">
                        <div class="feature">
                            <div class="icon">
                                <img src="{{ $service->image_path }}" alt="Image" class="imf-fluid">
                            </div>
                            <h3>{{ @$service->name }}</h3>
                            <p>{{ @$service->description }}</p>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
    <!-- End Why Choose Us Section -->

    @include('website.products', ['products' => $products])

    @include('website.testimonial', ['testimonials' => $testimonials])
@endsection

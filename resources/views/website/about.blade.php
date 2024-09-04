@extends('website.master')
@section('content')
    <!-- Start Why Choose Us Section -->
    <div class="why-choose-section">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-6">
                    <h2 class="section-title">Why Choose Us</h2>
                    <p>Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate velit
                        imperdiet dolor tempor tristique.</p>

                    <div class="row my-5">
                        @foreach (@$services as $service)
                            <div class="col-6 col-md-6">
                                <div class="feature">
                                    <div class="icon">
                                        <img src="{{ @$service->image_path }}" alt="Image" class="imf-fluid">
                                    </div>
                                    <h3>{{ @$service->name }}</h3>
                                    <p>{{ @$service->description }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="img-wrap">
                        <img src="{{ asset('website/images/why-choose-us-img.jpg') }}" alt="Image" class="img-fluid">
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- End Why Choose Us Section -->

    <!-- Start Team Section -->
    <div class="untree_co-section">
        <div class="container">

            <div class="row mb-5">
                <div class="col-lg-5 mx-auto text-center">
                    <h2 class="section-title">Our Team</h2>
                </div>
            </div>

            <div class="row">
                @foreach ($teams as $team)
                    <div class="col-12 col-md-6 col-lg-3 mb-5 mb-md-0">
                        <img src="{{ $team->image_path }}" class="img-fluid mb-5">
                        <h3 clas><a href="#">{{ $team->name }}</a></h3>
                        <span class="d-block position mb-4">CEO, Founder, Atty.</span>
                        <p>{{ @$team->description }}</p>
                        <p class="mb-0"><a href="#" class="more dark">Learn More <span
                                    class="icon-arrow_forward"></span></a></p>
                    </div>
                @endforeach


            </div>
        </div>
    </div>
    <!-- End Team Section -->

    @include('website.testimonial', ['testimonials' => $testimonials])
@endsection

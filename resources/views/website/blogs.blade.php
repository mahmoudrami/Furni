@extends('website.master')

@section('content')
    <!-- Start Blog Section -->
    <div class="blog-section">
        <div class="container">

            <div class="row">
                @foreach ($blogs as $blog)
                    <div class="col-12 col-sm-6 col-md-4 mb-5">
                        <div class="post-entry">
                            <a href="#" class="post-thumbnail"><img src="{{ $blog->image_path }}" alt="Image"
                                    class="img-fluid"></a>
                            <div class="post-content-entry">
                                <h3><a href="#">{{ $blog->title }}</a></h3>
                                <div class="meta">
                                    <span>by <a href="#">{{ $blog->user->name }}</a></span> <span>on <a
                                            href="#">{{ $blog->created_at->format('M d, Y') }}</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
    <!-- End Blog Section -->
@endsection

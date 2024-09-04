    <!-- Start Product Section -->
    <div class="product-section pt-0">
        <div class="container">
            <div class="row">

                <!-- Start Column 1 -->
                <div class="col-md-12 col-lg-3 mb-5 mb-lg-0">
                    <h2 class="mb-4 section-title">Crafted with excellent material.</h2>
                    <p class="mb-4">Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam
                        vulputate velit imperdiet dolor tempor tristique. </p>
                    <p><a href="#" class="btn">Explore</a></p>
                </div>
                <!-- End Column 1 -->

                <!-- Start Column 2 -->
                @foreach ($products as $product)
                    <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
                        <a class="product-item" href="#">
                            <img src="{{ $product->image_path }}" class="img-fluid product-thumbnail">
                            <h3 class="product-title">{{ $product->name }}</h3>
                            <strong class="product-price">${{ $product->price }}</strong>

                            <span class="icon-cross">
                                <img src="images/cross.svg" class="img-fluid">
                            </span>
                        </a>
                    </div>
                @endforeach
                <!-- End Column 2 -->


            </div>
        </div>
    </div>
    <!-- End Product Section -->

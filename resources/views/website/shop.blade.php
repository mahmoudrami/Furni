@extends('website.master')
@section('content')
    <input type="hidden" value="{{ Auth::check() ? '1' : '0' }}" name="Auth" id="Auth">
    <div class="untree_co-section product-section before-footer-section">
        <div class="container">
            <div class="row">
                <!-- Start Column 1 -->
                @foreach (@$products as $product)
                    <div class="col-12 col-md-4 col-lg-3 mb-5">
                        <a class="product-item" href="#" data-id="{{ $product->id }}">
                            <img src="{{ $product->image_path }}" class="img-fluid product-thumbnail">
                            <h3 class="product-title">{{ $product->name }}</h3>
                            <strong class="product-price">${{ $product->price }}</strong>
                            <span class="icon-cross">
                                <img src="{{ asset('website/images/cross.svg') }}" class="img-fluid">
                            </span>
                        </a>
                    </div>
                    <!-- End Column 1 -->
                @endforeach

            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>

    <script>
        let checkAuth = document.querySelector('#Auth').value;
        console.log(checkAuth === '0' ? 'true' : 'false');
        document.querySelectorAll('.product-item').forEach(el => {
            el.onclick = (e) => {
                e.preventDefault();
                if (checkAuth === '1') {
                    let id = el.getAttribute('data-id');
                    $.ajax({
                        url: "{{ route('addCart') }}/" + id,
                        method: "POST",
                        data: {
                            "_token": "{{ csrf_token() }}"
                        },
                        success: function(res) {
                            Swal.fire({
                                position: "center",
                                icon: "success",
                                title: "add product to cart",
                                showConfirmButton: false,
                                timer: 1500
                            });
                        }
                    });
                } else {
                    window.location.href = "{{ route('login') }}"
                }
            }

        });
    </script>
@endsection

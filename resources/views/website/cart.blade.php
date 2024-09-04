@extends('website.master')
@section('content')
    <div class="untree_co-section before-footer-section">
        <div class="container">
            <div class="row mb-5">
                <form class="col-md-12" method="post">
                    <div class="site-blocks-table">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="product-thumbnail">Image</th>
                                    <th class="product-name">Product</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-total">Total</th>
                                    <th class="product-remove">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cart->products as $product)
                                    <tr class="product-{{ $product->product->id }}">
                                        <td class="product-thumbnail">
                                            <img src="{{ $product->product->image_path }}" alt="Image"
                                                class="img-fluid" />
                                        </td>
                                        <td class="product-name">
                                            <h2 class="h5 text-black">{{ $product->product->name }}</h2>
                                        </td>
                                        <td>${{ $product->product->price }}</td>
                                        <td>
                                            <div class="input-group mb-3 d-flex align-items-center quantity-container"
                                                style="max-width: 120px">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-outline-black decrease" type="button">
                                                        &minus;
                                                    </button>
                                                </div>
                                                <input type="text" class="form-control text-center quantity-amount"
                                                    value="{{ $product->quantity }}" placeholder=""
                                                    aria-label="Example text with button addon"
                                                    aria-describedby="button-addon1" data-id="{{ $product->product->id }}"
                                                    maxlength="{{ $product->quantity }}" />
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-black increase" type="button">
                                                        &plus;
                                                    </button>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="total-{{ $product->product->id }}">${{ $product->price }}</td>
                                        <td><a href="#" class="btn btn-black btn-sm"
                                                onclick="deleteProduct(event,{{ $product->product->id }})">X</a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </form>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="row mb-5">
                        <div class="col-md-6 mb-3 mb-md-0">
                            <a href="{{ route('shop') }}">
                                <button class="btn btn-black btn-sm btn-block">
                                    Update Cart
                                </button>
                            </a>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('shop') }}">
                                <button class="btn btn-outline-black btn-sm btn-block">
                                    Continue Shopping
                                </button>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="text-black h4" for="coupon">Coupon</label>
                            <p>Enter your coupon code if you have one.</p>
                        </div>
                        <div class="col-md-8 mb-3 mb-md-0">
                            <input type="text" class="form-control py-3" id="coupon" placeholder="Coupon Code" />
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-black" onclick="applyCoupon({{ $cart->id }})">Apply Coupon</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 pl-5">
                    <div class="row justify-content-end">
                        <div class="col-md-7">
                            <div class="row">
                                <div class="col-md-12 text-right border-bottom mb-5">
                                    <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <span class="text-black">Subtotal</span>
                                </div>
                                <div class="col-md-6 text-right">
                                    <strong class="text-black">${{ $cart->total }}</strong>
                                </div>
                            </div>
                            <div class="row mb-5">
                                <div class="col-md-6">
                                    <span class="text-black">Total</span>
                                </div>
                                <div class="col-md-6 text-right">
                                    <strong class="text-black" id="totalPriceCart">${{ $cart->total }}</strong>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <button class="btn btn-black btn-lg py-3 btn-block"
                                        onclick="window.location='checkout.html'">
                                        Proceed To Checkout
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <script>
        let x = document.querySelectorAll('.quantity-amount');
        document.querySelectorAll('.decrease').forEach((el, position) => {
            el.onclick = () => {
                let id = x[position].getAttribute('data-id');
                changeQuantity(id, position, true);
            }
        });
        document.querySelectorAll('.increase').forEach((el, position) => {
            el.onclick = () => {
                let id = x[position].getAttribute('data-id');
                changeQuantity(id, position);
            }
        });

        function changeQuantity(id, position, decrement = false) {
            $.ajax({
                method: 'POST',
                url: "{{ route('addProduct') }}/" + id,
                data: {
                    '_token': '{{ csrf_token() }}',
                    'quantity': x[position].value,
                    'decrement': decrement
                },
                success: function(res) {
                    if (res) {
                        if (res.added) {
                            console.log(res.total)
                            let price = document.getElementsByClassName('total-' + id)[0];
                            price.innerHTML = '$' + res.item.price;
                            let totalPriceCart = document.getElementById('totalPriceCart');
                            totalPriceCart.innerHTML = '$' + res.total
                        } else {
                            console.log(`cant add becuse the quantity ${0}`);
                        }

                    } else {
                        let product = document.getElementsByClassName('product-' + id)[0];
                        product.remove();
                    }
                }
            });
        }

        function deleteProduct(e, id) {
            e.preventDefault();
            $.ajax({
                method: 'POST',
                url: "{{ route('deleteProduct') }}/" + id,
                data: {
                    '_token': '{{ csrf_token() }}',
                },
                success: function(res) {
                    if (res) {
                        let product = document.getElementsByClassName('product-' + id)[0];
                        product.remove();
                    }
                }
            });
        }

        function applyCoupon(id) {
            let code = document.getElementById('coupon');
            if (code.value.length > 0) {
                $.ajax({
                    method: 'POST',
                    url: "{{ route('applyCoupon') }}/" + id,
                    data: {
                        '_token': '{{ csrf_token() }}',
                        'code': code.value,
                    },
                    success: function(res) {
                        if (res.status) {
                            console.log(res.use)
                            let totalPriceCart = document.getElementById('totalPriceCart');
                            totalPriceCart.innerHTML = '$' + res.total
                            Swal.fire({
                                position: "center",
                                icon: res.type,
                                title: res.msg,
                                showConfirmButton: false,
                                timer: 1500
                            });
                        } else {
                            Swal.fire({
                                position: "center",
                                icon: "error",
                                title: "The Coupon Not Found",
                                showConfirmButton: false,
                                timer: 1500
                            });
                        }
                    }
                });
            } else {
                code.classList.add('is-invalid');
            }

        }
    </script>
@endsection

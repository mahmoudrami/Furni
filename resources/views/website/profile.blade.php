@extends('website.master')
@section('css')
    <style>
        #previwe {
            width: 200px;
            height: 200px;
            border-radius: 50%;
            object-fit: cover;
            padding: 5px;
            border: 1px #aaaaaa dashed;
            transition: all 0.3 ease
        }

        #previwe:hover {
            opacity: 0.8;
        }

        .pass-wrapper {
            position: relative;
        }

        .pass-wrapper i {
            position: absolute;
            right: 15px;
            top: 20px
        }
    </style>
@endsection
@section('content')
    <div class="product-section">
        <div class="container">
            <form action="{{ route('editProfile') }}" method="POST">
                @csrf
                <div class="row">
                    @if (session('msg'))
                        <div class="alert alert-{{ session('type') }} ">
                            {{ session('msg') }}
                        </div>
                    @endif
                    <div class="col-5 d-flex justify-content-center">
                        <div class="mb-3">
                            <label for="image" class="pt-5"><img src="{{ $user->image_path }}" id="previwe"
                                    alt=""></label>
                            <input type="file" name="name" accept="image/png,jpg" id="image" placeholder="Name"
                                onchange="showImg(event)" class="form-control @error('name') is-invalid @enderror"
                                style="display: none">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-7">
                        <div class="mb-3">
                            <label>Name</label>
                            <input type="text" name="name" placeholder="Name"
                                class="form-control @error('name') is-invalid @enderror" value="{{ $user->name }}">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>Email</label>
                            <input type="email" name="email" placeholder="Email"
                                class="form-control @error('email') is-invalid @enderror" disabled
                                value="{{ $user->email }}">
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>Old Password</label>
                            <div class="pass-wrapper">
                                <input type="password" name="old_password" id="old-password"
                                    class="form-control old-password">
                                <i class="fas fa-eye"></i>
                            </div>
                            @error('old_password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>New Password</label>
                            <input type="password" name="password" disabled class="form-control new">
                            @error('password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>Confirm Passwrod</label>
                            <input type="password" disabled name="password_confirmation" class="form-control new">
                            @error('password_confirmation')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <button class="btn btn-sm btn-success"><i class="fas fa-save"></i> Update</button>
                    </div>


                </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
    <script>
        function showImg(e) {
            const [file] = e.target.files
            if (file) {
                previwe.src = URL.createObjectURL(file)
            }
        }

        $('#old-password').blur(function() {
            console.log(33);
            $.ajax({
                url: "{{ route('checkPassword') }}",
                method: 'POST',
                data: {
                    '_token': '{{ csrf_token() }}',
                    'password': $(this).val(),
                },
                success: function(res) {
                    if (res) {
                        $('.new').attr('disabled', false);
                        $('#old-password').addClass('is-valid');
                        $('#old-password').removeClass('is-invalid');
                    } else {
                        $('.new').attr('disabled', true);
                        $('#old-password').addClass('is-invalid');
                        $('#old-password').removeClass('is-valid');
                    }
                }
            });

        })
        document.querySelector('.pass-wrapper i').onclick = () => {
            if ($('#old-password').attr('type') == 'password') {
                $('#old-password').attr('type', 'text');
            } else {
                $('#old-password').attr('type', 'password');
            }
        }
        setTimeout(() => {
            $('.alert').fadeOut();
        }, 3000);
    </script>
@endsection

@extends('front_panel.layout')

@section("header", "Register")

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                <div class="col-md-6">
                    <input id="name"
                           type="text"
                           class="form-control
                           @error('name')
                           is-invalid @enderror"
                           name="name" value="{{ old('name') }}"
                           required
                           autocomplete="name"
                           autofocus>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>
                <div class="col-md-6">
                    <input id="phone"
                           type="text"
                           class="form-control @error('phone')
                           is-invalid @enderror"
                           name="phone"
                           value="{{ old('phone') }}"
                           required
                           autocomplete="phone"
                           autofocus>
                    @error('phone')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                <div class="col-md-6">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

{{--            <div class="form-group row">--}}
{{--                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>--}}
{{--                <div class="col-md-6">--}}
{{--                    <input id="password"--}}
{{--                           type="password"--}}
{{--                           class="form-control--}}
{{--                           @error('password') is-invalid @enderror"--}}
{{--                           name="password"--}}
{{--                           required--}}
{{--                           autocomplete="new-password">--}}
{{--                    <i class="fa fa-eye" onclick="showPassword()"> </i>--}}
{{--                    @error('password')--}}
{{--                        <span class="invalid-feedback" role="alert">--}}
{{--                            <strong>{{ $message }}</strong>--}}
{{--                        </span>--}}
{{--                    @enderror--}}
{{--                </div>--}}
{{--            </div>--}}
            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                <div class="col-md-6">
                    <input id="password"
                           type="password"
                           class="form-control
                               @error('password') is-invalid @enderror"
                           name="password"
                           required
                           autocomplete="new-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                    @enderror
                    <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i class="fa fa-eye" onclick="showPassword()"> </i></button>
                </div>
            </div>

            <div class="form-group row">
                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    <i class="fa fa-eye" onclick="showPassword()"> </i>
                </div>

            </div>
            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Register') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
<script>
    const showPassword = () => {
        let password = document.getElementById("password")
        let confirmPassword = document.getElementById("password-confirm")

        if (password.type === "password") {
            password.type = "text";
            confirmPassword.type = "text";

        } else {
            confirmPassword.type = "password";
            password.type = "password";
        }
    };

</script>

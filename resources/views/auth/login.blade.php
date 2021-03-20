@extends('layouts.app')

@push("title")
    تسجيل الدخول
@endpush
@section('content')
    <div class="container py-md-5 my-md-4">
        <div class="row align-items-center">
            <div class="col-md-4">
                <img style="width: 100%" src="{{ asset('assets/img/signin.png') }}" alt="">
            </div>

            <div class="col-md-8">
                <form method="POST" class="text-right row" action="{{ route('login') }}">
                    @csrf
                    <div class="col-md-12 text-right mb-3">
                        <h2 class="has-line-black">
                            @lang('app.login')
                        </h2>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email" class="text-md-right">{{ trans('app.email') }}</label>

                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password" class="text-md-right">{{ trans('app.password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6 mx-auto">
                        <div class="form-group text-center">
                            <button type="submit" class="w-100 text-white btn bg-main">
                                {{ trans('app.login') }}
                            </button>
                            <a class="btn btn-link" href="{{ route('register') }}">
                                {{ trans('app.register') }}
                            </a>
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ trans('app.forget_password') }}
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

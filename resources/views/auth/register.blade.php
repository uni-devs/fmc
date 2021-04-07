@extends('layouts.app')

@push("title")
    انشاء حساب
@endpush
@section('content')
    <div class="container py-md-5 my-md-4">
        <div class="row align-items-center">
            <div class="col-md-12 text-right mb-2">
                <h2 class="has-line-black">
                    @lang('app.create_account')
                </h2>
            </div>


            <div class="col-md-4">
                <img style="width: 100%" src="{{ asset('assets/img/signin.png') }}" alt="">
            </div>

            <div class="col-md-8">
                <form method="POST" class="text-right row" action="{{ route('register') }}">
                    @csrf
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name" class="text-md-right">{{ trans('app.name') }}</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="phone" class="text-md-right">{{ trans('app.phone_num') }}</label>
                            <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror"
                                   name="phone" value="{{ old('phone') }}" required>
                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
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
                            <label for="gender" class="text-md-right">{{ trans('app.gender') }}</label>

                            <select name="gender" id="gender" class="form-control @error('gender') is-invalid @enderror">
                                <option value="" disabled readonly="" selected>
                                    @lang('app.select_gender')
                                </option>
                                <option value="1">
                                    @lang('app.male')
                                </option>
                                <option value="2">
                                    @lang('app.female')
                                </option>
                            </select>

                            @error('gender')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password" class=" text-md-right">{{ trans('app.password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password-confirm" class="text-md-right">{{ trans('app.confirm_password') }}</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="is_trainer" class="text-md-right">نوع الحساب</label>

                            <select name="is_trainer" id="is_trainer" class="form-control @error('is_trainer') is-invalid @enderror">
{{--                                <option value="" disabled readonly="" selected>--}}
{{--                                    الرجاء اختيار اجابة--}}
{{--                                </option>--}}
                                <option value="0">
                                   متدرب
                                </option>
                                <option value="1">
                                    مدرب
                                </option>
                            </select>

                            @error('is_trainer')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12"></div>
                    <div class="col-md-6 mx-auto">
                        <div class="form-group text-center">
                            <button type="submit" class="w-100 text-white btn bg-main">
                                {{ trans('app.register') }}
                            </button>
                            <a class="btn btn-link" href="{{ route('login') }}">
                                {{ trans('app.have_account') }}
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

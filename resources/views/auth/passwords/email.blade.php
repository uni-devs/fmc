@extends('layouts.app')

@push("title")
    إعادة تعيين كلمة المرور
@endpush
@section('content')
    <div class="container py-md-5 my-md-4">
        <div class="row align-items-center">
            <div class="col-md-4">
                <img style="width: 100%;" src="{{ asset('assets/img/forgot-password.png') }}" alt="">
            </div>
            <div class="col-md-8">
                <form method="POST" class="text-right row" action="{{ route('password.email') }}">
                    @csrf

                    <div class="col-md-8 mx-auto text-right mb-3">
                        <h2 class="">
                            @lang('app.reset_password')
                        </h2>
                    </div>
                    <div class="col-md-12"></div>
                    <div class="col-md-8 mx-auto">
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
                    <div class="col-md-12"></div>
                    <div class="col-md-6 mx-auto">
                        <div class="form-group text-center">
                            <button type="submit" class="btn bg-main text-white">
                                {{ trans('app.send_reset_link') }}
                            </button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

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
                    <form class="text-right row"  method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="col-md-12 text-right mb-3">
                            <h2 class="has-line-black">
                                @lang('app.update_password')
                            </h2>
                        </div>

                       <div class="col-md-6">
                           <div class="form-group">
                               <label for="email" class="text-md-right">{{ trans('app.email') }}</label>
                               <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                      name="email" value="{{ $email ?? old('email') }}" required autocomplete="email"
                                      autofocus>

                               @error('email')
                               <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                               @enderror
                           </div>
                       </div>
                        <div class="col-md-12"></div>
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

                        <div class="col-md-12">
                            <div class="form-group text-center">
                                <button type="submit" class="w-100 text-white btn bg-main">
                                    {{ trans('app.save') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection

@extends('layouts.app')
@push("title")
    لوحه التحكم
@endpush
@section('content')
    <div class="container">
        <div class="row text-right">
            <div class="col-md-3">
                <div class="avatar text-right mb-2">
                    <img src="{{ asset('assets/img/admin_avatar.png') }}" alt="">
                </div>
                <hr>
                <h5><span class="mdi mdi-account-outline ml-1"></span> {{ auth()->user()->name }}</h5>
                <h6><span class="mdi mdi-email-outline ml-1"></span> {{ auth()->user()->email }}</h6>
                <hr>
                <button
                    data-toggle="modal" data-target="#update-password"
                    class="btn btn-dark mb-2">
                    <span class="mdi mdi-lock-reset"></span>
                    تغير كلمة المرور
                </button>
                <form id="logout-form" action="{{ route('admin.logout') }}" method="post">
                    @csrf
                    <button class="btn btn-danger">
                        <span class="mdi mdi-logout ml-1"></span>
                        تسجيل الخروج
                    </button>
                </form>

            </div>
            <div class="col-md-9">
                <div class="row text-right">
                    <div class="col-md-12">
                        <h2 class="has-line-black">
                            <span class="mdi mdi-view-dashboard"></span>
                            معلومات عامة
                        </h2>
                    </div>.
                    <div class="col-md-12">
                        <div class="row">
                            <!--Grid column-->
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="media grey darken-1 text-white z-depth-1 rounded align-items-center">
                                    <i class="mdi mdi-weight-lifter mdi-48px grey darken-4 z-depth-1 p-2 rounded-left text-white"></i>
                                    <div class="media-body px-3">
                                        <p class="h5 text-uppercase mt-2 mb-1 ml-3"><small>الدورات التدريبية</small></p>
                                        <p class="h4 font-weight-bold mb-1 ml-3">{{ $workshops }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="media blue  text-white z-depth-1 rounded align-items-center">
                                    <i class="mdi mdi-account mdi-48px blue darken-3 z-depth-1 p-2 px-2 rounded-left text-white"></i>
                                    <div class="media-body px-3">
                                        <p class="h5 text-uppercase mt-2 mb-1 ml-3"><small>المتدربين</small></p>
                                        <p class="h4 font-weight-bold mb-1 ml-3">{{ $users }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="media orange darken-1 text-white z-depth-1 rounded align-items-center">
                                    <i class="mdi mdi-weight-lifter mdi-48px orange darken-4 z-depth-1 p-2 rounded-left text-white"></i>
                                    <div class="media-body px-3">
                                        <p class="h5 text-uppercase mt-2 mb-1 ml-3"><small>المدربين</small></p>
                                        <p class="h4 font-weight-bold mb-1 ml-3">{{ $trainers }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="media green darken-1 text-white z-depth-1 rounded align-items-center">
                                    <i class="mdi mdi-chart-areaspline mdi-48px green darken-4 z-depth-1 p-2 rounded-left text-white"></i>
                                    <div class="media-body px-3">
                                        <p class="h5 text-uppercase mt-2 mb-1 ml-3"><small>اجمالي تسجيلات بالدورات</small></p>
                                        <p class="h4 font-weight-bold mb-1 ml-3">{{ $regs }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="update-password" tabindex="-1" aria-labelledby="UpdatePassword" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">تغير كلمة المرور</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="{{ route('admin.profile.update') }}">
                    @csrf
                    <div class="modal-body text-right">
                        <div class="form-group">
                            <label for="old_password">كلمة المرور القديمة</label>
                            <input type="password" id="old_password" name="old_password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="new_password">كلمة المرور الجديدة</label>
                            <input type="password" id="new_password" name="new_password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password-confirm" class="text-md-right">{{ trans('app.confirm_password') }}</label>
                            <input id="password-confirm" type="password" class="form-control" name="new_password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                        <button type="submit" class="btn btn-primary">تغير الان</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

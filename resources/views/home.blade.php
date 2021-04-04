@extends('layouts.app')
@push("title")
    الملف الشخصي
@endpush
@section('content')
    <div class="container">
        <div class="row align-items-start">
            <div class="col-md-3 text-right">
                <div class="avatar text-right mb-2">
                    <img src="{{ asset('assets/img/user.png') }}" alt="">
                </div>
                <hr>
                <h5><span class="mdi mdi-account-outline ml-1"></span> {{ auth()->user()->name }} - {{ auth()->user()->is_trainer ? "مدرب" : "متدرب" }}</h5>
                <h6><span class="mdi mdi-phone-outline ml-1"></span> {{ auth()->user()->phone }}</h6>
                <h6><span class="mdi mdi-email-outline ml-1"></span> {{ auth()->user()->email }}</h6>
                <hr>
                <button
                    data-toggle="modal" data-target="#update-password"
                    class="btn btn-dark mb-2">
                    <span class="mdi mdi-lock-reset"></span>
                    تغير كلمة المرور
                </button>
                <form id="logout-form" action="{{ route('logout') }}" method="post">
                    @csrf
                    <button class="btn btn-danger">
                        <span class="mdi mdi-logout ml-1"></span>
                        تسجيل الخروج
                    </button>
                </form>
            </div>
            <div class="col-md-9 text-right">
                <h4 class="mb-4 has-line-black">
                    @if(!auth()->user()->hasAnyRole('trainer|super_admin'))
                        الدورات المسجل به
                    @else
                        الدورات الخاصة بي
                    @endif
                </h4>
                <hr>
                @if(!auth()->user()->hasAnyRole('trainer|super_admin'))
                    @forelse($registrations as $record)
                        @php $item = $record->workshop; @endphp
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <img class="img-fluid" src="{{ $item->image->url }}" alt="">
                                    </div>
                                    <div class="col-md-9">
                                        <h5>{{ $item->name }}</h5>
                                        <h6><span class="mdi mdi-calendar-outline"></span> تاريخ الدورة:  {{ " من " .$item->date_from . " hgd " . $item->date_to }}</h6>
                                        <h6><span class="mdi mdi-clock-outline"></span> {{ $item->duration }}</h6>
                                        <h6><span class="mdi mdi-account-circle-outline"></span> المدرب {{ $item->trainer->name }}</h6>
                                        <h6><span class="mdi mdi-calendar-check-outline"></span> تاريخ التسجيل بالدروة : {{ $record->created_at->format("Y-m-d") }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <h3>انت غير مسدل باي دورة</h3>
                            </div>
                        </div>
                    @endforelse
                @else
                    @forelse($trainer_workshop as $item)
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <img class="img-fluid" src="{{ $item->image?$item->image->url:"" }}" alt="">
                                    </div>
                                    <div class="col-md-9">
                                        <h5>{{ $item->name }}</h5>
                                        <h6><span class="mdi mdi-account-group-outline"></span> متدرب : {{ $item->registrations()->count() }}</h6>
                                        <h6><span class="mdi mdi-calendar-outline"></span> تاريخ الدورة:  {{ " من " .$item->date_from . " hgd " . $item->date_to }}</h6>
                                        <h6><span class="mdi mdi-clock-outline"></span> {{ $item->duration }}</h6>
                                        <h6><span class="mdi mdi-cash"></span> السعر : {{ $item->price }}</h6>
                                        <h6><span class="mdi mdi-calendar-check-outline"></span> تاريخ اضافة الدورة : {{ $item->created_at->format("Y-m-d") }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <h3>لا يوجد دورات خاصة بك</h3>
                            </div>
                        </div>
                    @endforelse
                @endif
            </div>
        </div>
    </div>


    <div class="modal fade" id="update-password" tabindex="-1" aria-labelledby="UpdatePassword" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">تغير كلمة المرور</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="{{ route('profile.update') }}">
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

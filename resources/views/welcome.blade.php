@extends('layouts.app')
@push("title")
    الرئيسية
@endpush
@section('content')
    <section id="banner">
        <div class="container">
            <div class="row h-100 align-items-center align-content-center justify-content-center">
                <div class="col-md-6">
                    <img style="height: 450px;width: 100%" src="{{ asset('assets/img/banner.jpg') }}" alt="">
                </div>
                <div class="col-md-6 text-right">
                    <h1>مرحبا في مركز عقول مثمرة</h1>
                    <p>
                        مركز التدريب والاشراف التربوي معتمد من وزراه التعليم وكيل برنامج عقول للحساب الذهني في الشرق الاوسط ، عضو الاكاديميه الدوليه البريطانيه
                    </p>
                </div>
            </div>
        </div>
    </section>
    <div class="container py-4">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2>
                    إجراءات سريعة
                </h2>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-4">
                <div class="card">
                        <div class="card-body text-center">
                            <img style="width: 100%;" src="{{ asset('assets/img/signin.png') }}" alt="">
                            <a href="{{ route('register') }}">
                                <h3>تسجيل الان</h3>
                            </a>
                            <p>انشئ حساب الان و قم بالتسجيل في الدورات </p>
                        </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                        <div class="card-body text-center">
                            <img style="width: 100%;" src="{{ asset('assets/img/activity.png') }}" alt="">
                            <a href="{{ route('workshops.all') }}">
                                <h3>تصفح الدورات</h3>
                            </a>
                            <p>ابدا الان و تصفح العديد من الدورات المفيدة و احجز الان</p>
                        </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                        <div class="card-body text-center">
                            <img style="width: 100%;" src="{{ asset('assets/img/contact.png') }}" alt="">
                            <a href="{{ route('contact') }}">
                                <h3>تواصل معنا</h3>
                            </a>
                            <p>اذا كان يدور في رأسك اي اسئلة لا تترددو تواصل معنا</p>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection


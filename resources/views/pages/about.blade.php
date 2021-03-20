@extends('layouts.app')


@push("title")
    عنا
@endpush
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <img style="width: 100%" src="{{ asset('assets/img/about.png') }}" alt="">
            </div>
            <div class="col-md-8">
                <div class="row text-right">
                    <div class="col-md-12">
                        <h2 class="has-line-black">
                            من نحن ؟
                        </h2>
                        <p>
                            مركز التدريب والاشراف التربوي
                            معتمد من وزراه التعليم
                            وكيل برنامج عقول  للحساب الذهني في الشرق الاوسط ، عضو الاكاديميه  الدوليه البريطانيه
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')


@push("title")
    تواصل معنا
@endpush
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <img style="width: 100%" src="{{ asset('assets/img/contact.png') }}" alt="">
            </div>
            <div class="col-md-8">
                <div class="row text-right">
                    <div class="col-md-12">
                        <h2 class="has-line-black">
                            تواصل معنا
                        </h2>
                        <br>
                        <h6>اذا كان لديك اي اسئلة او استفسارات يمكنك التواصل معنا عبر الوسائل التالية</h6>
                        <div class="row mt-3">
                            <div class="col-lg-4 col-md-6 col-6">
                                <a href="" class="btn fb-link rounded-0 w-100">
                                    <span class="mdi mdi-facebook"></span>
                                     فيسبوك
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-6 col-6">
                                <a href="" class="btn whatsapp-link rounded-0 w-100">
                                    <span class="mdi mdi-whatsapp"></span>
                                     واتس اب
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-6 col-6">
                                <a href="" class="btn snapchat-link rounded-0 w-100">
                                    <span class="mdi mdi-snapchat"></span>
                                    سناب شات
                                </a>
                            </div>
                            <div class="col-md-12 my-3"></div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-center">
                                    <span class="mdi mdi-email-send-outline mdi-48px"></span>
                                    <div class="text  mr-2">
                                        <h6 class="mb-0">البريد الالكتروني</h6>
                                        <h5 class="mb-0 text-left">contact@fmc.com</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-center">
                                    <span class="mdi mdi-phone-outline mdi-48px"></span>
                                    <div class="text  mr-2">
                                        <h6 class="mb-0">رقم الهاتف</h6>
                                        <h5 class="mb-0 text-left">00123456789</h5>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

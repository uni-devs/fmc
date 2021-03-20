@extends('layouts.app')

@push("title")
    {{ $item->name }}
@endpush

@section('content')
    <div class="container">
        <div class="row text-right align-items-start">
            <div class="col-md-4">
                <img style="width: 100%" src="{{ $item->image->url }}" alt="">
            </div>
            <div class="col-md-4">
                <a href="{{ route('workshops.single',$item->id) }}">
                    <h4>{{ $item->name }}</h4>
                </a>
                <p>{{ $item->info }}</p>
                <hr>
                <h5 class="mb-1"><span class="mdi mdi-calendar"></span> {{ 'من '.$item->date_from." الي ".$item->date_to }}</h5>
                <h5 class="mb-1"><span class="mdi mdi-clock-outline"></span> {{ $item->duration }}</h5>
                <h5><span class="mdi mdi-account"></span> المدرب {{ $item->trainer->name }}</h5>
            </div>
            <div class="col-md-4 mt-md-4 mt-0">
                <h4>
                    <span class="mdi mdi-cash"></span>
                    السعر
                    {{ $item->price }}
                    ريال سعودى
                </h4>
                <hr>
                <div class="d-flex justify-content-between align-items-center">
                    <span class="h5">شارك </span>
                    <div class="share-links">
                        <a class="fb-link" href=""><span class="mdi mdi-facebook"></span></a>
                        <a class="whatsapp-link" href=""><span class="mdi mdi-whatsapp"></span></a>
                        <a class="twitter-link" href=""><span class="mdi mdi-twitter"></span></a>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row text-right mt-3">
            <div class="col-md-12">
                <h3 class="has-line-black">
                    الطلاب المسجلين بالدورة
                </h3>
            </div>
            <div class="col-md-12">
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>الاسم</th>
                        <th>رقم الهاتف</th>
                        <th>البريد الالكتروني</th>
                        <th>تاريخ التسجيل</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($regs as $reg)
                        <tr>
                            <td>{{ $loop->index }}</td>
                            <td>{{ $reg->user->name }}</td>
                            <td>{{ $reg->user->phone }}</td>
                            <td>{{ $reg->user->email }}</td>
                            <td>{{ $reg->created_at->format("Y/m/d h:i:A") }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            @if (!$regs->count())
                <div class="col-md-12 text-center">
                    <h5>
                        لا يوجد طلاب مسجلين هي هذة الدورة
                    </h5>
                </div>
            @endif
        </div>
    </div>
@endsection

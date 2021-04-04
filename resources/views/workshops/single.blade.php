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
                <hr>
                <h5 class="mb-1"><span class="mdi mdi-calendar"></span> {{ 'من '.$item->date_from." الي ".$item->date_to }}</h5>
                <h6 class="mb-0"><span class="mdi mdi-clock-outline"></span> {{ 'من '.$item->time_from." الي ".$item->time_to }}</h6>
                <h5><span class="mdi mdi-account"></span> المدرب {{ $item->trainer->name }}</h5>
            </div>
            <div class="col-md-4 mt-md-4 mt-0">
                <h4>
                    <span class="mdi mdi-cash"></span>
                    السعر
                    {{ $item->price }}
                    ريال سعودى
                </h4>
                @if(!$registered)
                <form method="post" action="{{ route('workshops.register',$item->id) }}">
                    @csrf
                    <button type="submit" class="btn btn-primary w-100">سجل الان</button>
                </form>
                @else
                    <button disabled class="w-100 btn btn-success">انت مسجل بالفعل</button>
                @endif
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
    </div>
@endsection

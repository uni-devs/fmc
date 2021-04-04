@extends('layouts.app')

@push("title")
    تعديل
    {{ $item->name }}
@endpush
@section('content')
    <div class="container">
        <div class="row text-right">
            <div class="col-md-12">
                <h3 class="has-line-black">
                    <span class="mdi mdi-pencil"></span>
                    تعديل : {{ $item->name }}</h3>
            </div>
            <div class="col-md-12">
                <form method="post" action="{{ route('admin.workshops.update',$item->id)  }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row text-right">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name">@lang('workshop.name')</label>
                                <input value="{{ $item->name }}" class="form-control" type="text" name="name" id="name" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="trainer_id_text">@lang('workshop.trainer')</label>
                                <input value="{{ $item->trainer_id }}" id="trainer_id" required type="hidden" name="trainer_id">
                                <input
                                    value="{{ $item->trainer->name }}" type="text" class='form-control basicAutoComplete'
                                       id="trainer_id_text"
                                       placeholder="اختر الدرب ..."
                                       data-url="{{ route('admin.trainer.search') }}" autocomplete="off">

                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="time_from">@lang('workshop.time_from')</label>
                                <input value="{{$item->time_from}}" class="form-control" type="text" name="time_from" id="time_from" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="time_to">@lang('workshop.time_to')</label>
                                <input value="{{$item->time_to}}" class="form-control" type="text" name="time_to" id="time_to" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="date_from">@lang('workshop.date_from')</label>
                                <input value="{{$item->date_from}}" class="form-control" type="date" name="date_from" id="date_from" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="date_to">@lang('workshop.date_to')</label>
                                <input value="{{ $item->date_to }}" class="form-control" type="date" name="date_to" id="date_to" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="price">@lang('workshop.price')</label>
                                <input value="{{$item->price}}" class="form-control" type="number" step="any"
                                       name="price" id="price" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="image_id">@lang('app.choose_photo')</label>
                                <input class="form-control-file" type="file" name="image_id" id="image_id">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">اجفظ</button>
                </form>
            </div>
        </div>
    </div>
@endsection


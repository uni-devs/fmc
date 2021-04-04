@extends('layouts.app')
@push("title")
    الدورات التدريبية
@endpush
@section('content')
    <div class="container">
        <div class="row text-right">
            <div class="col-lg-10">
                <h2 class="has-line-black">
                    تصفح الدورات
                </h2>
            </div>
            <div class="col-lg-2 text-left">
                @can('add workshop')
                    <button type="button" class="btn btn-success" data-toggle="modal"
                            data-target="#addWorkshop">
                        أضف دروة
                    </button>
                @endcan
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-lg-4 col-md-6 col-12">
                <form method="get" class="row text-right">
                    <label for="month" class="col-form-label">أظهر دورات شهر</label>
                    <div class="col-md-6">
                        <select class="form-control" name="month" id="month">
                            @for($i=1;$i<=12;$i++)
                                <option @if(\Illuminate\Support\Carbon::now()->month==$i) selected @endif
                                value="{{ $i }}">
                                    {{ \Illuminate\Support\Carbon::create(null,$i)->monthName }}
                                </option>
                            @endfor
                        </select>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-primary">
                            اظهر
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row mt-4">
            @forelse($data as $item)
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body p-2">
                            <div class="img py-3">
                                <img class="w-100" src="{{ $item->image->url }}" alt="">
                            </div>
                            <div class="info text-right">
                                <a href="{{ route('workshops.single',$item->id) }}">
                                    <h4>{{ $item->name }}</h4>
                                </a>
                                <hr>
                                <h6 class="mb-0"><span class="mdi mdi-calendar"></span> {{ 'من '.$item->date_from." الي ".$item->date_to }}</h6>
                                <h6 class="mb-0"><span class="mdi mdi-clock-outline"></span> {{ 'من '.$item->time_from." الي ".$item->time_to }}</h6>
                                <h6><span class="mdi mdi-account"></span> {{ $item->trainer->name }}</h6>
                                @unlessrole('trainer|super_admin')
                                <div class="action text-left">
                                    <a href="{{ route('workshops.single',$item->id) }}" class="btn btn-primary">سجل الان</a>
                                </div>
                                @endunlessrole
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-md-12 mx-auto text-center">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <img class="mx-auto img-fluid" style="height: 450px" src="{{asset('assets/img/noresults.png')}}" alt="">
                        </div>
                        <div class="col-md-6">
                            <h1 class="h1 mb-0">عذرا لا توجد دورات في هذا الشهر</h1>
                        </div>
                    </div>
                </div>
            @endforelse
        </div>
    </div>

    <!-- Add Workshop -->
    @can('add workshop')
        <div class="modal fade" id="addWorkshop" data-keyboard="false" tabindex="-1"
             aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header text-right d-flex justify-content-between align-items-center w-100">
                        <h5 class="modal-title" id="staticBackdropLabel">
                            أضف دورة
                        </h5>
                        <button type="button" class="close m-0 p-0" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" action="{{ $createRoute }}" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body text-right">
                            <div class="form-group">
                                <label for="name">@lang('workshop.name')</label>
                                <input class="form-control" type="text" name="name" id="name" required>
                            </div>
                            <div class="form-group">
                                <label for="info">@lang("workshop.info")</label>
                                <textarea name="info" id="info" cols="4" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="code">@lang('workshop.code')</label>
                                <input class="form-control" type="text" name="code" id="code" required>
                            </div>
                            @role('super_admin')
                            <div class="form-group">
                                <label for="trainer_id_text">@lang('workshop.trainer')</label>
                                <input id="trainer_id" required type="hidden" name="trainer_id">
                                <input type="text" class='form-control basicAutoComplete'
                                       id="trainer_id_text"
                                       placeholder="اختر الدرب ..."
                                       data-url="{{ route('trainer.search') }}" autocomplete="off">

                            </div>
                            @else
                                <input value="{{ auth()->id() }}" id="trainer_id" required type="hidden" name="trainer_id">
                            @endrole

                            <div class="form-group">
                                <label for="duration">@lang('workshop.duration')</label>
                                <input class="form-control" type="text" name="duration" id="duration" required>
                            </div>
                            <div class="form-group">
                                <label for="date_from">@lang('workshop.date_from')</label>
                                <input class="form-control" type="date" name="date_from" id="date_from" required>
                            </div>
                            <div class="form-group">
                                <label for="date_to">@lang('workshop.date_to')</label>
                                <input class="form-control" type="date" name="date_to" id="date_to" required>
                            </div>


                            <div class="form-group">
                                <label for="price">@lang('workshop.price')</label>
                                <input class="form-control" type="number" step="any"
                                       name="price" id="price" required>
                            </div>

                            <div class="form-group">
                                <label for="image_id">@lang('app.choose_photo')</label>
                                <input class="form-control-file" type="file" name="image_id" id="image_id" required>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal">اغلاق</button>
                            <button type="submit" class="btn btn-primary">اضف الان</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

    @endcan
    <!-- Add Workshop -->

@endsection

@push('js')
    <script>
        $('.basicAutoComplete').autoComplete();
        $(".basicAutoComplete").on("autocomplete.select", (evt, item) => {
            $("#trainer_id").val(item.value);
        });

    </script>
@endpush

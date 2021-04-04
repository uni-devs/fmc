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
                <button type="button" class="btn btn-success" data-toggle="modal"
                        data-target="#addWorkshop">
                    أضف دروة
                </button>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-lg-4 col-md-6 col-12">
                <form method="get" class="row text-right">
                    <label for="month" class="col-form-label">أظهر دورات شهر</label>
                    <div class="col-md-6">
                        <select class="form-control" name="month" id="month">
                            @for($i=1;$i<=12;$i++)
                                <option
                                    @if(isset($_GET['month']) && $_GET['month']==$i) selected @elseif(\Illuminate\Support\Carbon::now()->month == $i) selected @endif
                                    value="{{ $i }}">
                                    شهر {{ $i }}
                                </option>
                            @endfor
                            <option @if(isset($_GET['month']) && $_GET['month']=='all') selected @endif value="all">
                                عرض الكل
                            </option>
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
                                <a href="{{ route('admin.workshops.single',$item->id) }}">
                                    <h4>{{ $item->name }}</h4>
                                </a>
                                <hr>
                                <h6 class="mb-0"><span class="mdi mdi-calendar"></span> {{ 'من '.$item->date_from." الي ".$item->date_to }}</h6>
                                <h6 class="mb-0"><span class="mdi mdi-clock-outline"></span> {{ $item->duration }}</h6>
                                <h6><span class="mdi mdi-account"></span> {{ $item->trainer->name }}</h6>
                                <div class="action text-left">
                                    <a href="{{ route('admin.workshops.single',$item->id) }}" class="btn btn-primary">عرض</a>
                                    <a href="{{ route('admin.workshops.edit',$item->id) }}" class="btn btn-warning text-white"><span class="mdi mdi-pencil"></span></a>
                                    <a href="{{ route('admin.workshops.delete',$item->id) }}" class="btn btn-danger text-white deleteBtn"><span class="mdi mdi-trash-can"></span></a>
                                </div>
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
                    <form method="post" action="{{ route('admin.workshops.store')  }}" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body text-right">
                            <div class="form-group">
                                <label for="name">@lang('workshop.name')</label>
                                <input class="form-control" type="text" name="name" id="name" required>
                            </div>
                            <div class="form-group">
                                <label for="trainer_id_text">@lang('workshop.trainer')</label>
                                <input id="trainer_id" required type="hidden" name="trainer_id">
                                <input type="text" class='form-control basicAutoComplete'
                                       id="trainer_id_text"
                                       placeholder="اختر الدرب ..."
                                       data-url="{{ route('admin.trainer.search') }}" autocomplete="off">

                            </div>
                            <div class="form-group">
                                <label for="time_from">@lang('workshop.time_from')</label>
                                <input class="form-control" type="time" name="time_from" id="time_from" required>
                            </div>
                            <div class="form-group">
                                <label for="time_to">@lang('workshop.time_to')</label>
                                <input class="form-control" type="time" name="time_to" id="time_to" required>
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

@endsection

@push('js')
    <script>
        async function askFroConfirm() {
            let result = await Swal.fire({
                title: 'Do you want to proceed?',
                text:"You cannot undo this action",
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: `Yes`,
                denyButtonText: `No`,
                confirmButtonColor: '#2e7d32',
                cancelButtonColor: '#333',
                icon:"warning",
            });
            if (!result.value) {
                return false;
            }
            return  true;
        }
        $('.basicAutoComplete').autoComplete();
        $(".basicAutoComplete").on("autocomplete.select", (evt, item) => {
            $("#trainer_id").val(item.value);
        });
    </script>
@endpush

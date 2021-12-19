@extends('admin.layouts.master')

@section('sitetitle')
    دوره های آموزشی
@endsection


@section('pagetitle')
    دوره های آموزشی
@endsection

@section('content')
    <table class="table table-striped">
        <thead>
            <tr>
                <th class="text-center" scope="col">امکانات</th>
                <th class="text-center" scope="col">ویرایش</th>
                <th class="text-center" scope="col">عکس</th>
                <th class="text-center" scope="col">توضیحات</th>
                <th class="text-center" scope="col">عنوان شغلی</th>
                <th class="text-center" scope="col">نام و نام خانوادگی</th>
                <th class="text-center" scope="col">#</th>
            </tr>
        </thead>
        <tbody>

            {{-- make number for rows --}}
            @php
                $number = 0;
            @endphp

            @foreach ($courses as $course)

                @php
                    $number++;
                @endphp


                <tr>
                    {{-- button for removing course --}}
                    <td class="text-center">
                        <form action="{{ route('admin.ourteam.destroy', $course->id) }}" method="post">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-danger">حذف دوره</button>
                        </form>
                    </td>

                    {{-- button for editing course details --}}
                    <td class="text-center">
                        <button type="button" class="btn btn-warning" data-toggle="modal"
                            data-target="#course{{ $course->id }}">ویرایش اطلاعات
                        </button>
                    </td>

                    {{-- button for editing course image --}}
                    <td class="text-center">
                        <button type="button" class="" data-toggle="modal"
                            data-target="#courseimg{{ $course->id }}">

                            <img src="{{ asset($course->image->path) }}" style="width: 35px; height:35px;">
                        </button>
                    </td>

                    {{-- button for showing job description course --}}
                    <td class="text-center">
                        <button type="button" class="btn btn-info" data-toggle="modal"
                            data-target="#coursedesc{{ $course->id }}">مشاهده</button>
                    </td>

                    {{-- button for showing job title --}}
                    <td class="text-center">
                        {{ $course->job_title }}
                    </td>

                    {{-- button for course name --}}
                    <td class="text-center">
                        {{ $course->name }}
                    </td>

                    <th class="text-center" scope="row">{{ $number }}</th>
                </tr>

                <!-- modal for editing course -->
                <div class="modal fade" id="coursedesc{{ $course->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"> توضیحات دوره </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('admin.ourteam.update', $course->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    {{-- description of course --}}
                                    <div class="form-group row">
                                        <label for="description"
                                            class="col-md-4 col-form-label text-md-right">{{ __('توضیحات') }}</label>

                                        <div class="col-md-6">
                                            <textarea id="description" type="text"
                                                class="form-control @error('job_description') is-invalid @enderror" required
                                                disabled autocomplete="description"
                                                autofocus>{{ $course->description }}</textarea>

                                            @error('description')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div style="margin-top:15px;">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">دیدم</button>
                                    </div>

                                </form>
                            </div>
                            <div class="modal-footer">

                            </div>
                        </div>
                    </div>
                </div>

                <!-- modal for editing course image -->
                <div class="modal fade" id="courseimg{{ $course->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-link" id="exampleModalLabel">تغیر مشخصات عکس</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('admin.ourteam.update.image', $course->image->id) }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf

                                    {{-- section for changing course image --}}
                                    <div class="form-group row">
                                        <label for="path"
                                            class="col-md-4 col-form-label text-md-right">{{ __('عکس') }}</label>

                                        <div class="col-md-6">
                                            <input id="path" type="file"
                                                class="form-control @error('path') is-invalid @enderror" name="path"
                                                autocomplete="path" autofocus>

                                            @error('path')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- section for changing image  alt --}}
                                    <div class="form-group row">
                                        <label for="alt"
                                            class="col-md-4 col-form-label text-md-right">{{ __('عکس alt') }}</label>

                                        <div class="col-md-6">
                                            <input id="alt" type="text"
                                                class="form-control @error('alt') is-invalid @enderror" name="alt" required
                                                autocomplete="alt" value="{{ $course->image->alt }}" autofocus>

                                            @error('alt')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- section for changing image  name --}}
                                    <div class="form-group row">
                                        <label for="name"
                                            class="col-md-4 col-form-label text-md-right">{{ __('عکس name') }}</label>

                                        <div class="col-md-6">
                                            <input id="name" type="text"
                                                class="form-control @error('name') is-invalid @enderror" name="name"
                                                required value="{{ $course->image->name }}" autocomplete="name"
                                                autofocus>

                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div style="margin-top:15px;">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">منصرف
                                            شدم</button>
                                        <button type="submit" class="btn btn-primary">ارسال</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- modal for editing course -->
                <div class="modal fade" id="course{{ $course->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"> تغیر مشخصات دوره </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('admin.ourteam.update', $course->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf


                                    {{-- name of course --}}
                                    <div class="form-group row">
                                        <label for="name"
                                            class="col-md-4 col-form-label text-md-right">{{ __('نام و نام خانوادگی') }}</label>

                                        <div class="col-md-6">
                                            <input id="name" type="text"
                                                class="form-control @error('name') is-invalid @enderror" name="name"
                                                value="{{ $course->name }}" required autocomplete="name" autofocus>

                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- job_title of course --}}
                                    <div class="form-group row">
                                        <label for="job_title"
                                            class="col-md-4 col-form-label text-md-right">{{ __('عنوان شغلی') }}</label>

                                        <div class="col-md-6">
                                            <input id="job_title" type="text"
                                                class="form-control @error('job_title') is-invalid @enderror"
                                                name="job_title" value="{{ $course->job_title }}" required
                                                autocomplete="job_title" autofocus>

                                            @error('job_title')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- description of course --}}
                                    <div class="form-group row">
                                        <label for="description"
                                            class="col-md-4 col-form-label text-md-right">{{ __('توضیحات') }}</label>

                                        <div class="col-md-6">
                                            <textarea id="description" type="text"
                                                class="form-control @error('job_description') is-invalid @enderror"
                                                name="description" required autocomplete="description"
                                                autofocus>{{ $course->description }}</textarea>

                                            @error('description')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div style="margin-top:15px;">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">منصرف
                                            شدم</button>
                                        <button type="submit" class="btn btn-primary">ارسال</button>
                                    </div>

                                </form>
                            </div>
                            <div class="modal-footer">

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </tbody>
    </table>

    {{-- button to add course --}}
    <a href="{{ route('admin.courses.create') }}" class="btn btn-primary">ایجاد دوره جدید</a>

    {{-- modal for adding new course --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> اضافه کردن دوره جدید </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.ourteam.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf


                        {{-- name of course --}}
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('نام دوره') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- type of course --}}
                        <div class="form-group row">
                            <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('نوع دوره') }}</label>

                            <div class="col-md-6">
                                <input id="type" type="text" class="form-control @error('type') is-invalid @enderror"
                                    name="type" value="{{ old('type') }}" required autocomplete="type" autofocus>

                                @error('type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- level of course --}}
                        <div class="form-group row">
                            <label for="level"
                                class="col-md-4 col-form-label text-md-right">{{ __('سطح دوره') }}</label>

                            <div class="col-md-6">
                                <textarea id="level" type="text" class="form-control @error('level') is-invalid @enderror"
                                    name="level" value="{{ old('level') }}" required autocomplete="level"
                                    autofocus></textarea>

                                @error('level')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- section of course --}}
                        <div class="form-group row">
                            <label for="section"
                                class="col-md-4 col-form-label text-md-right">{{ __('تعداد جلسات دوره') }}</label>

                            <div class="col-md-6">
                                <textarea id="section" type="text"
                                    class="form-control @error('section') is-invalid @enderror" name="section"
                                    value="{{ old('section') }}" required autocomplete="section" autofocus></textarea>

                                @error('section')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- pre_need of course --}}
                        <div class="form-group row">
                            <label for="pre_need"
                                class="col-md-4 col-form-label text-md-right">{{ __('پیش نیاز های دوره') }}</label>

                            <div class="col-md-6">
                                <textarea id="pre_need" type="text"
                                    class="form-control @error('pre_need') is-invalid @enderror" name="pre_need"
                                    value="{{ old('pre_need') }}" required autocomplete="pre_need" autofocus></textarea>

                                @error('pre_need')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- price of course --}}
                        <div class="form-group row">
                            <label for="price"
                                class="col-md-4 col-form-label text-md-right">{{ __('هزینه دوره') }}</label>

                            <div class="col-md-6">
                                <textarea id="price" type="text"
                                    class="form-control @error('pre_need') is-invalid @enderror" name="price"
                                    value="{{ old('price') }}" required autocomplete="price" autofocus></textarea>

                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- lang of course --}}
                        <div class="form-group row">
                            <label for="lang"
                                class="col-md-4 col-form-label text-md-right">{{ __('زبان دوره') }}</label>

                            <div class="col-md-6">
                                <textarea id="lang" type="text" class="form-control @error('lang') is-invalid @enderror"
                                    name="lang" value="{{ old('lang') }}" required autocomplete="lang"
                                    autofocus></textarea>

                                @error('lang')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- description of course --}}
                        <div class="form-group row">
                            <label for="description"
                                class="col-md-4 col-form-label text-md-right">{{ __('توضیحات') }}</label>

                            <div class="col-md-6">
                                <textarea id="description" type="text"
                                    class="form-control @error('description') is-invalid @enderror" name="description"
                                    value="{{ old('description') }}" required autocomplete="description"
                                    autofocus></textarea>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- path of photo --}}
                        <div class="form-group row">
                            <label for="path"
                                class="col-md-4 col-form-label text-md-right">{{ __('عکس دوره ') }}</label>

                            <div class="col-md-6">
                                <input id="path" type="file" class="form-control @error('path') is-invalid @enderror"
                                    name="path" value="{{ old('path') }}" required autocomplete="path" autofocus>

                                @error('path')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- alt of photo --}}
                        <div class="form-group row">
                            <label for="alt" class="col-md-4 col-form-label text-md-right">{{ __('عکس alt') }}</label>

                            <div class="col-md-6">
                                <input id="path" type="text" class="form-control @error('alt') is-invalid @enderror"
                                    name="alt" value="{{ old('alt') }}" required autocomplete="alt" autofocus>

                                @error('alt')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- name of photo --}}
                        <div class="form-group row">
                            <label for="img_name"
                                class="col-md-4 col-form-label text-md-right">{{ __('عکس name') }}</label>

                            <div class="col-md-6">
                                <input id="path" type="text" class="form-control @error('img_name') is-invalid @enderror"
                                    name="img_name" value="{{ old('img_name') }}" required autocomplete="img_name"
                                    autofocus>

                                @error('img_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div style="margin-top:15px;">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">منصرف
                                شدم</button>
                            <button type="submit" class="btn btn-primary">ارسال</button>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>

@endsection

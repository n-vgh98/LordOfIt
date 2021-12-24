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
                <th class="text-center" scope="col">لیست موضوعات</th>
                <th class="text-center" scope="col">توضیحات</th>
                <th class="text-center" scope="col">زبان دوره</th>
                <th class="text-center" scope="col">هزینه دوره</th>
                <th class="text-center" scope="col">تعداد جلسه دوره</th>
                <th class="text-center" scope="col">پیشنیاز دوره</th>
                <th class="text-center" scope="col">سطح دوره</th>
                <th class="text-center" scope="col">نوع دوره</th>
                <th class="text-center" scope="col">نام دوره</th>
                <th class="text-center" scope="col-1">#</th>
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
                        <form action="{{ route('admin.courses.destroy', $course->id) }}" method="post">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-danger">حذف دوره</button>
                        </form>
                    </td>

                    {{-- button for editing course details --}}
                    <td class="text-center">
                        <a class="btn btn-warning" href="{{ route('admin.courses.edit', $course->id) }}">ویرایش</a>
                    </td>

                    {{-- button for editing course image --}}
                    <td class="text-center">
                        <button type="button" class="" data-toggle="modal"
                            data-target="#courseimg{{ $course->id }}">

                            <img src="{{ asset($course->image->path) }}" style="width: 35px; height:35px;">
                        </button>
                    </td>


                    <td class="text-center">
                        <button type="button" class="btn btn-info" data-toggle="modal"
                            data-target="#courselist{{ $course->id }}">مشاهده</button>
                    </td>

                    {{-- button for showing job description course --}}
                    <td class="text-center">
                        <button type="button" class="btn btn-info" data-toggle="modal"
                            data-target="#coursedesc{{ $course->id }}">مشاهده</button>
                    </td>

                    <td class="text-center">
                        {{ $course->lang }}
                    </td>

                    <td class="text-center">
                        {{ $course->price }}
                    </td>

                    <td class="text-center">
                        {{ $course->section }}
                    </td>

                    <td class="text-center">
                        {{ $course->pre_need }}
                    </td>

                    <td class="text-center">
                        {{ $course->level }}
                    </td>

                    <td class="text-center">
                        {{ $course->type }}
                    </td>

                    <td class="text-center">
                        {{ $course->name }}
                    </td>

                    <th class="text-center" scope="row">{{ $number }}</th>
                </tr>

                <!-- modal for editing course -->
                <div class="modal fade" id="courselist{{ $course->id }}" tabindex="-1" role="dialog"
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
                                <form action="{{ route('admin.courses.update', $course->id) }}" method="POST"
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

                <!-- modal for showing course text -->
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
                                <form action="{{ route('admin.courses.update', $course->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    {{-- topic_list of course --}}
                                    <div class="form-group row">
                                        <label for="description"
                                            class="col-md-4 col-form-label text-md-right">{{ __('لیست موضوعت') }}</label>

                                        <div class="col-md-6">
                                            <textarea id="description" type="text"
                                                class="form-control @error('job_description') is-invalid @enderror" required
                                                disabled autocomplete="description"
                                                autofocus>{{ $course->topic_list }}</textarea>

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
                                <form action="{{ route('admin.courses.update.image', $course->image->id) }}"
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
                                <form action="{{ route('admin.courses.update', $course->id) }}" method="POST"
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

@endsection

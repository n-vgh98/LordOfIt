@extends('admin.layouts.master')

@section('sitetitle')
    همکاران
@endsection


@section('pagetitle')
    همکاران
@endsection

@section('content')
    <section class="text-center">
        <div class="btn-group btn-group-toggle">
            <a href="{{ route('admin.ourteam.index', 'fa') }}" class="btn btn-primary">فارسی</a>
            <a href="{{ route('admin.ourteam.index', 'en') }}" class="btn btn-primary">انگلیسی</a>
        </div>
    </section>
    <table class="table table-striped">
        <thead>
            <tr>
                <th class="text-center" scope="col">امکانات</th>
                <th class="text-center" scope="col">ویرایش</th>
                <th class="text-center" scope="col">عکس</th>
                <th class="text-center" scope="col">2عکس</th>
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

            @foreach ($languages as $language)

                @php
                    $number++;
                    $member = $language->langable;
                @endphp


                <tr>
                    {{-- button for removing member --}}
                    <td class="text-center">
                        <form action="{{ route('admin.ourteam.destroy', $member->id) }}" method="post">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-danger">حذف همکار</button>
                        </form>
                    </td>

                    {{-- button for editing member details --}}
                    <td class="text-center">
                        <button type="button" class="btn btn-warning" data-toggle="modal"
                            data-target="#member{{ $member->id }}">ویرایش اطلاعات
                        </button>
                    </td>



                    {{-- button for editing member images --}}
                    <td class="text-center">
                        <button type="button" class="" data-toggle="modal"
                            data-target="#memberimg{{ $member->id }}">

                            <img src="{{ asset($member->images[0]->path) }}" style="width: 35px; height:35px;">
                        </button>
                    </td>
                    @if (count($member->images) == 2)

                        {{-- button for editing member image2 --}}
                        <td class="text-center">
                            <button type="button" class="" data-toggle="modal"
                                data-target="#memberimg2{{ $member->id }}">

                                <img src="{{ asset($member->images[1]->path) }}" style="width: 35px; height:35px;">
                            </button>
                        </td>

                    @else
                        <td>
                            <p class="text-center">ندارد</p>
                        </td>
                    @endif

                    {{-- button for showing job description member --}}
                    <td class="text-center">
                        <button type="button" class="btn btn-info" data-toggle="modal"
                            data-target="#memberdesc{{ $member->id }}">مشاهده</button>
                    </td>

                    {{-- button for showing job title --}}
                    <td class="text-center">
                        {{ $member->job_title }}
                    </td>

                    {{-- button for member name --}}
                    <td class="text-center">
                        {{ $member->name }}
                    </td>

                    <th class="text-center" scope="row">{{ $number }}</th>
                </tr>

                <!-- modal for editing member -->
                <div class="modal fade" id="memberdesc{{ $member->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"> توضیحات همکار </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('admin.ourteam.update', $member->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    {{-- description of member --}}
                                    <div class="form-group row">
                                        <label for="description"
                                            class="col-md-4 col-form-label text-md-right">{{ __('توضیحات') }}</label>

                                        <div class="col-md-6">
                                            <textarea id="description" type="text"
                                                class="form-control @error('job_description') is-invalid @enderror" required
                                                disabled autocomplete="description"
                                                autofocus>{{ $member->description }}</textarea>

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

                <!-- modal for editing member images -->
                <div class="modal fade" id="memberimg{{ $member->id }}" tabindex="-1" role="dialog"
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
                                <form action="{{ route('admin.ourteam.update.image', $member->images[0]->id) }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf

                                    {{-- section for changing member images --}}
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

                                    {{-- section for changing images  alt --}}
                                    <div class="form-group row">
                                        <label for="alt"
                                            class="col-md-4 col-form-label text-md-right">{{ __('عکس alt') }}</label>

                                        <div class="col-md-6">
                                            <input id="alt" type="text"
                                                class="form-control @error('alt') is-invalid @enderror" name="alt" required
                                                autocomplete="alt" value="{{ $member->images[0]->alt }}" autofocus>

                                            @error('alt')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- section for changing images  name --}}
                                    <div class="form-group row">
                                        <label for="name"
                                            class="col-md-4 col-form-label text-md-right">{{ __('عکس name') }}</label>

                                        <div class="col-md-6">
                                            <input id="name" type="text"
                                                class="form-control @error('name') is-invalid @enderror" name="name"
                                                required value="{{ $member->images[0]->name }}" autocomplete="name"
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

                @if (count($member->images) == 2)

                    <!-- modal for editing member images -->
                    <div class="modal fade" id="memberimg2{{ $member->id }}" tabindex="-1" role="dialog"
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
                                    <form action="{{ route('admin.ourteam.update.image', $member->images[1]->id) }}"
                                        method="POST" enctype="multipart/form-data">
                                        @csrf

                                        {{-- section for changing member images --}}
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

                                        {{-- section for changing images  alt --}}
                                        <div class="form-group row">
                                            <label for="alt"
                                                class="col-md-4 col-form-label text-md-right">{{ __('عکس alt') }}</label>

                                            <div class="col-md-6">
                                                <input id="alt" type="text"
                                                    class="form-control @error('alt') is-invalid @enderror" name="alt"
                                                    required autocomplete="alt" value="{{ $member->images[1]->alt }}"
                                                    autofocus>

                                                @error('alt')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        {{-- section for changing images  name --}}
                                        <div class="form-group row">
                                            <label for="name"
                                                class="col-md-4 col-form-label text-md-right">{{ __('عکس name') }}</label>

                                            <div class="col-md-6">
                                                <input id="name" type="text"
                                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                                    required value="{{ $member->images[1]->name }}" autocomplete="name"
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
                @endif

                <!-- modal for editing member -->
                <div class="modal fade" id="member{{ $member->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"> تغیر مشخصات همکار </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('admin.ourteam.update', $member->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf


                                    {{-- name of member --}}
                                    <div class="form-group row">
                                        <label for="name"
                                            class="col-md-4 col-form-label text-md-right">{{ __('نام و نام خانوادگی') }}</label>

                                        <div class="col-md-6">
                                            <input id="name" type="text"
                                                class="form-control @error('name') is-invalid @enderror" name="name"
                                                value="{{ $member->name }}" required autocomplete="name" autofocus>

                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- job_title of member --}}
                                    <div class="form-group row">
                                        <label for="job_title"
                                            class="col-md-4 col-form-label text-md-right">{{ __('عنوان شغلی') }}</label>

                                        <div class="col-md-6">
                                            <input id="job_title" type="text"
                                                class="form-control @error('job_title') is-invalid @enderror"
                                                name="job_title" value="{{ $member->job_title }}" required
                                                autocomplete="job_title" autofocus>

                                            @error('job_title')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- description of member --}}
                                    <div class="form-group row">
                                        <label for="description"
                                            class="col-md-4 col-form-label text-md-right">{{ __('توضیحات') }}</label>

                                        <div class="col-md-6">
                                            <textarea id="description" type="text"
                                                class="form-control @error('job_description') is-invalid @enderror"
                                                name="description" required autocomplete="description"
                                                autofocus>{{ $member->description }}</textarea>

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

    {{-- button to add member --}}
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        اضافه کردن همکار جدید
    </button>

    {{-- modal for adding new member --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> اضافه کردن همکار جدید </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.ourteam.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf


                        {{-- name of member --}}
                        <div class="form-group row">
                            <label for="name"
                                class="col-md-4 col-form-label text-md-right">{{ __('نام و نام خانوادگی') }}</label>

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

                        {{-- job_title of member --}}
                        <div class="form-group row">
                            <label for="job_title"
                                class="col-md-4 col-form-label text-md-right">{{ __('عنوان شغلی') }}</label>

                            <div class="col-md-6">
                                <input id="job_title" type="text"
                                    class="form-control @error('job_title') is-invalid @enderror" name="job_title"
                                    value="{{ old('job_title') }}" required autocomplete="job_title" autofocus>

                                @error('job_title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- job_description of member --}}
                        <div class="form-group row">
                            <label for="job_description"
                                class="col-md-4 col-form-label text-md-right">{{ __('توضیحات') }}</label>

                            <div class="col-md-6">
                                <textarea id="job_description" type="text"
                                    class="form-control @error('job_description') is-invalid @enderror"
                                    name="job_description" value="{{ old('job_description') }}" required
                                    autocomplete="job_description" autofocus></textarea>

                                @error('job_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- path of photo --}}
                        <div class="form-group row">
                            <label for="path" class="col-md-4 col-form-label text-md-right">{{ __('عکس') }}</label>

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

                        {{-- second images --}}
                        {{-- path of photo --}}
                        <div class="form-group row">
                            <label for="path_1" class="col-md-4 col-form-label text-md-right">{{ __('عکس') }}</label>

                            <div class="col-md-6">
                                <input id="path_1" type="file" class="form-control @error('path_1') is-invalid @enderror"
                                    name="path_1" value="{{ old('path_1') }}" autocomplete="path_1" autofocus>

                                @error('path_1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- alt of photo --}}
                        <div class="form-group row">
                            <label for="alt_1" class="col-md-4 col-form-label text-md-right">{{ __('عکس alt') }}</label>

                            <div class="col-md-6">
                                <input id="alt_1" type="text" class="form-control @error('alt_1') is-invalid @enderror"
                                    name="alt_1" value="{{ old('alt_1') }}" autocomplete="alt_1" autofocus>

                                @error('alt_1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- name of photo --}}
                        <div class="form-group row">
                            <label for="img_name_1"
                                class="col-md-4 col-form-label text-md-right">{{ __('عکس name') }}</label>

                            <div class="col-md-6">
                                <input id="path" type="text" class="form-control @error('img_name_1') is-invalid @enderror"
                                    name="img_name_1" value="{{ old('img_name_1') }}" autocomplete="img_name_1"
                                    autofocus>

                                @error('img_name_1')
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
                        <input type="hidden" name="lang" value="{{ $lang }}">
                    </form>
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>

@endsection

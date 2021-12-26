@extends('admin.layouts.master')

@section('sitetitle')
    دسته بندی نمونه کارها
@endsection


@section('pagetitle')
    دسته بندی نمونه کارها

@endsection

@section('content')
    <section class="text-center">
        <div class="btn-group btn-group-toggle">
            <a href="{{ route('admin.work_samples.category.index', 'fa') }}" class="btn btn-primary">فارسی</a>
            <a href="{{ route('admin.work_samples.category.index', 'en') }}" class="btn btn-primary">انگلیسی</a>
        </div>
    </section>
    <table class="table table-striped">
        <thead>
            <tr>
                <th class="text-center" scope="col">امکانات</th>
                <th class="text-center" scope="col">ویرایش</th>
                <th class="text-center" scope="col">مشاهده متن</th>
                <th class="text-center" scope="col">نمونه کار ها</th>
                <th class="text-center" scope="col">نام دسته بندی</th>
                <th class="text-center" scope="col-1">#</th>
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
                    $category = $language->langable;
                @endphp
                <tr>
                    {{-- button for removing category --}}
                    <td class="text-center">
                        <form action="{{ route('admin.work_samples.category.destroy', $category->id) }}" method="post">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-danger">حذف دسته بندی</button>
                        </form>
                    </td>

                    {{-- button for editing category --}}
                    <td class="text-center">
                        {{-- button to make category --}}
                        <button type="button" class="btn btn-warning" data-toggle="modal"
                            data-target="#edit{{ $category->id }}">
                            ویرایش
                        </button>
                    </td>

                    <td class="text-center">
                        <button type="button" class="btn btn-info" data-toggle="modal"
                            data-target="#categorytext{{ $category->id }}">مشاهده</button>
                    </td>

                    <td class="text-center">
                        @if (count($category->samples) == 0)
                            <a class="btn btn-success"
                                href="{{ route('admin.work_samples.create', $category->id) }}">ساختن</a>
                        @else
                            <a class="btn btn-success"
                                href="{{ route('admin.work_samples.category.show', $category->id) }}">مشاهده</a>
                        @endif
                    </td>
                    <td class="text-center">
                        {{ $category->title }}
                    </td>
                    <th class="text-center" scope="row">{{ $number }}</th>
                </tr>

                {{-- modal for editing category --}}
                <div class="modal fade" id="edit{{ $category->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">ساخت دسته بندی </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('admin.work_samples.category.update', $category->id) }}"
                                    method="POST">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="title"
                                            class="col-md-4 col-form-label text-md-right">{{ __('نام دسته بندی') }}</label>

                                        <div class="col-md-6">
                                            <input id="title" type="text"
                                                class="form-control @error('title') is-invalid @enderror" name="title"
                                                value="{{ $category->title }}" value="{{ old('title') }}" required
                                                autocomplete="title" autofocus>

                                            @error('title')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="text"
                                            class="col-md-1 col-form-label text-md-right">{{ __('متن دسته بندی') }}</label>

                                        <div class="col-md-11">
                                            <textarea id="text" type="text"
                                                class="form-control @error('text') is-invalid @enderror" name="text"
                                                value="{{ old('text') }}" autocomplete="text"
                                                autofocus>{{ $category->text }}</textarea>
                                            @error('text')
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


                <!-- modal for showing category text -->
                <div class="modal fade" id="categorytext{{ $category->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"> لینک نمونه کار </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('admin.courses.update', $category->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    {{-- topic_list of category --}}
                                    <div class="form-group row">
                                        <label for="description"
                                            class="col-md-4 col-form-label text-md-right">{{ __('لینک نمونه کار') }}</label>

                                        <div class="col-md-6">
                                            <textarea id="description" type="text"
                                                class="form-control @error('job_description') is-invalid @enderror" required
                                                disabled autocomplete="description"
                                                autofocus>{{ $category->text }}</textarea>

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
            @endforeach
        </tbody>
    </table>

    {{-- button to make category --}}
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        ساخت دسته بندی جدید
    </button>

    {{-- modal for making new category --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ساخت دسته بندی </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.work_samples.category.store') }}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label for="title"
                                class="col-md-4 col-form-label text-md-right">{{ __('نام دسته بندی') }}</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror"
                                    name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="text"
                                class="col-md-1 col-form-label text-md-right">{{ __('متن دسته بندی') }}</label>

                            <div class="col-md-11">
                                <textarea id="text" type="text" class="form-control @error('text') is-invalid @enderror"
                                    name="text" value="{{ old('title') }}" autocomplete="text" autofocus></textarea>

                                @error('text')
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
@section('script')

    <script src="{{ asset('adminpanel/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('text');
    </script>

@endsection

@extends('admin.layouts.master')

@section('sitetitle')
    دسته بندی نمونه کارها
@endsection


@section('pagetitle')
    دسته بندی نمونه کارها

@endsection

@section('content')
    <table class="table table-striped">
        <thead>
            <tr>
                <th class="text-center" scope="col">امکانات</th>
                <th class="text-center" scope="col">ویرایش</th>
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

            @foreach ($categories as $category)

                @php
                    $number++;
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
                                <h5 class="modal-title" id="exampleModalLabel">ساخت کاربر جدید </h5>
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
                    <h5 class="modal-title" id="exampleModalLabel">ساخت کاربر جدید </h5>
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

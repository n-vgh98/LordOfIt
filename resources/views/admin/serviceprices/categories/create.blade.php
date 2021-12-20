@extends('admin.layouts.master')

@section('sitetitle')
    ایجاد دوره دسته بندی جدید
@endsection


@section('pagetitle')
    ایجاد دوره دسته بندی جدید
@endsection

@section('content')
    <section>

        <form action="{{ route('admin.services.price.category.store') }}" method="POST" enctype="multipart/form-data">
            @csrf


            {{-- title of category --}}
            <div class="form-group row">
                <label for="title" class="col-md-1 col-form-label text-md-right">{{ __('نام دسته بندی') }}</label>

                <div class="col-md-11">
                    <input id="title" type="text" class="form-control" @error('title') is-invalid @enderror" name="title"
                        value="{{ old('title') }}" required autocomplete="name" autofocus>

                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>


            {{-- text of category --}}
            <div class="form-group row">
                <label for="text" class="col-md-1 col-form-label text-md-right">{{ __('توضیحات') }}</label>

                <div class="col-md-11">
                    <textarea id="body" type="text" class="form-control" @error('text') is-invalid @enderror" name="text"
                        value="{{ old('text') }}" required autocomplete="text" autofocus></textarea>

                    @error('text')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>


            <div style="margin-top:15px;">
                <button type="button" class="btn btn-danger" data-dismiss="modal">منصرف
                    شدم</button>
                <button type="submit" class="btn btn-primary">ارسال</button>
            </div>

        </form>

    </section>
@endsection
@section('script')

    <script src="{{ asset('adminpanel/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('body');
        CKEDITOR.replace('list');
    </script>

@endsection

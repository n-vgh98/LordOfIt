@extends('admin.layouts.master')

@section('sitetitle')
    ویرایش زیر دسته
@endsection


@section('pagetitle')
    ویرایش زیر دسته
@endsection

@section('content')
    <section>

        <form action="{{ route('admin.services.price.subcategory.update', $subcategory->id) }}" method="POST"
            enctype="multipart/form-data">
            @csrf


            {{-- title of subcategory --}}
            <div class="form-group row">
                <label for="title" class="col-md-1 col-form-label text-md-right">{{ __('نام دسته بندی') }}</label>

                <div class="col-md-11">
                    <input id="title" type="text" class="form-control" @error('title') is-invalid @enderror" name="title"
                        value="{{ $subcategory->title }}" value="{{ old('title') }}" required autocomplete="name"
                        autofocus>

                    @error('title')
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
    </script>

@endsection

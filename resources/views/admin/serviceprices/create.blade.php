@extends('admin.layouts.master')

@section('sitetitle')
    ایجاد تعرفه برای زیرسته {{ $category->title }}
@endsection


@section('pagetitle')
    ایجاد تعرفه برای زیرسته {{ $category->title }}
@endsection

@section('content')
    <section>

        <form action="{{ route('admin.services.price.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- name of service --}}
            <div class="form-group row">
                <label for="name" class="col-md-1 col-form-label text-md-right">{{ __('نام تعرفه') }}</label>

                <div class="col-md-11">
                    <input id="title" type="text" class="form-control" @error('name') is-invalid @enderror" name="name"
                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            {{-- price of service --}}
            <div class="form-group row">
                <label for="price" class="col-md-1 col-form-label text-md-right">{{ __('قیمت تعرفه') }}</label>

                <div class="col-md-11">
                    <input id="title" type="text" class="form-control" @error('price') is-invalid @enderror" name="price"
                        value="{{ old('price') }}" required autocomplete="price" autofocus>

                    @error('price')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            {{-- time of service --}}
            <div class="form-group row">
                <label for="time" class="col-md-1 col-form-label text-md-right">{{ __('زمان تعرفه') }}</label>

                <div class="col-md-11">
                    <input id="title" type="text" class="form-control" @error('time') is-invalid @enderror" name="time"
                        value="{{ old('time') }}" placeholder="میتواند خالی باشد" autocomplete="time" autofocus>

                    @error('time')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>





            {{-- text of category --}}
            <div class="form-group row">
                <label for="text" class="col-md-1 col-form-label text-md-right">{{ __('ویژگی ها') }}</label>

                <div class="col-md-11">
                    <textarea id="body" type="text" class="form-control" @error('text') is-invalid @enderror" name="text"
                        value="{{ old('text') }}" cols="30" rows="" required autocomplete="text" autofocus></textarea>

                    @error('text')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            {{-- show in menu of service --}}
            <div class="form-group row">
                <label for="time" class="col-md-1 col-form-label text-md-right">{{ __('زمان تعرفه') }}</label>
                <div class="col-md-11">
                    <select name="show_in_menu" class="custom-select">
                        <option value="1">نمایش داده شود</option>
                        <option value="0">نمایش دادده نشود</option>
                    </select>
                </div>
            </div>

            <input name="category_id" type="hidden" value="{{ $category->id }}">

            <div style="margin-top:15px;">
                <button type="button" class="btn btn-danger" data-dismiss="modal">منصرف
                    شدم</button>
                <button type="submit" class="btn btn-primary">ارسال</button>
            </div>

        </form>

    </section>
@endsection

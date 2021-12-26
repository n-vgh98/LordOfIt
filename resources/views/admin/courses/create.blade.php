@extends('admin.layouts.master')

@section('sitetitle')
    ایجاد دوره آموزشی جدید
@endsection


@section('pagetitle')
    ایجاد دوره آموزشی جدید
@endsection

@section('content')
    <section>

        <form action="{{ route('admin.courses.store') }}" method="POST" enctype="multipart/form-data">
            @csrf


            {{-- name of course --}}
            <div class="form-group row">
                <label for="name" class="col-md-1 col-form-label text-md-right">{{ __('نام دوره') }}</label>

                <div class="col-md-11">
                    <input id="name" type="text" class="form-control" @error('name') is-invalid @enderror" name="name"
                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            {{-- type of course --}}
            <div class="form-group row">
                <label for="type" class="col-md-1 col-form-label text-md-right">{{ __('نوع دوره') }}</label>

                <div class="col-md-11">
                    <input id="type" type="text" class="form-control" @error('type') is-invalid @enderror" name="type"
                        value="{{ old('type') }}" required autocomplete="type" autofocus>

                    @error('type')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            {{-- level of course --}}
            <div class="form-group row">
                <label for="level" class="col-md-1 col-form-label text-md-right">{{ __('سطح دوره') }}</label>

                <div class="col-md-11">
                    <input id="level" type="text" class="form-control" @error('level') is-invalid @enderror" name="level"
                        value="{{ old('level') }}" required autocomplete="level" autofocus>

                    @error('level')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            {{-- section of course --}}
            <div class="form-group row">
                <label for="section" class="col-md-1 col-form-label text-md-right">{{ __('تعداد جلسات دوره') }}</label>

                <div class="col-md-11">
                    <input id="section" type="text" class="form-control" @error('section') is-invalid @enderror"
                        name="section" value="{{ old('section') }}" required autocomplete="section" autofocus>

                    @error('section')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            {{-- pre_need of course --}}
            <div class="form-group row">
                <label for="pre_need" class="col-md-1 col-form-label text-md-right">{{ __('پیش نیاز های دوره') }}</label>

                <div class="col-md-11">
                    <input id="pre_need" type="text" class="form-control" @error('pre_need') is-invalid @enderror"
                        name="pre_need" value="{{ old('pre_need') }}" required autocomplete="pre_need" autofocus>

                    @error('pre_need')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            {{-- price of course --}}
            <div class="form-group row">
                <label for="price" class="col-md-1 col-form-label text-md-right">{{ __('هزینه دوره') }}</label>

                <div class="col-md-11">
                    <input id="price" type="text" class="form-control" @error('pre_need') is-invalid @enderror"
                        name="price" value="{{ old('price') }}" required autocomplete="price" autofocus>

                    @error('price')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            {{-- language of course --}}
            <div class="form-group row">
                <label for="language" class="col-md-1 col-form-label text-md-right">{{ __('زبان دوره') }}</label>

                <div class="col-md-11">
                    <input id="language" type="text" class="form-control" @error('language') is-invalid @enderror" name="language"
                        value="{{ old('language') }}" required autocomplete="language" autofocus>

                    @error('language')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            {{-- description of course --}}
            <div class="form-group row">
                <label for="description" class="col-md-1 col-form-label text-md-right">{{ __('توضیحات') }}</label>

                <div class="col-md-11">
                    <textarea id="body" type="text" class="form-control" @error('description') is-invalid @enderror"
                        name="description" value="{{ old('description') }}" required autocomplete="description"
                        autofocus></textarea>

                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            {{-- topic_list of course --}}
            <div class="form-group row">
                <label for="topic_list" class="col-md-1 col-form-label text-md-right">{{ __('لیست موضوعات') }}</label>

                <div class="col-md-11">
                    <textarea id="list" type="text" class="form-control" @error('topic_list') is-invalid @enderror"
                        name="topic_list" value="{{ old('topic_list') }}" required autocomplete="topic_list"
                        autofocus></textarea>

                    @error('topic_list')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            {{-- path of photo --}}
            <div class="form-group row">
                <label for="path" class="col-md-1 col-form-label text-md-right">{{ __('عکس دوره ') }}</label>

                <div class="col-md-11">
                    <input id="path" type="file" class="form-control" @error('path') is-invalid @enderror" name="path"
                        value="{{ old('path') }}" required autocomplete="path" autofocus>

                    @error('path')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            {{-- alt of photo --}}
            <div class="form-group row">
                <label for="alt" class="col-md-1 col-form-label text-md-right">{{ __('عکس alt') }}</label>

                <div class="col-md-11">
                    <input id="path" type="text" class="form-control" @error('alt') is-invalid @enderror" name="alt"
                        value="{{ old('alt') }}" required autocomplete="alt" autofocus>

                    @error('alt')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            {{-- name of photo --}}
            <div class="form-group row">
                <label for="img_name" class="col-md-1 col-form-label text-md-right">{{ __('عکس name') }}</label>

                <div class="col-md-11">
                    <input id="path" type="text" class="form-control" @error('img_name') is-invalid @enderror"
                        name="img_name" value="{{ old('img_name') }}" required autocomplete="img_name" autofocus>

                    @error('img_name')
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

            <input type="hidden" name="lang" value="{{ $lang }}">

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

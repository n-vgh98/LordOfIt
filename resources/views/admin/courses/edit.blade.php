@extends('admin.layouts.master')

@section('sitetitle')
    ویرایش دوره آموزشی
@endsection

@section('pagetitle')
    ویرایش دوره آموزشی
@endsection

@section('content')
    <section>

        <form action="{{ route('admin.courses.update', $course->id) }}" method="POST" enctype="multipart/form-data">
            @csrf


            {{-- name of course --}}
            <div class="form-group row">
                <label for="name" class="col-md-1 col-form-label text-md-right">{{ __('نام دوره') }}</label>

                <div class="col-md-11">
                    <input id="name" type="text" class="form-control" @error('name') is-invalid @enderror" name="name"
                        value="{{ $course->name }}" value="{{ old('name') }}" required autocomplete="name" autofocus>

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
                        value="{{ $course->type }}" value="{{ old('type') }}" required autocomplete="type" autofocus>

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
                        value="{{ $course->level }}" value="{{ old('level') }}" required autocomplete="level"
                        autofocus>

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
                        value="{{ $course->section }}" name="section" value="{{ old('section') }}" required
                        autocomplete="section" autofocus>

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
                        value="{{ $course->pre_need }}" name="pre_need" value="{{ old('pre_need') }}" required
                        autocomplete="pre_need" autofocus>

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
                        value="{{ $course->price }}" name="price" value="{{ old('price') }}" required
                        autocomplete="price" autofocus>

                    @error('price')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            {{-- lang of course --}}
            <div class="form-group row">
                <label for="lang" class="col-md-1 col-form-label text-md-right">{{ __('زبان دوره') }}</label>

                <div class="col-md-11">
                    <input id="lang" type="text" class="form-control" @error('lang') is-invalid @enderror" name="lang"
                        value="{{ $course->lang }}" value="{{ old('lang') }}" required autocomplete="lang" autofocus>

                    @error('lang')
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
                        autofocus>{{ $course->description }}</textarea>

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
                        autofocus>{{ $course->topic_list }}</textarea>

                    @error('topic_list')
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

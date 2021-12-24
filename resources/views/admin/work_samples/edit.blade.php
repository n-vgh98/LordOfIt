@extends('admin.layouts.master')

@section('sitetitle')
    {{ $sample->title }} ویرایش نمونه کار
@endsection


@section('pagetitle')
    {{ $sample->title }} ویرایش نمونه کار
@endsection

@section('content')
    <section>

        <form action="{{ route('admin.work_samples.update', $sample->id) }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- title of work sample --}}
            <div class="form-group row">
                <label for="title" class="col-md-1 col-form-label text-md-right">{{ __('عنوان نمونه کار') }}</label>

                <div class="col-md-11">
                    <input id="title" type="text" class="form-control" @error('title') is-invalid @enderror" name="title"
                        value="{{ $sample->title }}" value="{{ old('title') }}" required autocomplete="title" autofocus>

                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            {{-- link of work sample --}}
            <div class="form-group row">
                <label for="link" class="col-md-1 col-form-label text-md-right">{{ __('لینک نمونه کار') }}</label>

                <div class="col-md-11">
                    <input id="title" type="text" class="form-control" @error('link') is-invalid @enderror" name="link"
                        value="{{ $sample->link }}" value="{{ old('link') }}" autocomplete="link" autofocus>

                    @error('link')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>


            {{-- text of work_sample --}}
            <div class="form-group row">
                <label for="text" class="col-md-1 col-form-label text-md-right">{{ __('متن') }}</label>

                <div class="col-md-11">
                    <textarea id="body" type="text" class="form-control" @error('text') is-invalid @enderror" name="text"
                        value="{{ old('text') }}" cols="30" rows="" autocomplete="text" autofocus>
                                                {{ $sample->text }}"</textarea>

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
    </script>

@endsection

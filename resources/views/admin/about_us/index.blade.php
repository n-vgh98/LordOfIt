@extends('admin.layouts.master')
@section('sitetitle')
درباره ما
@endsection

@section('pagetitle')
درباره ما
@endsection

@section('content')
@if(Session()->has('add_about_us'))
<div class="alert alert-success">
    <div>{{session('add_about_us')}}</div>
</div>
@endif
@if(Session()->has('delete_about_us'))
<div class="alert alert-danger">
    <div>{{session('delete_about_us')}}</div>
</div>
@endif
<table class="table table-striped">
    <thead>
        <tr>
            <th>تنظیمات</th>
            <th>امکانات</th>
            <th>خلاصه متن</th>
            <th>عکس</th>
            <th>#</th>
        </tr>
    </thead>
    <tbody>
        @php
        $number = 1;
        @endphp
        @foreach($about_us as $about)
        <tr>
            <td>
                <form action="{{ route('about_us.destroy', $about->id) }}" method="POST">
                    @csrf
                    @method("DELETE")
                    <button class="btn btn-danger" type="submit">حذف</button>
                </form>
            </td>
            <td><a class="btn btn-warning" href="{{ route('about_us.edit', $about->id) }}">ویرایش</a></td>
            <td>
                  {!! \Illuminate\Support\Str::limit($about->text_1) !!}
                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#about_us{{ $about->id }}">
                    متن کامل
                </button>

            </td>
            {{-- button for editing about_us image --}}
            <td>
                <button type="button" class="" data-toggle="modal" data-target="#about_us_img{{ $about->id }}">

                    <img src="{{ asset($about->image->path) }}" style="width: 35px; height:35px;">
                </button>
            </td>
            <th>{{ $number }}</th>
        </tr>

        {{-- modal to show full text of about_us --}}
        <div class="modal fade" id="about_us{{ $about->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">متن درباره ما</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {!! $about->text_1 !!}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">دیدم</button>
                    </div>
                </div>
            </div>
        </div>
        {{-- end of modal to show full text of about_us --}}
         <!-- modal for editing about us image -->
         <div class="modal fade" id="about_us_img{{ $about->id }}" tabindex="-1" role="dialog"
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
                                <form action="{{ route('admin.about_us.update.image', $about->image->id) }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf

                                    {{-- section for changing about_us image --}}
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
                                                autocomplete="alt" value="{{ $about->image->alt }}" autofocus>

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
                                                required value="{{ $about->image->name }}" autocomplete="name"
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


        @php
        $number++;
        @endphp
        @endforeach

    </tbody>
</table>
<a href="{{ route('about_us.create') }}" class="btn btn-primary">ساخت متن جدید</a>

@endsection
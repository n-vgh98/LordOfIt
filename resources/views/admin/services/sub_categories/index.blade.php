@extends('admin.layouts.master')
@section('sitetitle')
زیر دسته ها
@endsection

@section('pagetitle')
لیست  زیر دستهها
@endsection

@section('content')
<section class="text-center">
    <div class="btn-group btn-group-toggle">
        <a href="{{ route('admin.services_sub_categories.index','fa') }}" class="btn btn-primary">فارسی</a>
        <a href="{{ route('admin.services_sub_categories.index','en') }}" class="btn btn-primary">انگلیسی</a>
    </div>
</section>


@if(Session()->has('add_servise_categroy'))
<div class="alert alert-success">
    <div>{{session('add_servise_categroy')}}</div>
</div>
@endif
@if(Session()->has('delete_servise_categroy'))
<div class="alert alert-danger">
    <div>{{session('delete_servise_categroy')}}</div>
</div>
@endif
<table class="table table-striped">
    <thead>
        <tr>
            <th>تنظیمات</th>
            <th>امکانات</th>
            <th> نام دسته بندی</th>
            <th>#</th>
        </tr>
    </thead>
    <tbody>
        @php
        $number = 1;
        @endphp
        <!-- create foreach for languages -->
        @foreach($languages as $language)
        @php
        $category=$language->langable
        @endphp
        @if ($category->parent_id !== null)
        <tr>
            <td>
                <form action="{{ route('admin.services_categories.destroy', $category->id) }}" method="POST">
                    @csrf
                    @method("DELETE")
                    <button class="btn btn-danger" type="submit">حذف</button>
                </form>
            </td>
            <td>
                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#category{{ $category->id }}">
                    ویرایش
                </button>

            </td>
            <td>{{ $category->title }}</td>
            <th>{{ $number }}</th>
        </tr>
        @endif
        {{-- modal to show edit service category --}}
        <div class="modal fade" id="category{{ $category->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">ویرایش دسته بندی {{$category->title}} </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('admin.services_categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method("PATCH")
                            {{-- section for changing category title --}}
                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('عنوان') }}</label>

                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" autocomplete="title" value="{{ $category->title }}" autofocus>

                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- section for changing category slug --}}
                            <div class="form-group row">
                                <label for="slug" class="col-md-4 col-form-label text-md-right">{{ __('slug') }}</label>

                                <div class="col-md-6">
                                    <input id="slug" type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" value="{{ $category->slug }}" autofocus>

                                    @error('slug')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- section for changing category  meta_keywords --}}
                            <div class="form-group row">
                                <label for="meta_keywords" class="col-md-4 col-form-label text-md-right">{{ __('meta_keywords') }}</label>

                                <div class="col-md-6">
                                    <input id="meta_keywords" type="text" class="form-control @error('meta_keywords') is-invalid @enderror" name="meta_keywords" required value="{{ $category->meta_keywords }}" autocomplete="meta_keywords" autofocus>

                                    @error('meta_keywords')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- section for changing category  meta_description --}}
                            <div class="form-group row">
                                <label for="meta_description" class="col-md-4 col-form-label text-md-right">{{ __('meta_description') }}</label>

                                <div class="col-md-6">
                                    <input id="meta_description" type="text" class="form-control @error('meta_description') is-invalid @enderror" name="meta_description" required value="{{ $category->meta_description }}" autocomplete="meta_description" autofocus>

                                    @error('meta_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div style="margin-top:15px;">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">منصرف
                                    شدم</button>
                                <input type="hidden" value="{{$category->language->name}}" name="lang">
                                </input>
                                <button type="submit" class="btn btn-primary">ارسال</button>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
        </div>
        {{-- end of modal to show edit service category --}}

        @php
        $number++;
        @endphp
        @endforeach

    </tbody>
</table>
{{-- button to add category --}}
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    اضافه کردن دسته بندی جدید
</button>

{{-- modal for adding new category --}}
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> اضافه کردن دسته بندی جدید </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.services_categories.store',$lang) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    {{-- title of category --}}
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('عنوان') }}</label>

                        <div class="col-md-6">
                            <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>

                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    {{-- slug of category --}}
                    <div class="form-group row">
                        <label for="job_title" class="col-md-4 col-form-label text-md-right">{{ __('نام مستعار ') }}</label>

                        <div class="col-md-6">
                            <input id="job_slugitle" type="text" class="form-control" name="slug" value="{{ old('slug') }}" autocomplete="slug" autofocus>
                        </div>
                    </div>

                    {{-- meta_description of category --}}
                    <div class="form-group row">
                        <label for="meta_description" class="col-md-4 col-form-label text-md-right">{{ __('meta_description') }}</label>

                        <div class="col-md-6">
                            <textarea id="meta_description" type="text" class="form-control @error('meta_description') is-invalid @enderror" name="meta_description" value="{{ old('meta_description') }}" required autocomplete="meta_description" autofocus></textarea>

                            @error('meta_description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    {{-- meta_keywords of category --}}
                    <div class="form-group row">
                        <label for="meta_keywords" class="col-md-4 col-form-label text-md-right">{{ __('meta_keywords') }}</label>

                        <div class="col-md-6">
                            <textarea id="meta_keywords" type="text" class="form-control @error('meta_keywords') is-invalid @enderror" name="meta_keywords" value="{{ old('meta_keywords') }}" required autocomplete="meta_keywords" autofocus></textarea>

                            @error('meta_keywords')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div style="margin-top:15px;">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">منصرف
                            شدم</button>
                        <input type="hidden" value="{{$lang}}" name="lang">
                        </input>
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
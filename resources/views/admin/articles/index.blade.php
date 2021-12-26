@extends('admin.layouts.master')
@section('sitetitle')
مقالات
@endsection

@section('pagetitle')
لیست مقالات
@endsection

@section('content')
<section class="text-center">
    <div class="btn-group btn-group-toggle">
        <a href="{{ route('admin.articles.index','fa') }}" class="btn btn-primary">فارسی</a>
        <a href="{{ route('admin.articles.index','en') }}" class="btn btn-primary">انگلیسی</a>
    </div>
</section>

@if(Session()->has('add_article'))
<div class="alert alert-success">
    <div>{{session('add_article')}}</div>
</div>
@endif
@if(Session()->has('delete_article'))
<div class="alert alert-danger">
    <div>{{session('delete_article')}}</div>
</div>
@endif
<table class="table table-striped">
    <thead>
        <tr>
            <th>تنظیمات</th>
            <th>امکانات</th>
            <th>خلاصه متن</th>
            <th>عکس</th>
            <th>وضعیت</th>
            <th>عنوان مقاله</th>
            <th>#</th>
        </tr>
    </thead>
    <tbody>
        @php
        $number = 1;
        @endphp

        @foreach($languages as $language)
        @php
        $article=$language->langable
        @endphp
        <tr>
            <td>
                <form action="{{ route('admin.articles.destroy', $article->id) }}" method="POST">
                    @csrf
                    @method("DELETE")
                    <button class="btn btn-danger" type="submit">حذف</button>
                </form>
            </td>
            <td><a class="btn btn-warning" href="{{ route('admin.articles.edit', $article->id) }}">ویرایش</a></td>
            <td>
                {!! \Illuminate\Support\Str::limit($article->text_1) !!}
                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#article{{ $article->id }}">
                    متن کامل
                </button>

            </td>
            {{-- button for editing article image --}}
            <td>
                <button type="button" class="" data-toggle="modal" data-target="#article_img{{ $article->id }}">

                    <img src="{{ asset($article->image->path) }}" style="width: 35px; height:35px;">
                </button>
            </td>
            <td>
                @if($article->status == '0' )
                <span class="badge badge-pill badge-danger">غیر فعال</span>
                @else
                <span class="badge badge-pill badge-success">فعال</span>
                @endif
            </td>
            <td>{{ $article->title }}</td>
            <th>{{ $number }}</th>
        </tr>

        {{-- modal to show full text of article --}}
        <div class="modal fade" id="article{{ $article->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">متن مقاله</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @php
                        echo $article->text_1;
                        @endphp
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">دیدم</button>
                    </div>
                </div>
            </div>
        </div>
        {{-- end of modal to show full text of article --}}
        <!-- modal for editing article image -->
        <div class="modal fade" id="article_img{{ $article->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-link" id="exampleModalLabel">تغیر مشخصات عکس</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('admin.article.update.image', $article->image->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            {{-- section for changing article image --}}
                            <div class="form-group row">
                                <label for="path" class="col-md-4 col-form-label text-md-right">{{ __('عکس') }}</label>

                                <div class="col-md-6">
                                    <input id="path" type="file" class="form-control @error('path') is-invalid @enderror" name="path" autocomplete="path" autofocus>

                                    @error('path')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- section for changing image  alt --}}
                            <div class="form-group row">
                                <label for="alt" class="col-md-4 col-form-label text-md-right">{{ __('عکس alt') }}</label>

                                <div class="col-md-6">
                                    <input id="alt" type="text" class="form-control @error('alt') is-invalid @enderror" name="alt" required autocomplete="alt" value="{{ $article->image->alt }}" autofocus>

                                    @error('alt')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- section for changing image  name --}}
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('عکس name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" required value="{{ $article->image->name }}" autocomplete="name" autofocus>

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
<a href="{{ route('admin.articles.create') }}" class="btn btn-primary">ساخت مقاله جدید</a>

@endsection
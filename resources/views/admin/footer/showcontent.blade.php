@extends('admin.layouts.master')
@section('sitetitle')
    متن های فوتر
@endsection

@section('pagetitle')
    متن های فوتر
@endsection

@section('content')

    <section class="text-center">
        <div class="btn-group btn-group-toggle">
            <a href="{{ route('admin.footer.titles.index', $lang) }}" class="btn btn-primary">title</a>
            <a href="{{ route('admin.footer.content.index', $lang) }}" class="btn btn-primary">contents</a>
            <a href="{{ route('admin.footer.links.index', $lang) }}" class="btn btn-primary">social media</a>
        </div>
    </section>

    <section class="text-center">
        <div class="btn-group btn-group-toggle">
            <a href="{{ route('admin.footer.content.index', 'fa') }}" class="btn btn-primary">فارسی</a>
            <a href="{{ route('admin.footer.content.index', 'en') }}" class="btn btn-primary">انگلیسی</a>
        </div>
    </section>

    <table class="table table-striped" style="margin-top: 3%">
        <thead>
            <tr>
                <th class="text-center" scope="col">تنظیمات</th>
                <th class="text-center" scope="col">تغییرات</th>
                <th class="text-center" scope="col">لینک</th>
                <th class="text-center" scope="col">خلاصه متن</th>
                <th class="text-center" scope="col">عنوان</th>
                <th class="text-center" scope="col">شماره</th>
            </tr>
        </thead>
        <tbody>
            {{-- make number for rows --}}
            @php
                $number = 1;
            @endphp
            @foreach ($contents as $content)
                <tr>
                    <td class="text-center">
                        <form action="{{ route('admin.footer.content.destroy', $content->id) }}" method="post">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-danger">حذف متن</button>
                        </form>
                    </td>


                    <td class="text-center" class="text-center">
                        <!-- Button FOR  editinig contents -->
                        <button type="button" class="btn btn-warning" data-toggle="modal"
                            data-target="#edit{{ $content->id }}">
                            ویرایش متن
                        </button>
                    </td>
                    @if ($content->text_link !== null)
                        <td class="text-center">{{ $content->text_link }}</td>
                    @else
                        <td class="text-center">{{ 'ندارد' }}</td>
                    @endif
                    <td class="text-center">{{ $content->text }}</td>

                    <td class="text-center">{{ $content->title->title }}</td>
                    <th class="text-center" scope="row">{{ $number }}</th>

                </tr>
                @php
                    $number++;
                @endphp

                <!-- modal for editing content -->
                <div class="modal fade" id="edit{{ $content->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-content" id="exampleModalLabel">تغیر متن </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('admin.footer.content.update', $content->id) }}" method="POST">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="text"
                                            class="col-md-4 col-form-label text-md-right">{{ __('متن') }}</label>
                                        <div class="col-md-6">
                                            <textarea id="text" class="form-control @error('text') is-invalid @enderror"
                                                name="text" required autocomplete="name"
                                                autofocus>{{ $content->text }}</textarea>

                                            @error('content')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label for="name"
                                            class="col-md-4 col-form-label text-md-right">{{ __('لینک متن') }}</label>
                                        <div class="col-md-6">
                                            <input id="text_link"
                                                class="form-control @error('text_link') is-invalid @enderror"
                                                name="text_link" required autocomplete="name"
                                                value="{{ $content->text_link }}" autofocus>

                                            @error('link')
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
            @endforeach

        </tbody>
    </table>

    {{-- button to make content --}}
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        ساخت متن جدید
    </button>

    {{-- modal for making new content --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-content" id="exampleModalLabel">ساخت متن جدید </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.footer.content.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="lang" value="{{ $lang }}">

                        <div class="form-group row">
                            <label for="text" class="col-md-4 col-form-label text-md-right">{{ __('متن') }}</label>

                            <div class="col-md-6">
                                <textarea id="text" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="text" value="{{ old('content') }}" required autocomplete="text"
                                    autofocus></textarea>

                                @error('text')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="link" class="col-md-4 col-form-label text-md-right">{{ __('لینک') }}</label>

                            <div class="col-md-6">
                                <input id="link" type="text" class="form-control @error('link') is-invalid @enderror"
                                    name="link" value="{{ old('link') }}" required autocomplete="link" autofocus>

                                @error('link')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="link" class="col-md-4 col-form-label text-md-right">{{ __('عنوان') }}</label>

                            <div class="col-md-6">
                                <select name="title_id" class="custom-select">
                                    @foreach ($titles as $title)
                                        <option value="{{ $title->id }}">{{ $title->title }}</option>
                                    @endforeach
                                </select>

                                @error('link')
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

@extends('admin.layouts.master')
@section('sitetitle')
    عناوین فوتر
@endsection
@section('content')
@section('pagetitle')
    عناوین فوتر
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
            <a href="{{ route('admin.footer.titles.index', 'fa') }}" class="btn btn-primary">فارسی</a>
            <a href="{{ route('admin.footer.titles.index', 'en') }}" class="btn btn-primary">انگلیسی</a>
        </div>
    </section>

    <table class="table table-striped" style="margin-top: 3%">
        <thead>
            <tr>
                <th class="text-center" scope="col">تنظیمات</th>
                <th class="text-center" scope="col">تغییرات</th>
                <th class="text-center" scope="col">دسترسی سریع</th>
                <th class="text-center" scope="col">وضعیت</th>
                <th class="text-center" scope="col">عنوان</th>
                <th class="text-center" scope="col">شماره</th>
            </tr>
        </thead>
        <tbody>
            {{-- make number for rows --}}
            @php
                $number = 1;
            @endphp
            @foreach ($languages as $language)
                @php
                    $title = $language->langable;
                @endphp
                <tr>
                    <td class="text-center">
                        <form action="{{ route('admin.footer.titles.destroy', $title->id) }}" method="post">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-danger">حذف عنوان</button>
                        </form>
                    </td>

                    <td class="text-center" class="text-center">
                        <!-- Button FOR  editinig titles -->
                        <button type="button" class="btn btn-warning" data-toggle="modal"
                            data-target="#edit{{ $title->id }}">
                            ویرایش عنوان
                        </button>
                    </td>

                    <td class="text-center">
                        <a class="btn btn-info"
                            href="{{ route('admin.footer.content.show', [$title->id, $lang]) }}">مشاهده متن
                            های مربوط به عنوان
                            عنوان</a>
                    </td>

                    {{-- status button --}}
                    <td class="text-center">
                        @if ($title->status == 1)
                            <form action="{{ route('admin.footer.titles.block', $title->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-success">نمایش</button>
                            </form>
                        @endif
                        @if ($title->status == 0)
                            <form action="{{ route('admin.footer.titles.unblock', $title->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger">عدم نمایش</button>
                            </form>
                        @endif
                    </td>

                    <td class="text-center">{{ $title->title }}</td>
                    <th class="text-center" scope="row">{{ $number }}</th>

                </tr>
                @php
                    $number++;
                @endphp

                <!-- modal for editing title -->
                <div class="modal fade" id="edit{{ $title->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">تغیر عنوان</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('admin.footer.titles.update', $title->id) }}" method="POST">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="name"
                                            class="col-md-4 col-form-label text-md-right">{{ __('عنوان') }}</label>

                                        <div class="col-md-6">
                                            <input id="name" type="text"
                                                class="form-control @error('title') is-invalid @enderror" name="title"
                                                value="{{ $title->title }}" required autocomplete="name" autofocus>

                                            @error('title')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $title }}</strong>
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

    {{-- button to make title --}}
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        ساخت عنوان جدید
    </button>

    {{-- modal for making new title --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ساخت عنوان جدید </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.footer.titles.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="lang" value="{{ $lang }}">

                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('عنوان') }}</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>

                                @error('title')
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

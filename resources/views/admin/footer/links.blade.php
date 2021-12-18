@extends('admin.layouts.master')
@section('sitetitle')
    لینک های فوتر
@endsection
@section('content')
@section('pagetitle')
    لینک های فوتر
@endsection
@section('content')

    <section class="text-center">
        <div class="btn-group btn-group-toggle">
            <a href="{{ route('admin.footer.titles.index') }}" class="btn btn-primary">titles</a>
            <a href="{{ route('admin.footer.content.index') }}" class="btn btn-primary">contents</a>
            <a href="{{ route('admin.footer.links.index') }}" class="btn btn-primary">social media</a>
        </div>
    </section>

    <table class="table table-striped" style="margin-top: 3%">
        <thead>
            <tr>
                <th class="text-center" scope="col">تنظیمات</th>
                <th class="text-center" scope="col">لینک اینستاگرام</th>
                <th class="text-center" scope="col">لینک توییتر</th>
                <th class="text-center" scope="col">لینک فیسبوک</th>
                <th class="text-center" scope="col">لینک لینکد این</th>
                <th class="text-center" scope="col">لینک 1</th>
                <th class="text-center" scope="col">لوگو لینک1</th>
                <th class="text-center" scope="col">لینک 2</th>
                <th class="text-center" scope="col">لوگو لینک 2</th>
                <th class="text-center" scope="col">شماره</th>
            </tr>
        </thead>
        <tbody>
            {{-- make number for rows --}}
            @php
                $number = 1;
            @endphp
            @foreach ($links as $link)
                <tr>
                    <td class="text-center">
                        <form action="{{ route('admin.footer.links.destroy', $link->id) }}" method="post">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-danger">حذف عنوان</button>
                        </form>
                    </td>
                    <!-- Button FOR  editinig instagram link -->
                    <td class="text-center" class="text-center">
                        <button type="button" class="btn btn-warning" data-toggle="modal"
                            data-target="#instagram{{ $link->id }}">
                            مشاهده
                        </button>
                    </td>

                    <!-- Button FOR  editinig twitter links -->
                    <td class="text-center" class="text-center">
                        <button type="button" class="btn btn-warning" data-toggle="modal"
                            data-target="#twitter{{ $link->id }}">
                            مشاهده
                        </button>
                    </td>

                    <!-- Button FOR  editinig facebook links -->
                    <td class="text-center" class="text-center">
                        <button type="button" class="btn btn-warning" data-toggle="modal"
                            data-target="#facebook{{ $link->id }}">
                            مشاهده
                        </button>
                    </td>

                    <!-- Button FOR  editinig linkedin links -->
                    <td class="text-center" class="text-center">

                        <button type="button" class="btn btn-warning" data-toggle="modal"
                            data-target="#linkedin{{ $link->id }}">
                            مشاهده
                        </button>
                    </td>

                    <!-- Button FOR  editinig social_1 links -->
                    <td class="text-center" class="text-center">

                        <button type="button" class="btn btn-warning" data-toggle="modal"
                            data-target="#social1{{ $link->id }}">
                            مشاهده
                        </button>
                    </td>

                    <!-- Button FOR  editinig social_1 image -->
                    <td class="text-center" class="text-center">

                        <button type="button" class="" data-toggle="modal"
                            data-target="#social1img{{ $link->id }}">
                            <img src="{{ asset("$link->social_1_icon") }}" style="width: 35px; height:35px;">
                        </button>
                    </td>

                    <!-- Button FOR  editinig social_2 links -->
                    <td class="text-center" class="text-center">
                        <button type="button" class="btn btn-warning" data-toggle="modal"
                            data-target="#social2{{ $link->id }}">
                            مشاهده
                        </button>
                    </td>

                    <!-- Button FOR  editinig social_2 image -->
                    <td class="text-center" class="text-center">

                        <button type="button" class="" data-toggle="modal"
                            data-target="#social2img{{ $link->id }}">
                            <img src="{{ asset("$link->social_2_icon") }}" style="width: 35px; height:35px;">
                        </button>
                    </td>
                    <th class="text-center" scope="row">{{ $number }}</th>
                </tr>
                @php
                    $number++;
                @endphp

                <!-- modal for editing instagram link -->
                <div class="modal fade" id="instagram{{ $link->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-link" id="exampleModalLabel">تغیر عنوان</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('admin.footer.links.update', $link->id) }}" method="POST">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="name"
                                            class="col-md-4 col-form-label text-md-right">{{ __('لینک') }}</label>

                                        <div class="col-md-6">
                                            <input id="name" type="text"
                                                class="form-control @error('link') is-invalid @enderror" name="link"
                                                value="{{ $link->instagram_link }}" required autocomplete="link"
                                                autofocus>

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

                <!-- modal for editing twitter link -->
                <div class="modal fade" id="twitter{{ $link->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-link" id="exampleModalLabel">تغیر عنوان</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('admin.footer.links.update', $link->id) }}" method="POST">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="name"
                                            class="col-md-4 col-form-label text-md-right">{{ __('لینک') }}</label>

                                        <div class="col-md-6">
                                            <input id="name" type="text"
                                                class="form-control @error('link') is-invalid @enderror" name="link"
                                                value="{{ $link->twitter_link }}" required autocomplete="link" autofocus>

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

                <!-- modal for editing facebook link -->
                <div class="modal fade" id="facebook{{ $link->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-link" id="exampleModalLabel">تغیر عنوان</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('admin.footer.links.update', $link->id) }}" method="POST">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="name"
                                            class="col-md-4 col-form-label text-md-right">{{ __('لینک') }}</label>

                                        <div class="col-md-6">
                                            <input id="name" type="text"
                                                class="form-control @error('link') is-invalid @enderror" name="link"
                                                value="{{ $link->facebook_link }}" required autocomplete="link"
                                                autofocus>

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

                <!-- modal for editing linkedin link -->
                <div class="modal fade" id="linkedin{{ $link->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-link" id="exampleModalLabel">تغیر عنوان</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('admin.footer.links.update', $link->id) }}" method="POST">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="name"
                                            class="col-md-4 col-form-label text-md-right">{{ __('لینک') }}</label>

                                        <div class="col-md-6">
                                            <input id="name" type="text"
                                                class="form-control @error('link') is-invalid @enderror" name="link"
                                                value="{{ $link->linkedin_link }}" required autocomplete="link"
                                                autofocus>

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

                <!-- modal for editing social1 link -->
                <div class="modal fade" id="social1{{ $link->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-link" id="exampleModalLabel">تغیر عنوان</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('admin.footer.links.update', $link->id) }}" method="POST">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="name"
                                            class="col-md-4 col-form-label text-md-right">{{ __('لینک') }}</label>

                                        <div class="col-md-6">
                                            <input id="name" type="text"
                                                class="form-control @error('link') is-invalid @enderror" name="link"
                                                value="{{ $link->social_1 }}" required autocomplete="link" autofocus>

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

                <!-- modal for editing social1 image -->
                <div class="modal fade" id="social1img{{ $link->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-link" id="exampleModalLabel">تغیر عنوان</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('admin.footer.links.update', $link->id) }}" method="POST">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="name"
                                            class="col-md-4 col-form-label text-md-right">{{ __('لینک') }}</label>

                                        <div class="col-md-6">
                                            <input id="name" type="text"
                                                class="form-control @error('link') is-invalid @enderror" name="link"
                                                value="{{ $link->social_1 }}" required autocomplete="link" autofocus>

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

                <!-- modal for editing social2 link -->
                <div class="modal fade" id="social2{{ $link->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-link" id="exampleModalLabel">تغیر عنوان</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('admin.footer.links.update', $link->id) }}" method="POST">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="name"
                                            class="col-md-4 col-form-label text-md-right">{{ __('لینک') }}</label>

                                        <div class="col-md-6">
                                            <input id="name" type="text"
                                                class="form-control @error('link') is-invalid @enderror" name="link"
                                                value="{{ $link->social_2 }}" required autocomplete="link" autofocus>

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

                <!-- modal for editing social2 image -->
                <div class="modal fade" id="social2img{{ $link->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-link" id="exampleModalLabel">تغیر عکس</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('admin.footer.links.update', $link->id) }}" method="POST">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="name"
                                            class="col-md-4 col-form-label text-md-right">{{ __('عکس لینک 2') }}</label>

                                        <div class="col-md-6">
                                            <input id="social1_img" type="file"
                                                class="form-control @error('social1_img') is-invalid @enderror"
                                                name="social1_img" required autocomplete="social1_img" autofocus>

                                            @error('social1_img')
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

    {{-- button to make links --}}
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        ساخت لینک های جدید
    </button>

    {{-- modal for making new link --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-link" id="exampleModalLabel">ساخت لینک های جدید </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.footer.links.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{-- facbook link --}}
                        <div class="form-group row">
                            <label for="facebook"
                                class="col-md-4 col-form-label text-md-right">{{ __('فیسبوک') }}</label>

                            <div class="col-md-6">
                                <input id="facebook" type="text"
                                    class="form-control @error('facebook') is-invalid @enderror" name="facebook"
                                    value="{{ old('facebook') }}" required autocomplete="facebook" autofocus>

                                @error('facebook')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- instagram link --}}
                        <div class="form-group row">
                            <label for="instagram"
                                class="col-md-4 col-form-label text-md-right">{{ __('اینستاگرام') }}</label>

                            <div class="col-md-6">
                                <input id="instagram" type="text"
                                    class="form-control @error('instagram') is-invalid @enderror" name="instagram"
                                    value="{{ old('instagram') }}" required autocomplete="instagram" autofocus>

                                @error('instagram')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- twitter link --}}
                        <div class="form-group row">
                            <label for="twitter"
                                class="col-md-4 col-form-label text-md-right">{{ __('توییتر') }}</label>

                            <div class="col-md-6">
                                <input id="twitter" type="text" class="form-control @error('twitter') is-invalid @enderror"
                                    name="twitter" value="{{ old('twitter') }}" required autocomplete="twitter"
                                    autofocus>

                                @error('twitter')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- linkedin link --}}
                        <div class="form-group row">
                            <label for="linkedin"
                                class="col-md-4 col-form-label text-md-right">{{ __('لینکد این') }}</label>

                            <div class="col-md-6">
                                <input id="linkedin" type="text"
                                    class="form-control @error('linkedin') is-invalid @enderror" name="linkedin"
                                    value="{{ old('linkedin') }}" required autocomplete="linkedin" autofocus>

                                @error('linkedin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- social_1 link --}}
                        <div class="form-group row">
                            <label for="social_1"
                                class="col-md-4 col-form-label text-md-right">{{ __('لینک 1') }}</label>

                            <div class="col-md-6">
                                <input id="social_1" type="text"
                                    class="form-control @error('social_1') is-invalid @enderror" name="social_1"
                                    value="{{ old('social_1') }}" autocomplete="social_1" autofocus>

                                @error('social_1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- social 1 link icon --}}
                        <div class="form-group row">
                            <label for="social1_img"
                                class="col-md-4 col-form-label text-md-right">{{ __('ایکون لینک 1') }}</label>

                            <div class="col-md-6">
                                <input id="social1_img" type="text"
                                    class="form-control @error('social1_img') is-invalid @enderror" name="social1_img"
                                    value="{{ old('social1_img') }}" autocomplete="social1_img" autofocus>

                                @error('social1_img')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        {{-- social_2 link --}}
                        <div class="form-group row">
                            <label for="social_2"
                                class="col-md-4 col-form-label text-md-right">{{ __('لینک 2') }}</label>

                            <div class="col-md-6">
                                <input id="social_2" type="text"
                                    class="form-control @error('social_2') is-invalid @enderror" name="social_2"
                                    value="{{ old('social_1') }}" autocomplete="social_2" autofocus>

                                @error('social_2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- social 2 link icon --}}
                        <div class="form-group row">
                            <label for="social2_img"
                                class="col-md-4 col-form-label text-md-right">{{ __('ایکون لینک 2') }}</label>

                            <div class="col-md-6">
                                <input id="social2_img" type="text"
                                    class="form-control @error('social2_img') is-invalid @enderror" name="social2_img"
                                    value="{{ old('social2_img') }}" autocomplete="social2_img" autofocus>

                                @error('social2_img')
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

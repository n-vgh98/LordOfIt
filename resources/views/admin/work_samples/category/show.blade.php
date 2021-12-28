@extends('admin.layouts.master')

@section('sitetitle')
    نمونه کار های {{ $category->title }}
@endsection


@section('pagetitle')
    نمونه کار های {{ $category->title }}
@endsection

@section('content')
    <table class="table table-striped">
        <thead>
            <tr>
                <th class="text-center" scope="col">امکانات</th>
                <th class="text-center" scope="col">ویرایش</th>
                <th class="text-center" scope="col">عکس</th>
                <th class="text-center" scope="col">وضعیت</th>
                <th class="text-center" scope="col">لینک نمونه کار</th>
                <th class="text-center" scope="col">متن نمونه کار</th>
                <th class="text-center" scope="col">نام دسته بندی</th>
                <th class="text-center" scope="col">نام نمونه کار</th>
                <th class="text-center" scope="col-1">#</th>
            </tr>
        </thead>
        <tbody>
            {{-- make number for rows --}}
            @php
                $number = 0;
            @endphp

            @foreach ($category->samples as $sample)

                @php
                    $number++;
                @endphp
                <tr>
                    {{-- button for removing sample --}}
                    <td class="text-center">
                        <form action="{{ route('admin.work_samples.destroy', $sample->id) }}" method="post">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-danger">حذف نمونه کار</button>
                        </form>
                    </td>

                    {{-- button for editing sample --}}
                    <td class="text-center">
                        <a class="btn btn-warning" href="{{ route('admin.work_samples.edit', $sample->id) }}">ویرایش</a>
                    </td>

                    {{-- button for editing sample image --}}
                    <td class="text-center">
                        <button type="button" class="" data-toggle="modal"
                            data-target="#sampleimg{{ $sample->id }}">

                            <img src="{{ asset($sample->image->path) }}" style="width: 35px; height:35px;">
                        </button>
                    </td>

                    {{-- status button --}}
                    <td class="text-center" class="text-center">
                        @if ($sample->status == 1)
                            <form action="{{ route('admin.work_samples.inprogress', $sample->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-success">تمام شده</button>
                            </form>
                        @endif
                        @if ($sample->status == 2)
                            <form action="{{ route('admin.work_samples.finished', $sample->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-warning">در حال پیشرفت</button>
                            </form>
                        @endif
                    </td>

                    <td class="text-center">
                        <button type="button" class="btn btn-info" data-toggle="modal"
                            data-target="#sampletext{{ $sample->id }}">مشاهده</button>
                    </td>

                    <td class="text-center">
                        <button type="button" class="btn btn-info" data-toggle="modal"
                            data-target="#samplelink{{ $sample->id }}">مشاهده</button>
                    </td>


                    <td class="text-center">
                        <a
                            href="{{ route('admin.work_samples.category.show', $sample->category->id) }}">{{ $sample->category->title }}</a>
                    </td>


                    <td class="text-center">
                        {{ $sample->title }}
                    </td>
                    <th class="text-center" scope="row">{{ $number }}</th>
                </tr>


                <!-- modal for editing sample image -->
                <div class="modal fade" id="sampleimg{{ $sample->id }}" tabindex="-1" role="dialog"
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
                                <form action="{{ route('admin.work_samples.update.image', $sample->image->id) }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf

                                    {{-- section for changing sample image --}}
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
                                                autocomplete="alt" value="{{ $sample->image->alt }}" autofocus>

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
                                                required value="{{ $sample->image->name }}" autocomplete="name"
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

                <!-- modal for showing sample text -->
                <div class="modal fade" id="sampletext{{ $sample->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"> متن نمونه کار </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('admin.courses.update', $sample->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    {{-- topic_list of sample --}}
                                    <div class="form-group row">
                                        <label for="description"
                                            class="col-md-4 col-form-label text-md-right">{{ __('متن نمونه کار') }}</label>

                                        <div class="col-md-6">
                                            <textarea id="description" type="text"
                                                class="form-control @error('job_description') is-invalid @enderror" required
                                                disabled autocomplete="description"
                                                autofocus>{{ $sample->text }}</textarea>

                                            @error('description')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div style="margin-top:15px;">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">دیدم</button>
                                    </div>

                                </form>
                            </div>
                            <div class="modal-footer">

                            </div>
                        </div>
                    </div>
                </div>

                <!-- modal for showing sample link -->
                <div class="modal fade" id="samplelink{{ $sample->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"> لینک نمونه کار </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('admin.courses.update', $sample->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    {{-- topic_list of sample --}}
                                    <div class="form-group row">
                                        <label for="description"
                                            class="col-md-4 col-form-label text-md-right">{{ __('لینک نمونه کار') }}</label>

                                        <div class="col-md-6">
                                            <textarea id="description" type="text"
                                                class="form-control @error('job_description') is-invalid @enderror" required
                                                disabled autocomplete="description"
                                                autofocus>{{ $sample->link }}</textarea>

                                            @error('description')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div style="margin-top:15px;">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">دیدم</button>
                                    </div>

                                </form>
                            </div>
                            <div class="modal-footer">

                            </div>
                        </div>
                    </div>
                </div>

            @endforeach
        </tbody>
    </table>
    {{-- button to add sample --}}
    <a class="btn btn-primary" href="{{ route('admin.work_samples.create', $category->id) }}"> ساخت نمونه کار جدید </a>
@endsection

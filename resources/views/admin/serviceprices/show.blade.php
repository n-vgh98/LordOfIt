@extends('admin.layouts.master')

@section('sitetitle')
    تعرفه های {{ $category->title }}
@endsection


@section('pagetitle')
    تعرفه های {{ $category->title }}
@endsection

@section('content')
    <table class="table table-striped">
        <thead>
            <tr>
                <th class="text-center" scope="col">امکانات</th>
                <th class="text-center" scope="col">ویرایش</th>
                <th class="text-center" scope="col">ویژگی های</th>
                <th class="text-center" scope="col">وضعیت نمایش در منو</th>
                <th class="text-center" scope="col">نام زیردسته</th>
                <th class="text-center" scope="col">مدت زمان تعرفه</th>
                <th class="text-center" scope="col">هزینه تعرفه</th>
                <th class="text-center" scope="col">نام تعرفه</th>
                <th class="text-center" scope="col-1">#</th>
            </tr>
        </thead>
        <tbody>
            {{-- make number for rows --}}
            @php
                $number = 0;
            @endphp

            @foreach ($category->services as $service)

                @php
                    $number++;
                @endphp
                <tr>
                    {{-- button for removing service --}}
                    <td class="text-center">
                        <form action="{{ route('admin.services.price.destroy', $service->id) }}" method="post">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-danger">حذف تعرفه</button>
                        </form>
                    </td>

                    {{-- button for editing service --}}
                    <td class="text-center">
                        <a class="btn btn-warning"
                            href="{{ route('admin.services.price.edit', $service->id) }}">ویرایش</a>
                    </td>



                    <td class="text-center">
                        <button type="button" class="btn btn-info" data-toggle="modal"
                            data-target="#cattext{{ $service->id }}">مشاهده</button>
                    </td>

                    <td class="text-center">
                        @if ($service->show_in_menu == 1)
                            <form action="{{ route('admin.services.price.unshow', $service->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-success">در حال نمایش</button>
                            </form>
                        @endif
                        @if ($service->show_in_menu == 0)
                            <form action="{{ route('admin.services.price.showinenu', $service->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger">پنهان</button>
                            </form>
                        @endif
                    </td>

                    <td class="text-center">
                        <a
                            href="{{ route('admin.services.price.subcategory.show', $service->category->id) }}">{{ $service->category->title }}</a>
                    </td>

                    <td class="text-center">
                        {{ $service->time }}
                    </td>

                    <td class="text-center">
                        {{ $service->price }}
                    </td>

                    <td class="text-center">
                        {{ $service->name }}
                    </td>
                    <th class="text-center" scope="row">{{ $number }}</th>
                </tr>

                <!-- modal for showing service text -->
                <div class="modal fade" id="cattext{{ $service->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"> توضیحات دسته بندی </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('admin.services.price.update', $service->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    {{-- description of service --}}
                                    <div class="form-group row">
                                        <label for="description"
                                            class="col-md-4 col-form-label text-md-right">{{ __('توضیحات') }}</label>

                                        <div class="col-md-6">
                                            <textarea id="description" type="text"
                                                class="form-control @error('job_description') is-invalid @enderror" required
                                                disabled autocomplete="description"
                                                autofocus>{{ $service->attributes }}</textarea>

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

    {{-- button to add service --}}
    <a class="btn btn-primary" href="{{ route('admin.services.price.create', $category->id) }}"> ساخت دسته بندی جدید </a>

@endsection

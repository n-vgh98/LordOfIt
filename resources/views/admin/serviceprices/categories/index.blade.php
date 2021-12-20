@extends('admin.layouts.master')

@section('sitetitle')
    دسته بندی تعرفه ها
@endsection


@section('pagetitle')
    دسته بندی تعرفه ها
@endsection

@section('content')
    <table class="table table-striped">
        <thead>
            <tr>
                <th class="text-center" scope="col">امکانات</th>
                <th class="text-center" scope="col">ویرایش</th>
                <th class="text-center" scope="col">متن</th>
                <th class="text-center" scope="col">زیردسته ها</th>
                <th class="text-center" scope="col">نام دسته بندی</th>
                <th class="text-center" scope="col-1">#</th>
            </tr>
        </thead>
        <tbody>
            {{-- make number for rows --}}
            @php
                $number = 0;
            @endphp

            @foreach ($categories as $category)

                @php
                    $number++;
                @endphp
                <tr>
                    {{-- button for removing category --}}
                    <td class="text-center">
                        <form action="{{ route('admin.services.price.category.destroy', $category->id) }}" method="post">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-danger">حذف دسته بندی</button>
                        </form>
                    </td>

                    {{-- button for editing category --}}
                    <td class="text-center">
                        <a class="btn btn-warning"
                            href="{{ route('admin.services.price.category.edit', $category->id) }}">ویرایش</a>
                    </td>

                    <td class="text-center">
                        <button type="button" class="btn btn-info" data-toggle="modal"
                            data-target="#cattext{{ $category->id }}">مشاهده</button>
                    </td>
                    <td class="text-center">
                        @if (count($category->subcategories) == 0)
                            <a class="btn btn-success"
                                href="{{ route('admin.services.price.subcategory.create', $category->id) }}">ساختن</a>
                        @else
                            <a class="btn btn-success"
                                href="{{ route('admin.services.price.subcategory.show', $category->id) }}">مشاهده</a>
                        @endif
                    </td>
                    <td class="text-center">
                        {{ $category->title }}
                    </td>
                    <th class="text-center" scope="row">{{ $number }}</th>
                </tr>

                <!-- modal for showing category text -->
                <div class="modal fade" id="cattext{{ $category->id }}" tabindex="-1" role="dialog"
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
                                <form action="{{ route('admin.services.price.category.update', $category->id) }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    {{-- description of category --}}
                                    <div class="form-group row">
                                        <label for="description"
                                            class="col-md-4 col-form-label text-md-right">{{ __('توضیحات') }}</label>

                                        <div class="col-md-6">
                                            <textarea id="description" type="text"
                                                class="form-control @error('job_description') is-invalid @enderror" required
                                                disabled autocomplete="description"
                                                autofocus>{{ $category->text }}</textarea>

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

    {{-- button to add category --}}
    <a class="btn btn-primary" href="{{ route('admin.services.price.category.create') }}"> ساخت دسته بندی جدید </a>

@endsection

@extends('admin.layouts.master')

@section('sitetitle')
    زیر دسته {{ $category->title }}
@endsection


@section('pagetitle')
    زیر دسته {{ $category->title }}
@endsection

@section('content')
    <table class="table table-striped">
        <thead>
            <tr>
                <th class="text-center" scope="col">امکانات</th>
                <th class="text-center" scope="col">ویرایش</th>
                <th class="text-center" scope="col">تعرفه ها</th>
                <th class="text-center" scope="col">دسته بندی اصلی</th>
                <th class="text-center" scope="col">نام دسته بندی</th>
                <th class="text-center" scope="col-1">#</th>
            </tr>
        </thead>
        <tbody>
            {{-- make number for rows --}}
            @php
                $number = 0;
            @endphp

            @foreach ($category->subcategories as $subcategory)

                @php
                    $number++;
                @endphp
                <tr>
                    {{-- button for removing subcategory --}}
                    <td class="text-center">
                        <form action="{{ route('admin.services.price.subcategory.destroy', $subcategory->id) }}"
                            method="post">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-danger">حذف دسته بندی</button>
                        </form>
                    </td>

                    {{-- button for editing subcategory --}}
                    <td class="text-center">
                        <a class="btn btn-warning"
                            href="{{ route('admin.services.price.subcategory.edit', $subcategory->id) }}">ویرایش</a>
                    </td>

                    <td class="text-center">
                        @if (count($subcategory->services) == 0)
                            <a href="{{ route('admin.services.price.create', $subcategory->id) }}"
                                class="btn btn-success">ساختن</a>
                        @else
                            <a href="{{ route('admin.services.price.show', $subcategory->id) }}"
                                class="btn btn-success">مشاهده</a>

                        @endif
                    </td>
                    <td class="text-center">
                        <a
                            href="{{ route('admin.services.price.category.index', $subcategory->category->language->name) }}">{{ $subcategory->category->title }}</a>
                    </td>
                    <td class="text-center">
                        {{ $subcategory->title }}
                    </td>
                    <th class="text-center" scope="row">{{ $number }}</th>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- button to add subcategory --}}
    <a class="btn btn-primary" href="{{ route('admin.services.price.subcategory.create', $category->id) }}"> ساخت دسته
        بندی جدید </a>

@endsection

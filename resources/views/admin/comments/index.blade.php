@extends('admin.layouts.master')

@section('sitetitle')
    دوره های آموزشی
@endsection


@section('pagetitle')
    دوره های آموزشی
@endsection

@section('content')
    <table class="table table-striped">
        <thead>
            <tr>
                <th class="text-center" scope="col">امکانات</th>
                <th class="text-center" scope="col">وضعیت</th>
                <th class="text-center" scope="col">متن</th>
                <th class="text-center" scope="col">پاسخ</th>
                <th class="text-center" scope="col">فرستنده</th>
                <th class="text-center" scope="col-1">#</th>
            </tr>
        </thead>
        <tbody>

            {{-- make number for rows --}}
            @php
                $number = 0;
            @endphp

            @foreach ($comments as $comment)

                @php
                    $number++;
                @endphp


                <tr>
                    {{-- button for removing comment --}}
                    <td class="text-center">
                        <form action="{{ route('admin.comments.destroy', $comment->id) }}" method="post">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-danger">حذف دوره</button>
                        </form>
                    </td>

                    <td class="text-center">
                        @if ($comment->status == 1)
                            <form action="{{ route('admin.comments.decline', $comment->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-success">تایید شده</button>
                            </form>
                        @endif
                        @if ($comment->status == 0)
                            <form action="{{ route('admin.comments.accept', $comment->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger">تایید نشده</button>
                            </form>
                        @endif
                    </td>

                    <td class="text-center">
                        <button type="button" class="btn btn-info" data-toggle="modal"
                            data-target="#courselist{{ $comment->id }}">مشاهده</button>
                    </td>

                    @if ($comment->parent_id == null)
                        <td class="text-center">
                            <button type="button" class="btn btn-info" data-toggle="modal"
                                data-target="#commentanswer{{ $comment->id }}">پاسخ</button>
                        </td>
                    @else
                        <td class="text-center">نیاز به پاسخ ندارد</td>
                    @endif



                    <td class="text-center">
                        {{ $comment->writer->name }}
                    </td>



                    <th class="text-center" scope="row">{{ $number }}</th>
                </tr>

                <!-- modal for editing comment -->
                <div class="modal fade" id="courselist{{ $comment->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"> متن کامنت </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="#" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    {{-- description of comment --}}
                                    <div class="form-group row">
                                        <label for="description"
                                            class="col-md-4 col-form-label text-md-right">{{ __('توضیحات') }}</label>

                                        <div class="col-md-6">
                                            <textarea id="description" type="text"
                                                class="form-control @error('job_description') is-invalid @enderror" required
                                                disabled autocomplete="description"
                                                autofocus>{{ $comment->text }}</textarea>

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

                {{-- modal for answering --}}
                <div class="modal fade" id="commentanswer{{ $comment->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"> پاسخ </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('admin.comments.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    {{-- text of comment --}}
                                    <div class="form-group row">
                                        <label for="text"
                                            class="col-md-4 col-form-label text-md-right">{{ __(':پاسخ') }}</label>

                                        <div class="col-md-6">
                                            <textarea id="text" type="text"
                                                class="form-control @error('text') is-invalid @enderror" required
                                                name="text" autocomplete="text" autofocus></textarea>

                                            @error('text')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-secondary">ارسال</button>

                                    <input type="hidden" name="comment" value="answer">
                                    <input type="hidden" name="id" value="{{ $comment->id }}">
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
@endsection

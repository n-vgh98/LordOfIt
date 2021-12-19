@extends('admin.layouts.master')
@section('content')
    <div class="content-header bg-white text-right">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">ایجاد مقاله جدید</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>

        {!! Form::open(['method' => 'post', 'action' => 'App\Http\Controllers\Admin\AdminArticleController@store', 'files' => true]) !!}

        <div>
            {!! Form::label('title', 'عنوان:') !!}
            {!! Form::text('title', null, ['class' => 'form-control']) !!}
        </div><br>
        <div>
            {!! Form::label('slug', 'نام مستعار:') !!}
            {!! Form::text('slug', null, ['class' => 'form-control']) !!}
        </div><br>

        <div>
            {!! Form::label('status', 'وضعیت:') !!}
            {!! Form::select('status', ['0' => 'غیرفعال', '1' => 'فعال'], 1, ['class' => 'form-control']) !!}
        </div><br>
        <div>
            {!! Form::label('meta_description', 'متا توضیحات:') !!}
            {!! Form::textarea('meta_description', null, ['class' => 'form-control']) !!}
        </div><br>
        <div>
            {!! Form::label('meta_keywords', 'متا برچسب ها:') !!}
            {!! Form::textarea('meta_keywords', null, ['class' => 'form-control']) !!}
        </div><br>
        <div>
            {!! Form::label('v_link_1', 'لینک ویدئو شماره 1:') !!}
            {!! Form::text('v_link_1', null, ['class' => 'form-control']) !!}
        </div><br>
        <div>
            {!! Form::label('v_link_2', 'لینک ویدئو شماره 2:') !!}
            {!! Form::text('v_link_2', null, ['class' => 'form-control']) !!}
        </div><br>
        <div>
            {!! Form::label('v_link_3', 'لینک ویدئو شماره 3:') !!}
            {!! Form::text('v_link_3', null, ['class' => 'form-control']) !!}
        </div><br>
        <div>
            {!! Form::label('v_link_4', 'لینک ویدئو شماره 4:') !!}
            {!! Form::text('v_link_4', null, ['class' => 'form-control']) !!}
        </div><br>
        <div>
            <div>
                {!! Form::label('text_1', 'متن شماره 1:') !!}
                <? echo htmlspecialchars( $contentFromDB ); ?>
                {!! Form::textarea('text_1', null, ['class' => 'form-control']) !!}
            </div><br>
        </div>
        <div>
            {!! Form::submit('ذخیره', ['class' => 'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
    </div>
@endsection
@section('script')

    <script src="{{ asset('adminpanel/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('adminpanel/ckeditor/adapters/jquery.js') }}"></script>
    <script>
        CKEDITOR.replace('description', {
            language: 'fa',

        });
    </script>
@endsection

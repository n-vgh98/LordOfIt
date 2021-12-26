@extends('admin.layouts.master')
@section('content')
<div class="content-header bg-white text-right">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">ویرایش خدمات {{$service->title}}</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>

    {!! Form::open(['method'=>'PATCH' , 'action'=>['App\Http\Controllers\Admin\AdminServiceController@update',$service->id],'files'=>true]) !!}
    <div>
        {!! Form::label('title', 'عنوان:') !!}
        {!! Form::text('title', $service->title, ['class' => 'form-control']) !!}
    </div><br>

    <div>
    <label style="display: inline-block;
                max-width: 100%;
                margin-bottom: 5px;
                font-weight: bold;
                ">نام دسته بندی:</label>
        <select class="form-control" name="category">
            @foreach($categories as $category)
            <option value="{{$category->id}}">{{$category->title}}</option>
            @endforeach
        </select>
        
    </div>
    <div>
        {!! Form::label('meta_description', 'متا توضیحات:') !!}
        {!! Form::textarea('meta_description', $service->meta_description, ['class' => 'form-control']) !!}
    </div><br>
    <div>
        {!! Form::label('meta_keywords', 'متا برچسب ها:') !!}
        {!! Form::textarea('meta_keywords', $service->meta_keywords, ['class' => 'form-control']) !!}
    </div><br>
    <div>
        {!! Form::label('v_link_1', 'لینک ویدئو شماره 1:') !!}
        {!! Form::text('v_link_1', $service->v_link_1, ['class' => 'form-control']) !!}
    </div><br>
    <div>
        {!! Form::label('v_link_2', 'لینک ویدئو شماره 2:') !!}
        {!! Form::text('v_link_2', $service->v_link_2, ['class' => 'form-control']) !!}
    </div><br>
    <div>
        {!! Form::label('v_link_3', 'لینک ویدئو شماره 3:') !!}
        {!! Form::text('v_link_3', $service->v_link_3, ['class' => 'form-control']) !!}
    </div><br>
    <div>
        {!! Form::label('v_link_4', 'لینک ویدئو شماره 4:') !!}
        {!! Form::text('v_link_4', $service->v_link_4, ['class' => 'form-control']) !!}
    </div><br>
    <div>
        <div>
            {!! Form::label('text_1', 'متن شماره 1:') !!}
            <? echo htmlspecialchars($contentFromDB); ?>
            {!! Form::textarea('text_1', $service->text_1, ['class' => 'form-control', 'id' => 'text_1']) !!}
        </div><br>
    </div>
    <div>
        <div>
            {!! Form::label('text_2', 'متن شماره 2:') !!}
            <? echo htmlspecialchars($contentFromDB); ?>
            {!! Form::textarea('text_2', $service->text_2, ['class' => 'form-control', 'id' => 'text_2']) !!}
        </div><br>
    </div>
    <div>
        <div>
            {!! Form::label('text_3', 'متن شماره 3:') !!}
            <? echo htmlspecialchars($contentFromDB); ?>
            {!! Form::textarea('text_3', $service->text_3, ['class' => 'form-control', 'id' => 'text_3']) !!}
        </div><br>
    </div>
    <div>
        <div>
            {!! Form::label('text_4', 'متن شماره 4:') !!}
            <? echo htmlspecialchars($contentFromDB); ?>
            {!! Form::textarea('text_4', $service->text_4, ['class' => 'form-control', 'id' => 'text_4']) !!}
        </div><br>
    </div>

    <input type="hidden" value="{{$service->language->name}}" name="lang">
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
    CKEDITOR.replace('text_1', {
        language: 'fa',
    });
    CKEDITOR.replace('text_2', {
        language: 'fa',
    });
    CKEDITOR.replace('text_3', {
        language: 'fa',
    });
    CKEDITOR.replace('text_4', {
        language: 'fa',
    });
</script>
@endsection

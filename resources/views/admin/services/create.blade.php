@extends('admin.layouts.master')
@section('content')
<div class="content-header bg-white text-right">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">ایجاد خدمات جدید</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>

    {!! Form::open(['method' => 'post', 'action' => 'App\Http\Controllers\Admin\AdminServiceController@store', 'files' => true]) !!}

    <div>
        {!! Form::label('title', 'عنوان:') !!}
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
    </div><br>


    <div>
        <label style="display: inline-block;
                max-width: 100%;
                margin-bottom: 5px;
                font-weight: bold;
                ">نام دسته بندی:</label>
        <select class="form-control" name="category">
            @foreach($categories as $category)
            @if($category->parent_id == null)
            <option value="{{$category->id}}">{{$category->title}}</option>
            @endif
            @endforeach
        </select>

    </div><br />
    <div class="form-group">
        <label style="display: inline-block;
                max-width: 100%;
                margin-bottom: 5px;
                font-weight: bold;
                ">نام زیر دسته :</label>
        <select name="subcategory" id="subcategory" class="form-control input-sm">
            @foreach($categories as $category)
            @if($category->parent_id !== null)
            <option value="{{$category->id}}">{{$category->title}}</option>
            @endif
            @endforeach
        </select>
    </div>



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
            <? echo htmlspecialchars($contentFromDB); ?>
            {!! Form::textarea('text_1', null, ['class' => 'form-control', 'id' => 'description']) !!}
        </div><br>
    </div>
    <div>
        <div>
            {!! Form::label('text_2', 'متن شماره 2:') !!}
            <? echo htmlspecialchars($contentFromDB); ?>
            {!! Form::textarea('text_2', null, ['class' => 'form-control', 'id' => 'description2']) !!}
        </div><br>
    </div>
    <div>
        <div>
            {!! Form::label('text_3', 'متن شماره 3:') !!}
            <? echo htmlspecialchars($contentFromDB); ?>
            {!! Form::textarea('text_3', null, ['class' => 'form-control', 'id' => 'description3']) !!}
        </div><br>
    </div>
    <div>
        <div>
            {!! Form::label('text_4', 'متن شماره 4:') !!}
            <? echo htmlspecialchars($contentFromDB); ?>
            {!! Form::textarea('text_4', null, ['class' => 'form-control', 'id' => 'description4']) !!}
        </div><br>
    </div>


    {{-- path of photo --}}
    <div class="form-group row">
        <label for="path" class="col-md-1 col-form-label text-md-right">{{ __('عکس مقاله  ') }}</label>

        <div class="col-md-11">
            <input id="path" type="file" class="form-control" @error('path') is-invalid @enderror" name="path" value="{{ old('path') }}" required autocomplete="path" autofocus>

            @error('path')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    {{-- alt of photo --}}
    <div class="form-group row">
        <label for="alt" class="col-md-1 col-form-label text-md-right">{{ __('عکس alt') }}</label>

        <div class="col-md-11">
            <input id="path" type="text" class="form-control" @error('alt') is-invalid @enderror" name="alt" value="{{ old('alt') }}" required autocomplete="alt" autofocus>

            @error('alt')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    {{-- name of photo --}}
    <div class="form-group row">
        <label for="img_name" class="col-md-1 col-form-label text-md-right">{{ __('عکس name') }}</label>

        <div class="col-md-11">
            <input id="path" type="text" class="form-control" @error('img_name') is-invalid @enderror" name="img_name" value="{{ old('img_name') }}" required autocomplete="img_name" autofocus>

            @error('img_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <input type="hidden" value="{{$lang}}" name="lang">
    </input>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script type="text/javascript">
            $("document").ready(function () {
                $('select[name="category"]').on('change', function () {
                    var catId = $(this).val();
                    if (catId) {
                        $.ajax({
                            url: '/admin/services/' + catId,
                            type: "GET",
                            dataType: "json",
                            success: function (data) {
                                $('select[name="subcategory"]').empty();
                                $.each(data, function (key, value) {
                                    $('select[name="subcategory"]').append('<option value=" ' + key + '">' + value + '</option>');
                                })
                            }

                        })
                    } else {
                        $('select[name="subcategory"]').empty();
                    }
                });


            });
        </script>

<!-- <script>
$(document).ready(function () { 
            $('#category').on('change',function(e){
            console.log(e);
            var cat_id = e.target.value;
            //console.log(cat_id);
            //ajax
            $.get('/ajax-subcat?cat_id='+ cat_id,function(data){
                //success data
               //console.log(data);
                var subcat =  $('#subcategory').empty();
                $.each(data,function(create,subcatObj){
                    var option = $('<option/>', {id:create, value:subcatObj});
                    subcat.append('<option value ="'+subcatObj+'">'+subcatObj+'</option>');
                });
            });
        });
    });

</script> -->
<!--
$.ajax({
                url : url,
                type : "GET",
                success : function(response){
                    if(response.status){
                        if(response.checked)
                        element.prop('checked', true);
                        else
                        element.prop('checked', false);
                    }
                    else{
                        element.prop('checked', elementValue);
                    }
                }
            }) -->

@endsection
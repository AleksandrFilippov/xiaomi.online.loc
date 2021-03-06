@extends('layouts.admin')

@section('header')

    @include('admin.header')

@endsection

@section('content')

    <div class="wrapper container-fluid">
        {!! Form::open(['url' => route('admin.pages.update', $page->alias), 'class'=>'form-horizontal', 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}

        {{ method_field('put') }}

        <div class="form-group">
            {!! Form::label('name', 'Название:',['class'=>'col-xs-2 control-label']) !!}
            <div class="col-xs-8">
                {!! Form::text('name', $page->name, ['class' => 'form-control','placeholder'=>'Введите название страницы']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('alias', 'Псевдоним:',['class'=>'col-xs-2 control-label']) !!}
            <div class="col-xs-8">
                {!! Form::text('alias', $page->alias, ['class' => 'form-control','placeholder'=>'Введите псевдоним страницы']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('text', 'Текст:',['class'=>'col-xs-2 control-label']) !!}
            <div class="col-xs-8">
                {!! Form::textarea('text', $page->text, ['id'=>'editor','class' => 'form-control','placeholder'=>'Введите текст страницы']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('old_images', 'Изображение:',['class'=>'col-xs-2 control-label']) !!}
            <div class="col-xs-offset-2 col-xs-10">
                {!! Html::image($page->images,'',['class'=>'img-circle img-responsive','width'=>'150px']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('images', 'Изображение:',['class'=>'col-xs-2 control-label']) !!}
            <div class="col-xs-8">
                {!! Form::file('images', ['class' => 'filestyle','data-buttonText'=>'Выберите изображение','data-buttonName'=>"btn-primary",'data-placeholder'=>"Файла нет"]) !!}
            </div>
        </div>

        <div class="form-group">
            <div class="col-xs-offset-2 col-xs-10">
                {!! Form::button('Сохранить', ['class' => 'btn btn-primary','type'=>'submit']) !!}
            </div>
        </div>

        {!! Form::close() !!}

        <script>
            CKEDITOR.replace('editor');
        </script>
    </div>

@endsection
@extends('layouts.admin')

@section('header')
    @include('admin.header')
@endsection

@section('content')
    <div class="wrapper container-fluid">

        {!! Form::open(['url' => route('admin.products.update', $product->id),'class'=>'form-horizontal','method'=>'POST','enctype'=>'multipart/form-data']) !!}
        <div class="form-group">
            {!! Form::label('article', 'Артикул:',['class'=>'col-xs-2 control-label']) !!}
            <div class="col-xs-8">
                {!! Form::text('article', $product->article, ['class' => 'form-control','placeholder'=>'Введите артикул товара']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('name', 'Название:',['class'=>'col-xs-2 control-label']) !!}
            <div class="col-xs-8">
                {!! Form::text('name', $product->name, ['class' => 'form-control','placeholder'=>'Введите название товара']) !!}
            </div>
        </div>
        {!! Form::hidden('id', $product->id) !!}
        <div class="form-group">
            {!! Form::label('filter', 'Фильтр:',['class'=>'col-xs-2 control-label']) !!}
            <div class="col-xs-8">
                {!! Form::text('category_id', $product->category->name, ['class' => 'form-control','placeholder'=>'Введите псевдоним (фильтр) страницы']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('old_images', 'Изображение:',['class'=>'col-xs-2 control-label']) !!}
            <div class="col-xs-offset-2 col-xs-10">
                {!! Html::image($product->images,'',['class'=>'img-circle img-responsive','width'=>'100px']) !!}
                {!! Form::hidden('old_images', $product->images) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('images', 'Изображение:',['class'=>'col-xs-2 control-label']) !!}
            <div class="col-xs-8">
                {!! Form::file('images', ['class' => 'filestyle','data-buttonText'=>'Выберите изображение','data-buttonName'=>"btn-primary",'data-placeholder'=>"Файла нет"]) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('price', 'Цена:',['class'=>'col-xs-2 control-label']) !!}
            <div class="col-xs-8">
                {!! Form::text('price', $product->price, ['class' => 'form-control','placeholder'=>'Введите цену']) !!}
            </div>
        </div>

        <div class="form-group">
            <div class="col-xs-offset-2 col-xs-10">
                {!! Form::button('Сохранить', ['class' => 'btn btn-primary','type'=>'submit']) !!}
            </div>
        </div>

        {!! Form::close() !!}
    </div>
@endsection
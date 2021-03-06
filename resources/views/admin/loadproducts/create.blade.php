@extends('layouts.admin')

@section('header')
    @include('admin.header')
@endsection

@section('content')
    <div class="wrapper container-fluid">
        {!! Form::open(['url' => route('uploadFile'),'class'=>'form-horizontal','method'=>'POST', 'files' => true]) !!}
        <div class="form-group">
            {!! Form::label('images', 'Загрузка товара на сайт',['class'=>'col-xs-2 control-label']) !!}
            <div class="col-xs-8">
                {!! Form::file('images', ['class' => 'filestyle','data-buttonText'=>'Выберите прайс','data-buttonName'=>"btn-primary",'data-placeholder'=>"Файла нет"]) !!}
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-offset-2 col-xs-10">
                {!! Form::button('Загрузить', ['class' => 'btn btn-primary','type'=>'submit']) !!}
            </div>
        </div>
        {!! Form::close() !!}
        {{ Form::label('file', 'Excel/XLS:') }}
        {{ Form::file('file')}}
    </div>
@endsection
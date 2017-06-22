@extends('layouts.admin')

@section('header')
    @include('admin.header')
@endsection

@section('content')
    <div class="wrapper container-fluid">
        {!! Form::open(['url' => route('uploadfile'),'class'=>'form-horizontal','method'=>'POST']) !!}
        <div class="form-group">
            {!! Form::label('images', 'Файл должен иметь название Price.xls',['class'=>'col-xs-2 control-label']) !!}
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
    </div>
@endsection
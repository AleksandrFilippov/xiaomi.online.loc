@extends('layouts.admin')

@section('header')
    @include('admin.header')
@endsection

@section('content')
    <div style="margin:0px 50px 0px 50px;">
        <?php
        echo Form::open(array('url' => '/uploadfile', 'files' => 'true'));
        echo 'Выбери прайс для загрузки.';
        echo Form::file('image');
        echo Form::submit('Upload File');
        echo Form::close();
        ?>
    </div>
@endsection
@extends('layouts.admin')

@section('header')
    @include('admin.header')
@endsection

@section('content')
    <div style="margin:0px 50px 0px 50px;">
        {!! Html::link(route('admin.products.create'),'Добавить товар') !!}
        @if($products)
            <table class="table table-hover table-striped">
                <thead>
                <tr>
                    <th>№ п/п</th>
                    <th>Имя</th>
                    <th>Фильтр</th>
                    <th>Изображение</th>
                    <th>Цена</th>
                    <th>Дата создания</th>
                    <th>Удалить</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $k => $product)
                    <tr>
                        <td>{{$product->id}}</td>
                        <td>  {!! Html::link(route('admin.products.edit',['product'=>$product->id]),$product->name,['alt'=>$product->name]) !!}  </td>
                        <td>{{$product->filter}}</td>
                        <td>{!! Html::image('assets/img/'.$product->images,'', array('style' => 'width:150px' )) !!}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->created_at}}</td>
                        <td>
                            {!! Form::open(['url' => route('admin.products.edit',['product'=>$product->id]),'class'=>'form-horizontal','method'=>'POST']) !!}
                            {{ method_field('DELETE') }}
                            {!! Form::button('Удалить', ['class' => 'btn btn-danger','type'=>'submit']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
        {!! Html::link(route('admin.products.create'),'Добавить товар') !!}
    </div>
@endsection
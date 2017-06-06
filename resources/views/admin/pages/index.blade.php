@extends('layouts.admin')

@section('header')

    @include('admin.header')

@endsection

@section('content')
    <div style="margin:0px 50px 0px 50px;">

        @if($pages->isNotEmpty())

            <table class="table table-hover table-striped">
                <thead>
                <tr>
                    <th>№ п/п</th>
                    <th>Имя</th>
                    <th>Псевдоним</th>
                    <th>Дата создания</th>

                    <th>Удалить</th>
                </tr>
                </thead>
                <tbody>

                @foreach($pages as $k => $page)

                    <tr>

                        <td>{{ $page->id }}</td>
                        <td>{!! Html::link(route('admin.pages.edit',['page'=>$page->alias]),$page->name,['alt'=>$page->name]) !!}</td>
                        <td>{{ $page->alias }}</td>
                        <td>{{ $page->created_at }}</td>

                        <td>
                            {!! Form::open(['url'=>route('admin.pages.delete', $page->alias), 'class'=>'form-horizontal','method' => 'POST']) !!}

                            {{ method_field('DELETE') }}
                            {!! Form::button('Удалить',['class'=>'btn btn-danger','type'=>'submit']) !!}

                            {!! Form::close() !!}
                        </td>
                    </tr>

                @endforeach

                </tbody>
            </table>
        @endif

        {!! Html::link(route('pagesAdd'),'Новая страница') !!}
    </div>

@endsection
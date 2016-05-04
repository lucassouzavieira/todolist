@extends('layouts.master')
@section('title')
    TaskList
@endsection
@section('content')
    <div class="container-fluid" style="text-align: center">
        <h1 class="text-primary">Bem-vindo !</h1>
        {!! Form::open(array('url' => "task", 'method' => 'GET')) !!}
            {!! Form::button('<i class="glyphicon glyphicon-plus"></i> Entrar na aplicação', ['class'=>'btn btn-success', 'role'=>'button', 'type'=>'submmit']) !!}</a>
        {!! Form::close() !!}
    </div>
@endsection
@extends('layouts.master')
@section('title')
    TaskList
@endsection
@section('content')
    <div class="container-fluid" style="text-align: center">
        <h1 class="text-primary">Bem-vindo !</h1>
        {!! Form::open(array('url' => "task", 'method' => 'GET')) !!}
        <a class="btn btn-sucess"><i class="glyphicon glyphicon-plus"></i>{!! Form::submit('Entrar na aplicação', array('class'=>'btn-link')) !!}</a>
        {!! Form::close() !!}
    </div>
@endsection
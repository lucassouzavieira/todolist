@extends('layouts.master')
@section('title')
    TaskList
@endsection
@section('content')
    <div class="container-fluid" style="text-align: center">
        <h1 class="text-primary">Bem-vindo !</h1>
        {!! Form::open(array('url' => "task", 'method' => 'GET')) !!}
            {!! Form::submit('Entrar na aplicação', array('class'=>'btn-link')) !!}
        {!! Form::close() !!}
    </div>
@endsection
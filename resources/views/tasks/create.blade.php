@extends('layouts.master')
@section('title')
    Criar nova tarefa
@endsection
@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1> Criar nova tarefa </h1>
            {!! Form::open(array('url' => 'task', 'method' => 'POST')) !!}
            {!! Form::label('title', 'Tarefa') !!}
            {!! Form::text('title', null, array('class'=>'form-control')) !!}
            {!! Form::label('description', 'Descrição') !!}
            {!! Form::textarea('description', null, array('class'=>'form-control')) !!}
            {!! Form::label('status', 'Status') !!}
            {!! Form::select('status', array( 'A fazer' => 'A fazer', 'Fazendo' => 'Fazendo', 'Feita' => 'Feita' )) !!}
            <br>
            {!! Form::submit('Adicionar Tarefa', array('class'=>'btn btn-sucess btn-lg btn-block')) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection
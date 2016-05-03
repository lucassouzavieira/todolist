@extends('layouts.master')

@section('title')
    Excluir tarefa
@endsection

@section('content')
    <div class="container-fluid">
        <div class="col-md-8 col-md-offset-2">
            <h1> Editar tarefa </h1>
            {!! Form::open(array('url' => "task/{$task->id}", 'method' => 'DELETE')) !!}
            {!! Form::label('title', 'Tarefa') !!}
            {!! $task->title !!}
            {!! Form::label('description', 'Descrição') !!}
            {!! $task->description !!}
            {!! Form::label('status', 'Status') !!}
            {!! $task->status !!}
            <br>
            {!! Form::submit('Excluir Tarefa', array('class'=>'btn btn-sucess btn-lg btn-block')) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection
@extends('layouts.master')

@section('title')
    Editar tarefa
@endsection

@section('content')
    <div class="container-fluid">
        <div class="col-md-8 col-md-offset-2">
            <h1> Editar tarefa </h1>
            {!! Form::open(array('url' => "task/{$task->id}", 'method' => 'PUT')) !!}
            {!! Form::label('title', 'Tarefa') !!}
            {!! Form::text('title', $task->title, array('class'=>'form-control')) !!}
            {!! Form::label('description', 'Descrição') !!}
            {!! Form::textarea('description', $task->description, array('class'=>'form-control')) !!}
            {!! Form::label('status', 'Status') !!}
            {!! Form::select('status', array( 'A fazer' => 'A fazer', 'Fazendo' => 'Fazendo', 'Feita' => 'Feita' ), $task->status, array('class'=>'form-control')) !!}
            <br>
            {!! Form::button('<i class="glyphicon glyphicon-plus"></i> Salvar Tarefa', ['class'=>'btn btn-success','role'=>'button', 'type'=>'submit']) !!}</a>
            {!! Form::close() !!}
        </div>
    </div>
@endsection

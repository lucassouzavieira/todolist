@extends('layouts.master')

@section('title')
    Editar tarefa
@endsection

@section('content')
    <h1>Detalhes da Tarefa</h1>
    <div class="panel panel-default">
        <div class="panel-heading"><strong>ID</strong></div>
        <div class="panel-body">{!! $task->id !!}</div>
        <div class="panel-heading"><strong>Tarefa</strong></div>
        <div class="panel-body">{!! $task->title !!}</div>
        <div class="panel-heading"><strong>Descrição</strong></div>
        <div class="panel-body">{!! $task->description !!}</div>
        <div class="panel-heading"><strong>Status</strong></div>
        <div class="panel-body">{!! $task->status !!}</div>
        <div class="panel-heading"><strong>Criada em</strong></div>
        <div class="panel-body">{!! $task->created_at !!}</div>
        <div class="panel-heading"><strong>Atualizada em</strong></div>
        <div class="panel-body">{!! $task->updated_at !!}</div>
    </div>
@endsection
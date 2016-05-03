@extends('layouts.master')
@section('title')
    Lista de Tarefas
@endsection
@section('content')
    <table class="table">
        <thead>
            <tr>
                <th> Tarefa </th>
                <th> Descrição </th>
                <th> Status </th>
                <th> Opções </th>
            </tr>
        </thead>
        <tbody>
            @foreach($tasks as $task)
                <tr>
                    <td> {!! $task->title !!}</td>
                    <td> {!! $task->description !!}</td>
                    <td> {!! $task->status !!}</td>
                    <td> Editar | Excluir </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
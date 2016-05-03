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
                    <td>
                        {!! Form::open(array('url' => "task/{$task->id}", 'method' => 'GET')) !!}
                             {!! Form::submit($task->title, array('class'=>'btn-link')) !!}
                        {!! Form::close() !!}
                    </td>
                    <td> {!! $task->description !!}</td>
                    <td> {!! $task->status !!}</td>
                    <td>
                        <button class="btn-link" href="/task/{{$task->id}}/edit"> Editar  </button>
                        {!! Form::open(array('url' => "task/{$task->id}", 'method' => 'DELETE')) !!}
                            {!! Form::submit('Excluir', array('class'=>'btn-link')) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </tbody>
        <td><a class="btn-link" href="/task/create"> Adicionar nova tarefa</a></td>
    </table>
@endsection
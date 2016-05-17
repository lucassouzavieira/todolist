@extends('layouts.master')
@section('aditional')
    {!! HTML::style('src/css/sweetalert.css') !!}
@endsection
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
                    <td>
                        @if($task->status  == "Feita")
                            {!! Form::checkbox('status', 'Feita', true, ['class'=>'form-control']) !!}
                        @else
                            {!! Form::checkbox('status', 'Fazendo', false, ['class'=>'form-control']) !!}
                        @endif
                    </td>
                    <td>
                        <a class="btn btn-primary" href="/task/{{$task->id}}/edit"><i class="glyphicon glyphicon-pencil"> </i> Editar</a>
                        {!! Form::open(array('url' => "task/{$task->id}", 'method' => 'DELETE')) !!}
                            {!! Form::button('<i class="glyphicon glyphicon-remove"></i>Excluir', ['class'=>'btn btn-danger btn-excluir', 'role'=>'button','type'=>'submit']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </tbody>
        <td><a class="btn btn-success" href="/task/create"><i class="glyphicon glyphicon-plus"></i> Adicionar nova tarefa</a></td>
    </table>

     <script type="text/javascript">
        $('.btn-excluir').click(function excludeAlert(e){
            e.preventDefault();
            var btn = $(this); // Captura o botão que foi clicado
            swal({
                        title: "Exclusão de Tarefa",
                        text: "Você deseja realmente excluir a tarefa?",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: '#DD6B55',
                        confirmButtonText: 'Sim',
                        cancelButtonText: "Não",
                        closeOnConfirm: false,
                        closeOnCancel: true
                    },
                    function(isConfirm){
                        if (isConfirm){
                            // Continuar evento
                            btn.closest('form').trigger("submit");
                        }
                    })
        });
    </script>
@endsection
@section('scripts')
    {{ HTML::script('src/js/sweetalert.min.js') }}
@endsection

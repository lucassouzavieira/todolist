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
                            {!! Form::checkbox('status', $task->id, true, ['class'=>'form-control done'])!!}
                        @else
                            {!! Form::checkbox('status', $task->id, false, ['class'=>'form-control done']) !!}
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
                    });
        });
/*
        $('.done').click(function clicked(e) {
            console.log('Teste');
            var id = $(this).val(); // Pega a id da task
            var url = "/task/updt/" + id.toString();
            console.log(url);
            $.post( url );
            //location.reload();
        }); */

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

         $(".done").click(function update(){
            var url = "/task/updt/" + $(this).val();
             $.ajax({
                 url: url,
                 type: "POST",
                 data: {},
                 success: function () {
                     console.log('Sucesso');
                 },
                 error: function () {
                     console.log('Erro');
                 }
             });
             location.reload();
         });

    </script>
@endsection
@section('scripts')
    {{ HTML::script('src/js/sweetalert.min.js') }}
@endsection

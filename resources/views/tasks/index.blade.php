@extends('layouts.master')
@section('aditional')
    {!! HTML::style('src/css/sweetalert.css') !!}
    {!! HTML::style('src/css/indexStyle.css') !!}
@endsection
@section('title')
    Lista de Tarefas
@endsection
@section('aditional-navbar')
    {!! Form::open(['method'=>'GET','url'=>'/task/search','class'=>'navbar-form navbar-right','role'=>'search'])  !!}
    <div class="input-group custom-search-form">
        <input type="text" class="form-control" name="busca" placeholder="Buscar Tarefa">
    <span class="input-group-btn">
        <button class="btn btn-default-sm" type="submit">
            <i class="glyphicon glyphicon-search"><!--<span class="hiddenGrammarError" pre="" data-mce-bogus="1"--> </i>
        </button>
    </span>
    </div>
    {!! Form::close() !!}
@endsection
@section('content')
    <table class="table">
        <thead>
        <tr>
            <th><button role="button" class="btn btn-link btn-ordena">Tarefa</button></th>
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
    {!! $tasks->links() !!}
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

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(".done").click(function update(){
            var url = "/task/update/" + $(this).val();
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
            //location.reload();
        });

        $(".btn-ordena").click(function updateparameter() {
            var url = window.location.href;
            var parametro = 'asc';
            if(url.indexOf('?order=') > 0){
                if(url.match(/asc/)){
                    parametro = 'desc';
                } else {
                    parametro = 'asc';
                }
                url = url.replace(url.substring(url.indexOf('?order='), url.length), '');
                url = url + '?order=' + parametro;

            } else if(url.indexOf('&order=') > 0){
                if(url.match(/asc/)){
                    parametro = 'desc';
                } else {
                    parametro = 'asc';
                }
                url = url.replace(url.substring(url.indexOf('&order='), url.length), '');
                url = url + '&order=' + parametro;
            } else {
                if(url.match(/\?[a-zA-Z]+/)){
                    url = url + '&order=' + parametro;
                } else{
                    url = url + '?order=' + parametro;
                }
            }
            $(window.location).attr('href', url);
        });

        $('.pagination li a').click(function updateurl(e){
            e.preventDefault();
            var url = window.location.href;
            var elementUrl = $(this).attr('href');
            elementUrl = elementUrl.replace(elementUrl.substring(0, elementUrl.indexOf('page')), '');
            if(url.indexOf('?') > 0){
                if(url.match(/page=[0-9]+/)){
                    url.replace(/page=[0-9]+/, elementUrl);
                }
                url = url + '&' + elementUrl;
            } else {
                url = url + '?' + elementUrl;
            }
            $(window.location).attr('href', url);
        });
    </script>
@endsection
@section('scripts')
    {{ HTML::script('src/js/sweetalert.min.js') }}
@endsection

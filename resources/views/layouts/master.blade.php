<!DOCTYPE html>
<html lang="pt">
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=devic-width, initial-scale=1">
    {{ HTML::style('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css') }}
    {{ HTML::script('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js') }}
    {{ HTML::script('https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js') }}
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/task">TaskList</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="task/create">Nova Tarefa</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right"></ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav><div class="container">
    @yield('content')
</div>
<footer class="footer" style="text-align: justify">
    <br><br>
    <div class="container">
        <address class="text-muted">Rua Caxias, S/N. Cidade Operária - São Luís - Maranhão</address>
        <p class="text-muted">Developed by Lucas Souza</p>
    </div>
</footer>
</body>
</html>
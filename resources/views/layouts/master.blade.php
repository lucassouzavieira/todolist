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
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">TaskList</a>
        </div>
        <ul class="nav navbar-nav">

        </ul>
    </div>
</nav>
<div class="container">
    @yield('content')
</div>
<footer class="modal-footer">
    <address>Rua Caxias, S/N. Cidade Operária - São Luís - Maranhão</address>
    <p>Developed by Lucas Souza</p>
</footer>
</body>
</html>
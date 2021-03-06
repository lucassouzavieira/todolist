<!DOCTYPE html>
<html lang="pt">
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content={{ csrf_token() }}>
    {{ HTML::style('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css') }}
    {{ HTML::script('https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js') }}
    @yield('aditional')
</head>
<body>
<nav class="navbar navbar-default">
    @yield('aditional-navbar')
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
{{ HTML::script('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js') }}
@section('scripts')
@show
</body>
</html>

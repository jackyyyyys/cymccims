<html lang="en">
<title>
    CYMCCIMS
</title>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=ZCOOL+QingKe+HuangYou" >
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Jacky Sin 2019">
    <meta name="generator" content="Jekyll v3.8.5">
	<meta http-equiv="refresh" content="3">
<style>
    html { overflow-x: hidden; }
</style>
</head>

<body>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <a class="navbar-brand" href="{{ route('zones.index') }}">CYMCCIMS</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse show" id="navbarsExample04">
        <ul class="navbar-nav mr-auto">


            <li class="nav-item
            @if ($_SERVER['REQUEST_URI'] == "/zones")
                active
            @endif
             ">
                <a class="nav-link" href="{{ route('zones.index') }}">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item
            @if ($_SERVER['REQUEST_URI'] == "/items")
                active
            @endif
             ">
                <a class="nav-link" href="{{ route('items.index') }}">Items <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item
            @if ($_SERVER['REQUEST_URI'] == "/registers")
                active
            @endif
             ">
                    <a class="nav-link" href="{{ route('registers.index') }}">Activity Log <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item
            @if ($_SERVER['REQUEST_URI'] == "/rules")
                active
            @endif
             ">
                <a class="nav-link" href="{{ route('rules.index') }}">Rules <span class="sr-only">(current)</span></a>
            </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li class="nav-item nav-right
            @if ($_SERVER['REQUEST_URI'] == "/ack")
                active
            @else
                disabled
            @endif
             ">
                <a class="nav-link" href="{{ route('ack') }}">Acknowledgements</a>
            </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li class="nav-item nav-right">
                <a class="nav-link" href="{{ route('simulator') }}" target="_blank">Simulator</a>
            </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li class="nav-item nav-right
            @if ($_SERVER['REQUEST_URI'] == "/admin")
                active
            @endif
             ">
                <a class="nav-link" href="{{ route('admin') }}">ADMIN</a>
            </li>
        </ul>
        </div>
    </nav>

<div class="container" style="height: 20px"> </div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>

@yield('content')

@yield('js')

</body>

</html>

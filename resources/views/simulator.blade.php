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
<style>
    html { overflow-x: hidden; }
</style>
<body>

<div class="container" style="height: 20px"> </div>

<div class="container">
    <p class="text-muted">
        {{ $message }}
    </p>
</div>

<div class="container">
    <h1>CYMCCIMS - RFID Reader Simulator</h1>
</div>

<div class="container">
    <p class="text-muted">
        Select an item and a reader to simulate a phycisal action of interaction
        <br>
        between RFID tag and RFID reader by clicking <strong>'Register'</strong> button
    </p>
</div>

<div class="container">

    {!! Form::open(array(
        'route' => 'apicall',
        'method' => 'POST',
        'class' => 'form'
    )) !!}

    <div class="row">

        <div class="col-md-4">
            <div class="form-group">
                {!! Form::label('Choose Item') !!}
                {!! Form::select('item', $items_select, null, array(
                    'class' => 'form-control'
                )) !!}
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                {!! Form::label('Choose RFID Reader') !!}
                {!! Form::select('reader', $readers_select, null, array(
                    'class' => 'form-control'
                )) !!}
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group" style="padding-top: 15px">
                {!! Form::submit('Register', array(
                    'class' => 'a h2'
                )) !!}
            </div>
        </div>

    </div>

    {!! Form::close() !!}

    <div class="row">

        <div class="col-md-6">
            <table class="table table-sm table-striped table-bordered">
                <thead>
                    <th>
                        RFID Tag
                    </th>
                    <th>
                        Item
                    </th>
                </thead>
                <tbody>
                @foreach($items as $item)
                    <tr>
                        <td>
                            {{ $item->rfidTags->first()->name }}
                        </td>
                        <td>
                            {{ $item->description }}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="col-md-6">
            <table class="table table-sm table-striped table-bordered">
                <thead>
                    <th>
                        RFID Reader ID
                    </th>
                    <th>
                        RFID Reader Name
                    </th>
                </thead>
                <tbody>
                @foreach($readers as $readers)
                    <tr>
                        <td>
                            {{ $readers->id }}
                        </td>
                        <td>
                            {{ $readers->name }}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>

    <p class="text-muted">
        Open <a href="{{ route('zones.index') }}" target="_blank">Control Panel</a>
    </p>



<div class="container" style="height: 20px"> </div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>

</body>
</head>

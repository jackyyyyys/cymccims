@include('app')

@section('content')

<div class="container">

    {!! Form::model($rfidReader, array(
        'route'=>array(
            'rfidReaders.update',
            $rfidReader->id
        ),
            'method'=>'PUT',
            'class'=>'form'
    )) !!}

    <h2>Upate RFID Reader: {{ $rfidReader->name }}</h2>

        <div class="form-group">
            {!! Form::label("RFID Reader Name") !!}
            {!! Form::text('name', null, array(
                'required',
                'class'=>'form-control',
                'placeholder'=>'RFID Reader Name'
            )) !!}
        </div>


        <div class="form-group">
            {!! Form::label("RFID Reader Located Zone") !!}
            {!! Form::select('zone_id', $zones, $rfidReader->zone_id, array(
                'class'=>'form-control'
            )) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Update RFID', array(
                'class'=>'btn btn-primary'
            )) !!}
        </div>

    {!! Form::close() !!}

</div>

@include('app')

@section('content')

<div class="container">

    <h3>New RFID Reader</h3>

    {!! Form::open(array(
        'route' => 'rfidReaders.store',
        'class' => 'form'
    )) !!}

        <div class="form-group">
            {!! Form::label("Name") !!}
            {!! Form::text('name', null, array(
                'required',
                'class'=>'form-control',
                'placeholder'=>'Name'
            )) !!}
        </div>

        <div class="form-group">
            {!! Form::label("RFID in Zone") !!}
            {!! Form::select('zone_id', $zones, null, array(
                'class'=>'form-control'
            )) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Add New RFID Reader', array(
                'class'=>'btn btn-primary'
            )) !!}
        </div>

</div>

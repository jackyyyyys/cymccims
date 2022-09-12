@include('app')

@section('content')

<div class="container">

    {!! Form::model($theatre, array(
        'route'=>array(
            'theatres.update',
            $theatre->id
        ),
            'method'=>'PUT',
            'class'=>'form'
    )) !!}

    <h2>Upate theatre: {{ $theatre->name }}</h2>

        <div class="form-group">
            {!! Form::label("theatre Code") !!}
            {!! Form::text('name', null, array(
                'required',
                'class'=>'form-control',
                'placeholder'=>'theatre code'
            )) !!}
        </div>

        <div class="form-group">
                {!! Form::label("theatre Name") !!}
                {!! Form::text('description', null, array(
                    'required',
                    'class'=>'form-control',
                    'placeholder'=>'theatre name'
                )) !!}
            </div>

        <div class="form-group">
            {!! Form::submit('Update theatre', array(
                'class'=>'btn btn-primary'
            )) !!}
        </div>

    {!! Form::close() !!}

</div>

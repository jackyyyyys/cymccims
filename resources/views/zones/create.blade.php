@include('app')

@section('content')

<div class="container">

    <h1>New Zone</h1>

    {!! Form::open(array(
        'route' => 'zones.store',
        'class' => 'form'
    )) !!}

        <div class="form-group">
            {!! Form::label("Zone Name") !!}
            {!! Form::text('name', null, array(
                'required',
                'class'=>'form-control',
                'placeholder'=>'name'
            )) !!}
        </div>

        <div class="form-group">
            {!! Form::label("Zone Description") !!}
            {!! Form::text('description', null, array(
                'required',
                'class'=>'form-control',
                'placeholder'=>'description'
            )) !!}
        </div>

        <div class="form-group">
            {!! Form::label("Theatre") !!}
            {!! Form::select('theatre_id', $theatres, null, array(
                'class'=>'form-control'
            )) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Add New Zone', array(
                'class'=>'btn btn-primary'
            )) !!}
        </div>

</div>

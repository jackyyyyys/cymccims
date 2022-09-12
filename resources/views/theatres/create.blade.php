@include('app')

@section('content')

<div class="container">

    <h2>New Theatre</h2>

    {!! Form::open(array(
        'route' => 'theatres.store',
        'class' => 'form'
    )) !!}

        <div class="form-group">
            {!! Form::label("Theatre Code") !!}
            {!! Form::text('name', null, array(
                'required',
                'class'=>'form-control',
                'placeholder'=>'code'
            )) !!}
        </div>

        <div class="form-group">
            {!! Form::label("Theatre Name") !!}
            {!! Form::text('description', null, array(
                'required',
                'class'=>'form-control',
                'placeholder'=>'name'
            )) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Add New Theatre', array(
                'class'=>'btn btn-primary'
            )) !!}
        </div>

</div>

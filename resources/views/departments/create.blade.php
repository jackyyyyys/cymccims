@include('app')

@section('content')

<div class="container">

    <h1>New Department</h1>

    {!! Form::open(array(
        'route' => 'departments.store',
        'class' => 'form'
    )) !!}

        <div class="form-group">
            {!! Form::label("Department Code") !!}
            {!! Form::text('name', null, array(
                'required',
                'class'=>'form-control',
                'placeholder'=>'code'
            )) !!}
        </div>

        <div class="form-group">
            {!! Form::label("Department Name") !!}
            {!! Form::text('description', null, array(
                'required',
                'class'=>'form-control',
                'placeholder'=>'name'
            )) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Add New Departmentr', array(
                'class'=>'btn btn-primary'
            )) !!}
        </div>

</div>

@include('app')

@section('content')

<div class="container">

    {!! Form::model($department, array(
        'route'=>array(
            'departments.update',
            $department->id
        ),
            'method'=>'PUT',
            'class'=>'form'
    )) !!}

    <h2>Upate Department: {{ $department->name }} | {{ $department->description }}</h2>

        <div class="form-group">
            {!! Form::label("Department Code") !!}
            {!! Form::text('name', null, array(
                'required',
                'class'=>'form-control',
                'placeholder'=>'Department Code'
            )) !!}
        </div>

        <div class="form-group">
            {!! Form::label("Department Name") !!}
            {!! Form::textarea('description', null, array(
                'required',
                'class'=>'form-control',
                'placeholder'=>'Department Name'
            )) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Update Department', array(
                'class'=>'btn btn-primary'
            )) !!}
        </div>

    {!! Form::close() !!}

</div>

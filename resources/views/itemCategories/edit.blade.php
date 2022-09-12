@include('app')

@section('content')

<div class="container">

    {!! Form::model($category, array(
        'route'=>array(
            'itemCategories.update',
            $category->id
        ),
            'method'=>'PUT',
            'class'=>'form'
    )) !!}

    <h2>Upate Item Category: {{ $category->name }} | {{ $category->description }}</h2>

        <div class="form-group">
            {!! Form::label("Item Category Code") !!}
            {!! Form::text('name', null, array(
                'required',
                'class'=>'form-control',
                'placeholder'=>'Item Category Code'
            )) !!}
        </div>

        <div class="form-group">
            {!! Form::label("Item Category Name") !!}
            {!! Form::text('description', null, array(
                'required',
                'class'=>'form-control',
                'placeholder'=>'Item Category Name'
            )) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Update Item Category', array(
                'class'=>'btn btn-primary'
            )) !!}
        </div>

    {!! Form::close() !!}

</div>

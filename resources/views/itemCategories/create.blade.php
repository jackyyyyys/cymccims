@include('app')

@section('content')

<div class="container">

    <h3>New Item Category</h3>

    {!! Form::open(array(
        'route' => 'itemCategories.store',
        'class' => 'form'
    )) !!}

        <div class="form-group">
            {!! Form::label("Item Category Code") !!}
            {!! Form::text('name', null, array(
                'required',
                'class'=>'form-control',
                'placeholder'=>'code'
            )) !!}
        </div>

        <div class="form-group">
            {!! Form::label("Item Category Name") !!}
            {!! Form::text('description', null, array(
                'required',
                'class'=>'form-control',
                'placeholder'=>'name'
            )) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Add New Item Categoryr', array(
                'class'=>'btn btn-primary'
            )) !!}
        </div>

</div>

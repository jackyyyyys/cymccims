@include('app')

@section('content')

<div class="container">

    <h1>New Rule</h1>

    {!! Form::open(array(
        'route' => 'rules.store',
        'class' => 'form'
    )) !!}

        <div class="form-group">
            {!! Form::label("Item") !!}
            {!! Form::select('item_id', $items, null, array(
                'class'=>'form-control'
            )) !!}
        </div>

        <p>is NOT ALLOWED in</p>

        <div class="form-group">
            {!! Form::label("in Zone") !!}
            {!! Form::select('zone_id', $zones, null, array(
                'class'=>'form-control'
            )) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Add New Rule', array(
                'class'=>'btn btn-primary'
            )) !!}
        </div>

</div>

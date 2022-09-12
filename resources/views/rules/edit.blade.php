@include('app')

@section('content')

<div class="container">

    {!! Form::model($rule, array(
        'route'=>array(
            'rules.update',
            $rule->id
        ),
            'method'=>'PUT',
            'class'=>'form'
    )) !!}

    <h2>Upate rule</h2>

        <div class="form-group">
            {!! Form::label("Item") !!}
            {!! Form::select('item_id', $items, $rule->item_id, array(
                'class'=>'form-control'
            )) !!}
        </div>

        <p>is NOT ALLOWED in</p>

        <div class="form-group">
            {!! Form::label("in Zone") !!}
            {!! Form::select('zone_id', $zones, $rule->zone_id, array(
                'class'=>'form-control'
            )) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Update rule', array(
                'class'=>'btn btn-primary'
            )) !!}
        </div>

    {!! Form::close() !!}

</div>

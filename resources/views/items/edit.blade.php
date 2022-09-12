@extends('app')
@section('content')

<div class="container">

    {!! Form::model($item, array(
        'route' => array(
            'items.update',
            $item->id
        ),
        'method' => 'PUT',
        'class' => 'form'
    )) !!}

    <div class="form-group">
        {!! Form::label('Item Code') !!}
        {!! Form::text('name', $item->name, array(
            'required',
            'class' => 'form-control',
            'placeholder' => 'Item Code'
        )) !!}
    </div>

    <div class="form-group">
        {!! Form::label('Item Name') !!}
        {!! Form::text('description', $item->description, array(
            'required',
            'class' => 'form-control',
            'placeholder' => 'Item Name'
        )) !!}
    </div>

    <div class="form-group">
        {!! Form::label('Item Associated RFID Tag EPC') !!}
        {!! Form::text('rfid_tag_name', $tag->name, array(
            'required',
            'class' => 'form-control',
            'placeholder' => 'RFID Tag'
        )) !!}
    </div>

    <div class="form-group">
        {!! Form::label('Item Brand') !!}
        {!! Form::text('brand', null, array(
            'class' => 'form-control',
            'placeholder' => 'Item Brand'
        )) !!}
    </div>

    <div class="form-group">
        {!! Form::label('Item Model') !!}
        {!! Form::text('model', null, array(
            'class' => 'form-control',
            'placeholder' => 'Item Model'
        )) !!}
    </div>

    <div class="form-group">
        {!! Form::label('Item Category') !!}
        {!! Form::select('category_id', $categories, $item->category_id, array(
            'class' => 'form-control'
        )) !!}
    </div>

    <div class="form-group">
        {!! Form::label('Item Owner Department') !!}
        {!! Form::select('department_id', $departments, $item->deparment_id, array(
            'class' => 'form-control'
        )) !!}
    </div>

    <div class="form-group">
        {!! Form::label('Item Storage Zone') !!}
        {!! Form::select('store_zone_id', $longName, $item->zone_id, array(
            'class' => 'form-control'
        )) !!}
    </div>

    <div class="conatiner">

        <h3>Rules </h3>

        <table class="table">

            <thead>
                <th colspan="2">Check if the item is not allowed in the zone</th>
            </thead>
            <tbody>
                @foreach($zones as $zone)
                <tr>
                    <td>
                        @if ($zone->theatre)
                            {{ $longName[$zone->id] }}
                        @else
                            {{ $longName[$zone->id] }}
                        @endif
                    </td>
                    <td>
                        <div class="form-group">
                            @if ( in_array($zone->id, $current_rule, TRUE) )
                            {!! Form::checkbox('zone[]', $zone->id, true) !!}
                            @else
                            {!! Form::checkbox('zone[]', $zone->id, false) !!}
                            @endif
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>

    </div>

    <div class="form-group">
        {!! Form::submit('Update Item', array(
            'class' => 'btn btn-parimary'
        )) !!}
    </div>
</div>

@endsection

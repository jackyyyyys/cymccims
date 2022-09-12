@extends('app')
@section('content')

<div class="container">
    <h3>New Item</h3>
</div>

<div class="container">

    {!! Form::open(array(
        'route' => 'items.store',
        'class' => 'form'
    )) !!}

    <div class="form-group">
        {!! Form::label('Item Code') !!}
        {!! Form::text('name', null, array(
            'required',
            'class' => 'form-control',
            'placeholder' => 'Item Code'
        )) !!}
    </div>

    <div class="form-group">
        {!! Form::label('Item Name') !!}
        {!! Form::text('description', null, array(
            'required',
            'class' => 'form-control',
            'placeholder' => 'Item Name'
        )) !!}
    </div>

    <div class="form-group">
        {!! Form::label('Item Associated RFID Tag EPC') !!}
        {!! Form::text('rfid_tag_name', null, array(
            'required',
            'class' => 'form-control',
            'placeholder' => 'RFID Tag EPC'
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
        {!! Form::select('category_id', $categories, null, array(
            'class' => 'form-control'
        )) !!}
    </div>

    <div class="form-group">
        {!! Form::label('Item Owner Department') !!}
        {!! Form::select('department_id', $departments, null, array(
            'class' => 'form-control'
        )) !!}
    </div>

    <div class="form-group">
        {!! Form::label('Item Storage Zone') !!}
        {!! Form::select('store_zone_id', $longName, null, array(
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
                            {!! Form::checkbox('zone[]', $zone->id) !!}
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>

    </div>

    <div class="form-group">
        {!! Form::submit('Create Item', array(
            'class' => 'a'
        )) !!}
    </div>

    {!! Form::close() !!}
</div>

@endsection

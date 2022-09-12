@extends('app')
@section('content')

@if ($unchanged == TRUE)
    <div class="container">
        <h2 style="color: orange">Invalid RFID tag, item unchanged</h2>
    </div>
@endif

<div class="container">
    <h2>
        {{ $item->name }}
    </h2>
    <p>
        Name: {{ $item->description }}
    </p>
    <p>
        Associated RFID Tag: {{ $tag->name }}
    </p>
    <p>
        Brand: {{ $item->brand }}
    </p>
    <p>
        Model: {{ $item->model }}
    </p>
    <p>
        Category: {{ $item->category->description }}
    </p>
    <p>
        Belongs to Department: {{ $item->department->description }}
    </p>
    <p>
        Storage Location: {{ $item->store_zone->description }}
        @if ($item->store_zone->theatre)
            in {{ $item->store_zone->theatre->description }}
        @endif
    </p>
    <p>
        Latest Location: {{ $item->latest_zone->description }}
        @if ($item->latest_zone->theatre)
            in {{ $item->latest_zone->theatre->description }}
        @endif
    </p>
</div>

<div class="container">
        <div class="row">
                <div class="col-6">
                    <!-- Rules -->
                    <div class="container">
                        <h3>
                            Rules
                        </h3>

                        <div class="container d-lg-block">
                            <table class="table table-sm">

                                <!-- Table for RULE -->
                                @foreach ($rules as $rule)
                                @if ($rule->item_id == $item->id)
                                    <tr>
                                        @if ($violations[$rule->id] == true)

                                            <td style="color: red">
                                                <p style="margin: 0">NOT ALLOWED IN</p>
                                            </td>
                                            <td style="color: red">
                                                <!-- ZONE NAME -->
                                                {{ $rule->zone->name }}
                                            </td>

                                        @else

                                            <td style="color: green">
                                                <p style="margin: 0">NOT ALLOWED IN</p>
                                            </td>
                                            <td style="color: green">
                                                <!-- ZONE NAME -->
                                                {{ $rule->zone->name }}
                                            </td>

                                        @endif
                                    </tr>
                                @endif
                                @endforeach
                                <!-- Table for RULE -->
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <!-- Log -->
                    <div class="container">
                        <h3>
                            Activity Log
                        </h3>

                        <div class="container">
                            <table class="table table-sm">

                                @foreach ($registers as $register)
                                <tr>
                                    <td>
                                        {{ $register->created_at }}
                                    </td>
                                    <td>
                                        {{ $register->rfidReader->zone->description }}
                                    </td>
                                </tr>
                                @endforeach
                            </table>

                        </div>
                    </div>
                </div>
            </div>

</div>


<div class="container">
    <div class="row">
        <h2 style="margin: 5px">
            {!! Html::linkRoute('items.edit', 'Edit', $item->id, array(
                'class' => 'btn btn-primary'
            )) !!}
        </h2>
        <h2 style="margin: 5px">
            {!! Form::open(array(
                'route' => array(
                    'items.destroy',
                    $item->id),
                'method' => 'delete'
            )) !!}
            {!! Form::submit('Delete', array(
                'class' => 'btn btn-primary'
            )) !!}
            {!! Form::close() !!}
        </h2>
    </div>
</div>

@endsection

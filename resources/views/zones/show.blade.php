@include('app')

@section('content')

<div class="container">

    <h2>Zone: {{ $zone->name }} </h2>

    @if ($zone->theatre)
        <h3>{{ $zone->description }} in {{ $zone->theatre->description }}</h3>
    @endif

    <div>
        <p>Zone Description {{ $zone->description }}</p>
        <p>Created: {{$zone->created_at }}</p>
        <p>Updated: {{$zone->updated_at }}</p>
    </div>

    <div class="section">

        @if ($readers)
        <table class="table">

            <thead>
                <th>RFID readers</th>
            </thead>
            <tbody>

                @foreach ($readers as $reader)
                <tr>
                    <td>{{ $reader->name }}</td>
                </tr>
                @endforeach

            </tbody>

        </table>
        @endif

    </div>

    <div class="section">

        @if ($items)
        <table class="table">

            <thead>
                <th>#</th>
                <th>Item</th>
                <th>Current Location</th>
            </thead>
            <tbody>

                @foreach ($items as $item)
                <tr>

                    <td>{{ $item->name }}</td>
                    <td>{{ $item->description }}</td>
                    <td>{{ $item->latest_zone->description }} | {{$item->latest_zone->theatre->description }}</td>

                </tr>
                @endforeach

            </tbody>

        </table>
        @endif

    </div>

    <div class="section">

        @if ($rules)
        <table class="table">

            <thead>
                <th>Unexpected Entry</th>
            </thead>

            <tbody>

                @foreach($rules as $rule)
                <tr>

                    <td>{{ $rule->item->name }} | {{ $rule->item->description }}</td>
                </tr>
                @endforeach

            </tbody>
        </table>
        @endif

    </div>


</div>

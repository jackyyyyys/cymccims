@include('app')
@section('content')

<div class="container">
    <h3>CYMCCIMS - Control Panel</h1>
</div>

<div class="container">

    <div class="row">
    @foreach ($zones as $zone)

        <div class="col-md-3" style="margin-bottom: 10px">

            @if ($zone->theatre_id == 2)
                <div class="card border-primary" style="width: 100%;">
            @elseif ($zone->theatre_id == 1)
                <div class="card border-info" style="width: 100%;">
            @else
                <div class="card border-success" style="width: 100%;">
            @endif

                <div class="card-header">
                <h5 class="card-title"> {{ $zone->name }} </h5>
                </div>
                <ul class="list-group list-group-flush">
                @foreach ($items as $item)

                    @if ($item->latest_zone_id == $zone->id)

                        <li class="list-group-item"
                            @if ($item['violated'] == TRUE)
                                style="color: red"
                            @endif
                        >
                            {{ $item->name }}
                            <span class="badge badge-primary" style="margin-left: 10px">
                                @if ($now->diffInMinutes($item->updated_at)<60)
                                    {{ $now->diffInMinutes($item->updated_at) }}
                                @else
                                    > 60
                                @endif
                            </span>
                        </li>

                    @endif
								
                @endforeach
                </ul>

            </div>
        </div>
					
				@if ($loop->iteration %4 == 0)

					</div>
					<div class="row">

				@endif

    @endforeach
    </div>
</div>

<div class="container">

    <h3>10 Recent Activites</h3>

</div>

<div class="container">

    <table class="table table-sm">

        <thead>
            <th>Item</th>
            <th>registered at</th>
            <th>Zone</th>
            <th>Timestamp</th>
        </thead>

        <tbody>
        @foreach ($registers as $register)

            <tr>
                <td>
                    <!-- ITEM NAME -->
                    {{ $register->rfidTag->item->name }} | {{ $register->rfidTag->name }}
                </td>
                <td>
                    registered at
                </td>
                <td>
                    <!-- ZONE NAME -->
                    {{ $register->rfidReader->zone->name }}
                </td>
                <td>
                    <!-- TIMESTAMP -->
                    {{ $register->created_at }}
                </td>
            </tr>


        @endforeach
        </tbody>

    </table>
</div>

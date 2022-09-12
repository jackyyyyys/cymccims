@include('app')

@section('content')

<div class="container">
    <h3>Activity Log</h3>
</div>

<div class="container">

    <table class="table table-sm">

        <thead>

            <th colspan="2">Item</th>
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
                <td class="text-muted">
                    @
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

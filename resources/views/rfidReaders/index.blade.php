@section('content')

<div class="container">

    <h3>RFID Readers</h3>

</div>

<div class="container">

    <table class="table table-sm">

        <thead>

            <th>Name</th>
            <th>Located Zone</th>
            <th>Actions</th>

        </thead>

        <tbody>

            @foreach ($rfidReaders as $rfidReader)
            <tr>
                <td>
                    <!-- name -->
                    {!! Html::linkRoute('rfidReaders.show', $rfidReader->name, $rfidReader->id) !!}
                </td>
                <td>
                    <!-- LOCATED ZONE -->
                    {{ $rfidReader->zone->name }}
                </td>
                <td>
                    <a href="{{ route('rfidReaders.edit', with($rfidReader->id)) }}">Edit</a>
                </td>

            </tr>
            @endforeach

        </tbody>

    </table>
</div>

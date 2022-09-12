@section('content')

<div class="container">
    <h3>RFID Tags</h3>
</div>

<div class="container">

    <table class="table table-sm">

        <thead>

            <th>id</th>
            <th>UUID</th>
            <th>Linked Item</th>

        </thead>

        <tbody>

            @foreach ($tags as $tag)
            @if ($tag->item)
            <tr>

                <td>
                    {{ $tag->id }}
                </td>
                <td>
                    <!-- UUID -->
                    {{ $tag->name }}
                </td>
                <td>
                    <!-- RELATED ITEM -->
                    {{ $tag->item->description }}
                </td>

            </tr>
            @endif
            @endforeach

        </tbody>

    </table>
</div>

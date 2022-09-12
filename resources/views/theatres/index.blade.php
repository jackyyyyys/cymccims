@section('content')

<div class="container">

    <h3>Theatres</h3>

</div>

<div class="container">

    <table class="table table-sm">

        <thead>

            <th>Theatre</th>
            <th>Actions</th>

        </thead>

        <tbody>

            @foreach ($theatres as $theatre)
            <tr>
                <td>
                    <!-- UUID -->
                    {{ $theatre->name }} | {{ $theatre->description }}
                </td>
                <td>
                    <a href="{{ route('theatres.edit', with($theatre->id)) }}">Edit</a>
                </td>

            </tr>
            @endforeach

        </tbody>

    </table>
</div>

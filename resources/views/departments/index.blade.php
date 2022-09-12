@section('content')

<div class="container">

    <h3>Departments</h3>

</div>

<div class="container">

    <table class="table table-sm">

        <thead>

            <th>Department</th>
            <th>Actions</th>

        </thead>

        <tbody>

            @foreach ($departments as $department)
            <tr>
                <td>
                    <!-- UUID -->
                    {{ $department->name }} | {{ $department->description }}
                </td>
                <td>
                    <a href="{{ route('departments.edit', with($department->id)) }}">Edit</a>
                </td>

            </tr>
            @endforeach

        </tbody>

    </table>
</div>


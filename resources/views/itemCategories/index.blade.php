@section('content')

<div class="container">

    <h3>Item Categories</h3>

</div>

<div class="container">

    <table class="table table-sm">

        <thead>

            <th>Item Category</th>
            <th>Actions</th>

        </thead>

        <tbody>

            @foreach ($categories as $category)
            <tr>
                <td>
                    <!-- UUID -->
                    {{ $category->name }} | {{ $category->description }}
                </td>
                <td>
                    <a href="{{ route('itemCategories.edit', with($category->id)) }}">Edit</a>
                </td>

            </tr>
            @endforeach

        </tbody>

    </table>
</div>

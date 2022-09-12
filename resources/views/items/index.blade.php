@extends('app')
@section('content')

<div class="container">
    <h3>Items</h3>
</div>

<div class="container">
    <div class="row">

        @foreach ($items as $item)
        <div class="col-md-4 ">

            <div class="border-info row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">

                <div class="col-sm p-4 d-flex flex-column position-static">
                    <strong class="d-inline-block mb-2 text-primary">
                        {!! Html::linkRoute('items.show', ('id: '. $item->id . ' | ' . $item->name), $item->id) !!}
                    </strong>
                    <h3 class="mb-0">{{ $item->description }} </h3>
                    <div class="mb-1 text-muted">
                        {{ $item->category->name }} | {{ $item->category->description }}
                    </div>
                    <div class="mb-1 text-muted">
                            {{ $item->tag->name }}
                    </div>
                    <h3 class="mb-0 text-primary">Current : {{ $item->latest_zone->name }}</h3>
                    <p class="span card-text mb-auto">Storage : {{ $item->store_zone->name }}</p>
                </div>

                <div class="container">
                        <div class="col-auto d-none d-lg-block">

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
        </div>

        @if ($loop->iteration %3 == 0)

            </div>
            <div class="row">

        @endif

        @endforeach

    </div>
</div>

<div class="container">
    <p class="text-muted tag-info">
        Items shall be created in the ADMIN section
        <br>
        Click on 'id' of an item to edit or delete it
    </p>
</div>

@endsection

@include('app')

@section('content')

<section>
    <div class="container">

        <h3>Rules</h3>

        @if($violate['any'] == true)

            <p class="align-middle" style="color: red">
                Violation of rule is detected
            </p>

        @endif

    </div>
</section>


<div class="container">

    <table class="table table-sm">

        <thead>

            <th>Item</th>
            <th></th>
            <th>Zone</th>

        </thead>

        <tbody>

            @foreach ($rules as $rule)
            <tr>

                @if ($violate[$rule->id] == true)
                    <td style="color: red">
                        <!-- ITEM NAME -->
                        {{ $rule->item->name }}
                    </td>
                    <td style="color: red">
                        HAS VIOLATED TO BE INSIDE
                    </td>
                    <td style="color: red">
                        <!-- ZONE NAME -->
                        {{ $rule->zone->name }}
                    </td>
                @else
                    <td style="color: green">
                        <!-- ITEM NAME -->
                        {{ $rule->item->name }}
                    </td>
                    <td style="color: green">
                        <!-- IN / OUT -->
                        NOT ALLOWED IN
                    </td>
                    <td style="color: green">
                        <!-- ZONE NAME -->
                        {{ $rule->zone->name }}
                    </td>
                @endif

            </tr>
            @endforeach

        </tbody>

    </table>
</div>

<div class="container">
    <p class="text-muted">
            Creation and changes of rules shall be made through {!! Html::linkRoute('items.index', 'items') !!}
    </p>
</div>

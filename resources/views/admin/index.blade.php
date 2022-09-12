@include('app')

@section('content')

<div class="container" style="height: 20px"> </div>

<div class="row" style="margin-top:-20px">

    <div class="container col-md-6 card border-primary" style="padding-top: 10px">
        @include('departments.index')
    </div>

    <div class="container col-md-6 card border-primary" style="padding-top: 10px">
        @include('theatres.index')
    </div>

    <div class="container col-md-6 card border-primary" style="padding-top: 10px">
        @include('rfidReaders.index')
    </div>

    <div class="container col-md-6 card border-primary" style="padding-top: 10px">
        @include('rfidTags.index')
    </div>

    <div class="container col-md-6 card border-primary" style="padding-top: 10px">
        @include('itemCategories.index')
    </div>

    <div class="container col-md-6 card border-primary" style="padding-top: 10px">
        <div class="container">
            <h3>
                Creating New Entries in the Database
            </h3>
        </div>
        <div class="container">
            <table class="table table-sm">
                <tbody>
                    <tr>
                        <td>
                            Departments
                        </td>
                        <td>
                            {!! Html::linkRoute('departments.create', 'CREATE NEW') !!}
                        </td>
                    </tr>

                     <tr>
                        <td>
                            Item Categories
                        </td>
                        <td>
                            {!! Html::linkRoute('itemCategories.create', 'CREATE NEW') !!}
                        </td>
                    </tr>

                     <tr>
                        <td>
                            Rules
                        </td>
                        <td>
                            Creation and changes of rules shall be made through {!! Html::linkRoute('items.index', 'items') !!}
                        </td>
                    </tr>

                     <tr>
                        <td>
                            RFID Tags
                        </td>
                        <td>
                            Changes of RFID Tags shall be made through {!! Html::linkRoute('items.index', 'items') !!}
                        </td>
                    </tr>

                     <tr>
                        <td>
                            RFID Readers
                        </td>
                        <td>
                            {!! Html::linkRoute('rfidReaders.create', 'CREATE NEW') !!}
                        </td>
                    </tr>

                     <tr>
                        <td>
                            Zones
                        </td>
                        <td>
                            {!! Html::linkRoute('zones.create', 'CREATE NEW') !!}
                        </td>
                    </tr>

                     <tr>
                        <td>
                            Items
                        </td>
                        <td>
                            {!! Html::linkRoute('items.create', 'CREATE NEW') !!} item will as well create correspondikng rules and RFID reader
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            Creations and updates of <strong>theatres</strong> and <strong>zones</strong> shall be done by technician
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>

</div>

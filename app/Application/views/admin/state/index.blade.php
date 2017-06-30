@extends(layoutExtend())

@section('title')
     {{ adminTrans('state' , 'state') }} {{ adminTrans('home' , 'control') }}
@endsection

@section('content')
    @include(layoutTable() , ['title' => adminTrans('state' , 'state') , 'model' => 'state' , 'table' => $dataTable->table() ])
@endsection

@section('script')
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js">
    <script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
    <script src="{{ url('/') }}/vendor/datatables/buttons.server-side.js"></script>
    {!! $dataTable->scripts() !!}
@endsection
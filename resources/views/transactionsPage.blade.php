@extends('master')

@push('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
@endpush

@section('content')
    <table id="table_id" class="display">
        <thead>
            <tr>
                <th>id</th>
                <th>payment_id</th>
                <th>amount</th>
                <th>currency</th>
                <th>status</th>
                <th>created_at</th>
            </tr>
        </thead>
        <tbody>
           
        </tbody>
    </table>
@endsection

@push('js')
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>

<script>
    $(document).ready( function () {
        $('#table_id').DataTable({
            // "processing": true,
            serverSide: true,
            ajax: {
                url: '/task1/get-transactions',
                dataSrc: 'data'
            },
            columns: [
                {data: "id"},
                {data: "payment_id"},
                {data: "amount"},
                {data: "currency"},
                {data: "status"},
                {data: "created_at"},
            ]
        });
    } );
</script>
@endpush
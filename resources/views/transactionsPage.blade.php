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

<script src="{{asset('js/transactions.js')}}"></script>
@endpush
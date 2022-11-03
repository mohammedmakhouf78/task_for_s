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
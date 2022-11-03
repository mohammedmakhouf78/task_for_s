@extends('master')

@section('content')
    <div class="my-5">
        <label for="amount" class="form-label">Amount</label>
        <input type="number" id="amount" class="form-control">
    </div>
    <div class="d-flex justify-content-center" id="paypal-button-container"></div>

@endsection

@push('js')
<script src="https://www.paypal.com/sdk/js?client-id=test&currency=USD&intent=capture&enable-funding=venmo" data-sdk-integration-source="integrationbuilder"></script>
    <script>
        const paypalButtonsComponent = paypal.Buttons({
            style: {
                color: "gold",
                shape: "rect",
                layout: "vertical"
            },

            createOrder: (data, actions) => {
                const createOrderPayload = {
                    purchase_units: [
                        {
                            amount: {
                                value: $('#amount').val()
                            }
                        }
                    ]
                };

                return actions.order.create(createOrderPayload);
            },

            // finalize the transaction
            onApprove: (data, actions) => {
                const captureOrderHandler = (details) => {
                    const payerName = details.payer.name.given_name;
                    $.ajax({
                        url: '/task1/create-transaction',
                        type: 'POST',
                        data: {
                            payment_id: details.purchase_units[0].payments.captures[0].id,
                            amount: details.purchase_units[0].payments.captures[0].amount.value,
                            currency_code: details.purchase_units[0].payments.captures[0].amount.currency_code,
                            status: details.purchase_units[0].payments.captures[0].status,
                            create_time: details.purchase_units[0].payments.captures[0].create_time,
                        },
                        success: function(response) {
                            Swal.fire(
                                'Thank You!',
                                'Your Payment is Done!',
                                'success'
                            )
                        },
                        error: function() {}
                    })
                    $('#amount').val('')
                };

                return actions.order.capture().then(captureOrderHandler);
            },

            onError: (err) => {
                Swal.fire(
                    'Error!',
                    'Your Payment Was Not Complete!',
                    'error'
                )
            }
        });

        paypalButtonsComponent
            .render("#paypal-button-container")
            .catch((err) => {
                console.error('PayPal Buttons failed to render');
        });
    </script>
@endpush
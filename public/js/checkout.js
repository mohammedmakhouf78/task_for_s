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
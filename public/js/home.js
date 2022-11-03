$.ajax({
    url: `/task2/get-products-statistics`,
    type: 'GET',
    success: function(response) {
        console.log(response);
          const data = {
            labels: response.productNames,
            datasets: [
                {
                    label: 'Dataset',
                    data: response.productSearchedCount,
                    borderColor: "red",
                    backgroundColor: "green",
                    pointStyle: 'circle',
                    pointRadius: 10,
                    pointHoverRadius: 15
                }
            ]
        };


        const config = {
            type: 'line',
            data: data,
            options: {
                responsive: true,
                plugins: {
                    title: {
                        display: true,
                        text: (ctx) => 'Point Style: ' + ctx.chart.data.datasets[0].pointStyle,
                    }
                },
                scales:{
                    yAxis: {
                        min: 0
                    }
                }
            }
        };

    

        const myChart = new Chart(
            document.getElementById('productsChart'),
            config
        );
    },
    error: function() {}
})

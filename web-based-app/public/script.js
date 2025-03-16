//chart.js
document.addEventListener("DOMContentLoaded", function () {
    var ctx = document.getElementById('healthChart').getContext('2d');

    var healthChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: JSON.parse(document.getElementById('chartData').dataset.labels), // X-axis labels
            datasets: [{
                label: 'BMI Category Count',
                data: JSON.parse(document.getElementById('chartData').dataset.counts), // Y-axis values
                backgroundColor: ['blue', 'red', 'lightgreen', 'purple', 'cyan'],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
});


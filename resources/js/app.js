import Chart from 'chart.js/auto';

document.addEventListener('DOMContentLoaded', () => {

    const chartCanvas = document.getElementById('costChart');

    if (chartCanvas) {

        new Chart(chartCanvas, {

            type: 'line',

            data: {

                labels: [
                    'Jan',
                    'Feb',
                    'Mar',
                    'Apr',
                    'May',
                    'Jun'
                ],

                datasets: [

                    {
                        label: 'Monthly Cost ($)',

                        data: [
                            120,
                            180,
                            160,
                            240,
                            220,
                            300
                        ],

                        borderColor: '#2563eb',

                        backgroundColor: 'rgba(37,99,235,.15)',

                        fill: true,

                        tension: .4,

                        pointRadius: 5,

                        pointBackgroundColor: '#2563eb'

                    }

                ]

            },

          options: {
    responsive: true,
    maintainAspectRatio: false,

    plugins: {
        legend: {
            display: true
        }
    },

    scales: {
        y: {
            beginAtZero: true
        }
    }
}

        });

    }

});
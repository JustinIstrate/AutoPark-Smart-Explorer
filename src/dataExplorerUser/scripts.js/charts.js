
//bar chart
document.addEventListener('DOMContentLoaded', function() {
    let barChart = null;
    if (chartData.length > 0) {

        const labels = chartData.map(item => item.JUDET); //  x-axis
        const data = chartData.map(item => item.TOTAL_VEHICULE); //  y-axis

        const ctx = document.getElementById('barChart').getContext('2d');
        if (barChart) {
            barChart.destroy();
        }
        barChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Total Vehicles',
                    data: data,
                    backgroundColor: backgroundColors[1],
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: false,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    }
});

//doghnut chart
document.addEventListener('DOMContentLoaded', function() {
    let dogChart = null;
    if (chartData.length > 0) {

        const labels = chartData.map(item => item.JUDET); //  x-axis
        const data = chartData.map(item => item.TOTAL_VEHICULE); //  y-axis

        const ctx = document.getElementById('dogChart').getContext('2d');
        if (dogChart) {
            dogChart.destroy();
        }
        dogChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Total Vehicles',
                    data: data,
                    backgroundColor: backgroundColors,
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: false,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    }
});

function getRandomColor() {
    const r = Math.floor(Math.random() * 256);
    const g = Math.floor(Math.random() * 256);
    const b = Math.floor(Math.random() * 256);
    return `rgb(${r}, ${g}, ${b})`;
}

function generateColors(num) {
    const colors = [];
    for (let i = 0; i < num; i++) {
        colors.push(getRandomColor());
    }
    return colors;
}

const backgroundColors = generateColors(37);


//line chart

document.addEventListener('DOMContentLoaded', function() {
    let lineChart = null;
    if (chartData.length > 0) {

        const labels = chartData.map(item => item.JUDET); //  x-axis
        const data = chartData.map(item => item.TOTAL_VEHICULE); //  y-axis

        const ctx = document.getElementById('lineChart').getContext('2d');
        if (lineChart) {
            lineChart.destroy();
        }
        lineChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Total Vehicles',
                    data: data,
                    fill: false,
                    borderColor: backgroundColors[0],
                    tension: 0.1
                }]
            },
            options: {
                responsive: false,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    }
});

document.addEventListener('DOMContentLoaded', function() {
    let myChart = null;
    if (chartData.length > 0) {

        const labels = ["Judet","Categorie_Nationala","Marca"]; //  x-axis
        const data = chartData.map(item => item.Total_Vehicule); //  y-axis

        const ctx = document.getElementById('myChart').getContext('2d');
        if (myChart) {
            myChart.destroy();
        }
        myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Total Vehicles',
                    data: data,
                    backgroundColor: 'rgba(75, 192, 192, 0.6)',
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
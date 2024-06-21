document.addEventListener('DOMContentLoaded', function() {
    const barChartButton = document.getElementById('showBarChart');
    const doughnutChartButton = document.getElementById('showDoughnutChart');
    const lineChartButton = document.getElementById('showLineChart');

    const barChartSection = document.getElementById('barChartSection');
    const dogChartSection = document.getElementById('dogChartSection');
    const lineChartSection = document.getElementById('lineChartSection');

    let barChart = null;
    let dogChart = null;
    let lineChart = null;

    // Function to generate random colors
    function getRandomColor() {
        const r = Math.floor(Math.random() * 256);
        const g = Math.floor(Math.random() * 256);
        const b = Math.floor(Math.random() * 256);
        return `rgba(${r}, ${g}, ${b}, 0.6)`;
    }

    barChartButton.addEventListener('click', function() {
        toggleChartSection(barChartSection);
        if (barChart) {
            barChart.destroy();
            barChart = null;
        }
        renderBarChart();
    });

    doughnutChartButton.addEventListener('click', function() {
        toggleChartSection(dogChartSection);
        if (dogChart) {
            dogChart.destroy();
            dogChart = null;
        }
        renderDoughnutChart();
    });

    lineChartButton.addEventListener('click', function() {
        toggleChartSection(lineChartSection);
        if (lineChart) {
            lineChart.destroy();
            lineChart = null;
        }
        renderLineChart();
    });

    function toggleChartSection(section) {
        // Hide all chart sections
        barChartSection.classList.remove('active');
        dogChartSection.classList.remove('active');
        lineChartSection.classList.remove('active');

        // Show the selected chart section
        section.classList.add('active');
    }

    // Function to render Bar Chart
    function renderBarChart() {
        const labels = chartData.map(item => item.JUDET); // x-axis
        const data = chartData.map(item => item.TOTAL_VEHICULE); // y-axis

        const ctx = document.getElementById('barChart').getContext('2d');
        barChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Total Vehicles',
                    data: data,
                    backgroundColor: getRandomColor(),
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

    // Function to render Doughnut Chart
    function renderDoughnutChart() {
        const labels = chartData.map(item => item.JUDET); // x-axis
        const data = chartData.map(item => item.TOTAL_VEHICULE); // y-axis

        const ctx = document.getElementById('dogChart').getContext('2d');
        dogChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Total Vehicles',
                    data: data,
                    backgroundColor: [
                        getRandomColor(),
                        getRandomColor(),
                        getRandomColor(),
                        getRandomColor(),
                        getRandomColor()
                    ],
                    borderColor: 'rgba(255, 255, 255, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: false,
                maintainAspectRatio: false
            }
        });
    }

    // Function to render Line Chart
    function renderLineChart() {
        const labels = chartData.map(item => item.JUDET); // x-axis
        const data = chartData.map(item => item.TOTAL_VEHICULE); // y-axis

        const ctx = document.getElementById('lineChart').getContext('2d');
        lineChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Total Vehicles',
                    data: data,
                    fill: false,
                    borderColor: getRandomColor(),
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

// Export barChart as WEBP , SVG
document.getElementById('bexportWebP').addEventListener('click', () => {
    const canvas = document.getElementById('barChart');
    canvas.toBlob((blob) => {
        const url = URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = 'barChart.webp';
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
    }, 'image/webp');
});

document.getElementById('bexportSVG').addEventListener('click', () => {
    const canvas = document.getElementById('barChart');
    const img = canvas.toDataURL('image/png');
    const svgData = `
        <svg xmlns="http://www.w3.org/2000/svg" width="${canvas.width}" height="${canvas.height}">
            <image href="${img}" width="${canvas.width}" height="${canvas.height}" />
        </svg>
    `;
    const svgBlob = new Blob([svgData], { type: 'image/svg+xml;charset=utf-8' });
    const url = URL.createObjectURL(svgBlob);
    const a = document.createElement('a');
    a.href = url;
    a.download = 'barchart.svg';
    document.body.appendChild(a);
    a.click();
    document.body.removeChild(a);
});

// Export doughnutChart as WEBP , SVG
document.getElementById('dexportWebP').addEventListener('click', () => {
    const canvas = document.getElementById('dogChart');
    canvas.toBlob((blob) => {
        const url = URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = 'doughtnutChart.webp';
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
    }, 'image/webp');
});

document.getElementById('dexportSVG').addEventListener('click', () => {
    const canvas = document.getElementById('dogChart');
    const img = canvas.toDataURL('image/png');
    const svgData = `
        <svg xmlns="http://www.w3.org/2000/svg" width="${canvas.width}" height="${canvas.height}">
            <image href="${img}" width="${canvas.width}" height="${canvas.height}" />
        </svg>
    `;
    const svgBlob = new Blob([svgData], { type: 'image/svg+xml;charset=utf-8' });
    const url = URL.createObjectURL(svgBlob);
    const a = document.createElement('a');
    a.href = url;
    a.download = 'doughnutchart.svg';
    document.body.appendChild(a);
    a.click();
    document.body.removeChild(a);
});

// Export lineChart as WEBP , SVG
document.getElementById('lexportWebP').addEventListener('click', () => {
    const canvas = document.getElementById('lineChart');
    canvas.toBlob((blob) => {
        const url = URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = 'lineChart.webp';
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
    }, 'image/webp');
});

document.getElementById('lexportSVG').addEventListener('click', () => {
    const canvas = document.getElementById('lineChart');
    const img = canvas.toDataURL('image/png');
    const svgData = `
        <svg xmlns="http://www.w3.org/2000/svg" width="${canvas.width}" height="${canvas.height}">
            <image href="${img}" width="${canvas.width}" height="${canvas.height}" />
        </svg>
    `;
    const svgBlob = new Blob([svgData], { type: 'image/svg+xml;charset=utf-8' });
    const url = URL.createObjectURL(svgBlob);
    const a = document.createElement('a');
    a.href = url;
    a.download = 'linechart.svg';
    document.body.appendChild(a);
    a.click();
    document.body.removeChild(a);
});
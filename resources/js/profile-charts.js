// Import library Chart.js yang sudah kita install
import Chart from 'chart.js/auto';

// Kita bungkus semua logika ke dalam sebuah fungsi yang bisa diekspor
export function initProfileCharts() {
    
    const ageChartCanvas = document.getElementById('ageChart');
    const occupationChartCanvas = document.getElementById('occupationChart');
    
    // Cek apakah elemen canvas dan data profil ada di halaman
    if (ageChartCanvas && occupationChartCanvas && window.profileData) {
        
        const profileData = window.profileData;

        // Buat Grafik Komposisi Usia (Doughnut Chart)
        new Chart(ageChartCanvas.getContext('2d'), {
            type: 'doughnut',
            data: {
                labels: ['Anak-anak', 'Remaja', 'Dewasa', 'Lansia'],
                datasets: [{
                    label: 'Jumlah Penduduk',
                    data: [
                        profileData.penduduk_anak,
                        profileData.penduduk_remaja,
                        profileData.penduduk_dewasa,
                        profileData.penduduk_lansia
                    ],
                    backgroundColor: [
                        'rgba(59, 130, 246, 0.8)',
                        'rgba(16, 185, 129, 0.8)',
                        'rgba(239, 68, 68, 0.8)',
                        'rgba(249, 115, 22, 0.8)'
                    ],
                    borderColor: '#fff',
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { position: 'top' },
                    tooltip: { callbacks: { label: (context) => `${context.label}: ${context.raw} Jiwa` } }
                }
            }
        });

        // Buat Grafik Mata Pencaharian (Bar Chart)
        new Chart(occupationChartCanvas.getContext('2d'), {
            type: 'bar',
            data: {
                labels: ['PNS', 'Wiraswasta', 'Petani', 'Lainnya'],
                datasets: [{
                    label: 'Jumlah Penduduk',
                    data: [
                        profileData.pencaharian_pns,
                        profileData.pencaharian_wiraswasta,
                        profileData.pencaharian_petani,
                        profileData.pencaharian_lainnya
                    ],
                    backgroundColor: 'rgba(20, 184, 166, 0.7)',
                    borderColor: 'rgba(15, 118, 110, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: { y: { beginAtZero: true, ticks: { precision: 0 } } },
                plugins: {
                    legend: { display: false },
                    tooltip: { callbacks: { label: (context) => `${context.raw} Jiwa` } }
                }
            }
        });
    }
}
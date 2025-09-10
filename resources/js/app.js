import './bootstrap';
import Alpine from 'alpinejs';

// Pastikan baris ini ada dan nama file/fungsinya benar
import { initProfileCharts } from './profile-charts.js';

window.Alpine = Alpine;
Alpine.start();

// Pastikan blok ini ada
document.addEventListener('DOMContentLoaded', () => {
    initProfileCharts();
});
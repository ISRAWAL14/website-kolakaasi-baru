import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import GLightbox from 'glightbox';

// Inisialisasi GLightbox untuk semua elemen dengan class 'glightbox'
GLightbox({
  loop: true,
  touchNavigation: true,
});
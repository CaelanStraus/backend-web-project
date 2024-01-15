import './bootstrap';

import mediumZoom from 'medium-zoom';

document.addEventListener('DOMContentLoaded', function () {
    const images = document.querySelectorAll('.zoomable-image');
    mediumZoom(images);
});

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

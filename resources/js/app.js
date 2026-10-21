import './bootstrap';
import Alpine from 'alpinejs';
import { createIcons, icons } from 'lucide';

window.Alpine = Alpine;
Alpine.start();

// Initialize Lucide icons on page load and dynamic updates
document.addEventListener('DOMContentLoaded', () => {
    createIcons({ icons });
});

document.addEventListener('livewire:navigated', () => {
    createIcons({ icons });
});

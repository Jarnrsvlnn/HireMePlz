import './bootstrap';
import '@tailwindplus/elements';

const backButton = document.querySelector('#back-button');

if (backButton) { backButton.addEventListener('click', () => history.back()); }
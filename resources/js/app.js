import './bootstrap';
import '@tailwindplus/elements';

// DIALOG VARS
const backButton = document.querySelector('#back-button');
const editDialog = document.querySelector('dialog');
const openEditDialog = document.querySelector('#open-dialog');
const closeEditDialog = document.querySelector('dialog #close-dialog');

// SORTING VARS
const sortButton = document.querySelector('#sort-button');
const sortOptions = document.querySelector('#sort-options');

// GACHA VARS
const drawButtons = document.querySelectorAll('#banner-buttons .draw-button');

if (backButton) { backButton.addEventListener('click', () => history.back()); }

if (openEditDialog && closeEditDialog) {
    openEditDialog.addEventListener('click', () => {
        editDialog.showModal();
    });
    
    closeEditDialog.addEventListener('click', () => {
        editDialog.close();
    });
}

if (sortButton && sortOptions) {
    sortButton.addEventListener('click', () => {
        // Tailwind toggle
        sortOptions.classList.toggle('hidden');

        // Optional: bring dropdown to front
        sortOptions.classList.toggle('z-50');
    });
}

if (drawButtons) {

    drawButtons.forEach(button => {
        button.addEventListener('click', (e) => {
            alert('haha');
        });
    });
    
}
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

if (backButton) { backButton.addEventListener('click', () => history.back()); }

openEditDialog.addEventListener('click', () => {
    editDialog.showModal();
});

closeEditDialog.addEventListener('click', () => {
    editDialog.close();
});

sortButton.addEventListener('click', () => {
    sortOptions.classList.toggle('hidden');
});
import './bootstrap';
import '@tailwindplus/elements';

const backButton = document.querySelector('#back-button');
const editDialog = document.querySelector('#edit-dialog');
const openEditDialog = document.querySelector('#open-dialog');
const closeEditDialog = document.querySelector('#edit-dialog #close-dialog');

if (backButton) { backButton.addEventListener('click', () => history.back()); }

openEditDialog.addEventListener('click', () => {
    editDialog.showModal();
});

closeEditDialog.addEventListener('click', () => {
    editDialog.close();
});
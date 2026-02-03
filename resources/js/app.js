import './bootstrap';
import '@tailwindplus/elements';

document.addEventListener('DOMContentLoaded', () => {

    /* =========================
       NAV / MENU
    ========================== */
    const menuBtn = document.querySelector('#menu');
    const dropdownMenu = document.querySelector('#menu-dropdown');

    if (menuBtn && dropdownMenu) {
        menuBtn.addEventListener('click', () => {
            dropdownMenu.classList.toggle('hidden');
            dropdownMenu.classList.toggle('z-50');
        });
    }

    /* =========================
       BACK BUTTON
    ========================== */
    const backButton = document.querySelector('#back-button');
    if (backButton) {
        backButton.addEventListener('click', () => history.back());
    }

    /* =========================
       EDIT DIALOG
    ========================== */
    const editDialog = document.querySelector('dialog');
    const openEditDialog = document.querySelector('#open-dialog');
    const closeEditDialog = document.querySelector('dialog #close-dialog');

    if (editDialog && openEditDialog && closeEditDialog) {
        openEditDialog.addEventListener('click', () => editDialog.showModal());
        closeEditDialog.addEventListener('click', () => editDialog.close());
    }

    /* =========================
       SORT DROPDOWN
    ========================== */
    const sortButton = document.querySelector('#sort-button');
    const sortOptions = document.querySelector('#sort-options');

    if (sortButton && sortOptions) {
        sortButton.addEventListener('click', () => {
            sortOptions.classList.toggle('hidden');
            sortOptions.classList.toggle('z-50');
        });
    }

    /* =========================
       GACHA / PULLS MODAL
    ========================== */
    const pullsSection = document.querySelector('#pulls-section');
    const closePullsSection = document.querySelector('#close-pulls-section');

    if (pullsSection) {
        // Auto-open modal after redirect
        if (pullsSection.dataset.hasPulls === 'true') {
            pullsSection.showModal();
        }

        if (closePullsSection) {
            closePullsSection.addEventListener('click', () => {
                pullsSection.close();
            });
        }
    }
});

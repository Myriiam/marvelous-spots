//Modal contact in profile (to send a message to a guide)
const modal = document.querySelector('#modal-contact');
const btnClose = document.querySelector('#close-modal');
const btnContact = document.querySelector('#btn-contact');

const toggleModal = () => {
    console.log('no modal');
    modal.classList.toggle('hidden');
    modal.classList.toggle('flex');
}

btnContact.addEventListener('click', toggleModal);
btnClose.addEventListener('click', toggleModal);
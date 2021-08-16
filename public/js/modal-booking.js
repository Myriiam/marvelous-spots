//Modal contact in profile (to send a message to a guide)
const modalBooking = document.querySelector('#modal-booking');
const btnCloseBooking = document.querySelector('#close-modal-booking');
const btnBooking = document.querySelector('#btn-booking');

const toggleModalBooking = () => {
    console.log('no modal');
    modalBooking.classList.toggle('hidden');
    modalBooking.classList.toggle('flex');
}

btnBooking.addEventListener('click', toggleModalBooking);
btnCloseBooking.addEventListener('click', toggleModalBooking);
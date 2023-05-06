const phone = document.getElementById('phone');
const email = document.getElementById('email');
phone.addEventListener('click', () => {
    email.checked = false; 
});

email.addEventListener('click', () => {
    phone.checked = false;
});
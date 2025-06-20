 // Function to validate the entire form
 function validateForm() {
    let isValid = true;

    // Clear previous errors
    document.querySelectorAll('.error').forEach(el => el.textContent = '');
    document.querySelectorAll('input, select').forEach(el => {
        el.classList.remove('invalid');
        el.classList.remove('valid');
    });

    // Validate Name
    const name = document.getElementById('name').value.trim();
    if (name === '') {
        document.getElementById('nameError').textContent = 'Name is required';
        document.getElementById('name').classList.add('invalid');
        isValid = false;
    } else if (!/^[a-zA-Z ]+$/.test(name)) {
        document.getElementById('nameError').textContent = 'Name should contain only letters and spaces';
        document.getElementById('name').classList.add('invalid');
        isValid = false;
    } else {
        document.getElementById('name').classList.add('valid');
    }

    // Validate Email
    const email = document.getElementById('email').value.trim();
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (email === '') {
        document.getElementById('emailError').textContent = 'Email is required';
        document.getElementById('email').classList.add('invalid');
        isValid = false;
    } else if (!emailRegex.test(email)) {
        document.getElementById('emailError').textContent = 'Please enter a valid email address';
        document.getElementById('email').classList.add('invalid');
        isValid = false;
    } else {
        document.getElementById('email').classList.add('valid');
    }

    // Validate Phone Number
    const number = document.getElementById('number').value.trim();
    const phoneRegex = /^[0-9]{10}$/;
    if (number === '') {
        document.getElementById('numberError').textContent = 'Phone number is required';
        document.getElementById('number').classList.add('invalid');
        isValid = false;
    } else if (!phoneRegex.test(number)) {
        document.getElementById('numberError').textContent = 'Please enter a valid 10-digit phone number';
        document.getElementById('number').classList.add('invalid');
        isValid = false;
    } else {
        document.getElementById('number').classList.add('valid');
    }

    // Validate Event Type
    const event = document.getElementById('event').value;
    if (event === '') {
        document.getElementById('eventError').textContent = 'Please select an event type';
        document.getElementById('event').classList.add('invalid');
        isValid = false;
    } else {
        document.getElementById('event').classList.add('valid');
    }

    // Validate Number of Guests
    const guest = document.getElementById('guest').value.trim();
    if (guest === '') {
        document.getElementById('guestError').textContent = 'Number of guests is required';
        document.getElementById('guest').classList.add('invalid');
        isValid = false;
    } else if (isNaN(guest) || parseInt(guest) <= 0) {
        document.getElementById('guestError').textContent = 'Please enter a valid number greater than 0';
        document.getElementById('guest').classList.add('invalid');
        isValid = false;
    } else {
        document.getElementById('guest').classList.add('valid');
    }

    // Validate Date
    const date = document.getElementById('date').value;
    const today = new Date().toISOString().split('T')[0];
    if (date === '') {
        document.getElementById('dateError').textContent = 'Please select a date';
        document.getElementById('date').classList.add('invalid');
        isValid = false;
    } else if (date < today) {
        document.getElementById('dateError').textContent = 'Event date cannot be in the past';
        document.getElementById('date').classList.add('invalid');
        isValid = false;
    } else {
        document.getElementById('date').classList.add('valid');
    }

    return isValid;
}

// Add real-time validation as users type/select
document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('name').addEventListener('input', function () {
        const name = this.value.trim();
        if (name === '') {
            document.getElementById('nameError').textContent = 'Name is required';
            this.classList.add('invalid');
            this.classList.remove('valid');
        } else if (!/^[a-zA-Z ]+$/.test(name)) {
            document.getElementById('nameError').textContent = 'Name should contain only letters and spaces';
            this.classList.add('invalid');
            this.classList.remove('valid');
        } else {
            document.getElementById('nameError').textContent = '';
            this.classList.add('valid');
            this.classList.remove('invalid');
        }
    });

    document.getElementById('email').addEventListener('input', function () {
        const email = this.value.trim();
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (email === '') {
            document.getElementById('emailError').textContent = 'Email is required';
            this.classList.add('invalid');
            this.classList.remove('valid');
        } else if (!emailRegex.test(email)) {
            document.getElementById('emailError').textContent = 'Please enter a valid email address';
            this.classList.add('invalid');
            this.classList.remove('valid');
        } else {
            document.getElementById('emailError').textContent = '';
            this.classList.add('valid');
            this.classList.remove('invalid');
        }
    });

    document.getElementById('number').addEventListener('input', function () {
        const number = this.value.trim();
        const phoneRegex = /^[0-9]{10}$/;
        if (number === '') {
            document.getElementById('numberError').textContent = 'Phone number is required';
            this.classList.add('invalid');
            this.classList.remove('valid');
        } else if (!phoneRegex.test(number)) {
            document.getElementById('numberError').textContent = 'Please enter a valid 10-digit phone number';
            this.classList.add('invalid');
            this.classList.remove('valid');
        } else {
            document.getElementById('numberError').textContent = '';
            this.classList.add('valid');
            this.classList.remove('invalid');
        }
    });

    document.getElementById('event').addEventListener('change', function () {
        if (this.value === '') {
            document.getElementById('eventError').textContent = 'Please select an event type';
            this.classList.add('invalid');
            this.classList.remove('valid');
        } else {
            document.getElementById('eventError').textContent = '';
            this.classList.add('valid');
            this.classList.remove('invalid');
        }
    });

    document.getElementById('guest').addEventListener('input', function () {
        const guest = this.value.trim();
        if (guest === '') {
            document.getElementById('guestError').textContent = 'Number of guests is required';
            this.classList.add('invalid');
            this.classList.remove('valid');
        } else if (isNaN(guest) || parseInt(guest) <= 0) {
            document.getElementById('guestError').textContent = 'Please enter a valid number greater than 0';
            this.classList.add('invalid');
            this.classList.remove('valid');
        } else {
            document.getElementById('guestError').textContent = '';
            this.classList.add('valid');
            this.classList.remove('invalid');
        }
    });

    document.getElementById('date').addEventListener('change', function () {
        const date = this.value;
        const today = new Date().toISOString().split('T')[0];
        if (date === '') {
            document.getElementById('dateError').textContent = 'Please select a date';
            this.classList.add('invalid');
            this.classList.remove('valid');
        } else if (date < today) {
            document.getElementById('dateError').textContent = 'Event date cannot be in the past';
            this.classList.add('invalid');
            this.classList.remove('valid');
        } else {
            document.getElementById('dateError').textContent = '';
            this.classList.add('valid');
            this.classList.remove('invalid');
        }
    });
});
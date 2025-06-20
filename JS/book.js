// Validation function
function validateForm() {
    let isValid = true;

    // Clear previous errors and validation classes
    document.querySelectorAll('.error').forEach(el => el.textContent = '');
    document.querySelectorAll('input, select, textarea').forEach(el => {
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

    // Validate Room Selection
    const room = document.getElementById('Room').value;
    if (room === '') {
        document.getElementById('roomError').textContent = 'Please select number of rooms';
        document.getElementById('Room').classList.add('invalid');
        isValid = false;
    } else {
        document.getElementById('Room').classList.add('valid');
    }

    // Validate Adults Selection
    const adults = document.getElementById('Guests-Adult').value;
    if (adults === '') {
        document.getElementById('adultError').textContent = 'Please select number of adults';
        document.getElementById('Guests-Adult').classList.add('invalid');
        isValid = false;
    } else {
        document.getElementById('Guests-Adult').classList.add('valid');
    }

    // Validate Children Selection
    const children = document.getElementById('Guests-chil').value;
    if (children === '') {
        document.getElementById('childrenError').textContent = 'Please select number of children';
        document.getElementById('Guests-chil').classList.add('invalid');
        isValid = false;
    } else {
        document.getElementById('Guests-chil').classList.add('valid');
    }

    // Validate Check-in Date
    const checkin = document.getElementById('Check-in').value;
    const today = new Date().toISOString().split('T')[0];
    if (checkin === '') {
        document.getElementById('checkinError').textContent = 'Check-in date is required';
        document.getElementById('Check-in').classList.add('invalid');
        isValid = false;
    } else if (checkin < today) {
        document.getElementById('checkinError').textContent = 'Check-in date cannot be in the past';
        document.getElementById('Check-in').classList.add('invalid');
        isValid = false;
    } else {
        document.getElementById('Check-in').classList.add('valid');
    }

    // Validate Check-out Date
    const checkout = document.getElementById('Check-out').value;
    if (checkout === '') {
        document.getElementById('checkoutError').textContent = 'Check-out date is required';
        document.getElementById('Check-out').classList.add('invalid');
        isValid = false;
    } else if (checkout <= checkin) {
        document.getElementById('checkoutError').textContent = 'Check-out date must be after check-in date';
        document.getElementById('Check-out').classList.add('invalid');
        isValid = false;
    } else {
        document.getElementById('Check-out').classList.add('valid');
    }

    return isValid;
}

// Real-time validation
document.addEventListener('DOMContentLoaded', function () {
    // Name validation
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

    // Email validation
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

    // Phone number validation
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

    // Room selection validation
    document.getElementById('Room').addEventListener('change', function () {
        if (this.value === '') {
            document.getElementById('roomError').textContent = 'Please select number of rooms';
            this.classList.add('invalid');
            this.classList.remove('valid');
        } else {
            document.getElementById('roomError').textContent = '';
            this.classList.add('valid');
            this.classList.remove('invalid');
        }
    });

    // Adults selection validation
    document.getElementById('Guests-Adult').addEventListener('change', function () {
        if (this.value === '') {
            document.getElementById('adultError').textContent = 'Please select number of adults';
            this.classList.add('invalid');
            this.classList.remove('valid');
        } else {
            document.getElementById('adultError').textContent = '';
            this.classList.add('valid');
            this.classList.remove('invalid');
        }
    });

    // Children selection validation
    document.getElementById('Guests-chil').addEventListener('change', function () {
        if (this.value === '') {
            document.getElementById('childrenError').textContent = 'Please select number of children';
            this.classList.add('invalid');
            this.classList.remove('valid');
        } else {
            document.getElementById('childrenError').textContent = '';
            this.classList.add('valid');
            this.classList.remove('invalid');
        }
    });

    // Check-in date validation
    document.getElementById('Check-in').addEventListener('change', function () {
        const checkin = this.value;
        const today = new Date().toISOString().split('T')[0];
        if (checkin === '') {
            document.getElementById('checkinError').textContent = 'Check-in date is required';
            this.classList.add('invalid');
            this.classList.remove('valid');
        } else if (checkin < today) {
            document.getElementById('checkinError').textContent = 'Check-in date cannot be in the past';
            this.classList.add('invalid');
            this.classList.remove('valid');
        } else {
            document.getElementById('checkinError').textContent = '';
            this.classList.add('valid');
            this.classList.remove('invalid');
        }
    });

    // Check-out date validation
    document.getElementById('Check-out').addEventListener('change', function () {
        const checkout = this.value;
        const checkin = document.getElementById('Check-in').value;
        if (checkout === '') {
            document.getElementById('checkoutError').textContent = 'Check-out date is required';
            this.classList.add('invalid');
            this.classList.remove('valid');
        } else if (checkout <= checkin) {
            document.getElementById('checkoutError').textContent = 'Check-out date must be after check-in date';
            this.classList.add('invalid');
            this.classList.remove('valid');
        } else {
            document.getElementById('checkoutError').textContent = '';
            this.classList.add('valid');
            this.classList.remove('invalid');
        }
    });
});
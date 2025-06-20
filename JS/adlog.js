document.getElementById('loginForm').addEventListener('submit', function (event) {
    // Prevent form submission
    event.preventDefault();

    // Get form values
    const username = document.getElementById('name').value.trim();
    const password = document.getElementById('word').value.trim();

    // Reset previous error states
    document.getElementById('nameError').textContent = '';
    document.getElementById('name').classList.remove('error-border');
    document.getElementById('passwordError').textContent = '';
    document.getElementById('word').classList.remove('error-border');

    let isValid = true;

    // Validate username
    if (username === '') {
        document.getElementById('nameError').textContent = 'Username is required';
        document.getElementById('name').classList.add('error-border');
        isValid = false;
    } else if (username.length < 4) {
        document.getElementById('nameError').textContent = 'Username must be at least 4 characters';
        document.getElementById('name').classList.add('error-border');
        isValid = false;
    }

    // Validate password
    if (password === '') {
        document.getElementById('passwordError').textContent = 'Password is required';
        document.getElementById('word').classList.add('error-border');
        isValid = false;
    } else if (password.length < 6) {
        document.getElementById('passwordError').textContent = 'Password must be at least 6 characters';
        document.getElementById('word').classList.add('error-border');
        isValid = false;
    }

    // If form is valid, submit it
    if (isValid) {
        this.submit();
    }
});

// Add real-time validation (optional)
document.getElementById('name').addEventListener('input', function () {
    if (this.value.trim().length >= 4) {
        document.getElementById('nameError').textContent = '';
        this.classList.remove('error-border');
    }
});

document.getElementById('word').addEventListener('input', function () {
    if (this.value.trim().length >= 6) {
        document.getElementById('passwordError').textContent = '';
        this.classList.remove('error-border');
    }
});
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = trim($_POST['name'] ?? '');
    $pass = trim($_POST['word'] ?? '');

    // Check if fields are empty
    if ($user === '' || $pass === '') {
        echo "<script>
                alert('Both fields are required!');
                window.location.href = '../HTML/adlog.html';
              </script>";
        exit();
    }

    // Correct credentials
    if ($user === 'admin' && $pass === 'root123') {

        session_start();
        // Set session variables
        $_SESSION['username'] = $user;
        $_SESSION['password'] = $pass;

        header('Location: ../PHP/admin.php');
        exit();
    } else {
        // Show alert and redirect back
        echo "<script>
                alert('Invalid username or password!');
                window.location.href = '../HTML/adlog.html';
              </script>";
        exit();
    }
} else {
    // If the page is accessed directly
    header('Location: ../HTML/adlog.html');
    exit();
}

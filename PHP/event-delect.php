<?php
include('conn.php');

if (isset($_GET['ID'])) {
    $id = $_GET['ID'];
    $sql = "DELETE FROM event WHERE ID=$id";

    if (mysqli_query($conn, $sql)) {
        header("Location: admin_event.php");
        exit();
    } else {
        error_log("Delete error: " . mysqli_error($conn));
        header("Location: admin_event.php?error=delete_failed");
        exit();
    }
} else {
    header("Location: admin_event.php");
    exit();
}

?>
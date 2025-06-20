<?php
include('conn.php');

if (isset($_GET['ID'])) {
    $id = $_GET['ID'];
    $sql = "DELETE FROM room WHERE ID=$id";

    if (mysqli_query($conn, $sql)) {
        header("Location: Admin_Room.php");
        exit();
    } else {
        error_log("Delete error: " . mysqli_error($conn));
        header("Location: Admin_Room.php?error=delete_failed");
        exit();
    }
} else {
    header("Location: Admin_Room.php");
    exit();
}

?>
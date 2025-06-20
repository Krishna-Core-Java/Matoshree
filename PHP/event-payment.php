<?php

session_start();
if (!isset($_SESSION['username']) || !isset($_SESSION['password'])) {
  echo "First login to access this page <a href='../HTML/adlog.html'>Login</a>";
  exit();
} else {



  include('conn.php');

  echo '

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
    integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <title>Admin Dashboard - Matoshree Resort</title>
  <link rel="stylesheet" href="../CSS/admin.css">

  <style>
    .main h1 {
      text-align: center;
    }

    table {
      border-collapse: collapse;
      margin-top: 1rem;
      margin-left: 1rem;
      text-align: center;
      width: 98.5%;
    }

    table td,
    th {
      border: 2px solid black;
      padding: 0.5rem 1rem;
    }

    .main a {
      text-decoration: none;
      border: 1px solid black;
      padding: 0.3rem 1rem;
      border-radius: 10px;
      color: black;
      background-color: #fa4949;
    }

    #update {
      background-color: #7272f6;
      margin-right: 0.2rem;
    }
  </style>

</head>

<body>

  <div class="full">

    <div class="side-bar">

      <div class="brand">
        <h1>Matoshree</h1>
        <h2>Resort & River Park</h2>
      </div>

      <div class="bar">

        <a href="../PHP/admin.php">Home</a>
        <a href="../PHP/Admin_Room.php">Room Booking</a>
        <a href="../PHP/admin_event.php">Event Booking</a>
        <a href="../PHP/event-payment.php">Event Payment</a>
        <a href="../PHP/room-payment.php">Room Payment</a>
        <a href="../PHP/section.php">Log Out</a>


      </div>


    </div>

    <div class="main">

      <h1>Event Payment</h1>

      <table>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Work</th>
          <th>Date</th>
          <th>Payment</th>
          <th>SGST</th>
          <th>CGST</th>
          <th>Total Payment</th>
          <th>Payment ID</th>
          <th>Payment Method</th>
          <th>Action</th>
        </tr>


        ';

        $sql = 'select * from event';

        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
          echo "<tr>";
          echo "<td>" . $row['ID'] . '</td>';
          echo "<td>" . $row['Name'] . '</td>';
          echo "<td>" . $row['Event_Name'] . '</td>';
          echo "<td>" . $row['Date_of_a_Event'] . '</td>';
          echo "<td>" . $row['Payment_1'] . '</td>';
          echo "<td>" . $row['sgst'] . '</td>';
          echo "<td>" . $row['cgst'] . '</td>';
          echo "<td>" . $row['Payment'] . '</td>';
          echo "<td>" . $row['Payment_id'] . '</td>';
          echo "<td>" . $row['Payment_method'] . '</td>';
          echo "<td><a href='event-update.php?ID=" . $row['ID'] . "' id='update'>Edit</a><a href='event-delect.php?ID=" . $row['ID'] . "'>Delete</a></td>";
        }

        echo '

      </table>

    </div>

  </div>

</body>

</html>

';
}
?>
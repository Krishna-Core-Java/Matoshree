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
  <title>Room</title>
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
      padding: 0.5rem 0.5rem;
    }

    .main a {
      text-decoration: none;
      border: 1px solid black;
      padding: 0.3rem 0.5rem;
      border-radius: 10px;
      color: black;
      background-color: #fa4949;
    }

    #update {
      background-color: #7272f6;
      margin-right: 0.2rem;
    }

    .sp {
      width: 20px;
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

      <h1>Room Booking</h1>

      <div class="room-data">

        <table>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone no</th>
            <th>No of Adult</th>
            <th>No of Children</th>
            <th>No of Room</th>
            <th>Check-In</th>
            <th>Check-Out</th>
            <th>Special Request</th>
            <th>Payment</th>
            <th>Action</th>
          </tr>

         ';

  $sql = 'select * from room';

  $result = mysqli_query($conn, $sql);


  while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row['ID'] . '</td>';
    echo "<td>" . $row['Name'] . '</td>';
    echo "<td>" . $row['Email'] . '</td>';
    echo "<td>" . $row['Number'] . '</td>';
    echo "<td>" . $row['No_of_Adult'] . '</td>';
    echo "<td>" . $row['No_of_Children'] . '</td>';
    echo "<td>" . $row['No_of_Room'] . '</td>';
    echo "<td>" . $row['Check_In'] . '</td>';
    echo "<td>" . $row['Check_Out'] . '</td>';
    echo "<td>" . $row['Special_Requests'] . '</td>';
    echo "<td>" . $row['Payment'] . '</td>';
    echo "<td><a href='room-update.php?ID=" . $row['ID'] . "' id='update'>Edit</a><a href='event-delect.php?ID=" . $row['ID'] . "'>Delete</a></td>";
  }

  echo '

        </table>

      </div>

    </div>

  </div>

</body>

</html>
';
}
?>
<?php

include('conn.php');

$Name = $_POST["name"];
$Email = $_POST["email"];
$Number = $_POST["number"];
$No_of_Adult = $_POST["Guests-Adult"];
$No_of_Children = $_POST["Guests-chil"];
$No_of_Room = $_POST["Room"];
$Check_In = $_POST["Check-in"];
$Check_Out = $_POST["Check-out"];
$subtotal = $_POST['subtotal'];
$sgst = $_POST['sgst'];
$cgst = $_POST['cgst'];
$payment1 = $_POST['amt'] ?? '';
$payment = is_numeric($payment1) ? $payment1 / 100 : 0;
$razorpay_payment_id = $_POST['razorpay_payment_id'] ?? '';
$Special_Requests = $_POST["message"];



$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.razorpay.com/v1/payments/' . $razorpay_payment_id);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_USERPWD, 'rzp_test_jakfrOzlFjmsi9' . ':' . 'oZ3SIiGOghLC1vcT1Hi790ju');
$response = curl_exec($ch);
curl_close($ch);

$paymentDetails = json_decode($response, true);
// Safe access
$payment_method = $paymentDetails['method'] ?? 'unknown';



$sql = "Insert into room (Name, Email, Number, No_of_Adult, No_of_Children, No_of_Room, Check_In, Check_Out, Payment_1, cgst, sgst, Payment, Payment_id, Payment_method, Special_Requests) values ('$Name', '$Email', '$Number', '$No_of_Adult', '$No_of_Children', '$No_of_Room', '$Check_In', '$Check_Out', '$subtotal', '$cgst', '$sgst', '$payment', '$razorpay_payment_id', '$payment_method', '$Special_Requests')";



$result = mysqli_query(mysql: $conn, query: $sql);

header("Location: ../HTML/Book.html");

exit;

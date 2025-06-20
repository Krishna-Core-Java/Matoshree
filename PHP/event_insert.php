<?php
include("conn.php");



$name = $_POST['name'];
$email = $_POST['email'];
$Number = $_POST['number'];
$event = $_POST['event'];
$guest = $_POST['guest'];
$date = $_POST['date'];
$message = $_POST['message'];
$subtotal = $_POST['subtotal'];
$sgst = $_POST['sgst'];
$cgst = $_POST['cgst'];
$payment1 = $_POST['amt'] ?? '';
$payment = is_numeric($payment1) ? $payment1 / 100 : 0;
$razorpay_payment_id = $_POST['razorpay_payment_id'] ?? '';


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.razorpay.com/v1/payments/' . $razorpay_payment_id);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_USERPWD, 'rzp_test_jakfrOzlFjmsi9' . ':' . 'oZ3SIiGOghLC1vcT1Hi790ju');
$response = curl_exec($ch);
curl_close($ch);


$paymentDetails = json_decode($response, true);
$payment_method = $paymentDetails['method'] ?? 'unknown';


$sql = "INSERT INTO event (Name, Email, Number, Event_Name, Number_of_Guest, Date_of_a_Event,Payment_1,cgst,sgst, Payment, Payment_id, Payment_method, Special_Requests) VALUES ('$name', '$email', '$Number', '$event', '$guest', '$date','$subtotal','$cgst','$sgst', '$payment', '$razorpay_payment_id', '$payment_method', '$message')";

$result = mysqli_query($conn, $sql);

header("Location: ../HTML/Event.html");
exit;

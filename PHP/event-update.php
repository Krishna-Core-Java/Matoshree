<?php
include('conn.php');

// Initialize variables
$ID = $_GET['ID'];
$update_success = false;
$error = '';

// If form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $Name = $_POST['Name'];
    $Email = $_POST['Email'];
    $Number = $_POST['Number'];
    $event_type = $_POST['event'];
    $Number_of_Guest = $_POST['Number_of_Guest'];
    $Date_of_a_Event = $_POST['Date_of_a_Event'];
    $Special_Requests = $_POST['Special_Requests'];
    $payment = $_POST['payment'];
    $subtotal = $_POST['Payment_1'];
    $sgst = $_POST['sgst'];
    $cgst = $_POST['cgst'];


    // Update query
    $sql = "UPDATE event SET 
            Name='$Name', 
            Email='$Email', 
            Number='$Number', 
            Event_Name='$event_type', 
            Number_of_Guest=$Number_of_Guest, 
            Date_of_a_Event='$Date_of_a_Event', 
            Special_Requests='$Special_Requests', 
            payment='$payment',
            Payment_1='$subtotal',
            sgst='$sgst',
            cgst='$cgst'
            WHERE ID=$ID";

    if ($conn->query($sql)) {
        $update_success = true;
        header("Location: admin_event.php");
    } else {
        $error = "Error updating record: " . $conn->error;
    }
}

// Fetch event data
if ($ID > 0) {
    $sql = "SELECT * FROM event WHERE ID = $ID";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $Name = $row['Name'];
        $Email = $row['Email'];
        $Number = $row['Number'];
        $event_type = $row['Event_Name']; // Now storing event type
        $Number_of_Guest = $row['Number_of_Guest'];
        $Date_of_a_Event = $row['Date_of_a_Event'];
        $Special_Requests = $row['Special_Requests'];
        $payment = $row['Payment'];
        $subtotal = $row['Payment_1'];
        $sgst = $row['sgst'];
        $cgst = $row['cgst'];
    } else {
        $error = "No event found with ID: $ID";
        $ID = 0; // Reset ID if not found
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Update Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 0 auto;
            padding: 30px;
        }

        .form-container {
            padding: 1rem;
            box-shadow: 0px 0px 10px black;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        input[type="number"],
        input[type="date"],
        input[type="tel"],
        select,
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        textarea {
            height: 100px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 10px;
        }

        button:hover {
            background-color: #45a049;
        }

        .success {
            color: green;
            margin-bottom: 15px;
            padding: 10px;
            background-color: #e6ffe6;
        }

        .error {
            color: red;
            margin-bottom: 15px;
            padding: 10px;
            background-color: #ffebeb;
        }

        .form-container {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 5px;
        }

        .form-row {
            display: flex;
            gap: 15px;
        }

        .form-row .form-group {
            flex: 1;
        }
    </style>
</head>

<body>
    <div class="form-container">
        <h1>Update Event Information</h1>

        <?php if ($ID > 0): ?>
            <form method="post" action="">
                <input type="hidden" name="ID" value="<?php echo $ID; ?>">

                <div class="form-row">
                    <div class="form-group">
                        <label for="Name">Name:</label>
                        <input type="text" id="Name" name="Name" value="<?php echo htmlspecialchars($Name); ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="Email">Email:</label>
                        <input type="email" id="Email" name="Email" value="<?php echo htmlspecialchars($Email); ?>" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="Number">Phone Number:</label>
                        <input type="tel" id="Number" name="Number" value="<?php echo htmlspecialchars($Number); ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="event">Event Type:</label>
                        <select name="event" id="event" required>
                            <option value="">Select an event type</option>
                            <option value="wedding" <?php echo ($event_type == 'wedding') ? 'selected' : ''; ?>>Wedding</option>
                            <option value="birthday" <?php echo ($event_type == 'birthday') ? 'selected' : ''; ?>>Birthday Party</option>
                            <option value="corporate" <?php echo ($event_type == 'corporate') ? 'selected' : ''; ?>>Corporate Event</option>
                            <option value="family-reunion" <?php echo ($event_type == 'family-reunion') ? 'selected' : ''; ?>>Family Reunion</option>
                            <option value="anniversary" <?php echo ($event_type == 'anniversary') ? 'selected' : ''; ?>>Anniversary Celebration</option>
                            <option value="baby-shower" <?php echo ($event_type == 'baby-shower') ? 'selected' : ''; ?>>Baby Shower</option>
                            <option value="engagement" <?php echo ($event_type == 'engagement') ? 'selected' : ''; ?>>Engagement Party</option>
                            <option value="retreat" <?php echo ($event_type == 'retreat') ? 'selected' : ''; ?>>Wellness Retreat</option>
                            <option value="conference" <?php echo ($event_type == 'conference') ? 'selected' : ''; ?>>Conference/Seminar</option>
                            <option value="holiday-party" <?php echo ($event_type == 'holiday-party') ? 'selected' : ''; ?>>Holiday Party</option>
                            <option value="other" <?php echo ($event_type == 'other') ? 'selected' : ''; ?>>Other</option>
                        </select>
                    </div>
                </div>

                <div class="form-row">

                    <div class="form-group">
                        <label for="Number_of_Guest">Number of Guests:</label>
                        <input type="number" id="Number_of_Guest" name="Number_of_Guest"
                            value="<?php echo htmlspecialchars($Number_of_Guest); ?>" required min="1">
                    </div>

                    <div class="form-group">
                        <label for="Date_of_a_Event">Event Date:</label>
                        <input type="date" id="Date_of_a_Event" name="Date_of_a_Event"
                            value="<?php echo htmlspecialchars($Date_of_a_Event); ?>" required>
                    </div>
                </div>

                <div class="form-row">

                    <div class="form-group">
                        <label for="Payment_1">Gross Payment Amount (₹):</label>
                        <input type="number" id="Payment_1" name="Payment_1"
                            value="<?php echo htmlspecialchars($subtotal); ?>" required min="0">
                    </div>

                    <div class="form-group">
                        <label for="payment">Total Payment Amount (₹):</label>
                        <input type="number" id="payment" name="payment"
                            value="<?php echo htmlspecialchars($payment); ?>" required min="0">
                    </div>

                </div>

                <div class="form-row">

                    <div class="form-group">
                        <label for="sgst">SGST Amount (₹) (9%):</label>
                        <input type="number" id="sgst" name="sgst"
                            value="<?php echo htmlspecialchars($sgst); ?>" required min="0" >
                    </div>

                    <div class="form-group">
                        <label for="cgst">CGST Amount (₹) (9%):</label>
                        <input type="number" id="cgst" name="cgst"
                            value="<?php echo htmlspecialchars($cgst); ?>" required min="0" >
                    </div>

                </div>

                <div class="form-group">
                    <label for="Special_Requests">Special Requests:</label>
                    <textarea id="Special_Requests" name="Special_Requests"><?php echo htmlspecialchars($Special_Requests); ?></textarea>
                </div>

                <button type="submit">Update Event</button>
            </form>

        <?php endif; ?>
    </div>
</body>

</html>
<?php
include('conn.php');

// Initialize variables
$ID = $_GET['ID'];
$update_success = false;
$error = '';

// If form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $Name = $_POST["Name"];
    $Email = $_POST["Email"];
    $Number = $_POST["Number"];
    $No_of_Adult = $_POST["No_of_Adult"];
    $No_of_Children = $_POST["No_of_Children"];
    $No_of_Room = $_POST["No_of_Room"];
    $Check_In = $_POST["Check_In"];
    $Check_Out = $_POST["Check_Out"];
    $Special_Requests = $_POST["Special_Requests"];
    $payment = $_POST['Payment'];
    $subtotal = $_POST['Payment_1'];
    $sgst = $_POST['sgst'];
    $cgst = $_POST['cgst'];

    // Update query
    $sql = "UPDATE room SET 
    Name='$Name', 
    Email='$Email', 
    Number='$Number', 
    No_of_Adult=' $No_of_Adult',
    No_of_Children='$No_of_Children',
    No_of_Room='$No_of_Room',
    Check_In='$Check_In',
    Check_Out='$Check_Out',
    Special_Requests='$Special_Requests', 
    Payment='$payment',
    Payment_1='$subtotal',
    sgst='$sgst',
    cgst='$cgst'
    WHERE ID=$ID";

    if ($conn->query($sql)) {
        $update_success = true;
        header("Location: admin_Room.php");
    } else {
        $error = "Error updating record: " . $conn->error;
    }
}


// Fetch event data
if ($ID > 0) {
    $sql = "SELECT * FROM room WHERE ID = $ID";
    $result = $conn->query($sql);

    // In your fetch data section, ensure all variables are set:
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $Name = $row['Name'];
        $Email = $row['Email'];
        $Number = $row['Number']; // Add this line
        $No_of_Adult = $row['No_of_Adult'];
        $No_of_Children = $row['No_of_Children'];
        $No_of_Room = $row['No_of_Room'];
        $Check_In = $row['Check_In'];
        $Check_Out = $row['Check_Out'];
        $Special_Requests = $row['Special_Requests'];
        $payment = $row['Payment'];
        $subtotal = $row['Payment_1'];
        $sgst = $row['sgst'];
        $cgst = $row['cgst'];
    } else {
        $error = "No room found with ID: $ID";
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
    <title><?php echo $ID > 0 ? 'Update' : 'New'; ?> Room Booking</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 0 auto;
            padding: 1rem;
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
        <h1>Update Room Information</h1>

        <?php if ($ID > 0): ?>
            <form method="post" action="">

                <input type="hidden" name="ID" value="<?php echo $ID; ?>">


                <div class="form-row">
                    <div class="form-group">
                        <label for="Name">Full Name:</label>
                        <input type="text" id="Name" name="Name" value="<?php echo htmlspecialchars($Name); ?>" placeholder="Enter your name" required>
                    </div>

                    <div class="form-group">
                        <label for="Email">Email Address:</label>
                        <input type="email" id="Email" name="Email" value="<?php echo htmlspecialchars($Email); ?>" placeholder="Enter your email" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="Number">Phone Number:</label>
                        <input type="text" id="Number" name="Number" value="<?php echo htmlspecialchars($Number); ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="No_of_Room">Number of Rooms:</label>
                        <select name="No_of_Room" id="No_of_Room" required>
                            <option value="">Select number of rooms</option>
                            <option value="1" <?php echo ($No_of_Room == '1') ? 'selected' : ''; ?>>1 Room</option>
                            <option value="2" <?php echo ($No_of_Room == '2') ? 'selected' : ''; ?>>2 Rooms</option>
                            <option value="3" <?php echo ($No_of_Room == '3') ? 'selected' : ''; ?>>3 Rooms</option>
                            <option value="4" <?php echo ($No_of_Room == '4') ? 'selected' : ''; ?>>4 Rooms</option>
                            <option value="5" <?php echo ($No_of_Room == '5') ? 'selected' : ''; ?>>5 Rooms</option>
                            <option value="6" <?php echo ($No_of_Room == '6') ? 'selected' : ''; ?>>6 Rooms</option>
                            <option value="7" <?php echo ($No_of_Room == '7') ? 'selected' : ''; ?>>7 Rooms</option>
                            <option value="8" <?php echo ($No_of_Room == '8') ? 'selected' : ''; ?>>8 Rooms</option>
                            <option value="9" <?php echo ($No_of_Room == '9') ? 'selected' : ''; ?>>9 Rooms</option>
                            <option value="10" <?php echo ($No_of_Room == '10') ? 'selected' : ''; ?>>10 Rooms</option>
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="No_of_Adult">Number of Adults:</label>
                        <select name="No_of_Adult" id="No_of_Adult" required>
                            <option value="">Select number of adults</option>
                            <option value="1" <?php echo ($No_of_Adult == '1') ? 'selected' : ''; ?>>1 Adult</option>
                            <option value="2" <?php echo ($No_of_Adult == '2') ? 'selected' : ''; ?>>2 Adults</option>
                            <option value="3" <?php echo ($No_of_Adult == '3') ? 'selected' : ''; ?>>3 Adults</option>
                            <option value="4" <?php echo ($No_of_Adult == '4') ? 'selected' : ''; ?>>4 Adults</option>
                            <option value="5" <?php echo ($No_of_Adult == '5') ? 'selected' : ''; ?>>5 Adults</option>
                            <option value="6" <?php echo ($No_of_Adult == '6') ? 'selected' : ''; ?>>6 Adults</option>
                            <option value="7" <?php echo ($No_of_Adult == '7') ? 'selected' : ''; ?>>7 Adults</option>
                            <option value="8" <?php echo ($No_of_Adult == '8') ? 'selected' : ''; ?>>8 Adults</option>
                            <option value="9" <?php echo ($No_of_Adult == '9') ? 'selected' : ''; ?>>9 Adults</option>
                            <option value="10" <?php echo ($No_of_Adult == '10') ? 'selected' : ''; ?>>10 Adults</option>
                            <option value="+10" <?php echo ($No_of_Adult == '+10') ? 'selected' : ''; ?>>More than 10 Adults</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="No_of_Children">Number of Children:</label>
                        <select name="No_of_Children" id="No_of_Children">
                            <option value="0" <?php echo ($No_of_Children == '0') ? 'selected' : ''; ?>>No Children</option>
                            <option value="1" <?php echo ($No_of_Children == '1') ? 'selected' : ''; ?>>1 Children</option>
                            <option value="2" <?php echo ($No_of_Children == '2') ? 'selected' : ''; ?>>2 Children</option>
                            <option value="3" <?php echo ($No_of_Children == '3') ? 'selected' : ''; ?>>3 Children</option>
                            <option value="4" <?php echo ($No_of_Children == '4') ? 'selected' : ''; ?>>4 Children</option>
                            <option value="5" <?php echo ($No_of_Children == '5') ? 'selected' : ''; ?>>5 Children</option>
                            <option value="6" <?php echo ($No_of_Children == '6') ? 'selected' : ''; ?>>6 Children</option>
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="Check_In">Check-in Date:</label>
                        <input type="date" id="Check_In" name="Check_In" value="<?php echo htmlspecialchars($Check_In); ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="Check_Out">Check-out Date:</label>
                        <input type="date" id="Check_Out" name="Check_Out" value="<?php echo htmlspecialchars($Check_Out); ?>" required>
                    </div>
                </div>

                <div class="form-row">

                    <div class="form-group">
                        <label for="Payment_1">Gross Payment Amount (₹):</label>
                        <input type="number" id="Payment_1" name="Payment_1"
                            value="<?php echo htmlspecialchars($subtotal); ?>" required min="0" >
                    </div>

                    <div class="form-group">
                        <label for="Payment">Total Payment Amount (₹):</label>
                        <input type="number" id="Payment" name="Payment"
                            value="<?php echo htmlspecialchars($payment); ?>" required min="0" >
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
                    <textarea id="Special_Requests" name="Special_Requests" placeholder="Any special requests?"><?php echo htmlspecialchars($Special_Requests); ?></textarea>
                </div>

                <button type="submit"><?php echo $ID > 0 ? 'Update' : 'Submit'; ?> Booking</button>
            </form>

        <?php endif; ?>


    </div>
</body>

</html>
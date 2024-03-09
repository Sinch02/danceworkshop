<?php
include 'connect.php';

// Error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

$id = $_GET['updateid'];

// Fetch payment details
$sql = "SELECT * FROM payments WHERE payment_id=$id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$payment_id = $row['payment_id'];
$participant_id = $row['participant_id'];
$payment_date = $row['payment_date'];
$amount = $row['amount'];

if(isset($_POST['submit'])) {
    $payment_id = $_POST['payment_id'];
    $participant_id = $_POST['participant_id'];
    $payment_date = $_POST['payment_date'];
    $amount = $_POST['amount'];

    // Update payment details
    $sql = "UPDATE payments SET participant_id='$participant_id', payment_date='$payment_date', amount='$amount' WHERE payment_id=$payment_id";
    $result = mysqli_query($conn, $sql);

    if($result) {
        header('location:padisplay.php');
        exit(); // Ensure no further code execution after redirect
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Payment</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: rgba(255, 255, 255, 0.5); /* Transparent background */
        }

        .container {
            margin-top: 50px;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: rgba(255, 255, 255, 0.5); /* Transparent background */
        }

        h2 {
            text-align: center;
        }

        .form-group label {
            font-weight: bold;
        }

        .form-control {
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .btn {
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container my-5">
        <h2>Update Payment details</h2>
        
<form method="post">
  <div class="form-group">
    <label>Payment ID</label>
    <input type="number" class="form-control" placeholder="Enter the payment id" name="payment_id" value=<?php echo $payment_id;?>>
</div>

<div class="form-group">
    <label>Participant ID</label>
    <input type="number" class="form-control" placeholder="Enter the participant id" name="participant_id" value=<?php echo $participant_id;?>>
</div>

<div class="form-group">
    <label>Payment Date</label>
    <input type="date" class="form-control" name="payment_date" value=<?php echo $payment_date;?>>
</div>

<div class="form-group">
    <label>Amount</label>
    <input type="number" class="form-control" placeholder="Enter the amount" name="amount" value=<?php echo $amount;?>>
</div>
  <button type="submit" class="btn btn-primary" name="submit">Update</button>
</form>
    </div>
</body>
</html>

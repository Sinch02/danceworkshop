<?php
include 'connect.php'; // Ensure this includes the correct connection file

if(isset($_POST['submit'])) {
    $payment_id = $_POST['payment_id'];
    $participant_id = $_POST['participant_id'];
    $payment_date = $_POST['payment_date'];
    $amount = $_POST['amount'];

    // Check if the participant_id exists in the participants table
    $check_participant_sql = "SELECT participant_id FROM participants WHERE participant_id = $participant_id";
    $check_participant_result = mysqli_query($conn, $check_participant_sql);

    if(mysqli_num_rows($check_participant_result) > 0) {
        // Participant exists, proceed with payment insertion
        $insert_payment_sql = "INSERT INTO payments (payment_id, participant_id, payment_date, amount) 
                               VALUES ('$payment_id', '$participant_id', '$payment_date', '$amount')";
        
        $insert_payment_result = mysqli_query($conn, $insert_payment_sql);

        if($insert_payment_result) {
            // echo "Data inserted successfully";
            header('location: padisplay.php');
        } else {
            echo "Error inserting payment: " . mysqli_error($conn); // Display error message
        }
    } else {
        // Participant does not exist, show error message
        echo "Participant with ID $participant_id does not exist.";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Payment</title>
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
        <h2>Add Payment details</h2>
        
<form method="post">
  <div class="form-group">
    <label>Payment id</label>
    <input type="number" class="form-control" placeholder="Enter the payment id" name="payment_id">
</div>

<div class="form-group">
    <label>Participant ID</label>
    <input type="number" class="form-control" placeholder="Enter the participant id" name="participant_id">
</div>

<div class="form-group">
    <label>Payment Date</label>
    <input type="date" class="form-control" name="payment_date">
</div>

<div class="form-group">
    <label>Amount</label>
    <input type="number" class="form-control" placeholder="Enter the amount" name="amount">
</div>
  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>
    </div>
</body>
</html>

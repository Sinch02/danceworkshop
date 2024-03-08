<?php
include 'connect.php';

if(isset($_POST['submit'])) {
    $participant_id = $_POST['participant_id'];
    $workshop_id = $_POST['workshop_id'];
    $participant_name = $_POST['participant_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    // Check if the workshop_id exists in the workshops table
    $check_sql = "SELECT workshop_id FROM workshops WHERE workshop_id = $workshop_id";
    $check_result = mysqli_query($conn, $check_sql);
    if(mysqli_num_rows($check_result) == 0) {
        echo "Error: Workshop ID does not exist.";
        exit;
    }

    $sql = "INSERT INTO participants (participant_id, workshop_id, participant_name, email, phone) VALUES ('$participant_id', '$workshop_id', '$participant_name', '$email', '$phone')";
    
    $result = mysqli_query($conn, $sql);

    if($result) {
        // echo "Data inserted successfully";
        header('location:pdisplay.php');
    } else {
        echo "Error: " . mysqli_error($conn); // Display error message
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Participant</title>
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
        <h2>Add Participant details</h2>
        
        <form method="post">
            <div class="form-group">
                <label>Participant ID</label>
                <input type="number" class="form-control" placeholder="Enter participant ID" name="participant_id">
            </div>

            <div class="form-group">
                <label>Workshop ID</label>
                <input type="number" class="form-control" placeholder="Enter workshop ID" name="workshop_id">
            </div>

            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" placeholder="Enter participant name" name="participant_name">
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" placeholder="Enter email" name="email">
            </div>

            <div class="form-group">
                <label>Phone</label>
                <input type="text" class="form-control" placeholder="Enter phone number" name="phone">
            </div>

            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>
</body>
</html>

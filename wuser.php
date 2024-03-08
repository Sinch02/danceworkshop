<?php
include 'connect.php'; // Ensure this includes the correct connection file

if(isset($_POST['submit'])) {
    $workshop_id = $_POST['workshop_id'];
    $workshop_name = $_POST['workshop_name'];
    $instructor = $_POST['instructor'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $location = $_POST['location'];
    $price = $_POST['price'];

    $sql = "INSERT INTO workshops (workshop_id, workshop_name, instructor, date, time, location, price) VALUES ('$workshop_id', '$workshop_name', '$instructor', '$date', '$time', '$location', '$price')";
    
    $result = mysqli_query($conn, $sql);

    if($result) {
        header('location:wdisplay.php');
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
    <title>Add Workshop</title>
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
        <h2>Add Workshop details</h2>
        
        <form method="post">
            <div class="form-group">
                <label>Workshop ID</label>
                <input type="number" class="form-control" placeholder="Enter workshop ID" name="workshop_id">
            </div>

            <div class="form-group">
                <label>Workshop Name</label>
                <input type="text" class="form-control" placeholder="Enter workshop name" name="workshop_name">
            </div>

            <div class="form-group">
                <label>Instructor</label>
                <input type="text" class="form-control" placeholder="Enter instructor" name="instructor">
            </div>

            <div class="form-group">
                <label>Date</label>
                <input type="date" class="form-control" name="date">
            </div>

            <div class="form-group">
                <label>Time</label>
                <input type="time" class="form-control" name="time">
            </div>

            <div class="form-group">
                <label>Location</label>
                <input type="text" class="form-control" placeholder="Enter location" name="location">
            </div>

            <div class="form-group">
                <label>Price</label>
                <input type="number" class="form-control" placeholder="Enter price" name="price">
            </div>

            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>
</body>
</html>

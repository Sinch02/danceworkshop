<?php
include 'connect.php'; // Ensure this includes the correct connection file

if(isset($_POST['submit'])) {
    $instructor_id = $_POST['instructor_id'];
    $instructor_name = $_POST['instructor_name'];
    $specialization = $_POST['specialization'];

    $sql = "INSERT INTO instructors (instructor_id, instructor_name, specialization) VALUES ('$instructor_id', '$instructor_name', '$specialization')";
    
    $result = mysqli_query($conn, $sql);

    if($result) {
        echo "Data inserted successfully";
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
    <title>Add Instructor</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
        <h2>Add Instructor details</h2>
        
<form method="post">
  <div class="form-group">
    <label>Instructor id</label>
    <input type="number" class="form-control" placeholder="Enter the instructor id" name="instructor_id">
</div>

<div class="form-group">
    <label>Name</label>
    <input type="text" class="form-control" placeholder="Enter the instructor name" name="instructor_name">
</div>

<div class="form-group">
    <label>Specialization</label>
    <input type="text" class="form-control" placeholder="Enter specialization" name="specialization">
</div>
  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>
    </div>
</body>
</html>

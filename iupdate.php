<?php
include 'connect.php';
$id = $_GET['updateid'];
$sql = "SELECT * FROM instructors WHERE instructor_id=$id";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$instructor_id = $row['instructor_id'];
$instructor_name = $row['instructor_name'];
$specialization = $row['specialization'];

$id=$_GET['updateid'];
if(isset($_POST['submit'])) {
    $instructor_id = $_POST['instructor_id'];
    $instructor_name = $_POST['instructor_name'];
    $specialization = $_POST['specialization'];

    // Use the correct SQL syntax for updating a record
    $sql = "UPDATE instructors SET instructor_name='$instructor_name', specialization='$specialization' WHERE instructor_id=$instructor_id";
    
    $result = mysqli_query($conn, $sql);

    if($result) {
        //echo "Updated successfully";
       header('location:idisplay.php');
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
        <h2>Update Instructor details</h2>
        
<form method="post">
  <div class="form-group">
    <label>Instructor id</label>
    <input type="number" class="form-control" placeholder="Enter the instructor id" name="instructor_id" value=<?php echo $instructor_id;?>>
</div>

<div class="form-group">
    <label>Name</label>
    <input type="text" class="form-control" placeholder="Enter the instructor name" name="instructor_name" value=<?php echo $instructor_name;?>>
</div>

<div class="form-group">
    <label>Specialization</label>
    <input type="text" class="form-control" placeholder="Enter specialization" name="specialization" value=<?php echo $specialization;?>>
</div>
  <button type="submit" class="btn btn-primary" name="submit">Update</button>
</form>
    </div>
</body>
</html>
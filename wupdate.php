<?php
include 'connect.php';
$id = $_GET['updateid'];
$sql = "SELECT * FROM workshops WHERE workshop_id=$id";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$workshop_id = $row['workshop_id'];
$workshop_name = $row['workshop_name'];
$instructor = $row['instructor'];
$date = $row['date'];
$time = $row['time'];
$location = $row['location'];
$price = $row['price'];

if(isset($_POST['submit'])) {
    $workshop_id = $_POST['workshop_id'];
    $workshop_name = $_POST['workshop_name'];
    $instructor = $_POST['instructor'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $location = $_POST['location'];
    $price = $_POST['price'];

    $sql = "UPDATE workshops SET workshop_name='$workshop_name', instructor='$instructor', date='$date', time='$time', location='$location', price='$price' WHERE workshop_id=$workshop_id";
    
    $result = mysqli_query($conn, $sql);

    if($result) {
        //echo "Updated successfully";
        header('location:wdisplay.php');
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
    <title>Update Workshop</title>
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
        <h2>Update Workshop details</h2>
        
        <form method="post">
            <div class="form-group">
                <label>Workshop ID</label>
                <input type="number" class="form-control" placeholder="Enter the workshop ID" name="workshop_id" value=<?php echo $workshop_id;?>>
            </div>

            <div class="form-group">
                <label>Workshop Name</label>
                <input type="text" class="form-control" placeholder="Enter the workshop name" name="workshop_name" value=<?php echo $workshop_name;?>>
            </div>

            <div class="form-group">
                <label>Instructor</label>
                <input type="text" class="form-control" placeholder="Enter instructor's name" name="instructor" value=<?php echo $instructor;?>>
            </div>

            <div class="form-group">
                <label>Date</label>
                <input type="date" class="form-control" name="date" value=<?php echo $date;?>>
            </div>

            <div class="form-group">
                <label>Time</label>
                <input type="time" class="form-control" name="time" value=<?php echo $time;?>>
            </div>

            <div class="form-group">
                <label>Location</label>
                <input type="text" class="form-control" placeholder="Enter location" name="location" value=<?php echo $location;?>>
            </div>

            <div class="form-group">
                <label>Price</label>
                <input type="number" class="form-control" placeholder="Enter price" name="price" value=<?php echo $price;?>>
            </div>

            <button type="submit" class="btn btn-primary" name="submit">Update</button>
        </form>
    </div>
</body>
</html>

<?php
include 'connect.php';

if(isset($_GET['updateid'])) {
    $id = $_GET['updateid'];

    // Prepare the SQL statement to fetch the participant details
    $sql = "SELECT * FROM participants WHERE participant_id=?";
    
    // Prepare the statement
    $stmt = mysqli_prepare($conn, $sql);
    
    // Bind the parameter
    mysqli_stmt_bind_param($stmt, "i", $id);
    
    // Execute the statement
    mysqli_stmt_execute($stmt);
    
    // Get the result
    $result = mysqli_stmt_get_result($stmt);

    // Fetch the row
    $row = mysqli_fetch_assoc($result);

    // Check if participant details are found
    if($row) {
        // Retrieve participant details
        $participant_id = $row['participant_id'];
        $workshop_id = $row['workshop_id'];
        $participant_name = $row['participant_name'];
        $email = $row['email'];
        $phone = $row['phone'];

        if(isset($_POST['submit'])) {
            // Retrieve updated values from the form
            $workshop_id = $_POST['workshop_id'];
            $participant_name = $_POST['participant_name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];

            // Prepare the SQL statement for updating participant details
            $sql = "UPDATE participants SET workshop_id=?, participant_name=?, email=?, phone=? WHERE participant_id=?";
            
            // Prepare the statement
            $stmt = mysqli_prepare($conn, $sql);
            
            // Bind parameters
            mysqli_stmt_bind_param($stmt, "isssi", $workshop_id, $participant_name, $email, $phone, $participant_id);
            
            // Execute the statement
            $result = mysqli_stmt_execute($stmt);

            if($result) {
                // Redirect to display page after successful update
                header('location:pdisplay.php');
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        }
    } else {
        echo "Participant not found!";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Participant</title>
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
        <h2>Update Participant details</h2>
        
        <form method="post">
            <div class="form-group">
                <label>Participant ID</label>
                <input type="number" class="form-control" placeholder="Enter participant ID" name="participant_id" value=<?php echo $participant_id;?>>
            </div>

            <div class="form-group">
                <label>Workshop ID</label>
                <input type="number" class="form-control" placeholder="Enter workshop ID" name="workshop_id" value=<?php echo $workshop_id;?>>
            </div>

            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" placeholder="Enter participant name" name="participant_name" value=<?php echo $participant_name;?>>
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" placeholder="Enter email" name="email" value=<?php echo $email;?>>
            </div>

            <div class="form-group">
                <label>Phone</label>
                <input type="text" class="form-control" placeholder="Enter phone number" name="phone" value=<?php echo $phone;?>>
            </div>

            <button type="submit" class="btn btn-primary" name="submit">Update</button>
        </form>
    </div>
</body>
</html>

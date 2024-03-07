<?php
include 'connect.php';

$instructor_id = $_GET['updateid'];
$sql = "SELECT * FROM instructors WHERE instructor_id=$instructor_id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$instructor_id = $row['instructor_id'];
$instructor_name = $row['instructor_name'];
$specialization = $row['specialization'];

if(isset($_POST['submit'])){
    $newInstructorId = $_POST['instructor_id'];
    $instructor_name = $_POST['instructor_name'];
    $specialization = $_POST['specialization'];

    $sql = "UPDATE instructors SET instructor_id='$newInstructorId', instructor_name='$instructor_name', specialization='$specialization' WHERE instructor_id=$instructor_id";
    $result = mysqli_query($conn, $sql);
    
    if($result){
        header('location: display_instructors.php');
        exit;
    } else {
        die(mysqli_error($conn));
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <title>Update Instructor</title>
</head>
<body>
    <div class="container">
        <h2>Update Instructor</h2>
        <form method="post">
            <div class="form-group">
                <label>Instructor ID</label>
                <input type="number" class="form-control" placeholder="Enter instructor ID" name="instructor_id" autocomplete="off" value="<?php echo $instructor_id; ?>">
            </div>
            <div class="form-group">
                <label>Instructor Name</label>
                <input type="text" class="form-control" placeholder="Enter instructor name" name="instructor_name" autocomplete="off" value="<?php echo $instructor_name; ?>">
            </div>
            <div class="form-group">
                <label>Specialization</label>
                <input type="text" class="form-control" placeholder="Enter specialization" name="specialization" autocomplete="off" value="<?php echo $specialization; ?>">
            </div>
            <button type="submit" class="btn btn-success" name="submit">Update</button>
        </form>
    </div>
</body>
</html>

<?php
include 'connect.php';

if(isset($_GET['deleteid'])) {
    $instructor_id = $_GET['deleteid'];

    $sql = "DELETE FROM `instructors` WHERE instructor_id = $instructor_id";

    $result = mysqli_query($conn, $sql);
    if($result) {
        //echo "Instructor deleted successfully";
        header('location:idisplay.php');
        
    } else {
        die("Connection failed: " . $conn->connect_error);
    }
}
?>


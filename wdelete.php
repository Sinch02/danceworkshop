<?php
include 'connect.php';

if(isset($_GET['deleteid'])) {
    $workshop_id = $_GET['deleteid'];

    $sql = "DELETE FROM `workshops` WHERE workshop_id = $workshop_id";

    $result = mysqli_query($conn, $sql);
    if($result) {
        //echo "Workshop deleted successfully";
        header('location:wdisplay.php');
    } else {
        die("Error: " . mysqli_error($conn));
    }
}
?>

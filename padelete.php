<?php
include 'connect.php';

if(isset($_GET['deleteid'])) {
    $payment_id = $_GET['deleteid'];

    $sql = "DELETE FROM `payments` WHERE payment_id = $payment_id";

    $result = mysqli_query($conn, $sql);
    if($result) {
        //echo "Payment deleted successfully";
        header('location:padisplay.php');
        
    } else {
        die("Connection failed: " . $conn->connect_error);
    }
}
?>

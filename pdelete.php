<?php
include 'connect.php';

if(isset($_GET['deleteid'])) {
    $participant_id = $_GET['deleteid'];

    $sql = "DELETE FROM participants WHERE participant_id = $participant_id";

    $result = mysqli_query($conn, $sql);
    if($result) {
        //echo "Participant deleted successfully";
        header('location:pdisplay.php');
    } else {
        die("Connection failed: " . $conn->connect_error);
    }
}
?>

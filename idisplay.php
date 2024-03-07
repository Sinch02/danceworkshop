<?php
include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instructors</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <button class="btn btn-success my-5"><a href="iuser.php" class="text-light">Add Instructor</a></button>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Instructor ID</th>
                    <th scope="col">Instructor Name</th>
                    <th scope="col">Specialization</th>
                    <th scope="col">Operations</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM `instructors`";
                $result = mysqli_query($conn, $sql);
                if ($result && mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $instructor_id = $row['instructor_id'];
                        $instructor_name = $row['instructor_name'];
                        $specialization = $row['specialization'];
                        echo '<tr>
                        <td>' . $instructor_id . '</td>
                        <td>' . $instructor_name . '</td>
                        <td>' . $specialization . '</td>
                        <td>
                            <button class="btn btn-success"><a href="iupdate.php?instructor_id=' . $instructor_id . '" class="text-light">Update</a></button>
                            <button class="btn btn-danger"><a href="delete_instructor.php?instructor_id=' . $instructor_id . '" class="text-light">Delete</a></button>
                        </td>
                        </tr>';
                    }
                } else {
                    echo '<tr><td colspan="4">No instructors found.</td></tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>

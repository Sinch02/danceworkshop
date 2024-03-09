<?php
include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payments</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            color: #333;
        }

        .container {
            padding: 20px;
            margin-top: 50px;
        }

        .btn {
            border-radius: 20px;
            padding: 10px 20px;
            margin-right: 10px;
            font-weight: bold;
            text-transform: uppercase;
        }

        .btn a {
            color: #fff;
            text-decoration: none;
        }

        .btn-success {
            background-color: #2ecc71;
            border-color: #27ae60;
        }

        .btn-primary {
            background-color: #3498db;
            border-color: #2980b9;
        }

        .table {
            background-color: #fff;
            border-radius: 10px;
        }

        .table th,
        .table td {
            border: none;
            font-weight: bold;
        }

        .table th {
            background-color: #3498db;
            color: #fff;
        }

        .table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .table tbody tr:hover {
            background-color: #e5e5e5;
        }

        .btn-update,
        .btn-delete {
            padding: 5px 10px;
            margin-right: 5px;
            border-radius: 10px;
            font-size: 12px;
        }

        .btn-update a,
        .btn-delete a {
            color: #fff;
            text-decoration: none;
        }

        .btn-update {
            background-color: #2ecc71;
            border-color: #27ae60;
        }

        .btn-delete {
            background-color: #e74c3c;
            border-color: #c0392b;
        }
    </style>
</head>
<body>
    <div class="container">
        <button class="btn btn-success my-5"><a href="pauser.php" class="text-light">Add Payment</a></button>
        <button class="btn btn-primary my-5"><a href="homepage.html" class="text-light">BACK</a></button>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Payment ID</th>
                    <th scope="col">Participant ID</th>
                    <th scope="col">Payment Date</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Operations</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM `payments`";
                $result = mysqli_query($conn, $sql);
                if ($result && mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $payment_id = $row['payment_id'];
                        $participant_id = $row['participant_id'];
                        $payment_date = $row['payment_date'];
                        $amount = $row['amount'];
                        echo '<tr>
                        <td>' . $payment_id . '</td>
                        <td>' . $participant_id . '</td>
                        <td>' . $payment_date . '</td>
                        <td>' . $amount . '</td>
                        <td>
                            <button class="btn btn-success"><a href="paupdate.php?updateid=' . $payment_id . '" class="text-light">Update</a></button>
                            <button class="btn btn-danger"><a href="padelete.php?deleteid=' . $payment_id . '" class="text-light">Delete</a></button>
                        </td>
                        </tr>';
                    }
                } else {
                    echo '<tr><td colspan="5">No payments found.</td></tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
   
</body>

</html>

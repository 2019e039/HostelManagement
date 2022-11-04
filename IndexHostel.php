<?php
session_start();

include("connection.php");
include("functions.php");

$user_data = check_login($connection);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8>
    <meta http-equiv=" X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hostel Management</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="EditDeleteButton.css">
</head>
<style>
    body {
        margin: 0;
        padding: 0;
        background: url(BackGroundOnly.jpg)no-repeat center center fixed;
        font-family: sans-serif;
        background-size: cover;
    }

    .styled-table {
        border-collapse: collapse;
        margin: 25px 0;
        font-size: 0.9em;
        font-family: sans-serif;
        min-width: 400px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
    }

    .styled-table thead tr {
        background-color: #009879;
        color: #ffffff;
        text-align: left;
    }

    .styled-table th,
    .styled-table td {
        padding: 12px 25px;
    }

    .styled-table tbody tr {
        border-bottom: 1px solid #dddddd;
    }

    .styled-table tbody tr:nth-of-type(even) {
        background-color: #f3f3f3;
    }

    .styled-table tbody tr:last-of-type {
        border-bottom: 2px solid #009879;
    }
</style>

<body>
    <div class="container my-5">
        <h2>List of Hostels</h2>
        <a class="btn btn-head" href="/HostelManagement/HomeEmployee.php" role="button">Home</a>
        <a class="btn btn-head" href="/HostelManagement/AddHostel.php" role="button">New Hostel</a>

        <br>
        <table class="styled-table">
            <thead>
                <tr>
                    <th>HostelID</th>
                    <th>SuperID</th>
                    <th>nRooms</th>
                    <th>nFloors</th>
                    <th>nStudents</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "hostel management system";
                $connection = new mysqli($servername, $username, $password, $database);
                if ($connection->connect_error) {
                    die("Connection failed: " . $connection->connect_error);
                }

                $sql = "SELECT * FROM hostel";
                $result = $connection->query($sql);

                if (!$result) {
                    die("Invalid query: " . $connection->error);
                }

                while ($row = $result->fetch_assoc()) {
                    echo "
                    <tr>
                    <td>$row[HostelID]</td>
                    <td>$row[SuperID]</td>
                    <td>$row[nRooms]</td>
                    <td>$row[nFloors]</td>
                    <td>$row[nStudents]</td>
                    <td>
                        <a class='btn btn-head btn-sm' href='/HostelManagement/UpdateHostel.php?HostelID=$row[HostelID]'>Update</a>
                        <a class='btn btn-delete btn-sm' href='/HostelManagement/DeleteHostel.php?HostelID=$row[HostelID]'>Delete</a>
                    </td>
                    </tr>
                    ";
                }
                ?>

            </tbody>
        </table>
    </div>
</body>

</html>
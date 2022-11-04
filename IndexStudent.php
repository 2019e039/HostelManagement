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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<style>
    body {
        margin: 0;
        padding: 0;
        background: url(BackGroundOnly.jpg)no-repeat center center fixed;
        font-family: sans-serif;
        background-size: cover;
    }
</style>

<body>
    <div class="container my-5">
        <h2>Students</h2>
        <form action="" method="GET">
            <div class="row mb-2">
                <div class="offset-sm-0 row mb-2 col-sm-2">
                    <a class="btn btn-head" href="/HostelManagement/HomeEmployee.php" role="button">Home</a>
                </div>
            </div>
            <div class="row mb-2">
                <div class=" offset-sm-0 col-sm-2 d-grid">
                    <button type="submit" class="btn btn-head">Search</button>
                </div>
                <div class=" offset-sm-0 col-sm-2 d-grid">
                    <input type="text" class="form-control" name="StudentID" value="<?php if (isset($_GET['StudentID'])) {
                                                                                        echo $_GET['StudentID'];
                                                                                    } ?>">
                </div>
            </div>
        </form>
        <form>
            <table class="table">
                <thead>
                </thead>
                <tbody>
                    <?php
                    if (isset($_GET['StudentID'])) {

                        $ID = $_GET['StudentID'];

                        $sql = "SELECT * FROM student WHERE StudentID='$ID' OR RoomID='$ID' OR Fname='$ID' OR Lname='$ID' OR HostelID='$ID'";
                        $result = $connection->query($sql);

                        if (!$result) {
                            die("Invalid query: " . $connection->error);
                        }
                        echo "<tr>
                        <th>StudentID</th>
                        <th>RoomID</th>
                        <th>Fname</th>
                        <th>Lname</th>
                        <th>Age</th>
                        <th>MobileNo</th>
                        <th>Department</th>
                        <th>Status</th>
                        <th>Address</th>
                        <th>HostelID</th> `
                    </tr>";

                        while ($row = $result->fetch_assoc()) {
                            echo "
                    <tr>
                    <td>$row[StudentID]</td>
                    <td>$row[RoomID]</td>
                    <td>$row[Fname]</td>
                    <td>$row[Lname]</td>
                    <td>$row[Age]</td>
                    <td>$row[MobileNo]</td>
                    <td>$row[Department]</td>
                    <td>$row[Status]</td>
                    <td>$row[Address]</td>
                    <td>$row[HostelID]</td>
                    <td>
                        <a class='btn btn-head btn-sm' href='/HostelManagement/UpdateStudent.php?StudentID=$row[StudentID]'>Update</a>
                        <a class='btn btn-delete btn-sm' href='/HostelManagement/DeleteStudent.php?StudentID=$row[StudentID]'>Delete</a>
                    </td>
                    </tr>
                    ";
                        }
                    }
                    ?>

                </tbody>
                <thead>
                    <tr>
                        <th>StudentID</th>
                        <th>RoomID</th>
                        <th>Fname</th>
                        <th>Lname</th>
                        <th>Age</th>
                        <th>MobileNo</th>
                        <th>Department</th>
                        <th>Status</th>
                        <th>Address</th>
                        <th>HostelID</th> `
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

                    $sql = "SELECT * FROM student";
                    $result = $connection->query($sql);

                    if (!$result) {
                        die("Invalid query: " . $connection->error);
                    }

                    while ($row = $result->fetch_assoc()) {
                        echo "
                    <tr>
                    <td>$row[StudentID]</td>
                    <td>$row[RoomID]</td>
                    <td>$row[Fname]</td>
                    <td>$row[Lname]</td>
                    <td>$row[Age]</td>
                    <td>$row[MobileNo]</td>
                    <td>$row[Department]</td>
                    <td>$row[Status]</td>
                    <td>$row[Address]</td>
                    <td>$row[HostelID]</td>
                    <td>
                        <a class='btn btn-update btn-sm' href='/HostelManagement/UpdateStudent.php?StudentID=$row[StudentID]'>Update</a>
                        <a class='btn btn-delete btn-sm' href='/HostelManagement/DeleteStudent.php?StudentID=$row[StudentID]'>Delete</a>
                    </td>
                    </tr>
                    ";
                    }
                    ?>

                </tbody>
            </table>
        </form>
        <br>
    </div>
</body>

</html>
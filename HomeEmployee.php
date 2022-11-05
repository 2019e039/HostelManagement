<?php
session_start();

include("connection.php");
include("functions.php");

$user_data = check_login($connection);

?>

<!DOCTYPE html>
<html>

<head>
    <title>Hostel Management System</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="EditDeleteButton.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body,
        h1 {
            font-family: "Raleway", Arial, sans-serif;
            background: url(BackGroundImage.jpg)no-repeat center center fixed;
            background-size: cover;
        }

        h1 {
            letter-spacing: 6px
        }

        .w3-row-padding img {
            margin-bottom: 12px
        }
    </style>
</head>

<body>
    <div class="w3-content" style="max-width:1500px">
        <header class="w3-panel w3-center" style="padding:128px 16px">
            <h1>EMPLOYEE</h1>
            <div class="w3-padding-32">
                <div class="w3-bar w3-border">
                    <a class="btn btn-head" href="/HostelManagement/index.php" role="button">Home</a>
                    <a class="btn btn-head" href="/HostelManagement/IndexEmployee.php" role="button">Employee Details</a>
                    <a class="btn btn-head" href="/HostelManagement/IndexStudent.php" role="button">Student</a>
                    <a class="btn btn-head" href="/HostelManagement/IndexFurniture.php" role="button">Furniture</a>
                    <a class="btn btn-head" href="/HostelManagement/IndexHostel.php" role="button">Hostel</a>
                    <a class="btn btn-head" href="/HostelManagement/IndexRoom.php" role="button">Room</a>
                    <a class="btn btn-head" href="/HostelManagement/IndexRent.php" role="button">Payment History</a>
                    <a class="btn btn-head" href="/HostelManagement/IndexVisitor.php" role="button">Visitor</a>
                </div>
            </div>
        </header>
</body>

</html>
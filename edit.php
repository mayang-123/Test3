<?php
// Database connection settings
$servername = "localhost";
$username = "maria"; // Update with your database username
$password = "12345"; // Update with your database password
$dbname = "crud_db"; // Database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch record to edit
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM users WHERE id=$id";
    $result = $conn->query($sql);
    $student = $result->fetch_assoc();
}

// Process form submission to update record
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = htmlspecialchars($_POST['firstname']);
    $middlename = htmlspecialchars($_POST['middlename']);
    $lastname = htmlspecialchars($_POST['lastname']);
    $age = htmlspecialchars($_POST['age']);
    $address = htmlspecialchars($_POST['address']);
    $course_section = htmlspecialchars($_POST['course_section']);
    $id = $_POST['id'];

    $sql = "UPDATE users SET firstname='$firstname', middlename='$middlename', lastname='$lastname', age='$age', address='$address', course_section='$course_section' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully. <a href='index.php'>Go back to records</a>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Record</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container my-4">
    <h1>Edit Record</h1>

    <form action="edit.php" method="POST">
        <input type="hidden" name="id" value="<?= $student['id'] ?>">

        <div class="mb-3">
            <label for="firstname" class="form-label">First Name:</label>
            <input type="text" class="form-control" id="firstname" name="firstname" required value="<?= $student['firstname'] ?>">
        </div>

        <div class="mb-3">
            <label for="middlename" class="form-label">Middle Name:</label>
            <input type="text" class="form-control" id="middlename" name="middlename" value="<?= $student['middlename'] ?>">
        </div>

        <div class="mb-3">
            <label for="lastname" class="form-label">Last Name:</label>
            <input type="text" class="form-control" id="lastname" name="lastname" required value="<?= $student['lastname'] ?>">
        </div>

        <div class="mb-3">
            <label for="age" class="form-label">Age:</label>
            <input type="number" class="form-control" id="age" name="age" required value="<?= $student['age'] ?>">
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Address:</label>
            <textarea class="form-control" id="address" name="address" rows="4" required><?= $student['address'] ?></textarea>
        </div>

        <div class="mb-3">
            <label for="course_section" class="form-label">Course Section:</label>
            <input type="text" class="form-control" id="course_section" name="course_section" required value="<?= $student['course_section'] ?>">
        </div>

        <button 

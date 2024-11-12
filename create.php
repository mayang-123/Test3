<?php
// create.php - Create new user

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "my_database"; // Use the correct database name here

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get form data
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $age = $_POST['age'];
    $address = $_POST['address'];
    $course_section = $_POST['course_section'];

    // Insert into the database
    $sql = "INSERT INTO users (first_name, middle_name, last_name, age, address, course_section)
            VALUES ('$fname', '$mname', '$lname', '$age', '$address', '$course_section')";

    if ($conn->query($sql) === TRUE) {
        // Redirect to index.php after successful insert
        header("Location: index.php");
        exit();  // Don't forget to call exit() after header to stop further script execution
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1>Create New User</h1>
        <form action="create.php" method="post">
            <div class="mb-3">
                <label for="fname" class="form-label">First Name:</label>
                <input type="text" id="fname" name="fname" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="mname" class="form-label">Middle Name:</label>
                <input type="text" id="mname" name="mname" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="lname" class="form-label">Last Name:</label>
                <input type="text" id="lname" name="lname" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="age" class="form-label">Age:</label>
                <input type="number" id="age" name="age" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Address:</label>
                <textarea id="address" name="address" class="form-control" rows="3" required></textarea>
            </div>

            <div class="mb-3">
                <label for="course" class="form-label">Course & Section:</label>
                <input type="text" id="course" name="course_section" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <a href="index.php" class="btn btn-secondary mt-3">Back to Users List</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

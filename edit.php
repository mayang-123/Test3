<?php
// edit.php - Edit an existing user

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "my_database"; // Updated database name

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get form data
    $id = $_POST['id'];
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $age = $_POST['age'];
    $address = $_POST['address'];
    $course_section = $_POST['course_section'];

    // Update the record
    $sql = "UPDATE users SET first_name='$fname', middle_name='$mname', last_name='$lname', 
            age='$age', address='$address', course_section='$course_section' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "maria"; // Updated database name

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch the user record based on ID
    $id = $_GET['id'];
    $sql = "SELECT * FROM users WHERE id=$id";
    $result = $conn->query($sql);
    $user = $result->fetch_assoc();

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1>Edit User</h1>
        <form action="edit.php" method="post">
            <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
            
            <div class="mb-3">
                <label for="fname" class="form-label">First Name:</label>
                <input type="text" id="fname" name="fname" class="form-control" value="<?php echo $user['first_name']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="mname" class="form-label">Middle Name:</label>
                <input type="text" id="mname" name="mname" class="form-control" value="<?php echo $user['middle_name']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="lname" class="form-label">Last Name:</label>
                <input type="text" id="lname" name="lname" class="form-control" value="<?php echo $user['last_name']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="age" class="form-label">Age:</label>
                <input type="number" id="age" name="age" class="form-control" value="<?php echo $user['age']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Address:</label>
                <textarea id="address" name="address" class="form-control" rows="3" required><?php echo $user['address']; ?></textarea>
            </div>

            <div class="mb-3">
                <label for="course" class="form-label">Course & Section:</label>
                <input type="text" id="course" name="course_section" class="form-control" value="<?php echo $user['course_section']; ?>" required>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
        <a href="index.php" class="btn btn-secondary mt-3">Back to Users List</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

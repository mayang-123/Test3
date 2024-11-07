<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My First Ubuntu server PHP Deployment</title>
</head>
<body>
    <h1>My First Ubuntu server PHP Deployment</h1>
    <form action="submit_form.php" method="post">
        <label for="fname">First Name:</label><br>
        <input type="text" id="fname" name="fname" required><br><br>

        <label for="mname">Middle Name:</label><br>
        <input type="text" id="mname" name="mname" required><br><br>

        <label for="lname">Last Name:</label><br>
        <input type="text" id="lname" name="lname" required><br><br>

        <label for="age">Age:</label><br>
        <input type="number" id="age" name="age" required><br><br>

        <label for="address">Address:</label><br>
        <textarea id="address" name="address" rows="3" required></textarea><br><br>

        <label for="course">Course:</label><br>
        <input type="text" id="course" name="course" required><br><br>

        <label for="section">Section:</label><br>
        <input type="text" id="section" name="section" required><br><br>

        <button type="submit">Submit</button>
    </form>
</body>
</html>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

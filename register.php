<?php
include 'db.php'; // Connect to database

// Get form data from POST
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

// Insert into USERSS table
$sql = "INSERT INTO USERSS (USERNAME, EMAILID, PASSWORD)
        VALUES ('$name', '$email', '$password')";

if (mysqli_query($conn, $sql)) {
    echo "<h2>Registered Successfully!</h2>";
    echo "<a href='login.html'>Click here to login</a>";
} else {
    echo "Error:" . mysqli_error($conn);
}
?>

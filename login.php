<?php
include 'db.php'; // Connect to the database

$email = $_POST['email'];
$password = $_POST['password'];

// Search in USERSS table
$sql = "SELECT * FROM USERSS WHERE EMAILID = '$email' AND PASSWORD = '$password'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {
    echo "<h2>Login Successful!</h2>";
    echo "<a href='dashboard.php'>Go to Dashboard</a>";
} else {
    echo "<h2>Login Failed!</h2>";
    echo "<p>Invalid email or password.</p>";
    echo "<a href='login.html'>Try Again</a>";
}
?>

<?php
include 'db.php'; // Connect to the database

session_start(); // Optional: If you want to use sessions

$email = $_POST['email'];
$password = $_POST['password'];

// Search in USERSS table
$sql = "SELECT * FROM USERSS WHERE EMAILID = '$email' AND PASSWORD = '$password'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {
    // You can store session info here if needed
    $_SESSION['email'] = $email;

    // ✅ Auto redirect to dashboard
    header("Location: dashboard.html");
    exit();
} else {
    echo "<h2>Login Failed!</h2>";
    echo "<p>Invalid email or password.</p>";
    echo "<a href='login.html'>Try Again</a>";
}
?>

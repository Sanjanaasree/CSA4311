<?php
include 'db.php';

$bookname = $_POST['bookname'];
$author = $_POST['author'];

$sql = "INSERT INTO BOOK (BOOKNAME, AUTHOR) VALUES ('$bookname', '$author')";

if (mysqli_query($conn, $sql)) {
    echo "<h2>Book added successfully!</h2>";
    echo "<a href='dashboard.html'>Back to Dashboard</a>";
} else {
    echo "<h2>Failed to add book!</h2>";
    echo "Error:" . mysqli_error($conn);
    echo "<br><a href='addbook.html'>Try Again</a>";
}
?>

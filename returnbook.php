<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $bookid = $_POST['bookid'];

    // Check if the book is issued
    $check = "SELECT * FROM book WHERE bookid = '$bookid' AND status = 'ISSUED'";
    $result = mysqli_query($conn, $check);

    if (mysqli_num_rows($result) == 1) {
        // Update status to AVAILABLE
        $update = "UPDATE book SET status = 'AVAILABLE' WHERE bookid = '$bookid'";
        mysqli_query($conn, $update);

        // Optional: delete from issued table
        $delete = "DELETE FROM issued WHERE bookid = '$bookid'";
        mysqli_query($conn, $delete);

        echo "<h2>Book Returned Successfully!</h2>";
        echo "<a href='dashboard.html'>Back to Dashboard</a>";
    } else {
        echo "<h2>This book is not issued or does not exist.</h2>";
        echo "<a href='returnbook.html'>Try Again</a>";
    }
} else {
    echo "Invalid Access Method";
}
?>

<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $bookid = $_POST['bookid'];
    $issued_to = $_POST['issued_to'];
    $issued_date = $_POST['issued_date'];
    $return_date = $_POST['return_date'];

    // Check if book exists and is available
    $check = "SELECT * FROM book WHERE bookid = '$bookid' AND status = 'AVAILABLE'";
    $result = mysqli_query($conn, $check);

    if (mysqli_num_rows($result) == 1) {
        // Insert into issued table
        $insert = "INSERT INTO issued (bookid, issued_to, issued_date, return_date) 
                   VALUES ('$bookid', '$issued_to', '$issued_date', '$return_date')";
        mysqli_query($conn, query: $insert);

        // Update book status to ISSUED
        $update = "UPDATE book SET status = 'ISSUED' WHERE bookid = '$bookid'";
        mysqli_query($conn, $update);

        echo "<h2>Book Issued Successfully!</h2>";
        echo "<a href='dashboard.html'>Back to Dashboard</a>";
    } else {
        echo "<h2>This book is already issued or doesn't exist.</h2>";
        echo "<a href='issuebook.html'>Try Again</a>";
    }
} else {
    echo "Invalid Access Method";
}
?>

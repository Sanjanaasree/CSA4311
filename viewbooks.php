<?php
include 'db.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Books</title>
    <style>
        body {
            background-color: #e6f2ff;
            font-family: Arial, sans-serif;
            padding: 20px;
        }

        h2 {
            text-align: center;
            color: steelblue;
        }

        table {
            width: 90%;
            margin: 0 auto;
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0 0 10px gray;
        }

        th, td {
            border: 1px solid black;
            padding: 12px;
            text-align: center;
        }

        th {
            background-color: steelblue;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        a {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: steelblue;
            text-decoration: none;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <h2>Available Books</h2>

    <table>
        <tr>
            <th>Book ID</th>
            <th>Book Name</th>
            <th>Author</th>
            <th>Status</th>
        </tr>

        <?php
        $sql = "SELECT * FROM book";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>{$row['bookid']}</td>
                        <td>{$row['bookname']}</td>
                        <td>{$row['author']}</td>
                        <td>{$row['status']}</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No books found</td></tr>";
        }
        ?>
    </table>

    <a href="dashboard.html">Back to Dashboard</a>

</body>
</html>

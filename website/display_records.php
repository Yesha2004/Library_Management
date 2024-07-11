<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "library_management";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare SQL statement
$sql = "SELECT * FROM library_records";
$result = $conn->query($sql);

// Check if records exist
if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>ID</th><th>Sl. No.</th><th>Name of the Student</th><th>USN</th><th>Book Borrowed</th><th>Date</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["sl_no"] . "</td>";
        echo "<td>" . $row["student_name"] . "</td>";
        echo "<td>" . $row["usn"] . "</td>";
        echo "<td>" . $row["book_borrowed"] . "</td>";
        echo "<td>" . $row["date"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No records found";
}

// Close connection
$conn->close();
?>



<?php
// Database connection parameters
$servername = "localhost";  // Replace with your server name if different
$username = "root";         // Your database username
$password = "";             // Your database password (leave empty if using default)
$dbname = "library_management"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare SQL statement
$stmt = $conn->prepare("INSERT INTO library_records (sl_no, student_name, usn, book_borrowed, date) VALUES (?, ?, ?, ?, ?)");

// Bind parameters
$stmt->bind_param("issss", $sl_no, $student_name, $usn, $book_borrowed, $date);

// Validate and sanitize form data
$sl_no = isset($_POST['sl_no']) ? intval($_POST['sl_no']) : null;
$student_name = isset($_POST['student_name']) ? $_POST['student_name'] : null;
$usn = isset($_POST['usn']) ? $_POST['usn'] : null;
$book_borrowed = isset($_POST['book_borrowed']) ? $_POST['book_borrowed'] : null;
$date = isset($_POST['date']) ? $_POST['date'] : null;

// Check if required fields are not empty
if (!$sl_no || !$student_name || !$usn || !$book_borrowed || !$date) {
    die("Error: All fields are required.");
}

// Execute SQL statement
if ($stmt->execute()) {
    echo "New record created successfully";
} else {
    echo "Error: " . $stmt->error;
}

// Close statement and connection
$stmt->close();
$conn->close();
?>





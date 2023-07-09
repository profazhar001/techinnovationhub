<?php

// Database connection
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "Majors";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch the course list with credits based on major ID
$majorId = $_GET['majorId']; // Retrieve major ID from GET parameters
$sql = "SELECT course_name, credits FROM Courses WHERE major_id = $majorId";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Generate the HTML for the course list
    $html = '';
    while ($row = $result->fetch_assoc()) {
        $courseName = $row['course_name'];
        $credits = $row['credits'];
        $html .= '<div class="item" data-credits="' . $credits . '">' . $courseName . '</div>';
    }
} else {
    // No courses found for the selected major
    $html = '<p>No courses found for the selected major.</p>';
}

// Close the database connection
$conn->close();

// Return the course list HTML as the AJAX response
echo $html;
?>

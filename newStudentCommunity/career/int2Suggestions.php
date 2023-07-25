<?php
require_once "config.php";

// Replace this with your database or data source connection and query logic
$skills = array('Skill A', 'Skill B', 'Skill C', 'Skill D', 'Skill E');

// Get the user's query from the 'query' parameter in the URL
$query = isset($_GET['query']) ? $_GET['query'] : '';

// Filter the skills based on the user's query
$filteredSkills = array_filter($skills, function($skill) use ($query) {
    return stripos($skill, $query) !== false;
});

// Return the filtered skills as JSON response
header('Content-Type: application/json');
echo json_encode($filteredSkills);

// Function to fetch skill suggestions
function getSkillSuggestions($query) {
    global $conn;
    $query = mysqli_real_escape_string($conn, $query);

    $skillQuery = "SELECT DISTINCT Skill FROM major_skills WHERE Skill LIKE '%$query%'";
    $skillResult = $conn->query($skillQuery);

    $suggestions = array();
    while ($row = $skillResult->fetch_assoc()) {
        $suggestions[] = $row['Skill'];
    }

    // Convert the PHP array to a JSON string
    $jsonSuggestions = json_encode($suggestions);

    // Echo the JSON string as the response
    echo $jsonSuggestions;
}

// Function to fetch class suggestions
function getClassSuggestions($query) {
    global $conn;
    $query = mysqli_real_escape_string($conn, $query);

    $classQuery = "SELECT DISTINCT Class FROM major_class WHERE Class LIKE '%$query%'";
    $classResult = $conn->query($classQuery);

    $suggestions = array();
    while ($row = $classResult->fetch_assoc()) {
        $suggestions[] = $row['Class'];
    }

    return $suggestions;
}

// Function to fetch internship suggestions
function getInternshipSuggestions($query) {
    // Implement your logic here to fetch internship suggestions
    // You can use a similar approach as above functions
    // Return an array of internship suggestions
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Handle form submissions here and process the data
    // You can access form data using $_POST array

    // For example:
    // $selectedMajor = $_POST['major'];
    // $selectedSkills = $_POST['skills'];
    // $selectedSkillLevels = $_POST['skillLevels'];
    // $selectedClasses = $_POST['classes'];
    // $selectedInternship = $_POST['internship'];
}
?>
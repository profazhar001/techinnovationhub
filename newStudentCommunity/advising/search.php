<?php
require_once "config2.php";

$search = $_POST['search'];

if (!empty($search)) {
    $query = "SELECT id, course_name, credit, description, 'Individual and Society' AS table_name FROM `Individual and Society`
              WHERE course_name LIKE '%" . $search . "%'
              UNION
              SELECT id, course_name, credit, description, 'US Experience in Its Diversity' AS table_name FROM `US Experience in Its Diversity`
              WHERE course_name LIKE '%" . $search . "%'
              UNION
              SELECT id, course_name, credit, description, 'World Cultures and Global Issues' AS table_name FROM `World Cultures and Global Issues`
              WHERE course_name LIKE '%" . $search . "%'
              UNION
              SELECT id, course_name, credit, description, 'Program Electives' AS table_name FROM `Program Electives`
              WHERE course_name LIKE '%" . $search . "%'";

    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $searchResults = [];

        while ($row = $result->fetch_assoc()) {
            $searchResults[] = [
                'table_name' => $row['table_name'],
                'course_name' => $row['course_name'],
                'credit' => $row['credit'],
                'description' => $row['description']
            ];
        }

        foreach ($searchResults as $result) {
            echo "<table>";
            echo "<caption>{$result['table_name']}</caption>";
            echo "<thead>";
            echo "<tr>";
            echo "<th class='course-name'>Course Name</th>";
            echo "<th class='credit'>Credit</th>";
            echo "<th class='description'>Description</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
            echo "<tr>";
            echo "<td>{$result['course_name']}</td>";
            echo "<td>{$result['credit']}</td>";
            echo "<td>{$result['description']}</td>";
            echo "</tr>";
            echo "</tbody>";
            echo "</table>";
        }
    } else {
        echo "<p>No data available</p>";
    }

    $conn->close();
}
?>

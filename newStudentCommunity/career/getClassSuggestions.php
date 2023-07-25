<?php
require_once "config.php";

// Get the search query from the AJAX request
$query = $_POST['query'];

// Fetch class suggestions from the database
$classQuery = "SELECT DISTINCT Class FROM major_class WHERE Class LIKE '%$query%'";
$classResult = $conn->query($classQuery);

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="index.css">
    <style>
        /* Rest of your CSS styles */

        .suggestion {
            display: flex;
            align-items: center;
            margin: 5px;
        }

        .suggestion-checkbox {
            margin-right: 5px;
        }
    </style>
</head>
<body>
    

<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" style="text-align: center;">
        <!-- Rest of your code -->
        
        <div class="suggestions-container" >
        <?php
            if ($classResult->num_rows > 0) {
                while ($row = $classResult->fetch_assoc()) {
                    $class = $row['Class'];
                    echo "<div class='suggestion' onclick=\"fillSearchBar('$class')\">" . $class . "</div>";
                }
            } else {
                echo "<div class='no-suggestions'>No suggestions found.</div>";
            }
            ?>
        </div>
    </form>

    <script>
        // Function to fill the search bar with the clicked suggestion
        function fillSearchBar(value) {
            document.getElementById('class').value = value;
        }
    </script>
</body>
</html>
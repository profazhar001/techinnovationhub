<?php
require_once "config.php";

$query = $_POST['query'];

// Fetch job title suggestions from job_skills table
$suggestionsQuery = "SELECT DISTINCT job_title FROM job_skills WHERE job_title LIKE '%$query%'";
$suggestionsResult = $conn->query($suggestionsQuery);

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="index.css">
    <style>
        .suggestions-container {
            height: 200px;
            overflow-y: auto;
            line-height: 2.5;
        }
        .suggestion{
            cursor: pointer;
            color: white;
            font-size: 17px;
        }
             /* width */
            ::-webkit-scrollbar {
            width: 10px;
            }

            /* Track */
            ::-webkit-scrollbar-track {
            box-shadow: inset 0 0 0px grey; 
            border-radius: 10px;
            }
            
            /* Handle */
            ::-webkit-scrollbar-thumb {
            background: #249DB8; 
            border-radius: 10px;
            }

            /* Handle on hover */
            ::-webkit-scrollbar-thumb:hover {
            background: #127B92; 
            
            }
    </style>
</head>
<body>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" style="text-align: center;">
        <!-- Rest of your code -->
        
        <div class="suggestions-container" >
            <?php
            if ($suggestionsResult->num_rows > 0) {
                while ($row = $suggestionsResult->fetch_assoc()) {
                    $jobTitle = $row['job_title'];
                    echo "<div class='suggestion' onclick=\"fillSearchBar('$jobTitle')\">" . $jobTitle . "</div>";
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
            document.getElementById('job_title').value = value;
        }
    </script>
</body>
</html>
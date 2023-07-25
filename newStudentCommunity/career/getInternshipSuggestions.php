<?php
require_once "config.php";
// Get the search query from the AJAX request
$query = $_POST['query'];

// Fetch internship suggestions from the database
$internshipQuery = "SELECT DISTINCT jobTitle FROM intern WHERE jobTitle LIKE '%$query%'";
$internshipResult = $conn->query($internshipQuery);


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
        
        <div class="suggestions-container" style="width:100%;">
            <?php

            if ($internshipResult->num_rows > 0) {
                while ($row = $internshipResult->fetch_assoc()) {
                    $jobTitle = $row['jobTitle'];
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
            document.getElementById('internship').value = value;
        }
    </script>
</body>
</html>
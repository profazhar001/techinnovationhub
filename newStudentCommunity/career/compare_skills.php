<!DOCTYPE html>
<html>
<head>
    <title>Skills Checker</title>
</head>
<link rel="stylesheet" type="text/css" href="index.css">
<link href='https://fonts.googleapis.com/css?family=Varela Round' rel='stylesheet'>
<style>
        .red-background {
            color: #FF0000; text-shadow: 0px 1px 10px #4F000060;
        }

        .blue-background {
            color: #0081EA; text-shadow: 0px 1px 10px #003E7140;
        }

        .green-background {
            color: #0FEA00; text-shadow: 0px 1px 10px #1B4F0020;
        }
        p.textFon,label.textFon {
            font-family: 'Varela Round';
            font-size: 24px;
            font-weight: bold;
        }

        .blockofstuf {
            font-family: 'Varela Round';
            line-height: 2;
            width: 30%;
            color: #1b1b3d;
            padding: 20px;
            margin:auto;
            background-color: white;
            border-style: solid;
            border-width: 3px;
            border-color: #1b1b3d20;
            border-radius: 25px;
            margin-bottom:20px;
    }
    </style>
<body>
<?php
require_once "config.php";

$selectedMajor = '';
$selectedJob = '';

// Fetch major skills from major_skills table
$majorsQuery = "SELECT DISTINCT major FROM major_skills";
$majorsResult = $conn->query($majorsQuery);

// Fetch job titles from job_skills table
$jobsQuery = "SELECT DISTINCT job_title FROM job_skills";
$jobsResult = $conn->query($jobsQuery);
?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    var hideTimeout;
    // Function to fetch job title suggestions
    function getJobTitleSuggestions(value) {
        if (value.length > 0) {
            $.ajax({
                type: "POST",
                url: "getJobTitleSuggestions.php",
                data: { query: value },
                success: function (response) {
                    $("#jobSuggestions").html(response);
                    $("#jobSuggestions").show(); // Show the suggestions
                }
            });
        } else {
            $("#jobSuggestions").empty();
            $("#jobSuggestions").hide(); // Hide the suggestions
        }
    }

    // Function to schedule hiding job suggestions after a delay
    function scheduleHideJobSuggestions() {
        clearTimeout(hideTimeout);
        hideTimeout = setTimeout(hideJobSuggestions, 200); // Hide after 0.1 seconds
    }

    // Function to hide job suggestions
    function hideJobSuggestions() {
        $("#jobSuggestions").empty();
        $("#jobSuggestions").hide(); // Hide the suggestions
    }
</script>

<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" style="text-align: center;">
    <div calss="row">
        <div class="column" style=" width:30%;  margin-right: 5%;   margin-left: 15%;  margin-bottom: 0%; ">
            <label for="major" class="textFon">Select a major:</label><br>
            <select id="major" name="major" class="sec1" style="text-align: center; margin-bottom: 0%; ">
                <option value="">Select Major </option>
                <?php
                while ($row = $majorsResult->fetch_assoc()) {
                    $selected = ($row['major'] == $selectedMajor) ? 'selected' : '';
                    ?>
                    <option value="<?php echo $row['major']; ?>" <?php echo $selected; ?>>
                        <?php echo $row['major']; ?>
                    </option>
                    <?php
                }
                ?>
            </select>
        </div>
        <div class="column" style=" width:30%; margin-right: 0%;   margin-left: 5%; ">
            <label for="job_title" class="textFon">Search for a job title:</label><br>
            <input type="text" id="job_title" name="job_title" placeholder="Enter a job title" class="sec1" style="margin-left: 0%;" onkeyup="getJobTitleSuggestions(this.value)" onblur="scheduleHideJobSuggestions()">
            <button type="submit" class="sec1" style="width: 100px; ">Search</button>
            <div id="jobSuggestions" ></div>
        </div>
    </div>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $selectedMajor = $_POST['major'];
    $selectedJob = $_POST['job_title'];

    if (!empty($selectedMajor)) {
        // Fetch major skills from major_skills table
        $majorSkillsQuery = "SELECT skill FROM major_skills WHERE major = '$selectedMajor'";
        $majorSkillsResult = $conn->query($majorSkillsQuery);
        echo "<div class='row' style='aline-item: center; '>";
        echo "<div class='blockofstuf column' style='width: 25%; padding:20px; margin: 10px;  line-height:2;'>";
        if ($majorSkillsResult->num_rows > 0) {
            echo "<p style='font-size:20px; font-weight: normal;'>Major skills for (" . $selectedMajor . ")</p>";
            echo "<ul>";
            while ($row = $majorSkillsResult->fetch_assoc()) {
                echo "<li>" . $row['skill'] . "</li>";
            }
            echo "</ul>";
        } else {
            echo "<p>No major skills found for the selected major.</p>";
        }
        echo "</div>";
        
    }

    if (!empty($selectedJob)) {
        // Fetch job skills from job_skills table
        $jobSkillsQuery = "SELECT skill FROM job_skills WHERE job_title = '$selectedJob'";
        $jobSkillsResult = $conn->query($jobSkillsQuery);
        

        if ($jobSkillsResult->num_rows > 0) {
            echo "<div class='blockofstuf column' style='width: 30%; padding:20px; margin: 10px;  line-height:2;'>";
            echo "<p>Job skills for (" . $selectedJob . ")</p>";
            echo "<ul>";
            while ($row = $jobSkillsResult->fetch_assoc()) {
                echo "<li>" . $row['skill'] . "</li>";
            }
            echo "</ul>";

            // Fetch job skills not included in major skills
            $nonMatchedSkillsQuery = "SELECT skill FROM job_skills WHERE job_title = '$selectedJob' AND skill NOT IN (SELECT skill FROM major_skills WHERE major = '$selectedMajor')";
            $nonMatchedSkillsResult = $conn->query($nonMatchedSkillsQuery);

            if ($nonMatchedSkillsResult->num_rows > 0) {
                echo "<p>Needed skills form (" . $selectedMajor .") to (". $selectedJob . ")</p>";
                echo "<ul>";
                while ($row = $nonMatchedSkillsResult->fetch_assoc()) {
                    echo "<li>" . $row['skill'] . "</li>";
                }
                echo "</ul>";
                echo "</div>";
                

                // Fetch gapfiller attribute for non-matched job skills
                $gapfillerQuery = "SELECT skill, gapfiller FROM Skills WHERE skill IN (SELECT skill FROM job_skills WHERE job_title = '$selectedJob' AND skill NOT IN (SELECT skill FROM major_skills WHERE major = '$selectedMajor'))";
                $gapfillerResult = $conn->query($gapfillerQuery);
                echo "<div class='blockofstuf column' style='width: 40%; padding:20px; margin: 10px; line-height:2;'>";
                if ($gapfillerResult->num_rows > 0) {
                    echo "<p>How to fill the gap</p>";
                    echo "<ul>";
                    while ($row = $gapfillerResult->fetch_assoc()) {
                        echo "<li><b>" . $row['skill'] . "</b> : " . $row['gapfiller'] . "</li>";
                    }
                    echo "</ul>";
                    echo "</div>";
                } else {
                    echo "<p>No gapfiller information found for non-matched job skills.</p>";
                }
                echo "</div>";
            } else {
                echo "<p>No job skills found that are not included in major skills.</p>";
            }
        } else {
            echo "<p>No job skills found for the selected job title.</p>";
        }
    }
}

$conn->close();
?>



</body>
</html>
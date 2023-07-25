<!DOCTYPE html>
<html>
<head>
    <title>Skills Checker</title>
</head>
<link rel="stylesheet" type="text/css" href="index.css">
<link href='https://fonts.googleapis.com/css?family=Varela Round' rel='stylesheet'>
<style>
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
    button.tinbutton,input.tinbutton{
        border-width: 1px;
        border-radius: 25px;
        background-color: white;
        border-color: #1a1a3a50;
        cursor:pointer;
    }
    button.tinbutton:hover,input.tinbutton:hover{
        border-width: 1px;
        background-color: #1a1a3a10;
        border-color: #1a1a3a50;
        cursor:pointer;
    }
</style>
<body>
<?php
require_once "config.php";

$selectedMajor = '';
$selectedJob = '';
$selectedSkills = array();
$selectedClasses = array();

// Fetch major skills from major_skills table
$majorsQuery = "SELECT DISTINCT major FROM major_skills";
$majorsResult = $conn->query($majorsQuery);

// Fetch job titles from job_skills table
$jobsQuery = "SELECT DISTINCT job_title FROM job_skills";
$jobsResult = $conn->query($jobsQuery);

// Fetch all skills from Skills table
$skillsQuery = "SELECT DISTINCT skill FROM Skills";
$skillsResult = $conn->query($skillsQuery);

// Fetch all classes from major_class table
$classesQuery = "SELECT DISTINCT Class FROM major_class";
$classesResult = $conn->query($classesQuery);

// Fetch internships from intern table
$internshipsQuery = "SELECT DISTINCT jobTitle FROM intern";
$internshipsResult = $conn->query($internshipsQuery);
?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    var hideTimeouts = {};

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
            hideSuggestions('jobSuggestions');
        }
    }

    // Function to fetch class suggestions
    function getClassSuggestions(value) {
        if (value.length > 0) {
            $.ajax({
                type: "POST",
                url: "getClassSuggestions.php",
                data: { query: value },
                success: function (response) {
                    $("#classSuggestions").html(response);
                    $("#classSuggestions").show(); // Show the suggestions
                }
            });
        } else {
            hideSuggestions('classSuggestions');
        }
    }

    // Function to fetch skill suggestions
    function getSkillSuggestions(value) {
        if (value.length > 0) {
            $.ajax({
                type: "POST",
                url: "getSkillSuggestions.php",
                data: { query: value },
                success: function (response) {
                    $("#skillSuggestions").html(response);
                    $("#skillSuggestions").show(); // Show the suggestions
                }
            });
        } else {
            hideSuggestions('skillSuggestions');
        }
    }

    // Function to fetch internship suggestions
    function getInternshipSuggestions(value) {
        if (value.length > 0) {
            $.ajax({
                type: "POST",
                url: "getInternshipSuggestions.php",
                data: { query: value },
                success: function (response) {
                    $("#internshipSuggestions").html(response);
                    $("#internshipSuggestions").show(); // Show the suggestions
                }
            });
        } else {
            hideSuggestions('internshipSuggestions');
        }
    }

    // Function to schedule hiding suggestions after a delay
    function scheduleHideSuggestions(suggestionId) {
        clearTimeout(hideTimeouts[suggestionId]);
        hideTimeouts[suggestionId] = setTimeout(function() {
            hideSuggestions(suggestionId);
        }, 150); // Hide after 0.1 seconds
    }

    // Function to hide suggestions
    function hideSuggestions(suggestionId) {
        $("#" + suggestionId).empty();
        $("#" + suggestionId).hide(); // Hide the suggestions
    }

    // Function to add selected skill to the list
    function addSkill() {
        var skill = $("#skill").val();
        var level = $("#skillLevel").val();

        if (skill !== '') {
            var listItem = '<li>' + skill + ' (' + level + ')' +
                '<input type="hidden" name="skills[]" value="' + skill + '">' +
                '<input type="hidden" name="skillLevels[]" value="' + level + '">' +
                '<button type="button" class="removeSkill" style="margin-left:5px; border-radius:15px; padding: 3px; background-color: #ff9a8c;" onclick="removeSkill(this)">Remove</button></li>';
            $("#selectedSkills").append(listItem);
            $("#skill").val('');
        }
    }

    // Function to remove selected skill from the list
    function removeSkill(button) {
        $(button).closest('li').remove();
    }

    // Function to add selected class to the list
    function addClass() {
        var classVal = $("#class").val();

        if (classVal !== '') {
            var listItem = '<li>' + classVal +
                '<input type="hidden" name="classes[]" value="' + classVal + '">' +
                '<button type="button" class="removeClass" style="margin-left:5px; border-radius:15px; padding: 3px; background-color: #ff9a8c;" onclick="removeClass(this)">Remove</button></li>';
            $("#selectedClasses").append(listItem);
            $("#class").val('');
        }
    }

    // Function to remove selected class from the list
    function removeClass(button) {
        $(button).closest('li').remove();
    }

    // Function to clear the selected skills and classes lists
    function clearLists() {
        $("#selectedSkills").empty();
        $("#selectedClasses").empty();
    }
</script>

<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" style="text-align: center;">

    <div class="row">
        <div class="column"  style="width:20%; margin: 0%;  ">
            <label for="major" class="textFon">Select a major:</label><br>
            <select id="major" name="major" class="sec1"  style="text-align: center; width:100%;">
                <option value="">Select Major</option>
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
            </select><br>
        </div>

        
        <div class="column"  style="width:30%; margin: 0%; ">
            <label for="skill" class="textFon">Add skills:</label><br>
            <input type="text" id="skill" name="skill" placeholder="Enter a skill" class="sec1" style="text-align: center; width:100%;"  onkeyup="getSkillSuggestions(this.value),hideSuggestions('classSuggestions'),hideSuggestions('internshipSuggestions')">
            <div id="skillSuggestions"></div>
            <select id="skillLevel" name="skillLevel" class="sec1" style="text-align: center; width:40%;">
                <option value="Beginner">Beginner</option>
                <option value="Intermediate">Intermediate</option>
                <option value="Expert">Expert</option>
            </select>
            <button type="button" class=" tinbutton" style="font-size:20px; padding:13px;" onclick="addSkill()">Add Skill</button>
            <ul id="selectedSkills">
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['skills'])) {
                    $selectedSkills = $_POST['skills'];
                    $selectedSkillLevels = $_POST['skillLevels'];

                    for ($i = 0; $i < count($selectedSkills); $i++) {
                        $skill = $selectedSkills[$i];
                        $level = $selectedSkillLevels[$i];
                        echo '<li>' . $skill . ' (' . $level . ')<button type="button" class="removeSkill tinbutton" onclick="removeSkill(this)">Remove</button></li>';
                    }
                }
                ?>
            </ul>
        </div>
        <div class="column"  style="width:30%; margin: 0%;">
            <label for="class" class="textFon">Add classes:</label><br>
            <input type="text" id="class" placeholder="Enter a class" class="sec1" style="text-align: center;width:100%;" onkeyup="getClassSuggestions(this.value),hideSuggestions('skillSuggestions'),hideSuggestions('internshipSuggestions')">
            <div id="classSuggestions"></div>
            <button type="button" class=" tinbutton"  style="font-size:20px;  padding:10px;" onclick="addClass()">Add Class</button>
            <ul id="selectedClasses">
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['classes'])) {
                    $selectedClasses = $_POST['classes'];

                    foreach ($selectedClasses as $class) {
                        echo '<li>' . $class . '<button type="button" class="removeClass tinbutton" onclick="removeClass(this)">Remove</button></li>';
                    }
                }
                ?>
            </ul>
            </div>
        <div class="column"  style="width:20%; margin: 0%; ">
            <label for="internship" class="textFon">Search for an internship:</label><br>
            <input type="text" id="internship" name="internship" placeholder="Enter a job title" class="sec1" style="text-align: center;width:100%;" onkeyup="getInternshipSuggestions(this.value),hideSuggestions('classSuggestions'),hideSuggestions('skillSuggestions')">
            <div id="internshipSuggestions"></div>
            <button type="submit" class=" tinbutton"  style="font-size:20px; padding:10px;">Search</button>
            <div id="jobSuggestions"></div>
        </div>
        
    </div>
    
</form>
<button class=" tinbutton"  style="font-size:20px; padding:10px; transform: translate(600%, 0%);"  onclick="clearLists(),hideSuggestions('classSuggestions'),hideSuggestions('skillSuggestions'),hideSuggestions('internshipSuggestions')">Clear Lists</button>
<hr style="border: 3px solid #DFDFDF99; border-radius: 5px;">
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $selectedMajor = $_POST['major'];
    $selectedJob = $_POST['internship'];

    if (empty($selectedSkills) && empty($selectedClasses) && empty($selectedJob)) {
        echo "<p class='textFon'>Please select skills, classes, or a job title to search for internships.</p>";
    } else {
        if (!empty($selectedMajor)) {
            // Fetch major skills from major_skills table
            $majorSkillsQuery = "SELECT skill FROM major_skills WHERE major = '$selectedMajor'";
            $majorSkillsResult = $conn->query($majorSkillsQuery);
            echo "<div class='blockofstuf column' style='width: 23%;margin:1%; '>";
            if ($majorSkillsResult->num_rows > 0) {
                echo "<p>Major skills for (" . $selectedMajor . ")</p>";
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
        echo "<div class='blockofstuf column' style='width: 23%;margin:1%; font-size:15px; '>";
        if (!empty($selectedSkills)) {
            echo "<p>Selected Skills:</p>";
            echo "<ul>";
            foreach ($selectedSkills as $skill) {
                echo "<li>" . $skill . "</li>";
            }
            echo "</ul>";
        }

        if (!empty($selectedClasses)) {
            echo "<p>Selected Classes:</p>";
            echo "<ul>";
            foreach ($selectedClasses as $class) {
                echo "<li>" . $class . "</li>";
            }
            echo "</ul>";
        }
        echo "</div>";
        if (!empty($selectedJob)) {
            // Fetch internship data from the intern table based on the selected job
            echo "<div class='blockofstuf column' style='width: 45%;margin:1%; '>";
            $internshipsQuery = "SELECT * FROM intern WHERE jobTitle = '$selectedJob'";
            $internshipsResult = $conn->query($internshipsQuery);

            if ($internshipsResult->num_rows > 0) {
                echo "<p> (" . $selectedJob . ")</p>";
                while ($row = $internshipsResult->fetch_assoc()) {
                    echo "<ul>";
                    echo "<li>Internship Number: " . $row['internNo'] . "</li>";
                    echo "<li>Job Title: " . $row['jobTitle'] . "</li>";
                    echo "<li>Description: " . $row['Descrip'] . "</li>";
                    echo "<li>Link: " . $row['link'] . "</li>";

                    // Compare the required skills with the selected skills
                    $requiredSkillsQuery = "SELECT skill, skillLevel FROM internSkills WHERE internNo = " . $row['internNo'];
                    $requiredSkillsResult = $conn->query($requiredSkillsQuery);
                    $mismatchedSkills = array();

                    while ($requiredSkillRow = $requiredSkillsResult->fetch_assoc()) {
                        $requiredSkill = $requiredSkillRow['skill'];
                        $requiredLevel = $requiredSkillRow['skillLevel'];

                        if (!in_array($requiredSkill, $selectedSkills)) {
                            $mismatchedSkills[$requiredSkill] = $requiredLevel;
                        }
                    }

                    if (!empty($mismatchedSkills)) {
                        echo "<li>Mismatched Skills:</li>";
                        echo "<ul>";
                        foreach ($mismatchedSkills as $skill => $level) {
                            echo "<li>" . $skill . " (Required Level: " . $level . ")</li>";
                        }
                        echo "</ul>";
                    }

                    // Compare the required classes with the selected classes
                    $requiredClassesQuery = "SELECT Class FROM internclass WHERE internNo = " . $row['internNo'];
                    $requiredClassesResult = $conn->query($requiredClassesQuery);
                    $mismatchedClasses = array();

                    while ($requiredClassRow = $requiredClassesResult->fetch_assoc()) {
                        if (!in_array($requiredClassRow['Class'], $selectedClasses)) {
                            $mismatchedClasses[] = $requiredClassRow['Class'];
                        }
                    }
                    if (!empty($mismatchedClasses)) {
                        echo "<li>Mismatched Classes: </li>";
                        echo "<ul>";
                        foreach ($mismatchedClasses as $classes){
                            echo "<li>" . $classes . "</li>";
                        }
                        echo "</ul>";
                    }
                }
                echo "</div>";
            } else {
                echo "<p>No internships found for the selected job title.</p>";
            }
        } else {
            // Fetch internships based on selected skills and classes
            echo "<div class='blockofstuf column' style='width: 45%;margin:1%; '>";
            $internshipsQuery = "SELECT * FROM intern";
            $internshipsResult = $conn->query($internshipsQuery);

            if ($internshipsResult->num_rows > 0) {
                echo "<p>Internships for selected skills and classes:</p>";
                $closestMatch = null;
                $closestMatchScore = 0;

                while ($row = $internshipsResult->fetch_assoc()) {
                    $internshipNo = $row['internNo'];

                    $internshipSkillsQuery = "SELECT skill, skillLevel FROM internskills WHERE internNo = '$internshipNo'";
                    $internshipSkillsResult = $conn->query($internshipSkillsQuery);

                    $internshipClassesQuery = "SELECT Class FROM internclass WHERE internNo = '$internshipNo'";
                    $internshipClassesResult = $conn->query($internshipClassesQuery);

                    $matchedSkills = 0;
                    $matchedClasses = 0;

                    while ($skillRow = $internshipSkillsResult->fetch_assoc()) {
                        $requiredSkill = $skillRow['skill'];
                        $requiredLevel = $skillRow['skillLevel'];

                        if (in_array($requiredSkill, $selectedSkills)) {
                            $matchedSkills++;
                        }
                    }

                    while ($classRow = $internshipClassesResult->fetch_assoc()) {
                        if (in_array($classRow['Class'], $selectedClasses)) {
                            $matchedClasses++;
                        }
                    }

                    if ($matchedSkills == count($selectedSkills) && $matchedClasses == count($selectedClasses)) {
                        echo "<ul>";
                        echo "<li>Internship Number: " . $row['internNo'] . "</li>";
                        echo "<li>Job Title: " . $row['jobTitle'] . "</li>";
                        echo "<li>Description: " . $row['Descrip'] . "</li>";
                        echo "<li>Link: " . $row['link'] . "</li>";
                        echo "</ul>";
                    } else {
                        $matchScore = $matchedSkills + $matchedClasses;

                        if ($matchScore > $closestMatchScore) {
                            $closestMatchScore = $matchScore;
                            $closestMatch = $row;
                        }
                    }
                }

                if ($closestMatch !== null) {
                    echo "<p>Closest Match:</p>";
                    echo "<ul>";
                    echo "<li>Internship Number: " . $closestMatch['internNo'] . "</li>";
                    echo "<li>Job Title: " . $closestMatch['jobTitle'] . "</li>";
                    echo "<li>Description: " . $closestMatch['Descrip'] . "</li>";
                    echo "<li>Link: " . $closestMatch['link'] . "</li>";

                    $requiredSkillsQuery = "SELECT skill, skillLevel FROM internSkills WHERE internNo = " . $closestMatch['internNo'];
                    $requiredSkillsResult = $conn->query($requiredSkillsQuery);
                    $mismatchedSkills = array();

                    while ($requiredSkillRow = $requiredSkillsResult->fetch_assoc()) {
                        $requiredSkill = $requiredSkillRow['skill'];
                        $requiredLevel = $requiredSkillRow['skillLevel'];

                        if (!in_array($requiredSkill, $selectedSkills)) {
                            $mismatchedSkills[$requiredSkill] = $requiredLevel;
                        }
                    }

                    if (!empty($mismatchedSkills)) {
                        echo "<li>Mismatched Skills:</li>";
                        echo "<ul>";
                        foreach ($mismatchedSkills as $skill => $level) {
                            echo "<li>" . $skill . " (Required Level: " . $level . ")</li>";
                        }
                        echo "</ul>";
                    }

                    echo "</ul>";
                }
                echo "</div>";
            } else {
                echo "<p>No internships found for the selected skills and classes.</p>";
            }
        }
    }
}

$conn->close();
?>
</body>
</html>
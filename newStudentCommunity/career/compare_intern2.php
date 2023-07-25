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
        font-size: 22px;
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="int2Script.js"></script>
<?php
require_once "config.php";

$selectedMajor = '';
$selectedJob = '';
$selectedSkills = array();
$selectedClasses = array();

// Fetch major skills from major_skills table
$majorsQuery = "SELECT DISTINCT major FROM major_skills";
$majorsResult = $conn->query($majorsQuery);

?>


<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" style="text-align: center;">
<div class="row" style="font-family: 'Varela Round';">
    <!-- Major form -->

    <div class="column"   style="width:20%; margin: 1%; ">
        <label for="major"    class="textFon">Select a major:</label><br>
        <select id="major" name="major"   class="sec1" style="text-align: center; width:100%;">
            <option value=""> </option>
            <!-- Fetch and display all the majors from the database here -->
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

    <!-- Skills form -->
    <div class="column"    style="width:20%; margin: 1%;">
        <label for="skill"    class="textFon">Add skills:</label><br>
        <input type="text" id="skill" name="skill" placeholder="Enter a skill"   class="sec1" style="text-align: center; width:100%;">
        <div id="skillSuggestions"></div>
        <button type="button" class="sec1" style="width: 100px;" onclick="addSkill()">Add Skill</button>
        <ul id="selectedSkills">
            <!-- Display selected skills with their levels and remove buttons here -->
        </ul>
    </div>

    <!-- Classes form -->
    <div class="column"    style="width:20%; margin: 1%;">
        <label for="class"    class="textFon">Add classes:</label><br>
        <input type="text" id="class" name="class" placeholder="Enter a class"   class="sec1" style="text-align: center; width:100%;">
        <div id="classSuggestions"></div>
        <button type="button" class="sec1" style="width: 100px;" onclick="addClass()">Add Class</button>
        <ul id="selectedClasses">
            <!-- Display selected classes with remove buttons here -->
        </ul>
    </div>

    <!-- Internship form -->
    <div class="column"   style="width:20%; margin: 1%;">
        <label for="internship"    class="textFon">Search for an internship:</label><br>
        <input type="text" id="internship" name="internship" placeholder="Enter a job title"   class="sec1" style="text-align: center; width:100%;" >
        <div id="internshipSuggestions"></div>
        <button type="button" class="sec1" style="width: 100px;" onclick="getInternshipSuggestions()">Search</button>
        <ul id="selectedInternship">
            <!-- Display selected internship suggestions here -->
        </ul>
    </div>

    <!-- Button to submit the form -->
    <div class="column"   style="width:10%; margin: 1%;">
        <button type="button" class="sec1" style="width: 100px;" onclick="handleSubmit()">Done</button>
    </div>
</div>
</form>
<hr style="border: 3px solid #DFDFDF; border-radius: 5px;">


</body>
</html>

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
            color:black;
        }

        .blockofstuf {
            font-family: 'Varela Round';
            font-size: 20px;
            font-weight: bold;
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
$majorDescription = '';
$jobTitles = array();

if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['major'] != '') {
    $selectedMajor = $_POST['major'];

    // Fetch major description from major_descrp table
    $descriptionQuery = "SELECT description FROM major_descrp WHERE major = '$selectedMajor'";
    $descriptionResult = $conn->query($descriptionQuery);
    $row = $descriptionResult->fetch_assoc();
    $majorDescription = $row['description'];

    // Fetch job titles from major_jobsByBmcc table
    $jobQuery = "SELECT job_title FROM major_jobsByBmcc WHERE major = '$selectedMajor'";
    $jobResult = $conn->query($jobQuery);
    while ($row = $jobResult->fetch_assoc()) {
        $jobTitles[] = $row['job_title'];
    }
}

$majorsQuery = "SELECT DISTINCT major FROM major_descrp";
$majorsResult = $conn->query($majorsQuery);
?>

<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" style="text-align: center;">
    <label for="major" class="textFon" >Select a major:</label><br>
    <select id="major" name="major" class="sec1" style="text-align: center;" onchange="this.form.submit()">
        <option value="">-- Select Major --</option>
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
</form>

<?php
// Display major description if selected
echo "<div class='row' style='aline-item: center;'>";
if (!empty($selectedMajor)) {
    $majorName;
    if ($selectedMajor=="CIS"){
        $majorName="Computer Information Systems";
    }elseif($selectedMajor=="CNT"){
            $majorName="Computer Network Technology";
        }elseif($selectedMajor=="CS"){
            $majorName="Computer Science";
        }else{$majorName="Geographic Information Science";
        };
    echo "<div class='blockofstuf column' style='width: 40%;margin:5%; '><p style='font-size:25px;'>(".$majorName.")</p>";
    echo "<p>$majorDescription</p></div>";
}

// Display job titles if selected

if (!empty($jobTitles)) {
    echo "<div class='blockofstuf column' style='width: 40%;margin:5%;'>";
    echo "<p style='font-size:24px; font-weight: normal;'><b>Jobs for (" . $selectedMajor . ")</b></p><p style='font-size:22px; font-weight: normal;'><b>click</b> on job title to see <strong  style=' color: darkblue;'>average base salary</strong> on indeed</p>";
    echo "<ul >";
    foreach ($jobTitles as $jobTitle) {
        $jobTitleURL = "https://www.indeed.com/career/" . urlencode($jobTitle) . "/salaries";
        echo "<li ><a href='$jobTitleURL' target='_blank' rel='noopener noreferrer' style='text-decoration: none; color: #365ccf;'>$jobTitle</a></li>";
    }
    echo "</ul>";
    echo "</div>";
}

$conn->close();
?>

</body>
</html>
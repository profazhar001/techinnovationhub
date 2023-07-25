<!DOCTYPE html>
<html>
<head>
  <title>Custom HTML Input Element</title>
  <link rel="stylesheet" href="index.css">
<link href='https://fonts.googleapis.com/css?family=Varela Round' rel='stylesheet'>
  <style>
    p.textFon,label.textFon {
        font-family: 'Varela Round';
        font-size: 24px;
        font-weight: bold;
    }
    .blockofstuf {
        font-family: 'Varela Round';
        font-size: 15px;
        line-height: 2;
        width: 30%;
        color: #1b1b3d;
        padding: 3px;
        margin:auto;
        background-color: white;
        border-style: solid;
        border-width: 3px;
        border-color: #1b1b3d20;
        border-radius: 25px;
        margin-bottom:20px;
        opacity: 0;
    }
    .opcit{
        opacity: 0;
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
</head>
<body>

<?php
require_once "config.php";

// Fetch major skills from major_skills table
$majorsQuery = "SELECT DISTINCT major FROM major_skills";
$majorsResult = $conn->query($majorsQuery);

// Fetch all classes from major_class table
$classesQuery = "SELECT DISTINCT Class FROM major_class";
$classesResult = $conn->query($classesQuery);

// Fetch all skills from Skills table
$skillsQuery = "SELECT DISTINCT skill FROM Skills";
$skillsResult = $conn->query($skillsQuery);

// Fetch internships from intern table
$internshipsQuery = "SELECT DISTINCT jobTitle FROM intern";
$internshipsResult = $conn->query($internshipsQuery);

?>
<?php
$classesQuery = "SELECT DISTINCT Class FROM major_class";
$classesResult = $conn->query($classesQuery);

// Fetch the data from the database
$classesData = array();
while ($row = $classesResult->fetch_assoc()) {
  $classesData[] = $row['Class'];
}

// Fetch the data from the database
$skillsData = array();
while ($row = $skillsResult->fetch_assoc()) {
  $skillsData[] = $row['skill'];
}

// Convert the data to JSON format
$classesJSON = json_encode($classesData);
// Convert the data to JSON format
$classesJSONSkills = json_encode($classesData);
?>
<div class="row" style="font-family: 'Varela Round'; ">
<!-- major-->
<div class="column"   style="width:20%; margin: 0%; ">
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
<!-- Add skills -->
  <div class="column"   style="width:30%; margin: 0%; ">
      <div>
          <form  action="process_form.php" method="post" onsubmit="return false;">
          <label for="customNameSkills" class="textFon" style="margin-left:34%;">Add skills:</label>
          <input type="text" name="customNameSkills" id="customNameSkills" class="sec1" style="text-align: center; width:100%;" placeholder="skill Name" onkeyup="updateLisSkills()">
          <div class='blockofstuf ' id="namesSkills" style='width: 100%; margin:1%; height:auto; max-height:300px;' ></div>
          </form>
      </div>
      <div id="addedNamesSkills" class="suggestions-container textFon opcit" style='width: 100%; margin:1%; height:auto; max-height:300px; padding:5px; font-family: "Varela Round";'><ul></ul></div>
    </div>
<!-- classes form -->

    <div class="column"   style="width:30%; margin: 0%; ">
    <div>
        <form  action="process_form.php" method="post" onsubmit="return false;">
        <label for="customName" class="textFon" style="margin-left:34%;">Add classes:</label>
        <input type="text" name="customName" id="customName" class="sec1" style="text-align: center; width:100%;" placeholder="Class Name" onkeyup="updateList()">
        <div class='blockofstuf ' id="names" style='width: 100%; margin:1%; height:auto; max-height:300px;' ></div>
        </form>
    </div>
    <div id="addedNames" class="suggestions-container textFon opcit" style='width: 100%; margin:1%; height:auto; max-height:300px; padding:5px; font-family: "Varela Round";'><ul></ul></div>
  </div>
  <!-- Internship form -->
  <div class="column"   style="width:20%; margin: 0%;">
        <label for="internship"    class="textFon">Search for an internship:</label><br>
        <input type="text" id="internship" name="internship" placeholder="Enter a job title"   class="sec1" style="text-align: center; width:100%;" >
        <div id="internshipSuggestions"></div>
        <button type="button" class="sec1" style="width: 100px;" onclick="getInternshipSuggestions()">Search</button>
        <ul id="selectedInternship">
            <!-- Display selected internship suggestions here -->
        </ul>
    </div>
</div>
  <script>
    function updateList() {
      const inputText = document.getElementById('customName').value;
      const namesArray = <?php echo $classesJSON; ?>;
      const filteredNames = namesArray.filter(name => name.toLowerCase().includes(inputText.toLowerCase()));
      const namesDiv = document.getElementById('names');
      namesDiv.style.opacity = 1;

      let listHTML = '<div class="suggestions-container" ><ul>';
      filteredNames.forEach(name => {
        listHTML += `<li><button class="add-button tinbutton" onclick="addToAddedNames('${name}')">Add</button> ${name}</li>`;
      });
      listHTML += '</ul></div><input type="submit" class="tinbutton" style="margin-left:42%;" value="done" onclick="clearNames()">';

      namesDiv.innerHTML = listHTML;
    }

    function addToAddedNames(name) {
      const addedNamesDiv = document.getElementById('addedNames');
      const addedList = addedNamesDiv.getElementsByTagName('ul')[0];
      const removeButton = `<br><button class="remove-button tinbutton" onclick="removeFromAddedNames(this)">Remove</button>`;
      addedList.innerHTML += `<li>${name}${removeButton}</li>`;
      addedNamesDiv.style.opacity = 1;
    }

    function removeFromAddedNames(button) {
      const addedList = button.parentNode.parentNode;
      addedList.removeChild(button.parentNode);
      const addedNamesDiv = document.getElementById('addedNames');
      addedNamesDiv.style.opacity = 1;
    }

    function clearNames() {
      const namesDiv = document.getElementById('names');
      namesDiv.innerHTML = ''; // Clear the content of the namesDiv
      namesDiv.style.opacity = 0;
    }

  </script>
  <script>
    function updateListSkills() {
      const inputText = document.getElementById('customNameSkills').value;
      const namesArray = <?php echo $classesJSONSkills; ?>;
      const filteredNames = namesArray.filter(name => name.toLowerCase().includes(inputText.toLowerCase()));
      const namesDiv = document.getElementById('namesSkills');
      namesDiv.style.opacity = 1;

      let listHTML = '<div class="suggestions-container" ><ul>';
      filteredNames.forEach(name => {
        listHTML += `<li><button class="add-button tinbutton" onclick="addToAddedNamesSkills('${name}')">Add</button> ${name}</li>`;
      });
      listHTML += '</ul></div><input type="submit" class="tinbutton" style="margin-left:42%;" value="done" onclick="clearNamesSkills()">';

      namesDiv.innerHTML = listHTML;
    }

    function addToAddedNamesSkills(name) {
      const addedNamesDiv = document.getElementById('addedNamesSkills');
      const addedList = addedNamesDiv.getElementsByTagName('ul')[0];
      const removeButton = `<br><button class="remove-button tinbutton" onclick="removeFromAddedNamesSkills(this)">Remove</button>`;
      addedList.innerHTML += `<li>${name}${removeButton}</li>`;
      addedNamesDiv.style.opacity = 1;
    }

    function removeFromAddedNamesSkills(button) {
      const addedList = button.parentNode.parentNode;
      addedList.removeChild(button.parentNode);
      const addedNamesDiv = document.getElementById('addedNamesSkills');
      addedNamesDiv.style.opacity = 0;
    }

    function clearNamesSkills() {
      const namesDiv = document.getElementById('namesSkills');
      namesDiv.innerHTML = ''; // Clear the content of the namesDiv
      namesDiv.style.opacity = 0;
    }

  </script>
</body>
</html>
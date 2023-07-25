<!DOCTYPE html>
<html>
<head>
  <title>Form Submission Result</title>
</head>
<body>



  <?php
    // Your array of names
    $names = array("Matt", "John", "Ben", "Mac", "Jack", "Jake", "Leo");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $customName = $_POST["customName"];

      // Process the data as needed, for example, you can store it in a database or display it on the page.
      echo "<h2>Hello, $customName!</h2>";
    }
  ?>

  <div id="names">
    <ul>
      <?php
        // Loop through the array of names and generate the list with "Add" buttons
        foreach ($names as $name) {
          echo "<li><button class='add-button'>Add</button> $name</li>";
        }
      ?>
    </ul>
  </div>
</body>
</html>
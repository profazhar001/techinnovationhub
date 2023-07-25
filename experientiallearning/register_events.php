<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Events</title>
  <link rel="stylesheet" href="style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com"> 
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
  <section class="sub2-header">
  <nav>
            <a href="index.html"><img src="images/internshipPhoto8.png"></a>
            <div class="nav-links" id="navLinks">
                <i class="fa fa-times" onclick="hideMenu()"></i>
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="jobBoard.html">Job Board</a></li>
                    <li><a href="events.html">Events</a></li>
                    <li><a href="careerInfo.html">Career Info</a></li>
                    <li><a href="login.html">Login</a></li>
                </ul>
            </div>
            <i class="fa fa-bars" onclick="showMenu()"></i>
        </nav>
</section>
<?php
// Establish database connection
require_once "config.php";

// Process submitted events
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve event details from $_POST
    $cunyEMPLD = $conn->real_escape_string($_POST["cunyEMPLD"]);
    $eventTitles = $_POST["event_title"];
    $eventDates = $_POST["event_date"];
    $eventTimes = $_POST["event_time"];
    $eventLocations = $_POST["event_location"];

    // Insert event registration data into the database
    for ($i = 0; $i < count($eventTitles); $i++) {
        $eventTitle = $conn->real_escape_string($eventTitles[$i]);
        $eventDate = $conn->real_escape_string($eventDates[$i]);
        $eventTime = $conn->real_escape_string($eventTimes[$i]);
        $eventLocation = $conn->real_escape_string($eventLocations[$i]);

        $sql = "INSERT INTO eventsAttendance (cunyEMPLD, eventName, eventDate, eventTime, eventLocation) VALUES ('$cunyEMPLD','$eventTitle', '$eventDate', '$eventTime', '$eventLocation')";

        if ($conn->query($sql) !== TRUE) {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    echo "Events registered successfully";
}

// Close the database connection
$conn->close();
?>
    <!------Footer--------------->

    <section class="footer">
        <h4>About Us</h4>
        <p>
            Our project was brought to life by the collaborative efforts of Gagne Cire Niang, Hannah George, and Mukhlisa Nematova.
            Together, we are dedicated to guiding students towards their goals by providing a platform to discover
            relevant courses, workshops, and resources that will facilitate their career path. We believe in empowering
            students to make informed decisions and embark on a successful educational journey.
        </p>
        <div class="icons">
            <i class="fa fa-facebook"></i>
            <i class="fa fa-twitter"></i>
            <i class="fa fa-instagram"></i>
            <i class="fa fa-linkedin"></i>
        </div>
    </section>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <title>Semester Courses</title>
    <style>
        body {
          
            font-family: Arial, sans-serif;
            margin:0px;
            padding: 0px;
            text-align: center;            
            font-size: 15px;
            color:black;
        }

        .header {
           
           
            text-align: center;
        }
        .container{
            width: 100%;
            height: 100%;
            margin-bottom: 40px;             
        }
 

        tr:hover {
            background-color: #ddd;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            padding: 4px;
            border-bottom: 1px solid #ddd;
        }

        .content {
            background-color: rgba(255, 255, 255,0.9);
            max-width: 1200px;
            margin: auto;
        }
        .icon {
            width: 150px;
            height: 40px;
            margin-right: 10px;
            }
            .menu-items {
            flex-grow: 1;
            display: flex;
            justify-content: flex-end;
        }

            .Topbar {
        position: fixed;
        list-style-type: none;
        width: 100%;
        margin: 0;
        padding: 0;
        overflow: hidden;
        display: flex;
        align-items: center;
        background-color: #1c8fa9;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.8);
        }
    
        .Topbar li {
            float: left;
        }
    
        .Topbar li a {
            /* display: inline-block; */
            color: white;
            text-align: left;
            padding: 14px 8px 8px 8px;
            text-decoration: none;
            font-weight: bold;       
            background-color: #1c8fa9;
            
        }      
        .Topbar a:hover {
            color: #ddd;
        }
        .fa-solid {
                font-size: 20px; /* Adjust the size as needed */
                margin-right: 10px; /* Optional: Adds some spacing between the icon and the text */
                }
                .fa-brands{
                    font-size: 20px; /* Adjust the size as needed */
                    margin-right: 10px; /* Optional: Adds some spacing between the icon and the text */
                }
        h4 a {
        color: #3f828e;}

    
        .search-bar {
            float: left;
            margin-top: 8px;
        }
    
        .search-form {
            margin: 0;
            padding: 0;
        }
    
        .search-form input[type="text"] {
            padding: 6px;
            border-radius: 4px;
            border: none;
            border: 1px solid black;
        }
    
        .search-form button {
            padding: 6px 10px;
            border-radius: 4px;
            border: none;
            background-color: #4CAF50;
            color: #fff;
            cursor: pointer;
        }
        .h1{
            background-color: #fff;
            position: relative;
            font-size: 30px;
            color: #3f828e;
            background-color: rgba(255, 255, 255,0.9);
            text-align: center;
            padding: 10px;
            margin: 58px;
            font-weight: bold;
 
        }
   
        .note{
            font-size: 20px;
            color: #3f828e;
            padding: 10px;
            text-align: center;
        
         list-style-type: none;
         font-weight: bold;
        }
      
        .footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: #1c8fa9;
            color: #fff;
            text-align: center;
            padding: 10px 0;
            font-size: 14px;
            z-index: 1;
        }
      
        .Listlogo{
            background-color: #fff;
            margin-top: 90px;
            width:400px;
            height:300px;  
            border-radius: 1000px;    
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);      
        }

    </style>
           <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
        <script src="https://kit.fontawesome.com/0d370ca485.js" crossorigin="anonymous"></script>
</head>
<body>
<header>
        <nav>
            
            <ul class="Topbar">
                <li class="logo-item">
                    <a href="index.html">
                        <img src="bmccicon.png" alt="icon" class="icon">
                    </a>
                </li>
                <li class="menu-items">
                    
                    <a href="index.html"><i class="fa-solid fa-house"></i>Home</a>
                    <a href="CourseSearch.php"><i class="fa-brands fa-searchengin"></i>Course Search</a>
                    <a href="MajorandClassesList.php"><i class="fa-solid fa-list"></i>Major and Classes List</a>
                    <a href="MajorCoursePlanner.html"><i class="fa-brands fa-golang"></i>Major Course Planner</a>
                    <a href="piecharts.html"><i class="fa-solid fa-clock"></i>View Enrollment Data</a>
                </li>
                <li class="search-bar">
                    <form class="search-form">
                        <input type="text" placeholder="Search" class="search-input">
                        <button type="submit" class="search-button">Go</button>
                    </form>
                </li>
            </ul>
        </nav>
    </header>
   
    <div class="container">
    <div class="listlogo_background">
    <img src="listlogo.png" alt="ListLogo" class="Listlogo">
    </div>
    <h1><i  class="fa-solid fa-list-check"></i>Major Curriculum List</h1> 

        <div class="content">
        <footer class="footer">
        @ Borough of Manhattan Community College | 199 Chambers Street | New York, NY 10007 | Contact Us | Privacy Policy
    </footer>
<?php
// Establish a connection to the database
$majorId = $_POST['major'];
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "Majors";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to retrieve the semester information
$query = "SELECT s.semester_id, m.major_name, c1.course_name AS course1_name, c1.credits AS course1_credits,
        c2.course_name AS course2_name, c2.credits AS course2_credits,
        c3.course_name AS course3_name, c3.credits AS course3_credits,
        c4.course_name AS course4_name, c4.credits AS course4_credits,
        c5.course_name AS course5_name, c5.credits AS course5_credits,
        s.total_credits
        FROM Semester s
        JOIN Majors m ON s.major_id = m.major_id
        LEFT JOIN Courses c1 ON s.course1 = c1.course_id
        LEFT JOIN Courses c2 ON s.course2 = c2.course_id
        LEFT JOIN Courses c3 ON s.course3 = c3.course_id
        LEFT JOIN Courses c4 ON s.course4 = c4.course_id
        LEFT JOIN Courses c5 ON s.course5 = c5.course_id";
$result = $conn->query($query);

$majors = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $majorName = $row['major_name'];
        if (!isset($majors[$majorName])) {
            $majors[$majorName] = array();
        }
        array_push($majors[$majorName], $row);
    }

    foreach ($majors as $majorName => $courses) {
        echo "<h2 style='font-size: 25px; color: #3f828e;'>$majorName</h2>";
        echo "<table>
                <tr>
                    <th>Semester</th>
                    <th>Course 1</th>
                    <th>Credits</th>
                    <th>Course 2</th>
                    <th>Credits</th>
                    <th>Course 3</th>
                    <th>Credits</th>
                    <th>Course 4</th>
                    <th>Credits</th>
                    <th>Course 5</th>
                    <th>Credits</th>
                    <th>Total Credits</th>
                </tr>";

        foreach ($courses as $course) {
            echo "<tr>";
            echo "<td>" . $course['semester_id'] . "</td>";
            echo "<td>" . $course['course1_name'] . "</td>";
            echo "<td>" . $course['course1_credits'] . "</td>";
            echo "<td>" . $course['course2_name'] . "</td>";
            echo "<td>" . $course['course2_credits'] . "</td>";
            echo "<td>" . $course['course3_name'] . "</td>";
            echo "<td>" . $course['course3_credits'] . "</td>";
            echo "<td>" . $course['course4_name'] . "</td>";
            echo "<td>" . $course['course4_credits'] . "</td>";
            echo "<td>" . $course['course5_name'] . "</td>";
            echo "<td>" . $course['course5_credits'] . "</td>";
            $totalCredits = $course['course1_credits'] + $course['course2_credits'] + $course['course3_credits'] + $course['course4_credits'] + $course['course5_credits'];
            echo "<td>" . $totalCredits . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "<br>";
    }
} else {
    echo "No data available";
}

$conn->close();
?>

    </div>
</div>
<h4  >Note: The table above shows each major's for its semester courses that students may take
    <br>
    For example: first row first semester in Computer Science might take 5 courses
    <br>
    The table shows the four categories:"Individual and Society", "US Experience in Its Diversity", "World Cultures and Global Issues", and "Program Electives" will be displaying 
            on the page <a href="electives.php"> Elective Courses <br> <br> <br></a>
</body>
</html>

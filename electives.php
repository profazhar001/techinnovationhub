<!DOCTYPE html>
    <html>
    <head>
        <title>Electives Courses</title>
        <style>
        body {
            /* background-color: rgba(0, 0, 0, 0.5); */
            font-family: Arial, sans-serif;
            margin: 0px;
            padding: 0px;
            text-align: center;
            font-size: 15px;
            color: black;
        }

        .header {
            background-color: #f1f1f1;
            text-align: center;
        }

        .container {
            margin-top:100px;
            background-image: url("bmccbackground.jpeg");
            background-repeat: no-repeat;
            background-size: contain;
            background-position: center center;
            background-attachment: fixed;
            width: 100%;
            height: 100%;
           
        }

        tr:hover {
            background-color: #ddd;
        }
        .table-name {
            text-align: left;
            font-weight: bold;
            font-size: 30px;
        }
        table {
            margin: auto;
            border-collapse: collapse;
            width: 80%;
        }

        th,
        td {
            padding: 10px;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f1f1f1;
            font-weight: bold;
        }
        .content {
            background-color: rgba(255, 255, 255, 0.9);
            max-width: 100%;
            margin: auto;
            padding-bottom:45px;

        }

        .icon {
            width: 150px;
            height:21px;
            margin-right: 10px;
        }

 

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

        .h1 {
            position: relative;
            font-size: 30px;
            color: #3f828e;
            text-align: center;
            padding: 0px;
            /* margin: 58px; */
            font-weight: bold;
            background-color: rgba(255, 255, 255, 0.9);
        }

        .note {
            font-size: 15px;
            color: #3f828e;
            padding: 10px;
            text-align: center;
            list-style-type: none;
            font-weight: bold;
        }

        .menu-items {
            flex-grow: 1;
            display: flex;
            justify-content: flex-end;
        }
        .Topbar {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                list-style-type: none;
                margin: 0;
                padding: 0;
                display: flex;
                align-items: center;
                justify-content: space-between;
                background-color: #1c8fa9;
                box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.8);
                z-index: 1000;
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
        .footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: #3f828e;
            color: #fff;
            text-align: center;
            padding: 10px 0;
            font-size: 14px;
            z-index: 1;

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
                    <a href="#">
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

        <ul class="h1"><i class="fa-solid fa-list"></i>Electives Courses List
            <li class="note">
                Note: The table is the list of electives courses that shows four categories:Individual and Society, US Experience in Its Diversity, World Cultures and Global Issues, and Program Electives  
            </li>
        </ul>
        <div class="content">
        <table>
            <thead>
                <tr>
                    <th>Table Name</th>
                    <th>Course Name</th>
                    <th>Credit</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Establish a connection to the database
                    $majorId = $_POST['major'];
                    $servername = "sql212.infinityfree.com";
                    $username = "if0_34373034";
                    $password = "g9LDz1n2hE";  
                    $dbname = "if0_34373034_db_electives_courses";

                $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // SQL query to retrieve the course information
           $query = "SELECT id, course_name, credit, description, 'Individual and Society' AS table_name FROM `Individual and Society`
          UNION
          SELECT id, course_name, credit, description, 'US Experience in Its Diversity' AS table_name FROM `US Experience in Its Diversity`
          UNION
          SELECT id, course_name, credit, description, 'World Cultures and Global Issues' AS table_name FROM `World Cultures and Global Issues`
          UNION
          SELECT id, course_name, credit, description, 'Program Electives' AS table_name FROM `Program Electives`";

                $result = $conn->query($query);

                if ($result->num_rows > 0) {
                    $tableNames = [];

                    while ($row = $result->fetch_assoc()) {
                        $tableName = $row['table_name'];

                        if (!in_array($tableName, $tableNames)) {
                            $tableNames[] = $tableName;
                        }
                    }

                    foreach ($tableNames as $tableName) {
                        echo "<tr><td colspan='4' class='table-name'>$tableName</td></tr>";

                        $result->data_seek(0); // Reset the result pointer

                        while ($row = $result->fetch_assoc()) {
                            if ($row['table_name'] === $tableName) {
                                echo "<tr>";
                                echo "<td></td>"; // Empty cell for the table name
                                echo "<td>" . $row['course_name'] . "</td>";
                                echo "<td>" . $row['credit'] . "</td>";
                                echo "<td>" . $row['description'] . "</td>";
                                echo "</tr>";
                            }
                        }
                    }
                } else {
                    echo "<tr><td colspan='4'>No data available</td></tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
 
    <footer class="footer">
        @ Borough of Manhattan Community College | 199 Chambers Street | New York, NY 10007 | Contact Us | Privacy Policy
    </footer>
    </div>

    </body>
    </html>

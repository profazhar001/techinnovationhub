<!DOCTYPE html>
    <html>
    <head>
        <title>Electives Courses</title>
        <style>
            *,
            *::before,
            *::after{
                box-sizing: border-box;
            }
            body {
            font-family: Arial, sans-serif;
            background-image: url("bmccbackground.jpeg");
        }

     
        .container {            
            background-color: rgba(255, 255, 255, 0.9);
            margin-top: 250px;
            max-width: 1200px;
            margin-left: auto;
            margin-right: auto;
            padding: 20px;
            background-color: #f9f9f9;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        .table-container {
            margin-bottom: 30px; 
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        table caption {
            font-weight: bold;
            margin-bottom: 10px;
            cursor: pointer;
        }

        table th,
        table td {
            padding: 10px;
            text-align: left;
        }

        table th {
            background-color: #f1f1f1;
            font-weight: bold;
        }

        table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        table tbody tr:hover {
            background-color: #f5f5f5;
        }

        .arrow-icon::before {
            font-family: "Font Awesome 5 Free";
            font-weight: 900;
            content: "\f078";
            margin-right: 5px;
        }

        .arrow-icon.collapsed::before {
            content: "\f077";
        }
        .icon {
            width: 150px;
            height:40px;       
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
                justify-content: space-between;
                background-color: #1c8fa9;
                box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.8);
                z-index: 1000;
                overflow: hidden;
                height: 40px;               
                }

                .menu-items {
            flex-grow: 1;
            display: flex;
            justify-content: flex-end;
        }
      

        .Topbar li {
            float: left;
        }
    
        .Topbar li a {            
            color: white;
            text-align: left;
            padding: 14px 8px 8px 8px;
            text-decoration: none;
            font-weight: bold;       
            background-color: #1c8fa9;
            align-items: center;
        }      
        .Topbar a:hover {
            color: #ddd;
        }
        .header {
            background-color: #f1f1f1;
            text-align: center;
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
                Note: The table is the list of elective courses that shows four categories: Individual and Society, US Experience in Its Diversity, World Cultures and Global Issues, and Program Electives.
            </li>
        </ul>
       
        <?php
            // Establish a connection to the database
            $servername = "127.0.0.1";
            $username = "root";
            $password = "";
            $dbname = "Electives_courses";

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
                    echo "<table>";
                        echo "<caption onclick='toggleCourseList(\"$tableName\")'>";
                        echo "<span class='arrow-icon' id='arrow-icon-$tableName'></span>";
                        echo "$tableName";
                        echo "</caption>";
                        echo "<thead>";
                        echo "<tr>";
                        echo "<th>Course Name</th>";
                        echo "<th style='width: 80px;'>Credit</th>";
                        echo "<th style='width: 200px;'>Description</th>";
                        echo "</tr>";
                        echo "</thead>";
                        echo "<tbody id='course-list-$tableName' style='display: none;'>";

                    // Fetch and display the course list for the current category
                    $result->data_seek(0); // Reset the result pointer

                    while ($row = $result->fetch_assoc()) {
                        if ($row['table_name'] === $tableName) {
                            echo "<tr>";
                            echo "<td>" . $row['course_name'] . "</td>";
                            echo "<td>" . $row['credit'] . "</td>";
                            echo "<td>" . $row['description'] . "</td>";
                            echo "</tr>";
                        }
                    }

                    echo "</tbody>";
                    echo "</table>";
                }
            } else {
                echo "<p>No data available</p>";
            }

            $conn->close();
            ?>

    </div>
     
        <footer class="footer">
            @ Borough of Manhattan Community College | 199 Chambers Street | New York, NY 10007 | Contact Us | Privacy Policy
        </footer>
        </div>
        <script>
        // Function to toggle visibility of course lists
        function toggleCourseList(categoryId) {
            const courseList = document.getElementById(`course-list-${categoryId}`);
            const arrowIcon = document.getElementById(`arrow-icon-${categoryId}`);

            if (courseList.style.display === 'none') {
                courseList.style.display = 'block';
                arrowIcon.classList.remove('fa-chevron-down');
                arrowIcon.classList.add('fa-chevron-up');
            } else {
                courseList.style.display = 'none';
                arrowIcon.classList.remove('fa-chevron-up');
                arrowIcon.classList.add('fa-chevron-down');
            }
        }
    </script>
        </body>
        </html>
    

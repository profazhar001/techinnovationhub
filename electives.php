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
            margin-top: auto;
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
        .container1 {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: whitesmoke;
        }
        .search-container {
            text-align: center;
            margin-bottom: 20px;
        }

        .search-container input[type="text"] {
            padding: 8px;
            font-size: 16px;
            width: 300px;
        }

        .search-container button {
            padding: 8px 16px;
            margin-top: 10px;
            font-size: 16px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            cursor: pointer;
            border-radius: 10px;
        }

    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
    <script src="https://kit.fontawesome.com/0d370ca485.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.min.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
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
    <div class="container1">
        <h1>Search Elective Course</h1>
        <div class="search-container">
            <form method="POST" action="">
            <input type="text" name="search" id="search-input" placeholder="Enter your Elective course name" autocomplete="off">
                <div id="search-results-container"></div>
             

                <button type="submit" name="submit">Search</button>
            </form>
        </div>

        <?php
     /* Database credentials*/
   require_once "config2.php";
            $search = $_POST['search'];

            // Check if the search query is not empty
            if (!empty($search)) {
                // Perform the search operation and store the results
                $query = "SELECT id, course_name, credit, description, 'Individual and Society' AS table_name FROM `Individual and Society`
                WHERE course_name LIKE '%" . $search . "%'
                UNION
                SELECT id, course_name, credit, description, 'US Experience in Its Diversity' AS table_name FROM `US Experience in Its Diversity`
                WHERE course_name LIKE '%" . $search . "%'
                UNION
                SELECT id, course_name, credit, description, 'World Cultures and Global Issues' AS table_name FROM `World Cultures and Global Issues`
                WHERE course_name LIKE '%" . $search . "%'
                UNION
                SELECT id, course_name, credit, description, 'Program Electives' AS table_name FROM `Program Electives`
                WHERE course_name LIKE '%" . $search . "%'";

                $result = $conn->query($query);

                // Store the search results
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $searchResults[] = [
                            'table_name' => $row['table_name'],
                            'course_name' => $row['course_name'],
                            'credit' => $row['credit'],
                            'description' => $row['description']
                        ];
                    }
                }
            }
        
        ?>

        <?php if (!empty($searchResults)): ?>
            <?php foreach ($searchResults as $result): ?>
                <table>
                    <caption>
                        <?php echo $result['table_name']; ?>
                    </caption>
                    <thead>
                        <tr>
                            <th class="course-name">Course Name</th>
                            <th class="credit">Credit</th>
                            <th class="description">Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $result['course_name']; ?></td>
                            <td><?php echo $result['credit']; ?></td>
                            <td><?php echo $result['description']; ?></td>
                        </tr>
                    </tbody>
                </table>
            <?php endforeach; ?>
        <?php else: ?>
            <?php if (isset($_POST['submit'])): ?>
                <p>No data available</p>
            <?php endif; ?>
        <?php endif; ?>
    </div>
    <div class="container">
        <ul class="h1"><i class="fa-solid fa-list"></i>Electives Courses List
            <li class="note">
                Note: The table is the list of elective courses that shows four categories: Individual and Society, US Experience in Its Diversity, World Cultures and Global Issues, and Program Electives.
            </li>
        </ul>
       
        <?php

 require_once "config2.php";
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
    <script>
        // Function to check if the search query is present
        function isSearchQueryPresent() {
            const searchInput = document.querySelector('input[name="search"]');
            return searchInput.value.trim() !== '';
        }

        // Check if the search query is present, and if not, hide the search results section
        window.addEventListener('load', () => {
            const searchResults = document.querySelector('.search-results');

            if (!isSearchQueryPresent()) {
                searchResults.style.display = 'none';
            } else {
                searchResults.style.display = 'block';
            }
        });
    </script>
<script>
$(document).ready(function() {
  const courseNames = ['ACL 200 - Literacy Practices: Birth through Adolescence',
'COM 100 - Introduction to Communication Studies',
'COM 240 - Interpersonal Communication',
'CRT 100 - Critical Thinking',
'CRT 120 - Critical Thinking and Social Justice',
'CRT 196 - Critical Thinking: Inquiry through Queer Theories',
'CRT 245 - Critical Thinking and Media Literacy',
'ECO 100 - Introduction to Economics',
'ECO 202 - Microeconomics',
'GWS 100 - Introduction to Gender and Women\'s Studies',
'HED 190 - Human Sexuality and Society',
'HIS 101 - Western Civilization: From Ancient to Early Modern Times',
'HIS 102 - Western Civilization: The Emergence of the Modern World',
'LIN 100 - Language and Culture',
'MES 152 - Introduction to Contemporary Media',
'PHI 100 - Philosophy',
'PHI 120 - Ethics',
'POL 110 - Introduction to Politics',
'POL 120 - Gender and Politics',
'SOC 100 - Introduction to Sociology',
'SOC 111 - Understanding Technological Society',
'ACR 150 - Literacy in American Society',
'AFL 100 - Introduction to Ethnic Studies',
'AFL 125 - Comparative Ethnic Studies',
'AFL 161 - Health Problems in Urban Communities',
'AFN 123 - African-American History, 17th Century to 1865',
'AFN 124 - African-American History, 1865 to Present',
'AFN 129 - The Black Man in Contemporary Society',
'ASN 114 - Asian American History',
'ASN 211 - Asian Americans in NYC',
'ECO 201 - Macroeconomics',
'HED 195 - Food, Culture and Society',
'HIS 120 - Early American History: Colonial Period to Civil War',
'HIS 125 - Modern American History: Civil War to Present',
'LAT 125 - Puerto Rican Culture and Folklore',
'LAT 140 - Introduction to Mexican-American Studies',
'LAT 150 - The Latino Experience in the U.S.',
'LIN 150 - Language, Race, and Ethnicity in the US and its Territories',
'POL 100 - American Government',
'SPN 485 - New York Literature in Spanish'
]; // Replace with your own list of course names

  $('#search-input').autocomplete({
    source: courseNames,
    minLength: 2,
    select: function(event, ui) {
      // Handle the selected suggestion
      $('#search-input').val(ui.item.value);
      // Perform the search or other actions here
      // ...
      return false;
    }
  });
});


</script>
        </body>
        </html>
    

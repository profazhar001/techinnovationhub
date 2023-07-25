    <!DOCTYPE html>
    <html>
    <head>
        <title>Course Search</title>

            <style>
                body {
                    font-family: Arial, sans-serif;
                            display: block;
                            margin:0px auto;
                            padding: 0px;
                            text-align: center; 
                            font-size: 15px;
                        
                }
                .container{
                width: 100%;
                height: 100%;
            }
        
                table {
                    border-collapse: collapse;
                    width: 100%;
                }

                th, td {
                    padding: 8px;
                    text-align: left;
                    border-bottom: 1px solid #ddd;
                }

                th {
                    background-color: #f2f2f2;
                }

                    

                tr:hover {
                    background-color: #ddd
                    ;
                }
    
            .content {
                max-width: 800px;
                margin: 0 auto 50px auto;
            background-color: rgba(255, 255, 255, 0.9);
            padding-bottom: 50px;
            } 
            .header {display: flex;
                align-items: center;
                    } 
            .header i {
            margin-right: 5px; /* Adjust the spacing as needed */
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

            .fa-brands.fa-sistrix.fa-beat {
    /* Modify the styles for the h2 element with the given classes */
    color: #3f828e;
    font-size: 24px;
    margin-top: 30px;
    }

    label {
    /* Modify the styles for the label element */
    font-weight: bold;
    }

    select {
    /* Modify the styles for the select element */
    width: 200px;
    padding: 6px;
    border-radius: 4px;
    }

    input[type="submit"] {
    /* Modify the styles for the submit button */
    background-color: #127B92;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    }

    input[type="submit"]:hover {
    /* Modify the styles for the submit button on hover */
    background-color: #3071a9;
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
            h4 a {
                color: #3f828e;
            }
            .search-form button {
                padding: 6px 10px;
                border-radius: 4px;
                border: none;
                background-color: #4CAF50;
                color: #fff;
                cursor: pointer;
            }
            .searchlogo{
                border-radius: 26px;
                margin-top: 90px;
                width: 600px;
                height:300px;
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
        <div class="img_search">
                <img src="searchlogo.png" alt="searchLogo" class="searchlogo">
            </div>
        <div class="container">
            <div class="content">
                <h2><i class="fa-brands fa-sistrix fa-beat"></i> Course Search</h2>
                
            <form method="POST" action="">
                    <label for="major">Select your major:</label>
                    <select name="major" id="major">
                        <option value="1" <?php if(isset($_POST['search']) && $_POST['major'] == '1') echo 'selected'; ?>>Computer Science</option>
                        <option value="2" <?php if(isset($_POST['search']) && $_POST['major'] == '2') echo 'selected'; ?>>Computer Information Systems</option>
                        <option value="3" <?php if(isset($_POST['search']) && $_POST['major'] == '3') echo 'selected'; ?>>Computer Network Technology</option>
                        <option value="4" <?php if(isset($_POST['search']) && $_POST['major'] == '4') echo 'selected'; ?>>Geographic Information Science</option>
                    </select>
                    <br><br>
                    <input type="submit" name="search" value="Search">
                
                </form>
                
                        <?php


                            // Check if the search button is clicked
                            if(isset($_POST['search'])) {
                        $majorId = $_POST['major'];
                                $servername = "127.0.0.1";
                                $username = "root";
                                $password = "";
                                $dbname = "Majors";

                            // Create connection
                            $conn = new mysqli($servername, $username, $password, $dbname);
                            
                            // Check connection
                                    if ($conn->connect_error) {
                                        die("Connection failed: " . $conn->connect_error);
                                    }

                                // Retrieve major details
                                $majorQuery = "SELECT * FROM Majors WHERE major_id = $majorId";
                                $majorResult = $conn->query($majorQuery);
                                $major = $majorResult->fetch_assoc();
                                
                                $isComputerScience = ($majorId == 1);
                                $isComputerInfoSystems = ($majorId == 2);
                                $isComputerNetworkTechnology =($majorId == 3);
                                $isGeographicInformationScience = ($majorId == 4);
                                if ($majorResult->num_rows > 0) {
                                    echo "<h2>Your Major: " . $major['major_name'] . "</h2>";
                                    echo "<h3>Course Requirements:</h3>";

                                    // Retrieve course details for the major
                                    $courseQuery = "SELECT * FROM Courses WHERE major_id = $majorId";
                                    $courseResult = $conn->query($courseQuery);
                                    $totalCourses = $courseResult->num_rows;
                                    $coursesPerSemester = 5;
                                    $totalSemesters = ceil($totalCourses / $coursesPerSemester);
                                    $totalCredits = 0;


                                    if ($courseResult->num_rows > 0) {
                                        echo "<table>";
                                        echo "<tr><th>Course Name</th><th>Credits</th></tr>";

                                        while ($course = $courseResult->fetch_assoc()) {
                                            echo "<tr>";
                                            echo "<td>" . $course['course_name'] . "</td>";
                                            echo "<td>" . $course['credits'] . "</td>";
                                            echo "</tr>";
                                            $totalCredits += $course['credits'];
                                        }

                                        echo "</table>";
                                        echo "<h3>Summary:</h3>";
                                        echo "<p>Total Courses: " . $totalCourses . "</p>";
                                        echo "<p>Total Semesters: " . $totalSemesters . "</p>";
                                        echo "<p>Total Credits: " . $totalCredits . "</p>";
                                        if ($isComputerScience){
                                        echo "<h3>Footnotes:</h3>";
                                            echo "<table>";
                                                    echo "<tr><th>Footnote</th><th>Description</th></tr>";
                                                    echo "<tr><td>1</td><td>Students are required to take MAT 206.5. MAT 206.5 is a combination course of Intermediate Algebra and Trigonometry and Precalculus and will help to fulfill the General Elective requirement of which 6 credits are required. The remaining 2 credits can be satisfied by taking STEM variants in the Common Core.</td></tr>";                                                 
                                                    echo "<tr><td>2</td><td>CSC 101 and MAT 206.5 are prerequisite courses to CSC 111. Students are strongly encouraged to take both courses in their first semester.</td></tr>";
                                                    echo "<tr><td>3</td><td>MAT 206.5 must be passed in order to take MAT 301.</td></tr>";
                                                    echo "<tr><td>4</td><td>SPE 102 is an option for non-native speakers of English.</td></tr>";
                                                    echo "<tr><td>5</td><td>PHY 215 has a co-requisite course of MAT 302.</td></tr>";
                                                    echo "<tr><td>6</td><td>MAT 301 must be passed in order to take MAT 302.</td></tr>";
                                                    echo "<tr><td>7</td><td>CSC 111 must be passed in order to take CSC 211 and CSC 215.</td></tr>";
                                                    echo "<tr><td>8</td><td>CSC 111 and MAT 301 must be passed in order to take CSC 231.</td></tr>";
                                                    echo "<tr><td>9</td><td>A total of 6 credits are needed. Choose 1 from CIS 317, CIS 345, CIS 359, CIS 362, CIS 364, CIS 385, CIS 395, CSC 103, or GIS 201.</td></tr>";
                                                    echo "<tr><td>10</td><td>CSC 211 and CSC 231 must be passed in order to take CSC 331.</td></tr>";
                                                    echo "<tr><td>11</td><td>CSC 211 must be passed in order to take CSC 350.</td></tr>";
                                                    echo "<tr><td>12</td><td>A Writing Intensive course is needed to graduate.</td></tr>";
                                                    echo "</table>";}
                                        
                                        if ($isComputerInfoSystems) {
                                                echo "<h3>Footnotes:</h3>";
                                            echo "<table>";
                                            echo "<tr><th>Footnote</th><th>Description</th></tr>";
                                            echo "<tr><td>1</td><td>CSC 101 should be taken in the first semester as it is a prerequisite course for CSC 110.</td></tr>";
                                            echo "<tr><td>2</td><td>SPE 102 is an option for non-native speakers of English.</td></tr>";
                                            echo "<tr><td>3</td><td>CSC 111 is an alternative option.</td></tr>";
                                            echo "<tr><td>4</td><td>PHY 110 is an alternative option.</td></tr>";
                                            echo "<tr><td>5</td><td>MAT 206.5 is a co-requisite course for CSC 210.</td></tr>";
                                            echo "<tr><td>6</td><td>CSC 110 must be passed in order to take CSC 210, CIS 345, CIS 385, CIS 395, and CIS 440.</td></tr>";
                                            echo "<tr><td>7</td><td>A total of 6 credits is required. Choose from: GIS 101, GIS 201, CIS 359, CIS 362, CIS 364, CIS 459, and CIS 490.</td></tr>";
                                            echo "<tr><td>8</td><td>CIS 385 must be passed in order to take CIS 485.</td></tr>";
                                            echo "<tr><td>9</td><td>CIS 395 must be passed in order to take CIS 495.</td></tr>";
                                            echo "<tr><td>10</td><td>A total of 3 credits is required. Choose from: ACC, BUS, CIS, CSC, GIS, or MMP except for CIS 100.</td></tr>";
                                            echo "<tr><td>11</td><td>A Writing Intensive course is needed to graduate.</td></tr>";
                                            echo "</table>";
                                        }
                                        if ($isComputerNetworkTechnology){
                                            echo "<h3>Footnotes:</h3>";
                                            echo "<table>";
                                            echo "<tr><th>Footnote</th><th>Description</th></tr>";
                                            echo "<tr><td>1</td><td>CSC 101 should be taken in the first semester as it is a prerequisite course for CSC 110 and CIS 165.</td></tr>";
                                            echo "<tr><td>2</td><td>CSC 111 is an alternative option.</td></tr>";
                                            echo "<tr><td>3</td><td>SPE 102 is an option for non-native speakers of English.</td></tr>";
                                            echo "<tr><td>4</td><td>A total of 6 credits is required. Choose from GIS 101, GIS 201, CIS 359, CIS 362, CIS 364, CIS 459, and CIS 490.</td></tr>";
                                            echo "<tr><td>5</td><td>PHY 110 is an alternative option.</td></tr>";
                                            echo "<tr><td>6</td><td>CIS 165 must be passed in order to take CIS 255.</td></tr>";
                                            echo "<tr><td>7</td><td>CIS 165 or CSC 110 or CIS 111 must be passed in order to take CIS 345.</td></tr>";
                                            echo "<tr><td>8</td><td>A total of 6 credits is required. Choose from ACC, BUS, CIS, CSC, GIS or MMP except for CIS 100.</td></tr>";
                                            echo "<tr><td>9</td><td>CIS 345 must be passed in order to take CIS 445 and CIS 455.</td></tr>";
                                            echo "<tr><td>10</td><td>CIS 255 or CSC 110 or CSC 111 must be passed in order to take CIS 440.</td></tr>";
                                            echo "<tr><td>11</td><td>A Writing Intensive course is needed to graduate.</td></tr>";
                                            echo "</table>";

                                        }
                                        if($isGeographicInformationScience)
                                            {
                                                echo "<h3>Footnotes:</h3>";
                                                echo "<table>";
                                                echo "<tr><th>Footnote</th><th>Description</th></tr>";
                                                echo "<tr><td>1</td><td>CSC 101 should be taken in the first semester as it is a prerequisite course for CSC 110.</td></tr>";
                                                echo "<tr><td>2</td><td>Students are required to take MAT 206.5. MAT 206.5 is a combination course of Intermediate Algebra <br>and Trigonometry and Precalculus and will be used to satisfy <br>the General Elective                                                    Requirement.</td></tr>";
                                                echo "<tr><td>3</td><td>Students are advised to take GEO 100 to fulfill the World Culture & Global Issues requirement.</td></tr>";
                                                echo "<tr><td>4</td><td>GEO 100 must be passed in order to take GIS 201 and GEO 226.</td></tr>";
                                                echo "<tr><td>5</td><td>MAT 206.5 must be passed in order to take MAT 209.</td></tr>";
                                                echo "<tr><td>6</td><td>CSC 110 must be passed in order to take CIS 395.</td></tr>";
                                                echo "<tr><td>7</td><td>GIS 201 must be passed in order to take GIS 261.</td></tr>";
                                                echo "<tr><td>8</td><td>SPE 102 is an option for non-native speakers of English.</td></tr>";
                                                echo "<tr><td>9</td><td>GIS 261, CIS 395, and CSC 110 or CSC 111 must be completed before taking GIS 361.</td></tr>";
                                                echo "<tr><td>10</td><td>GEO 100 must be passed in order to take GEO 241. Alternate option to GEO 241 are CED 201 and GIS 325. <br>Students must have a B or better in both ENG 201 and SPE 100/102; completion of CED                                                  201 and at least 36 credits including CIS 395, GIS 261 and MAT 209 in order to take GIS 325.</td></tr>";
                                                echo "<tr><td>11</td><td>Please consult with an academic or faculty advisor.</td></tr>";
                                                echo "<tr><td>12</td><td>Select any Creative Expression Pathways course except SPE 100 or SPE 102.</td></tr>";
                                                echo "<tr><td>13</td><td>A Writing Intensive course is needed to graduate.</td></tr>";
                                                echo "</table>";


                                            }

                                    
                                    } else {
                                        echo "No courses found for the selected major.";
                                    }
                                } else {
                                    echo "Major not found.";
                                }


                                    // Close the database connection
                                    $conn->close();
                                }
                                ?>
                                <h4  >Note: The table shows the four categories:Individual and Society, US Experience in Its Diversity, World Cultures and Global Issues, and Program Electives will be displaying 
                on the page <a href="electives.php"> Elective Courses</a>
                </h4>
            </div>
        
        </div>
    
                <footer class="footer">
            @ Borough of Manhattan Community College | 199 Chambers Street | New York, NY 10007 | Contact Us | Privacy Policy
        </footer>
                    </body>
                    </html>

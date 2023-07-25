    <?php
    $dataPoints1 = array(
        array("label"=> "Associate's degrees", "y"=> 38434),
        array("label"=> "Bachelor's degrees", "y"=> 398602),
        array("label"=> "Master's degrees", "y"=> 96230),
        array("label"=> "Doctoral degrees", "y"=> 27862),
    );
    $dataPoints2 = array(
        array("label"=> "Associate's degrees", "y"=> 104435),
        array("label"=> "Bachelor's degrees", "y"=> 724947),
        array("label"=> "Master's degrees", "y"=> 209566),
        array("label"=> "Doctoral degrees", "y"=> 47753),
    );?>
    <!DOCTYPE HTML>
    <html>
    <head>  
    <title>Data Analysis</title>
        <style>
            body{
        background-color: white;
        text-align: center;
        
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
            position: fixed ;
            top: 0;
            left: 0;
            list-style-type: none;
            width: 100%;
            margin: 0;
            padding: 0;
            overflow: hidden;
            display: flex;
            align-items: center;
            background-color: black;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.8);
            z-index: 1000;
            }

            .Topbar li {
                float: left;
            }

            .Topbar li a {
                color: white;
                text-align: left;
                padding: 14px 8px 20px 8px;
                text-decoration: none;
                font-weight: bold;       
                background-color: black;
            }      
            .Topbar a:hover {
        color: #ddd;
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

        .fa-solid {
            font-size: 20px; /* Adjust the size as needed */
            margin-right: 10px; /* Optional: Adds some spacing between the icon and the text */
            }
            .fa-brands{
                font-size: 20px; /* Adjust the size as needed */
                margin-right: 10px; /* Optional: Adds some spacing between the icon and the text */
            }
            .chart-container1{

                display: grid;
                grid-template-columns: repeat(2, 1fr);
                grid-gap: 20px;
                margin-left: 50px;
                padding: 0;              
            }
                table {
            width:50%;
            border-collapse: collapse;
            font-family: Arial, sans-serif;
            text-align: center;
            
            }
            .chart-container2{

            display: grid;
            grid-template-columns: repeat(2, 1fr);
            grid-gap: 20px;
            margin-left: 50px;
            padding: 0;
            }
            table {
            width:50%;
            border-collapse: collapse;
            font-family: Arial, sans-serif;
            text-align: center;

            }
            th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            }

            th {
            background-color: #f2f2f2;
            font-weight: bold;
            }

            tr:hover {
            background-color: #f5f5f5;
            }
            .footnote{
                
                    display: flex;
                justify-content: center;
                }
                h2{
                font-size: 17px; 
                margin: 0; 
                padding: 0;
                }
                h2 a{
                    color:black;
                    text-decoration: underline;
                }
                p{
        font-size:20px;
    }
        </style>
    <script>
    window.onload = function () {
        var dataPoints1 = [];
        var chart1 = new CanvasJS.Chart("chartContainer1", {
        animationEnabled: true,
        exportEnabled: true,
        title: {
            text: "Data for Associate's Degrees in Engineering Technologies Majors (National)"
        },
        axisY: {
            title: "Number of Graduates"
        },
        data: [{
            type: "column",
            toolTipContent: "{label}: {y} graduates",
            dataPoints: dataPoints1
        }]
        });

        $.get("S&E_technologies_associates_degrees.csv", function (csv) {
        var csvLines = csv.split(/[\r?\n|\r|\n]+/);
        var year = 2000; // Starting year
        for (var i = 0; i < csvLines.length; i++) {
            if (csvLines[i].length > 0) {
            var points = csvLines[i].split(",");
            var graduates = parseFloat(points[1]);
            dataPoints1.push({
                label: year.toString(), // Convert year to string
                y: graduates
            });
            year++; // Increment year for the next data point
            }
        }
        chart1.render();
        });

        var dataPoints2 = [];
        var chart2 = new CanvasJS.Chart("chartContainer2", {
        animationEnabled: true,
        exportEnabled: true,
        title: {
            text: "Data for Associate's Degrees in Science and other S&E Technologies Majors (National)"
        },
        axisY: {
            title: "Number of Graduates"
        },
        data: [{
            type: "column",
            toolTipContent: "{label}: {y} graduates",
            dataPoints: dataPoints2
        }]
        });

        $.get("Science_and_other_S&E_technologies.csv", function (csv) {
        var csvLines = csv.split(/[\r?\n|\r|\n]+/);
        var year = 2000; // Starting year
        for (var i = 0; i < csvLines.length; i++) {
            if (csvLines[i].length > 0) {
            var points = csvLines[i].split(",");
            var graduates = parseFloat(points[1]);
            dataPoints2.push({
                label: year.toString(), // Convert year to string
                y: graduates
            });
            year++; // Increment year for the next data point
            }
        }
        chart2.render();
        });

    
        var chart3 = new CanvasJS.Chart("chartContainer9", {
        animationEnabled: true,
        theme: "light2",
        title:{
            text: ""
        },
        axisY:{
            includeZero: true
        },
        legend:{
            cursor: "pointer",
            verticalAlign: "center",
            horizontalAlign: "right",
            itemclick: toggleDataSeries
        },
        data: [{
            type: "column",
            name: "2000",
            indexLabel: "{y}",
            yValueFormatString: "#0.##",
            showInLegend: true,
            dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
        },{
            type: "column",
            name: "2019",
            indexLabel: "{y}",
            yValueFormatString: "#0.##",
            showInLegend: true,
            dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
        }]
        });

        chart3.render();

        function toggleDataSeries(e){
        if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
            e.dataSeries.visible = false;
        }
        else{
            e.dataSeries.visible = true;
        }
        chart3.render();
        }

        var dataPoints0 = [];
    var chart4 = new CanvasJS.Chart("chartContainer0", {
    animationEnabled: true,
    title: {
        text: "Computer Science in Associate's Degrees awarded data by field: 2000-2019"
    },
    axisY: {
        title: "Number of Students",
        includeZero: true,
        crosshair: {
        enabled: true,
        snapToDataPoint: true
        }
    },
    data: [{
        type: "spline",
        toolTipContent: "{label}: {y} students",
        dataPoints: dataPoints0
    }]
    });
    $.get("Computer_Science_in_Associate's_Degrees_awarded_data.csv", function (csv) {
    var csvLines = csv.split(/[\r?\n|\r|\n]+/);
    for (var i = 0; i < csvLines.length; i++) {
        if (csvLines[i].length > 0) {
        var points = csvLines[i].split(",");
        var year = parseInt(points[0]);
        var graduates = parseInt(points[1]);
        dataPoints0.push({
            label: year.toString(),
            y: graduates
        });
        }
    }
    chart4.render();
    });

    var dataPoints15 = [];
    var chart5 = new CanvasJS.Chart("chartContainer3", {
    animationEnabled: true,
    title: {
        text: "Enrollment data for CIS  (Computer Information System)department at BMCC 2015-2022"
    },
    axisY: {
        title: "Number of Students",
        includeZero: true,
        crosshair: {
        enabled: true,
        snapToDataPoint: true
        }
    },
    data: [{
        type: "spline",
        toolTipContent: "{label}: {y} students",
        dataPoints: dataPoints15
    }]
    });
    $.get("Enrollment_data_for_CIS_department.csv", function (csv) {
    var csvLines = csv.split(/[\r?\n|\r|\n]+/);
    for (var i = 0; i < csvLines.length; i++) {
        if (csvLines[i].length > 0) {
        var points = csvLines[i].split(",");
        var year = parseInt(points[0]);
        var graduates = parseInt(points[1]);
        dataPoints15.push({
            label: year.toString(),
            y: graduates
        });
        }
    }
    chart5.render();
    });

    var dataPoints16 = [];
    var chart6 = new CanvasJS.Chart("chartContainer4", {
    animationEnabled: true,
    title: {
        text: "Graduation data for CIS department at BMCC 2016-2022"
    },
    axisY: {
        title: "Number of Students",
        includeZero: true,
        crosshair: {
        enabled: true,
        snapToDataPoint: true
        }
    },
    data: [{
        type: "spline",
        toolTipContent: "{label}: {y} students",
        dataPoints: dataPoints16
    }]
    });
    $.get("Graduation_data _or_CIS_department.csv", function (csv) {
    var csvLines = csv.split(/[\r?\n|\r|\n]+/);
    for (var i = 0; i < csvLines.length; i++) {
        if (csvLines[i].length > 0) {
        var points = csvLines[i].split(",");
        var year = parseInt(points[0]);
        var graduates = parseInt(points[1]);
        dataPoints16.push({
            label: year.toString(),
            y: graduates
        });
        }
    }
    chart6.render();
    });



    var dataPoints17 = [];
    var chart7 = new CanvasJS.Chart("chartContainer5", {
    animationEnabled: true,
    title: {
        text: "Enrollment data for CS (Computer Science)Major at BMCC 2015-2022"
    },
    axisY: {
        title: "Number of Students",
        includeZero: true,
        crosshair: {
        enabled: true,
        snapToDataPoint: true
        }
    },
    data: [{
        type: "spline",
        toolTipContent: "{label}: {y} students",
        dataPoints: dataPoints17
    }]
    });
    $.get("Enrollment data for CS Major.csv", function (csv) {
    var csvLines = csv.split(/[\r?\n|\r|\n]+/);
    for (var i = 0; i < csvLines.length; i++) {
        if (csvLines[i].length > 0) {
        var points = csvLines[i].split(",");
        var year = parseInt(points[0]);
        var graduates = parseInt(points[1]);
        dataPoints17.push({
            label: year.toString(),
            y: graduates
        });
        }
    }
    chart7.render();
    });


    var dataPoints18 = [];
    var chart8 = new CanvasJS.Chart("chartContainer6", {
    animationEnabled: true,
    title: {
        text: "Graduation data for CS major at BMCC 2016-2022"
    },
    axisY: {
        title: "Number of Students",
        includeZero: true,
        crosshair: {
        enabled: true,
        snapToDataPoint: true
        }
    },
    data: [{
        type: "spline",
        toolTipContent: "{label}: {y} students",
        dataPoints: dataPoints18
    }]
    });
    $.get("Graduation data for CS major.csv", function (csv) {
    var csvLines = csv.split(/[\r?\n|\r|\n]+/);
    for (var i = 0; i < csvLines.length; i++) {
        if (csvLines[i].length > 0) {
        var points = csvLines[i].split(",");
        var year = parseInt(points[0]);
        var graduates = parseInt(points[1]);
        dataPoints18.push({
            label: year.toString(),
            y: graduates
        });
        }
    }
    chart8.render();
    });
    
    var dataPoints19 = [];
    var chart9 = new CanvasJS.Chart("chartContainer7", {
    animationEnabled: true,
    title: {
        text: "Enrollment data for CIS (Computer Information System)'Major' at BMCC 2015-2022"
    },
    axisY: {
        title: "Number of Students",
        includeZero: true,
        crosshair: {
        enabled: true,
        snapToDataPoint: true
        }
    },
    data: [{
        type: "spline",
        toolTipContent: "{label}: {y} students",
        dataPoints: dataPoints19
    }]
    });
    $.get("Enrollment data for CIS Major.csv", function (csv) {
    var csvLines = csv.split(/[\r?\n|\r|\n]+/);
    for (var i = 0; i < csvLines.length; i++) {
        if (csvLines[i].length > 0) {
        var points = csvLines[i].split(",");
        var year = parseInt(points[0]);
        var graduates = parseInt(points[1]);
        dataPoints19.push({
            label: year.toString(),
            y: graduates
        });
        }
    }
    chart9.render();
    });
    var dataPoints20 = [];
    var chart10 = new CanvasJS.Chart("chartContainer8", {
    animationEnabled: true,
    title: {
        text: "Graduation data for CIS major at BMCC 2016-2022"
    },
    axisY: {
        title: "Number of Students",
        includeZero: true,
        crosshair: {
        enabled: true,
        snapToDataPoint: true
        }
    },
    data: [{
        type: "spline",
        toolTipContent: "{label}: {y} students",
        dataPoints: dataPoints20
    }]
    });
    $.get("Graduation data for CIS major.csv", function (csv) {
    var csvLines = csv.split(/[\r?\n|\r|\n]+/);
    for (var i = 0; i < csvLines.length; i++) {
        if (csvLines[i].length > 0) {
        var points = csvLines[i].split(",");
        var year = parseInt(points[0]);
        var graduates = parseInt(points[1]);
        dataPoints20.push({
            label: year.toString(),
            y: graduates
        });
        }
    }
    chart10.render();
    });
    
    var dataPoints21 = [];
    var chart11 = new CanvasJS.Chart("chartContainer11", {
    animationEnabled: true,
    title: {
        text: "Enrollment data for CNT  (Computer Network Technology)Majorat BMCC 2015-2022"
    },
    axisY: {
        title: "Number of Students",
        includeZero: true,
        crosshair: {
        enabled: true,
        snapToDataPoint: true
        }
    },
    data: [{
        type: "spline",
        toolTipContent: "{label}: {y} students",
        dataPoints: dataPoints21
    }]
    });
    $.get("Enrollment data for CNT Major.csv", function (csv) {
    var csvLines = csv.split(/[\r?\n|\r|\n]+/);
    for (var i = 0; i < csvLines.length; i++) {
        if (csvLines[i].length > 0) {
        var points = csvLines[i].split(",");
        var year = parseInt(points[0]);
        var graduates = parseInt(points[1]);
        dataPoints21.push({
            label: year.toString(),
            y: graduates
        });
        }
    }
    chart11.render();
    });
    
    var dataPoints22 = [];
    var chart12 = new CanvasJS.Chart("chartContainer12", {
    animationEnabled: true,
    title: {
        text: "Graduation data for CNT major at BMCC 2016-2022"
    },
    axisY: {
        title: "Number of Students",
        includeZero: true,
        crosshair: {
        enabled: true,
        snapToDataPoint: true
        }
    },
    data: [{
        type: "spline",
        toolTipContent: "{label}: {y} students",
        dataPoints: dataPoints22
    }]
    });
    $.get("Graduation data for CNT major.csv", function (csv) {
    var csvLines = csv.split(/[\r?\n|\r|\n]+/);
    for (var i = 0; i < csvLines.length; i++) {
        if (csvLines[i].length > 0) {
        var points = csvLines[i].split(",");
        var year = parseInt(points[0]);
        var graduates = parseInt(points[1]);
        dataPoints22.push({
            label: year.toString(),
            y: graduates
        });
        }
    }
    chart12.render();
    });
    }
    
    
    </script>
    <script type="text/javascript" src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
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
                <a href="Homepage.html"><i class="fa-solid fa-house"></i>Home</a>
                            <a href="page4.php"><i class="fa-brands fa-searchengin"></i>Course Search</a>
                            <a href="page2.php"><i class="fa-solid fa-list"></i>Major and Classes List</a>
                            <a href="page3.html"><i class="fa-brands fa-golang"></i>Major Course Planner</a>
                            <a href="page6.html"><i class="fa-solid fa-clock"></i>View Enrollment Data</a>
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
    <h1 style="text-align:center; margin-top: 80px;"> U.S. nation Graduation Data of S&E (Science & Engineering) Marjors in Associate's Degrees from 2000 to 2019.</h1>
    <div class="text" style="max-width: 800px; margin: 0 auto; text-align: center;">
    
        <p><em>S&E Associate&apos;s Degrees</em><a href="#target">(Click here for majors' detail)</a><br>
        Associate&apos;s degrees are the final degree earned by some students, whereas others continue their education at 4-year colleges or universities and earn higher degrees. 
        Many who transfer from community colleges to baccalaureate-granting institutions do not earn associate&apos;s degrees before transferring; they may be able to transfer credit 
        for specific courses.<br><br></p>
        
    </div>
    <hr>

        <hr>
    <div class="chart-container1">

        <div class="chart-item">
            <div id="chartContainer1" style="height: 370px;width: 80%;"></div>
            
        </div>
        <div class="chart-item">
            <div id="chartContainer2" style="height: 370px;width: 80%;"></div>
        </div>
        <div class="chart-item">
        <p style="max-width:80%;font-weight: bold;font-family:Verdana, Geneva, Tahoma, sans-serif;font-size:23px;">Number of graduates by Degree Level 2000 & 2019 (National) </p>
            <div id="chartContainer9" style="height: 370px; width: 80%;"></div>       
        </div>
        <div class="chart-item">
        <div id="chartContainer0" style="height: 370px; width: 80%;"></div>      
        </div>
    </div>

    <div class="text" style="max-width: 1200px; margin: 0 auto; text-align: center;">
    <p> <br><br>Relatively few associate&apos;s degrees are awarded in S&E fields. In 2019, 104,000 out of more than 1 million associate&apos;s degrees (10%) were in S&E fields 
        (see &apos;Table column 3&apos;). The total number of S&E associate&apos;s degrees awarded declined from 2003 to 2007 but has risen in almost all years since then.
        Until 2012, the overall trend mirrored the pattern in computer sciences, which account for a large portion (nearly 50% in 2012 and 31% in 2019) of S&E associate&apos;s degrees (Figure HED-4). 
        Since 2012, the total number of S&E associate&apos;s degrees has continued to increase despite a decline in the number of computer sciences degrees.
        </p> 
        <p><br>S&E coursework <a href="#target">(Click here for majors' detail)</a> at the undergraduate level prepares knowledgeable citizens in a society 
        increasingly reliant on science and technology. Over the past 20 years, the number of undergraduate degrees awarded by U.S. academic 
        institutions has increased in both S&E and non-S&E fields. According to the U.S. Department of Education, the number of associate&apos;s 
        degrees awarded is projected to increase by 1%, 
        and the number of bachelor&apos;s degrees awarded should increase by 3% over the period spanning 2017&ndash;29.
        
        </p>
        <hr style="  border: 2px solid gray;
    border-radius: 5px;">
        <h1 style="font-weight: 60px;"> <br> <br> Enrollment / Graduation Data at BMCC 2015-2022</h1>
    </div>
        <div class="chart-container2">
        <div class="chart-item">
            <div id="chartContainer3" style="height: 370px; width: 80%;"></div>       
        </div>
        <div class="chart-item">
            <div id="chartContainer4" style="height: 370px; width: 80%;"></div>       
        </div>
        <div class="chart-item">
            <div id="chartContainer5" style="height: 370px; width: 80%;"></div>       
        </div>
        <div class="chart-item">
            <div id="chartContainer6" style="height: 370px; width: 80%;"></div>       
        </div>
        <div class="chart-item">
            <div id="chartContainer7" style="height: 370px; width: 80%;"></div>       
        </div>
        <div class="chart-item">
            <div id="chartContainer8" style="height: 370px; width: 80%;"></div>       
        </div>
        
        <div class="chart-item">
            <div id="chartContainer11" style="height: 370px; width: 80%;"></div>       
        </div>
        <div class="chart-item">
        <div id="chartContainer12" style="height: 370px; width: 80%;"></div>      
        </div>
    </div>
    <hr style="  border: 2px solid black;
    border-radius: 10px;">
    <p style="font-size:15px;">
        <br><br><em>Reference: National Center for Education Statistics, Integrated Postsecondary Education Data System (IPEDS), 
        Completions Survey; National Center for Science and Engineering Statistics, Table Builder.</em>
        <br> link:<a href="https://ncses.nsf.gov/pubs/nsb20223/trends-in-undergraduate-and-graduate-s-e-degree-awards">Click here</a> <br><br> </p>
        <hr>
        <h2 id="target">S&E majors breakdown</h2>
    <div class="footnote">
    
    <table>
        <tr>
    
        <th>S&E technologies [All Fields]</th>
        </tr>
        <tr>
        <td>Engineering technologies</td>
        </tr>
        <tr>
        <td>Engineering technology, general</td>
        </tr>
        <tr>
        <td>Architectural engineering technologies/ technicians</td>
        </tr>
        <tr>
        <td>Audiovisual communications technologies/ technicians</td>
        </tr>
        <tr>
        <td>Civil engineering technologies/ technicians</td>
        </tr>
        <tr>
        <td>Communications technologies/ technicians and support services, other</td>
        </tr>
        <tr>
        <td>Communications technology/ technician</td>
        </tr>
        <tr>
        <td>Computer engineering technologies/ technicians</td>
        </tr>
        <tr>
        <td>Construction engineering technologies</td>
        </tr>
        <tr>
        <td>Drafting/ design engineering technologies/ technicians</td>
        </tr>
        <tr>
        <td>Electrical engineering technologies/ technicians</td>
        </tr>
        <tr>
        <td>Electromechanical instrumentation and maintenance technologies/ technicians</td>
        </tr>
        <tr>
        <td>Engineering-related fields</td>
        </tr>
        <tr>
        <td>Engineering-related technologies</td>
        </tr>
        <tr>
        <td>Environmental control technologies/ technicians</td>
        </tr>
        <tr>
        <td>Industrial production technologies/ technicians</td>
        </tr>
        <tr>
        <td>Mechanical engineering related technologies/ technicians</td>
        </tr>
        <tr>
        <td>Mining and petroleum technologies/ technicians</td>
        </tr>
        <tr>
        <td>Nanotechnology</td>
        </tr>
        <tr>
        <td>Nuclear engineering technologies/ technicians</td>
        </tr>
        <tr>
        <td>Precision metal working</td>
        </tr>
        <tr>
        <td>Quality control and safety technologies/ technicians</td>
        </tr>
        <tr>
        <td>Engineering technologies/ technicians, other</td>
        </tr>
        <tr>
        <td>Health technologies</td>
        </tr>
        <tr>
        <td>Allied health and medical assisting services</td>
        </tr>
        <tr>
        <td>Allied health diagnostic, intervention, and treatment professions</td>
        </tr>
        <tr>
        <td>American Sign Language</td>
        </tr>
        <tr>
        <td>Clinical/ medical laboratory science/ research and allied professions</td>
        </tr>
        <tr>
        <td>Dental support services and allied professions</td>
        </tr>
        <tr>
        <td>Dietetics and clinical nutrition services</td>
        </tr>
        <tr>
        <td>Health aides/ attendants/ orderlies</td>
        </tr>
        <tr>
        <td>Health and medical administrative services</td>
        </tr>
        <tr>
        <td>Health/ medical preparatory programs</td>
        </tr>
        <tr>
        <td>Medical illustration and informatics</td>
        </tr>
        <tr>
        <td>Mental and social health services and allied professions</td>
        </tr>
        <tr>
        <td>Ophthalmic and optometric support services and allied professions</td>
        </tr>
        <tr>
        <td>Practical nursing, vocational nursing and nursing assistants</td>
        </tr>
        <tr>
        <td>Rehabilitation and therapeutic professions</td>
        </tr>
        <tr>
        <td>Science technologies</td>
        </tr>
        <tr>
        <td>Science technologies/ technicians, general</td>
        </tr>
        <tr>
        <td>Biology technician/ biotechnology laboratory technician</td>
        </tr>
        <tr>
        <td>Nuclear and industrial radiologic technologies/ technicians</td>
        </tr>
        <tr>
        <td>Physical science technologies/ technicians</td>
        </tr>
        <tr>
        <td>Science technologies/ technicians, other</td>
        </tr>
        <tr>
        <th>Other S&E technologies</th>
        </tr>
        <tr>
        <td>Intelligence, command control and information operations</td>
        </tr>
        <tr>
        <td>Military applied sciences</td>
        </tr>
        <tr>
        <td>Military systems and maintenance technology</td>
        </tr>
        <tr>
        <td>Military technologies and applied sciences, other</td>
        </tr>
    </table>
    </div>
    </body>
    </html>                        
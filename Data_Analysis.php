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
);
?>
<!DOCTYPE HTML>
<html>
<head>  
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            font-size: 15px;
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
        list-style-type: none;
        width: 100%;
        margin: 0;
        padding: 0;
        overflow: hidden;
        display: flex;
        align-items: center;
        background-color: #1c8fa9;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.8);
        z-index: 1000;
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

        .chart-container {
            margin-top: 50px;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .chart-item {
            width: 50%;
            padding: 10px;
        }
        h2{
          margin-top: 80px;
        }
        h3 {
            text-align: center;
        }
        .fa-solid {
        font-size: 20px; /* Adjust the size as needed */
        margin-right: 10px; /* Optional: Adds some spacing between the icon and the text */
        }
        .fa-brands{
            font-size: 20px; /* Adjust the size as needed */
            margin-right: 10px; /* Optional: Adds some spacing between the icon and the text */
        }
    </style>
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
<h2> Graduation Data of S&E (Science & Engineering) Marjors in Associate's Degrees from 2000 to 2019.</h2>
<div class="chart-container">
    <div class="chart-item">
        <div id="chartContainer1" style="height: 370px;"></div>
    </div>
    <div class="chart-item">
        <div id="chartContainer2" style="height: 370px;"></div>
    </div>
    <div class="chart-item">
        <div id="chartContainer3" style="height: 270px;"></div>
    </div>
</div>
 

<script>
window.onload = function () {
  var dataPoints1 = [];
  var chart1 = new CanvasJS.Chart("chartContainer1", {
    animationEnabled: true,
    exportEnabled: true,
    title: {
      text: "Data for Associate's Degrees in Engineering Technologies Majors"
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
      text: "Data for Associate's Degrees in Science and other S&E Technologies Majors"
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

  var chart3 = new CanvasJS.Chart("chartContainer3", {
    animationEnabled: true,
    theme: "light2",
    title:{
      text: "Percentage of graduates by Degree Level 2000 & 2019"
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
}
</script>
</body>
</html>
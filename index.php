 <!DOCTYPE html>
 <html>

 <head>
     <link rel="stylesheet" href="style.css">
     <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
 </head>

 <body>

     <div class="container">
         <div class="tabs">
             <a href="./index.php">Question 1</a>
             <a href="./question2.php">Question 2</a>
             <a href="./question3.php">Question 3</a>
         </div>
         <h2 class="title">Sapele Ward 8 PU</h2>

         <?php
            echo "<p class='result'>Results</p>";
            ?>

         <div class="chart-container">
             <canvas id="myChart"></canvas>
         </div>

         <div class="parties-container">

             <?php
                require_once "./database.php";

                $unitId = 8;

                $sql = "SELECT party_abbreviation, party_score FROM announced_pu_results WHERE polling_unit_uniqueid = $unitId;";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    echo 'Internal error!';
                    exit();
                }

                mysqli_stmt_execute($stmt);
                $ersultData = mysqli_stmt_get_result($stmt);

                while ($row = mysqli_fetch_assoc($ersultData)) {
                    echo "<div class='parties'><p class='party-name'>" . $row['party_abbreviation'] . "</p><p class='party-score'>" . $row['party_score'] . "</p> </div>";
                }
                ?>
         </div>
     </div>

     <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

     <script src="chart.js"></script>
 </body>

 </html>
 <!DOCTYPE html>
 <html>

 <head>
     <link rel="stylesheet" href="./style.css">
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

         <form method="post" action="question2page2.php">

             <h2>Select LGA</h2>
             <select name="lga" id="lga" class="select">
                 <option selected disabled>Select LGA</option>
                 <?php
                    require_once "./includes/database.php";

                    $sql = "SELECT polling_unit_uniqueid FROM announced_pu_results;";
                    $stmt = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        echo 'Internal error!';
                        exit();
                    }

                    mysqli_stmt_execute($stmt);
                    $ersultData = mysqli_stmt_get_result($stmt);

                    $puIds = [];
                    $lgaIds = [];

                    while ($row = mysqli_fetch_assoc($ersultData)) {
                        if (!in_array($row['polling_unit_uniqueid'], $puIds)) {
                            array_push($puIds, $row['polling_unit_uniqueid']);
                        }
                    }

                    // Retrieve LGAid using PUid from polling_unit to display LGA with results from announced_PU_table

                    foreach ($puIds as $pu) {
                        $sql = "SELECT lga_id FROM polling_unit WHERE uniqueid = $pu;";
                        $stmt = mysqli_stmt_init($conn);
                        if (!mysqli_stmt_prepare($stmt, $sql)) {
                            echo 'Internal error!';
                            exit();
                        }

                        mysqli_stmt_execute($stmt);
                        $ersultData = mysqli_stmt_get_result($stmt);


                        while ($row = mysqli_fetch_assoc($ersultData)) {
                            if (!in_array($row['lga_id'], $lgaIds)) {
                                array_push($lgaIds, $row['lga_id']);
                            }
                        }
                    }

                    foreach ($lgaIds as $lga) {
                        $sql = "SELECT lga_id, lga_name FROM lga WHERE lga_id = $lga;";
                        $stmt = mysqli_stmt_init($conn);
                        if (!mysqli_stmt_prepare($stmt, $sql)) {
                            echo 'Internal error!';
                            exit();
                        }

                        mysqli_stmt_execute($stmt);
                        $ersultData = mysqli_stmt_get_result($stmt);

                        while ($row = mysqli_fetch_assoc($ersultData)) {
                            echo "<option value='" . $row['lga_id'] . "'>" . $row['lga_name'] . "</option>";
                        }
                    }


                    ?>
             </select>
             <button type="submit" class="button">Search</button>
         </form>


     </div>

     <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

     <script src="chart.js"></script>
 </body>

 </html>
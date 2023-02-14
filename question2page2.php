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
         <?php

            // Select all the PU for the selected LGA
            require_once "./database.php";


            $polling_units = [];
            $sumtotal = 0;

            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                $lga_id = $_POST['lga'];

                $sql = "SELECT polling_unit_id FROM polling_unit WHERE lga_id = $lga_id;";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    echo 'Internal error!';
                    exit();
                }

                mysqli_stmt_execute($stmt);
                $ersultData = mysqli_stmt_get_result($stmt);

                while ($row = mysqli_fetch_assoc($ersultData)) {
                    if (!in_array($row['polling_unit_id'], $polling_units)) {
                        array_push($polling_units, $row['polling_unit_id']);
                    }
                }

                $sql = "SELECT lga_name FROM lga WHERE uniqueid = $lga_id;";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    echo 'Internal error!';
                    exit();
                }

                mysqli_stmt_execute($stmt);
                $ersultData = mysqli_stmt_get_result($stmt);

                while ($row = mysqli_fetch_assoc($ersultData)) {
                    echo "<h2 class='title'>Results fo all PU under " . $row['lga_name'] . " LGA</h2>";
                }

                foreach ($polling_units as $pollingunit) {
                    $putotal = 0;
                    $sql = "SELECT party_score FROM announced_pu_results WHERE polling_unit_uniqueid = $pollingunit;";
                    $stmt = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        echo 'Internal error!';
                        exit();
                    }

                    mysqli_stmt_execute($stmt);
                    $ersultData = mysqli_stmt_get_result($stmt);

                    while ($row = mysqli_fetch_assoc($ersultData)) {
                        $putotal += $row['party_score'];
                    }

                    // retrieveing each PU name

                    $sql = "SELECT polling_unit_name FROM polling_unit WHERE uniqueid = $pollingunit;";
                    $stmt = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        echo 'Internal error!';
                        exit();
                    }

                    mysqli_stmt_execute($stmt);
                    $ersultData = mysqli_stmt_get_result($stmt);

                    while ($row = mysqli_fetch_assoc($ersultData)) {
                        echo "<div class='parties'><p class='pu-name'>" . $row['polling_unit_name'] . " </p><p class='pu-total'>" . $putotal . "</p></div>";
                    }

                    $sumtotal += $putotal;
                }

                echo "<h3 class='total'>Sum total: " . $sumtotal . "</h3>";
            }
            ?>
     </div>

     <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

     <script src="chart.js"></script>
 </body>

 </html>
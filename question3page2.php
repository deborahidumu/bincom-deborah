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
            require_once "./database.php";

            $lga_id = $_POST['lga'];
            $pu_name = $_POST['polling_unit_name'];
            $pu_number = $_POST['polling_unit_num'];
            $long = $_POST['longitude'];
            $lat = $_POST['latitude'];
            $pdp = $_POST['PDP'];
            $dpp = $_POST['DPP'];
            $acn = $_POST['ACN'];
            $ppa = $_POST['PPA'];
            $cdc = $_POST['CDC'];
            $jp = $_POST['JP'];
            $anpp = $_POST['ANPP'];
            $labour = $_POST['LABOUR'];
            $cpp = $_POST['CPP'];
            $user = $_POST['username'];

            // Submitting to polling unit

            $sql = "INSERT INTO `polling_unit` (`lga_id`, `polling_unit_number`, `polling_unit_name`, `lat`, `long`) VALUES(?, ?, ?, ?, ?)";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                echo 'Internal error!';
                exit();
            }

            mysqli_stmt_bind_param($stmt, "issss", $lga_id, $pu_number, $pu_name, $lat, $long);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);

            // retrieving unique number

            $uniqueno;
            $sql = "SELECT `uniqueid` FROM `polling_unit` WHERE `polling_unit_number` = ?;";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                echo 'Internal error!';
                exit();
            }

            mysqli_stmt_bind_param($stmt, "s", $pu_number);
            mysqli_stmt_execute($stmt);
            $ersultData = mysqli_stmt_get_result($stmt);

            while ($row = mysqli_fetch_assoc($ersultData)) {
                $uniqueno = $row['uniqueid'];
            }

            // Submitting to announced_pu_results

            // for PDP


            if ($pdp) {
                $party = "PDP";
                $sql = "INSERT INTO `announced_pu_results` (`polling_unit_uniqueid`, `party_abbreviation`, `party_score`, `entered_by_user`) VALUES(?,?,?,?);";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    echo 'Internal error!';
                    exit();
                }

                mysqli_stmt_bind_param($stmt, "isis", $uniqueno, $party, $pdp, $user);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
            }

            // for DPP

            if ($dpp) {
                $party = "DPP";
                $sql = "INSERT INTO `announced_pu_results` (`polling_unit_uniqueid`, `party_abbreviation`, `party_score`, `entered_by_user`) VALUES(?,?,?,?);";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    echo 'Internal error!';
                    exit();
                }

                mysqli_stmt_bind_param($stmt, "isis", $uniqueno, $party, $dpp, $user);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
            }

            // for ACN

            if ($acn) {
                $party = "ACN";
                $sql = "INSERT INTO `announced_pu_results` (`polling_unit_uniqueid`, `party_abbreviation`, `party_score`, `entered_by_user`) VALUES(?,?,?,?);";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    echo 'Internal error!';
                    exit();
                }

                mysqli_stmt_bind_param($stmt, "isis", $uniqueno, $party, $acn, $user);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
            }

            // for PPA

            if ($ppa) {
                $party = "PPA";
                $sql = "INSERT INTO `announced_pu_results` (`polling_unit_uniqueid`, `party_abbreviation`, `party_score`, `entered_by_user`) VALUES(?,?,?,?);";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    echo 'Internal error!';
                    exit();
                }

                mysqli_stmt_bind_param($stmt, "isis", $uniqueno, $party, $ppa, $user);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
            }

            // for CDC

            if ($cdc) {
                $party = "CDC";
                $sql = "INSERT INTO `announced_pu_results` (`polling_unit_uniqueid`, `party_abbreviation`, `party_score`, `entered_by_user`) VALUES(?,?,?,?);";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    echo 'Internal error!';
                    exit();
                }

                mysqli_stmt_bind_param($stmt, "isis", $uniqueno, $party, $cdc, $user);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
            }

            // for JP

            if ($jp) {
                $party = "JP";
                $sql = "INSERT INTO `announced_pu_results` (`polling_unit_uniqueid`, `party_abbreviation`, `party_score`, `entered_by_user`) VALUES(?,?,?,?);";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    echo 'Internal error!';
                    exit();
                }

                mysqli_stmt_bind_param($stmt, "isis", $uniqueno, $party, $jp, $user);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
            }


            // for ANPP

            if ($anpp) {
                $party = "ANPP";
                $sql = "INSERT INTO `announced_pu_results` (`polling_unit_uniqueid`, `party_abbreviation`, `party_score`, `entered_by_user`) VALUES(?,?,?,?);";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    echo 'Internal error!';
                    exit();
                }

                mysqli_stmt_bind_param($stmt, "isis", $uniqueno, $party, $anpp, $user);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
            }


            // for Labour

            if ($labour) {
                $party = "LABOUR";
                $sql = "INSERT INTO `announced_pu_results` (`polling_unit_uniqueid`, `party_abbreviation`, `party_score`, `entered_by_user`) VALUES(?,?,?,?);";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    echo 'Internal error!';
                    exit();
                }

                mysqli_stmt_bind_param($stmt, "isis", $uniqueno, $party, $labour, $user);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
            }


            // for CPP

            if ($cpp) {
                $party = "CPP";
                $sql = "INSERT INTO `announced_pu_results` (`polling_unit_uniqueid`, `party_abbreviation`, `party_score`, `entered_by_user`) VALUES(?,?,?,?);";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    echo 'Internal error!';
                    exit();
                }

                mysqli_stmt_bind_param($stmt, "isis", $uniqueno, $party, $cpp, $user);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
            }

            echo "<h3>Data Successfully Submitted</h3>";

            ?>
     </div>

     <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

     <script src="chart.js"></script>
 </body>

 </html>
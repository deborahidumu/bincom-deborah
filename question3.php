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
         <form method="post" action="question3page2.php">

             <h2>Select LGA</h2>
             <select name="lga" id="lga" class="select">
                 <option selected disabled>Select LGA</option>
                 <?php
                    require_once "./database.php";

                    $sql = "SELECT lga_id, lga_name FROM lga";
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

                    ?>
             </select>
             <br>

             <label for="username" class="label">Username: </label>
             <input type="text" name="username" class="input" />
             <br>

             <label for="polling_unit_name" class="label">Polling Unit Name: </label>
             <input type="text" name="polling_unit_name" class="input" />
             <br>
             <label for="polling_unit_num" class="label">Polling Unit Number: </label>
             <input type="text" name="polling_unit_num" class="input" />
             <br>

             <label for="longitude" class="label">Longitude: </label>
             <input type="text" name="longitude" class="input" />
             <br>

             <label for="latitude" class="label">Latitude: </label>
             <input type="text" name="latitude" class="input" />

             <p>Results</p>

             <?php
                require_once "./database.php";

                $sql = "SELECT partyname FROM party";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    echo 'Internal error!';
                    exit();
                }

                mysqli_stmt_execute($stmt);
                $ersultData = mysqli_stmt_get_result($stmt);

                while ($row = mysqli_fetch_assoc($ersultData)) {
                    echo "<div><label class='label'>" . $row['partyname'] . "</label><input type='text' class='input' name='" . $row['partyname'] . "' /></div>";
                }

                ?>

             <button type="submit" class="button">Submit</button>
         </form>
     </div>

     <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

     <script src="chart.js"></script>
 </body>

 </html>
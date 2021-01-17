<?php
include_once 'header.php' // Include header of page
?>

<head>
    <title>ΠΡΟΦΙΛ | Υπουργείο Εργασίας & Κοινωνικών Υποθέσεων</title>
</head>


<div class="bgded" style="background:white;">
    <div id="breadcrumb" class="hoc clear">
        <h6 class="heading font-x3"><?php echo "{$_SESSION["firstname"]} {$_SESSION["lastname"]}"; ?></h6>
        <ul>
            <li><a style="color: #1c7aa8;" class="hyperlink" href="index.php">ΑΡΧΙΚΗ</a></li>
            <li><span>&#47;</span> </li>
            <li>
                <p style="color: #363636;">ΠΡΟΦΙΛ</p>
            </li>
        </ul>
    </div>
</div>

<div class="wrapper row3">
    <main class="hoc mycontainer clear">

        <div class="edit-profile-container">

            <?php

            include_once 'includes/dbh.inc.php';
            include_once 'includes/functions.inc.php';


            if ($_SESSION["usertype"] == 1 && empty($_SESSION["employeesForEmployer"]) !== true) {

                echo "<h6 style='font-size: 30px;' class='heading font-x3'>Λίστα με τους εργαζόμενους σου</h6>";
                echo "<hr style='border-color: #1c7aa8;'>";
                echo "<table class='allign-center btmspace-30'>";
                echo "<tr>";
                echo "<th class='myth'>Όνομα</th>";
                echo "<th class='myth'>Επίθετο</th>";
                echo "<th class='myth'>ΑΦΜ</th>";
                echo "<th class='myth'>Έναρξη τηλεργασίας</th>";
                echo "<th class='myth'>Λήξη Τηλεργασίας</th>";
                echo "<th class='myth'>Έναρξη αναστολής εργασίας </th>";
                echo "<th class='myth'>Λήξη αναστολής εργασίας</th>";
                echo "</tr>";

                foreach ($_SESSION["employeesForEmployer"] as $row) {
                    $employeeData = employeeDataSQL($conn, $row["username"]);
                    echo "<tr>";
                    echo "<td>{$row["firstname"]}</td>";
                    echo "<td>{$row["lastname"]}</td>";
                    echo "<td>{$row["afm"]}</td>";

                    if ($employeeData["worksRemote_startDate"] == Null)
                        echo "<td>-</td>";
                    else
                        echo "<td>{$employeeData["worksRemote_startDate"]}</td>";
                    if ($employeeData["worksRemote_endDate"] == Null)
                        echo "<td>-</td>";
                    else
                        echo "<td>{$employeeData["worksRemote_endDate"]}</td>";
                    if ($employeeData["inSuspension_startDate"] == Null)
                        echo "<td>-</td>";
                    else
                        echo "<td>{$employeeData["inSuspension_startDate"]}</td>";
                    if ($employeeData["inSuspension_endDate"] == Null)
                        echo "<td>-</td>";
                    else
                        echo "<td>{$employeeData["inSuspension_endDate"]}</td>";

                    echo "</tr>";
                }

                echo "</table>";
            } else if ($_SESSION["usertype"] == 0) {

                echo "<h6 style='font-size: 30px;' class='heading font-x3'>Καταχωρήσεις από τον εργοδότη σου</h6>";
                echo "<hr style='border-color: #1c7aa8;'>";
                echo "<table class='allign-center btmspace-30'>";
                echo "<tr>";
                echo "<th class='myth'>Έναρξη τηλεργασίας</th>";
                echo "<th class='myth'>Λήξη Τηλεργασίας</th>";
                echo "<th class='myth'>Έναρξη αναστολής εργασίας </th>";
                echo "<th class='myth'>Λήξη αναστολής εργασίας</th>";
                echo "</tr>";

                // Output a row
                echo "<tr>";
                if ($_SESSION["employeeData"]["worksRemote_startDate"] == Null)
                    echo "<td>-</td>";
                else
                    echo "<td>{$_SESSION["employeeData"]["worksRemote_startDate"]}</td>";
                if ($_SESSION["employeeData"]["worksRemote_endDate"] == Null)
                    echo "<td>-</td>";
                else
                    echo "<td>{$_SESSION["employeeData"]["worksRemote_endDate"]}</td>";
                if ($_SESSION["employeeData"]["inSuspension_startDate"] == Null)
                    echo "<td>-</td>";
                else
                    echo "<td>{$_SESSION["employeeData"]["inSuspension_startDate"]}</td>";
                if ($_SESSION["employeeData"]["inSuspension_endDate"] == Null)
                    echo "<td>-</td>";
                else
                    echo "<td>{$_SESSION["employeeData"]["inSuspension_endDate"]}</td>";
                echo "</tr>";

                // Close the table
                echo "</table>";
            }

            ?>
        </div>

        <form action="includes/profile.inc.php" method="post">

            <div class="edit-profile-container">

                <h6 style="font-size: 30px;" class="heading font-x3">Τα στοιχεία σου</h6>
                <hr style="border-color: #1c7aa8;">
                <p class="btmspace-50">
                    Θέλεις να αλλάξεις κάτι; Μην ξεχάσεις να πατήσεις "Αποθήκευση αλλαγών" στο τέλος της φόρμας.
                </p>

                <div class="two-in-one-row-form">
                    <div class="one-element-form margin-right">
                        <label class="required" for="firstname"><b>Όνομα</b></label>
                        <input type="text" value="<?php echo $_SESSION["firstname"] ?>" name="firstname" required>
                    </div>

                    <div class="one-element-form">
                        <label class="required" for="lastname"><b>Επίθετο</b></label>
                        <input type="text" value="<?php echo $_SESSION["lastname"] ?>" name=" lastname" required>
                    </div>
                </div>


                <div class="two-in-one-row-form">
                    <div class="one-element-form margin-right">
                        <label class="required" for="uid"><b>Όνομα Χρήστη</b></label>
                        <input type="text" value="<?php echo $_SESSION["username"] ?>" name="uid" required>
                    </div>

                    <div class="one-element-form">
                        <label class="required" for="afm"><b>ΑΦΜ</b></label>
                        <input type="text" value="<?php echo $_SESSION["afm"] ?>" name="afm" required>
                    </div>

                </div>

                <label class="required" for="email"><b>Ηλεκτρονική Διεύθυνση</b></label>
                <input type="text" value="<?php echo $_SESSION["email"] ?>" name="email" required>

                <div class=" clearfix submit-appointment">
                    <button style="width:100%; margin-top:30px;" type="submit" name="submit" class="signupbtn">Αποθήκευση αλλαγών</button>
                </div>

            </div>

        </form>

        <div class="btmspace-50"></div>

        <form action="includes/change-code.inc.php" method="post">

            <div class="edit-profile-container">

                <h6 style="font-size: 30px;" class="heading font-x3">Αλλαγή κωδικού</h6>
                <hr style="border-color: #1c7aa8;">

                <label class="required" for="psw"><b>Τρέχων κωδικός πρόσβασης</b></label>
                <input type="text" placeholder="Εισάγετε τον τρέχων κωδικό πρόσβασης" name="psw" required>

                <label class="required" for="new-psw"><b>Νέος κωδικός πρόσβασης</b></label>
                <input type="text" placeholder="Εισάγετε τον νέο κωδικό πρόσβασης" name="new-psw" required>

                <label class="required" for="new-psw-repeat"><b>Επανάληψη νέου κωδικού πρόσβασης</b></label>
                <input type="text" placeholder="Εισάγετε ξανά τον νέο κωδικό πρόσβασης" name="new-psw-repeat" required>

                <div class="clearfix submit-appointment">
                    <button style="width:100%; margin-top:30px;" type="submit" name="submit" class="signupbtn">Αποθήκευση αλλαγών</button>
                </div>

            </div>

        </form>

        <div class="clear btmspace-50"></div>
    </main>
</div>



<?php
include_once 'footer.php' // Include footer of page
?>
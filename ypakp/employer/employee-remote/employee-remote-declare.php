<?php
include_once 'header-footer/header.php' // Include header of page
?>

<head>
    <title>Δήλωση εξ αποστάσεως εργασίας | Υπουργείο Εργασίας & Κοινωνικών Υποθέσεων</title>
</head>


<div class="bgded" style="background:white;">
    <div id="breadcrumb" class="hoc clear">
        <h6 class="heading font-x3">Δήλωση εξ αποστάσεως εργασίας</h6>
        <ul>
            <li><a style="color: #1c7aa8;" class="hyperlink" href="../../index.php">ΑΡΧΙΚΗ</a></li>
            <li><span>&#47;</span> </li>
            <li><a style="color: #1c7aa8;" class="hyperlink" href="../employer.php">ΕΡΓΟΔΟΤΗΣ</a></li>
            <li><span>&#47;</span> </li>
            <li><a style="color: #1c7aa8;" class="hyperlink" href="employee-remote.php">ΕΞ ΑΠΟΣΤΑΣΕΩΣ ΕΡΓΑΣΙΑ</a></li>
            <li><span>&#47;</span> </li>
            <li>
                <p style="color: #363636;">Δηλωση εξ αποστασεως εργασιας</p>
            </li>
        </ul>
    </div>
</div>




<div class="wrapper row3">
    <main class="hoc mycontainer clear">
        <form action="../../includes/employee-remote.inc.php" method="post">
            <div class="edit-profile-container">
                <?php
                if (!isset($_SESSION["username"])) {
                    echo "<p class = 'allign-center'>Πρέπει να <a class='hyperlink' href='../../profile/login.php'>συνδεθείτε</a> πρώτα για να προχωρήσετε στην δήλωση !</p>";
                } else {

                    if (isset($_GET["error"])) {
                        if ($_GET["error"] == "invalidAfm") {
                            echo "<p class='btmspace-50 error-message'>Το ΑΦΜ που καταχώρησες δεν υπάρχει!</p>";
                        }
                    }

                    include_once '../../includes/dbh.inc.php';
                    include_once '../../includes/functions.inc.php';


                    if ($_SESSION["usertype"] == 1 && empty($_SESSION["employeesForEmployer"]) !== true) {

                        echo "<h6 style='font-size: 30px;' class='heading font-x3'>Λίστα με τους εργαζόμενους σου</h6>";
                        echo "<hr style='border-color: #1c7aa8;'>";
                        echo "<table class='allign-center btmspace-50'>";
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

                        echo "<h6 style='font-size: 30px;' class='heading font-x3'>Δήλωση εξ αποστάσεως εργασίας εργαζομένου</h6>";
                        echo "<hr style='border-color: #1c7aa8;'>";
                        echo "<p class='btmspace-50'>Με βάση την παραπάνω λίστα, συμπλήρωσε την ακόλουθη φόρμα για τον εργαζόμενο που θες να δηλώσεις σε τηλεργασία.</p>";


                        echo "<div class='margin-right'>";
                        echo    "<label class='required btmspace-15' for='afm'><b>ΑΦΜ Εργαζομένου</b></label>";
                        echo    "<input class='margin-right' type='text' placeholder='Εισάγετε το ΑΦΜ του εργαζομένου' id='afm' name='afm' required>";
                        echo "</div>";


                        echo "<div class='two-in-one-row-form'>";
                        echo    "<div class='one-element-form margin-right'>";
                        echo        "<label class='required btmspace-15' for='startRemoteDay'><b>Έναρξη εξ αποστάσεως εργασίας</b></label>";
                        echo        "<input type='text' placeholder='(π.χ 10/01/2020)' id='startRemoteDay' name='startRemoteDay' required>";
                        echo    "</div>";
                        echo    "<div class='one-element-form margin-right'>";
                        echo        "<label class='required btmspace-15' for='endRemoteDay'><b>Λήξη εξ αποστάσεως εργασίας</b></label>";
                        echo        "<input type='text' placeholder='(π.χ 10/01/2020)' id='endRemoteDay' name='endRemoteDay' required>";
                        echo    "</div>";
                        echo "</div>";

                        $_SESSION["removeRemote"] = false;

                        echo "<div class=' clearfix submit-appointment'>";
                        echo    "<button style='width:100%; margin-top:30px;' type='submit' name='submit' class='signupbtn'>Ολοκλήρωση δήλωσης</button>";
                        echo "</div>";
                    } else {
                        if ($_SESSION["usertype"] == 1 && empty($_SESSION["employeesForEmployer"]) == true) {
                            echo "<p class = 'allign-center'>Το σύστημα δεν βρίσκει εργαζόμενούς σου !</p>";
                            echo "<p class = 'allign-center'>Επιστροφή στην <a class='hyperlink' href='../../index.php'>αρχική σελίδα</a>.</p>";
                        } else if ($_SESSION["usertype"] == 0) {
                            echo "<p class = 'allign-center'>Δεν έχεις το δικαίωμα να προχωρήσεις στην συγκεκριμένη δήλωση !</p>";
                            echo "<p class = 'allign-center'>Επιστροφή στην <a class='hyperlink' href='../../index.php'>αρχική σελίδα</a>.</p>";
                        }
                    }
                }
                ?>
            </div>
        </form>

        <div class="clear btmspace-50"></div>
    </main>
</div>

<?php
include_once 'header-footer/footer.php' // Include footer of page
?>
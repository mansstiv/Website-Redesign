<?php
include_once 'header-footer/header.php' // Include header of page
?>

<head>
    <title>Άρση εξ αποστάσεως εργασίας | Υπουργείο Εργασίας & Κοινωνικών Υποθέσεων</title>
</head>


<div class="bgded" style="background:white;">
    <div id="breadcrumb" class="hoc clear">
        <h6 class="heading font-x3">Άρση αναστολής σύμβασης εργασίας</h6>
        <ul>
            <li><a style="color: #1c7aa8;" class="hyperlink" href="../../index.php">ΑΡΧΙΚΗ</a></li>
            <li><span>&#47;</span> </li>
            <li><a style="color: #1c7aa8;" class="hyperlink" href="../employer.php">ΕΡΓΟΔΟΤΗΣ</a></li>
            <li><span>&#47;</span> </li>
            <li><a style="color: #1c7aa8;" class="hyperlink" href="employee-remote.php">ΕΞ ΑΠΟΣΤΑΣΕΩΣ ΕΡΓΑΣΙΑ</a></li>
            <li><span>&#47;</span> </li>
            <li>
                <p style="color: #363636;">Άρση εξ αποστασεως εργασιας</p>
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

                        echo "<h6 style='font-size: 30px;' class='heading font-x3'>Άρση αναστολής σύμβασης εργασίας ενός εργαζομένου</h6>";
                        echo "<hr style='border-color: #1c7aa8;'>";
                        echo "<p class='btmspace-50'>Με βάση την παραπάνω λίστα, συμπλήρωσε τo ΑΦΜ του εργαζομένου που επιθυμείς να κάνεις άρση της δυνατότητας για τηλεργασία.</p>";


                        echo "<div class='margin-right'>";
                        echo    "<label class='required btmspace-15' for='afm'><b>ΑΦΜ Εργαζομένου</b></label>";
                        echo    "<input class='margin-right' type='text' placeholder='Εισάγετε το ΑΦΜ του εργαζομένου' id='afm' name='afm' required>";
                        echo "</div>";

                        $_SESSION["removeRemote"] = true;

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
<?php
include_once 'header.php' // Include header of page
?>

<head>
    <title>Δήλωση αναστολής σύμβασης εργασίας | Υπουργείο Εργασίας & Κοινωνικών Υποθέσεων</title>
</head>


<div class="bgded" style="background:white;">
    <div id="breadcrumb" class="hoc clear">
        <h6 class="heading font-x3">Δήλωση αναστολής σύμβασης εργασίας</h6>
        <ul>
            <li><a style="color: #1c7aa8;" class="hyperlink" href="index.php">ΑΡΧΙΚΗ</a></li>
            <li><span>&#47;</span> </li>
            <li><a style="color: #1c7aa8;" class="hyperlink" href="employer.php">ΕΡΓΟΔΟΤΗΣ</a></li>
            <li><span>&#47;</span> </li>
            <li>
            <li><a style="color: #1c7aa8;" class="hyperlink" href="employee-suspension.php">ΑΝΑΣΤΟΛΗ ΣΥΜΒΑΣΗΣ ΕΡΓΑΣΙΑΣ</a></li>
            <li><span>&#47;</span> </li>
            <li>
                <p style="color: #363636;">Δηλωση αναστολης συμβασης εργασιας</p>
            </li>
        </ul>
    </div>
</div>


<div class="wrapper row3">
    <main class="hoc mycontainer clear">
        <form action="includes/employee-suspension-declare.inc.php" method="post">
            <div class="edit-profile-container">
                <?php
                if (!isset($_SESSION["username"])) {
                    echo "<p class = 'allign-center'>Πρέπει να <a class='hyperlink' href='login.php'>συνδεθείτε</a> πρώτα για να προχωρήσετε στην δήλωση !</p>";
                } else {

                    if (isset($_GET["error"])) {
                        if ($_GET["error"] == "invalidAfm") {
                            echo "<p class='btmspace-50 error-message'>Το ΑΦΜ που καταχώρησες δεν υπάρχει!</p>";
                        }
                    }

                    include_once 'includes/dbh.inc.php';
                    include_once 'includes/functions.inc.php';


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

                        echo "<h6 style='font-size: 30px;' class='heading font-x3'>Δήλωση αναστολής σύμβασης εργασίας ενός εργαζομένου</h6>";
                        echo "<hr style='border-color: #1c7aa8;'>";
                        echo "<p class='btmspace-50'>Με βάση την παραπάνω λίστα, συμπλήρωσε την ακόλουθη φόρμα για τον εργαζόμενο που θες να δηλώσεις σε αναστολή.</p>";


                        echo "<div class='margin-right'>";
                        echo    "<label class='required btmspace-15' for='afm'><b>ΑΦΜ Εργαζομένου</b></label>";
                        echo    "<input class='margin-right' type='text' placeholder='Εισάγετε το ΑΦΜ του εργαζομένου' id='afm' name='afm' required>";
                        echo "</div>";

                        echo "<div class='two-in-one-row-form'>";
                        echo    "<div class='one-element-form margin-right'>";
                        echo        "<label class='required btmspace-15' for='startSuspensionDay'><b>Έναρξη αναστολής εργασίας</b></label>";
                        echo        "<input type='text' placeholder='(π.χ 10/01/2020)' id='startSuspensionDay' name='startSuspensionDay' required>";
                        echo    "</div>";
                        echo    "<div class='one-element-form margin-right'>";
                        echo        "<label class='required btmspace-15' for='endSuspensionDay'><b>Λήξη αναστολής εργασίας</b></label>";
                        echo        "<input type='text' placeholder='(π.χ 10/01/2020)' id='endSuspensionDay' name='endSuspensionDay' required>";
                        echo    "</div>";
                        echo "</div>";

                        echo "<div class=' clearfix submit-appointment'>";
                        echo    "<button style='width:100%; margin-top:30px;' type='submit' name='submit' class='signupbtn'>Ολοκλήρωση δήλωσης</button>";
                        echo "</div>";
                    } else {
                        echo "<p class = 'allign-center'>Δεν έχεις το δικαίωμα να προχωρήσεις στην συγκεκριμένη δήλωση !</p>";
                        echo "<p class = 'allign-center'>Επιστρέψτε στην <a class='hyperlink' href='index.php'>αρχική σελίδα</a></p>";
                    }
                }
                ?>
            </div>
        </form>
        <div class="clear btmspace-50"></div>

    </main>
</div>

<?php
include_once 'footer.php' // Include footer of page
?>
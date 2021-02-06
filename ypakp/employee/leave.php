<?php
include_once 'header-footer/header.php' // Include header of page
?>

<head>
    <title>Αίτηση χορήγησης άδειας ειδικού σκοπού | Υπουργείο Εργασίας & Κοινωνικών Υποθέσεων</title>
</head>


<div class="bgded" style="background:white;">
    <div id="breadcrumb" class="hoc clear">
        <h6 class="heading font-x3">Αίτηση χορήγησης άδειας ειδικού σκοπού</h6>
        <ul>
            <li><a style="color: #1c7aa8;" class="hyperlink" href="../index.php">ΑΡΧΙΚΗ</a></li>
            <li><span>&#47;</span> </li>
            <li><a style="color: #1c7aa8;" class="hyperlink" href="employee.php">ΕΡΓΑΖΟΜΕΝΟΣ</a></li>
            <li><span>&#47;</span> </li>
            <li>
                <p style="color: #363636;">Αιτηση χορηγησης αδειας ειδικου σκοπου</p>
            </li>
        </ul>
    </div>
</div>


<div class="wrapper row3">
    <main class="hoc mycontainer clear">
        <form action="../includes/employee-leave.inc.php" method="post">
            <div class="edit-profile-container">
                <?php
                if (!isset($_SESSION["username"])) {
                    echo "<p class = 'allign-center'>Πρέπει να <a class='hyperlink' href='../profile/login.php'>συνδεθείτε</a> πρώτα για να προχωρήσετε στην δήλωση !</p>";
                } else {

                    if (isset($_GET["error"])) {
                        if ($_GET["error"] == "invalidAfm") {
                            echo "<p class='btmspace-50 error-message'>Το ΑΦΜ που καταχώρησες δεν υπάρχει!</p>";
                        }
                    }

                    include_once '../../includes/dbh.inc.php';
                    include_once '../../includes/functions.inc.php';


                    if ($_SESSION["usertype"] == 0) {

                        if ($_SESSION["employeeData"]["hasChildUnder12"] == 0) {
                            echo "<p class = 'allign-center'>Δεν έχεις το δικαίωμα να προχωρήσεις στην συγκεκριμένη δήλωση μιας και δεν ανήκεις στην κατηγορία των γονέων με παιδιά κάτω των 12 ετών !</p>";
                            echo "<p class = 'allign-center'>Επιστροφή στην <a class='hyperlink' href='../index.php'>αρχική σελίδα</a>.</p>";
                        } else {

                            echo "<div class=margin-right>";
                            echo "<p class='btmspace-15'>Συμπλήρωσε την ακόλουθη φόρμα προκειμένου να πραγματοποιήσεις την αίτηση για έκδοση άδειας ειδικού σκοπού.</p>";
                            echo "<hr class='btmspace-50' style='border-color: #1c7aa8;'>";
                            echo "</div>";

                            echo "<div class='margin-right'>";
                            echo    "<label class='required btmspace-15' for='afm'><b>ΑΦΜ</b></label>";
                            echo    "<input class='margin-right' type='text' placeholder='Εισάγετε το ΑΦΜ' id='afm' name='afm' required>";
                            echo "</div>";

                            echo "<div class='two-in-one-row-form'>";
                            echo    "<div class='one-element-form margin-right'>";
                            echo        "<label class='required btmspace-15' for='firstname'><b>Όνομα</b></label>";
                            echo        "<input type='text' placeholder='Εισάγετε το Όνομα' id='firstname' name='firstname' required>";
                            echo    "</div>";
                            echo    "<div class='one-element-form margin-right'>";
                            echo        "<label class='required btmspace-15' for='lastname'><b>Επίθετο</b></label>";
                            echo        "<input type='text' placeholder='Εισάγετε το Επίθετο' id='lastname' name='lastname' required>";
                            echo    "</div>";
                            echo "</div>";

                            echo "<div class='two-in-one-row-form'>";
                            echo    "<div class='one-element-form margin-right'>";
                            echo        "<label class='required btmspace-15' for='startPermissionDay'><b>Έναρξη άδειας ειδικού σκοπού</b></label>";
                            echo        "<input type='text' placeholder='(π.χ 10/01/2020)' id='startPermissionDay' name='startPermissionDay' required>";
                            echo    "</div>";
                            echo    "<div class='one-element-form margin-right'>";
                            echo        "<label class='required btmspace-15' for='endPermissionDay'><b>Λήξη άδειας ειδικού σκοπού</b></label>";
                            echo        "<input type='text' placeholder='(π.χ 10/01/2020)' id='endPermissionDay' name='endPermissionDay' required>";
                            echo    "</div>";
                            echo "</div>";

                            echo "<div class=' clearfix submit-appointment margin-right'>";
                            echo    "<button style='width:100%; margin-top:30px;' type='submit' name='submit' class='signupbtn'>Ολοκλήρωση δήλωσης</button>";
                            echo "</div>";
                        }
                    } else {
                        echo "<p class = 'allign-center'>Δεν έχεις το δικαίωμα να προχωρήσεις στην συγκεκριμένη δήλωση !</p>";
                        echo "<p class = 'allign-center'>Επιστροφή στην <a class='hyperlink' href='../index.php'>αρχική σελίδα</a> .</p>";
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
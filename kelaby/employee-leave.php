<?php
include_once 'header.php' // Include header of page
?>

<head>
    <title>Δήλωση αναστολής σύμβασης εργασίας εργαζομένων | Υπουργείο Εργασίας & Κοινωνικών Υποθέσεων</title>
</head>


<div class="bgded" style="background:white;">
    <div id="breadcrumb" class="hoc clear">
        <h6 class="heading font-x3">Δήλωση αναστολής σύμβασης εργασίας</h6>
        <ul>
            <li><a style="color: #1c7aa8;" class="hyperlink" href="index.php">ΑΡΧΙΚΗ</a></li>
            <li><span>&#47;</span> </li>
            <li>
                <p style="color: #363636;">Δηλωση αναστολης συμβασης εργασιας</p>
            </li>
        </ul>
    </div>
</div>


<div class="wrapper row3">
    <main class="hoc mycontainer clear">
        <form action="includes/employee-suspension.inc.php" method="post" style="border:1px solid #ccc">
            <div class="signup-container">
                <?php
                if (!isset($_SESSION["username"])) {
                    echo "<p class = 'allign-center'>Πρέπει να <a class='hyperlink' href='login.php'>συνδεθείτε</a> πρώτα για να προχωρήσετε στην δήλωση !</p>";
                } else {
                    echo "<p>Παρακαλώ συμπλήρωστε την ακόλουθη φόρμα για αναστολή σύμβασης εργασίας εργαζομένου.
                    Εάν θέλετε να δηλώσετε παραπάνω από έναν εργαζόμενο θα χρειαστεί να συμπληρώσετε ξανά την φόρμα.</p>";
                    echo "<hr>";
                    echo "<label class='btmspace-15 required' for='usertype'>
                        <b>Ονοματεπώνυμο Εργαζομένου</b></label>";

                    $employeesNames = array();
                    $employeesAfm = array();

                    foreach ($_SESSION["employeesForEmployer"] as $row) {
                        $employeesNames[] =  $row["firstname"] . ' ' . $row["lastname"];
                        $employeesAfm[] = $row["afm"];
                    }

                    echo "<select class='btmspace-15' name='form-employee-suspension'>";
                    $i = 0;
                    foreach ($employeesNames as $row) {
                        echo "<option value=\"$employeesAfm[$i]\">$row</option>";
                        echo $employeesAfm[$i];
                        $i = $i + 1;
                    }
                    echo "</select>";
                    echo "<div class='two-in-one-row-form'>";
                    echo    "<div class='one-element-form margin-right'>";
                    echo        "<label class='required btmspace-15' for='startRemoteDay'><b>Έναρξη αναστολής σύμβασης</b></label>";
                    echo        "<input type='date' id='startRemoteDay' name='startRemoteDay' required>";
                    echo    "</div>";
                    echo    "<div class='one-element-form margin-right'>";
                    echo        "<label class='required btmspace-15' for='endRemoteDay'><b>Λήξη αναστολής σύμβασης</b></label>";
                    echo        "<input type='date' id='endRemoteDay' name='endRemoteDay' required>";
                    echo    "</div>";
                    echo "</div>";
                    echo "<div class='clearfix'>";
                    echo    "<button type='submit' name='submit' class='signupbtn'>Ολοκλήρωση Δήλωσης</button>";
                    echo "</div>";
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

<?php
include_once 'header.php' // Include header of page
?>

<head>
    <title>Δήλωση εξ αποστάσεως εργασίας για εργαζόμενο | Υπουργείο Εργασίας & Κοινωνικών Υποθέσεων</title>
</head>


<div class="bgded" style="background:white;">
    <div id="breadcrumb" class="hoc clear">
        <h6 class="heading font-x3">Δήλωση εξ αποστάσεως εργασίας για εργαζόμενο</h6>
        <ul>
            <li><a style="color: #1c7aa8;" class="hyperlink" href="index.php">ΑΡΧΙΚΗ</a></li>
            <li><span>&#47;</span> </li>
            <li>
                <p style="color: #363636;">Δηλωση εξ αποστασεως εργασιας για εργαζομενο</p>
            </li>
        </ul>
    </div>
</div>


<div class="wrapper row3">
    <main class="hoc mycontainer clear">
        <form action="includes/employee-remote.inc.php" method="post" style="border:1px solid #ccc">
            <div class="signup-container">
                <?php
                if (!isset($_SESSION["username"])) {
                    echo "<p>Πρέπει να <a class='hyperlink' href='login.php'>συνδεθείς</a> πρώτα για να προχωρήσεις στην δήλωση !</p>";
                } else {

                    echo "<label class='btmspace-15 required' for='usertype'>
                        <b>Eπέλεξε τον εργαζόμενο για δήλωση εξ αποστάσεως εργασίας.</b></label>";

                    $employeesNames = array();
                    $employeesAfm = array();

                    foreach ($_SESSION["employeesForEmployer"] as $row) {
                        $employeesNames[] =  $row["firstname"] . ' ' . $row["lastname"];
                        $employeesAfm[] = $row["afm"];
                    }

                    echo "<select class = 'allign-center' name='form-employee-suspension'>";
                    $i = 0;
                    foreach ($employeesNames as $row) {
                        echo "<option value=\"$employeesAfm[$i]\">$row</option>";
                        echo $employeesAfm[$i];
                        $i = $i + 1;
                    }
                    echo "</select>";
                }
                ?>
                <div class="two-in-one-row-form">
                    <div class="one-element-form margin-right">
                        <label class="required" for="startRemoteDay"><b>Αρχή εξ αποστάσεως εργασίας</b></label>
                        <input type="date" id="birthday" name="startRemoteDay" required>
                    </div>

                    <div class="one-element-form">
                        <label class="required" for="endRemoteDay"><b>Τέλος εξ αποστάσεως εργασίας</b></label>
                        <input type="date" id="endRemoteDay" name="endRemoteDay" required>
                    </div>
                </div>
                <div class="clearfix">
                    <button type="submit" name="submit" class="signupbtn">Εγγραφή</button>
                </div>
            </div>
        </form>

        <div class="clear btmspace-50"></div>
    </main>
</div>

<?php
include_once 'footer.php' // Include footer of page
?>
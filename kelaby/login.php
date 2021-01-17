<?php
include_once 'header.php' // Include header of page
?>

<head>
    <title>Είσοδος | Υπουργείο Εργασίας & Κοινωνικών Υποθέσεων</title>
</head>



<div class="bgded" style="background:white;">
    <div id="breadcrumb" class="hoc clear">
        <h6 class="heading font-x3">Είσοδος</h6>
        <ul>
            <li><a style="color: #1c7aa8;" class="hyperlink" href="index.php">ΑΡΧΙΚΗ</a></li>
            <li><span>&#47;</span> </li>
            <li>
                <p style="color: #363636;">ΕΙΣΟΔΟΣ</p>
            </li>
        </ul>
    </div>
</div>


<div class="wrapper row3">
    <main class="hoc mycontainer clear">
        <form action="includes/login.inc.php" method="post" style="border:1px solid #ccc">
            <div class="signup-container">

                <?php
                if (isset($_GET["error"])) {
                    if ($_GET["error"] == "emptyinput") {
                        echo "<p class='error-message btmspace-50'>Συμπληρώστε όλα τα πεδία !</p>";
                    } else if ($_GET["error"] == "wronglogin") {
                        echo "<p class='error-message btmspace-50'>Μη έγκυρο όνομα χρήστη!</p>";
                    } else if ($_GET["error"] == "wrongloginpwd") {
                        echo "<p class='error-message btmspace-50'>Μη έγκυρος κωδικός πρόσβασης!</p>";
                    }
                }
                ?>


                <p>Παρακαλώ συμπληρώστε τα στοιχεία σας για να συνδεθείτε.</p>
                <hr>

                <label class="required" for="uid"><b>Ηλεκτρονική Διεύθυνση / Όνομα Χρήστη</b></label>
                <input type="text" placeholder="Εισάγετε την Ηλεκτρονική Διεύθυνση ή το Όνομα Χρήστη" name="uid">

                <label class="required" for="psw"><b>Κωδικός Πρόσβασης</b></label>
                <input type="password" placeholder="Εισάγετε τον Κωδικό Πρόσβασης" name="psw">

                <div class="clearfix">
                    <button type="submit" name="submit" class="signupbtn">Είσοδος</button>
                </div>

                <div class="allign-center">
                    <p>Δεν έχεις κάνει εγγραφή; <a class="hyperlink" href="signup.php">Φτιάξτε λογαριασμό</a>.</p>
                </div>

            </div>
        </form>
        <div class="clear btmspace-50"></div>
    </main>
</div>


<?php
include_once 'footer.php' // Include footer of page
?>
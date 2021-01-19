<?php
include_once 'header-footer/header.php' // Include header of page
?>

<head>
    <title>Εγγραφή | Υπουργείο Εργασίας & Κοινωνικών Υποθέσεων</title>
</head>



<div class="bgded" style="background:white;">
    <div id="breadcrumb" class="hoc clear">
        <h6 class="heading font-x3">Εγγραφή</h6>
        <ul>
            <li><a style="color: #1c7aa8;" class="hyperlink" href="../index.php">ΑΡΧΙΚΗ</a></li>
            <li><span>&#47;</span> </li>
            <li>
                <p style="color: #363636;">ΕΓΓΡΑΦΗ</p>
            </li>
        </ul>
    </div>
</div>


<script type="text/javascript">
    $(document).ready(function() {

        $('input[type="radio"]').click(function() {
            if ($(this).attr("value") == "employer") {
                $(".Box").hide('slow');
            }
            if ($(this).attr("value") == "employee") {
                $(".Box").show('slow');

            }
        });

        $('input[type="radio"]').trigger('click'); // trigger the event
    });
</script>


<div class="wrapper row3">
    <main class="hoc mycontainer clear">
        <form action="../includes/signup.inc.php" method="post" style="border:1px solid #ccc">
            <div class="signup-container">

                <p>Παρακαλώ συμπλήρωστε την ακόλουθη φόρμα για να κάνετε εγγραφή.
                    Σε περίπτωση που ανήκετε στην κατηγορία του Εργαζομένου θα χρειαστεί να συμπληρώσετε
                    δύο επιπλέον πεδία.
                </p>
                <hr>
                <div class="two-in-one-row-form">
                    <div class="one-element-form margin-right">
                        <label class="required" for="firstname"><b>Όνομα</b></label>
                        <input type="text" placeholder="Εισάγετε το Όνομα" name="firstname" required>
                    </div>

                    <div class="one-element-form">
                        <label class="required" for="lastname"><b>Επίθετο</b></label>
                        <input type="text" placeholder="Εισάγετε το Επίθετο" name="lastname" required>
                    </div>
                </div>


                <div class="two-in-one-row-form">
                    <div class="one-element-form margin-right">
                        <label class="required" for="uid"><b>Όνομα Χρήστη</b></label>
                        <input type="text" placeholder="Εισάγετε το Όνομα Χρήστη" name="uid" required>
                    </div>

                    <div class="one-element-form">
                        <label class="required" for="afm"><b>ΑΦΜ</b></label>
                        <input type="text" placeholder="Εισάγετε το ΑΦΜ" name="afm" required>
                    </div>
                </div>


                <label class="required" for="email"><b>Ηλεκτρονική Διεύθυνση</b></label>
                <input type="text" placeholder="Εισάγετε την Ηλεκτρονική Διεύθυνση" name="email" required>

                <label class="required" for="psw"><b>Κωδικός Πρόσβασης</b></label>
                <input type="password" placeholder="Εισάγετε τον Κωδικό Πρόσβασης" name="psw" required>

                <label class="required" for="psw-repeat"><b>Επανάληψη Κωδικού Πρόσβασης</b></label>
                <input type="password" placeholder="Εισάγετε ξανά τον Κωδικό Πρόσβασης" name="psw-repeat" required>


                <?php
                if (isset($_GET["error"])) {
                    if ($_GET["error"] == "emptyinput") {
                        echo "<p class='error-message btmspace-50'>Συμπλήρωσε όλα τα πεδία !</p>";
                    } else if ($_GET["error"] == "invaliduid") {
                        echo "<p class='error-message btmspace-50'>Μη έγκυρο όνομα χρήστη!</p>";
                    } else if ($_GET["error"] == "invalidemail") {
                        echo "<p class='error-message btmspace-50'>Μη έγκυρη ηλεκτρονική διεύθυνση!</p>";
                    } else if ($_GET["error"] == "invalideafm") {
                        echo "<p class='error-message btmspace-50'>Μη έγκυρο ΑΦΜ! Το ΑΦΜ πρέπει να αποτελείται απο 9 αριθμούς!</p>";
                    } else if ($_GET["error"] == "pwddontmatch") {
                        echo "<p class='error-message btmspace-50'>Οι κωδικοί δεν ταιριάζουν!</p>";
                    } else if ($_GET["error"] == "usernametaken") {
                        echo "<p class='error-message btmspace-50'>Το username ή το email χρησιμοποιείται ήδη!</p>";
                    } else if ($_GET["error"] == "stmtfailed") {
                        echo "<p class='error-message btmspace-50'>Κάτι πήγε στραβά, προσπάθησε ξανά!</p>";
                        // } else if ($_GET["error"] == "none") {
                        //     echo "<p class='ok-message btmspace-50'>Η εγγραφή σου ολοκληρώθηκε με επιτυχία!</p>";
                    } else if ($_GET["error"] == "afmexists") {
                        echo "<p class='ok-message btmspace-50'>Το ΑΦΜ χρησιμοποιείται ήδη!</p>";
                    }
                }
                ?>

                <div class="clearfix">
                    <button type="submit" name="submit" class="signupbtn">Εγγραφή</button>
                </div>

            </div>

        </form>
        <div class="clear btmspace-50"></div>
    </main>
</div>

<?php
include_once 'header-footer/footer.php' // Include footer of page
?>
<?php
include_once 'header.php' // Include header of page
?>

<head>
    <title>Εγγραφή | Υπουργείο Εργασίας & Κοινωνικών Υποθέσεων</title>
</head>



<div class="bgded" style="background:white;">
    <div id="breadcrumb" class="hoc clear">
        <h6 class="heading font-x3">Εγγραφή</h6>
        <ul>
            <li><a style="color: #1c7aa8;" class="hyperlink" href="index.php">ΑΡΧΙΚΗ</a></li>
            <li><span>&#47;</span> </li>
            <li>
                <p style="color: #363636;">ΕΓΓΡΑΦΗ</p>
            </li>
        </ul>
    </div>
</div>


<div class="wrapper row3">
    <main class="hoc mycontainer clear">
        <form action="includes/signup.inc.php" method="post" style="border:1px solid #ccc">
            <div class="signup-container">
                <p>Παρακαλώ συμπλήρωσε την ακόλουθη φόρμα για να κάνεις εγγραφή.</p>
                <hr>
                <div class="two-in-one-row-form">
                    <div class="one-element-form margin-right">
                        <label for="firstname"><b>Όνομα</b></label>
                        <input type="text" placeholder="Εισήγαγε το Όνομα" name="firstname" required>
                    </div>

                    <div class="one-element-form">
                        <label for="lastname"><b>Επίθετο</b></label>
                        <input type="text" placeholder="Εισήγαγε το Επίθετο" name="lastname" required>
                    </div>
                </div>


                <div class="two-in-one-row-form">
                    <div class="one-element-form margin-right">
                        <label for="uid"><b>Username</b></label>
                        <input type="text" placeholder="Εισήγαγε το Username" name="uid" required>
                    </div>

                    <div class="one-element-form">
                        <label for="afm"><b>ΑΦΜ</b></label>
                        <input type="text" placeholder="Εισήγαγε το ΑΦΜ" name="afm" required>
                    </div>
                </div>

                <!-- <label for="uid"><b>Username</b></label>
                <input type="text" placeholder="Εισήγαγε το Username" name="uid" required> -->

                <label for="email"><b>Email</b></label>
                <input type="text" placeholder="Εισήγαγε το Email" name="email" required>

                <label for="psw"><b>Κωδικός</b></label>
                <input type="password" placeholder="Εισήγαγε τον Κωδικό" name="psw" required>

                <label for="psw-repeat"><b>Επανάλαβε τον κωδικό</b></label>
                <input type="password" placeholder="Επανέλαβε τον Κωδικό" name="psw-repeat" required>

                <label for="usertype"><b>Διάλεξε την κατηγορία στην οποία ανήκεις</b></label>
                <div class="radio-buttons">
                    <div class="radio-button">
                        <input type="radio" name="usertype" value="employer" />
                        <label for="employer">Εργοδότης</label>
                    </div>
                    <div class="radio-button">
                        <input type="radio" name="usertype" value="employee" checked />
                        <label for="employer">Εργαζόμενος</label>
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

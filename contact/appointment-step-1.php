<?php
include_once 'header-footer/header.php' // Include header of page
?>

<head>
    <title>Κλείσιμο Ραντεβού - Βήμα 1 | Υπουργείο Εργασίας & Κοινωνικών Υποθέσεων</title>
</head>

<div class="bgded" style="background:white;">
    <div id="breadcrumb" class="hoc clear">
        <h6 class="heading font-x3">Κλείσιμο Ραντεβού</h6>
        <ul>
            <li><a style="color: #1c7aa8;" class="hyperlink" href="../index.php">ΑΡΧΙΚΗ</a></li>
            <li><span>&#47;</span> </li>
            <li><a style="color: #1c7aa8;" class="hyperlink" href="contact.php">ΕΠΙΚΟΙΝΩΝΙΑ</a></li>
            <li><span>&#47;</span> </li>
            <li>
                <p style="color: #363636;">ΚΛΕΙΣΙΜΟ ΡΑΝΤΕΒΟΥ</p>
            </li>
        </ul>
    </div>
</div>

<div class="wrapper row3">
    <main class="hoc mycontainer clear">
        <form action="appointment-step-2.php" method="post" style="border:1px solid #ccc">
            <div class="signup-container">

                <div class="group btmspace-50 steps-header">
                    <a href="appointment-step-1.php">
                        <div style="border-radius: 3px 0px 0px 3px;" class="first step step-active">
                            <strong>Βήμα 1:</strong> Στοιχεία
                        </div>
                    </a>
                    <a href="appointment-step-2.php">
                        <div class="second step">
                            <strong>Βήμα 2</strong>: Ημερομηνία & ώρα
                        </div>
                    </a>
                    <a href="appointment-step-3.php">
                        <div style="border-radius: 0px 3px 3px 0px;" class="third step">
                            <strong>Βήμα 3</strong>: Επιβεβαίωση
                        </div>
                    </a>
                </div>

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
                        <label class="required" for="email"><b>Ηλεκτρονική Διεύθυνση</b></label>
                        <input type="text" placeholder="Εισάγετε την Ηλεκτρονική Διεύθυνση" name="email" required>
                    </div>

                    <div class="one-element-form">
                        <label class="required" for="afm"><b>ΑΦΜ</b></label>
                        <input type="text" placeholder="Εισάγετε το ΑΦΜ" name="afm" required>
                    </div>
                </div>
                <div class="larger-form">
                    <label class="required" for="reason-appointment"><b>Λόγος Ραντεβού</b></label>
                    <input type="text" placeholder="Περιγράψτε συνοπτικά τους λόγους του ραντεβού" name="reason-appointment" required>
                </div>
                <div class="clearfix submit-appointment">
                    <button type="submit" name="submit" class="signupbtn"><b>Επόμενο</b></button>
                </div>
            </div>
        </form>
        <div class="clear btmspace-50"></div>
    </main>
</div>

<?php
include_once 'header-footer/footer.php' // Include footer of page
?>
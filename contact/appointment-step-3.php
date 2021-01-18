<?php
include_once 'header-footer/header.php' // Include header of page
?>

<head>
    <title>Κλείσιμο Ραντεβού - Βήμα 3 | Υπουργείο Εργασίας & Κοινωνικών Υποθέσεων</title>
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
        <form action="report-success.php" method="post" style="border:1px solid #ccc">
            <div class="signup-container">

                <div class="group btmspace-50 steps-header">
                    <a href="appointment-step-1.php">
                        <div style="border-radius: 3px 0px 0px 3px;" class="first step">
                            <strong>Βήμα 1:</strong> Στοιχεία
                        </div>
                    </a>
                    <a href="appointment-step-2.php">
                        <div class="second step ">
                            <strong>Βήμα 2</strong>: Ημερομηνία & ώρα
                        </div>
                    </a>
                    <a href="appointment-step-3.php">
                        <div style="border-radius: 0px 3px 3px 0px;" class="third step  step-active">
                            <strong>Βήμα 3</strong>: Επιβεβαίωση
                        </div>
                    </a>
                </div>
                <label class="required" for="email-inform"><b>Θέλετε να λάβετε αναλυτικά τις πληροφορίες του ραντεβού στην ηλεκτρονική σας διεύθυνση;</b></label>
                <div class="radio-buttons-inside">
                    <div class="radio-button">
                        <input type="radio" name="email-inform" value="yes" />
                        <label for="yes">Ναι</label>
                    </div>

                    <div class="radio-button btmspace-50">
                        <input type="radio" name="email-inform" value="no" />
                        <label class="clear" for="no">Οχι</label>
                    </div>
                </div>
                <p class="allign-center">
                    Πατώντας το κουμπί <b>οριστικοποίηση</b>, θα ολοκληρωθεί η δήλωση του ραντεβού σας.
                </p>
                <div class="clearfix submit-appointment">
                    <button type="submit" name="submit" class="signupbtn"><b>Oριστικοποίηση</b></button>
                </div>

            </div>

        </form>
        <div class="clear btmspace-50"></div>
    </main>
</div>

<?php
include_once 'header-footer/footer.php' // Include footer of page
?>
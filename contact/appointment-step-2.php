<?php
include_once 'header-footer/header.php' // Include header of page
?>

<head>
    <title>Κλείσιμο Ραντεβού - Βήμα 2 | Υπουργείο Εργασίας & Κοινωνικών Υποθέσεων</title>
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
        <form action="appointment-step-3.php" method="post" style="border:1px solid #ccc">
            <div class="signup-container">

                <div class="group btmspace-50 steps-header">
                    <a href="appointment-step-1.php">
                        <div style="border-radius: 3px 0px 0px 3px;" class="first step">
                            <strong>Βήμα 1:</strong> Στοιχεία
                        </div>
                    </a>
                    <a href="appointment-step-2.php">
                        <div class="second step  step-active">
                            <strong>Βήμα 2</strong>: Ημερομηνία & ώρα
                        </div>
                    </a>
                    <a href="appointment-step-3.php">
                        <div style="border-radius: 0px 3px 3px 0px;" class="third step">
                            <strong>Βήμα 3</strong>: Επιβεβαίωση
                        </div>
                    </a>
                </div>

                <p>
                    Αφού επιλέξετε την επιθυμιτή ημερομηνία για το ραντεβού, θα σας εμφανιστούν οι διαθέσιμες ώρες για
                    εκείνη την μέρα, βάση του προγράμματος του υπουργείου και των υπόλοιπων προγραμματισμένων συναντήσεων.
                    Κάθε ραντεβού έχει την χρονική διάρκεια των 30 λεπτών.
                </p>
                <hr>

                <div class="two-in-one-row-form">


                    <div class="one-element-form">
                        <label class="required btmspace-15" for="date-appointment"><b>Ημερομηνία Ραντεβού</b></label>
                        <input type="date" id="date-appointment" name="date-appointment" required>
                    </div>

                    <div class="one-element-form margin-right">

                        <label class="required btmspace-15" for="time-appointment">
                            <b>Επιλέξτε μία από τις διαθέσιμες ώρες</b>
                        </label>

                        <select>
                            <option value="0">Έναρξη: 9:15</option>
                            <option value="0">Έναρξη: 10:15</option>
                            <option value="0">Έναρξη: 11:30</option>
                            <option value="0">Έναρξη: 14:30</option>
                            <option value="0">Έναρξη: 15:30</option>
                            <option value="0">Έναρξη: 18:15</option>

                        </select>
                    </div>

                </div>


                <div class="clearfix submit-appointment">
                    <button type="submit" name="submit" class="signupbtn"><b>Επόμενο</b></button>
                </div>
                <!-- <div class="footer-form">
                    <a class="hyperlink prev" href="appointment-step-1.php">Προηγούμενο</a>
                    <a class="hyperlink next" href="appointment-step-3.php">Επόμενο</a>
                </div> -->

            </div>

        </form>
        <div class="clear btmspace-50"></div>
    </main>
</div>

<?php
include_once 'header-footer/footer.php' // Include footer of page
?>
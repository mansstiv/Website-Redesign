<script type="text/javascript">
    var now = new Date(),
        currYear = now.getFullYear(),
        currMonth = now.getMonth(),
        currDay = now.getDate(),
        min = new Date(currYear, currMonth, currDay),
        max = new Date(currYear, currMonth + 6, currDay);

    mobiscroll.datepicker('#demo-booking-single', {
        controls: ['calendar'],
        min: min,
        max: max,
        onPageLoading: function(event, inst) {
            getPrices(event.firstDay, function callback(bookings) {
                inst.setOptions({
                    labels: bookings.labels,
                    invalid: bookings.invalid
                });
            });
        }
    });

    function getPrices(d, callback) {
        var invalid = [],
            labels = [];

        mobiscroll.util.http.getJson('//trial.mobiscroll.com/getprices/?year=' + d.getFullYear() + '&month=' + d.getMonth(), function(bookings) {
            for (var i = 0; i < bookings.length; ++i) {
                var booking = bookings[i],
                    d = new Date(booking.d);

                if (booking.price > 0) {
                    labels.push({
                        start: d,
                        title: '$' + booking.price,
                        textColor: '#e1528f'
                    });
                } else {
                    invalid.push(d);
                }
            }
            callback({
                labels: labels,
                invalid: invalid
            });
        }, 'jsonp');
    }
</script>


<?php
include_once 'header.php' // Include header of page
?>

<head>
    <title>Κλείσιμο Ραντεβού - Βήμα 2 | Υπουργείο Εργασίας & Κοινωνικών Υποθέσεων</title>
</head>

<div class="bgded" style="background:white;">
    <div id="breadcrumb" class="hoc clear">
        <h6 class="heading font-x3">Κλείσιμο Ραντεβού</h6>
        <ul>
            <li><a style="color: #1c7aa8;" class="hyperlink" href="index.php">ΑΡΧΙΚΗ</a></li>
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
        <form action="includes/signup.inc.php" method="post" style="border:1px solid #ccc">
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

                <!-- <div class="two-in-one-row-form">
                    <div class="one-element-form margin-right">
                        <label class="required btmspace-15" for="startRemoteDay"><b>Ημ/νία Ραντεβού</b></label>
                        <input type="date" id="startRemoteDay" name="startRemoteDay" required>
                    </div>

                    <div class="one-element-form">
                        <label class="required btmspace-15" for="startRemoteDay"><b>Επλέξτε μία από τις διαθέσιμες ώρες</b></label>
                        <select>
                            <option value="0">Select car:</option>
                            <option value="1">Audi</option>
                        </select>
                    </div>
                </div> -->

                <label class="required" for="date-appointment"><b>Ημερομηνία Ραντεβού</b></label>
                <input type="text" placeholder="Εισάγετε την ημερομηνία του ραντεβού (πχ. 01/01/1990)" name="date-appointment" required>

                <label style="margin-bottom:0px;" class="required" for="startRemoteDay"><b>Επλέξτε μία από τις διαθέσιμες ώρες</b></label>
                <p class="btmspace-15">Υποσημείωση: H διάρκεια για κάθε ραντεβού είναι 30 λεπτά</p>
                <select>
                    <option value="0">Έναρξη: 9:15</option>
                    <option value="0">Έναρξη: 10:15</option>
                    <option value="0">Έναρξη: 11:30</option>
                    <option value="0">Έναρξη: 14:30</option>
                    <option value="0">Έναρξη: 15:30</option>
                    <option value="0">Έναρξη: 18:15</option>
                </select>

                <div class="footer-form">
                    <a class="hyperlink prev" href="appointment-step-1.php">Προηγούμενο</a>
                    <a class="hyperlink next" href="appointment-step-3.php">Επόμενο</a>
                </div>

            </div>

        </form>
        <div class="clear btmspace-50"></div>
    </main>
</div>

<?php
include_once 'footer.php' // Include footer of page
?>
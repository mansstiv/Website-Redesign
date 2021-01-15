<?php
session_start();
?>


<!DOCTYPE html>
<!--
Template Name: Kelaby
Author: <a href="http://www.os-templates.com/">OS Templates</a>
Author URI: http://www.os-templates.com/
Licence: Free to use under our free template licence terms
Licence URI: http://www.os-templates.com/template-terms
-->
<html>

<head>
    <!-- title will be writen in each page -->
    <script src="https://kit.fontawesome.com/c1dcc21947.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">

</head>

<body id="top">
    <div class="wrapper row0">
        <div id="topbar" class="hoc clear">
            <!-- ################################################################################################ -->
            <div class="fl_left">
                <ul>
                    <li><i class="fa fa-phone"></i> 213-1516649</li>
                    <li><i class="fa fa-envelope-o"></i> ypakp@gmail.gr</li>
                </ul>
            </div>

            <div class="fl_right">

                <ul>
                    <?php
                    if (isset($_SESSION["username"])) {
                        // echo "<li><a href='index.php'><i class='fa fa-lg fa-home'></i></a></li>";
                        echo "<li><a href='profile.php'><i class='fas fa-user'></i>" . $_SESSION["username"] . "</a></li>";
                        echo "<li><a href='includes/logout.inc.php'>ΑΠΟΣΥΝΔΕΣΗ</a></li>";
                    } else {
                        // echo "<li><a href='index.php'><i class='fa fa-lg fa-home'></i></a></li>";
                        echo "<li><a href='signup.php'>ΕΓΓΡΑΦΗ</a></li>";
                        echo "<li><a href='login.php'>ΕΙΣΟΔΟΣ</a></li>";
                    }

                    ?>
                </ul>

            </div>
            <!-- ################################################################################################ -->
        </div>
    </div>

    <div class="wrapper row1 ">
        <header id="header" class="hoc clear">
            <a id="logo" href="index.php">
                <img src="images/demo/MainLogoSupportErgazom.gif" alt="Logo">
            </a>
        </header>
    </div>

    <div class="wrapper row2">
        <nav id="mainav" class="hoc clear">
            <ul class="clear">
                <li class="active"><a href="index.php">Αρχικη</a></li>

                <li><a class="drop" href="employer.php">ΕΡΓΟΔΟΤΗΣ</a>
                    <ul>
                        <li><a href="employee-remote.php">ΔΗΛΩΣΗ ΕΞ ΑΠΟΣΤΑΣΕΩΣ ΕΡΓΑΣΙΑΣ ΓΙΑ ΕΡΓΑΖΟΜΕΝΟ</a></li>
                        <li><a href="employee-suspension.php">ΑΝΑΣΤΟΛΗ ΣΥΜΒΑΣΗΣ ΕΡΓΑΣΙΑΣ ΓΙΑ ΕΡΓΑΖΟΜΕΝΟ</a></li>
                    </ul>
                </li>
                <li><a class="drop" href="employee.php">ΕΡΓΑΖΟΜΕΝΟΣ</a>
                    <ul>
                        <li><a href="employee-covid.php">ΔΥΝΑΤΟΤΗΤΕΣ ΚΑΙ COVID-2019</a></li>
                        <li><a href="employee-leave.php">ΔΗΛΩΣΗ ΑΔΕΙΑΣ ΕΙΔΙΚΟΥ ΣΚΟΠΟΥ</a></li>
                    </ul>
                </li>
                <!-- <li><a class="drop" href="pages/gallery.php">ΥΠΟΛΟΙΠΟΙ ΧΡΗΣΤΕΣ</a>
        <ul>
          <li><a href="pages/sidebar-left.php">ΣΥΝΤΑΞΙΟΥΧΟΣ</a></li>
          <li><a href="pages/sidebar-right.php">ΑΝΕΡΓΟΣ</a></li>
        </ul>
      </li> -->
                <li><a class="drop" href="topics.php">COVID-19</a>
                    <ul>
                        <li><a href="covid.php">ΠΡΟΛΗΨΗ & COVID-2019</a></li>
                        <li><a href="covid-protocol.php">ΠΡΩΤΟΚΟΛΛΟ ΑΝΤΙΜΕΤΩΠΙΣΗΣ ΚΡΟΥΣΜΑΤΟΣ</a></li>
                        <li><a href="covid-symptoms.php">ΚΥΡΙΑ ΣΥΜΠΤΩΜΑΤΑ</a></li>
                        <li><a href="covid-support.php">ΜΕΤΡΑ ΣΤΗΡΙΞΗΣ</a></li>
                    </ul>
                </li>
                <li><a href="#">Ανακοινωσεις</a></li>
                <li><a class="drop" href="contact.php">ΕΠΙΚΟΙΝΩΝΙΑ</a>
                    <ul>
                        <li><a href="#">ΚΛΕΙΣΙΜΟ ΡΑΝΤΕΒΟΥ</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>

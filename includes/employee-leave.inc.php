<?php

if (isset($_POST["submit"])) {
    $afm = $_POST["afm"];
    $startDate = $_POST["startPermissionDay"];
    $endDate = $_POST["endPermissionDay"];


    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (afmExists($conn, $afm) == false) {
        header("location: ../employee/leave.php?error=invalidAfm");
        exit();
    }

    include_once 'header-footer/header.php'; // Include header of page
    echo "<head>";
    echo    "<title>Επιτυχής Δήλωση | Yπουργείο Εργασίας & Κοινωνικών Υποθέσεων</title>";
    echo  "</head>";

    echo    "<div class='wrapper row3'>";
    echo        "<main class='hoc mycontainer clear'>";
    echo            "<div class='edit-profile-container'>";
    echo                "<p class='allign-center btmspace-50 ok-message'>";
    echo                    "Η δήλωση σας ολοκληρώθηκε με επιτυχία!";
    echo                "</p>";
    echo                "<p class='allign-center'>";
    echo                    "Επιστροφή στην <a class='hyperlink' href=../index.php>αρχική σελίδα</a>.";
    echo                "</p>";
    echo            "</div>";
    echo        "</main>";
    echo    "</div>";

    updatePermissionDate($conn, $afm, $startDate, $endDate);
}

include_once 'header-footer/footer.php'; // Include footer of page
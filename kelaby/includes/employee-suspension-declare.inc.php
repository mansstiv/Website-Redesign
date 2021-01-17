<?php

if (isset($_POST["submit"])) {
    $afm = $_POST["afm"];
    $startDate = $_POST["startSuspensionDay"];
    $endDate = $_POST["endSuspensionDay"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (afmExists($conn, $afm) == false) {
        header("location: ../employee-suspension-declare.php?error=invalidAfm");
        exit();
    }

    include_once 'header.php'; // Include header of page

    echo    "<div class='wrapper row3'>";
    echo        "<main class='hoc mycontainer clear'>";
    echo            "<div class='edit-profile-container'>";
    echo                "<p class='allign-center btmspace-50 ok-message'>";
    echo                    "Η δήλωση σας ολοκληρώθηκε με επιτυχία!";
    echo                "</p>";
    echo                "<p class='allign-center'>";
    echo                    "Γυρίστε στην <a class='hyperlink' href=../index.html>αρχική σελίδα</a> ή προχωρήστε σε νέα <a class='hyperlink' href=../employee-suspension-declare.php>δήλωση αναστολής σύμβασης εργασίας</a>.";
    echo                "</p>";
    echo            "</div>";
    echo        "</main>";
    echo    "</div>";

    updateSuspensionDate($conn, $afm, date('Y-m-d', strtotime($startDate)), date('Y-m-d', strtotime($endDate)));
}

include_once 'footer.php'; // Include footer of page
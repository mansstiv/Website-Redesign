<?php

if (isset($_POST["submit"])) {
    $afm = $_POST["afm"];
    if ($_SESSION["removeRemote"] == false) {
        $startDate = $_POST["startRemoteDay"];
        $endDate = $_POST["endRemoteDay"];
    }

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (afmExists($conn, $afm) == false) {
        if ($_SESSION["removeRemote"] == false)
            header("location: ../employer/employee-remote/employee-remote-declare.php?error=invalidAfm");
        else if ($_SESSION["removeRemote"] == true)
            header("location: ../employer/employee-remote/employee-remote-remove.php?error=invalidAfm");
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
    if ($_SESSION["removeRemote"] == false)
        echo                    "Γυρίστε στην <a class='hyperlink' href=../index.php>αρχική σελίδα</a> ή προχωρήστε σε νέα <a class='hyperlink' href=../employer/employee-remote/employee-remote-declare.php>δήλωση εξ αποστάσεως εργασίας</a>.";
    else if ($_SESSION["removeRemote"] == true)
        echo                    "Γυρίστε στην <a class='hyperlink' href=../index.php>αρχική σελίδα</a> ή προχωρήστε σε νέα <a class='hyperlink' href=../employer/employee-remote/employee-remote-remove.php>άρση εξ αποστάσεως εργασίας</a>.";

    echo                "</p>";
    echo            "</div>";
    echo        "</main>";
    echo    "</div>";

    if ($_SESSION["removeRemote"] == false)
        updateRemoteDate($conn, $afm, date('Y-m-d', strtotime($startDate)), date('Y-m-d', strtotime($endDate)));
    else if ($_SESSION["removeRemote"] == true)
        updateRemoteDate($conn, $afm, NULL, NULL);
}

include_once 'header-footer/footer.php'; // Include footer of page
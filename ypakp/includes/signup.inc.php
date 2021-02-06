<?php

if (isset($_POST["submit"])) {
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $username = $_POST["uid"];
    $afm = $_POST["afm"];
    $email = $_POST["email"];
    $password = $_POST["psw"];
    $passwordRepeat = $_POST["psw-repeat"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputSignup($firstname, $lastname, $username, $afm, $email, $password, $passwordRepeat) !== false) {
        header("location: ../profile/signup.php?error=emptyinput");
        exit();
    }

    if (invalidUid($username) !== false) {
        header("location: ../profile/signup.php?error=invaliduid");
        exit();
    }

    if (invalidEmail($email) !== false) {
        header("location: ../profile/signup.php?error=invalidemail");
        exit();
    }


    if (invalidAfm($afm) !== false) {
        header("location: ../profile/signup.php?error=invalideafm");
        exit();
    }

    if (passwordNotMatch($password, $passwordRepeat) !== false) {
        header("location: ../profile/signup.php?error=pwddontmatch");
        exit();
    }

    if (uidExists($conn, $username, $email) !== false) {
        header("location: ../profile/signup.php?error=usernametaken");
        exit();
    }

    if (afmExists($conn, $afm) !== false) {
        header("location: ../profile/signup.php?error=afmexists");
        exit();
    }

    include_once 'header-footer/header.php'; // Include header of page
    echo "<head>";
    echo    "<title>Επιτυχής Εγγραφή | Yπουργείο Εργασίας & Κοινωνικών Υποθέσεων</title>";
    echo  "</head>";

    echo    "<div class='wrapper row3'>";
    echo        "<main class='hoc mycontainer clear'>";
    echo            "<div class='signup-container'>";
    echo                "<p class='allign-center btmspace-50 ok-message'>";
    echo                    "Η εγγραφή σου ολοκληρώθηκε με επιτυχία!";
    echo                "</p>";
    echo                "<p class='allign-center'>";
    echo                    "Επιστροφή στην <a class='hyperlink' href=../index.php>αρχική σελίδα</a>.";
    echo                "</p>";
    echo            "</div>";
    echo        "</main>";
    echo    "</div>";


    createUser($conn, $firstname, $email, $lastname, $password, $afm, $username);

    include_once 'header-footer/footer.php'; // Include footer of page

} else {
    header("location: ../profile/signup.php");
}

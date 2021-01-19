<?php

if (isset($_POST["submit"])) {

    include_once 'header-footer/header.php'; // Include header of page

    $username = $_SESSION["username"];
    $password = $_POST["psw"];
    $newPassword = $_POST["new-psw"];
    $newPasswordRepeat = $_POST["new-psw-repeat"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    $checkPwd = password_verify($password, $_SESSION["password"]);
    if ($checkPwd === false) {
        header("location: ../profile/profile.php?error=wrongCurrentPwd");
        exit();
    }

    if (passwordNotMatch($newPassword, $newPasswordRepeat) !== false) {
        header("location: ../profile/profile.php?error=pwddontmatch");
        exit();
    }


    echo    "<div class='wrapper row3'>";
    echo        "<main class='hoc mycontainer clear'>";
    echo            "<div class='edit-profile-container'>";
    echo                "<p class='allign-center btmspace-50 ok-message'>";
    echo                    "Ο νέος κωδικός καταχωρήθηκε με επιτυχία!";
    echo                "</p>";
    echo                "<p class='allign-center'>";
    echo                    "Επιστροφή στην <a class='hyperlink' href=../index.php>αρχική σελίδα</a> ή επιστροφή στο <a class='hyperlink' href=../profile/profile.php>προφίλ</a>.";
    echo                "</p>";
    echo            "</div>";
    echo        "</main>";
    echo    "</div>";

    changePassword($conn, $username, $password);

    include_once 'header-footer/footer.php'; // Include footer of page
} else {
    header("location: ../profile/profile.php");
}

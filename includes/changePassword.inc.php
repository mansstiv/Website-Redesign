<?php

require_once 'dbh.inc.php';
require_once 'functions.inc.php';

if (isset($_POST["submit"])) {

    $password = $_POST["psw"];
    $newPassword = $_POST["new-psw"];
    $newPasswordRepeat = $_POST["new-psw-repeat"];

    session_start();

    $uidExists = uidExists($conn, $_SESSION["username"], $_SESSION["username"]);
    $checkPwd = password_verify($password, $uidExists["password"]);
    if ($checkPwd === false) {
        header("location: ../profile/profile.php?error=wrongCurrentPwd");
        exit();
    }

    if (passwordNotMatch($newPassword, $newPasswordRepeat) !== false) {
        header("location: ../profile/profile.php?error=pwddontmatch");
        exit();
    }

    changePassword($conn, $_SESSION["username"], $newPassword);
    header("location: ../profile/profile.php?error=changeCodeNone");
    exit();
} else {
    header("location: ../profile/profile.php");
}

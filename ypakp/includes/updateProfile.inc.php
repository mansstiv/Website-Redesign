<?php

require_once 'dbh.inc.php';
require_once 'functions.inc.php';

if (isset($_POST["submit"])) {


    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $username = $_POST["uid"];
    $afm = (int)$_POST["afm"];
    $email = $_POST["email"];

    // echo "{$firstname} {$lastname} {$username} {$afm} {$email}";

    session_start();

    if ($username !== $_SESSION["username"]) {
        if (invalidUid($username) !== false) {
            header("location: ../profile/profile.php?error=invaliduid");
            exit();
        }
        if ($email == $_SESSION["email"]) {
            if (uidExists($conn, $username, $username) !== false) {
                header("location: ../profile/profile.php?error=usernametaken");
                exit();
            }
        } else {
            if (uidExists($conn, $username, $email) !== false) {
                header("location: ../profile/profile.php?error=usernametaken");
                exit();
            }
        }
    }

    if ($email !== $_SESSION["email"]) {
        if (invalidEmail($email) !== false) {
            header("location: ../profile/profile.php?error=invalidemail");
            exit();
        }
        if ($username == $_SESSION["username"]) {
            if (uidExists($conn, $email, $email) !== false) {
                header("location: ../profile/profile.php?error=usernametaken");
                exit();
            }
        } else {
            if (uidExists($conn, $username, $email) !== false) {
                header("location: ../profile/profile.php?error=usernametaken");
                exit();
            }
        }
    }

    if ($afm !== $_SESSION["afm"]) {
        if (invalidAfm($afm) !== false) {
            header("location: ../profile/profile.php?error=invalideafm");
            exit();
        }
        if (afmExists($conn, $afm) !== false) {
            header("location: ../profile/profile.php?error=afmexists");
            exit();
        }
    }

    updateProfile($conn, $firstname, $lastname, $username, $afm, $email);
    header("location: ../profile/profile.php?error=updateProfileNone");
    exit();
} else {
    header("location: ../profile/profile.php");
}

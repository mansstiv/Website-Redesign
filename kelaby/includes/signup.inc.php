<?php

if (isset($_POST["submit"])) {
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $username = $_POST["uid"];
    $afm = $_POST["afm"];
    $email = $_POST["email"];
    $password = $_POST["psw"];
    $passwordRepeat = $_POST["psw-repeat"];
    $userType = $_POST["usertype"];
    $employerAfm = $_POST["employer-afm"];


    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputSignup($userType, $firstname, $lastname, $username, $afm, $email, $password, $passwordRepeat, $employerAfm) !== false) {
        header("location: ../signup.php?error=emptyinput");
        exit();
    }

    if (invalidUid($username) !== false) {
        header("location: ../signup.php?error=invaliduid");
        exit();
    }

    if (invalidEmail($email) !== false) {
        header("location: ../signup.php?error=invalidemail");
        exit();
    }

    if (invalidAfm($afm) !== false) {
        header("location: ../signup.php?error=invalideafm");
        exit();
    }

    if (passwordNotMatch($password, $passwordRepeat) !== false) {
        header("location: ../signup.php?error=pwddontmatch");
        exit();
    }

    if (uidExists($conn, $username, $email) !== false) {
        header("location: ../signup.php?error=usernametaken");
        exit();
    }


    createUser($conn, $firstname, $email, $lastname, $password, $userType, $afm, $username);
} else {
    header("location: ../signup.php");
}

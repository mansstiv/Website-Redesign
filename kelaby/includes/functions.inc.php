<?php

function  emptyInputSignup($userType, $firstname, $lastname, $username, $afm, $email, $password, $passwordRepeat)
{
    $result = false;

    if (empty($userType) || empty($userType) || empty($userType) || empty($userType) || empty($userType) || empty($userType) || empty($userType) || empty($userType)) {
        $result = true;
    }

    return $result;
}


function invalidUid($username)
{
    $result = false;

    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $result = true;
    }

    return $result;
}

function invalidEmail($email)
{
    $result = false;

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    }

    return $result;
}

function invalidAfm($afm)
{
    $result = false;

    if (!preg_match("/^[0-9]*$/", $afm) || strlen($afm) != 9) {
        $result = true;
    }

    return $result;
}

function passwordNotMatch($password, $passwordRepeat)
{
    $result = false;

    if ($password !== $passwordRepeat) {
        $result = true;
    }

    return $result;
}

function uidExists($conn, $username, $email)
{
    $sql = "SELECT * FROM users WHERE username = ? OR email = ?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function createUser($conn, $firstname, $email, $lastname, $password, $userType, $afm, $username)
{
    $isEmployer = 0;
    if ($userType == "employer") {
        $isEmployer = 1;
    }

    $sql = "INSERT INTO users (firstname, lastname, username, email, isEmployer, password, afm) 
            VALUES (?, ?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssssisi", $firstname, $lastname, $username, $email, $isEmployer, $hashedPassword, $afm);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../signup.php?error=none");
    exit();
}

function  emptyInputLogin($username, $password)
{
    $result = false;

    if (empty($username) || empty($password)) {
        $result = true;
    }

    return $result;
}

function loginUser($conn, $username, $password)
{
    $uidExists = uidExists($conn, $username, $username);

    if ($uidExists === false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    }

    $pwdHashed = $uidExists['password'];
    $checkPwd = password_verify($password, $pwdHashed);

    if ($checkPwd === false) {
        header("location: ../login.php?error=wrongloginpwd");
        exit();
    } else if ($checkPwd === true) {
        session_start();

        $_SESSION["userid"] = $uidExists["id"];
        $_SESSION["username"] = $uidExists["username"];
        $_SESSION["firstname"] = $uidExists["firstname"];
        $_SESSION["lastname"] = $uidExists["lastname"];
        header("location: ../index.php");
        exit();
    }
}

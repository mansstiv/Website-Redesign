<?php

function  emptyInputSignup($userType, $firstname, $lastname, $username, $afm, $email, $password, $passwordRepeat, $employerAfm)
{

    $result = false;

    if (empty($userType) || empty($firstname) || empty($lastname) || empty($username) || empty($afm) || empty($email) || empty($password) || empty($passwordRepeat)) {
        $result = true;
    }

    if ($userType == "employee") {
        if (empty($employerAfm)) {
            $result = false;
        }
    }

    return $result;
}


function emptyInputDate($afm, $startDate, $endDate)
{
    $result = false;

    if (empty($afm) || empty($startDate) || empty($endDate)) {
        $result = true;
    }



    return $result;
}

function updateRemoteDate($conn, $afm, $startDate, $endDate)
{

    $sql = "update employee ,users SET employee.worksRemote_startDate = ? ,employee.worksRemote_endDate = ?
    WHERE   users.username=employee.userName AND users.afm=? ;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../employee-remote.php?error=dateFail");
        exit();
    }


    mysqli_stmt_bind_param($stmt, "ssi", $startDate, $endDate, $afm);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);


    header("location: ../employee-remote.php?error=none");
    exit();
}

function updateSuspensionDate($conn, $afm, $startDate, $endDate)
{
    $sql = "update employee ,users SET employee.inSuspension_startDate = ? ,employee.inSuspension_endDate = ?
    WHERE   users.username=employee.userName AND users.afm=? ;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../employee-suspension.php?error=dateFail");
        exit();
    }


    mysqli_stmt_bind_param($stmt, "ssi", $startDate, $endDate, $afm);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);


    header("location: ../employee-suspension.php?error=none");
    exit();
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

function afmExists($conn, $afm)
{

    $sql = "SELECT * FROM users WHERE afm= ?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "i", $afm);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        mysqli_stmt_close($stmt);

        return $row;
    } else {
        $result = false;

        mysqli_stmt_close($stmt);

        return $result;
    }

    mysqli_stmt_close($stmt);
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

function createUser($conn, $firstname, $email, $lastname, $password, $userType, $afm, $username, $employerAfm, $hasChildUnder12)
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

    if ($isEmployer == 0) {

        if ($hasChildUnder12 == "yes") {
            $hasChildUnder12 = 1;
        } else {
            $hasChildUnder12 = 0;
        }

        $sql = "INSERT INTO employee (userName, employerAfm, hasChildUnder12)
        VALUES(?,?, ?);";
        $stmt = mysqli_stmt_init($conn);


        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../signup.php?error=stmtfailed");
            exit();
        }
        mysqli_stmt_bind_param($stmt, "sii", $username, $employerAfm, $hasChildUnder12);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }



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


function getEmployeesForEmployer($conn, $employerAfm)
{
    $sql = "SELECT us1.firstname , us1.lastname, us1.afm
            FROM users us1,users us2 , employee
            WHERE (employee.userName = us1.username) AND (employee.employerAfm = us2.afm) AND (us2.afm=?);";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "i", $employerAfm);
    mysqli_stmt_execute($stmt);


    $resultData = mysqli_stmt_get_result($stmt);
    $results = array();

    while ($row = mysqli_fetch_assoc($resultData)) {
        $results[] = $row;
    }

    mysqli_stmt_close($stmt);

    return $results;
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
        $_SESSION["employeesForEmployer"] = getEmployeesForEmployer($conn, $uidExists["afm"]);
        header("location: ../index.php");
        exit();
    }
}

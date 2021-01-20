<?php

function  emptyInputSignup($firstname, $lastname, $username, $afm, $email, $password, $passwordRepeat)
{

    $result = false;

    if (empty($firstname) || empty($lastname) || empty($username) || empty($afm) || empty($email) || empty($password) || empty($passwordRepeat)) {
        $result = true;
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
    $sql = "UPDATE employee ,users SET employee.worksRemote_startDate = ? ,employee.worksRemote_endDate = ?
            WHERE   users.username=employee.userName AND users.afm=? ;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../employer/employee-remote/employee-remote-declare.php?error=dateFail");
        exit();
    }


    mysqli_stmt_bind_param($stmt, "ssi", $startDate, $endDate, $afm);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

function updateSuspensionDate($conn, $afm, $startDate, $endDate)
{
    $sql = "UPDATE employee ,users SET employee.inSuspension_startDate = ? ,employee.inSuspension_endDate = ?
            WHERE   users.username=employee.userName AND users.afm=? ;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../employer/employee-suspension/employee-suspension.inc.php?error=updateSuspensionDateFail");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ssi", $startDate, $endDate, $afm);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

function updatePermissionDate($conn, $afm, $startDate, $endDate)
{
    $sql = "UPDATE employee ,users SET employee.permission_startDate = ? ,employee.permission_endDate = ?
    WHERE   users.username=employee.userName AND users.afm=? ;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../employee/leave.php?error=updateSuspensionDateFail");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ssi", $startDate, $endDate, $afm);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

function updateProfile($conn, $firstname, $lastname, $username, $afm, $email)
{
    $sql = "UPDATE users SET firstname=?, lastname=?, username=?, afm=?, email=? WHERE username=?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../profile/profile.php?error=stmtFailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "sssiss", $firstname, $lastname, $username, $afm, $email, $_SESSION["username"]);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

function changePassword($conn, $username, $password)
{
    $sql = "UPDATE users SET password=? WHERE username=?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../profile/profile.php?error=stmtFailed");
        exit();
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ss", $hashedPassword, $username);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
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
        header("location: ../profile/signup.php?error=stmtfailed");
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
        header("location: ../profile/signup.php?error=stmtfailed");
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

function userDataSQL($conn, $username)
{
    $sql = "SELECT * FROM users WHERE username = ?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../profile/signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    $row = mysqli_fetch_assoc($resultData);
    mysqli_stmt_close($stmt);
    return $row;
}

function employeeDataSQL($conn, $username)
{
    $sql = "SELECT * FROM employee WHERE username = ?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../profile/signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    $row = mysqli_fetch_assoc($resultData);
    mysqli_stmt_close($stmt);
    return $row;
}

function createUser($conn, $firstname, $email, $lastname, $password, $afm, $username)
{
    $sql = "INSERT INTO users (firstname, lastname, username, email, password, afm)
            VALUES (?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../profile/signup.php?error=stmtfailed");
        exit();
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sssssi", $firstname, $lastname, $username, $email, $hashedPassword, $afm);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
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
    $sql = "SELECT us1.firstname , us1.lastname, us1.afm, us1.username
            FROM users us1,users us2 , employee
            WHERE (employee.userName = us1.username) AND (employee.employerAfm = us2.afm) AND (us2.afm=?);";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../profile/signup.php?error=stmtfailed");
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
        header("location: ../profile/login.php?error=wronglogin");
        exit();
    }

    $pwdHashed = $uidExists['password'];
    $checkPwd = password_verify($password, $pwdHashed);

    if ($checkPwd === false) {
        header("location: ../profile/login.php?error=wrongloginpwd");
        exit();
    } else if ($checkPwd === true) {
        session_start();

        $_SESSION["userid"] = $uidExists["id"];
        $_SESSION["username"] = $uidExists["username"];
        $_SESSION["firstname"] = $uidExists["firstname"];
        $_SESSION["lastname"] = $uidExists["lastname"];
        $_SESSION["employeesForEmployer"] = getEmployeesForEmployer($conn, $uidExists["afm"]);
        $_SESSION["usertype"] = $uidExists["isEmployer"];
        $_SESSION["afm"] = $uidExists["afm"];
        $_SESSION["email"] = $uidExists["email"];
        $_SESSION["password"] = $pwdHashed;
        // $_SESSION["userData"] = employeeDataSQL($conn, $_SESSION["username"]);

        if ($_SESSION["usertype"] == 0) {
            $_SESSION["employeeData"] = employeeDataSQL($conn, $_SESSION["username"]);
        }


        header("location: ../index.php");
        exit();
    }
}



function Hire($conn, $employerAfm, $emplyeeAfm)
{

    $sql = "update employee,users  SET employee.employerAfm = ?
    WHERE   users.username=employee.userName AND users.afm=? ;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../employee-suspension.php?error=dateFail");
        exit();
    }


    mysqli_stmt_bind_param($stmt, "ss", $employerAfm, $emplyeeAfm);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);


    header("location: ../employee-suspension.php?error=none");
    exit();
}

<?php
$firstname = "Sergio";
$lastname = "Araujo";
$username = "sergio";
$email = "sergio@gmail.com";
$password = "1q1q";
$afm = 191919191;

include_once 'includes/dbh.inc.php';

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

echo "allgood";

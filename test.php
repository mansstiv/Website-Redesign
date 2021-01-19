<?php
$firstname = "Sergio";
$lastname = "Araujo";
$username = "araujo11";
$email = "sergio@gmail.com";
$password = "1234";
$afm = 191919191;

include_once 'includes/dbh.inc.php';

$sql = "UPDATE users SET password=? WHERE username=?;";
$stmt = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: ../test.php?error=stmtFailed");
    exit();
}

// $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

mysqli_stmt_bind_param($stmt, "ss",  $password, $username);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);

echo "skataaaa";

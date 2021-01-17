<?php
$username = "eirinistiv";

include_once 'includes/dbh.inc.php';

$sql = "SELECT * FROM employee WHERE username = ?;";
$stmt = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: ../signup.php?error=stmtfailed");
    exit();
}

mysqli_stmt_bind_param($stmt, "s", $username);
mysqli_stmt_execute($stmt);

$resultData = mysqli_stmt_get_result($stmt);

$row = mysqli_fetch_assoc($resultData);
mysqli_stmt_close($stmt);

echo $row["userName"];

return $row;

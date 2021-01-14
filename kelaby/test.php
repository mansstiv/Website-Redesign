<?php

require_once 'includes/dbh.inc.php';


$employerAfm = 123456789;

$sql = "SELECT us1.firstname , us1.lastname
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

echo $results[0]["firstname"];

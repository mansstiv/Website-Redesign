<?php
$startDate = "30/03/2020";
$endDate = "30/03/2020";
$afm = "111700152";

include_once 'includes/dbh.inc.php';

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

echo "skata";

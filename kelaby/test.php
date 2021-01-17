<?php
$startDate = "10/01/2020";
$endDate = "10/05/2020";
$afm = 999999999;

include_once 'includes/dbh.inc.php';

$sql = "UPDATE employee ,users SET employee.inSuspension_startDate = ? ,employee.inSuspension_endDate = ?
        WHERE   users.username=employee.userName AND users.afm=? ;";
$stmt = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: employee-suspension-declare.inc.php?error=updateSuspensionDateFail");
    exit();
}

$correctStartDateFormat = date('Y-m-d', strtotime($startDate));
$correctEndDateFormat = date('Y-m-d', strtotime($endDate));

mysqli_stmt_bind_param($stmt, "ssi", $correctStartDateFormat, $correctEndDateFormat, $afm);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);

echo "all good";

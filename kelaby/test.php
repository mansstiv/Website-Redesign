<?php

require_once 'includes/dbh.inc.php';

// $employerid = 7;

// $sql = "SELECT * FROM employee WHERE employerid = ?";
// $stmt = mysqli_stmt_init($conn);

// if (!mysqli_stmt_prepare($stmt, $sql)) {
//     header("location: signup.php?error=stmtfailed");
//     exit();
// }

// mysqli_stmt_bind_param($stmt, "i", $employerid);
// mysqli_stmt_execute($stmt);

// $resultData = mysqli_stmt_get_result($stmt);

// echo $resultData;
// while ($row = mysqli_fetch_assoc($resultData)) {
//     echo $row["firstname"];
// }

// mysqli_stmt_close($stmt);



$sql = "SELECT * FROM employee;";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        echo " Name: " . $row["id"] . "<br>";
    }
} else {
    echo "0 results";
}

$conn->close();

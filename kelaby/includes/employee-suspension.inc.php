<?php

if (isset($_POST["submit"])) {
    $afm= $_POST["form-employee-suspension"];
    $startDate= $_POST["startRemoteDay"];
    $endDate= $_POST["endRemoteDay"];
    echo "babhs";
    echo $afm;
    echo $startDate;
    echo $endDate;
    echo "babhs";
    
    
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';
    if (emptyInputDate ($afm,$startDate,$endDate)!==false  )
    {
        header("location: ../login.php?error=emptyDateData");
        exit();
    }
    updateSuspensionDate($conn,$afm,$startDate,$endDate);
    


    }
    
    else {
        header("location: ../login.php");
        exit();
    }

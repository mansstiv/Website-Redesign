<?php

if (isset($_POST["submit"])) {
    echo $_POST["form-employee-suspension"];
    echo $_POST["startRemoteDay"];
    echo $_POST["endRemoteDay"];
}

require_once 'dbh.inc.php';
require_once 'functions.inc.php';

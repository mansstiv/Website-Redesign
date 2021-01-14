<?php
include_once 'header.php' // Include header of page
?>

<head>
    <title>Δήλωση εξ αποστάσεως εργασίας για εργαζόμενο | Υπουργείο Εργασίας & Κοινωνικών Υποθέσεων</title>
</head>


<div class="bgded" style="background:white;">
    <div id="breadcrumb" class="hoc clear">
        <h6 class="heading font-x3">Δήλωση εξ αποστάσεως εργασίας για εργαζόμενο</h6>
        <ul>
            <li><a style="color: #1c7aa8;" class="hyperlink" href="index.php">ΑΡΧΙΚΗ</a></li>
            <li><span>&#47;</span> </li>
            <li>
                <p style="color: #363636;">Δηλωση εξ αποστασεως εργασιας για εργαζομενο</p>
            </li>
        </ul>
    </div>
</div>


<div class="wrapper row3">
    <main class="hoc mycontainer clear">

        <?php
        if (!isset($_SESSION["username"])) {
            echo "<p>Πρέπει να <a class='hyperlink' href='login.php'>συνδεθείς</a> πρώτα για να προχωρήσεις στην δήλωση !</p>";
        } else {
            $countries = array();
            $countries['AF'] = 'Afghanistan';
            $countries['AL'] = 'Albania';
            $countries['DZ'] = 'Algeria';
            $countries['AS'] = 'American Samoa';
            $countries['AD'] = 'Andorra';
            $countries['AO'] = 'Angola';

            // echo $_SESSION["employeesForEmployer"][0]["firstname"];

            echo "<select>";


            foreach ($countries as $id => $name)
                echo "<option value=\"$id\">$name</option>";

            echo "</select>";
        }
        ?>


        <div class="clear btmspace-50"></div>
    </main>
</div>

<?php
include_once 'footer.php' // Include footer of page
?>
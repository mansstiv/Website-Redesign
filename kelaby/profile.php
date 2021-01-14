<?php
include_once 'header.php' // Include header of page
?>

<head>
    <title>ΠΡΟΦΙΛ | Υπουργείο Εργασίας & Κοινωνικών Υποθέσεων</title>
</head>


<div class="bgded" style="background:white;">
    <div id="breadcrumb" class="hoc clear">
        <h6 class="heading font-x3">ΠΡΟΦΙΛ</h6>
        <ul>
            <li><a style="color: #1c7aa8;" class="hyperlink" href="index.php">ΑΡΧΙΚΗ</a></li>
            <li><span>&#47;</span> </li>
            <li>
                <p style="color: #363636;">ΠΡΟΦΙΛ</p>
            </li>
        </ul>
    </div>
</div>


<div class="wrapper row3">
    <main class="hoc mycontainer clear">
        <?php
        echo "<h6 class='heading font-x3'>Γεια σου " . $_SESSION["firstname"] . " " . $_SESSION["lastname"] . " !!!</h6>";
        ?>
        <div class="clear btmspace-50"></div>
    </main>
</div>


<?php
include_once 'footer.php' // Include footer of page
?>
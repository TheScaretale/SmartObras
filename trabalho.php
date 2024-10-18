<?php
include "navbar.php";
?>
<?php
    if($_SESSION["userType"] == "P"){
?>
<div class="container mt-5" id="jobDetails">
<?php } else { ?>
<div class="container mt-5" id="jobDetailsClient">
    
</div>
<?php } ?>

<?php
include "footer.php";
?>

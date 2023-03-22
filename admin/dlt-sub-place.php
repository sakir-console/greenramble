<?php require_once('chk.php'); ?>
<?php

$sp_id = $_REQUEST['subp'];


if (isset($sp_id)) {


    $dlt = "DELETE FROM submit_place WHERE id = '$sp_id'";
    $run = mysqli_query($cn, $dlt);
    if ($run) {
        header("location:sub-place.php?dlt=true");
        $msg = "<b style='color:green'>Successfully Deleted.</b>";
    } else {

        echo mysqli_connect_error();
    }
} ?>
<?php require_once('chk.php'); ?>
<?php

$sv_id = $_REQUEST['subv'];


if (isset($sv_id)) {


    $dlt = "DELETE FROM submit_vdo WHERE id = '$sv_id'";
    $run = mysqli_query($cn, $dlt);
    if ($run) {
        header("location:sub-vdo.php?dlt=true");
        $msg = "<b style='color:green'>Successfully Deleted.</b>";
    } else {

        echo mysqli_connect_error();
    }
} ?>
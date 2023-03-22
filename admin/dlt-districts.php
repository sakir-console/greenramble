<?php require_once('chk.php'); ?>
<?php

$dis_id = $_REQUEST['dis'];


if (isset($dis_id)) {


    $dlt = "DELETE FROM loc_districts WHERE id = '$dis_id'";
    $run = mysqli_query($cn, $dlt);
    if ($run) {
        header("location:districts.php?dlt=true");
        $msg = "<b style='color:green'>Successfully Deleted.</b>";
    } else {

        echo mysqli_connect_error();
    }
} ?>
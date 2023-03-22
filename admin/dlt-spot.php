<?php require_once('chk.php'); ?>
<?php

$spot_id = $_REQUEST['sptid'];


if (isset($spot_id)) {


    $dlt = "DELETE FROM tour_place WHERE id = '$spot_id'";
    $run = mysqli_query($cn, $dlt);
    if ($run) {
        header("location:spotlist.php?dlt=true");
        $msg = "<b style='color:green'>Successfully Deleted.</b>";
    } else {

        echo mysqli_connect_error();
    }
} ?>
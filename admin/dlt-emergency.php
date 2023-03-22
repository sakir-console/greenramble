<?php require_once('chk.php'); ?>
<?php

$emr_id=$_REQUEST['emrID'];


if (isset($emr_id)) {

   
        $dlt = "DELETE FROM emergency WHERE id='$emr_id'";
        $run = mysqli_query($cn, $dlt);
        if ($run) {
                  header("location:emergency.php?dlt=true");
            $msg = "<b style='color:green'>Successfully Deleted.</b>";
        } else {

            echo mysqli_connect_error();
        }

        
}




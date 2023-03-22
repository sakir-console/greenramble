<?php require_once('chk.php'); ?>
<?php

$hos_id=$_REQUEST['hosID'];


if (isset($hos_id)) {

   
        $dlt = "DELETE FROM hospitals WHERE id='$hos_id'";
        $run = mysqli_query($cn, $dlt);
        if ($run) {
                  header("location:hospitals.php?dlt=true");
            $msg = "<b style='color:green'>Successfully Deleted.</b>";
        } else {

            echo mysqli_connect_error();
        }

        
}




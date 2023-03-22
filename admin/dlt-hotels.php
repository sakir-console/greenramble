<?php require_once('chk.php'); ?>
<?php

$h_id=$_REQUEST['hID'];


if (isset($h_id)) {

   
        $dlt = "DELETE FROM hotels WHERE id='$h_id'";
        $run = mysqli_query($cn, $dlt);
        if ($run) {
                  header("location:hotels.php?dlt=true");
            $msg = "<b style='color:green'>Successfully Deleted.</b>";
        } else {

            echo mysqli_connect_error();
        }

        
}




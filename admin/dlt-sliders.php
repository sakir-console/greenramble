<?php require_once('chk.php'); ?>
<?php

$sli_id=$_REQUEST['id'];


if (isset($sli_id)) {

   
        $dlt = "DELETE FROM slider WHERE id='$sli_id'";
        $run = mysqli_query($cn, $dlt);
        if ($run) {
                  header("location:slider.php?dlt=true");
           $msg= "<b style='color:green'>Successfully Deleted.</b>";
        } else {

            echo mysqli_connect_error();
        }

        
}?>


jkl




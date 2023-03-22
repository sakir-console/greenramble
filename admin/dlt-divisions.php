<?php require_once('chk.php'); ?>
<?php

$div_id=$_REQUEST['div'];


if (isset($div_id)) {

   
        $dlt = "DELETE FROM loc_divisions WHERE id='$div_id'";
        $run = mysqli_query($cn, $dlt);
        if ($run) {
                  header("location:divisions.php?dlt=true");
            $msg = "<b style='color:green'>Successfully Deleted.</b>";
        } else {

            echo mysqli_connect_error();
        }

        
}




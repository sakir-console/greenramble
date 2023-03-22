<?php require_once('../core/dbcon.php'); ?>

<?php


if (isset($_REQUEST['popu'])) {
    $popid = $_REQUEST['popID'];
    $pop = $_REQUEST['popu'];
    $update = "UPDATE tour_place SET popularity='$pop' WHERE id='$popid'";
    $run = mysqli_query($cn, $update);
    if ($run) {

        echo "Successfully Updated Popularity.";
    } else {

        echo mysqli_connect_error();
    }
}
?>
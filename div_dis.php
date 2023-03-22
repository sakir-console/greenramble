<?php require_once('core/db_ln.php'); ?>
<?php
if (isset($_POST["div_id"])) {
    //Get all state data
    $div_id = $_POST['div_id'];
    $query = "SELECT * FROM loc_districts WHERE div_id = '$div_id'";
    $run_query = mysqli_query($cn, $query);

    //Count total number of rows
    $count = mysqli_num_rows($run_query);

    //Display states list
    if ($count > 0) {
        echo "<option value=''>" . $lng['select_district'] . "</option>";
        while ($row = mysqli_fetch_array($run_query)) {
            $state_id = $row['id'];
            $state_name = $row[$ln.'_name'];
            echo "<option value='$state_id'>$state_name</option>";
        }
    } else {
        echo '<option value="">No District Added yet.</option>';
    }
}


?>
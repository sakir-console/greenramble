<?php require_once('../core/dbcon.php'); ?>
<script src="assets/jq.js"></script>

<?php $query = "SELECT * FROM loc_divisions";
$run_query = mysqli_query($cn, $query);
//Count total number of rows
$count = mysqli_num_rows($run_query);

?>
<select name="divisions" id="divisions">
    <option value="">Select Division</option>
    <?php
    if ($count > 0) {
        while ($row = mysqli_fetch_array($run_query)) {
            $country_id = $row['id'];
            $country_name = $row['bn_name'];
            echo "<option value='$country_id'>$country_name</option>";
        }
    } else {
        echo '<option value="">Country not available</option>';
    }
    ?>
</select><br><br>
<select name="districts" id="districts">
    <option value="">Select Division first</option>
</select>


<script>
$(document).ready(function() {
    $("#divisions").on("change", function() {
        var divID = $(this).val();
        if (divID) {

            $.post('out.php', {
                div_id: divID
            }, function(result) {

                $("#districts").html(result);
            });
        } else {
            $('#divisions').html('<option value="">Select Division first</option>');;
        }

    });



});
</script>
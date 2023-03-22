<div class='container'>
    <div class="search-container type2">
        <div class="dt-sc-tabs-container">
            <ul class="dt-sc-tabs-frame">
                <li><a href="#"><?php echo $lng['tour_place']; ?></a></li>
                <li><a href="#"><?php echo $lng['hotel']; ?></a></li>
                <li><a href="#"><?php echo $lng['hospital']; ?></a></li>
                <li><a href="#"><?php echo $lng['emergency']; ?></a></li>
            </ul>


            <div class="dt-sc-tabs-frame-content">

                <form name="tour-place-search" action="tour-places.php" method="GET">

                    <?php $query = "SELECT * FROM loc_divisions";
                    $run_query = mysqli_query($cn, $query);
                    //Count total number of rows
                    $count = mysqli_num_rows($run_query);

                    ?>

                    <p style="">
                        <select id="divisions_tp" name="division_tp_id">
                            <option value=""><?php echo $lng['select_division']; ?></option>
                            <?php
                            if ($count > 0) {
                                while ($row = mysqli_fetch_array($run_query)) {
                                    $div_id = $row['id'];
                                    $div_name = $row[$ln . '_name'];
                                    echo "<option value='$div_id'>$div_name</option>";
                                }
                            } else {
                                echo '<option value="">Division not available</option>';
                            }
                            ?>
                        </select>
                    </p>

                    <p style="">
                        <select id="districts_tp" name="district_tp_id" class="form-control show-tick">
                            <option value=""><?php echo $lng['select_division_first']; ?></option>
                        </select>
                    </p>


                    <input name="find_tp" type="submit" value="<?php echo $lng['find_tour_place']; ?>" />
                </form>
            </div>

            <div class="dt-sc-tabs-frame-content">

                <form name="frmplacesearch" action="hotel-list.php" method="get">

                    <?php $query = "SELECT * FROM loc_divisions";
                    $run_query = mysqli_query($cn, $query);
                    //Count total number of rows
                    $count = mysqli_num_rows($run_query);

                    ?>

                    <p style="width: 34%">
                        <select id="divisions_ho" name="division_tp_id">
                            <option value=""><?php echo $lng['select_division']; ?></option>
                            <?php
                            if ($count > 0) {
                                while ($row = mysqli_fetch_array($run_query)) {
                                    $div_id = $row['id'];
                                    $div_name = $row['bn_name'];
                                    echo "<option value='$div_id'>$div_name</option>";
                                }
                            } else {
                                echo '<option value="">Division not available</option>';
                            }
                            ?>
                        </select>
                    </p>

                    <p style="width: 34%">
                        <select name="district_tp_id" id="districts_ho" class="form-control show-tick">
                            <option value=""><?php echo $lng['select_division_first']; ?></option>
                        </select>
                    </p>


                    <input name="find_ho" type="submit" value="<?php echo $lng['find_hotel']; ?>" />
                </form>
            </div>

            <div class="dt-sc-tabs-frame-content">

                <form name="frmplacesearch" action="hospital-list.php" method="get">

                    <?php $query = "SELECT * FROM loc_divisions";
                    $run_query = mysqli_query($cn, $query);
                    //Count total number of rows
                    $count = mysqli_num_rows($run_query);

                    ?>

                    <p style="width: 34%">
                        <select id="divisions_hos" name="division_tp_id">
                            <option value=""><?php echo $lng['select_division']; ?></option>
                            <?php
                            if ($count > 0) {
                                while ($row = mysqli_fetch_array($run_query)) {
                                    $div_id = $row['id'];
                                    $div_name = $row['bn_name'];
                                    echo "<option value='$div_id'>$div_name</option>";
                                }
                            } else {
                                echo '<option value="">Division not available</option>';
                            }
                            ?>
                        </select>
                    </p>

                    <p style="width: 34%">
                        <select name="district_tp_id" id="districts_hos" class="form-control show-tick">
                            <option value=""><?php echo $lng['select_division_first']; ?></option>
                        </select>
                    </p>


                    <input name="find_hos" type="submit" value="<?php echo $lng['find_hospital']; ?>" />
                </form>
            </div>

            <div class="dt-sc-tabs-frame-content">

                <form name="frmplacesearch" action="emergency-list.php" method="get">

                    <?php $query = "SELECT * FROM loc_divisions";
                    $run_query = mysqli_query($cn, $query);
                    //Count total number of rows
                    $count = mysqli_num_rows($run_query);

                    ?>

                    <p style="width: 34%">
                        <select id="divisions_emr" name="division_tp_id">
                            <option value=""><?php echo $lng['select_division']; ?></option>
                            <?php
                            if ($count > 0) {
                                while ($row = mysqli_fetch_array($run_query)) {
                                    $div_id = $row['id'];
                                    $div_name = $row['bn_name'];
                                    echo "<option value='$div_id'>$div_name</option>";
                                }
                            } else {
                                echo '<option value="">Division not available</option>';
                            }
                            ?>
                        </select>
                    </p>

                    <p style="width: 34%">
                        <select name="district_tp_id" id="districts_emr" class="form-control show-tick">
                            <option value=""><?php echo $lng['select_division_first']; ?></option>
                        </select>
                    </p>


                    <input name="find_emr" type="submit" value="<?php echo $lng['find_emergency']; ?>" />
                </form>
            </div>


        </div>
    </div>
</div>



<script>
$(document).ready(function() {
    $("#divisions_tp,#divisions_ho,#divisions_hos,#divisions_emr").on("change", function() {
        var divID = $(this).val();
        // alert('fond div');

        if (divID) {
            //alert('fond div');
            $.post('div_dis.php', {
                div_id: divID
            }, function(result) {

                $("#districts_tp,#districts_ho,#districts_hos,#districts_emr").html(result);
            });
        } else {
            $('#divisions').html('<option value="">Select Division first</option>');;
        }

    });



});
</script>
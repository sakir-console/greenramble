   <div class="col-sm-8 col-md-9">
       <div class="sort-by-section clearfix">
           <div class="row">

               <form action="" method="GET">
                   <div class="form-group col-sm-6 col-md-4" style="margin: 16px;">
                       <label>
                           <?php echo $lng['division']; ?>

                       </label>


                       <div class="selector">
                           <select id="divisions_tp" name="division_tp_id" class="full-width">





                               <?php if (isset($_REQUEST['division_tp_id']) or $_REQUEST['district_tp_id']) {
                                    $divid = mysqli_real_escape_string($cn, $_REQUEST['division_tp_id']);

                                    if (isset($_REQUEST['district_tp_id'])) {
                                        $disid = mysqli_real_escape_string($cn, $_REQUEST['district_tp_id']);
                                    }
                                }
                                ?>


                               <?php


                                $view = "SELECT * FROM loc_divisions WHERE id='$divid'";


                                $run = mysqli_query($cn, $view);
                                while ($data = mysqli_fetch_array($run)) {

                                ?>
                               <option value="<?php echo $data['id']; ?>" disabled selected>
                                   <?php echo $data[$ln . '_name']; ?></option>
                               <?php } ?>




                               <?php $query = "SELECT * FROM loc_divisions";
                                $run_query = mysqli_query($cn, $query);
                                //Count total number of rows
                                $count = mysqli_num_rows($run_query);


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
                       </div>


                   </div>

                   <div class="form-group col-sm-6 col-md-4" style="margin: 16px;">
                       <label><?php echo $lng['district']; ?></label>
                       <div class="selector">
                           <select name="district_tp_id" id="districts_tp" class="form-control show-tick"
                               class="full-width">


                               <option value=""><?php echo $lng['select_division_first']; ?></option>
                               <?php


                                $view = "SELECT * FROM loc_districts WHERE id='$disid'";


                                $run = mysqli_query($cn, $view);
                                while ($data = mysqli_fetch_array($run)) {

                                ?>
                               <option value="<?php echo $data['id']; ?>" selected>
                                   <?php echo $data[$ln . '_name']; ?></option>
                               <?php } ?>



                           </select>
                       </div>
                   </div>
                   <div class="col-sm-6 col-md-3" style="margin-top: 38px;">
                       <button type="submit" class="full-width"><?php echo $lng['find']; ?></button>
                   </div>
               </form>


               <?php if (isset($_REQUEST['division_tp_id']) and isset($_REQUEST['district_tp_id'])) {
                    $divid = mysqli_real_escape_string($cn, $_REQUEST['division_tp_id']);
                    $disid = mysqli_real_escape_string($cn, $_REQUEST['district_tp_id']);

                    $view = "SELECT * FROM hospitals WHERE div_id='$divid' AND dis_id='$disid'";
                    $run = mysqli_query($cn, $view);
                    while ($data = mysqli_fetch_array($run)) {

                ?>
               <div class="form-group col-sm-6 col-md-4"
                   style="border: 1px solid #ffc19536;border-radius: 4px;padding: 10px;background: #fff5c647;color: #6e6a6a;margin-left: 30px;width: 94%;">




                   <?php echo $data['info_' . $ln]; ?>

               </div>
               <?php }
                } else {

                    echo '  <div class="form-group col-sm-6 col-md-4"
                    style="border: 1px solid #ffc19536;border-radius: 4px;padding: 10px;background: #fff5c647;color: #6e6a6a;margin-left: 30px;width: 94%;">
 Please Select  Division and District.  </div>';
                }
                ?>

           </div>
       </div>







       <div class="hotel-list">
           <div class="row image-box hotel listing-style1" id="placelist">


               <div class="col-sm-6 col-md-4">
                   Powered By: District Guide
               </div>



           </div>
       </div>





   </div>



   <script>
$(document).ready(function() {
    $("#divisions_tp").on("change", function() {
        var divID = $(this).val();
        // alert('fond div');

        if (divID) {
            //alert('fond div');
            $.post('div_dis.php', {
                div_id: divID
            }, function(result) {

                $("#districts_tp").html(result);
            });
        } else {
            $('#divisions').html('<option value="">Select Division first</option>');;
        }

    });



});
   </script>
   <div class="col-sm-8 col-md-9">
       <div class="sort-by-section clearfix">
           <div class="row">

               <form action="" method="POST">
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

               <div class="form-group col-sm-6 col-md-4"
                   style="border: 1px solid #ffc19536;border-radius: 4px;padding: 10px;background: #fff5c647;color: #6e6a6a;margin-left: 30px;width: 94%;">

                   <?php

                    if (empty($disid)) {

                        $qu = "SELECT {$ln}_intro FROM loc_divisions WHERE id='$divid'";
                        $run = mysqli_query($cn, $qu);
                        while ($data = mysqli_fetch_array($run)) {

                            echo $data[$ln . '_intro'];
                        }
                    } else {
                        $qu = "SELECT {$ln}_intro FROM loc_districts WHERE id='$disid'";
                        $run = mysqli_query($cn, $qu);
                        while ($data = mysqli_fetch_array($run)) {

                            echo $data[$ln . '_intro'];
                        }
                    }

                    ?>






               </div>
           </div>
       </div>





       <?php if (isset($_REQUEST['division_tp_id']) or $_REQUEST['district_tp_id']) {
            $div_id = mysqli_real_escape_string($cn, $_REQUEST['division_tp_id']);

            if (isset($_REQUEST['district_tp_id'])) {
                $dis_id = mysqli_real_escape_string($cn, $_REQUEST['district_tp_id']);
            }

        ?>


       <div class="hotel-list">
           <div class="row image-box hotel listing-style1" id="placelist">


               <?php

                    $optional = "";
                    if (!empty($_REQUEST['district_tp_id'])) {
                        $optional = " AND dis_id='$dis_id'";
                    }
                    $query = "SELECT 
                          tour_place.id AS tID,
                          tour_place.{$ln}_title AS Title,
                          tour_place.{$ln}_s_des AS Descri,
                          tour_place.pic1 AS pic1,
                          tour_place.views AS views,
                          tour_place.div_id AS divID,
                          tour_place.dis_id AS disID
                          FROM tour_place 
                          WHERE (div_id='$div_id'{$optional})
                          ORDER BY tID DESC
                          LIMIT 9";
                    $run = mysqli_query($cn, $query);
                    while ($data = mysqli_fetch_array($run)) {


                    ?>
               <div class="col-sm-6 col-md-4">
                   <article class="box">
                       <figure>
                           <a href="" class="hover-effect popup-gallery"><img width="270px" height="161px" alt=""
                                   src="admin/uploads/tour-places/<?php echo $data['pic1']; ?>"></a>
                       </figure>
                       <div class="details">

                           <h4 class="box-title"><?php echo $data['Title']; ?></h4>
                           <div class="feedback">
                               <div data-placement="bottom" data-toggle="tooltip" class="five-stars-container"
                                   title="4 stars"><span style="width: 80%;" class="five-stars"></span></div>
                               <span class="review"><?php echo $lng['seen']; ?>: <?php echo $data['views']; ?>
                               </span>
                           </div>
                           <p class="description" style="height: 103px;overflow: hidden;"><?php echo $data['Descri']; ?>
                           </p>
                           <div class="action">

                               <a class="button btn-small yellow"
                                   href="details.php?tpid=<?php echo $data['tID']; ?>"><?php echo $lng['details_view']; ?></a>
                           </div>
                       </div>
                   </article>
               </div>

               <?php $last = $data['tID']; ?>

               <?php } ?>
           </div>
       </div>
       <a class="uppercase full-width button btn-large" id="more"
           data-id="<?php echo $last; ?>"><?php echo $lng['load_more']; ?></a>




       <?php } ?>

   </div>



   <script>
$(document).ready(function() {

    $(document).on('click', '#more', function() {
        //alert('found');
        var lastId = $(this).data('id');
        $('#more').html('Loading');
        $.post('more-places.php', {
            lastid: lastId,
            division_tp_id: <?php echo $div_id; ?>,
            <?php echo $dis_id ? 'district_tp_id: ' . $dis_id : ''; ?>
        }, function(data) {
            if (data != '') {
                $('#more').remove();
                $('#placelist').append(data);
                //alert(data);
            } else {

                $('#more').remove();
                $('#placelist').append(' <h2>No Reviews</h2>');

            }


        });



    });



});
   </script>



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
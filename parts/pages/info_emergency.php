   <div class="tab-pane fade" id="hotel-faqs">
       <h2>Emergency</h2>


       <div class="col-sm-6 col-md-4 no-float">
           <div class="guest-review table-wrapper">

               <?php
                if (isset($_REQUEST['tpid'])) {
                    $getID = $_REQUEST['tpid'];
                    $tpID = mysqli_real_escape_string($cn, $getID);


                    $view = "SELECT 
    tour_place.id AS tID,
    tour_place.dis_id AS disID,
    emergency.info_{$ln} AS emer
    
    FROM tour_place
    INNER JOIN emergency
              ON tour_place.dis_id= emergency.dis_id
   
    WHERE tour_place.id='$tpID' 
   ";
                    $run = mysqli_query($cn, $view);
                    while ($data = mysqli_fetch_array($run)) {
                ?>







               <?php if ($data['emer'] != '') { ?>


               <div class="col-sm-7 col-lg-8 table-cell testimonials">
                   <div class="comment-header clearfix" style="margin-top:12px">
                       <h4 class="comment-title"><?php echo $data['emer']; ?></h4>

                   </div>

               </div>

               <?php } else {
                            echo 'No Hotels Added.';
                        } ?>









               <?php }
                } else {
                    echo 'Thankyou';
                }
                ?>
           </div>
       </div>

















   </div>
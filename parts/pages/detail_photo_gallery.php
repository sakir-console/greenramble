<?php
if (isset($_REQUEST['tpid'])) {
    $getID = $_REQUEST['tpid'];
    $tpID = mysqli_real_escape_string($cn, $getID);


    $view = "SELECT 
                tour_place.pic1 AS pic1,
                tour_place.pic2 AS pic2,
                tour_place.pic3 AS pic3
                FROM tour_place
                WHERE id='$tpID' 
                   ";
    $run = mysqli_query($cn, $view);
    while ($data = mysqli_fetch_array($run)) {
?>





<div id="photos-tab" class="tab-pane fade in active">
    <div class="photo-gallery style2" data-animation="slide" data-sync="#photos-tab .image-carousel">
        <ul class="slides">
            <li><img src="admin/uploads/tour-places/<?php echo $data['pic1']; ?>" height="420px" width="100%" /></li>
            <li><img src="admin/uploads/tour-places/<?php echo $data['pic2']; ?>" height="420px" width="100%" /></li>
            
          <?php  if($data['pic3']!=''){?>
            <li><img src="admin/uploads/tour-places/<?php echo $data['pic3']; ?>" height="420px" width="100%" /></li>
            
          <?php  }?>

        </ul>
    </div>

</div>


<?php }
} else {
    echo 'Thankyou';
}
?>
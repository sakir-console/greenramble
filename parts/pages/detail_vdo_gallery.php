<?php
if (isset($_REQUEST['tpid'])) {
    $getID = $_REQUEST['tpid'];
    $tpID = mysqli_real_escape_string($cn, $getID);


    $view = "SELECT 
                tour_place.vid_title1 AS vt1,
                tour_place.vid_title2 AS vt2,
                tour_place.vid_url1 AS vu1,
                tour_place.vid_url2 AS vu2
                FROM tour_place
                WHERE id='$tpID' 
                   ";
    $run = mysqli_query($cn, $view);
    while ($data = mysqli_fetch_array($run)) {
?>


<div id="vdo-tab" class="tab-pane fade">
    <div class="col-sm-6 col-md-4 no-float">
        <?php if ($data['vu1'] != '') { ?>

        <div class="guest-review table-wrapper">
            <div class=" col-md-5 author table-cell">
                <iframe width="600" height="322" src="<?php echo $data['vu1']; ?>" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
            </div>
            <div class="col-sm-7 col-lg-8 table-cell testimonials">
                <div class="comment-header clearfix" style="margin-top:127px">
                    <h4 class="comment-title"><?php echo $data['vt1']; ?></h4>

                </div>

            </div>
        </div>
        <?php } ?>

        <?php
                if ($data['vu2'] != '') { ?>
        <div class="guest-review table-wrapper">
            <div class=" col-md-5 author table-cell">
                <iframe width="600" height="322" src="<?php echo $data['vu2']; ?>" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
            </div>
            <div class="col-sm-7 col-lg-8 table-cell testimonials">
                <div class="comment-header clearfix" style="margin-top:127px">
                    <h4 class="comment-title"><?php echo $data['vt2']; ?></h4>

                </div>

            </div>
        </div>
        <?php   } ?>






    </div>
</div>



<?php }
} else {
    echo 'Thankyou';
}
?>
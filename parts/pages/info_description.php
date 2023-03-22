<div class="tab-pane fade in active" id="hotel-description">
    <?php
    if (isset($_REQUEST['tpid'])) {
        $getID = $_REQUEST['tpid'];
        $tpID = mysqli_real_escape_string($cn, $getID);


        $view = "SELECT 
                    tour_place.id AS tID,
                    tour_place.{$ln}_title AS Title,
                    tour_place.{$ln}_des AS Descri,
                    tour_place.{$ln}_s_des AS sDes,
                    tour_place.pic1 AS pic1,
                    tour_place.views AS views,
                    tour_place.div_id AS divID,
                    tour_place.dis_id AS disID,
                    tour_place.popularity AS popular,
    
                    loc_divisions.{$ln}_name AS divName,
                    loc_districts.{$ln}_name AS disName,
                    COUNT(review.title) AS cnt
                    FROM tour_place
                    INNER JOIN loc_divisions
                              ON tour_place.div_id= loc_divisions.id
                    INNER JOIN loc_districts
                              ON tour_place.dis_id= loc_districts.id
                    INNER JOIN review
                              ON tour_place.id= review.tour_place_id
                    WHERE tour_place.id='$tpID' 
                   
                       
                        ";
        $run = mysqli_query($cn, $view);
        $sqlCount = "UPDATE tour_place SET views = views+1 WHERE id = '$tpID'";
        $runCount = mysqli_query($cn, $sqlCount);
        while ($data = mysqli_fetch_array($run)) {


    ?>







    <?php if ($data['Descri'] != '') { ?>




    <div class="intro table-wrapper full-width hidden-table-sms">
        <div class="col-sm-5 col-lg-4 features table-cell">
            <ul style=" font-family: Hind Siliguri;font-size: 17px;color: #2393a5;">
                <li><label><?php echo $lng['seen']; ?>:</label><?php echo $data['views']; ?> বার</li>
                <li><label><?php echo $lng['review']; ?>:</label><?php echo $data['cnt']; ?> বার</li>

                <li><label><?php echo $lng['district']; ?>:</label><?php echo $data['disName']; ?> </li>
                <li><label><?php echo $lng['division']; ?>:</label><?php echo $data['divName']; ?> </li>

            </ul>
        </div>
        <div class="col-sm-7 col-lg-8 table-cell testimonials">
            <div class="testimonial style1">
                <ul class="slides ">
                    <li>
                        <p class="description"><?php echo $data['sDes']; ?> .</p>
                        <div class="author clearfix">
                            <a href="#"><img src="images/icob.png" alt="" width="74" height="74" /></a>
                            <h5 class="name"> জেলাগাইড<small>সর্ব বৃহৎ ভ্রমন গাইড বিষয়ক সাইট</small></h5>
                        </div>
                    </li>
                    <li>
                        <p class="description">Ad Place</p>
                        <div class="author clearfix">
                            <a href="#"><img src="images/icob.png" alt="" width="74" height="74" /></a>
                            <h5 class="name"> জেলাগাইড<small>সর্ব বৃহৎ ভ্রমন গাইড বিষয়ক সাইট</small></h5>
                        </div>
                    </li>

                </ul>
            </div>
        </div>
    </div>
    <div class="long-description">
        <h2 style=" font-family: Hind Siliguri;font-size: 20px;color:#1c6e6e">বিস্তারিত বর্ণণাঃ</h2>
        <p><?php echo $data['Descri']; ?>
        </p>
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
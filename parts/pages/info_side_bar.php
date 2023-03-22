    <div class="sidebar col-md-3">
        <article class="detailed-logo">
            <figure>
                <img width="114" height="85" src="assets/images/android.png" alt="">
            </figure>
            <div class="details">
                <h2 class="box-title" style=" font-family: Hind Siliguri;font-size: 18px;text-align: center;">
                    <?php echo $lng['dg_app']; ?> <small><span class="fourty-space">Google PlayStore</span></small></h2>
                <span class="price clearfix">
                    <small class="pull-left"> <?php echo $lng['total_download']; ?></small>
                    <span class="pull-right">620</span>
                </span>

                <p class="description"><?php echo $lng['on_dg_app']; ?></p>
                <a class="button yellow full-width uppercase btn-small"
                    style=" font-family: Hind Siliguri;font-size: 16px;"><?php echo $lng['download_now']; ?></a>
            </div>
        </article>
        <div class="travelo-box contact-box">
            <h4 style=" font-family: Hind Siliguri;font-size: 18px;color: #2393a5;">
                <?php echo $lng['want_direct_book']; ?></h4>
            <p><?php echo $lng['direct_book_info']; ?></p>
            <address class="contact-details">
                <span class="contact-phone"><i class="soap-icon-phone"></i>+88 01703-111117</span>
                <br>
                <a class="contact-email" href="#">book@greenramble.com</a>
            </address>
        </div>
        <div class="travelo-box">
            <h4 style=" font-family: Hind Siliguri;font-size: 20px;color: #2393a5;">
                <?php echo $lng['more_tour_place']; ?>
            </h4>
            <div class="image-box style14">

                <?php


                $view = "SELECT 
                tour_place.id AS tID,
                tour_place.{$ln}_title AS Title,
                tour_place.{$ln}_s_des AS Descri,
                tour_place.pic1 AS pic1,
                tour_place.views AS views,
                tour_place.div_id AS divID,
                tour_place.dis_id AS disID,
                tour_place.popularity AS popular,

                loc_divisions.{$ln}_name AS divName,
                loc_districts.{$ln}_name AS disName
                FROM tour_place
                INNER JOIN loc_divisions
                          ON tour_place.div_id= loc_divisions.id
                INNER JOIN loc_districts
                          ON tour_place.dis_id= loc_districts.id
                
                ORDER BY RAND()
                LIMIT 5      
                    ";


                $runCount = mysqli_query($cn, $sqlCount);


                $run = mysqli_query($cn, $view);
                while ($data = mysqli_fetch_array($run)) {


                ?>

                <article class="box">
                    <figure>
                        <a href="#"><img src="admin/uploads/tour-places/<?php echo $data['pic1']; ?>"
                                height="51px" /></a>
                    </figure>
                    <div class="details">
                        <h5 class="box-title" style=" font-family: Hind Siliguri;font-size: 15px;color: #2393a5;"><a
                                href="details.php?tpid=<?php echo $data['tID']; ?>"><?php echo $data['Title']; ?></a>
                        </h5>
                        <label class="price-wrapper">
                            <span class="price-per-unit"><?php echo $data['disName']; ?></span>
                        </label>
                    </div>
                </article>


                <?php }
                ?>
            </div>
        </div>
        <div class="travelo-box book-with-us-box">
            <h4>Ads Place here</h4>

        </div>

    </div>
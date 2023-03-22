   <footer id="footer">
       <div class="footer-wrapper" style="padding: 0;">
           <div class="container">
               <div class="row">
                   <div class="col-sm-6 col-md-3">
                       <h2 style="font-family: Hind Siliguri;font-size: 20px;"> <?php echo $lng['necessary_links']; ?>
                       </h2>
                       <ul class="discover triangle hover row" style="font-family: Hind Siliguri;font-size: 13px;">
                           <li class="col-xs-6" style="font-family: Hind Siliguri;font-size: 13px;"><a href="#">স্থান
                                   যুক্ত করুন</a></li>
                           <li class="col-xs-6"><a href="#">বিভাগ ভিত্তিক ভ্রমন</a></li>
                           <li class="col-xs-6"><a href="#">জেলা ভিত্তিক ভ্রমন</a></li>
                           <li class="col-xs-6"><a href="#">ভ্রমণের জায়গা</a></li>
                           <li class="active col-xs-6"><a href="#">ভ্রমণের ছবি</a></li>
                           <li class="col-xs-6"><a href="#">ভ্রমণ সতর্কতা</a></li>
                           <li class="col-xs-6"><a href="#">ভ্রমণ টিপস</a></li>
                           <li class="col-xs-6"><a href="#">ভ্রমণের ভিডিও</a></li>
                           <li class="col-xs-6"><a href="#">ভ্রমণ ফটোগ্রাফি</a></li>
                           <li class="col-xs-6"><a href="#">হোটেল বুকিং</a></li>

                       </ul>
                   </div>
                   <div class="col-sm-6 col-md-3">
                       <h2 style="font-family: Hind Siliguri;font-size: 20px;"> <?php echo $lng['pop_tour_place']; ?>
                       </h2>
                       <ul class="travel-news">

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
WHERE popularity='1'
ORDER BY RAND()
LIMIT 2      
    ";


                            $runCount = mysqli_query($cn, $sqlCount);


                            $run = mysqli_query($cn, $view);
                            while ($data = mysqli_fetch_array($run)) {


                            ?>

                           <li>
                               <div class="thumb">
                                   <a href="#">
                                       <img src="admin/uploads/tour-places/<?php echo $data['pic1']; ?>" alt=""
                                           width="63" height="63" />
                                   </a>
                               </div>
                               <div class="description">
                                   <h5 class="s-title"><a
                                           href="details.php?tpid=<?php echo $data['tID']; ?>"><?php echo $data['Title']; ?></a>
                                   </h5>
                                   <p><?php echo $data['disName']; ?></p>

                               </div>
                           </li>
                           <?php } ?>




                       </ul>
                   </div>
                   <div class="col-sm-6 col-md-3">
                       <h2 style="font-family: Hind Siliguri;font-size: 20px;"><?php echo $lng['tours_update']; ?></h2>
                       <p style="font-family: Hind Siliguri;font-size: 13px;"><?php echo $lng['tours_update_info']; ?>
                       </p>
                       <br />
                       <div class="icon-check">
                           <input type="text" class="input-text full-width"
                               placeholder="<?php echo $lng['your_email']; ?>" />
                       </div>
                       <br />
                       <span style="font-family: Hind Siliguri;font-size: 14px;">923 +
                           <?php echo $lng['did_subscribe']; ?></span>
                   </div>
                   <div class="col-sm-6 col-md-3">
                       <h2 style="font-family: Hind Siliguri;font-size: 20px;"><?php echo $lng['about_us']; ?></h2>
                       <p><?php echo $lng['dg_info_footer2']; ?></p>
                       <br />
                       <address class="contact-details">
                           <span class="contact-phone"><i class="soap-icon-phone"></i>+88 01703-111117</span>
                           <br />
                           <a href="#" class="contact-email">support@greenramble.com</a>
                       </address>
                       <ul class="social-icons clearfix">
                          
                           <li class="facebook"><a title="facebook" href="https://facebook.com/districtguide" data-toggle="tooltip"><i
                                       class="soap-icon-facebook"></i></a></li>
                            <li class="twitter"><a title="twitter" href="https://twitter.com/districtguide" data-toggle="tooltip"><i
                                       class="soap-icon-twitter"></i></a></li>
            
                       <li class="youtube"><a title="youtube" href="https://www.youtube.com/channel/UCedBKZuEyotCQMaLzSt8VQQ" data-toggle="tooltip"><i
                                       class="soap-icon-youtube"></i></a></li>
            
                     
                       </ul>
                   </div>
               </div>
           </div>
       </div>
       <div class="bottom gray-area">
           <div class="container">
               <div class="logox pull-left">
                   <a href="index.php" title="District Guide">
                       <img src="assets/images/mainn.png" height="47px" width="200px" />
                   </a>
               </div>
               <div class="pull-right">
                   <a id="back-to-top" href="#" class="animated" data-animation-type="bounce"><i
                           class="soap-icon-longarrow-up circle"></i></a>
               </div>
               <div class="copyright pull-right">
                   <p style="font-family: Hind Siliguri;font-size: 16px;">©<?php echo $lng['dg_copy']; ?>।
                       <?php echo $lng['tech_supported']; ?>- <?php echo $lng['holyit']; ?></p>
               </div>
           </div>
       </div>
   </footer>
 <style>
.nw img {
    max-width: 100%;
    height: 215px;
}
 </style>


 <div class='fullwidth-section  ' style="background-repeat:no-repeat;background-position:left top;">
     <div class="container">
         <h2 class='section-title '>
             <font style=" font-family: Hind Siliguri"><?php echo $lng['most_popular_tour_place']; ?></font>
         </h2>
         <div class="carousel_items">
             <div class="package-wrapper dt_carousel" data-items="4">



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
                                    ORDER BY  tID
                                    DESC      
                                        ";

                    $sqlCount = "UPDATE site_stat SET total_visits = total_visits+1 WHERE id = '1'";
                    $runCount = mysqli_query($cn, $sqlCount);


                    $run = mysqli_query($cn, $view);
                    while ($data = mysqli_fetch_array($run)) {


                    ?>






                 <div id="730" class="column nw dt-sc-one-third">
                     <div class="package-item">
                         <div class="package-thumb">
                             <a href="details.php?tpid=<?php echo $data['tID']; ?>" title=""><img width="420" height="420"
                                     src="admin/uploads/tour-places/<?php echo $data['pic1']; ?>"
                                     class="attachment-package-fourcol size-package-fourcol wp-post-image"
                                     sizes="(max-width: 420px) 100vw, 420px" />
                                 <div class="image-overlay"></div>
                             </a>
                         </div>
                         <div class="package-details" style="height:210px">
                             <h5 style="height: 22px;overflow: hidden;"><a href="details.php?tpid=<?php echo $data['tID']; ?>"><?php echo $data['Title']; ?></a>
                             </h5>
                             <p style="height: 47px;overflow: hidden;"><?php echo $data['Descri'] . '...'; ?></p>
                             <div class="package-content">
                                 <ul class="package-meta">
                                     <li> <span class="fa fa-calendar"></span><?php echo $lng['total_review']; ?>: 5
                                     </li>
                                     <li> <span class="fa fa-user"></span><?php echo $lng['seen']; ?>:
                                         <?php echo $data['views']; ?> </li>
                                     <li> <span class="fa fa-user"></span><?php echo $lng['division']; ?>:
                                         <?php echo $data['divName']; ?> </li>
                                 </ul><span class="package-price">
                                     <div class="star-rating" style="font-size: 20px;margin-top:-18px"><span
                                             style="width:80%"></span>
                                     </div>
                                 </span><a href="details.php?tpid=<?php echo $data['tID']; ?>"
                                     class="dt-sc-button too-small"><?php echo $lng['details_view']; ?></a>
                             </div>
                         </div>
                     </div>
                 </div>



                 <?php } ?>




             </div>

         </div>
     </div>
 </div>
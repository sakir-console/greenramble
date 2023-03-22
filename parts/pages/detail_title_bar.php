<div class="page-title-container">
    <div class="container">


        <?php
        if (isset($_REQUEST['tpid'])) {
            $getID = $_REQUEST['tpid'];
            $tpID = mysqli_real_escape_string($cn, $getID);


            $view =  "SELECT 
       
            tour_place.{$ln}_title AS Title,
      

            loc_divisions.{$ln}_name AS divName,
            loc_districts.{$ln}_name AS disName
            FROM tour_place
            INNER JOIN loc_divisions
                      ON tour_place.div_id= loc_divisions.id
            INNER JOIN loc_districts
                      ON tour_place.dis_id= loc_districts.id
            WHERE tour_place.id='$tpID' 
                   ";
            $run = mysqli_query($cn, $view);
            while ($data = mysqli_fetch_array($run)) {
        ?>



        <?php if ($data['Title'] != '') { ?>





        <div class="page-title pull-left">
            <h2 class="entry-title" style=" font-family: Hind Siliguri;font-size: 23px;"><?php echo $data['Title']; ?>
            </h2>
        </div>
        <ul class="breadcrumbs pull-right">
            <li><a href="#"><?php echo $data['disName']; ?></a></li>
            <li class="active"><?php echo $data['Title']; ?></li>
        </ul>




        <?php } ?>



        <?php }
        } else {
            echo 'Thankyou';
        }
        ?>


    </div>
</div>
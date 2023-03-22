  <?php
    require_once('core/db_ln.php');
    $lastID = mysqli_real_escape_string($cn, $_REQUEST['lastid']);

    if (isset($_REQUEST['division_tp_id']) or $_REQUEST['district_tp_id']) {
        $div_id = mysqli_real_escape_string($cn, $_REQUEST['division_tp_id']);

        if (isset($_REQUEST['district_tp_id'])) {
            $dis_id = mysqli_real_escape_string($cn, $_REQUEST['district_tp_id']);
        }


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
        WHERE (div_id='$div_id'{$optional}) AND id<'$lastID'
        ORDER BY tID DESC
        LIMIT 6";



        $view = mysqli_query($cn, $query);
        $rowCount = mysqli_num_rows($view);

        if ($rowCount > 0) {
            while ($data = mysqli_fetch_array($view)) {
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
                  <div data-placement="bottom" data-toggle="tooltip" class="five-stars-container" title="4 stars"><span
                          style="width: 80%;" class="five-stars"></span></div>
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
  <a class="uppercase full-width button btn-large" id="more" data-id="<?php echo $last; ?>">load more </a>



  <?php


        } else {
            // echo " <h2>No Reviews</h2>";
        }
    }
    ?>
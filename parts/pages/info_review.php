  <div class="tab-pane fade" id="hotel-reviews">
      <style>
      .guest-review .author {
          text-align: center;
          border-right: 1px solid #f5f5f5;
          padding-top: 3px;
          padding-bottom: 0px;
          width: 137px;
      }
      </style>


      <div class="guest-reviews" id="revs">

          <?php

            $getID = $_REQUEST['tpid'];
            $tpID = mysqli_real_escape_string($cn, $getID);

            if (isset($getID)) {


                $query = "SELECT * FROM review WHERE tour_place_id='$tpID' ORDER BY id DESC LIMIT 2";

                $view = mysqli_query($cn, $query);
                $rowCount = mysqli_num_rows($view);

                if ($rowCount > 0) {
                    while ($data = mysqli_fetch_array($view)) {
            ?>


          <div class="guest-review table-wrapper">
              <div class="col-xs-3 col-md-2 author table-cell">
                  <a href="#"><img src="images/usr.png" alt="" width="270" height="263" /></a>
                  <p class="name"><?php echo $data['usr_name']; ?></p>
                  <p class="date"><?php echo $data['time']; ?></p>
              </div>
              <div class="col-xs-9 col-md-10 table-cell comment-container">
                  <div class="comment-header clearfix">
                      <h4 class="comment-title"><?php echo $data['title']; ?></h4>

                  </div>
                  <div class="comment-content">
                      <p>

                          <?php echo $data['details']; ?>


                      </p>
                  </div>
              </div>
          </div>


          <?php $last = $data['id']; ?>

          <?php }
                } else {
                    echo " <h2>No Reviews</h2>";
                }
            } ?>



          <a class="uppercase full-width button btn-large" id="more" data-id="<?php echo $last; ?>">load more </a>

      </div>

  </div>



  <script>
$(document).ready(function() {

    $(document).on('click', '#more', function() {
        //alert('found');
        var lastId = $(this).data('id');
        $('#more').html('Loading');
        $.post('more-review.php', {
            tpid: <?php echo $tpID; ?>,
            lastid: lastId
        }, function(data) {
            if (data != '') {
                $('#more').remove();
                $('.guest-reviews').append(data);
                // alert(data);
            } else {

                $('#more').remove();
                $('.guest-reviews').append(' <h2>No Reviews</h2>');

            }


        });

    });



});
  </script>
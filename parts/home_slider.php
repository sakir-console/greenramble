  <div id="slider-container">
      <div id="layerslider_3" class="ls-wp-container fitvidsignore"
          style="width:1280px;height:600px;margin:0 auto;margin-bottom: 0px;">


          <?php

            $view = "SELECT * FROM slider";
            $run = mysqli_query($cn, $view);
            while ($data = mysqli_fetch_array($run)) {


            ?>


          <div class="ls-slide" data-ls="duration:6000;transition2d:1;timeshift:-1000;kenburnsscale:1.2;">
              <img width="1920" height="600" src="admin/uploads/sliders/<?php echo $data['img']; ?>" class="ls-bg"
                  sizes="(max-width: 1920px) 100vw, 1920px" />
              <p style="font-family:'Bad Script';font-size:20px;color:#fff;top:240px;left:730px;" class="ls-l"
                  data-ls="durationin:2000;delayin:2500;easingin:easeOutElastic;rotatexin:90;transformoriginin:50% top 0;offsetxout:-600;durationout:400;parallaxlevel:0;">
                  <?php echo $data[$ln . '_slog']; ?> . .</p>



              <a style="" class="ls-l" href="#2" target="_self"
                  data-ls="offsetxin:-50;delayin:1000;offsetxout:-50;durationout:400;parallaxlevel:0;"><img width="20"
                      height="20" src="assets/images/Full-width-demo-slider/left.png" class="" alt=""
                      style="top:280px;left:845px;"></a>

              <a style="" class="ls-l" href="#1" target="_self"
                  data-ls="offsetxin:50;delayin:1000;offsetxout:50;durationout:400;parallaxlevel:0;"><img width="20"
                      height="20" src="assets/images/Full-width-demo-slider/right.png" class="" alt=""
                      style="top:280px;left:878px;"></a>


              <p style="font-weight:700;font-family:'Open Sans';font-size:50px;color:#ffffff;top:177px;left:240px;"
                  class="ls-l" data-ls="offsetxin:80;delayin:1500;offsetxout:-80;durationout:400;parallaxlevel:0;">
                  <?php echo $data[$ln . '_title']; ?></p>
          </div>

          <?php } ?>














      </div>
  </div>
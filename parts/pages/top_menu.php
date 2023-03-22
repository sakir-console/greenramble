    <div class="main-header">

        <a href="#mobile-menu-01" data-toggle="collapse" class="mobile-menu-toggle">
            <?php echo $lng['menu']; ?>
        </a>

        <div class="container">
            <h1 class="logox navbar-brand">
                <a href="index.php" title="greenramble.com">
                    <img src="assets/images/mainn.png" width="260px" height="50px" />
                </a>
            </h1>

            <nav id="main-menu">
                <ul class="menu" style="     
                        padding-left: 10px;
                        padding-right: 10px;
                        margin: 2px;
                       
                        text-transform: uppercase;
                        color: #1f1f1f;
                        position: relative;

                        font-family: Hind Siliguri;font-size: 14px;
                        ">

                    <li class="menu-item-has-children">
                        <a href="index.php" style="background: #fade03;
                           ">

                            <?php echo $lng['home']; ?></a>

                    </li>
                    <li class="menu-item-has-children">
                        <a href="popular-places.php"><?php echo $lng['popular_tour_place']; ?></a>

                    </li>
                    <li class="menu-item-has-children">
                        <a href="district-map.php"><?php echo $lng['district_wise_tour']; ?></a>

                    </li>
                    <li class="menu-item-has-children">
                        <a href="submit-place.php"><?php echo $lng['add_place']; ?></a>

                    </li>
                    <li class="menu-item-has-children">
                        <a href="https://booking.greenramble.com/"  target="_blank"><?php echo $lng['hotel_booking']; ?></a>
                        <!--  <ul>
                            <li><a href="tour-index.html">blog</a></li>

                        </ul>-->
                    </li>



                </ul>
            </nav>
        </div>


    </div>
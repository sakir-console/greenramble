<?php require_once('core/db_ln.php'); ?>


<!DOCTYPE html>

<html>
<?php require_once('parts/pages/details_head_links.php'); ?>

<body>

    <div id="page-wrapper">
        <header id="header" class="navbar-static-top">

            <?php require_once('parts/pages/top_bar.php'); ?>
            <?php require_once('parts/pages/top_menu.php'); ?>


        </header>

        <?php require_once('parts/pages/detail_title_bar.php'); ?>


        <section id="content">
            <div class="container">
                <div class="row">
                    <div id="main" class="col-md-9">
                        <div class="tab-container style1" id="hotel-main-content">
                            <?php require_once('parts/pages/detail_top_tab.php'); ?>
                            <div class="tab-content">
                                <?php require_once('parts/pages/detail_photo_gallery.php'); ?>
                                <?php require_once('parts/pages/detail_vdo_gallery.php'); ?>
                                <?php require_once('parts/pages/detail_hotel_booking.php'); ?>



                            </div>
                        </div>

                        <div id="hotel-features" class="tab-container">

                            <?php require_once('parts/pages/info_tab_bar.php'); ?>

                            <div class="tab-content">

                                <?php require_once('parts/pages/info_description.php'); ?>
                                <?php require_once('parts/pages/info_review.php'); ?>
                                <?php require_once('parts/pages/info_hospitals.php'); ?>
                                <?php require_once('parts/pages/info_emergency.php'); ?>
                                <?php require_once('parts/pages/info_write_review.php'); ?>
                                <?php require_once('parts/pages/info_share_place.php'); ?>

                            </div>

                        </div>
                    </div>



                    <?php require_once('parts/pages/info_side_bar.php'); ?>


                </div>
            </div>
        </section>

        <?php require_once('parts/pages/footer.php'); ?>

    </div>
    <?php require_once('parts/pages/footer_links.php'); ?>

</body>

</html>
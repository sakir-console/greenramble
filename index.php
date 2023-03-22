<?php require_once('core/db_ln.php'); ?>

<!DOCTYPE html>

<html lang="en-US" class="no-js">

<?php require_once('parts/home_head_links.php'); ?>


<body
    class="home-page bp-legacy home page-template page-template-tpl-fullwidth page-template-tpl-fullwidth-php page page-id-556 theme-trendytravel woocommerce-no-js tribe-no-js no-js">
    <div class="wrapper">
        <div class="inner-wrapper">

            <div id="header-wrapper">
                <header id="header" class="header2">

                    <?php require_once('parts/home_top_bar.php'); ?>
                    <?php require_once('parts/home_top_menu.php'); ?>

                </header>
            </div>

            <div class="banner">
                <?php require_once('parts/home_slider.php'); ?>

                <?php require_once('parts/home_search.php'); ?>

            </div>


            <div id="main">
                <section class="content-full-width" id="primary">
                    <article id="post-556" class="post-556 page type-page status-publish hentry">
                        <?php require_once('parts/home_add_place_info.php'); ?>


                        <div class='dt-sc-hr-invisible-small  '></div>


                        <?php require_once('parts/home_popular_place.php'); ?>
                        <?php require_once('parts/home_mid_tab_info.php'); ?>



                        <div class='dt-sc-hr-invisible-small  '></div>

                        <?php require_once('parts/home_video_section.php'); ?>



                        <div class='dt-sc-hr-invisible-small  '></div>
                        <div class='dt-sc-hr-invisible  '></div>

                        <?php require_once('parts/home_dg_app.php'); ?>

                        <div class='dt-sc-hr-invisible  '></div>

                        <?php require_once('parts/home_footer_banner.php'); ?>

                        <div style="background-repeat:no-repeat;background-position:left top;"
                            class="fullwidth-section">
                            <div class="fullwidth-bg">
                                <div class="container">
                                    <div class="social-bookmark"></div>
                                </div>
                            </div>
                        </div>
                    </article>
                </section>
            </div>


            <?php require_once('parts/home_footer.php'); ?>


        </div>
    </div>
    <?php require_once('parts/home_footer_links.php'); ?>
</body>

</html>
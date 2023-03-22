<?php require_once('core/db_ln.php'); ?>




<!DOCTYPE html>
<html>
<?php require_once('parts/pages/head_links.php'); ?>

<body>

    <div id="page-wrapper">
        <header id="header" class="navbar-static-top">
            <?php require_once('parts/pages/top_bar.php'); ?>
            <?php require_once('parts/pages/top_menu.php'); ?>

        </header>




        <?php require_once('parts/pages/place_title_bar.php'); ?>




        <section id="content" class="gray-area">
            <div class="container">
                <div class="row">

                    <?php require_once('parts/pages/submit_place.php'); ?>
                    <?php require_once('parts/pages/info_side_bar.php'); ?>


                </div>
            </div>
        </section>


        <?php require_once('parts/pages/footer.php'); ?>



    </div>
    <?php require_once('parts/pages/footer_links.php'); ?>

</body>


</html>
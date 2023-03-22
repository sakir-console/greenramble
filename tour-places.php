<?php require_once('core/db_ln.php'); ?>
<script src="assets/jq.js"></script>


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



        <section id="content">
            <div class="container">
                <div id="main">
                    <div class="row">

                        <?php require_once('parts/pages/place_list.php'); ?>
                        <?php require_once('parts/pages/info_side_bar.php'); ?>


                    </div>
                </div>
            </div>
        </section>

        <?php require_once('parts/pages/footer.php'); ?>

    </div>

    <?php require_once('parts/pages/footer_links.php'); ?>

</body>



</html>
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
        <div class="page-title-container">
            <div class="container">
                <div class="page-title pull-left">
                    <h2 class="entry-title" style=" font-family: Hind Siliguri;font-size: 23px;">
                        Not Found.. </h2>
                </div>
                <ul class="breadcrumbs pull-right">
                    <li><a href="index.php"> প্রথম পাতা</a></li>
                    <li class="active">Error Page </li>
                </ul>
            </div>
        </div>
        <style>
        * {
            transition: all 0.6s;
        }

        html {
            height: 100%;
        }

        body {
            font-family: 'Lato', sans-serif;
            color: #888;
            margin: 0;
        }

        #main {
            display: table;
            width: 100%;
            height: 100vh;
            text-align: center;
        }

        .fof {
            display: table-cell;
            vertical-align: middle;
        }

        .fof h1 {
            font-size: 50px;
            display: inline-block;
            padding-right: 12px;
            animation: type .5s alternate infinite;
        }

        @keyframes type {
            from {
                box-shadow: inset -3px 0px 0px #888;
            }

            to {
                box-shadow: inset -3px 0px 0px transparent;
            }
        }
        </style>
        <div id="main">
            <div class="fof">
                <h1>Error 404</h1>
            </div>
        </div>






        <?php require_once('parts/pages/footer.php'); ?>

    </div>
    <?php require_once('parts/pages/footer_links.php'); ?>

</body>

</html>
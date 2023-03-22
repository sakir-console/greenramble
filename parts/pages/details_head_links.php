<head>
    <script src="assets/jq.js"></script>
    <!-- Page Title -->
  
    <!-- Meta Tags -->
    <meta charset="utf-8">

    <?php
    if (isset($_REQUEST['tpid'])) {
        $getID = $_REQUEST['tpid'];
        $tpID = mysqli_real_escape_string($cn, $getID);


        $view =  "SELECT 
       
            tour_place.{$ln}_title AS Title,
            tour_place.{$ln}_s_des AS sDescri,
            tour_place.pic1 AS Pic1
            FROM tour_place
            WHERE tour_place.id='$tpID' 
                   ";
        $run = mysqli_query($cn, $view);
        while ($data = mysqli_fetch_array($run)) {
    ?>

     <script data-ad-client="ca-pub-2680215667423951" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

<title><?php echo $data['Title']; ?></title>

    <meta property="og:title" content="<?php echo $data['Title']; ?>">
    <meta property="og:description" content="<?php echo $data['sDescri']; ?>">
    <meta property="og:image" content="https://greenramble.com/admin/uploads/tour-places/<?php echo $data['Pic1'];?>">
    
     <meta property="og:image:width" content="600"/>
  <meta property="og:image:height" content="500"/>
  <meta property="og:type" content="website"/>

    <?php }
    }
    ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">




    <!-- Theme Styles -->
    <link rel="stylesheet" href="assets/pages/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/pages/css/font-awesome.min.css">
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,500,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="assets/pages/css/animate.min.css">

    <!-- Current Page Styles -->
    <link rel="stylesheet" type="text/css" href="assets/pages/components/revolution_slider/css/settings.css"
        media="screen" />
    <link rel="stylesheet" type="text/css" href="assets/pages/components/revolution_slider/css/style.css"
        media="screen" />
    <link rel="stylesheet" type="text/css" href="assets/pages/components/jquery.bxslider/jquery.bxslider.css"
        media="screen" />
    <link rel="stylesheet" type="text/css" href="assets/pages/components/flexslider/flexslider.css" media="screen" />



    <link href="https://fonts.maateen.me/charukola-ultra-light/font.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@500&display=swap" rel="stylesheet">

    <!-- Updated Styles -->
    <link rel="stylesheet" href="assets/pages/css/updates.css">

    <!-- Custom Styles -->
    <link rel="stylesheet" href="assets/pages/css/custom.css">

    <!-- Responsive Styles -->
    <link rel="stylesheet" href="assets/pages/css/responsive.css">
    <link rel="stylesheet" href="assets/pages/css/style.css">



</head>
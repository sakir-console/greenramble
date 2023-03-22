<div class="topnav hidden-xs">
    <div class="container" style="color: white;
                font-size: 14.1px;">


        <i class='fa fa-envelope-o'></i><?php echo $lng['any_qsn']; ?><?php echo $lng['email_us']; ?>:
        info@greenramble.com



        <ul class="quick-menu pull-right">

            <li>
                <a href="change_lang.php?url=<?php echo $link_url; ?>"
                    style="<?php echo $ln == 'en' ? $link_off . ';height: 30px; font-size: 1em;'  : ''; ?>"
                    class="<?php echo $ln == 'en' ? 'button yellow btn-small' : ''; ?>">
                    <span class="fa fa-x"></span>
                    <font style="font-family: Hind Siliguri">English </font>
                </a>
            </li>
            <li>
                <a href="change_lang.php?url=<?php echo $link_url; ?>"
                    style="<?php echo $ln == 'bn' ? $link_off . ';height: 30px; font-size: 1em;' : ''; ?>"
                    class="<?php echo $ln == 'bn' ? 'button yellow btn-small' : ''; ?>">
                    বাংলা</a>
            </li>
        </ul>






    </div>
</div>


<style>
#main-menu ul.menu>li>a,
.chaser ul.menu>li>a {
    line-height: 0;
    height: 13px;
    padding: 17px;
    border-radius: 3px;
    color: black;
}

#main-menu ul.menu>li,
.chaser ul.menu>li {
    float: left;
    padding-left: 0px;
    padding-right: 0px;
    padding-top: 12px;
    padding-bottom: 10px;
}

#main-menu ul.menu>li.active>a,
.chaser ul.menu>li.active>a {
    color: #000000;
    font-weight: bold;
}

#header .topnav {
    background: #087dc2;
    width: 100%;
    padding: 6px;
    height: 41px;
}




#header .logox {
    padding: 0;
    text-align: left;
    margin: 5px 0 5px;
    height: auto;
}

#main-menu ul.menu>li:hover>ul,
.chaser ul.menu>li:hover>ul {
    top: 57px;
    visibility: visible;
    height: auto !important;
    z-index: 1000;
    width: 220px;
    background: #fff;
    border-top: 3px solid #087dc2;
    padding: 10px 0 10px;
    position: absolute;
    top: 50px;
    left: 0;
    float: left;
    box-shadow: 0 5px 10px rgba(0, 0, 0, .25);
    -moz-box-shadow: 0 5px 10px rgba(0, 0, 0, .25);
    -webkit-box-shadow: 0 5px 10px rgba(0, 0, 0, .25);
}

#main-menu ul li.menu-item-simple-parent ul li a {
    color: #2c3e50;
    position: relative;
    padding: 10px 0;
    font-size: 16px;
    border-bottom: 1px solid #f0f1ef;
    display: block;
}

#main-menu ul.menu>li ul li>a,
.chaser ul.menu>li ul li>a {
    white-space: nowrap;
    color: #fff;
    padding: 12px 20px 12px 18px;
    display: block;
    filter: alpha(opacity=70);
    -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=70)";
    -moz-opacity: 0.7;
    -khtml-opacity: 0.7;
    opacity: 0.7;
    color: #2c3e50;
    position: relative;
    font-size: 14px;
    border-bottom: 1px solid #f0f1ef;
    border-top: 0;
    display: block;
}
</style>
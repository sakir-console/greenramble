<div class="top-bar">
    <div class="container">
        <div class="float-left">
            <div class="dt-sc-contact-info">
                <p><i class='fa fa-envelope-o'></i>
                    <?php echo $lng['any_qsn']; ?>
                    <?php echo $lng['email_us']; ?>: info@greenramble.com
                </p>
            </div>
        </div>
        <div class="top-right">
            <ul>
                <li>
                    <a href="change_lang.php?url=<?php echo empty($link_url)?'index.php':$link_url; ?>"
                        style="<?php echo $ln == 'bn' ? $link_off : ''; ?>">
                        <span class="fa fa-signal"></span>বাংলা</a>
                </li>
                <li>
                    <a href="change_lang.php?url=<?php echo empty($link_url)?'index.php':$link_url; ?>"
                        style="<?php echo $ln == 'en' ? $link_off : ''; ?>">
                        <span class="fa fa-x"></span>
                        <font style="font-family: Hind Siliguri">English </font>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<?php
require_once('core/db_ln.php');
?>
<hr>

<?php echo $lng['my_name']; ?>
<hr>




<a href='change_lang.php?url=<?php echo $link_url; ?>'
    style="<?php echo $ln == 'bn' ? $link_off : ''; ?>">Bangla</a><br>
<a href='change_lang.php?url=<?php echo $link_url; ?>' style="<?php echo $ln == 'en' ? $link_off : ''; ?>">English</a>
<hr>














<?php
$show = "SELECT * FROM loc_divisions";
$run = mysqli_query($cn, $show);
while ($data = mysqli_fetch_array($run)) {
    echo $data[$ln . '_name'] . '<br>';
    echo '<pre>';

    print_r($data);

    echo '</pre>';
} ?>


<?php echo basename($_SERVER["REQUEST_URI"]); ?>
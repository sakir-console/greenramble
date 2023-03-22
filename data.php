<?php
require_once('core/dbcon.php');

$actionName = $_REQUEST['action'];
if ($actionName == 'showPost') {
    $showPostFrom = $_REQUEST['showPostFrom'];
    $showPostCount = $_POST['showPostCount'];

    $query = "SELECT * FROM review ORDER BY id DESC LIMIT {$showPostFrom},{$showPostCount}";
    $run = mysqli_query($cn, $query);
    $count = mysqli_num_rows($run);

    if ($count > 0) {
        while ($data = mysqli_fetch_array($run)) {

?>


<?php echo $data['title']; ?>






<?php
        }
    }
} ?>
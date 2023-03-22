<script src="assets/jq.js"></script>
<?php
require_once('core/db_ln.php');
$query = "SELECT * FROM review ORDER BY id DESC";
$query2 = "SELECT * FROM review ORDER BY id DESC LIMIT 0,5";
$run = mysqli_query($cn, $query);
$run2 = mysqli_query($cn, $query2);
$count = mysqli_num_rows($run);

if ($count > 0) {
    while ($data = mysqli_fetch_array($run2)) {

?>

<div style="margin:100px;padding:10px;background:grey;text-align:center;">
    <?php echo $data['title']; ?>

    <div id='datas'>



    </div>
</div>

<?php
    }
}
?>
<div id="loading">Loading</div>

<script>
$(document).ready(
    function() {
        $showPostFrom = 0;
        $showPostCount = 5;
        $(window).scroll(function() {
            if (($(window).scrollTop() == $(document).height() - $(window).height())) {
                $showPostFrom += $showPostCount;
                $('#loading').show();
                $.post('data.php', {
                    'action': 'showPost',
                    'showPostFrom': $showPostFrom,
                    'showPostCount': $showPostCount
                }, function(data) {
                    if (data != '') {
                        $('#loading').hide();
                        $('#datas').append(data).show('Slow');

                    } else {
                        $('#loading').hide();


                    }


                });


            }



        });


    });
</script>
<?php $msg = '';
if (isset($_REQUEST['dlt'])) {
    if ($_REQUEST['dlt'] == true) {
        $msg = "<b style='color:red'>Successfully Deleted.</b>";
    }
}



?>
<section class="content">
    <div class="container-fluid">


        <!-- Hover Rows -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Added Spot List
                            <small>Edit/Delete Tour Place here.</small>
                        </h2>
                        <div id="msg" style="color:green"></div>
                        <?php echo $msg; ?>
                    </div>
                    <div class="body table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Spot Title</th>
                                    <th>District</th>
                                    <th>Division</th>
                                    <th>Popularity</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $sl = 0;

                                $view = "SELECT 
                                    tour_place.id AS tID,
                                    tour_place.bn_title AS bnTitle,
                                    tour_place.en_title AS enTitle,
                                    tour_place.div_id AS divID,
                                    tour_place.dis_id AS disID,
                                    tour_place.popularity AS popular,

                                    loc_divisions.bn_name AS divName,
                                    loc_districts.bn_name AS disName
                                    FROM tour_place
                                    INNER JOIN loc_divisions
                                              ON tour_place.div_id= loc_divisions.id
                                    INNER JOIN loc_districts
                                              ON tour_place.dis_id= loc_districts.id
                                        ";
                                $run = mysqli_query($cn, $view);
                                while ($data = mysqli_fetch_array($run)) {
                                    $sl++;

                                ?>



                                <tr>
                                    <th scope="row"><?php echo $sl; ?></th>
                                    <td><?php
                                            if (empty($data['bnTitle'])) {

                                                echo $data['enTitle'];
                                            } else {

                                                echo  $data['bnTitle'];
                                            }
                                            ?></td>
                                    <td><?php echo $data['disName']; ?></td>
                                    <td><?php echo $data['divName']; ?></td>
                                    <td>
                                        <div class="col-sm-3">

                                            <div class="switch">

                                                <form method="POST" action="">
                                                    <label><input type="checkbox" name="popu" value="<?php
                                                                                                            if ($data['popular'] == 1) {
                                                                                                                echo "0";
                                                                                                            } else {
                                                                                                                echo "1";
                                                                                                            }

                                                                                                            ?>"
                                                            id="switch<?php echo $sl; ?>"
                                                            <?php
                                                                                                                                                if ($data['popular'] == 1) {
                                                                                                                                                    echo " checked";
                                                                                                                                                } else {
                                                                                                                                                    echo "";
                                                                                                                                                }

                                                                                                                                                ?>><span
                                                            class="lever switch-col-teal"></span></label>


                                                    <script>
                                                    $(document).ready(function() {
                                                        $("#switch<?php echo $sl; ?>").on("change", function() {
                                                            var swt = $(this).val();
                                                            var popid = <?php echo $data['tID']; ?>;


                                                            if (swt) {
                                                                //alert('swt hoise');
                                                                $.post('pop_up.php', {
                                                                    popu: swt,
                                                                    popID: popid
                                                                }, function(result) {
                                                                    alert(result);
                                                                    $("#msg").html(result);
                                                                });
                                                            } else {
                                                                alert('uuuu');
                                                            }

                                                        });



                                                    });
                                                    </script>






                                                </form>

                                            </div>
                                        </div>
                                    </td>
                                    <td><button type="button" class="btn bg-teal waves-effect">
                                            <a href="edit-spot.php?sptid=<?php echo $data['tID']; ?>">
                                                <i class="material-icons">border_color</i>
                                                <span style="color:white">Edit</span>
                                            </a>
                                        </button>
                                        <button type="button" class="btn bg-pink waves-effect">
                                            <a href="dlt-spot.php?sptid=<?php echo $data['tID']; ?>"
                                                onclick="return confirm('Are You Sure?')">
                                                <i class="material-icons">border_color</i>
                                                <span style="color:white">Delete</span>
                                            </a>
                                        </button>

                                    </td>
                                </tr>


                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    </div>
</section>
<?php
$msg = '';


if (isset($_REQUEST['submit'])) {
    $ho_bn = $_REQUEST['hotel_bn'];
    $ho_en = $_REQUEST['hotel_en'];
    $div_id = $_REQUEST['divisions'];
    $dis_id = $_REQUEST['districts'];

    if ((!empty($ho_bn) && !empty($div_id) && !empty($dis_id)) || (!empty($ho_en) && !empty($div_id) && !empty($dis_id))) {
        $insert = "INSERT INTO hotels(hotel_bn,hotel_en,div_id,dis_id) VALUES('$ho_bn','$ho_en','$div_id','$dis_id')";
        $run = mysqli_query($cn, $insert);
        if ($run) {
            echo mysqli_connect_error();
            $msg = "<b style='color:green'>Successfully Added</b>";
        } else {

            echo mysqli_connect_error();
        }
    } else {
        $msg = "<b style='color:red'>Please Enter the Inputs</b>";
    }
}


if (isset($_REQUEST['dlt'])) {
    if ($_REQUEST['dlt'] == true) {
        $msg = "<b style='color:red'>Successfully Deleted.</b>";
    }
}



?>


<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2> Hotels</h2>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            All Hotels
                            <small>Add Hotel link/Details here.</small>
                        </h2>
                        <?php echo $msg; ?>
                    </div>
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs tab-nav-right" role="tablist">

                                    <li role="presentation" class="active"><a href="#Bangla_animation_1"
                                            data-toggle="tab">Bangla</a></li>
                                    <li role="presentation"><a href="#English_animation_1" data-toggle="tab">English</a>
                                    </li>

                                </ul>
                                <form action="" method="POST">
                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane animated flipInX active"
                                            id="Bangla_animation_1">
                                            <div class="body">

                                                <label for="email_address">Hotel link/Details here.</label>

                                                <textarea id="ckeditor" name="hotel_bn">

                                             </textarea>

                                            </div>
                                        </div>
                                        <div role="tabpanel" class="tab-pane animated flipInX" id="English_animation_1">
                                            <div class="body">

                                                <label for="email_address">Hotel link/Details here.</label>

                                                <textarea id="ckeditor2" name="hotel_en">

                                                </textarea>
                                            </div>
                                        </div>


                                        <div class="row clearfix">
                                            <div class="col-sm-6">

                                                <?php $query = "SELECT * FROM loc_divisions";
                                                $run_query = mysqli_query($cn, $query);
                                                //Count total number of rows
                                                $count = mysqli_num_rows($run_query);

                                                ?>

                                                <select name="divisions" id="divisions" class="form-control show-tick">
                                                    <option value="">Select Division</option>
                                                    <?php
                                                    if ($count > 0) {
                                                        while ($row = mysqli_fetch_array($run_query)) {
                                                            $div_id = $row['id'];
                                                            $div_name = $row['bn_name'];
                                                            echo "<option value='$div_id'>$div_name</option>";
                                                        }
                                                    } else {
                                                        echo '<option value="">Division not available</option>';
                                                    }
                                                    ?>
                                                </select>



                                            </div>

                                            <div class="col-sm-6">

                                                <select name="districts" id="districts" class="form-control show-tick">
                                                    <option value="">Select Division first</option>
                                                </select>


                                            </div>
                                        </div>


                                        <button class="btn btn-block bg-pink waves-effect" type="submit"
                                            name="submit">Add
                                            Hotel</button>
                                    </div>

                                </form>
                            </div>

                        </div>












                    </div>


                </div>
            </div>
        </div>


        <!-- Hover Rows -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Added Hotel link/Details
                            <small>Edit/Delete All Hotel link/Details here.</small>
                        </h2>

                    </div>
                    <div class="body table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Division</th>
                                    <th>District</th>

                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>


                                <?php
                                $sl = 0;

                                $view = "SELECT 
                                    hotels.id AS hID,
                               
                                    hotels.div_id AS divID,
                                    hotels.dis_id AS disID,
                                    
                                    loc_divisions.bn_name AS divName,
                                    loc_districts.bn_name AS disName
                                    FROM hotels
                                    INNER JOIN loc_divisions
                                              ON hotels.div_id= loc_divisions.id
                                    INNER JOIN loc_districts
                                              ON hotels.dis_id= loc_districts.id
                                        ";
                                $run = mysqli_query($cn, $view);
                                while ($data = mysqli_fetch_array($run)) {
                                    $sl++;

                                ?>



                                <tr>
                                    <th scope="row"><?php echo $sl;
                                                        ?></th>
                                    <td> <?php echo $data['divName']; ?>
                                    </td>
                                    <td> <?php echo $data['disName']; ?>
                                    </td>
                                    <td><button type="button" class="btn bg-teal waves-effect">
                                            <a href="edit-hotels.php?hID=<?php echo $data['hID']; ?>">
                                                <i class="material-icons">border_color</i>
                                                <span style="color:white">Edit</span>
                                            </a>
                                        </button>
                                        <button type="button" class="btn bg-pink waves-effect">
                                            <a href="dlt-hotels.php?hID=<?php echo $data['hID']; ?>"
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




<script>
$(document).ready(function() {
    $("#divisions").on("change", function() {
        var divID = $(this).val();


        if (divID) {

            $.post('div_dis.php', {
                div_id: divID
            }, function(result) {

                $("#districts").html(result);
            });
        } else {
            $('#divisions').html('<option value="">Select Division first</option>');;
        }

    });



});
</script>
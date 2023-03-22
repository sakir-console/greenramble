<?php
$msg = '';
$emr_id = $_REQUEST['emrID'];

if (isset($_REQUEST['submit'])) {
    $emr_bn = $_REQUEST['info_bn'];
    $emr_en = $_REQUEST['info_en'];


    if (!empty($emr_bn) || !empty($emr_en)) {
        $insert = "UPDATE emergency SET
            info_bn ='$emr_bn',
            info_en='$emr_en'
            WHERE id='$emr_id'";
        $run = mysqli_query($cn, $insert);
        if ($run) {
            echo mysqli_connect_error();
            $msg = "<b style='color:green'>Successfully Updated.</b>";
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
            <h2> Emergency</h2>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            All Emergency
                            <small>Add Emergency link/Details here.</small>
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

                                    <?php

                                    $view = "SELECT * FROM emergency WHERE id='$emr_id'";
                                    $run = mysqli_query($cn, $view);
                                    while ($data = mysqli_fetch_array($run)) {


                                    ?>

                                    <!-- Tab panes -->
                                    <div class="tab-content">



                                        <div role="tabpanel" class="tab-pane animated flipInX active"
                                            id="Bangla_animation_1">
                                            <div class="body">

                                                <label for="email_address">Emergency link/Details here.</label>

                                                <textarea id="ckeditor" name="info_bn">
<?php echo $data['info_bn']; ?>
                                             </textarea>

                                            </div>
                                        </div>
                                        <div role="tabpanel" class="tab-pane animated flipInX" id="English_animation_1">
                                            <div class="body">

                                                <label for="email_address">Emergency link/Details here.</label>

                                                <textarea id="ckeditor2" name="info_en">
                                                <?php echo $data['info_en']; ?>
                                                </textarea>
                                            </div>
                                        </div>



                                        <button class="btn btn-block bg-pink waves-effect" type="submit"
                                            name="submit">Update
                                            Emergency</button>
                                    </div>
                                    <?php } ?>
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
                            Added Emergency link/Details
                            <small>Edit/Delete All Emergency link/Details here.</small>
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
    emergency.id AS emrID,

    emergency.div_id AS divID,
    emergency.dis_id AS disID,
    
    loc_divisions.bn_name AS divName,
    loc_districts.bn_name AS disName
    FROM emergency
    INNER JOIN loc_divisions
              ON emergency.div_id= loc_divisions.id
    INNER JOIN loc_districts
              ON emergency.dis_id= loc_districts.id
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
                                            <a href="edit-emergency.php?emrID=<?php echo $data['emrID']; ?>">
                                                <i class="material-icons">border_color</i>
                                                <span style="color:white">Edit</span>
                                            </a>
                                        </button>
                                        <button type="button" class="btn bg-pink waves-effect">
                                            <a href="dlt-emergency.php?emrID=<?php echo $data['emrID']; ?>"
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
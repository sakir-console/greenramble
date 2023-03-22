<?php
$msg = '';


if (isset($_REQUEST['submit'])) {
    $dis_bn = $_REQUEST['dis_bn'];
    $dis_en = $_REQUEST['dis_en'];
    $div_id = $_REQUEST['div'];
    $dis_in_bn = $_REQUEST['dis_in_bn'];
    $dis_in_en = $_REQUEST['dis_in_en'];

    if ((!empty($dis_bn) && !empty($dis_in_bn)) || (!empty($dis_en) && !empty($dis_in_en))) {
        $insert = "INSERT INTO loc_districts(bn_name,en_name,div_id,bn_intro,en_intro) VALUES('$dis_bn','$dis_en','$div_id','$dis_in_bn','$dis_in_en')";
        $run = mysqli_query($cn, $insert);
        if ($run) {

            $msg = "<b style='color:green'>Successfully Added</b>";
        } else {

            echo mysqli_connect_error();
        }
    } else {
        $msg = "<b style='color:red'>Please Enter the Name</b>";
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
            <h2>Districts</h2>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Add New District
                            <small>Add a new District here for the Tourist Place.</small>

                            <?php echo $msg; ?>

                        </h2>

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

                                                <label for="email_address">District Name</label>
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" name="dis_bn" class="form-control"
                                                            placeholder="Enter the District Name">
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="body">

                                                <label for="email_address">District Intro</label>
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" name="dis_in_bn" class="form-control"
                                                            placeholder="Enter the District Intro ">
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div role="tabpanel" class="tab-pane animated flipInX" id="English_animation_1">
                                            <div class="body">

                                                <label for="email_address">District Name</label>
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" name="dis_en" class="form-control"
                                                            placeholder="Enter the District Name">
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="body">

                                                <label for="email_address">District Intro</label>
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" name="dis_in_en" class="form-control"
                                                            placeholder="Enter the District Intro">
                                                    </div>
                                                </div>

                                            </div>
                                        </div>




                                        <div class="row clearfix">
                                            <div class="col-sm-6">
                                                <select class="form-control show-tick" name="div">
                                                    <option value="">-- Select Division--</option>
                                                    <?php
                                                    $view = "SELECT * FROM loc_divisions";
                                                    $run = mysqli_query($cn, $view);
                                                    while ($data = mysqli_fetch_array($run)) { ?>


                                                    <option value="<?php echo $data['id']; ?>">
                                                        <?php echo $data['bn_name']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-xs-2">
                                            <button class="btn btn-block bg-pink waves-effect" type="submit"
                                                name="submit">Submit</button>
                                        </div>
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
                            Added Districts
                            <small>Edit/Delete your District here.</small>
                        </h2>

                    </div>
                    <div class="body table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>District(Bangla)</th>
                                    <th>District(English)</th>
                                    <th>Division</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>


                                <?php
                                $sl = 0;

                                $view = "SELECT 
                                loc_districts.id AS disid,
                                loc_districts.bn_name AS disbn,
                                loc_districts.en_name AS disen,
                                loc_districts.div_id AS divid,
                                loc_divisions.bn_name AS divname
                                 FROM loc_districts
                                 INNER JOIN loc_divisions
                                        ON loc_districts.div_id=loc_divisions.id
                                 ";

                                $run = mysqli_query($cn, $view);
                                while ($data = mysqli_fetch_array($run)) {
                                    $sl++;



                                ?>

                                <tr>
                                    <th scope="row"><?php echo $sl;
                                                        ?></th>
                                    <td><?php echo $data['disbn']; ?></td>
                                    <td><?php echo $data['disen']; ?></td>
                                    <td><?php echo $data['divname']; ?></td>
                                    <td><button type="button" class="btn bg-teal waves-effect">
                                            <a
                                                href="edit-districts.php?dis=<?php echo $data['disid']; ?>&div=<?php echo $data['divid']; ?>">
                                                <i class="material-icons">border_color</i>
                                                <span style="color:white">Edit</span>
                                            </a>
                                        </button>
                                        <button type="button" class="btn bg-pink waves-effect">
                                            <a href="dlt-districts.php?dis=<?php echo $data['disid']; ?>"
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
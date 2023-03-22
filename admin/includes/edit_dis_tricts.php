<?php
$msg = '';
$dis_id = $_REQUEST['dis'];
$div_id = $_REQUEST['div'];


if (isset($_REQUEST['update'])) {
    $dis_bn = $_REQUEST['dis_bn'];
    $dis_en = $_REQUEST['dis_en'];
    $div = $_REQUEST['divi'];

    $div_id = $div;
    $dis_in_bn = $_REQUEST['dis_in_bn'];
    $dis_in_en = $_REQUEST['dis_in_en'];


    if ((!empty($dis_bn) && !empty($dis_in_bn)) || (!empty($dis_en) && !empty($dis_in_en))) {
        $insert = "UPDATE loc_districts SET bn_name='$dis_bn', en_name='$dis_en',div_id='$div',bn_intro='$dis_in_bn',en_intro='$dis_in_en' WHERE id='$dis_id'";
        $run = mysqli_query($cn, $insert);
        if ($run) {

            $msg = "<b style='color:green'>Successfully Updated.</b>";
        } else {

            echo mysqli_connect_error();
        }
    } else {
        $msg = "<b style='color:red'>Please Enter the Name</b>";
    }
}
?>




<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Divisions</h2>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Edit District


                            <small>Edit District here for the Tourist Place.</small>
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
                                <form method="POST" action="">


                                    <!-- Tab panes -->
                                    <div class="tab-content">


                                        <?php


                                        $view = "SELECT * FROM loc_districts WHERE id=$dis_id";
                                        $run = mysqli_query($cn, $view);
                                        while ($data = mysqli_fetch_array($run)) {


                                        ?>


                                        <div role="tabpanel" class="tab-pane animated flipInX active"
                                            id="Bangla_animation_1">
                                            <div class="body">

                                                <label for="email_address">Division Name</label>
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" name="dis_bn" class="form-control"
                                                            value="<?php echo $data['bn_name']; ?>">
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="body">

                                                <label for="email_address">District Intro</label>
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" name="dis_in_bn" class="form-control"
                                                            value="<?php echo $data['bn_intro']; ?>">
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div role="tabpanel" class="tab-pane animated flipInX" id="English_animation_1">
                                            <div class="body">

                                                <label for="email_address">Division Name</label>
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" name="dis_en" class="form-control"
                                                            value="<?php echo $data['en_name']; ?>">
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="body">

                                                <label for="email_address">District Intro</label>
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" name="dis_in_en" class="form-control"
                                                            value="<?php echo $data['en_intro']; ?>">
                                                    </div>
                                                </div>

                                            </div>
                                        </div>




                                        <?php } ?>





                                        <div class="row clearfix">
                                            <div class="col-sm-6">
                                                <select class="form-control show-tick" name="divi">


                                                    <?php


                                                    $view = "SELECT id,bn_name FROM loc_divisions WHERE id='$div_id'";


                                                    $run = mysqli_query($cn, $view);
                                                    while ($data = mysqli_fetch_array($run)) {

                                                    ?>
                                                    <option value="<?php echo $data['id']; ?>" selected>
                                                        <?php echo $data['bn_name']; ?></option>
                                                    <?php } ?>



                                                    <?php


                                                    $view = "SELECT id,bn_name FROM loc_divisions WHERE id !='$div_id'";


                                                    $run = mysqli_query($cn, $view);
                                                    while ($data = mysqli_fetch_array($run)) {

                                                    ?>
                                                    <option value="<?php echo $data['id']; ?>">
                                                        <?php echo $data['bn_name']; ?></option>
                                                    <?php } ?>











                                                </select>
                                            </div>
                                        </div>






                                        <div class="col-xs-2">
                                            <button class="btn btn-block bg-pink waves-effect" type="submit"
                                                name="update">Update</button>
                                        </div>
                                    </div>


                                </form>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>



    </div>
</section>
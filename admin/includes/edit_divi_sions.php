<?php
$msg = '';
$div_id = $_REQUEST['div'];


if (isset($_REQUEST['update'])) {
    $div_bn = $_REQUEST['div_bn'];
    $div_en = $_REQUEST['div_en'];
    $div_in_bn = $_REQUEST['div_in_bn'];
    $div_in_en = $_REQUEST['div_in_en'];

    if ((!empty($div_bn) && !empty($div_in_bn)) || (!empty($div_en) && !empty($div_in_en))) {
        $insert = "UPDATE loc_divisions SET bn_name='$div_bn', en_name='$div_en',bn_intro='$div_in_bn',en_intro='$div_in_en' WHERE id='$div_id'";
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
                            Add New Division


                            <small>Add a new Division here for the Tourist Place.</small>
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

                                    <?php


                                    $view = "SELECT * FROM loc_divisions WHERE id=$div_id";
                                    $run = mysqli_query($cn, $view);
                                    while ($data = mysqli_fetch_array($run)) {


                                    ?>


                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane animated flipInX active"
                                            id="Bangla_animation_1">
                                            <div class="body">

                                                <label for="email_address">Division Name</label>
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" name="div_bn" class="form-control"
                                                            value="<?php echo $data['bn_name']; ?>">
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="body">

                                                <label for="email_address">Division Intro</label>
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" name="div_in_bn" class="form-control"
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
                                                        <input type="text" name="div_en" class="form-control"
                                                            value="<?php echo $data['en_name']; ?>">
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="body">

                                                <label for="email_address">Division Intro</label>
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" name="div_in_en" class="form-control"
                                                            value="<?php echo $data['en_intro']; ?>">
                                                    </div>
                                                </div>

                                            </div>
                                        </div>


                                        <div class="col-xs-2">
                                            <button class="btn btn-block bg-pink waves-effect" type="submit"
                                                name="update">Update</button>
                                        </div>
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
                            Added Divisions
                            <small>Edit/Delete your Division here.</small>
                        </h2>

                    </div>
                    <div class="body table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Division(Bangla)</th>
                                    <th>Division(English)</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>


                                <?php
                                $sl = 0;

                                $view = "SELECT * FROM loc_divisions";
                                $run = mysqli_query($cn, $view);
                                while ($data = mysqli_fetch_array($run)) {
                                    $sl++;

                                ?>


                                <tr>
                                    <th scope="row"><?php echo $sl;
                                                        ?></th>
                                    <td> <?php echo $data['bn_name']; ?>
                                    </td>
                                    <td> <?php echo $data['en_name']; ?>
                                    </td>
                                    <td><button type="button" class="btn bg-teal waves-effect">
                                            <a href="edit-divisions.php?div=<?php echo $data['id']; ?>">
                                                <i class="material-icons">border_color</i>
                                                <span style="color:white">Edit</span>
                                            </a>
                                        </button>
                                        <button type="button" class="btn bg-pink waves-effect">
                                            <a href="dlt-divisions.php?div=<?php echo $data['id']; ?>"
                                                onclick="return confirm('Are You Sure?')">
                                                <i class="material-icons">border_color</i>
                                                <span style="color:white">Delete</span>
                                            </a>
                                        </button>

                                    </td>
                                </tr>


                                <?php  }

                                ?>



                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>







    </div>
</section>
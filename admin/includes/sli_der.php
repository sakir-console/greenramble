<?php
$msg = '';


if (isset($_REQUEST['submit'])) {
    $tit_bn = $_REQUEST['title_bn'];
    $tit_en = $_REQUEST['title_en'];
    $slo_bn = $_REQUEST['slog_bn'];
    $slo_en = $_REQUEST['slog_en'];
    $img = $_FILES['sli_img']['name'];

    $filetype = $_FILES['sli_img']['type'];



    if ((!empty($tit_bn) && !empty($img)) || (!empty($tit_en) && !empty($img))) {

        if ($filetype == 'image/jpeg' or $filetype == 'image/png' or $filetype == 'image/jpg') {
            move_uploaded_file($_FILES['sli_img']['tmp_name'], 'uploads/sliders/' . $img);


            $insert = "INSERT INTO slider(bn_title,en_title,bn_slog,en_slog,img) VALUES('$tit_bn','$tit_en','$slo_bn','$slo_en','$img')";
            $run = mysqli_query($cn, $insert);
            if ($run) {

                $msg = "<b style='color:green'>Successfully Added</b>";
            } else {

                echo mysqli_connect_error();
            }
        } else {
            $msg = "<b style='color:red'>Image Should be jpg/png/jpeg</b>";
        }
    } else {
        $msg = "<b style='color:red'>Please Fill the Inputs with Image</b>";
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
            <h2>Sliders</h2>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Added Sliders
                            <small>Edit/Delete your Slider here.</small>
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
                                <form method="POST" action="" enctype="multipart/form-data">
                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane animated flipInX active"
                                            id="Bangla_animation_1">
                                            <div class="body">

                                                <label for="email_address">Slider Title</label>
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" name="title_bn" class="form-control"
                                                            placeholder="Enter the slider title">
                                                    </div>
                                                </div>
                                                <label for="email_address">Slider Slogan</label>
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" name="slog_bn" class="form-control"
                                                            placeholder="Enter the slider Slogan">
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div role="tabpanel" class="tab-pane animated flipInX" id="English_animation_1">

                                            <div class="body">

                                                <label for="email_address">Slider Title</label>
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" name="title_en" class="form-control"
                                                            placeholder="Enter the slider title">
                                                    </div>
                                                </div> <label for="email_address">Slider Slogan</label>
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" name="slog_en" class="form-control"
                                                            placeholder="Enter the slider Slogan">
                                                    </div>
                                                </div>




                                            </div>
                                        </div>
                                        <label for="password">Upload Image</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="file" name="sli_img">
                                            </div>
                                        </div>

                                        <div class="col-xs-2">
                                            <button class="btn btn-block bg-pink waves-effect" type="submit"
                                                name="submit">Add Slider</button>
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
                            Added Sliders
                            <small>Edit/Delete your Slider here.</small>
                        </h2>

                        <?php
                        date_default_timezone_set('Asia/Dhaka');
                        echo date("d-M-y h:i");

                        ?>

                        <?php
                        date_default_timezone_set("Asia/Dhaka");
                        echo "The time is " . date("Y-m-d h:i a");
                        ?>
                    </div>
                    <div class="body table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Slider Title(BN)</th>
                                    <th>Slider Title(EN)</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>


                                <?php
                                $sl = 0;

                                $view = "SELECT * FROM slider";
                                $run = mysqli_query($cn, $view);
                                while ($data = mysqli_fetch_array($run)) {
                                    $sl++;

                                ?>



                                <tr>
                                    <th scope="row"><?php echo $sl; ?></th>
                                    <td><?php echo $data['bn_title']; ?></td>
                                    <td><?php echo $data['en_title']; ?></td>
                                    <td><img src='uploads/sliders/<?php echo $data["img"]; ?>' height='45px'
                                            width='75px' />
                                    </td>
                                    <td><button type="button" class="btn bg-teal waves-effect">
                                            <a href="edit-sliders.php?id=<?php echo $data['id']; ?>">
                                                <i class="material-icons">border_color</i>
                                                <span style="color:white">Edit</span>
                                            </a>
                                        </button>
                                        <button type="button" class="btn bg-pink waves-effect">
                                            <a href="dlt-sliders.php?id=<?php echo $data['id']; ?>"
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
<?php
$msg = '';
$spot_id = $_REQUEST['sptid'];
				

if (isset($_REQUEST['submit'])) {
    $tit_bn = $_REQUEST['title_bn'];
    $tit_en = $_REQUEST['title_en'];
    $short_bn = $_REQUEST['srt_bn'];
    $short_en = $_REQUEST['srt_en'];
    $des_bn = $_REQUEST['des_bn'];
    $des_en = $_REQUEST['des_en'];


    $img1 = $_FILES['img1']['name'];
    $img2 = $_FILES['img2']['name'];
    $img3 = $_FILES['img3']['name'];

    $filetype1 = $_FILES['img1']['type'];
    $filetype2 = $_FILES['img2']['type'];
    $filetype3 = $_FILES['img3']['type'];

    $vid_tit1 = $_REQUEST['vid_tit1'];
    $vid_tit2 = $_REQUEST['vid_tit2'];
    $vid_url1 = $_REQUEST['vdo_url1'];
    $vid_url2 = $_REQUEST['vdo_url2'];



    if ((!empty($tit_bn) && !empty($des_bn)  && !empty($short_bn)) ||
        (!empty($tit_en) &&  !empty($des_en)  && !empty($short_en))

    ) {

        if ( ( (!empty($img1) && !empty($img2)) || !empty($img3)) &&
            (($filetype1 == 'image/jpeg' or $filetype1 == 'image/png' or $filetype1 == 'image/jpg') &&
                ($filetype2 == 'image/jpeg' or $filetype2 == 'image/png' or $filetype2 == 'image/jpg')) ||
            ($filetype3 == 'image/jpeg' or $filetype3 == 'image/png' or $filetype3 == 'image/jpg')

        ) {
            move_uploaded_file($_FILES['img1']['tmp_name'], 'uploads/tour-places/' . $img1);
            move_uploaded_file($_FILES['img2']['tmp_name'], 'uploads/tour-places/' . $img2);
            move_uploaded_file($_FILES['img3']['tmp_name'], 'uploads/tour-places/' . $img3);

                $pic_up="UPDATE tour_place SET
				pic1='$img1',
                pic2='$img2',
                pic3='$img3'
				WHERE id='$spot_id'
				";

 $run = mysqli_query($cn, $pic_up);

  } else {
            echo mysqli_connect_error();
            $msg = "<b style='color:red'>Image Should be jpg/png/jpeg</b>";
        }
            $update = "UPDATE tour_place SET
                bn_title='$tit_bn',
                en_title='$tit_en',
                bn_s_des='$short_bn',
                en_s_des='$short_en',
                bn_des='$des_bn',
                en_des='$des_en',
                
                vid_title1='$vid_tit1',
                vid_title2='$vid_tit2',
                vid_url1='$vid_url1',
                vid_url2='$vid_url2'
                WHERE id='$spot_id'";

            $run = mysqli_query($cn, $update);
            if ($run) {
                $msg = "11";
                $msg = "<b style='color:green'>Successfully Updated</b>";
            } else {

                echo mysqli_connect_error();
            }
      
    } else {
        echo mysqli_connect_error();
        $msg = "<b style='color:red'>Please Fill the Inputs with Titile,Two Image(At Least),Short Description, Description.</b>";
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
            <h2>Tourist Spot</h2>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Edit Tourist Spot
                            <small>Edit tourist spot here.</small>
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
                                <form action="" method="POST" enctype="multipart/form-data">

                                    <?php
                                    $view = "SELECT * FROM tour_place WHERE id='$spot_id'";

                                    $run = mysqli_query($cn, $view);
                                    while ($data = mysqli_fetch_array($run)) {


                                    ?>

                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane animated flipInX active"
                                            id="Bangla_animation_1">
                                            <div class="body">

                                                <label for="email_address">Tour Place
                                                    Title<?php echo $data['bn_title']; ?></label>
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" name="title_bn" class="form-control"
                                                            value="<?php echo htmlentities($data['bn_title']); ?>">
                                                    </div>
                                                </div>
                                                <label for="email_address">Short
                                                    Description</label>
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <textarea name="srt_bn" class="form-control"><?php echo $data['bn_s_des']; ?>
                                                        </textarea>
                                                    </div>
                                                </div>


                                                <label for="email_address">Full Description</label>

                                                <textarea id="ckeditor" name="des_bn">
                                                         <?php echo $data['bn_des']; ?>
                                                </textarea>

                                            </div>
                                        </div>
                                        <div role="tabpanel" class="tab-pane animated flipInX" id="English_animation_1">
                                            <div class="body">

                                                <label for="email_address">Tour Place Title</label>
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" name="title_en" class="form-control"
                                                            value="<?php echo $data['en_title']; ?>">
                                                    </div>
                                                </div>
                                                <label for="email_address">Short Description</label>
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <textarea name="srt_en"
                                                            class="form-control"><?php echo $data['en_s_des']; ?></textarea>
                                                    </div>
                                                </div>


                                                <label for="email_address">Full Description</label>

                                                <textarea id="ckeditor2" name="des_en">
                                                        <?php echo $data['en_des']; ?>
                                                </textarea>

                                            </div>
                                        </div>
                                        <label for="password">Upload Image (1)</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="file" name="img1">
                                            </div>
                                        </div>

                                        <label for="password">Upload Image (2)</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="file" name="img2">
                                            </div>
                                        </div>

                                        <label for="password">Upload Image (3)</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="file" name="img3">
                                            </div>
                                        </div>



                                        <label for="password">Video Gallery</label>
                                        <div class="row clearfix">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" name="vid_tit1"
                                                            value="<?php echo $data['vid_title1']; ?>"
                                                            placeholder="Video TitileL(1)">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" name="vdo_url1"
                                                            value="<?php echo $data['vid_url1']; ?>"
                                                            placeholder="Video URL(1)">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" name="vid_tit2"
                                                            value="<?php echo $data['vid_title2']; ?>"
                                                            placeholder="Video Title(2)">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" name="vdo_url2"
                                                            value="<?php echo $data['vid_url2']; ?>"
                                                            placeholder="Video URL(2)">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                        <button class="btn btn-block bg-pink waves-effect" type="submit"
                                            name="submit">Update
                                            Spot</button>
                                    </div>
                                    <?php } ?>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</section>
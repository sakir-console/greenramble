<?php
$msg = '';


if (
    isset($_REQUEST['uname'])
    && isset($_REQUEST['umail'])
    && isset($_REQUEST['umail'])
    && isset($_REQUEST['uaddr'])
    && isset($_REQUEST['place_addr'])
    && isset($_FILES['place_file']['name'])
    && isset($_REQUEST['place_des'])
    && isset($_REQUEST['submit'])
) {
    $uname = mysqli_real_escape_string($cn, $_REQUEST['uname']);
    $umail = mysqli_real_escape_string($cn, $_REQUEST['umail']);
    $uaddr = mysqli_real_escape_string($cn, $_REQUEST['uaddr']);
    $place_addr = mysqli_real_escape_string($cn, $_REQUEST['place_addr']);
    $place_file = mysqli_real_escape_string($cn, $_FILES['place_file']['name']);
    $vdo_url = mysqli_real_escape_string($cn, $_REQUEST['vdo_url']);
    $place_des = mysqli_real_escape_string($cn, $_REQUEST['place_des']);

    $maxSize = 100000000;
    $file_size = $_FILES['place_file']['size'];


    if (
        (!empty($uname)
            && !empty($umail)
            && !empty($uaddr)
            && !empty($place_addr)
            && !empty($place_file)
            && !empty($place_des)) && $file_size <= $maxSize

    ) {
        $insert = "INSERT INTO submit_place(usr_name,usr_email,usr_addr,place_addr,place_file,place_vdo_url,place_des) 
        VALUES('$uname','$umail','$uaddr','$place_addr','$place_file','$vdo_url','$place_des') ";
        $run = mysqli_query($cn, $insert);
        if ($run) {

            move_uploaded_file($_FILES['place_file']['tmp_name'], 'public/uploads/places/' . $place_file);

            echo mysqli_connect_error();
            echo "<script>alert('Successfully Submitted Your Place.');</script>";
        } else {

            echo mysqli_connect_error();
        }
    } else {
        $msg = "<b style='color:red'>Please Enter all the  ( * ) Fields.Fize Size(Max 10MB)</b>";
    }
}


?>




<div id="main" class="col-sms-6 col-sm-8 col-md-9">
    <div class="booking-section travelo-box">

        <form class="booking-form" method="POST" action="" enctype="multipart/form-data">
            <div class="person-information">
                <h2 style=" font-family: Hind Siliguri;font-size: 26px;color: black;margin-bottom:25px">
                    <?php echo $lng['add_tour_place']; ?> <?php echo $msg; ?></h2>
                <div class="form-group row">
                    <div class="col-sm-6 col-md-5">
                        <label
                            style=" font-family: Hind Siliguri;font-size: 18px;color: #2393a5;"><?php echo $lng['your_name']; ?>
                            *</label>
                        <input type="text" name="uname" class="input-text full-width" value="" placeholder="" />
                    </div>
                    <div class="col-sm-6 col-md-5">
                        <label
                            style=" font-family: Hind Siliguri;font-size: 18px;color: #2393a5;"><?php echo $lng['your_email']; ?>
                            *
                        </label>
                        <input type="text" name="umail" class="input-text full-width" value="" placeholder="" />
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 col-md-5">
                        <label
                            style=" font-family: Hind Siliguri;font-size: 18px;color: #2393a5;"><?php echo $lng['your_adress']; ?>
                            *</label>
                        <input type="text" name="uaddr" class="input-text full-width" value="" placeholder="" />
                    </div>
                    <div class="col-sm-6 col-md-5">
                        <label
                            style=" font-family: Hind Siliguri;font-size: 18px;color: #2393a5;"><?php echo $lng['place_name']; ?>
                            *</label>
                        <input type="text" name="place_addr" class="input-text full-width" value="" placeholder="" />
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 col-md-10">
                        <label
                            style=" font-family: Hind Siliguri;font-size: 18px;color: #2393a5;"><?php echo $lng['place_img']; ?>
                            *</label>
                        <div class="fileinput full-width" style="line-height: 34px;">
                            <input type="file" name="place_file" class="input-text"
                                data-placeholder="select image/s"><input type="text" class="custom-fileinput input-text"
                                placeholder="select image/s">
                        </div>
                    </div>

                </div>
                <div class="form-group">

                    <label>
                        <?php echo $lng['make_zip']; ?> (Max 10 MB)
                    </label>

                </div>
            </div>
            <hr />
            <div class="card-information">

                <div class="form-group row">
                    <div class="col-sm-6 col-md-12">
                        <label style=" font-family: Hind Siliguri;font-size: 18px;color: #2393a5;">
                            <?php echo $lng['place_vdo']; ?></label>
                        <input type="text" name="vdo_url" class="input-text full-width" value=""
                            placeholder="<?php echo $lng['place_vdo_placeholder']; ?>" />
                    </div>



                </div>
                <div class="form-group row">
                    <div class="col-sm-6 col-md-12">
                        <label
                            style=" font-family: Hind Siliguri;font-size: 18px;color: #2393a5;"><?php echo $lng['place_des']; ?>
                            *
                        </label>
                        <textarea type="text" name="place_des" class="input-text full-width" value="" rows="7"
                            placeholder="" height="70px"></textarea>

                        <label><?php echo $lng['place_des_placeholder']; ?></label>
                    </div>

                </div>

            </div>
            <hr />
            <div class="form-group">
                <div class="checkbox">
                    <label style=" font-family: Hind Siliguri;font-size: 15px;color: balck;">
                        <input type="checkbox"> <?php echo $lng['all_info_correct']; ?>
                    </label>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-6 col-md-5">
                    <button type="submit" class="full-width btn-large" name="submit"
                        style=" font-family: Hind Siliguri;font-size: 18px;color: white;"><?php echo $lng['add_now']; ?></button>
                </div>
            </div>
        </form>
    </div>
</div>
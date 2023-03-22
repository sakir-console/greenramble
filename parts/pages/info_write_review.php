<?php
$msg = '';


if (isset($_REQUEST['tpid']) && isset($_REQUEST['submit'])) {
    $usr_name = mysqli_real_escape_string($cn, $_REQUEST['uname']);
    $rev_title = mysqli_real_escape_string($cn, $_REQUEST['revTitle']);
    $rev_des = mysqli_real_escape_string($cn, $_REQUEST['revDes']);
    $tpID = mysqli_real_escape_string($cn, $_REQUEST['tpid']);



    if ((!empty($usr_name) && !empty($rev_title) && !empty($rev_des))) {
        $insert = "INSERT INTO review(usr_name,title,details,tour_place_id) VALUES('$usr_name','$rev_title','$rev_des','$tpID') ";
        $run = mysqli_query($cn, $insert);
        if ($run) {
            echo mysqli_connect_error();
            echo "<script>alert('Successfully Added Review.');</script>";
        } else {

            echo mysqli_connect_error();
        }
    } else {
        $msg = "<b style='color:red'>Please Enter all the Fields.</b>";
    }
}


?>

<div class="tab-pane fade" id="hotel-write-review">

    <form class="review-form" action="" method="POST">
        <div class="form-group col-md-5 no-float no-padding">
            <h4 class="title">Your Name</h4>
            <input type="text" name="uname" class="input-text full-width" value="" placeholder="enter a review title" />
        </div>
        <div class="form-group col-md-5 no-float no-padding">
            <h4 class="title">রিভিউ টাইটেল</h4>
            <input type="text" name="revTitle" class="input-text full-width" value=""
                placeholder="enter a review title" />
        </div>
        <div class="form-group">
            <h4 class="title">রিভিও বর্ণণা</h4>
            <textarea class="input-text full-width" name="revDes"
                placeholder="enter your review (minimum 200 characters)" rows="5"></textarea>
        </div>


        <div class="form-group col-md-5 no-float no-padding no-margin">
            <button type="submit" class="btn-large full-width" name="submit">SUBMIT REVIEW</button>
        </div>
    </form>

</div>
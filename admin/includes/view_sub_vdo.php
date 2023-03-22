<?php
$sv_id = $_REQUEST['subv'];
if (isset($sv_id)) {

?>



<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Submitted Video</h2>
        </div>



        <!-- Hover Rows -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                <?php

                    $view = "SELECT * FROM submit_vdo WHERE id='$sv_id'";
                    $run = mysqli_query($cn, $view);
                    while ($data = mysqli_fetch_array($run)) {


                    ?>

                <div class="card">
                    <div class="header">
                        <h2>
                            <?php echo $data['place_addr']; ?>

                        </h2>

                    </div>
                    <div class="body">

                        <h5>User Name:</h5>
                        <p class="m-t-15 m-b-30">
                            <?php echo $data['usr_name']; ?>

                        </p>

                    </div>
                    <div class="body">

                        <h5>User Email:</h5>
                        <p class="m-t-15 m-b-30">
                            <?php echo $data['usr_email']; ?>

                        </p>

                    </div>
                    <div class="body">

                        <h5>User Address:</h5>
                        <p class="m-t-15 m-b-30">
                            <?php echo $data['usr_addr']; ?>

                        </p>

                    </div>
                    <div class="body">

                        <h5>Place Address:</h5>
                        <p class="m-t-15 m-b-30">
                            <?php echo $data['place_addr']; ?>

                        </p>

                    </div>

                    <div class="body">

                        <h5>Place Video Url:</h5>
                        <p class="m-t-15 m-b-30">
                            <?php echo $data['place_vdo_url']; ?></a>
                        </p>

                    </div>
                    <div class="body">

                        <h5>Place Description</h5>
                        <p class="m-t-15 m-b-30">
                            <?php echo $data['place_des']; ?></a>
                        </p>

                    </div>
                </div>


                <?php  }

                    ?>

            </div>
        </div>







    </div>
</section>


<?php } ?>
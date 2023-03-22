<?php
$sp_id = $_REQUEST['subp'];
if (isset($sp_id)) {

?>



<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Submitted Place</h2>
        </div>



        <!-- Hover Rows -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                <?php

                    $view = "SELECT * FROM submit_place WHERE id='$sp_id'";
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

                        <h5>Place Image/File</h5>
                        <p class="m-t-15 m-b-30">
                            <a href="../public/uploads/places/<?php echo $data['place_file']; ?>">
                                <?php echo $data['place_file']; ?></a>


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
<?php
$msg = '';


if (isset($_REQUEST['dlt'])) {
    if ($_REQUEST['dlt'] == true) {
        $msg = "<b style='color:red'>Successfully Deleted.</b>";
    }
}



?>




<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Submitted Place</h2>
        </div>



        <!-- Hover Rows -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Submitted Place
                            <small>View/Delete your Submitted Place here.</small>
                        </h2>
                        <?php echo $msg; ?>
                    </div>
                    <div class="body table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>User Name</th>
                                    <th>Place Address</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>


                                <?php
                                $sl = 0;

                                $view = "SELECT * FROM submit_place ORDER BY id DESC";
                                $run = mysqli_query($cn, $view);
                                while ($data = mysqli_fetch_array($run)) {
                                    $sl++;

                                ?>


                                <tr>
                                    <th scope="row"><?php echo $sl;
                                                        ?></th>
                                    <td> <?php echo $data['usr_name']; ?>
                                    </td>
                                    <td> <?php echo $data['place_addr']; ?>
                                    </td>
                                    <td>

                                        <button type="button" class="btn bg-pink waves-effect">
                                            <a href="dlt-sub-place.php?subp=<?php echo $data['id']; ?>"
                                                onclick="return confirm('Are You Sure?')">
                                                <i class="material-icons">delete_forever</i>
                                                <span style="color:white">Delete</span>
                                            </a>
                                        </button>
                                        <button type="button" class="btn btn-primary waves-effect">
                                            <a href="view-sub-place.php?subp=<?php echo $data['id']; ?>">
                                                <i class="material-icons" style="color:white">launch</i>
                                                <span style="color:white">View</span>
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
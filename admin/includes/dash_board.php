 <?php $msg = ''; ?>
 <section class="content">
     <div class="container-fluid">
         <div class="block-header">
             <h2>DASHBOARD</h2>
         </div>

         <!-- Widgets -->
         <div class="row clearfix">
             <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                 <div class="info-box bg-pink hover-expand-effect">
                     <div class="icon">
                         <i class="material-icons">playlist_add_check</i>
                     </div>
                     <div class="content">
                         <div class="text">Tourist Spots</div>

                         <?php $query = "SELECT * FROM tour_place";
                            $run_query = mysqli_query($cn, $query);
                            //Count total number of rows
                            $count = mysqli_num_rows($run_query);

                            ?>

                         <div class="number count-to" data-from="0" data-to="<?php echo $count; ?>" data-speed="15"
                             data-fresh-interval="20"></div>
                     </div>
                 </div>
             </div>
             <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                 <div class="info-box bg-cyan hover-expand-effect">
                     <div class="icon">
                         <i class="material-icons">help</i>
                     </div>
                     <div class="content">
                         <div class="text">Total Places</div>

                         <?php $query = "SELECT * FROM loc_districts";
                            $run_query = mysqli_query($cn, $query);
                            //Count total number of rows
                            $count1 = mysqli_num_rows($run_query);

                            ?>
                         <div class="number count-to" data-from="0" data-to="<?php echo $count1; ?>" data-speed="1000"
                             data-fresh-interval="20"></div>
                     </div>
                 </div>
             </div>

             <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                 <div class="info-box bg-orange hover-expand-effect">
                     <div class="icon">
                         <i class="material-icons">person_add</i>
                     </div>
                     <div class="content">
                         <div class="text">Popular Spots</div>

                         <?php $query = "SELECT popularity FROM tour_place WHERE popularity='1'";
                            $run_query = mysqli_query($cn, $query);
                            //Count total number of rows
                            $count2 = mysqli_num_rows($run_query);

                            ?>
                         <div class="number count-to" data-from="0" data-to="<?php echo $count2; ?>" data-speed="1000"
                             data-fresh-interval="20"></div>
                     </div>
                 </div>
             </div>


             <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                 <div class="info-box bg-light-green hover-expand-effect">
                     <div class="icon">
                         <i class="material-icons">forum</i>
                     </div>
                     <div class="content">
                         <div class="text">Blogs</div>
                         <div class="number count-to" data-from="0" data-to="0" data-speed="1000"
                             data-fresh-interval="20"></div>
                     </div>
                 </div>
             </div>
         </div>
         <!-- #END# Widgets -->
         <!-- CPU Usage -->

         <!-- Hover Rows -->
         <div class="row clearfix">
             <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                 <div class="card">
                     <div class="header">
                         <h2>
                             Most Popular Spot List

                         </h2>
                         <div id="msg" style="color:green"></div>
                         <?php echo $msg; ?>
                     </div>
                     <div class="body table-responsive">
                         <table class="table table-hover">
                             <thead>
                                 <tr>
                                     <th>#</th>
                                     <th>Spot Title</th>
                                     <th>District</th>
                                     <th>Division</th>

                                 </tr>
                             </thead>
                             <tbody>

                                 <?php
                                    $sl = 0;

                                    $view = "SELECT 
                                    tour_place.id AS tID,
                                    tour_place.bn_title AS bnTitle,
                                    tour_place.en_title AS enTitle,
                                    tour_place.div_id AS divID,
                                    tour_place.dis_id AS disID,
                                    tour_place.popularity AS popular,

                                    loc_divisions.bn_name AS divName,
                                    loc_districts.bn_name AS disName
                                    FROM tour_place
                                    INNER JOIN loc_divisions
                                              ON tour_place.div_id= loc_divisions.id
                                    INNER JOIN loc_districts
                                              ON tour_place.dis_id= loc_districts.id
                                    WHERE popularity='1'          
                                        ";
                                    $run = mysqli_query($cn, $view);
                                    while ($data = mysqli_fetch_array($run)) {
                                        $sl++;

                                    ?>



                                 <tr>
                                     <th scope="row"><?php echo $sl; ?></th>
                                     <td><?php
                                                if (empty($data['bnTitle'])) {

                                                    echo $data['enTitle'];
                                                } else {

                                                    echo  $data['bnTitle'];
                                                }
                                                ?></td>
                                     <td><?php echo $data['disName']; ?></td>
                                     <td><?php echo $data['divName']; ?></td>


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
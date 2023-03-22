<div class="col-sm-8 col-md-9">


    <div class="sort-by-section clearfix">


        <ul class="tabs" style=" font-family: Hind Siliguri;font-size: 18px;">

            <li class="pull-right"><a class="button btn-small yellow-bg white-color"
                    href="district-map.php"><?php echo $lng['see_map_wise']; ?></a></li>
        </ul>
        <br>
        <br>

        <style>
        .sort-by-section li {
            padding: 0
        }

        .tab-container.full-width-style ul.tabs li a {
            height: 80px
        }

        table {
            font-family: Hind Siliguri, arial, sans-serif;
            border-collapse: collapse;
            width: 50%;
            margin: 35px auto;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: center;
            padding: 10px;
            font-size: 15px;
        }

        tr:nth-child(even) {
            background-color: #f3f3f3;
        }
        </style>


        <div class="block">
            <h2 style=" font-family: Hind Siliguri;font-size: 23px;color:#31a6d3"><?php echo $lng['see_dis_wise']; ?>
            </h2>
            <hr>
            <div class="tab-container full-width-style white-bg">
                <ul class="tabs">
                    <li class="active"><a href="#dha-tab" data-toggle="tab" aria-expanded="true"
                            style=" font-family: Hind Siliguri;font-size: 18px;"><i
                                class="soap-icon-insurance circle"></i>
                            <?php $r = mysqli_query($cn, "SELECT {$ln}_name FROM loc_divisions WHERE id='1'");
                            while ($data = mysqli_fetch_array($r)) {
                                echo $data[$ln . '_name'];
                            } ?></a></li>
                    <li class=""><a href="#chi-tab" data-toggle="tab" aria-expanded="false"
                            style=" font-family: Hind Siliguri;font-size: 18px;"><i
                                class="soap-icon-insurance circle"></i><?php $r = mysqli_query($cn, "SELECT {$ln}_name FROM loc_divisions WHERE id='2'");
                                                                                                                                                                                            while ($data = mysqli_fetch_array($r)) {
                                                                                                                                                                                                echo $data[$ln . '_name'];
                                                                                                                                                                                            } ?></a>
                    </li>
                    <li class=""><a href="#syl-tab" data-toggle="tab" aria-expanded="false"
                            style=" font-family: Hind Siliguri;font-size: 18px;"><i
                                class="soap-icon-insurance circle"></i><?php $r = mysqli_query($cn, "SELECT {$ln}_name FROM loc_divisions WHERE id='3'");
                                                                                                                                                                                            while ($data = mysqli_fetch_array($r)) {
                                                                                                                                                                                                echo $data[$ln . '_name'];
                                                                                                                                                                                            } ?></a>
                    </li>
                    <li class=""><a href="#bar-tab" data-toggle="tab" aria-expanded="false"
                            style=" font-family: Hind Siliguri;font-size: 18px;"><i
                                class="soap-icon-insurance circle"></i><?php $r = mysqli_query($cn, "SELECT {$ln}_name FROM loc_divisions WHERE id='4'");
                                                                                                                                                                                            while ($data = mysqli_fetch_array($r)) {
                                                                                                                                                                                                echo $data[$ln . '_name'];
                                                                                                                                                                                            } ?></a>
                    </li>
                    <li class=""><a href="#khu-tab" data-toggle="tab" aria-expanded="false"
                            style=" font-family: Hind Siliguri;font-size: 18px;"><i
                                class="soap-icon-insurance circle"></i><?php $r = mysqli_query($cn, "SELECT {$ln}_name FROM loc_divisions WHERE id='5'");
                                                                                                                                                                                            while ($data = mysqli_fetch_array($r)) {
                                                                                                                                                                                                echo $data[$ln . '_name'];
                                                                                                                                                                                            } ?></a>
                    </li>
                    <li class=""><a href="#raj-tab" data-toggle="tab" aria-expanded="false"
                            style=" font-family: Hind Siliguri;font-size: 18px;"><i
                                class="soap-icon-insurance circle"></i><?php $r = mysqli_query($cn, "SELECT {$ln}_name FROM loc_divisions WHERE id='6'");
                                                                                                                                                                                            while ($data = mysqli_fetch_array($r)) {
                                                                                                                                                                                                echo $data[$ln . '_name'];
                                                                                                                                                                                            } ?></a>
                    </li>
                    <li class=""><a href="#mymen-tab" data-toggle="tab" aria-expanded="false"
                            style=" font-family: Hind Siliguri;font-size: 18px;"><i
                                class="soap-icon-insurance circle"></i><?php $r = mysqli_query($cn, "SELECT {$ln}_name FROM loc_divisions WHERE id='7'");
                                                                                                                                                                                                while ($data = mysqli_fetch_array($r)) {
                                                                                                                                                                                                    echo $data[$ln . '_name'];
                                                                                                                                                                                                } ?></a>
                    </li>
                    <li class=""><a href="#rang-tab" data-toggle="tab" aria-expanded="false"
                            style=" font-family: Hind Siliguri;font-size: 18px;"><i
                                class="soap-icon-insurance circle"></i><?php $r = mysqli_query($cn, "SELECT {$ln}_name FROM loc_divisions WHERE id='8'");
                                                                                                                                                                                            while ($data = mysqli_fetch_array($r)) {
                                                                                                                                                                                                echo $data[$ln . '_name'];
                                                                                                                                                                                            } ?></a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade active in" id="dha-tab">
                        <h2 class="tab-content-title"
                            style=" font-family: Hind Siliguri;font-size: 18px;margin-left: 37%;color:#7ca0ac">
                            <?php echo $lng['select_district']; ?></h2>




                        <table>

                            <?php $r = mysqli_query($cn, "SELECT * FROM loc_districts WHERE div_id='1'");
                            while ($data = mysqli_fetch_array($r)) { ?>
                            <tr>
                                <td>
                                    <a
                                        href="tour-places.php?division_tp_id=<?php echo $data['div_id']; ?>&district_tp_id=<?php echo $data['id']; ?>">
                                        <?php echo $data[$ln . '_name']; ?></a>
                                </td>

                            </tr>
                            <?php  } ?>




                        </table>

                    </div>
                    <div class="tab-pane fade" id="chi-tab">
                        <h2 class="tab-content-title"
                            style=" font-family: Hind Siliguri;font-size: 18px;margin-left: 37%;color:#7ca0ac">
                            <?php echo $lng['select_district']; ?></h2>




                        <table>

                            <?php $r = mysqli_query($cn, "SELECT * FROM loc_districts WHERE div_id='2'");
                            while ($data = mysqli_fetch_array($r)) { ?>
                            <tr>
                                <td>
                                    <a
                                        href="tour-places.php?division_tp_id=<?php echo $data['div_id']; ?>&district_tp_id=<?php echo $data['id']; ?>">
                                        <?php echo $data[$ln . '_name']; ?></a>
                                </td>

                            </tr>
                            <?php  } ?>




                        </table>

                    </div>
                    <div class="tab-pane fade" id="syl-tab">
                        <h2 class="tab-content-title"
                            style=" font-family: Hind Siliguri;font-size: 18px;margin-left: 37%;color:#7ca0ac">
                            <?php echo $lng['select_district']; ?></h2>




                        <table>

                            <?php $r = mysqli_query($cn, "SELECT * FROM loc_districts WHERE div_id='3'");
                            while ($data = mysqli_fetch_array($r)) { ?>
                            <tr>
                                <td>
                                    <a
                                        href="tour-places.php?division_tp_id=<?php echo $data['div_id']; ?>&district_tp_id=<?php echo $data['id']; ?>">
                                        <?php echo $data[$ln . '_name']; ?></a>
                                </td>

                            </tr>
                            <?php  } ?>




                        </table>

                    </div>
                    <div class="tab-pane fade" id="bar-tab">
                        <h2 class="tab-content-title"
                            style=" font-family: Hind Siliguri;font-size: 18px;margin-left: 37%;color:#7ca0ac">
                            <?php echo $lng['select_district']; ?></h2>




                        <table>

                            <?php $r = mysqli_query($cn, "SELECT * FROM loc_districts WHERE div_id='4'");
                            while ($data = mysqli_fetch_array($r)) { ?>
                            <tr>
                                <td>
                                    <a
                                        href="tour-places.php?division_tp_id=<?php echo $data['div_id']; ?>&district_tp_id=<?php echo $data['id']; ?>">
                                        <?php echo $data[$ln . '_name']; ?></a>
                                </td>

                            </tr>
                            <?php  } ?>




                        </table>

                    </div>
                    <div class="tab-pane fade" id="khu-tab">
                        <h2 class="tab-content-title"
                            style=" font-family: Hind Siliguri;font-size: 18px;margin-left: 37%;color:#7ca0ac">
                            <?php echo $lng['select_district']; ?></h2>




                        <table>

                            <?php $r = mysqli_query($cn, "SELECT * FROM loc_districts WHERE div_id='5'");
                            while ($data = mysqli_fetch_array($r)) { ?>
                            <tr>
                                <td>
                                    <a
                                        href="tour-places.php?division_tp_id=<?php echo $data['div_id']; ?>&district_tp_id=<?php echo $data['id']; ?>">
                                        <?php echo $data[$ln . '_name']; ?></a>
                                </td>

                            </tr>
                            <?php  } ?>




                        </table>

                    </div>
                    <div class="tab-pane fade" id="raj-tab">
                        <h2 class="tab-content-title"
                            style=" font-family: Hind Siliguri;font-size: 18px;margin-left: 37%;color:#7ca0ac">
                            <?php echo $lng['select_district']; ?></h2>




                        <table>

                            <?php $r = mysqli_query($cn, "SELECT * FROM loc_districts WHERE div_id='6'");
                            while ($data = mysqli_fetch_array($r)) { ?>
                            <tr>
                                <td>
                                    <a
                                        href="tour-places.php?division_tp_id=<?php echo $data['div_id']; ?>&district_tp_id=<?php echo $data['id']; ?>">
                                        <?php echo $data[$ln . '_name']; ?></a>
                                </td>

                            </tr>
                            <?php  } ?>




                        </table>

                    </div>
                    <div class="tab-pane fade" id="mymen-tab">
                        <h2 class="tab-content-title"
                            style=" font-family: Hind Siliguri;font-size: 18px;margin-left: 37%;color:#7ca0ac">
                            <?php echo $lng['select_district']; ?></h2>




                        <table>

                            <?php $r = mysqli_query($cn, "SELECT * FROM loc_districts WHERE div_id='7'");
                            while ($data = mysqli_fetch_array($r)) { ?>
                            <tr>
                                <td>
                                    <a
                                        href="tour-places.php?division_tp_id=<?php echo $data['div_id']; ?>&district_tp_id=<?php echo $data['id']; ?>">
                                        <?php echo $data[$ln . '_name']; ?></a>
                                </td>

                            </tr>
                            <?php  } ?>




                        </table>

                    </div>
                    <div class="tab-pane fade" id="rang-tab">
                        <h2 class="tab-content-title"
                            style=" font-family: Hind Siliguri;font-size: 18px;margin-left: 37%;color:#7ca0ac">
                            <?php echo $lng['select_district']; ?></h2>




                        <table>

                            <?php $r = mysqli_query($cn, "SELECT * FROM loc_districts WHERE div_id='8'");
                            while ($data = mysqli_fetch_array($r)) { ?>
                            <tr>
                                <td>
                                    <a
                                        href="tour-places.php?division_tp_id=<?php echo $data['div_id']; ?>&district_tp_id=<?php echo $data['id']; ?>">
                                        <?php echo $data[$ln . '_name']; ?></a>
                                </td>

                            </tr>
                            <?php  } ?>




                        </table>

                    </div>
                </div>
            </div>
        </div>

    </div>


</div>
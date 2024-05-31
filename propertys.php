<!-- Property List Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-0 gx-5 align-items-end">
            <div class="col-lg-6">
                <div class="text-start mx-auto mb-5 wow slideInLeft" data-wow-delay="0.1s">
                    <h1 class="mb-3">Property Listing</h1>
                </div>
            </div>
        </div>
        <div class="tab-content">
            <div id="tab-1" class="tab-pane fade show p-0 active">
                <div class="row g-4">
                    <?php
                    include ('config.php');
                    $sql_show_user = "SELECT * FROM achievement WHERE active_record = 'Yes' ORDER BY aid DESC";
                    $result_sql_show_user = mysqli_query($conn, $sql_show_user) or die("Query Failed!!");
                    if (mysqli_num_rows($result_sql_show_user) > 0) {
                        $delay = 1;
                        while ($row = mysqli_fetch_assoc($result_sql_show_user)) {
                            ?>
                            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.<?php $delay ?>s">
                                <div class="property-item rounded overflow-hidden">
                                    <div class="position-relative overflow-hidden">
                                        <a><img class="img-fluid" src="admin/upload/<?php echo ($row['aimg']) ?>"
                                                alt="unlink"></a>
                                        <div
                                            class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">
                                            For Sell</div>
                                        <div
                                            class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">
                                            <?php
                                            $cate_id = ($row['atype']);
                                            $sql_show_category = "SELECT * FROM category WHERE category_id = '{$cate_id}'";
                                            $result_sql_show_category = mysqli_query($conn, $sql_show_category) or die("Query Failed!! --> sql_show_category");
                                            if (mysqli_num_rows($result_sql_show_category) > 0) {
                                                while ($row_cat = mysqli_fetch_assoc($result_sql_show_category)) {
                                                    echo ($row_cat['category_name']);
                                                }
                                            } ?>
                                        </div>
                                    </div>
                                    <div class="p-4 pb-0">
                                        <h5 class="text-primary mb-3">Rs/- <?php echo ($row['price']) ?></h5>
                                        <a class="d-block h5 mb-2" href=""><?php echo ($row['atitle']) ?></a>
                                        <p><i class="fa fa-map-marker-alt text-primary me-2"></i><?php echo ($row['address']) ?>
                                        </p>
                                    </div>
                                    <div class="d-flex border-top">
                                        <small class="flex-fill text-center border-end py-2"><i
                                                class="fa fa-ruler-combined text-primary me-2"></i><?php echo ($row['sqft']) ?>
                                            Sqft</small>
                                        <small class="flex-fill text-center border-end py-2"><i
                                                class="fa fa-bed text-primary me-2"></i><?php echo ($row['bed']) ?> Bed</small>
                                        <small class="flex-fill text-center py-2">
                                            <a
                                                href="https://api.whatsapp.com/send?phone=+918103429480&amp;text=I'd like to chat with you about <?php echo ($row['atitle']) ?> property.">
                                                <i class="fab fa-whatsapp text-primary me-2"></i>Contact </a>
                                        </small>
                                    </div>
                                </div>
                            </div>
                            <?php
                            $delay = $delay + 1;
                        }
                    } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Property List End -->
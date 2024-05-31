<?php include "header.php";
include ("config.php");
if ($_SESSION['user_role'] == 0) {
    echo "<script>window.location.href='$hostname/admin/'</script>";
} ?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1 class="admin-heading">Add Property</h1>
            </div>
            <div class="col-md-2">
                <a class="add-new" style="background:#E1412E; border-radius:16px; margin-bottom:25px;"
                    href="post-read.php"><i class="fa-solid fa-arrow-left"></i> Back</a>
            </div>
            <div class="col-md-offset-3 col-md-6">
                <!-- Form Start -->
                <?php
                if (isset($_POST['save'])) {
                    if (isset($_FILES['fileToUpload'])) {
                        if ($_FILES['fileToUpload']["size"] > 10485760) {
                            echo "<div class='alert alert-danger'>Image must be 10mb or lower.</div>";
                        }
                        $info = getimagesize($_FILES['fileToUpload']['tmp_name']);
                        if (isset($info['mime'])) {
                            if ($info['mime'] == "image/jpeg") {
                                $img = imagecreatefromjpeg($_FILES['fileToUpload']['tmp_name']);
                            } elseif ($info['mime'] == "image/png") {
                                $img = imagecreatefrompng($_FILES['fileToUpload']['tmp_name']);
                            } elseif ($info['mime'] == "image/webp") {
                                $img = imagecreatefromwebp($_FILES['fileToUpload']['tmp_name']);
                            } else {
                                echo "<div class='alert alert-danger'>This extension file not allowed, Please choose a JPG, JPEG, PNG or WEBP file.</div>";
                            }
                            if (isset($img)) {
                                $output_img = date("d_M_Y_h_i_sa") . "_" . basename($_FILES['fileToUpload']["name"]) . ".webp";
                                imagewebp($img, "upload/" . $output_img, 100);

                                include ("config.php");
                                $ntitle = mysqli_real_escape_string($conn, $_POST['title']);
                                $ndate = mysqli_real_escape_string($conn, $_POST['address']);
                                $ntype = mysqli_real_escape_string($conn, $_POST['type']);

                                $price = mysqli_real_escape_string($conn, $_POST['price']);
                                $sqft = mysqli_real_escape_string($conn, $_POST['sqft']);
                                $bed = mysqli_real_escape_string($conn, $_POST['bed']);

                                $userId = $_SESSION['username'];
                                $sql_insert_user = "INSERT INTO achievement (address, atitle, atype, userId, aimg, price, sqft, bed)
                                    values('{$ndate}','{$ntitle}','{$ntype}','{$userId}','{$output_img}', '{$price}', '{$sqft}', '{$bed}')";
                                if (mysqli_query($conn, $sql_insert_user)) {
                                    ?>
                                    <script>
                                        alert('Record is added successfully !!')
                                    </script>
                                    <?php
                                    echo "<script>window.location.href='$hostname/admin/post-read.php'</script>";
                                } else {
                                    ?>
                                    <script>
                                        alert('Record is Not added !!')
                                    </script>
                                    <?php
                                    echo "<script>window.location.href='$hostname/admin/post-read.php'</script>";
                                }
                            }
                        }
                    }
                }

                ?>
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" autocomplete="off"
                    enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Price</label>
                        <input type="number" name="price" class="form-control" placeholder="Price" required>
                    </div>
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control" placeholder="Title" required>
                    </div>

                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" name="address" class="form-control" placeholder="Address">
                    </div>

                    <div class="form-group">
                        <label>Type</label>
                        <select class="form-control" name="type">
                            <option disabled selected>Choose Type....</option>
                            <?php $sql_show_category = "SELECT * FROM category";
                            $result_sql_show_category = mysqli_query($conn, $sql_show_category) or die("Query Failed!! --> sql_show_category");
                            if (mysqli_num_rows($result_sql_show_category) > 0) {
                                while ($row = mysqli_fetch_assoc($result_sql_show_category)) { ?>
                                    <option value="<?php echo ($row['category_id']) ?>"><?php echo ($row['category_name']) ?>
                                    </option>
                                <?php }
                            } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Sqft</label>
                        <input type="text" name="sqft" class="form-control" placeholder="Sqft">
                    </div>

                    <div class="form-group">
                        <label>Bed</label>
                        <input type="number" name="bed" class="form-control" placeholder="Bed">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Poster</label>
                        <input type="file" name="fileToUpload" required>
                    </div>
                    <input type="submit" name="save" class="btn btn-primary" style="border-radius:16px;" value="Save"
                        required />
                </form>
                <!-- Form End-->
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>
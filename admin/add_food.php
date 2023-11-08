<?php
session_start();
include "connections.php";
include "header.php";
?>

<link rel="stylesheet" href="cropping_css/croppie.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<!--content area-->
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Food</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">

            </div>
        </div>
    </div>
</div>

<div class="content mt-3">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Add New Food</strong>
                </div>
                <div class="card-body">
                    <!-- Credit Card -->
                    <div id="pay-invoice">
                        <div class="card-body">
                            <div class="alert alert-success" role="alert" id="success" style="display: none;">
                                Food Added successfully
                            </div>
                            <div class="alert alert-danger" role="alert" id="error" style="display: none;">
                                Duplicate Food found
                            </div>
                            <form action="" name="form1" method="post" novalidate="novalidate">

                                <div class="form-group">
                                    <div id="uploaded_image" style="cursor: pointer"
                                        onclick="document.getElementById('upload_image').click();">
                                        <img src="images/camera.jpg" id="image1" height="100" width="100">
                                    </div>
                                    <input type="file" name="upload_image" id="upload_image" style="display:none">
                                </div>

                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Food Name</label>
                                    <input id="food_name" name="food_name" type="text" class="form-control mb-3"
                                        placeholder="Enter Food Name" required>
                                    <label for="cc-payment" class="control-label mb-1">Food Category</label>
                                    <select name="food_category" class="form-control mb-3">
                                        <?php
                                        $res = mysqli_query($link, "select * from food_categories order by food_category asc");
                                        while ($row = mysqli_fetch_array($res)) {
                                            echo "<option>";
                                            echo $row['food_category'];
                                            echo "</option>";
                                        }
                                        ?>
                                    </select>
                                    <label for="cc-payment" class="control-label mb-1">Food Description</label>
                                    <textarea name="food_description" class="form-control mb-3" id=""></textarea>
                                    <label for="cc-payment" class="control-label mb-1">Food Original Price</label>
                                    <input id="food_original_price" name="food_original_price" type="text"
                                        class="form-control mb-3" placeholder="Enter Food Original Price" required>
                                    <label for="cc-payment" class="control-label mb-1">Food Discount Price</label>
                                    <input id="food_discount_price" name="food_discount_price" type="text"
                                        class="form-control mb-3" placeholder="Enter Food Discount Price" required>
                                    <label for="cc-payment" class="control-label mb-1">Food Availability</label>
                                    <select name="food_availability" class="form-control mb-3">
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                    <label for="cc-payment" class="control-label mb-1">Food Veg / Non-Veg</label>
                                    <select name="food_veg_nonveg" class="form-control mb-3">
                                        <option value="Veg">Veg</option>
                                        <option value="Non-Veg">Non-Veg</option>
                                    </select>
                                </div>

                                <label for="cc-payment" class="control-label mb-1">Food Ingredients</label>
                                <div class="form-group">
                                    <?php
                                    $res = mysqli_query($link, "select * from food_ingredients where approved = 'yes' order by food_ingredient asc");
                                    while ($row = mysqli_fetch_array($res)) {
                                        ?>
                                        <div class="col-lg-4">
                                            <input type="checkbox" name="ingredient[]"
                                                value="<?php echo $row["food_ingredient"] ?>">
                                            &nbsp;
                                            <?php echo $row["food_ingredient"] ?>
                                        </div>

                                        <?php
                                    }
                                    ?>
                                </div>
                                <div class="mb-3">
                                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block"
                                        name="submit1">
                                        <span id="payment-button-amount">Add Food</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div> <!-- .card -->

        </div><!--/.col-->

    </div>
</div>
<!--end: content area-->


<?php
//logic nút submit
if (isset($_POST["submit1"])) {
    $ingredients = "";
    $count = 0;
    foreach ($_POST["ingredient"] as $check) {
        $count = $count + 1;
        if ($count == 1) {
            $ingredients = $check;
        } else {
            $ingredients = $ingredients . "," . $check;
        }
    }

    copy('temp_photo/' . $_SESSION["image_name01"], 'images/' . $_SESSION["image_name01"]);
    $dst1 = "images/" . $_SESSION["image_name01"];

    $count = 0;
    $res = mysqli_query($link, "SELECT * FROM food WHERE food_name='$_POST[food_name]'") or die(mysqli_error($link));
    $count = mysqli_num_rows($res);
    if ($count > 0) {
        ?>
        <script type="text/javascript">
            document.getElementById("error").style.display = "block";
            document.getElementById("success").style.display = "none";
        </script>
        <?php
    } else {
        mysqli_query($link, "insert into food values(NULL, '$_POST[food_name]','$_POST[food_category]','$_POST[food_description]',
        '$_POST[food_original_price]','$_POST[food_discount_price]','$_POST[food_availability]',
        '$_POST[food_veg_nonveg]','$ingredients', '$dst1')") or die(mysqli_error($link));

        $id_query = mysqli_query($link, "select id from food order by id desc limit 1");
        $id_row = mysqli_fetch_array($id_query);
        $id = intval($id_row['id']);
        
        if (isset ($_SESSION["image_name01"])) {
            copy('temp_photo/' . $_SESSION["image_name01"], 'images/' . $_SESSION["image_name01"]);
            $dst1 = "images/" . $_SESSION["image_name01"];
            mysqli_query($link, "update food set food_image = '$dst1' where id=$id") or die(mysqli_error($link));
            unset($_SESSION["image_name01"]);
        }

        ?>
        <script type="text/javascript">
            document.getElementById("error").style.display = "none";
            document.getElementById("success").style.display = "block";
        </script>
        <?php
    }
    unset($_SESSION["image_name01"]);
    ?>
    <script type="text/javascript">
        setTimeout(function () {
            window.location.href = window.location.href;
        }, 2500);
    </script>

    <?php
}
?>

</div>


<script type="text/javascript">
    function confirmDelete(id, rid) {
        var result = confirm("Are you sure you want to delete Food number " + id + "?");
        if (result) {
            window.location.href = "delete_food.php?id=" + rid;
        }
    }
</script>

<!-- handle Image logic -->

<div id="uploadimageModal" class="modal" role="dialog">
    <div class="modal-dialog" style="width:auto">
        <div class="modal-content" style="width: 1000px;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Upload & Crop Image</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-8 text-center">
                        <div id="image_demo" style="width:350px;"></div>

                    </div>

                    <div class="col-md-12">
                        <button class="btn btn-success crop_image">Crop & Upload Image</button>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
    //https://foliotek.github.io/Croppie/
    $(document).ready(function () {
        $image_crop = $('#image_demo').croppie({
            enforceBoundary: false,
            enableOrientation: true,
            viewport: {
                width: 270,
                height: 230,
                type: 'square'
            },
            boundary: {
                width: 300,
                height: 250
            }
        });

        $('#upload_image').on('change', function () {

            var reader = new FileReader();
            reader.onload = function (event) {
                $image_crop.croppie('bind', {
                    url: event.target.result
                }).then(function () {
                    console.log('jQuery bind complete');
                });
            }
            reader.readAsDataURL(this.files[0]);
            $('#uploadimageModal').modal('show');
        });

        $('.crop_image').click(function (event) {
            $image_crop.croppie('result', {
                type: 'canvas',
                size: 'viewport'
            }).then(function (response) {
                $.ajax({
                    url: "crop_and_upload01.php",
                    type: "POST",
                    data: { "image": response },
                    success: function (data) {
                        $('#uploadimageModal').modal('hide');
                        $('#uploaded_image').html(data);
                    }
                });
            })
        });

    });
</script>
<script src="cropping_js/bootstrap.min.js"></script>
<script src="cropping_js/croppie.js"></script>
<script src="cropping_js/exif.js"></script>

<?php
include "footer.php";
?>
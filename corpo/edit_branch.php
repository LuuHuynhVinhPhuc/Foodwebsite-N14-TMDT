<?php
session_start();
include "connections.php";
include "header.php";
$id = $_GET["id"];
$branch_name = "";
$branch_manager = "";
$address = "";
$phone_number = "";
$email_address = "";
$opening_hours = "";
$closing_hours = "";
    // $row["branch_name"]
    // $row["branch_manager"]
    // $row["address"]
    // $row["phone_number"]
    // $row["email_address"]
    // $row["opening_hours"]
    // $row["closing_hours"]
$res = mysqli_query($link, "select * from branch where id = '$id'");
while ($row = mysqli_fetch_array($res)) {
    $branch_name = $row["branch_name"];
    $branch_manager = $row["branch_manager"];
    $address = $row["address"];
    $phone_number = $row["phone_number"];
    $email_address = $row["email_address"];
    $opening_hours = $row["opening_hours"];
    $closing_hours = $row["closing_hours"];
}
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<!--content area-->
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Edit Branch</h1>
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
                    <strong class="card-title">Edit Branch</strong>
                </div>
                <div class="card-body">
                    <!-- Credit Card -->
                    <div id="pay-invoice">
                        <div class="card-body">
                            <div class="alert alert-success" role="alert" id="success" style="display: none;">
                                Branch Updated successfully
                            </div>
                            <div class="alert alert-danger" role="alert" id="error" style="display: none;">
                                Duplicate Branch, please change your branch information
                            </div>
                            <form action="" name="form1" method="post" novalidate="novalidate"> 
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Branch Name</label>
                                    <input id="food_name" name="food_name" type="text" class="form-control mb-3"
                                        placeholder="Enter Food Name" required value="<?php echo $branch_name; ?>">
                                    <label for="cc-payment" class="control-label mb-1">Food Category</label>
                                    <select name="food_category" class="form-control mb-3">
                                        <?php
                                        $res = mysqli_query($link, "select * from food_categories order by food_category asc");
                                        while ($row = mysqli_fetch_array($res)) {
                                            ?>
                                            <option <?php if ($food_category == $row['food_category']) {
                                                echo "selected";
                                            } ?>>
                                                <?php
                                                echo $row['food_category'];
                                                echo "</option>";
                                        }
                                        ?>
                                    </select>
                                    <label for="cc-payment" class="control-label mb-1">Food Description</label>
                                    <textarea name="food_description" class="form-control mb-3" id="">
                                        <?php echo trim($food_description) ?>
                                    </textarea>

                                    <label for="cc-payment" class="control-label mb-1">Food Original Price</label>
                                    <input id="food_original_price" name="food_original_price" type="text"
                                        class="form-control mb-3" placeholder="Enter Food Original Price" required
                                        value="<?php echo $food_original_price ?>">

                                    <label for="cc-payment" class="control-label mb-1">Food Discount Price</label>
                                    <input id="food_discount_price" name="food_discount_price" type="text"
                                        class="form-control mb-3" placeholder="Enter Food Discount Price" required
                                        value="<?php echo $food_discount_price ?>">

                                    <label for="cc-payment" class="control-label mb-1">Food Availability</label>
                                    <select name="food_availability" class="form-control mb-3">
                                        <option <?php if ($food_availability == "Yes") {
                                            echo "selected";
                                        } ?>>Yes</option>
                                        <option <?php if ($food_availability == "No") {
                                            echo "selected";
                                        } ?>>No</option>
                                    </select>

                                    <label for="cc-payment" class="control-label mb-1">Food Veg / Non-Veg</label>
                                    <select name="food_veg_nonveg" class="form-control mb-3">
                                        <option <?php if ($food_veg_nonveg == "Veg") {
                                            echo "selected";
                                        } ?>>Veg</option>
                                        <option <?php if ($food_veg_nonveg == "Non-Veg") {
                                            echo "selected";
                                        } ?>>Non-Veg
                                        </option>
                                    </select>

                                </div>

                                <label for="cc-payment" class="control-label mb-1">Food Ingredients</label>
                                <div class="form-group">
                                    <?php
                                    $res = mysqli_query($link, "select * from food_ingredients order by food_ingredient asc");
                                    while ($row = mysqli_fetch_array($res)) {
                                        $mystring = $food_ingredients;
                                        ?>

                                        <div class="col-lg-4">
                                            <input type="checkbox" name="ingredient[]"
                                                value="<?php echo $row["food_ingredient"]; ?>" <?php
                                                   if (strpos($mystring, $row["food_ingredient"]) !== false)
                                                       echo "checked";
                                                   ?>>
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
                                        <span id="payment-button-amount">Update</span>
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

    mysqli_query($link, "update food set food_name='$_POST[food_name]', food_category='$_POST[food_category]', 
                food_description='$_POST[food_description]', food_original_price='$_POST[food_original_price]',
                food_discount_price='$_POST[food_discount_price]',
                food_availability='$_POST[food_availability]',
                food_veg_nonveg='$_POST[food_veg_nonveg]',food_ingredients='$ingredients', food_image = '$food_image' where id=$id")
        or die(mysqli_error($link));

    if (isset($_SESSION["image_name01"])) {
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

    ?>
    <script type="text/javascript">
        setTimeout(function () {
            window.location.href = "display_food.php";
        }, 2500);
    </script>

    <?php
}
?>

</div>

<!-- handle image logic -->

<?php
include "footer.php";
?>
<?php
include "connections.php";
include "header.php";
$id=$_GET["id"];
$res = mysqli_query($link, "select * from food_ingredients where id = $id");
while ($row = mysqli_fetch_array($res)) {
    $ingredient_name  = $row["food_ingredient"];
}
?>


<!--content area-->
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>ingredients</h1>
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
                    <strong class="card-title">Edit Ingredients</strong>
                </div>
                <div class="card-body">
                    <!-- Credit Card -->
                    <div id="pay-invoice">
                        <div class="card-body">
                            <form action="" name="form1" method="post" novalidate="novalidate">
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Ingredients Name</label>
                                    <input id="food_ingredient" name="food_ingredient" type="text" class="form-control"
                                        placeholder="Enter Ingredient" required value=<?php echo $ingredient_name; ?>>
                                </div>
                                <div class="mb-3">
                                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block"
                                        name="submit1">
                                        <span id="payment-button-amount">Update</span>
                                    </button>
                                </div>
                                <div class="alert alert-success" role="alert" id="success" style="display: none;">
                                    Ingredients updated successfully
                                </div>
                                <div class="alert alert-danger" role="alert" id="error" style="display: none;">
                                    Duplicate ingredients found
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
    $count = 0;
    $res = mysqli_query($link, "SELECT * FROM food_ingredients WHERE food_ingredient='$_POST[food_ingredient]'") or die(mysqli_error($link));
    $count = mysqli_num_rows($res);
    if ($count > 0) {
        ?>
        <script type="text/javascript">
            document.getElementById("error").style.display = "block";
            document.getElementById("success").style.display = "none";
        </script>
        <?php
    } else {
        mysqli_query($link, "update food_ingredients set food_ingredient = '$_POST[food_ingredient]' where id = $id") or die(mysqli_error($link));
        ?>
        <script type="text/javascript">
            document.getElementById("error").style.display = "none";
            document.getElementById("success").style.display = "block";
        </script>
        <?php
    }
    ?>
    <script type="text/javascript">
        setTimeout(function () {
            window.location = "food_ingredients.php"
        }, 2500);
    </script>
    
    <?php
}
?>

</div>

<?php
include "footer.php";
?>
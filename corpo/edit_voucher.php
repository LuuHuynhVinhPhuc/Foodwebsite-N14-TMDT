<?php
include "connections.php";
include "header.php";
$id=$_GET["id"];
$res = mysqli_query($link, "select * from voucher where id = $id");
while ($row = mysqli_fetch_array($res)) {
    $voucher_code  = $row["voucher_code"];
    $discount  = $row["discount"];
    $use_count  = $row["use_count"];
}
?>
<!--content area-->

<div class="content mt-3">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Edit Voucher Details</strong>
                </div>
                <div class="card-body">
                    <!-- Credit Card -->
                    <div id="pay-invoice">
                        <div class="card-body">
                            <form action="" name="form1" method="post" novalidate="novalidate">
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Voucher</label>
                                    <input id="voucher_code" name="voucher_code" type="text" class="form-control"
                                        placeholder="Enter Voucher" required value=<?php echo $voucher_code; ?>>
                                </div>
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Discount Amount</label>
                                    <input id="discount" name="discount" type="text" class="form-control"
                                        placeholder="Enter Discount" required value=<?php echo $discount; ?>>
                                </div>
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Use Count</label>
                                    <input id="use_count" name="use_count" type="text" class="form-control"
                                        placeholder="Enter Use Count" required value=<?php echo $use_count; ?>>
                                </div>
                                <div class="mb-3">
                                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block"
                                        name="submit1">
                                        <span id="payment-button-amount">Update</span>
                                    </button>
                                </div>
                                <div class="alert alert-success" role="alert" id="success" style="display: none;">
                                    Voucher Updated successfully!
                                </div>
                                <div class="alert alert-danger" role="alert" id="error" style="display: none;">
                                    Duplicate Voucher found
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
    $res = mysqli_query($link, "SELECT * FROM voucher WHERE voucher_code='$_POST[voucher_code]'") or die(mysqli_error($link));
    $count = mysqli_num_rows($res);
    if ($count > 1) {
        ?>
        <script type="text/javascript">
            document.getElementById("error").style.display = "block";
            document.getElementById("success").style.display = "none";
        </script>
        <?php
    } else {
        mysqli_query($link, "update voucher set voucher_code = '$_POST[voucher_code]', discount = '$_POST[discount]', use_count = '$_POST[use_count]' where id = $id") or die(mysqli_error($link));
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
            window.location = "voucher.php"
        }, 2500);
    </script>
    
    <?php
}
?>

</div>

<?php
include "footer.php";
?>
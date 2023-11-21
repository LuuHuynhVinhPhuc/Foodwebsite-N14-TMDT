<?php
include "../admin/connections.php";
include "header.php";
?>
<!--end: content area-->

<div class="content mt-3">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Add Voucher</strong>
                </div>
                <div class="card-body">
                    <!-- Credit Card -->
                    <div id="pay-invoice">
                        <div class="card-body">
                            <form action="" name="form1" method="post" novalidate="novalidate">
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Voucher Code</label>
                                    <input id="voucher_code" name="voucher_code" type="text" class="form-control"
                                        placeholder="Enter Code" required>
                                </div>
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Discount Amount</label>
                                    <input id="discount" name="discount" type="text" class="form-control"
                                        placeholder="Amount" required>
                                </div>
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Number of Uses</label>
                                    <input id="use_count" name="use_count" type="text" class="form-control"
                                        placeholder="Number of Uses" required>
                                </div>
                                <div class="mb-3">
                                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block"
                                        name="submit1">
                                        <span id="payment-button-amount">Submit</span>
                                    </button>
                                </div>
                                <div class="alert alert-success" role="alert" id="success" style="display: none;">
                                    Voucher inserted successfully
                                </div>
                                <div class="alert alert-danger" role="alert" id="error" style="display: none;">
                                    Duplicate voucher found
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div> <!-- .card -->

        </div><!--/.col-->

    </div>
</div>

<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Voucher</th>
                        <th scope="col">Discount Amount</th>
                        <th scope="col">Number of Uses left</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $count = 0;
                         $res = mysqli_query($link, "select * from voucher");
                         while ($row = mysqli_fetch_array($res))
                         {
                            $count = $count + 1;
                            echo "<tr>";
                            echo "<td> $count </td>";
                            echo "<td>"; echo $row["voucher_code"]; echo "</td>";
                            echo "<td>"; echo $row["discount"]; echo "</td>";
                            echo "<td>"; echo $row["use_count"]; echo "</td>";
                            echo "<td>"; ?><a href="edit_voucher.php?id=<?php echo $row["id"] ?>"
                            style="color: green;">Edit</a> <?php echo "</td>";
                            echo "<td>"; ?><a onclick="confirmDelete(<?php echo $count ?>, <?php echo $row["id"] ?>)" 
                            style="color: red; cursor: pointer">Delete</a> 
                            <?php echo "</td>";
                            echo "</tr>";
                         }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
//logic nút submit
if (isset($_POST["submit1"])) {
    $count = 0;
    $res = mysqli_query($link, "SELECT * FROM voucher WHERE voucher_code='$_POST[voucher_code]'") or die(mysqli_error($link));
    $count = mysqli_num_rows($res);
    if ($count > 0) {
        ?>
        <script type="text/javascript">
            document.getElementById("error").style.display = "block";
            document.getElementById("success").style.display = "none";
        </script>
        <?php
    } else {
        mysqli_query($link, "insert into voucher values(NULL, '$_POST[voucher_code]', '$_POST[discount]', '$_POST[use_count]')") or die(mysqli_error($link));
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
            window.location.href = window.location.href;
        }, 2500);
    </script>
    
    <?php
}
?>

<script type="text/javascript">
function confirmDelete(id, rid) {
  var result = confirm("Are you sure you want to delete voucher number " + id + "?");
  if (result) {
    window.location.href = "delete_voucher.php?id=" + rid;
  }
}
</script>

<?php
include "footer.php";
?>
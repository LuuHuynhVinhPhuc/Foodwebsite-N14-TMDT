<?php
include "connections.php";
include "header.php";
$receipt_id = $_GET["id"];
$res = mysqli_query($link, "select * from receipt_item where receipt_id = '$receipt_id'");
?>

<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <strong class="card-title">Receipt ID: <?= $receipt_id ?></strong>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Item Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $count = 0;
                    $res = mysqli_query($link, "select * from receipt_item where receipt_id = '$receipt_id'");
                    while ($row = mysqli_fetch_array($res)) {
                        $count = $count + 1;
                        echo "<tr>";
                        echo "<td>";
                        echo $count;
                        echo "</td>";
                        echo "<td>";
                        echo $row["item_name"];
                        echo "</td>";
                        echo "<td>";
                        echo $row["item_price"];
                        echo "</td>";
                        echo "<td>";
                        echo $row["quantity"];
                        echo "</td>";
                        echo "<td>";
                        echo $row["total_price"];
                        echo "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
include "footer.php";
?>
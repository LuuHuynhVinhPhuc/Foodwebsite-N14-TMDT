<?php
include "connections.php";
include "header.php";
?>

<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">ID</th>
                        <th scope="col">Customer</th>
                        <th scope="col">Date</th>
                        <th scope="col">Price</th>
                        <th scope="col">Discount</th>
                        <th scope="col">Final Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $count = 0;
                         $res = mysqli_query($link, "select * from receipt");
                         while ($row = mysqli_fetch_array($res))
                         {
                            $count = $count + 1;
                            echo "<tr>";
                            echo "<td> $count </td>";
                            echo "<td>"; echo $row["id"]; echo "</td>";
                            echo "<td>"; echo $row["customer_name"]; echo "</td>";
                            echo "<td>"; echo $row["date_time"]; echo "</td>";
                            echo "<td>"; echo $row["total_price"]; echo "</td>";
                            echo "<td>"; echo $row["voucher_discount"]; echo "</td>";
                            echo "<td>"; echo $row["final_price"]; echo "</td>";
                            echo "<td>"; ?><a href="transaction_details.php?id=<?php echo $row["id"] ?>"
                            style="color: green;">Details</a> <?php echo "</td>";
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
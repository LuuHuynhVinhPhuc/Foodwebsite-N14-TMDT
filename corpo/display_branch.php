<?php
include "connections.php";
include "header.php";
?>

<!--content area-->
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Available Branch</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                Hi
            </div>
        </div>
    </div>
</div>
<!--end: content area-->

<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Food Image</th>
                        <th scope="col">Food Name</th>
                        <th scope="col">Food Category</th>
                        <th scope="col">Food Description</th>
                        <th scope="col">Original Price</th>
                        <th scope="col">Discount Price</th>
                        <th scope="col">Availability</th>
                        <th scope="col">Vegetarian</th>
                        <th scope="col">Ingredients</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $count = 0;
                         $res = mysqli_query($link, "select * from food");
                         while ($row = mysqli_fetch_array($res))
                         {
                            $count = $count + 1;
                            echo "<tr>";
                            echo "<td> $count </td>";
                            echo "<td>"; ?> <img src="<?php echo $row["food_image"]; ?>" alt=""> <?php echo "</td>";
                            echo "<td>"; echo $row["food_name"]; echo "</td>";
                            echo "<td>"; echo $row["food_category"]; echo "</td>";
                            echo "<td>"; echo $row["food_description"]; echo "</td>";
                            echo "<td>"; echo $row["food_original_price"]; echo "</td>";
                            echo "<td>"; echo $row["food_discount_price"]; echo "</td>";
                            echo "<td>"; echo $row["food_availability"]; echo "</td>";
                            echo "<td>"; echo $row["food_veg_nonveg"]; echo "</td>";
                            echo "<td>"; echo $row["food_ingredients"]; echo "</td>";
                            echo "<td>"; ?><a href="edit_food.php?id=<?php echo $row["id"] ?>"
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

<script type="text/javascript">
function confirmDelete(id, rid) {
  var result = confirm("Are you sure you want to delete food number " + id + "?");
  if (result) {
    window.location.href = "delete_food.php?id=" + rid;
  }
}
</script>

<?php
include "footer.php";
?>
<?php
include "connections.php";
include "header.php";
?>
<style>
    .search {
        margin: 15px 0;
    }
    .search input {
        padding: 3px 10px;
        border-radius: 3px;
        width: 290px;
    }
    .search-btn {
        border-radius: 4px;
        padding: 3px 9px;
        color: #000;
    }
    .search-btn:hover {
        opacity: 0.8;
    }
</style>
<!--content area-->
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Added Foods</h1>
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
<!--end: content area-->

<div class="col-lg-12">
    <form class="search" method="GET" action="">
        <input type="text" name="search" placeholder="Enter name..." value="<?php if(isset($_GET['search'])) echo $_GET['search'] ?>">
        <button type="submit" class="search-btn">Search</button>
    </form>
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
                <?php if(isset($_GET['search'])) {  ?>
                    <?php
                        $search = isset($_GET['search']) ? $_GET['search'] : '';
                        $count = 0;
                        $sql = mysqli_query($link, "SELECT * FROM food WHERE approved = 'yes' AND food_name LIKE '%$search%'");
                            if(mysqli_num_rows($sql) > 0){
                                while ($row = mysqli_fetch_array($sql))
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
                            } else {
                                echo "<tr>";
                                    echo "<td colspan= '10' align=center>"; echo '<p style="font-size: 25px;">Không có sản phẩm phù hợp với yêu cầu tìm kiếm của bạn</p>'; echo "</td>";
                                echo "</tr>";
                            }
                      ?>
                <?php  } else { ?>
                    <?php
                    $count = 0;
                        $res = mysqli_query($link, "select * from food where approved = 'yes'");
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
                <?php } ?>
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
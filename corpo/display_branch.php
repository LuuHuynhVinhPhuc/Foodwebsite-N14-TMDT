<?php
include "../admin/connections.php";
include "header.php";
?>

<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Branch Name</th>
                        <th scope="col">Manager</th>
                        <th scope="col">Address</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Email</th>
                        <th scope="col">Opening Hours</th>
                        <th scope="col">Closing Hours</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $count = 0;
                         $res = mysqli_query($link, "select * from branch");
                         while ($row = mysqli_fetch_array($res))
                         {
                            $count = $count + 1;
                            echo "<tr>";
                            echo "<td> $count </td>";
                            echo "<td>"; echo $row["branch_name"]; echo "</td>";
                            echo "<td>"; echo $row["branch_manager"]; echo "</td>";
                            echo "<td>"; echo $row["address"]; echo "</td>";
                            echo "<td>"; echo $row["phone_number"]; echo "</td>";
                            echo "<td>"; echo $row["email_address"]; echo "</td>";
                            echo "<td>"; echo $row["opening_hours"]; echo "</td>";
                            echo "<td>"; echo $row["closing_hours"]; echo "</td>";
                            echo "<td>"; ?><a href="edit_branch.php?id=<?php echo $row["branch_number"] ?>"
                            style="color: green;">Edit (Not work)</a> <?php echo "</td>";
                            echo "<td>"; ?><a onclick="confirmDelete(<?php echo $count ?>, <?php echo $row["branch_number"] ?>)" 
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
  var result = confirm("Are you sure you want to delete branch number " + id + "?");
  if (result) {
    window.location.href = "delete_branch.php?id=" + rid;
  }
}
</script>

<?php
include "footer.php";
?>
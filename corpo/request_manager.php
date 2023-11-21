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
                        <th scope="col">Name</th>
                        <th scope="col">Request Category</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $count = 0;
                         $res = mysqli_query($link, "select * from request");
                         while ($row = mysqli_fetch_array($res))
                         {
                            $count = $count + 1;
                            echo "<tr>";
                            echo "<td> $count </td>";
                            echo "<td>"; echo $row["name"]; echo "</td>";
                            echo "<td>"; echo $row["request_type"]; echo "</td>";
                            echo "<td>"; ?><a href="approve_request.php?id=<?php echo $row["request_no"] ?>"
                            style="color: green;">Approve</a> <?php echo "</td>";
                            echo "<td>"; ?><a onclick="confirmDelete(<?php echo $count ?>, <?php echo $row["request_no"] ?>)" 
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
  var result = confirm("Are you sure you want to delete request number " + id + "?");
  if (result) {
    window.location.href = "delete_request.php?id=" + rid;
  }
}
</script>

<?php
include "footer.php";
?>
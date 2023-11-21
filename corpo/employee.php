<?php
include "../admin/connections.php";
include "header.php";
?>
<!--end: content area-->

<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Salary</th>
                        <th scope="col">Title</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $count = 0;
                         $res = mysqli_query($link, "select * from Employee");
                         while ($row = mysqli_fetch_array($res))
                         {
                            $count = $count + 1;
                            echo "<tr>";
                            echo "<td> $count </td>";
                            echo "<td>"; echo $row["Name"]; echo "</td>";
                            echo "<td>"; echo $row["Email"]; echo "</td>";
                            echo "<td>"; echo $row["Phone"]; echo "</td>";
                            echo "<td>"; echo $row["Salary"]; echo "</td>";
                            echo "<td>"; echo $row["Title"]; echo "</td>";
                            echo "<td>"; echo $row["Status"]; echo "</td>";
                            echo "<td>"; ?><a href="edit_employee.php?id=<?php echo $row["ID"] ?>"
                            style="color: green;">Edit</a> <?php echo "</td>";
                            echo "<td>"; ?><a onclick="confirmDelete(<?php echo $count ?>, <?php echo $row["ID"] ?>)" 
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
  var result = confirm("Are you sure you want to delete employee number " + id + "?");
  if (result) {
    window.location.href = "delete_employee.php?id=" + rid;
  }
}
</script>

<?php
include "footer.php";
?>
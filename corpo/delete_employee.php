<?php
include 'connections.php';
$id = $_GET["id"];
mysqli_query($link, "delete from Employee where id=$id");
?>

<script type="text/javascript">
    window.location = "employee.php";
</script>
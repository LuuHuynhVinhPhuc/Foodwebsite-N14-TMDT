<?php
include 'connections.php';
$id = $_GET["id"];
mysqli_query($link, "delete from food where id=$id");
?>

<script type="text/javascript">
    window.location = "display_food.php";
</script>
<?php
include 'connections.php';
$id = $_GET["id"];
mysqli_query($link, "delete from food_categories where id=$id");
?>

<script type="text/javascript">
    window.location = "food_categories.php";
</script>
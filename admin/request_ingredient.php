<?php
include 'connections.php';
$id = $_GET["id"];
$res = mysqli_query($link, "select * from food_ingredients where id = $id");
$row = mysqli_fetch_array($res);
$name = $row["food_ingredient"];
mysqli_query($link, "insert into request (name, request_type) values ('$name', 'ingredient')");
?>

<script type="text/javascript">
    window.location = "food_ingredients.php";
</script>
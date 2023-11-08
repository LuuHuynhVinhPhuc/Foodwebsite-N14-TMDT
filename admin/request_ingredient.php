<?php
include 'connections.php';
$name = $_GET["name"];
mysqli_query($link, "insert into request (name, request_type) values ($name, 'ingredient')");
?>

<script type="text/javascript">
    window.location = "food_ingredients.php";
</script>
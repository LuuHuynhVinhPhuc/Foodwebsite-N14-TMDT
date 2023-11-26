<?php
include 'connections.php';
$request_no = $_GET["request_no"];
$res = mysqli_query($link, "select * from request where request_no = '$request_no'");
$row = mysqli_fetch_array($res);

if ($row["request_type"] == "ingredient") {
    $temp = $row["name"];
    mysqli_query($link, "update food_ingredients set approved = 'yes' where food_ingredient = '$temp'");
    mysqli_query($link, "delete from request where request_no = '$request_no'");
}
?>

<script type="text/javascript">
    window.location = "request_manager.php";
</script>
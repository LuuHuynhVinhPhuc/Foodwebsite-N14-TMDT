<?php
include 'connections.php';
$id = $_GET["id"];
mysqli_query($link, "delete from voucher where id=$id");
?>

<script type="text/javascript">
    window.location = "voucher.php";
</script>
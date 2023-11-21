<?php
session_start();
$coupon_discount = $_POST['coupon_discount'];
$final_total = $_POST['final_total'];

include "../admin/connections.php";
//logic nút submit
if (isset($_POST["submit1"])) {
	$count = 0;
	$res = mysqli_query($link, "SELECT * FROM voucher WHERE voucher_code='$_POST[coupon_code]'") or die(mysqli_error($link));
	$count = mysqli_num_rows($res);
    $temp = 0;
	if ($count == 0) {
		?>
		<script type="text/javascript">
			alert("The voucher is invalid. Please try again");
		</script>
		<?php
	} else if ($coupon_discount != 0) {
        while ($row = mysqli_fetch_array($res)) {
            $temp = $row["discount"];
        }
        if ($coupon_discount >= $temp) {
		?>
			<script type="text/javascript">
				alert("You already have a voucher for this order. Please try again with a higher discount one.")
			    window.location.href = "view_cart.php";
			</script>
		<?php
    }
} 
else {
		$row = mysqli_fetch_array($res);
		$coupon_discount = $row["discount"];
		$final_total = $final_total - $coupon_discount;
        $_SESSION["coupon_discount"] = $coupon_discount;
        $_SESSION["final_total"] = $final_total;
        $_SESSION["coupon_code"] = $_POST["coupon_code"];
		?>
			<script type="text/javascript">
				alert("Coupon successfully added to your order. Thank you!")
			</script>
	<?php
	}
	?>
	<script type="text/javascript">
		setTimeout(function () {
			window.location.href = "view_cart.php";
		}, 1250);
	</script>

	<?php
}
?>
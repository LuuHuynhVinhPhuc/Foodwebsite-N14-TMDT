<?php
include "header.php";

?>

<!-- Page Title -->
<section class="page-title" style="background-image: url(assets/images/background/11.jpg)">
	<div class="auto-container">
		<h1>View Cart</h1>
	</div>
</section>
<!-- End Page Title -->



<?php


if (load_cart_data() > 0) {
	?>

	<section class="cart-section">
		<div class="auto-container">
			as
			<!--Cart Outer-->
			<div class="cart-outer">
				<div class="table-outer">
					<table class="cart-table">
						<thead class="cart-header">
							<tr>
								<th>Preview</th>
								<th class="prod-column">Product</th>
								<th class="price">Price</th>
								<th>Quantity</th>
								<th>Total</th>
								<th>&nbsp;</th>
							</tr>
						</thead>

						<tbody>
							<?php
							$max = 0;
							$count = 0;
							$grand_total = 0;
							$final_total = 0;
							if (isset($_SESSION["cart"])) {
								$max = sizeof($_SESSION["cart"]);
							}



							for ($i = 0; $i < $max; $i++) {
								if (isset($_SESSION["cart"][$i])) {
									$img_session = "";
									$nm_session = "";
									$price_session = "";
									$qty_total_session = "";
									$tb_id_session = "";
									$unit_session = "";

									foreach ($_SESSION["cart"][$i] as $key => $val) {
										if ($key == "img1") {
											$img_session = $val;
											echo "<script>console.log('$img_session and hello');</script>";
										}
										if ($key == "nm") {
											$nm_session = $val;
											echo "<script>console.log('$nm_session and hello');</script>";
										}
										if ($key == "price") {
											$price_session = $val;
											echo "<script>console.log('$price_session and hello');</script>";
										}
										if ($key == "qty_total") {
											$qty_total_session = $val;
											echo "<script>console.log('$qty_total_session and hello');</script>";
										}
										if ($key == "tb_id") {
											$tb_id_session = $val;
											echo "<script>console.log('$tb_id_session and tb_id_session');</script>";
										}
										if ($key == "unit") {
											$unit_session = $val;
											echo "<script>console.log('$unit_session and hello');</script>";
										}
									}
								}

								//echo $nm_session."++".$qty_total_session;
								?>

								<?php
								if (isset($_SESSION["coupon_discount"])) {
									$coupon_discount = $_SESSION["coupon_discount"];
								}
								else $coupon_discount = 0;
								if ($img_session != "" && $img_session != null) {
									$count = $count + 1;
									$grand_total = $grand_total + ($price_session * $qty_total_session);
									if (isset($_SESSION["final_total"])) {
										$final_total = $_SESSION["final_total"];
									}
									else $final_total = $grand_total;
									?>
									<tr>
										<td class="prod-column">
											<div class="column-box">
												<figure class="prod-thumb"><a href="#"><img
															src="../admin/<?php echo $img_session ?>" alt=""></a></figure>
											</div>
										</td>
										<!-- food description -->
										<td>
											<h4 class="prod-title">
												<?php echo $nm_session ?>
											</h4>
										</td>
										<td class="sub-total">
											$
											<?php echo $price_session ?>
										</td>
										<td class="qty">
											<div class="item-quantity"><input class="quantity-spinner" type="text"
													id="qty<?php echo $i; ?>" value="<?php echo $qty_total_session ?>"
													name="quantity"></div>
										</td>
										<td class="price">$
											<?php echo $price_session * $qty_total_session ?>
										</td>
										<td><a href="#" class="remove-btn" style="float: left; "
												onclick="delete_product('<?php echo $tb_id_session ?>')">
												<span class="fa fa-times"></span>
											</a>
											<a href="#" class="remove-btn" style="float: right; "
												onclick="update_product('<?php echo $tb_id_session ?>','<?php echo $i ?>')">
												<span class="fa fa-refresh"></span>
											</a>
										</td>
									</tr>
									<?php
								}
								?>
								<?php
							}
							?>


						</tbody>
					</table>
				</div>

				<div class="cart-options clearfix">
					<div class="pull-left">
						<div class="apply-coupon clearfix">
							<form action="coupon_check.php" name="form1" method="post" novalidate="novalidate">
								<div class="form-group clearfix">
									<input type="text" name="coupon_code" class="form-control" value="" placeholder="Coupon Code">
								</div>
								<div class="form-group">
									<button type="submit" name="submit1" class="btn btn-lg btn-block theme-btn coupon-btn">
										<span>
											Apply Coupon
										</span>
									</button>
								</div>
								<input type="hidden" name="coupon_discount" value="<?= $coupon_discount ?>">
								<input type="hidden" name="final_total" value="<?= $final_total ?>">
							</form>
						</div>
					</div>
				</div>

				<div class="row clearfix">
					<div class="column col-lg-7 col-md-12 col-sm-12"></div>
					<div class="column pull-right col-lg-5 col-md-12 col-sm-12">
						<!--Totals Table-->
						<ul class="totals-table">
							<li>
								<h3>Cart Totals</h3>
							</li>
							<li class="clearfix total"><span class="col">Total</span>
								<span class="col price">$
									<?php echo $grand_total ?>
								</span>
							</li>
							<li class="clearfix total"><span class="col">Discount</span>
								<span class="col price">$
									<?php echo $coupon_discount ?>
								</span>
							</li>
							<li class="clearfix total"><span class="col">You Pay:</span>
								<span class="col price">$
									<?php echo $final_total ?>
								</span>
							</li>
							<li class="text-right">
								<?php

								// Check if the user is logged in
								if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
									?>
									<div id="paypal-button-container"></div>
									<!-- Replace the "test" client-id value with your client-id -->
									<script
										src="https://www.paypal.com/sdk/js?client-id=Ae86PU_IaJlYVlNvxPxIp-j_jn3WDTE0om1tSG_5saV9lVm30tGlueTVlVGpYfmTIjtqUaxl8BnKBQXj&currency=USD"></script>
									<?php
								} else {
									// Guest or user not logged in, show an alert and stay on the current page
									?>
									<script>
										function showLoginAlert() {
											alert("You need to be logged in to proceed with the payment.");
											window.location.href = "login.php";
										}
									</script>
									<button class="theme-btn btn-style-five cart-btn" onclick="showLoginAlert()">Proceed to
										Payment</button>
									<?php
								}
								?>

							</li>
						</ul>
					</div>
				</div>
			</div>

		</div>
	</section>

	<?php
} else {
	echo "<div style='height: 20px; width: 100%; text-align: center;'>";
	echo "<h4> No Product available in Cart</h4>";
	echo "</div>";
}
?>

<!--Cart Section-->

<!--End Cart Section-->
<!-- to-do: add pointing system (no need exchange, just point & at certain points, let them have different member (silver member, gold member, etc)) -->

<?php
function load_cart_data()
{
	$count = 0;
	$max = 0;
	if (isset($_SESSION['cart'])) {
		$max = sizeof($_SESSION['cart']);
	}
	for ($i = 0; $i < $max; $i++) {
		if (isset($_SESSION['cart'][$i])) {
			$img1_session = "";
			foreach ($_SESSION['cart'][$i] as $key => $val) {
				if ($key == "img1") {
					$img1_session = $val;
				}
			}

			if ($img1_session != "" && $img1_session != null) {
				$count = $count + 1;
			}
		}
	}
	return $count;
}
?>

<!-- this is where you will handle the script of your paypal button-->
<script>
	paypal.Buttons({
		//sets up the transaction when the payment butotn is clicked
		createOrder: (data, actions) => {
			return actions.order.create({
				purchase_units: [{
					amount: {
						value: '<?= $final_total ?>'
					}
				}]
			});
		},
		onApprove: (data, actions) => {
			return actions.order.capture().then(function (orderData) {
				// console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
				const transaction = orderData.purchase_units[0].payments.captures[0];
				alert(`Transaction ${transaction.status}: ${transaction.id} \n See console for all available details`);

				$.ajax({
					method: "POST",
					url: "checkout.php",
					data: {
						transactionId: transaction.id,
						grand_total: <?= $grand_total; ?>,
						coupon_discount: <?= $coupon_discount; ?>,
						final_total: <?= $final_total; ?>,
					},
					success: function (response) {
						console.log('success', transaction.id);
						// window.location.href = "index.php";
					}
				});
			});
		}
	}).render('#paypal-button-container');
</script>

<script type="text/javascript">
	function delete_product(tb_id) {
		var xmlhttp1 = new XMLHttpRequest();
		xmlhttp1.onreadystatechange = function () {
			if (xmlhttp1.readyState == 4 && xmlhttp1.status == 200) {
				window.location = "view_cart.php";
			}
		}
		xmlhttp1.open("GET", "delete_from_cart.php?tb_id=" + tb_id, true);
		xmlhttp1.send();
	}

	function update_product(tb_id, qtyid) {
		var qty = "qty" + qtyid;
		var qty1 = document.getElementById(qty).value;
		var xmlhttp1 = new XMLHttpRequest();
		xmlhttp1.onreadystatechange = function () {
			if (xmlhttp1.readyState == 4 && xmlhttp1.status == 200) {
				alert("Cart Updated Successfully")
				window.location = "view_cart.php";
			}
		}
		xmlhttp1.open("GET", "update_from_cart.php?id=" + tb_id + "&qty=" + qty1, true);
		xmlhttp1.send();
	}
</script>


<script src="assets/js/jquery.js"></script>
<script src="assets/js/parallax.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/jquery-ui.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.fancybox.js"></script>
<script src="assets/js/owl.js"></script>
<script src="assets/js/wow.js"></script>
<script src="assets/js/jquery.bootstrap-touchspin.js"></script>
<script src="assets/js/appear.js"></script>
<script src="assets/js/script.js"></script>

<?php
include "footer.php";
?>
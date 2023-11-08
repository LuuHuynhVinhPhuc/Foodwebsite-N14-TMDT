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
										}
										if ($key == "nm") {
											$nm_session = $val;
										}
										if ($key == "price") {
											$price_session = $val;
										}
										if ($key == "qty_total") {
											$qty_total_session = $val;
										}
										if ($key == "tb_id") {
											$tb_id_session = $val;
										}

										if ($key == "unit") {
											$unit_session = $val;
										}
									}
								}

								//echo $nm_session."++".$qty_total_session;
								?>

								<?php
								if ($img_session != "" && $img_session != null) {
									$count = $count + 1;
									$grand_total = $grand_total + ($price_session * $qty_total_session)

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
							<div class="form-group clearfix">
								<input type="text" name="coupon-code" value="" placeholder="Coupon Code">
							</div>
							<div class="form-group clearfix">
								<button type="button" class="theme-btn coupon-btn">Apply Coupon</button>
							</div>
						</div>
					</div>

					<div class="pull-right">
						<button type="button" class="theme-btn btn-style-five cart-btn"><span class="txt">Add to
								cart</span></button>
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
							<li class="clearfix total"><span class="col">Total</span><span class="col price">$
									<?php echo $grand_total ?>
								</span>
							</li>
							<li class="text-right">
								<div id="paypal-button-container"></div>
								<p id="result-message"></p>
								<!-- Replace the "test" client-id value with your client-id -->
								<script src="https://www.paypal.com/sdk/js?client-id=AZIAy3XqY0AMS8N3PFiUU0TYxAe0Z-eEH_ouHjuVy57TWVaHIekn0WehBlEXn7Yzbit6CysUC225JaAE&currency=USD"></script>
								<script src="app.js"></script>
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

<script type="module">
	const root = ReactDOM.createRoot(document.getElementById("paypal-container"))
	root.render(React.Strict)
</script>

<script type="module">
	import PayPal from 'paypal.js';
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
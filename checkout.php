<?php
include 'header.php';
$uname = $_SESSION['uname'];
$transactionId = $_POST['transactionId'];
$grand_total = $_POST['grand_total'];
$coupon_discount = $_POST['coupon_discount'];
$final_total = $_POST['final_total'];

if (isset($_SESSION["coupon_code"])) {
    $coupon_code = $_SESSION["coupon_code"];
    mysqli_query($link, "update voucher set use_count = use_count - 1 where voucher_code = '$coupon_code'") or die(mysqli_error($link));
}

if(!isset($transactionId) || !isset($_SESSION["cart"])) {
    header("index.php");
}

date_default_timezone_set('Asia/Ho_Chi_Minh');
// Output the current time
$time = date('M d, Y G:i');

$max = sizeof($_SESSION["cart"]);

mysqli_query(
    $link,
    "INSERT INTO `receipt` 
(`id`, `customer_name`, `date_time`, `total_price`, `voucher_discount`, `final_price`) 
VALUES ('$transactionId', '$uname', '$time', '$grand_total', '$coupon_discount', '$final_total')"
) or die(mysqli_error($link));

for ($i = 0; $i < $max; $i++) {
    $nm_session = "";
    $price_session = "";
    $qty_total_session = "";
    $tb_id_session = "";
    if (isset($_SESSION["cart"][$i])) {
        foreach ($_SESSION["cart"][$i] as $key => $val) {
            if ($key == "img1") {
                continue;
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
                continue;
            }
        }
    }
    $t_price = $qty_total_session * $price_session;
    mysqli_query($link, "INSERT INTO `receipt_item` (`id`, `receipt_id`, `item_name`, `item_price`, `quantity`, `total_price`) 
        VALUES (NULL, '$transactionId', '$nm_session', '$price_session', '$qty_total_session', '$t_price')")
        or die(mysqli_error($link));
    // mysqli_query($link, "insert ") or die(mysqli_error($link));
}

session_unset();

header("Location: index.php");
?>
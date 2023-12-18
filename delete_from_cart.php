<?php
session_start();
include "../admin/connections.php";
$tb_id=$_GET["tb_id"];
$check_product_no_session=check_product_no_session_multiple($tb_id);  
//this is for get this product session id so we can update it.
$sessionid = $check_product_no_session;
$b = array("img1" => "", "nm" => "", "price" => "", "qty_total" => "", "tb_id" => "");
$_SESSION['cart'][$sessionid]=$b;

function check_product_no_session_multiple($tb_id)
{
    $recordno = 0;
    $max = sizeof($_SESSION['cart']);
    for ($i = 0; $i < $max; $i++) {

        if (isset($_SESSION['cart'][$i])) {
            $tb_id_session = "";


            foreach ($_SESSION['cart'][$i] as $key => $val) {
                if ($key == "tb_id") {
                    $tb_id_session = $val;
                }

            }
            if ($tb_id_session == $tb_id) {
                $recordno = $i;
            }
        }
    }
    return $recordno;
}
?>
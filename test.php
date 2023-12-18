<?php
session_start();
$max = 0;
$count = 0;
if (isset($_SESSION["cart"])) {
    $max = sizeof($_SESSION["cart"]);
}

for ($i = 0; $i < $max; $i++) {
    if (isset($_SESSION["cart"][$i])) {
        $nm_session = "";
        $qty_total_session = "";
        foreach ($_SESSION["cart"][$i] as $key => $val) {
            if ($key == "nm") {
                $nm_session = $val;
            }
            if ($key == "qty_total") {
                $qty_total_session = $val;
            }
        }
    }
    echo $nm_session."++".$qty_total_session;
}
?>
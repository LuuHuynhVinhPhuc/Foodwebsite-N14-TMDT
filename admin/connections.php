<?php
$link = mysqli_connect("localhost", "root") or die(mysqli_error($link));
mysqli_select_db($link, "food_ordering_system") or die(mysqli_error($link));
if (!$link) {
    die("Wrong shit");
}

<?php
session_start();
ini_set('memory_limit', '-1');
if(isset($_POST["image"]))
{
	$time_start = microtime(true);
	$data = $_POST["image"];
	$image_array_1 = explode(";", $data);
	$image_array_2 = explode(",", $image_array_1[1]);
	$imageName = md5(md5(time())).'.png';

	$str = implode('', preg_split('/\s*/', $image_array_2[1]));
	$data = base64_decode($str);

	$_SESSION["image_name01"] = $imageName;
	file_put_contents("temp_photo/".$imageName,$data);
	?>
	<img src="temp_photo/<?php echo $imageName ?>" style="width: 230px; height: 270px;" onclick="document.getElementById('upload_image').click();">
	<?php
	//echo (microtime(true) - $time_start).'second';
}
?>
<?php 
$mysqli = new mysqli('localhost', 'root', null, 'test');
if ($mysqli->connect_error) {
	echo $mysqli->connect_error;
	exit();
} else {
	$mysqli->set_charset("utf8");
}
$sql = "INSERT INTO userinfo VALUES (null, ?, CAST(NOW() AS DATE))";
$stmt = $mysqli->prepare($sql);
	$name = $_POST['r_user'];
	$stmt->bind_param('s', $name);
	$stmt->execute();
	if ($stmt->affected_rows > 0){
		 header('Location: displayUserInfo.php');
	} else {
		echo "ERROR!!";
	}

?>
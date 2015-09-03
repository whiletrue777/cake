<?php 
$mysqli = new mysqli('localhost', 'root', null, 'test');
if ($mysqli->connect_error) {
	echo $mysqli->connect_error;
	exit();
} else {
	$mysqli->set_charset("utf8");
}
$sql = "UPDATE userinfo SET name=? WHERE id=?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param('si', $_POST['u_name'], $_POST['u_id']);
$stmt->execute();
if ($stmt->affected_rows > 0){
	header('Location: displayUserInfo.php');
} else {
	echo "ERROR!!";
}
 ?>
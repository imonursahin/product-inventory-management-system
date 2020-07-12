<?php

$uid = $_POST["user_id"];
$sifre = $_POST["sifrew"];

include 'db_connect.php';

$sql = "SELECT name, type FROM kullanicilar WHERE id = '$uid' AND sifre = '$sifre'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        session_start();
		$_SESSION['uname'] = $row['name'];
		$_SESSION['uid'] = $uid;
		$_SESSION['utype'] = $row['type'];
    }


	if ($_SESSION['utype'] == 1) {
		header("Location:admin/index.php");
	}
	elseif ($_SESSION['utype'] == 0) {
		header("Location:worker/index.php");
	}
} 
else {
    header("Location:index.php?error=Invalid User ID/sifre");
}


$conn->close();
?>
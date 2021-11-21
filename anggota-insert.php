<?php 
	function dbInsert($nama, $alamat, $telepon, $email){
		require_once('connect.php');
		$sql = "INSERT INTO anggota VALUES (NULL, '$nama', '$alamat', '$telepon', '$email')";
		mysqli_query($connect, $sql);
		return mysqli_insert_id($connect);
		myqli_close();
	}

	$nama 	 = $_POST['nama'];
	$alamat  = $_POST['alamat'];
	$telepon = $_POST['telepon'];
	$email   = $_POST['email'];
	dbInsert($nama, $alamat, $telepon, $email);
	header("location:anggota-tampil.php");
?>
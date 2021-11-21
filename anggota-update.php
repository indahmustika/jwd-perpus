<?php 
	function dbUpdate($id, $nama, $alamat, $telepon, $email){
		require_once('connect.php');
		$sql = "UPDATE anggota SET nama = '$nama', alamat = '$alamat', telepon = '$telepon', email = '$email' WHERE id = '$id'";
		mysqli_query($connect, $sql);
	}

	$id 		= $_POST['id'];
	$nama		= $_POST['nama'];
	$alamat		= $_POST['alamat'];
	$telepon	= $_POST['telepon'];
	$email		= $_POST['email'];
	dbUpdate($id, $nama, $alamat, $telepon, $email);
	header("location:anggota-tampil.php");
?>
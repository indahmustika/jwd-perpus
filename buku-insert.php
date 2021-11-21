<?php 
	function dbInsert($judul, $penulis, $tahun){
		require_once('connect.php');
		$sql = "INSERT INTO buku VALUES (NULL, '$judul', '$penulis', '$tahun')";
		mysqli_query($connect, $sql);
		return mysqli_insert_id($connect);
		myqli_close();
	}

	$judul 	 = $_POST['judul'];
	$penulis = $_POST['penulis'];
	$tahun   = $_POST['tahun'];
	dbInsert($judul, $penulis, $tahun);
	header("location:buku-tampil.php");
?>
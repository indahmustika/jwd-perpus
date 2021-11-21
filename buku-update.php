<?php 
	function dbUpdate($id, $judul, $penulis, $tahun){
		require_once('connect.php');
		$sql = "UPDATE buku SET judul = '$judul', penulis = '$penulis', tahun = '$tahun' WHERE id = '$id'";
		mysqli_query($connect, $sql);
	}

	$id 		= $_POST['id'];
	$judul		= $_POST['judul'];
	$penulis	= $_POST['penulis'];
	$tahun		= $_POST['tahun'];
	dbUpdate($id, $judul, $penulis, $tahun);
	header("location:buku-tampil.php");
?>
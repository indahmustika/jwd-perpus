<?php 
	function dbInsert($id_anggota, $id_buku, $peminjaman, $batas){
		require_once('connect.php');
		$sql = "INSERT INTO transaksi VALUES (NULL, '$id_anggota', '$id_buku', '$peminjaman', '$batas', '', NULL)";
		mysqli_query($connect, $sql);
		return mysqli_insert_id($connect);
		myqli_close();
	}

	$id_anggota = $_POST['id_anggota'];
	$id_buku    = $_POST['id_buku'];
	$peminjaman = $_POST['peminjaman'];
	$batas		= $_POST['batas'];
	dbInsert($id_anggota, $id_buku, $peminjaman, $batas);
	header("location:transaksi-tampil.php");
?>
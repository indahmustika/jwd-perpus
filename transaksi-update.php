<?php 
	function dbUpdate($id, $pengembalian, $denda){
		require_once('connect.php');
		$sql = "UPDATE transaksi SET pengembalian = '$pengembalian', denda = '$denda' WHERE id = '$id'";
		mysqli_query($connect, $sql);
	}
	function hitungDenda($batas, $pengembalian){
		$selisih_waktu 	= ((strtotime($batas)) - (strtotime($pengembalian)));
		$selisih_hari	= $selisih_waktu/86400;
		$denda			= abs($selisih_hari*1000);
		return $denda;
	}

	$id 			= $_POST['id'];
	$batas			= $_POST['batas'];
	$pengembalian	= $_POST['pengembalian'];
	$denda 			= hitungDenda($batas, $pengembalian);
	dbUpdate($id, $pengembalian, $denda);
	header("location:transaksi-tampil.php");
?>
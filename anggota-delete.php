<?php 
	function deleteAnggota($id){
		include_once("connect.php");
		$sql = "DELETE FROM anggota WHERE id = '$id'";
		mysqli_query($connect, $sql);
	}
	$id = $_GET['id'];
	deleteAnggota($id);
	header("location:anggota-tampil.php");
?>
<?php 
	function deleteBuku($id){
		include_once("connect.php");
		$sql = "DELETE FROM buku WHERE id = '$id'";
		mysqli_query($connect, $sql);
	}
	$id = $_GET['id'];
	deleteBuku($id);
	header("location:buku-tampil.php");
?>
<?php 
	function selectAnggota(){
		$conn 	= mysqli_connect("localhost", "root", "", "jwd_perpus");
		$sql 	= "SELECT * FROM anggota";
		$rows   = array();
		$query 	= mysqli_query($conn, $sql);
		while ($row = mysqli_fetch_array($query)) {
			$rows[] = $row;
		}
		return $rows;
	}
?>
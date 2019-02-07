<?php
include 'koneksi.php';
?>

<h3>Simple Search Using PHP</h3>

<form action="index.php" method="get">
	<label>Cari :</label>
	<input type="text" name="name">
	<input type="submit" value="Find">
</form>

<?php
if(isset($_GET['name'])){
	$name = $_GET['name'];
	echo "<b>Search Result : ".$name."</b>";
}
?>

<table border="1">
	<tr>
		<th>No</th>
		<th>Nama</th>
	</tr>
	<?php
	if(isset($_GET['name'])){
		$name = $_GET['name'];
		$data = mysqli_query($db,"select * from data where name like '%".$name."%'");
	}else{
		$data = mysqli_query($db, "select * from data");
	}
	$no = 1;
	while($d = mysqli_fetch_array($data)){
	?>
	<tr>
		<td><?php echo $no++; ?></td>
		<td><?php echo $d['name']; ?></td>
	</tr>
	<?php } ?>
</table>

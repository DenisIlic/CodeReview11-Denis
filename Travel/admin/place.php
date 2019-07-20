<?php  require_once 'server.php'; 
//fetch the record to update 

if (isset($_GET['edit'])) {
		$placeID = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM place WHERE id=$placeID");

		if (count($record) == 1 ) {
			$n = mysqli_fetch_array($record);
			$placeName = $n['placeName'];
			$placeNumber = $n['placeNumber'];
			$placeType = $n['placeType'];
			$placeDesc = $n['placeDesc'];
			$placeAdress = $n['placeAdress'];
		}
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Place Admin-Section</title>
	<link rel="stylesheet" type="text/css" href="../css/style1.css">
</head>
<body>

<?php if (isset($_SESSION['msg'])): ?>
	<div class="msg">
		<?php 
			echo $_SESSION['msg']; 
			unset($_SESSION['msg']);
		?>
	</div>
<?php endif ?>

	<table>
	<thead>
		<tr>
			<th>Name</th>
			<th>Number</th>
			<th>Type</th>
			<th>Description</th>
			<th>Adress</th>
		</tr>
	</thead>
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['placeName']; ?></td>
			<td><?php echo $row['placeNumber']; ?></td>
			<td><?php echo $row['placeType']; ?></td>
			<td><?php echo $row['placeDesc']; ?></td>
			<td><?php echo $row['placeAdress']; ?></td>


			<td>
				<a href="place.php?edit=<?php echo $row['placeID']; ?>" class="edit_btn">Edit</a>
			</td>
			<td>
				<a href="server.php?del=<?php echo $row['placeID']; ?>" class="del_btn">Delete</a>
			</td>


		</tr>
	<?php } ?>
</table>

	<form method="post" action="server.php" >
		<input type="hidden" name="placeID" value="<?php echo $placeID; ?>">
		<div class="input-group">
			<label>Name</label>
			<input type="text" name="placeName" value="<?php echo $placeName; ?>">
		</div>
		<div class="input-group">
			<label>Number</label>
			<input type="text" name="placeNumber" value="<?php echo $placeNumber; ?>">
		</div>
		<div class="input-group">
			<label>Type</label>
			<input type="text" name="placeType" value="<?php echo $placeType; ?>">
		</div>
		<div class="input-group">
			<label>Description</label>
			<input type="text" name="placeDesc" value="<?php echo $placeDesc; ?>">
		</div>
		<div class="input-group">
			<label>Adress</label>
			<input type="text" name="placeAdress" value="<?php echo $placeAdress; ?>">
		</div>
		<div class="input-group">
			<?php if ($update == true): ?>
	<button class="btn" type="submit" name="update" style="background: #556B2F;" >update</button>
<?php else: ?>
	<button class="btn" type="submit" name="save" >Save</button>
<?php endif ?>
			<a class="btn" href="home.php">Go Back</a>
		</div>
	</form>
</body>
</html>
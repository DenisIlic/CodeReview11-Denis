<?php  require_once 'server.php'; 
//fetch the record to update 

if (isset($_GET['edit'])) {
		$concID = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM conert WHERE id=$concID");

		if (count($record) == 1 ) {
			$n = mysqli_fetch_array($record);
			$concName = $n['concName'];
			$concNumber = $n['concNumber'];
			$concType = $n['concType'];
			$concDesc = $n['concDesc'];
			$concAdress = $n['concAdress'];
		}
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>concaurant Admin-Section</title>
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
			<td><?php echo $row['concName']; ?></td>
			<td><?php echo $row['concNumber']; ?></td>
			<td><?php echo $row['concType']; ?></td>
			<td><?php echo $row['concDesc']; ?></td>
			<td><?php echo $row['concAdress']; ?></td>


			<td>
				<a href="concert.php?edit=<?php echo $row['concID']; ?>" class="edit_btn">Edit</a>
			</td>
			<td>
				<a href="server.php?del=<?php echo $row['concID']; ?>" class="del_btn">Delete</a>
			</td>


		</tr>
	<?php } ?>
</table>

	<form method="post" action="server.php" >
		<input type="hidden" name="concID" value="<?php echo $concID; ?>">
		<div class="input-group">
			<label>Name</label>
			<input type="text" name="concName" value="<?php echo $concName; ?>">
		</div>
		<div class="input-group">
			<label>Number</label>
			<input type="text" name="concNumber" value="<?php echo $concNumber; ?>">
		</div>
		<div class="input-group">
			<label>Type</label>
			<input type="text" name="concType" value="<?php echo $concType; ?>">
		</div>
		<div class="input-group">
			<label>Description</label>
			<input type="text" name="concDesc" value="<?php echo $concDesc; ?>">
		</div>
		<div class="input-group">
			<label>Adress</label>
			<input type="text" name="concAdress" value="<?php echo $concAdress; ?>">
		</div>
		<div class="input-group">
			<?php if ($update == true): ?>
	<button class="btn" type="submit" name="update" style="background: #556B2F;" >update</button>
<?php else: ?>
	<button class="btn" type="submit" name="save">Save</button>
<?php endif ?>
			<a class="btn" href="home.php">Go Back</a>
		</div>
	</form>
</body>
</html>
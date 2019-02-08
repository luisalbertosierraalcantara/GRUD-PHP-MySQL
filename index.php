<?php 
/*-----------------------------------------------------------------------------------------------------
  ----------------------- This PHP Script was created by Luis A. Sierra -------------------------------
  -----------------------------------------------------------------------------------------------------*/
  
include('server.php');
include('cn.php');

	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($conn, "SELECT * FROM info WHERE id=$id");

		if (count($record) == 1 ) {
			$n = mysqli_fetch_array($record);
			$name = $n['name'];
			$phone = $n['phone'];
		}

	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>CRUD: Create, Read, Update, Delete PHP MySQL </title>
    <h4 style="color:black;"><center>CRUD: Create, Read, Update, Delete PHP MySQL </center></h4>
    <hr>
    <br>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="main">
	<?php if (isset($_SESSION['message'])): ?>
		<div class="msg">
			<?php 
				echo $_SESSION['message']; 
				unset($_SESSION['message']);
			?>
		</div>
	<?php endif ?>

<?php $results = mysqli_query($conn, "SELECT * FROM info"); ?>

<table style="border:solid 1px #ccc;">
	<thead>
		<tr style= "background:#eee;">
        	<th>ID</th>
			<th>Name</th>
			<th>Phone Number</th>
			<th colspan="2">Action</th>
		</tr>
	</thead>
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>

            <td><?php echo $row['id']; ?></td>
			<td><?php echo $row['name']; ?></td>
			<td style="color:blue;"><?php echo $row['phone']; ?></td>
			<td>
				<button onclick="window.location.assign('index.php?edit=<?php echo $row['id']; ?>')"; class="edit_btn" >Edit</button>
			</td>
			<td>
				<button onclick="window.location.assign('server.php?del=<?php echo $row['id']; ?>')"; class="del_btn">Delete</button>
			</td>
		</tr>
	<?php } ?>
</table>
	
<form method="post" action="server.php" >

	<input type="hidden" name="id" value="<?php echo $id; ?>">

	<div class="input-group">
		<label>Name</label>
		<input type="text" name="name" value="<?php echo $name; ?>">
	</div>
	<div class="input-group">
		<label>Phone</label>
		<input type="tel" name="phone" value="<?php echo $phone; ?>">
	</div>
	<div class="input-group">

		<?Php if ($update == true): ?>
			<button class="btn" type="submit" name="update" style="background:#2E8B57;" >Update</button>
		<?Php else: ?>
			<button class="btn" type="submit" name="save" >Save</button>
		<?Php endif ?>
	</div>
</form>
<center><b>Created by <b style="color:navy;">Luis A. Sierra</b></b></center>
</div>
</body>
</html>
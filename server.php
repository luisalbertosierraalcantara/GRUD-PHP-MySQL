<?Php 
/*-----------------------------------------------------------------------------------------------------
  ----------------------- This PHP Script was created by Luis A. Sierra -------------------------------
  -----------------------------------------------------------------------------------------------------*/
  
    include('cn.php');
	session_start();

	// initialize variables
	$name = "";
	$phone = "";
	$id = 0;
	$update = false;

	if (isset($_POST['save'])) {
		$name = $_POST['name'];
		$phone = $_POST['phone'];

		mysqli_query($conn, "INSERT INTO info (name, phone) VALUES ('$name', '$phone')"); 
		$_SESSION['message'] = "Record saved"; 
		header('location: index.php');
	}

    if (isset($_POST['update'])) {
		$id = $_POST['id'];
		$name = $_POST['name'];
		$phone = $_POST['phone'];

		mysqli_query($conn, "UPDATE info SET name='$name', phone='$phone' WHERE id=$id");
		$_SESSION['message'] = "Record updated!"; 
		header('location: index.php');
	}

if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($conn, "DELETE FROM info WHERE id=$id");
	$_SESSION['message'] = "Record deleted!"; 
	header('location: index.php');
}

	$results = mysqli_query($conn, "SELECT * FROM info"); 

?>
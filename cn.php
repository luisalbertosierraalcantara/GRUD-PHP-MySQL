<?Php 
/*-----------------------------------------------------------------------------------------------------
  ----------------------- This PHP Script was created by Luis A. Sierra -------------------------------
  -----------------------------------------------------------------------------------------------------*/
$username = 'epiz_23175492';     //add the user name of the database
$password = "4kM0m0rhfyH";       //add the password of the database
$hostname = 'sql208.epizy.com';  //add the Hosting or server ip of the database
$db = "epiz_23175492_DB_GRUD";   //add the name of the database

$conn = new mysqli($hostname, $username, $password, $db); //set a var with connection parameter
  
if ($conn->connect_errno) {                               //Try it to connect to the database.
    echo "Fallo al conectar a MySQL: (" . $conn->connect_errno . ") " . $conn->connect_error;
}

?>

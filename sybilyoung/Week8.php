<?php

if(!isset($_COOKIE['show'])) 
{
	header("Location: Week7login.php");
} else {
	 
}

function createConnection()
{
$severname= "localhost";
$username= "rcharity1";
$password= "rcharity1";
$dbname= "rcharity1";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}	
return $conn;
}

function delete($id){
$conn = createConnection();
$sql = "DELETE FROM people WHERE id= '$id'";

if ($conn->query($sql) === TRUE) {
  echo "Entry successfully deleted";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

}

function insert($fn, $ln, $tp){
$conn = createConnection();
$sql = "INSERT INTO people (firstname, lastname, telephone)
VALUES ('$fn', '$ln', '$tp')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
	
}

function display(){

$conn = createConnection();
$sql = "SELECT * FROM people";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo "<table><tr>
    <th>ID</th>
    <th>Name</th>
	<th>Phone</th>
  </tr>
  <tr>";
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>".$row["id"]."</td><td>"." ".$row["firstname"]."\t".$row["lastname"]."</td><td> ".$row["telephone"]."</td></tr>";
  }
  echo "</table>";
} else {
  echo "0 results";
}
$conn->close();
}


?>
<form method= "post" action="Week5.php">
	Display All People:
	<br>
	<input type="submit" value= "Submit" name= "Submit">
</form>
<form method= "post" action="Week5.php">
	Use below form to enter new people.<br>
	First Name: <input type="text" name="fn"><br>
	Last Name: <input type="text" name="ln"><br>
	Phone Number: <input type="text" name="tp"><br>
	<input type="submit" value= "Submit" name="Ins">
</form>
<form method= "post" action="Week5.php">
	Use the form below to delete by id.<br>
	ID: <input type="text" name="id"><br>
	<input type="submit" value= "Submit" name="Del">
<?php
           if(isset($_POST['Submit']))
           {
               display();
           } 
		   
		   if(isset($_POST['Ins']))
		   {
			   
			   insert($_POST["fn"],$_POST["ln"],$_POST["tp"]);
		   }
		   if(isset($_POST['Del']))
		   {
				delete($_POST["id"]);
		   }
		   
		   
        ?>

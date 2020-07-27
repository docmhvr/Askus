<?php
$prev = 0;
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT aid FROM answers";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		$prev = $row["aid"];	
	} 
}	
$stmt = $conn->prepare("INSERT INTO answers(aid,answer,qid) VALUES (?,?,?)");
$stmt->bind_param("isi",$aid,$answer,$qid);

if ( isset( $_POST['submit'] ) ) 
{ 
$answer = $_POST['answer']; 
$aid = ++$prev;
$qid = $_POST['qid'];
$stmt->execute();
}

header("Location: index.php");
exit;

$stmt->close();
$conn->close();
?>
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

$sql = "SELECT qid FROM questions";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		$prev = $row["qid"];	
	} 
}	
$stmt = $conn->prepare("INSERT INTO questions(qid,question) VALUES (?,?)");
$stmt->bind_param("is",$qid,$question);

if ( isset( $_POST['submit'] ) ) 
{ 
$question = $_POST['question']; 
$qid = ++$prev;
$stmt->execute();
}

header("Location: index.php");
exit;

$stmt->close();
$conn->close();
?>
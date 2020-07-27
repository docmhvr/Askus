<!DOCTYPE html>
<html>
<head>
	<title>ASKUS</title>
	<meta charset="utf-8">
	<meta name="language" content="english">
	<style type="text/css">
		body{
			margin: 0 0 0 0;
			font-family: last ninja, fantasy;
			background-color: #ff944d;
		}
		div#header{
			margin: 0px 0px 0px 0px;
			background-image:url("img2.JPG"); 
			background-repeat: : repeat;
		}
		div#nav{
			margin: 0px 0px 0px 0px;
		}
		p#head{
			position: relative;
			margin: 0px 0px 0px 0px;
			color: #003300;
			text-shadow: 3px 2px #003300;
			text-align: center;
			font-size: 100px;
			font-weight: bolder;
			padding: 5px 0px 5px 0px;
		}
		span{
			font-size:40px;
		}
		ul {    
			background-color: #ff0000;    
			margin: 0px 0px 0px 0px;    
			list-style-type: none;    
			padding: 20px 0px 20px 0px; 
		} 
		ul li {    
			display: inline;    
			padding: 20px 70px 20px 20px; 
		} 
		ul li a:link, ul li a:visited {    
			color: #000000;    
			font-weight: bolder; 
		} 
		ul li.selected {    
			background-color: #000000;
		} 
		ul li a{
			font-size: 30px;
		}
		div#main{
			width: 1400px;
		}
		div#fun{
			position: relative;
			float: right;
			width: 320px;
			text-align: center;
			background-image: url("img2.JPG");
		}
		div#content{
			position: relative;
			width: 1000px;
		}
		p#txt1,p#txt2{
			color: #000000;
			font-size: 40px;
			margin: 0 0 0 0;
		}

		div#q{
			font-size: 40px;
			color: black;
		}

		#q{
			font-size: 30px;
			color: red;	
			margin: 0 0 0 0;
		}

		#a{
			font-family: serif;
		}
	</style>
	<script type="text/javascript">
		
	</script>
</head>
<body>
	<div id="main">
	<div id="header">
		<p id="head">ASKUS<span>.com</span></p>
	</div>
	<div id="nav">
		<ul>
			<li><a href="index.php">HOME</a></li>
			<li><a href="question.php">QUESTIONS</a></li>
			<li><a href="aboutus.html">ABOUT US</a></li>
		</ul>
	</div>
	<div id="fun">
		<img src="huu.JPG" width="300px">
		<p id="txt1">Knowledge is power</p>	
		<img src="guu.JPG" width="300px">
		<p id="txt2">So is time and education</p>
		<img src="fuu.JPG" width="300px">
		<p id="txt3">So is computers</p>

	</div>
	<div id="content">
	<?php
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

	$sql1 = "SELECT qid,question,uid FROM questions";
	$result = $conn->query($sql1);

	if ($result->num_rows > 0) {
	    // output data of each row
	    while($row = $result->fetch_assoc()) {
	        echo "<p id='q'>Qs: " . $row["qid"]. " - " . $row["question"]. " " . $row["uid"]. "<br></p>";
	    	
	    	$sql = "SELECT * FROM answers WHERE qid = $row[qid]";
			$solution = $conn->query($sql);
			
			if ($solution->num_rows > 0) {
	    	while($pow = $solution->fetch_assoc()) {
	        echo "<p id='a'>Qs: " . $pow["qid"]. " - " . $pow["answer"]. " " . $pow["uid"]. "<br></p>";
	    	}
			}
		} 
	}
	else {
	echo "0 results";
	}
	$conn->close();
	?>
	</div>
	</div>
</body>
</html>
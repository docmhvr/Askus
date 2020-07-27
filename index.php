<!DOCTYPE html>
<html>
<head>
	<title>ASKUS</title>
	<meta charset="utf-8">
	<meta name="language" content="english">
	<style type="text/css">
		body{
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
			padding: 20px 60px 20px 20px; 
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
			width: 1080px;
		}

		div#newqs,div#newans{
			position: relative;
			width: 1080px;
			background-color: #ff751a;
			margin: 5 0 5 0;
		}

		div#recqs{
			position: relative;
			width: 1080px;
		}
		p#txt1,p#txt2,p#txt3{
			color: #000000;
			font-size: 25px;
			margin: 0 0 0 0;
			font-family: serif;
		}		
		
		#newtxt{
		height: 30px;
		width: 1000px;
		margin: 0px 0px 5px 0px;
		}

		#recq{
			font-size: 30px;
			color: red;	
			margin: 0 0 0 0;
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
		<p style="font-size: 30px;margin: 5 0 0 0;">Have a questions ask us!</p>
		<form action="newqs.php" method="POST">
			<div id="newqs">
				<p id="txt3">Enter your question</p>
				<input type="text" name="question" placeholder="Enter your question" autocomplete="off" id="newtxt" style="font-size:25px;">
				<br>
				<input type="submit" name="submit" value="SUBMIT">
			</div>
		</form>
			<p style="font-size: 30px;margin: 5 0 0 0;">Recent questions</p>
			<div id="recqs">
						<?php
						$flag = 0;
						$count = 1;
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
						while($count < 6)
						{
						$flag = 0;
						$sql = "SELECT qid,question,uid FROM questions";
						$result = $conn->query($sql);

						$sql1 = "SELECT aid,answer,qid,uid FROM answers";
						$solution = $conn->query($sql1);

						if ($result->num_rows > 0) {
						    // output data of each row
						    while($row = $result->fetch_assoc()) {
						    	if ($row["qid"]==$count) {
						    	$flag = 1;
						        echo "<p id='recq'>Qs: " . $row["qid"]. "-" . $row["question"]. " " . 
						        $row["uid"]. "<br></p>";
						        break;
						    	}
						    }
						    while($row = $solution->fetch_assoc()) {
						    	if ($row["qid"]==$count) {
						    	echo "<p id=\"txt3\">Qs:" . $row["qid"]. " - Ans: " . $row["answer"]. " " .
						        $row["uid"]. "<br></p>";
						    	}
						    }
						} 
						else {
						echo "0 results";
						break;
						}
						
						if ($flag == 1) {		
						echo "<form action=\"newans.php\" method=\"POST\">
						<div id=\"newans\">
						<p id=\"txt3\">Do you have a answer</p>
						<input type=\"text\" name=\"answer\" placeholder=\"Enter your answer\" autocomplete=\"off\" id=\"newtxt\" style=\"font-size:25px;\">
						<br>
						<input type=\"hidden\" name=\"qid\" value=\" ". $count . " \">
						<input type=\"submit\" name=\"submit\" value=\"SUBMIT\">
						</div>
						</form>";
						}
						++$count;
						}
			$conn->close();
			?>	
			</div>
		</div>
	</div>
</body>
</html>
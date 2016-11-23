<?php

$fortune_id = rand(519, 813);
$name = $_POST['name'];
$dob = $_POST['dob'];

$dob = str_replace("/", "",$dob);

$name_and_dob = $name . $dob;
$conn = mysqli_connect('localhost','root','dhaval','fortunes');

if(!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

// The text of the fortune we're working with
$fortune_text = '';

// First check if name and dob exists
$sql = "SELECT name_and_dob, fortune_text from used_fortunes where name_and_dob = '$name_and_dob'" ;

$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0) {
		// Entry has been used already
		while($row = $result->fetch_assoc()) {
			$fortune_text = $row['fortune_text'];
		}
} else {
	$sql = "SELECT fortune_text FROM all_fortunes WHERE id=". $fortune_id .";";

	$fortune_text = '';
	$result = mysqli_query($conn, $sql);

	if(mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)) {
			$fortune_text = $row["fortune_text"] . "<br />";
		}
	}

	$sql = "INSERT INTO used_fortunes(name_and_dob, fortune_text) VALUES('". mysqli_real_escape_string($conn, $name_and_dob) . "','". mysqli_real_escape_string($conn, $fortune_text) ."');";

	mysqli_query($conn, $sql);
}

mysqli_close($conn);


?>

<html lang="en">
	<head>
		<meta charset="utf-8">

		<title>INSERT SITE TITLE HERE</title>
		<meta name="description" content="INSERT SITE DESCRIPTION HERE">
		<meta name="author" content="INSERT CONTENT HERE">

		<link rel="stylesheet" href="css/styles.css?v=1.0">

		<!--[if lt IE 9]>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
		<![endif]-->

		<!-- Bootstrap stuff -->
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet"
			href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<!-- Latest compiled JavaScript -->

		<script
			src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script
			src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

		<!-- So it works on mobile -->
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- jquery -->
		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
		<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>

		<!-- Google fonts -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

	</head>
	<body>
		<!-- Standard container so you don't forget -->
		<div class="container">
			<h1><?=$fortune_text?></h1>

		</div>
	</body>

</html>

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

		<script>
			function validate() {
				var retVal = false;
				var nameStr = document.forms["form1"]["name"].value;
				var dobStr =  document.forms["form1"]["dob"].value;
				if (/^[a-zA-Z()]+$/.test(nameStr) && /(\d{1,2}\/){1,2}\d\d/.test(dobStr)) {
					retVal = true;
				}
				return retVal;
			}

		</script>
	</head>
	<body>
		<!-- Standard container so you don't forget -->
		<div class="container">
			<form id="form1" action="fortune.php" method="POST" onsubmit="return validate()">
				<label  for="name">Name </label> <br/>
				<input type="text" class="form-control" name="name" /> <br/>

				<label for="dob">Date of Birth </label> <br/>
				<input type="text" class="form-control" name="dob" /> <br/>

				<input type="submit" class="btn btn-info" value="GO!" />
			</form>
		</div>
	</body>

</html>

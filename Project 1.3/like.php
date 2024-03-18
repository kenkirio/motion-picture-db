<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Bootstrap JS dependencies -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COSI 127b PA1.3</title>
</head>
<body>
	<div class="container my-3">
        <h1 style="text-align:center">COSI 127b PA 1.3</h1>
    </div>

	<!-- Directory buttons -->
	<div class="d-flex justify-content-center my-3">
		<div class="mx-3">
			<button type="button" class="btn btn-primary" id="goHome">
				Return Home
			</button>
		</div>
	</div>

	<div class="d-flex justify-content-center my-3">
		<form name="like-movie-form" class="form-inline" method="POST" action="like.php">
			<div class="mx-2 font-weight-bold">Like a movie!</div>
			<label for="email">Email:</label><br>
			<input type="text" class="form-control mx-2" name="email" id="email">

			<label for="movie-name">Movie:</label><br>
			<input type="text" class="form-control mx-2" name="movie-name" id="movie-name">

			<button type="submit" class="btn btn-primary mx-2">Like</button>
		</form>
	</div>

	<div class="d-flex justify-content-center my-3">

	<?php

	if(isset($_POST["like-movie"])) {

		$user = $_POST['email'];
		$movie = $_POST['movie-name'];

		// SQL CONNECTIONS
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "COSI127b";

		// initialize connection and set attributes for errors/exceptions
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		try {

			// check user credentials
			$stmt = $conn->prepare("SELECT uemail FROM user WHERE uemail = '$user'");
			$stmt->execute();
			$result = $stmt->fetch(PDO::FETCH_ASSOC);
			if ($result == 0) {
				echo "<div class='d-flex justify-content-center' style='color:red'>
						<p style='text-align:center color:red'>Error: invalid user email</p>
					</div>";
			} else {

				// extract mpid
				$stmt = $conn->prepare("SELECT mpid FROM motionpicture WHERE name = '$movie'");
				$stmt->execute();
				$result = $stmt->fetch(PDO::FETCH_ASSOC);

				if ($result == 0) {
					echo "<div class='d-flex justify-content-center' style='color:red'>
						<p style='text-align:center'>Error: motion picture not in database</p>
						</div>";
				} else {

					// add likes
					foreach($result as $k=>$v) {
						$stmt = $conn->prepare("INSERT INTO likes VALUES ('$user', '$v')");
						$stmt->execute();
					}
				}
			}
		}
		catch(PDOException $e) {
			echo "Error: " . $e->getMessage();
		}

		// destroy connection
		$conn = null;
	}

	?>

	</div>
</body>

<script>
	// go to Query page
	$("#goHome").click(function(e) {
		window.location.href = "http://localhost/COSI127b/motion-picture-db/Project%201.3/";
	});
</script>

</html>
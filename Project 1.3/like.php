<?php

		// SQL CONNECTIONS
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "COSI127b";

		// initialize connection and set attributes for errors/exceptions
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		// Like movie
		if(isset($_POST["likedMP"])) {

			$user = $_POST['email'];
			$movie = $_POST['likedMP'];

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
		}

		// destroy connection
		$conn = null;

		// return home
		header("Location: {$_SERVER['HTTP_REFERER']}");
		exit;
?>
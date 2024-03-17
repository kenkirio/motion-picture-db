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
	<div class="d-flex justify-content-center">

		<div class="mx-3">
			<form name="homeForm" id="homeForm" class="justify-content-center" method="POST" action="index.php">
				<button type="button" class="btn btn-primary" id="returnHome">
					Return Home
				</button>
			</form>
		</div>

	</div>

	<div class="container">
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

		$columns = array();
		$columns ["motionpicture"] = ["Name", "Genre", "Rating", "Production", "Budget", "Likes"];
		$columns ["movie"] = ["Name", "Genre", "Rating", "Production", "Budget", "Likes", "Box Office Collection"];
		$columns ["series"] = ["Name", "Genre", "Rating", "Production", "Budget", "Likes", "Season Count"];
		$columns ["people"] = ["Name", "Nationality", "Birthday", "Gender", "Role"];
		$columns ["role"] = ["Motion Picture", "Person", "Role"];
		$columns ["award"] = ["Motion Picture", "Person", "Award Name", "Award Year"];
		$columns ["location"] = ["Motion Picture", "Country", "City", "Zip"];
		$columns ["likes"] = ["Motion Picture", "User"];

		$querySelect = array();
		$querySelect ["motionpicture"] = "name, genre_name, rating, production, budget, like_count";
		$querySelect ["movie"] = "name, genre_name, rating, production, budget, like_count, boxoffice_collection";
		$querySelect ["series"] = "name, genre_name, rating, production, budget, like_count, season_count";
		$querySelect ["people"] = "name, nationality, dob, gender, role_name";
		$querySelect ["role"] = "mp_name, p_name, role_name";
		$querySelect ["award"] = "mp_name, p_name, award_name, award_year";
		$querySelect ["location"] = "mp_name, country, city, zip";
		$querySelect ["likes"] = "mp_name, user_name";
		
					
		// Preset queries
		if(isset($_POST["allTables"])) {
			$title = "Movies";
			$table = "movie";
			$query = "WITH liked_mps AS (SELECT mpid, COUNT(*) AS like_count FROM likes GROUP BY mpid)
					SELECT $querySelect[$table]
					FROM movie NATURAL JOIN genre NATURAL JOIN motionpicture NATURAL JOIN liked_mps";
		} elseif(isset($_POST["allMovies"])) {
			$title = "Movies";
			$table = "movie";
			$query = "WITH liked_mps AS (SELECT mpid, COUNT(*) AS like_count FROM likes GROUP BY mpid)
					SELECT $querySelect[$table]
					FROM movie NATURAL JOIN genre NATURAL JOIN motionpicture NATURAL JOIN liked_mps";
		} elseif(isset($_POST["allActors"])) {
			$title = "Actors";
			$table = "people";
			$query = "WITH actors AS (SELECT pid, role_name FROM role WHERE role_name = 'Actor')
					SELECT $querySelect[$table] 
					FROM people NATURAL JOIN actors";

		// Custom queries
		} elseif(isset($_POST["customQuery"])) {

			$table = $_POST["table"];
			$attribute = $_POST["attribute"];
			$equality = $_POST["equality"];
			$parameter = $_POST["parameter"];

			$title = "";

			// Edge cases
			if ($table == "motionpicture") {
				$title = "Motion Pictures ";
				$query = "WITH liked_mps AS (SELECT mpid, COUNT(*) AS like_count FROM likes GROUP BY mpid)
					SELECT $querySelect[$table]
					FROM $table NATURAL JOIN genre NATURAL JOIN liked_mps
					WHERE $attribute $equality '$parameter'";
			} else if ($table == "movie" || $table == "series") {
				if($table == "movie"){
					$title = "Movies ";
				} else{
					$title = "Series ";
				}
				$query = "WITH liked_mps AS (SELECT mpid, COUNT(*) AS like_count FROM likes GROUP BY mpid)
					SELECT $querySelect[$table]
					FROM $table NATURAL JOIN genre NATURAL JOIN motionpicture NATURAL JOIN liked_mps
					WHERE $attribute $equality '$parameter'";
			} else if ($table == "people") {
				$title = "People ";
				$query = "SELECT $querySelect[$table]
					FROM $table NATURAL JOIN role
					WHERE $attribute $equality '$parameter'";
			} else if ($table == "role" || $table == "award") {
				if($table == "award"){
					$title = "Awards ";
				} else{
					$title = "Roles ";
				}
				$query = "WITH mp_names AS (SELECT mpid, name AS mp_name FROM motionpicture),
					p_names AS (SELECT pid, name AS p_name FROM people)
					SELECT $querySelect[$table]
					FROM mp_names NATURAL JOIN p_names NATURAL JOIN $table
					WHERE $attribute $equality '$parameter'";
			} else if ($table == "location") {
				$title = "Locations ";
				$query = "WITH mp_names AS (SELECT mpid, name AS mp_name FROM motionpicture)
					SELECT $querySelect[$table]
					FROM mp_names NATURAL JOIN $table
					WHERE $attribute $equality '$parameter'";
			} else if ($table == "likes") {
				$title = "Likes ";
				$query = "WITH mp_names AS (SELECT mpid, name AS mp_name FROM motionpicture),
					user_names AS (SELECT uemail, name AS user_name FROM user)
					SELECT $querySelect[$table]
					FROM mp_names NATURAL JOIN user_names NATURAL JOIN $table
					WHERE $attribute $equality '$parameter'";
			}
		// If no button has been clicked, default to display all motion pictures
		} else {
			$title = "Motion Pictures ";
			$table = "motionpicture";
			$query = "WITH liked_mps AS (SELECT mpid, COUNT(*) AS like_count FROM likes GROUP BY mpid)
					SELECT $querySelect[$table]
					FROM $table NATURAL JOIN genre NATURAL JOIN liked_mps
					WHERE $attribute $equality '$parameter'";
		}
		// we will now create a table from PHP side 
		echo "<h1>$title</h1>";
		echo "<table class='table table-md table-bordered'>";
		echo "<thead class='thead-dark' style='text-align: center'>";

		// initialize table headers
		$tableHeaders = "<thead><tr>";
		foreach($columns[$table] as $attribute) {
			$tableHeaders .= "<th class='col-md-2' style='text-align:center'>$attribute</th>";
		}
		$tableHeaders .= "</tr></thead>";
		echo $tableHeaders;

		// generic table builder. It will automatically build table data rows irrespective of result
		class TableRows extends RecursiveIteratorIterator {
			function __construct($it) {
				parent::__construct($it, self::LEAVES_ONLY);
			}

			function current() {
				return "<td style='text-align:center'>" . parent::current(). "</td>";
			}

			function beginChildren() {
				echo "<tr>";
			}

			function endChildren() {
				echo "</tr>" . "\n";
			}
		}

		try {
			// We will use PDO to connect to MySQL DB. This part need not be 
			// replicated if we are having multiple queries. 
			// initialize connection and set attributes for errors/exceptions
			$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			// prepare statement for executions. This part needs to change for every query
			$stmt = $conn->prepare($query);

			// execute statement
			$stmt->execute();

			// set the resulting array to associative. 
			$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

			// for each row that we fetched, use the iterator to build a table row on front-end
			foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
				echo $v;
			}

		} catch(PDOException $e) {
			echo "Error: " . $e->getMessage();
		}
		echo "</table>";
		
		// destroy connection
		$conn = null;
    ?>
	</div>
</body>

<script>
	// return home
	$("#returnHome").click(function(e) {
		window.location.href = document.referrer;
	});
</script>

</html>
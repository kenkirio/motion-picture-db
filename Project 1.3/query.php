<?php session_start(); ?>
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

		echo $_SESSION["filter-title"];
		
					
		// Preset queries
		if(isset($_POST["allTables"])) {
			$table = "movie";
			$query = "WITH liked_mps AS (SELECT mpid, COUNT(*) AS like_count FROM likes GROUP BY mpid)
					SELECT $querySelect[$table]
					FROM movie NATURAL JOIN genre NATURAL JOIN motionpicture NATURAL JOIN liked_mps";
		} elseif(isset($_POST["allMovies"])) {
			$table = "movie";
			$query = "WITH liked_mps AS (SELECT mpid, COUNT(*) AS like_count FROM likes GROUP BY mpid)
					SELECT $querySelect[$table]
					FROM movie NATURAL JOIN genre NATURAL JOIN motionpicture NATURAL JOIN liked_mps";
		} elseif(isset($_POST["allActors"])) {
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

			// Edge cases
			if ($table == "motionpicture") {
				$query = "WITH liked_mps AS (SELECT mpid, COUNT(*) AS like_count FROM likes GROUP BY mpid)
					SELECT $querySelect[$table]
					FROM $table NATURAL JOIN genre NATURAL JOIN liked_mps
					WHERE $attribute $equality '$parameter'";
			} else if ($table == "movie" || $table == "series") {
				$query = "WITH liked_mps AS (SELECT mpid, COUNT(*) AS like_count FROM likes GROUP BY mpid)
					SELECT $querySelect[$table]
					FROM $table NATURAL JOIN genre NATURAL JOIN motionpicture NATURAL JOIN liked_mps
					WHERE $attribute $equality '$parameter'";
			} else if ($table == "people") {
				$query = "SELECT $querySelect[$table]
					FROM $table NATURAL JOIN role
					WHERE $attribute $equality '$parameter'";
			} else if ($table == "role" || $table == "award") {
				$query = "WITH mp_names AS (SELECT mpid, name AS mp_name FROM motionpicture),
					p_names AS (SELECT pid, name AS p_name FROM people)
					SELECT $querySelect[$table]
					FROM mp_names NATURAL JOIN p_names NATURAL JOIN $table
					WHERE $attribute $equality '$parameter'";
			} else if ($table == "location") {
				$query = "WITH mp_names AS (SELECT mpid, name AS mp_name FROM motionpicture)
					SELECT $querySelect[$table]
					FROM mp_names NATURAL JOIN $table
					WHERE $attribute $equality '$parameter'";
			} else if ($table == "likes") {
				$query = "WITH mp_names AS (SELECT mpid, name AS mp_name FROM motionpicture),
					user_names AS (SELECT uemail, name AS user_name FROM user)
					SELECT $querySelect[$table]
					FROM mp_names NATURAL JOIN user_names NATURAL JOIN $table
					WHERE $attribute $equality '$parameter'";
			}
		// If no button has been clicked, default to display all motion pictures
		} else {
			$table = "motionpicture";
			$query = "WITH liked_mps AS (SELECT mpid, COUNT(*) AS like_count FROM likes GROUP BY mpid)
					SELECT $querySelect[$table]
					FROM $table NATURAL JOIN genre NATURAL JOIN liked_mps
					WHERE $attribute $equality '$parameter'";
		}
		// we will now create a table from PHP side 
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
	$("#goHome").click(function(e) {
		window.location.href = "http://localhost/COSI127b/motion-picture-db/Project%201.3/";
	});
</script>

</html>
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

		$invalidQuery = false;

		// Preset queries
		if (isset($_POST["allTables"])) {
			$query = "SHOW TABLES";
			$fields = ["Tables"];
		} elseif (isset($_POST["allMovies"])) {
			$query = "SELECT name, rating, production, budget FROM motionpicture";
			$fields = ["Title", "Rating", "Production", "Budget"];
		} elseif (isset($_POST["allActors"])) {
			$query = "WITH Actors AS (SELECT pid, role_name FROM role WHERE role_name = 'Actor')
					SELECT name, nationality, dob, gender
					FROM People NATURAL JOIN Actors";
			$fields = ["Name", "Nationality", "DOB", "Gender"];
		} elseif (isset($_POST["ageAward"])) {
			$query = "WITH Dob AS (SELECT id as pid, name, dob FROM PEOPLE), Award_age AS (SELECT name, TIMESTAMPDIFF(YEAR, dob, str_to_date(CONCAT(award_year,'-12-31'), '%Y-%m-%d')) AS age FROM Award NATURAL JOIN Dob) SELECT name, age FROM Award_age WHERE age = (select max(age) from Award_age) OR age = (select min(age) from Award_age)
			";
			$fields = ["Name", "Age"];
		} elseif (isset($_POST["marvelWarnerActors"])) {
			$query = "WITH mp AS (SELECT id AS mpid, name, production FROM MotionPicture), p AS (SELECT id AS pid, name FROM People), Marvel AS (SELECT mpid, name AS mname FROM mp WHERE production = 'Marvel'), WarnerBros AS (SELECT mpid, name AS wname FROM mp WHERE production = 'Warner Bros'), 
			Actor AS (SELECT name AS aname, pid, mpid FROM p NATURAL JOIN Role WHERE role_name = 'Actor'),
			Wba AS (SELECT * FROM WarnerBros NATURAL JOIN Actor), Ma AS (SELECT * FROM Marvel NATURAL JOIN Actor)
			SELECT mname, wname, Wba.aname FROM Wba JOIN Ma ON Wba.pid = Ma.pid
			";
			$fields = ["Marvel Title", "Warner Bros Title", "Name"];
		} elseif (isset($_POST["mpComedyHigher"])) {
			$query = "WITH Comedy AS 
			(SELECT rating 
			FROM MotionPicture NATURAL JOIN Genre
			WHERE genre_name = 'Comedy')
			SELECT name, rating
			FROM MotionPicture
			WHERE rating > (SELECT AVG(rating) from Comedy)
			ORDER BY rating DESC
			";
			$fields = ["Title", "Rating"];
		} else if (isset($_POST["mpTopPeopleCount"])) {
			$query = "WITH mp_names AS 
			(SELECT id AS mpid, name 
			FROM motionpicture)
			SELECT name, COUNT(DISTINCT pid) AS people_count, COUNT(DISTINCT role_name) AS role_count
			FROM Role NATURAL JOIN mp_names
			GROUP BY mpid
			ORDER BY people_count DESC
			LIMIT 5
			";
			$fields = ['Title', 'People Count', 'Role Count'];
		} else if (isset($_POST["peopleMultipleAwards"])) {
			if (!empty($_POST["award-count-min"])) {
				$k = $_POST["award-count-min"];
				$query = 
				"WITH p_names AS 
				(SELECT id AS pid, name AS pname
				FROM People),
				mp_names AS 
				(SELECT id AS mpid, name AS mpname
				FROM motionpicture)
				SELECT pname, mpname, award_year, COUNT(*) as count
				FROM Award NATURAL JOIN p_names NATURAL JOIN mp_names 
				GROUP BY pid, mpid, award_year
				HAVING COUNT(*) > $k
				";
				$fields = ['Name', 'Title', 'Award Year', 'Award Count'];
			} else {
				$invalidQuery = true;
			}
		} else if (isset($_POST["peopleMultipleRoles"])) {
			if (!empty($_POST["rating-min"])) {
				$x = $_POST["rating-min"];
				$query = 
				"WITH p_names AS 
				(SELECT id AS pid, name AS pname
				FROM People),
				mp_names AS 
				(SELECT id AS mpid, name AS mpname
				FROM motionpicture
				WHERE rating > $x)
				SELECT pname, mpname, COUNT(*) AS count
				FROM Role NATURAL JOIN mp_names NATURAL JOIN p_names
				GROUP BY pid, mpid
				HAVING COUNT(*) > 1
				";
				$fields = ['Name', 'Title', 'Role Count'];
			} else {
				$invalidQuery = true;
			}
		} else if (isset($_POST["mpRatingAge"])) {
			if (!empty($_POST["likes-count-min"]) && !empty($_POST["age-max"])) {
				$x = $_POST["likes-count-min"];
				$y = $_POST["age-max"];
				$query = 
				"WITH mp_names AS 
				(SELECT id AS mpid, name AS mpname
				FROM motionpicture)
				SELECT mpname, COUNT(*) as count
				FROM likes NATURAL JOIN user NATURAL JOIN mp_names
				WHERE age < $y
				GROUP BY mpid
				HAVING COUNT(*) > $x";
				$fields = ['Title', 'Like Count'];
			} else {
				$invalidQuery = true;
			}

		// Custom queries
		} else {

			function minmax($x) {
				if ($x == "min") {
					return ">=";
				} else {
					return "<=";
				}
			}

			$possibleFieldVars = array("mp-name", "mp-rating", "mp-budget", "count-likes", "likes-uemail", "likes-age", "genre", "count-role-mp", "count-award-mp", "award-mp-award_name", "mp-production", "location-country", "location-city", "location-zip", "movie-boxoffice_collection", "series-season_count", "people-name", "people-dob", "count-role-p", "role-role_name", "count-award-p", "award-p-award_name", "people-gender", "people-nationality");

			$filters = [];
			$sameMPQueries = [];
			$samePQueries = [];
			$countQueries = [];
			$mpFilter = false;
			$pFilter = false;

			foreach ($_SESSION["filterVars"] as $varName) {
				$parts = explode('-', $varName);
				$param = $_SESSION[$varName];

				if ($parts[0] == "same") {
					if (sizeof($parts) == 2) {	// Just genre
						array_push($sameMPQueries, "genre");
					} else if (sizeof($parts) == 3) {
						if ($parts[1] == "mp") {
							array_push($sameMPQueries, $parts[2]);
						} else if ($parts[1] == "people") {
							array_push($samePQueries, $parts[2]);
						}
					} else {
						array_push($sameQueries, $parts[2]);
					}
				} else if ($parts[0] == "count") {
					array_push($countQueries, $parts);
				} else {
					// Check if filtering by MP or People
					if ($parts[0] == "people" || (sizeof($parts) > 1 && $parts[1] == "p")) {
						$pFilter = true;
					} else {
						$mpFilter = true;
					}

					if ($parts[0] == "type") {
						if ($param != "all") {
							$query = 
							"SELECT id
							FROM MotionPicture 
							WHERE id IN (SELECT mpid FROM $param)";
						}
					} if ($parts[0] == "genre") {
						$genres = "'" . implode(", ", $param) . "'";
						$query = 
						"SELECT mpid 
						FROM Genre 
						WHERE FIND_IN_SET(genre_name, ($genres)) > 0";
					// Simple selection
					} else if (sizeof($parts) == 2) {
						$table = $parts[0];
						$field = $parts[1];

						if ($table == "mp") {
						$query = "SELECT id AS mpid
								FROM MotionPicture
								WHERE $field = '$param'";
						} else if ($table == "people") {
							$query = "SELECT id AS pid
							FROM People
							WHERE $field = '$param'";
						} else {
							// Exclusive location
							if ($table == "location" && in_array("location-exclusive", $_SESSION["filterVars"])) {
								if ($field != "exclusive") {
								$query = "SELECT mpid 
										FROM Location 
										WHERE mpid NOT IN (
										SELECT mpid
										FROM Location
										WHERE $field != '$param')";
								}
							} else {
								$query = "SELECT mpid
										FROM $table
										WHERE $field = '$param'";
							}
						}
					} else if (sizeof($parts) == 3) {
						$table = $parts[0];
						$field = $parts[1];
						if ($table == "likes") {
							$operator = minmax($parts[2]);
							if ($field == "age") {
								$query = "SELECT mpid
										FROM Likes l JOIN User u ON l.uemail = u.email
										WHERE age $operator $param";
							}
						} else if ($table == "role" || $table == "award") {
							$modField = $table . '_name';
							$where = implode(" OR $modField = ", $param);
							
							$query = "SELECT mpid, pid
										FROM $table
										WHERE $modField = '$where'";
						} else if ($table == "mp") {
							$operator = minmax($parts[2]);
							$query = "SELECT id AS mpid
									FROM motionpicture
									WHERE $field $operator $param";
						} else if ($table == "people") {
							if ($parts[2] == "value") {
								$operator = $_SESSION["people-dob-equality"];
								$query = "SELECT id AS pid
										FROM People
										WHERE dob $operator $param";
							}
						} else {
							$operator = minmax($parts[2]);
							$query = "SELECT mpid
									FROM $table
									WHERE $field $operator $param";
						}
					}
					if (sizeof($parts) == 4) {
						$table = $parts[0];
						$refTable = $parts[1];
						$operator = minmax($parts[3]);
						$field = $table . '_name';
						$countName = $table . '_count';

						if ($reftable == "mp") {
							$query = "SELECT mpid, COUNT(DISTINCT $field) AS $countName
							FROM MotionPicture mp JOIN $table t ON mp.id = t.mpid 
							GROUP BY mpid
							HAVING $countName $operator $param";
						} else if ($reftable == "p") {
							$query = "SELECT pid, COUNT(DISTINCT $field) AS $countName
							FROM People p JOIN $table t ON p.id = t.pid 
							GROUP BY pid
							HAVING $countName $operator $param";
						}
						array_push($countQueries, $query);
					} else {
						array_push($filters, $query);
					}
				}
			}

			$fieldVars = array();
			foreach ($possibleFieldVars as $varName) {
				// If the variable was sent
				if (filter_has_var(INPUT_POST, $varName)) {
					array_push($fieldVars, $varName);
				}
			}

			$fields = [];
			$countFields = [];
			$tables = [];

			foreach ($fieldVars as $varName) {
				$parts = explode('-', $varName);

				if (sizeof($parts) == 1) {
					array_push($fields, "genre_name");
					array_push($tables, "genre");
				} else if (sizeof($parts) == 2) {
					if ($varName == "likes-age") {
						array_push($fields, "age");
						array_push($tables, "likes");
						array_push($tables, "user");
					} else {
						if ($parts[1] == "name") {
							if ($parts[0] == "mp") {
								array_push($fields, "title");
							} else {
								array_push($fields, "name");
							}
						} else {
							array_push($fields, $parts[1]);
							if ($parts[0] != "mp" && $parts[0] != "people") {
								array_push($tables, $parts[0]);
							}
						}
					}
				} else if (sizeof($parts) == 3) {
					if ($parts[2] == "name") {
						array_push($fields, $parts[0] . "_name");
						array_push($tables, $parts[0]);
					}
					
				}
			}


			$counts = sizeof($countQueries) > 0;
			$sameMPs = sizeof($sameMPQueries) > 0;
			$samePs = sizeof($samePQueries) > 0;

			// Counting
/*			if ($counts) {

				foreach ($counts as $c) {
					$parts = explode('-', $c);
					array_push($fields, );

					// With same queries
					if ($sameMPs || $samePs) {
						

					// No same queries
					} else {

					}
				}

			// No counts, same queries for MPs and People
			} else */if ($sameMPs && $samePs) {
				$queryTables = array("role");
				$queryTables = array_merge($queryTables, array_unique($tables));
				$queryTables = implode(" NATURAL JOIN ", $queryTables);
				$queryTables = "mp mp1, mp mp2 NATURAL JOIN p p1, p p2 NATURAL JOIN " . $queryTables;

			// Same queries for only one of MP or People
			} else if ($sameMPs) {
				$queryTables = array("p", "role");
				$queryTables = array_merge($queryTables, array_unique($tables));
				$queryTables = implode(" NATURAL JOIN ", $queryTables);
				$queryTables = "mp mp1, mp mp2 NATURAL JOIN ". $queryTables;
			} else if ($samePs) {
				$queryTables = array("mp", "role");
				$queryTables = array_merge($queryTables, array_unique($tables));
				$queryTables = implode(" NATURAL JOIN ", $queryTables);
				$queryTables = "p p1, p p2 NATURAL JOIN ". $queryTables;

			// No same queries
			} else {
				$queryTables = array("mp", "p", "role");
				$queryTables = array_merge($queryTables, array_unique($tables));
				$queryTables = implode(" NATURAL JOIN ", $queryTables);
			}

			/*
			Priority: Person name, MP title, Person info, MP info
			*/
			function orderFields($fields) {

				$filled = 0;
				$reverseOrder = array("boxoffice_collection", "season_count", "title", "name");
				
				foreach($reverseOrder as $o) {
					$idx = array_search($o, $fields);
					if ($idx) {
						unset($fields[$idx]);	// Remove
						array_unshift($fields, $o);
					}
				}
				return $fields;
			}

			/* Fields is an array of field names to be adjusted if using sameQueries
			   mp is a boolean representing whether MPs have any same queries
			   p is a boolean representing whether Ps have any same queries
			*/
			function adjustFields($fields, $mp, $p) {
				$mpFields = array("title", "rating", "budget", "genre_name");
				$pFields = array("name", "dob", "role_name", "gender", "nationality");

				for ($x = 0; $x < sizeof($fields); $x++) {
					if ($mp && in_array($fields[$x], $mpFields)) {
						if ($fields[$x] == "name") {
							array_splice($fields, $x+1, 0, "mp2." . $fields[$x] . " AS mp2");
							$fields[$x] = "mp1." . $fields[$x] . " AS mp1";
						} else {
							$fields[$x] = "mp1." . $fields[$x];
						}
					}
					if ($p && in_array($fields[$x], $pFields)) {
						if ($fields[$x] == "name") {
							array_splice($fields, $x+1, 0, "p2." . $fields[$x] . " AS p2");
							$fields[$x] = "p1." . $fields[$x] . " AS p1";
						} else {
							$fields[$x] = "p1." . $fields[$x];
						}
					}
				}
				return $fields;
			}

			$fields = array_unique($fields);
			$fields = orderFields($fields);
			$fields = adjustFields($fields, $sameMPs, $samePs);
			$queryFields = implode(", ", $fields);


			$queryFilters = "WITH mp AS (SELECT id AS mpid, name AS title, rating, production, budget FROM MotionPicture), p AS (SELECT id AS pid, name, nationality, dob, gender FROM People) ";
			$queryJoin = "(SELECT * FROM ";
			for ($x = 0; $x < sizeof($filters); $x++) {
				$queryFilters .= ", t" . $x . " AS (" . $filters[$x] . ") ";
				$queryJoin .= "t" . $x ." NATURAL JOIN ";
			}
			$queryJoin = substr($queryJoin, 0, -14) . ") ";
			if (strlen($queryJoin) < 4) {
				$queryJoin = "";
			} else {
				$queryJoin = ", filtered AS " . $queryJoin;
			}


			$where = " WHERE ";
			foreach ($sameMPQueries as $sameFilter) {
				$where .= "mp1." . $sameFilter . " = mp2." . $sameFilter . " AND ";
			}
			foreach ($samePQueries as $sameFilter) {
				$where .= "p1." . $sameFilter . " = p2." . $sameFilter . " AND ";
			}

			// Same queries for MPs and People
			if ($sameMPs && $samePs) {
				$where .= "mp1.mpid < mp2.mpid AND p1.pid < p2.pid AND mp1.mpid IN (SELECT mpid FROM filtered) AND mp2.mpid IN (SELECT mpid FROM filtered) AND p1.pid IN (SELECT pid FROM filtered) AND p2.pid IN (SELECT pid FROM filtered)";

			// Same queries for only one of MP or People
			} else if ($sameMPs) {
				$where .= "mp1.mpid < mp2.mpid AND mp1.mpid IN (SELECT mpid FROM filtered) AND mp2.mpid IN (SELECT mpid FROM filtered)";
			} else if ($samePs) {
				$where .= "p1.pid < p2.pid AND p1.pid IN (SELECT pid FROM filtered) AND p2.pid IN (SELECT pid FROM filtered)";

			// No same queries
			} else if ($mpFilter && $pFilter) {
				$where = " WHERE mpid IN (SELECT mpid FROM filtered) AND pid IN (SELECT pid FROM filtered)";
			} else if ($mpFilter) {
				$where = " WHERE mpid IN (SELECT mpid FROM filtered)";
			} else if ($pFilter) {
				$where = " WHERE pid IN (SELECT pid FROM filtered)";
			} else {
				$where = "";
			}

			$query = $queryFilters . $queryJoin . "SELECT DISTINCT " . $queryFields . " FROM " . $queryTables . $where;

			if (filter_has_var(INPUT_POST, "top")) {
				$query .= " ORDER BY " . $_POST['top'] . " DESC";
			}

			if (is_numeric($_POST['quantity'])) {
				$query .= " LIMIT " . $_POST['quantity'];
			}
		}
		


//		$where = "";
//		foreach ($mpFilters as $filter) {
//			$where .= "mp.id IN (" . $filter . ") AND ";
//		}
//		foreach ($pFilters as $filter) {
//			$where .= "p.id IN (" . $filter . ") AND ";
//		}		
//		$where = substr($where, 0, -5);

//		$query = "SELECT DISTINCT " . $queryFields . " FROM " . $queryTables . " WHERE " . $where;
//		echo $query;

/*
		// Edge case: compound like counting
		if ((in_array("likes-count-min", $_SESSION["filterVars"]) || in_array("likes-count-max", $_SESSION["filterVars"])) && (in_array("likes-age-min", $_SESSION["filterVars"]) || in_array("likes-age-max", $_SESSION["filterVars"]))) {
			if ($parts[1] == "count") {
				if((in_array("likes-age-min", $_SESSION["filterVars"]) && in_array("likes-age-max", $_SESSION["filterVars"]))) {
					$ageMin = $_SESSION["likes-age-min"];
					$ageMax = $_SESSION["likes-age-max"];
					$query = "SELECT " . implode(",", $fields) . ", COUNT(DISTINCT *) AS likes_count FROM " . implode(",", $tables) .
						" JOIN Likes l ON mp.id = l.mpid JOIN User u ON mp.id = u.mpid
						WHERE " . implode(",", $where) . "age >= $ageMin AND age <= $ageMax
						GROUP BY mpid
						HAVING COUNT(*) $operator $value";
				} else if (in_array("likes-age-min", $_SESSION["filterVars"])) {
					$ageMin = $_SESSION["likes-age-min"];
					$query = "SELECT mpid, COUNT(DISTINCT *) AS likes_count
						FROM MotionPicture mp JOIN Likes l ON mp.id = l.mpid JOIN User u ON mp.id = u.mpid
						WHERE age >= $ageMin
						GROUP BY mpid
						HAVING COUNT(*) $operator $value";
				} else {
					$ageMax = $_SESSION["likes-age-max"];
					$query = "SELECT mpid, COUNT(DISTINCT *) AS likes_count
						FROM MotionPicture mp JOIN Likes l ON mp.id = l.mpid JOIN User u ON mp.id = u.mpid
						WHERE age <= $ageMax
						GROUP BY mpid
						HAVING COUNT(*) $operator $value";
				}
			}
		}
		// Number of likes an mp received
		else if ($field == "count") {
			array_push($countQueries, 
			"SELECT id AS mpid, COUNT(*) AS like_count
			FROM MotionPicture mp JOIN Likes l ON mp.id = l.mpid
			GROUP BY mpid
			WHERE COUNT(*) $operator $value");
		}
*/

		if ($invalidQuery) {
			echo "<div class='d-flex justify-content-center' style='color:red'>
			<p style='text-align:center'>Error: Query requires parameter</p>
			</div>";
		} else {
			// we will now create a table from PHP side 
			echo "<table class='table table-md table-bordered'>";
			echo "<thead class='thead-dark' style='text-align: center'>";


			// initialize table headers
			$tableHeaders = "<thead><tr>";
			foreach ($fields as $attribute) {
				if (str_contains("AS", $attribute)) {
					$attribute = explode(" AS ", $attribute)[1];
				} else if (str_contains(".", $attribute)) {
					$attribute =  explode(" ", $attribute)[0];
					$attribute = explode(".", $attribute)[1];
				}
				$tableHeaders .= "<th class='col-md-2' style='text-align:center'>$attribute</th>";
			}
			$tableHeaders .= "</tr></thead>";
			echo $tableHeaders;

			// generic table builder. It will automatically build table data rows irrespective of result
			class TableRows extends RecursiveIteratorIterator
			{
				function __construct($it)
				{
					parent::__construct($it, self::LEAVES_ONLY);
				}

				function current()
				{
					return "<td style='text-align:center'>" . parent::current() . "</td>";
				}

				function beginChildren()
				{
					echo "<tr>";
				}

				function endChildren()
				{
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
				foreach (new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k => $v) {
					echo $v;
				}
			} catch (PDOException $e) {
				echo "Error: " . $e->getMessage();
			}
			echo "</table>";

			// destroy connection
			$conn = null;
		}
		
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
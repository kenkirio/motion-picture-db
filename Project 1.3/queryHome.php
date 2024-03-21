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

		<div class="mx-3">
				<button type="button" class="btn btn-primary" id="goCustomQuery">
					Create Custom Query
				</button>
		</div>
	</div>

	<div class="container mt-5 mb-3">
		<h3 style="text-align:center">Select a Query</h3>
	</div>

	<!-- Preset queries -->
	<div class="d-flex justify-content-center my-3">
		<div class="mx-3">
			<form name="allTablesForm" method="post" action="query.php">
        		<div class="input-group mb-3">
            		<button name="allTables" class="btn btn-outline-primary" type="submit">View All Tables</button>
            	</div>
        	</form>
		</div>
		<div class="mx-3">
			<form name="allMoviesForm" method="post" action="query.php">
        		<div class="input-group mb-3">
            		<button name="allMovies" class="btn btn-outline-primary" type="submit">View All Movies</button>
            	</div>
        	</form>
		</div>
		<div class="mx-3">
			<form name="allActorsForm" method="post" action="query.php">
				<div class="input-group mb-3">
					<button name="allActors" class="btn btn-outline-primary" type="submit">View All Actors</button>
				</div>
			</form>
		</div>
	</div>
	<div class="row justify-content-center my-3">
    	<div class="col-auto">
			<form name="AgeAwardForm" method="post" action="query.php">
				<button name="ageAward" class="btn btn-outline-primary" type="submit" style="word-wrap: break-word;">Youngest & Oldest Award-Winning Actors</button>
			</form>
		</div>
    	<div class="col-auto">
			<form name="marvelWarnerActorsForm" method="post" action="query.php">
				<button name="marvelWarnerActors" class="btn btn-outline-primary" type="submit" style="word-wrap: break-word;">Actors in Marvel and Warner Bros</button>
			</form>
		</div>
    	<div class="col-auto">
			<form name="mpComedyHigherForm" method="post" action="query.php">
				<div class="input-group mb-3">
					<button name="mpComedyHigher" class="btn btn-outline-primary" type="submit" style="word-wrap: break-word;">Motion Pictures Rated Higher Than Average Comedy</button>
				</div>
			</form>
		</div>
		
	</div>

</body>

<script>
	// go to Query page
	$("#goHome").click(function(e) {
		window.location.href = "http://localhost/COSI127b/motion-picture-db/Project%201.3/";
	});
	
	// go to Like page
	$("#goCustomQuery").click(function(e) {
		window.location.href = "http://localhost/COSI127b/motion-picture-db/Project%201.3/selectFilters.php";
	});
</script>

</html>

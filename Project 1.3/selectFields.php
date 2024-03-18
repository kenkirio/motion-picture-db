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
		<h3 style="text-align:center">Select Query Fields</h3>
	</div>

	<!-- Directory buttons -->
	<div class="d-flex justify-content-center my-3">
		<div class="mx-3">
			<button type="button" class="btn btn-primary" id="goHome">
				Return Home
			</button>
		</div>

		<div class="mx-3">
			<button type="button" class="btn btn-primary" id="goNext">
				Next
			</button>
		</div>
	</div>
	

	<!-- Acordian selection menu -->
	<div class="d-flex justify-content-center">
		<div id="accordion">
			<div class="card" style="width: 800px">
				<div class="card-header" id="headingOne">
					<h5 class="mb-6">
						<button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
							Motion Picture
						</button>
					</h5>
				</div>

				<div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
					<div class="card-body">
						<form id="allMoviesForm" method="post" action="query.php" class="my-2">
							<button class="btn btn-primary" type="submit" name="allMovies" id="button-addon2">View All Movies</button>
						</form>
					</div>
				</div>
			</div>
			<div class="card" style="width: 800px">
				<div class="card-header" id="headingTwo">
					<h5 class="mb-0">
						<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
							People
						</button>
					</h5>
				</div>
				<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
					<div class="card-body">
						<form id="allActorsForm" method="post" action="query.php" class="my-2">
							<button class="btn btn-primary" type="submit" name="allActors" id="button-addon2">View All Actors</button>
						</form>
					</div>
				</div>
			</div>
			<div class="card" style="width: 800px">
				<div class="card-header" id="headingThree" >
					<h5 class="mb-0">
						<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
							Collaboration
						</button>
					</h5>
				</div>
				<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
					<div class="card-body">
						Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="justify-content-center mb-2">
		<form name="customQueryForm" id="customQueryForm" class="justify-content-center" method="POST" action="query.php">
			<div class="form-group row justify-content-md-center">
				<div class="col-md-auto align-self-center">
					<label for="table">View</label>
				</div>
				<div class="col-md-auto">
					<select class="form-control" name="table-selector" id="table-selector">
						<option value="motionpicture" selected="selected">Motion Pictures</option>
						<option value="movie">Movies</option>
						<option value="series">Series</option>
						<option value="people">People</option>
						<option value="role">Roles</option>
						<option value="award">Awards</option>
						<option value="location">Shooting Locations</option>
						<option value="likes">Likes</option>
					</select>
				</div>
			</div>
			<div class="form-group row justify-content-md-center">
				<div class="col col-lg-1 align-self-center">
					<label for="attribute">Filter by</label>
				</div>
				<div class="col-md-auto">
					<select class="form-control" name="attribute1" id="attribute1">
						<option value="name">Name</option>
						<option value="rating">Rating</option>
						<option value="production">Production</option>
						<option value="budget">Budget</option>
						<option value="genre">Genre</option>
						<option value="like_count">Likes</option>
					</select>
				</div>
				<div class="col-md-auto">
					<select class="form-control" name="equality1" id="equality1">
						<option value='='>=</option>
					</select>
				</div>
				<div class="col-md-auto">
					<input class="form-control" type="text" class="m-2" name="parameter1" id="parameter1">
				</div>
				<div class="col col-lg-1">
					<button type="submit" class="btn btn-primary" name="customQuery">Search</button>
				</div>
			</div>
		</form>
	</div>

	<div class="d-flex justify-content-center mb-2">
		<button type="button" class="btn btn-primary" id="addFilter">Add Additional Field</button>
	</div>

</body>

<script>
	// return home
	$("#goHome").click(function(e) {
		window.location.href = "http://localhost/COSI127b/motion-picture-db/Project%201.3/";
	});

	// return home
	$("#goNext").click(function(e) {
		window.location.href = "http://localhost/COSI127b/motion-picture-db/Project%201.3/query.php";
	});
</script>

<script>
	// Show all tables
	$("#showTables").click(function(e) {
		$("#body").empty();
		$("#body").append(
			`<div class="d-flex justify-content-center">
				<ul>
					<li>MotionPicture (id, name, rating, production, budget)</li>
					<li>User (email, name, age)</li>
					<li>Likes (uemail, mpid)</li>
					<li>Movie (mpid, boxoffice_collection)</li>
					<li>Series (mpid, season_count)</li>
					<li>People (id, name, nationality, dob, gender)</li>
					<li>Role (mpid, pid, role_name)</li>
					<li>Award (mpid, pid, award_name, award_year)</li>
					<li>Genre (mpid, genre_name)</li>
					<li>Location (mpid, zip, city, country)</li>
				</ul>
			</div>`);
	});

	// Show query form
	$("#showQuery").click(function(e) {
		$("#body").empty();
		$("#body").append(
			``
		);
	});


	// Track table for custom query
	$("#table").change(function() {
		var customDB = $(this).val();
		$(".attribute-selector").empty();

		if (customDB === "motionpicture") {
			$(".attribute-selector").append("<option value='name'>Name</option>");
			$(".attribute-selector").append("<option value='rating'>Rating</option>");
			$(".attribute-selector").append("<option value='production'>Production</option>");
			$(".attribute-selector").append("<option value='budget'>Budget</option>");
			$(".attribute-selector").append("<option value='genre_name'>Genre</option>");
			$(".attribute-selector").append("<option value='like_count'>Likes</option>");
		} else if (customDB === "movie") {
			$(".attribute-selector").append("<option value='name'>Name</option>");
			$(".attribute-selector").append("<option value='rating'>Rating</option>");
			$(".attribute-selector").append("<option value='production'>Production</option>");
			$(".attribute-selector").append("<option value='budget'>Budget</option>");
			$(".attribute-selector").append("<option value='genre_name'>Genre</option>");
			$(".attribute-selector").append("<option value='like_count'>Likes</option>");
			$(".attribute-selector").append("<option value='boxoffice_collection'>Box Office Collection</option>");
		} else if (customDB === "series") {
			$(".attribute-selector").append("<option value='name'>Name</option>");
			$(".attribute-selector").append("<option value='rating'>Rating</option>");
			$(".attribute-selector").append("<option value='production'>Production</option>");
			$(".attribute-selector").append("<option value='budget'>Budget</option>");
			$(".attribute-selector").append("<option value='genre_name'>Genre</option>");
			$(".attribute-selector").append("<option value='like_count'>Likes</option>");
			$(".attribute-selector").append("<option value='season_count'>Season Count</option>");
		} else if (customDB === "people") {
			$(".attribute-selector").append("<option value='name'>Name</option>");
			$(".attribute-selector").append("<option value='nationality'>Nationality</option>");
			$(".attribute-selector").append("<option value='dob'>Birthday</option>");
			$(".attribute-selector").append("<option value='gender'>Gender</option>");
			$(".attribute-selector").append("<option value='role_name'>Role</option>");
		} else if (customDB === "role") {
			$(".attribute-selector").append("<option value='mp_name'>Motion Picture</option>");
			$(".attribute-selector").append("<option value='p_name'>Person</option>");
			$(".attribute-selector").append("<option value='role_name'>Role</option>");
		} else if (customDB === "award") {
			$(".attribute-selector").append("<option value='award_name'>Award Name</option>");
			$(".attribute-selector").append("<option value='award_year'>Award Year</option>");
			$(".attribute-selector").append("<option value='mp_name'>Motion Picture</option>");
			$(".attribute-selector").append("<option value='p_name'>Person</option>");
		} else if (customDB === "location") {
			$(".attribute-selector").append("<option value='city'>City</option>");
			$(".attribute-selector").append("<option value='country'>Country</option>");
			$(".attribute-selector").append("<option value='zip'>Zip</option>");
			$(".attribute-selector").append("<option value='mp_name'>Motion Picture</option>");
		} else if (customDB === "likes") {
			$(".attribute-selector").append("<option value='uemail'>User Email</option>");
			$(".attribute-selector").append("<option value='mp_name'>Motion Picture</option>");
		}
		$(".equality-selector").empty();
		$(".equality-selector").append("<option value='='>=</option>");
	});

	// Track attribute for custom query
	$(".attribute-selector").change(function() {
		var customAttribute = $(this).val();
		$(".equality-selector").empty();

		// Numeric attributes
		if (["rating", "budget", "like_count", "age", "boxoffice_collection", "season_count", "dob", "award_year", "num likes"].includes(customAttribute)) {
			$(".equality-selector").append("<option value='<'><</option>");
			$(".equality-selector").append("<option value='<='><=</option>")
			$(".equality-selector").append("<option value='='>=</option>")
			$(".equality-selector").append("<option value='>'>></option>")
			$(".equality-selector").append("<option value='>='>>=</option>")

			// Non-numeric attributes
		} else {
			$(".equality-selector").append("<option value='='>=</option>");
		}
	});

	// Add additional filters
	$("#addFilter").click(function(e) {
		$("#customQueryForm").append(
			`<div class="form-group row justify-content-md-center">
				<div class="col col-lg-1"></div>
				<div class="col-md-auto">
					<select class="form-control attribute-selector" name="attribute">
						<option value="name">Name</option>
						<option value="rating">Rating</option>
						<option value="production">Production</option>
						<option value="budget">Budget</option>
						<option value="genre">Genre</option>
						<option value="like_count">Likes</option>
					</select>
				</div>
				<div class="col-md-auto">
					<select class="form-control equality-selector" name="equality">
						<option value='='>=</option>	
					</select>
				</div>
				<div class="col-md-auto">
					<input class="form-control" type="text" class="m-2" name="parameter" id="parameter">
				</div>
				<div class="col col-lg-1"></div>
			</div>`
		)
	});
</script>

</html>
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
		<h3 style="text-align:center">Select Display Fields</h3>
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
						<div class="form-group">
							<input type="checkbox" id="Title" name="title">
							<label for="Crime" class="ml-2"> Title </label>
						</div>
						<div class="form-group">
							<input type="checkbox" id="Rating" name="rating">
							<label for="Crime" class="ml-2"> Rating </label>
						</div>
						<div class="form-group">
							<input type="checkbox" id="LikeCount" name="likeCount">
							<label for="Crime" class="ml-2"> Like Count </label>
						</div>
						<div class="form-group">
							<input type="checkbox" id="LikeUserEmail" name="likeUserEmail">
							<label for="Crime" class="ml-2"> Like User Email </label>
						</div>
						<div class="form-group">
							<input type="checkbox" id="LikeUserAge" name="likeUserAge">
							<label for="Crime" class="ml-2"> Like User Age </label>
						</div>
						<div class="form-group">
							<input type="checkbox" id="Genre" name="genre">
							<label for="Crime" class="ml-2"> Genre </label>
						</div>
						<div class="form-group">
							<input type="checkbox" id="RoleCoune" name="mpRroleCount">
							<label for="Crime" class="ml-2"> Role Count </label>
						</div>
						<div class="form-group">
							<input type="checkbox" id="AwardCount" name="mpAwardCount">
							<label for="Crime" class="ml-2"> Award Count </label>
						</div>
						<div class="form-group">
							<input type="checkbox" id="AwardName" name="mpAwardName">
							<label for="Crime" class="ml-2"> Award Name </label>
						</div>
						<div class="form-group">
							<input type="checkbox" id="ProductionCompany" name="productionCompany">
							<label for="Crime" class="ml-2"> Production Company </label>
						</div>
						<div class="form-group">
							<input type="checkbox" id="Country" name="shootingCcountry">
							<label for="Crime" class="ml-2"> Country </label>
						</div>
						<div class="form-group">
							<input type="checkbox" id="City" name="shootingCity">
							<label for="Crime" class="ml-2"> City </label>
						</div>
						<div class="form-group">
							<input type="checkbox" id="Zip" name="shootingZip">
							<label for="Crime" class="ml-2"> Zip </label>
						</div>
						<div class="form-group">
							<input type="checkbox" id="Collection" name="collection">
							<label for="Crime" class="ml-2"> Box Office Collection (Movies Only) </label>
						</div>
						<div class="form-group">
							<input type="checkbox" id="SeasonCount" name="seasonCount">
							<label for="Crime" class="ml-2"> Season Count (Series Only) </label>
						</div>
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
						<div class="form-group">
							<input type="checkbox" id="Name" name="name">
							<label for="Crime" class="ml-2"> Name </label>
						</div>
						<div class="form-group">
							<input type="checkbox" id="DOB" name="DOB">
							<label for="Crime" class="ml-2"> Birthday </label>
						</div>
						<div class="form-group">
							<input type="checkbox" id="PRoleCount" name="pRoleCount">
							<label for="Crime" class="ml-2"> Role Count </label>
						</div>
						<div class="form-group">
							<input type="checkbox" id="RoleName" name="roleName">
							<label for="Crime" class="ml-2"> Role Name </label>
						</div>
						<div class="form-group">
							<input type="checkbox" id="PAwardCount" name="pAwardCount">
							<label for="Crime" class="ml-2"> Award Count </label>
						</div>
						<div class="form-group">
							<input type="checkbox" id="PAwardName" name="pAwardName">
							<label for="Crime" class="ml-2"> Award Name </label>
						</div>
						<div class="form-group">
							<input type="checkbox" id="Gender" name="gender">
							<label for="Crime" class="ml-2"> Gender </label>
						</div>
						<div class="form-group">
							<input type="checkbox" id="Nationality" name="nationality">
							<label for="Crime" class="ml-2"> Nationality </label>
						</div>
					</form>
					</div>
				</div>
			</div>
			<div class="card" style="width: 800px">
				<div class="card-header" id="headingThree">
					<h5 class="mb-0">
						<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
							Select Top
						</button>
					</h5>
				</div>
				<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
					<div class="card-body">
						<div class="form-inline">
							<label for="email">Top</label>
							<div class="form-group col-md-1">
								<input type="number" id="quantity" name="quantity" min="1">							</div>
						</div>
						<div class="form-group my-3">
							<h5>Order By</h5>
							<div class="row">
								<div class="mx-3">
									<input type="radio" id="topRating" class="form-check form-check-inline" name="topRating">
									<label for="mpmovie">Rating</label>
								</div>
								<div class="mx-3">
									<input type="radio" id="topLikeCount" class="form-check form-check-inline" name="topLikeCount">
									<label for="mpmovie">Like Count</label>
								</div>
								<div class="mx-3">
									<input type="radio" id="topLikeUserAge" class="form-check form-check-inline" name="topLikeUserAge">
									<label for="mpmovie">Like User Age</label>
								</div>
								<div class="mx-3">
									<input type="radio" id="topAwardCount" class="form-check form-check-inline" name="topAwardCount">
									<label for="mpmovie">Motion Picture Award Count</label>
								</div>
								<div class="mx-3">
									<input type="radio" id="topPAwardCount" class="form-check form-check-inline" name="topPAwardCount">
									<label for="mpmovie">Person Award Count</label>
								</div>
								<div class="mx-3">
									<input type="radio" id="topCollection" class="form-check form-check-inline" name="topCollection">
									<label for="mpmovie">Box Office Collection (Movie Only)</label>
								</div>
								<div class="mx-3">
									<input type="radio" id="topSeasonCount" class="form-check form-check-inline" name="topSeasonCount">
									<label for="mpmovie">Season Count (Series Only)</label>
								</div>
								<div class="mx-3">
									<input type="radio" id="topRoleCount" class="form-check form-check-inline" name="topRoleCount">
									<label for="mpmovie">Motion Picture Role Count</label>
								</div>
								<div class="mx-3">
									<input type="radio" id="topPRoleCount" class="form-check form-check-inline" name="topPRoleCount">
									<label for="mpmovie">Person Role Count</label>
								</div>
							</div>
						</div>
				</div>
			</div>
		</div>
	</div>

</body>

<?php

/*
$filterVars = array("mp-title", "type", "mp-rating-min", "mp-rating-max", "likes-count-min", "likes-count-max", "likes-uemail", "likes-age-min", "likes-age-max", "genre", "award-mp-count-min", "award-mp-count-max", "award-mp-name", "mp-production", "location-country", "location-city", "location-zip", "location-exclusive", "movie-collection-min", "movie-collection-max", "series-season-min", "series-season-max", "people-name", "people-birthday", "role-count-min", "role-count-max", "role-name", "award-p-count-min", "award-p-count-max", "award-p-name", "people-gender", "people-nationality");
*/

$filterVars = array("title", "type");

foreach ($filterVars as $varName) {
	if (filter_has_var(INPUT_POST, $varName)) {
		if (((substr($varName, -3, 3) == "min") || (substr($varName, -3, 3) == "max"))  && is_numeric($_POST[$varName])) {
			$_SESSION["filter-" . $varName] = $_POST[$varName];
		} else if (!empty($_POST[$varName])) {
			$_SESSION["filter-" . $varName] = $_POST[$varName];
		} else {
			echo $varName . " was empty \n";
		}
	} else {
		echo $varName . " not set \n";
	}
}
?>

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

</html>
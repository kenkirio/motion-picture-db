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
		<h3 style="text-align:center">Select Query Filters</h3>
	</div>

	<form name="selectFiltersForm" method="post" action="selectFields.php">

	<!-- Directory buttons -->
	<div class="d-flex justify-content-center my-3">
		<div class="mx-3">
			<button type="button" class="btn btn-primary" id="goHome">
				Return Home
			</button>
		</div>

		<div class="mx-3">
			<button type="submit" class="btn btn-primary" id="goNext">
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
						<button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
							Motion Picture
						</button>
					</h5>
				</div>

				<div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
					<div class="card-body">
						<div class="form-group my-3">
							<h5>Title</h5>
							<input type="text" name="mp-name" class="form-control">
						</div>
						<div class="form-group my-3">
							<h5>Type</h5>
							<div class="row">
								<div class="mx-3">
									<input type="radio" name="type" id="type-all" value="all" class="form-check form-check-inline">
									<label for="type-all">All</label>
								</div>
								<div class="mx-3">
									<input type="radio" name="type" id="type-movie" value="movie" class="form-check form-check-inline">
									<label for="type-movie">Movie</label>
								</div>
								<div class="mx-3">
									<input type="radio" name="type" id="type-series" value="series" class="form-check form-check-inline">
									<label for="type-series">Series</label>
								</div>
							</div>
						</div>
						<div class="form-group my-3">
							<h5>Rating</h5>
							<div class="row">
								<div class="form-group col-md-2">
									<input type="text" name="mp-rating-min" id="rating-min" class="form-control" placeholder="min">
								</div>
								<div class="my-2 mx-1">–</div>
								<div class="form-group col-md-2">
									<input type="text" name="mp-rating-max" id="rating-max" class="form-control" placeholder="max">
								</div>
							</div>							
						</div>
						<div class="form-group my-3">
							<h5>Likes</h5>
							<div class="row form-group ml-3">
								<label class="my-2" for="likes-count-min">
									<h6>Like Count</h6>
								</label>
								<div class="form-group col-md-2">
									<input type="text" name="likes-count-min" id="likes-count-min" class="form-control" placeholder="min">
								</div>
								<div class="my-2 mx-1">–</div>
								<div class="form-group col-md-2">
									<input type="text" name="likes-count-max" id="likes-count-max" class="form-control" placeholder="max">
								</div>
							</div>
							<div class="row form-group ml-3">
								<label class="my-2" for="likes-uemail">
									<h6>User Email</h6>
								</label>
								<div class="form-group mx-3">
									<input type="text" name="likes-uemail" id="likes-uemail" class="form-control">
								</div>
							</div>
							<div class="row form-group ml-3">
								<label class="my-2" for="likes-age-min">
									<h6>User Age</h6>
								</label>
								<div class="form-group col-md-2">
									<input type="text" name="likes-age-min" id="likes-age-min" class="form-control" placeholder="min">
								</div>
								<div class="my-2 mx-1">–</div>
								<div class="form-group col-md-2">
									<input type="text" name="likes-age-max" id="likes-age-max" class="form-control" placeholder="max">
								</div>
							</div>
						</div>
						<div class="form-group my-3">
							<h5>Genre</h5>
							<div class="form-row align-items-center">
								<div class="col-2">
									<input type="checkbox" name="genre[]" id="crime" value="Crime">
									<label for="crime" class="ml-2"> Crime </label>
								</div>
								<div class="col-2">
									<input type="checkbox" name="genre[]" id="drama"
									value="Drama">
									<label for="drama" class="ml-2"> Drama </label>
								</div>
								<div class="col-2">
									<input type="checkbox" name="genre[]" id="thriller" value="Thriller">
									<label for="thriller" class="ml-2"> Thriller </label>
								</div>
								<div class="col-2">
									<input type="checkbox" name="genre[]" id="action" value="Action">
									<label for="action" class="ml-2"> Action </label>
								</div>
								<div class="col-2">
									<input type="checkbox" name="genre[]" id="history" value="History">
									<label for="history" class="ml-2"> History </label>
								</div>
								<div class="col-2">
									<input type="checkbox" name="genre" id="war" value="War">
									<label for="war" class="ml-2"> War </label>
								</div>
								<div class="col-2">
									<input type="checkbox" name="genre[]" id="adventure"
									value="Adventure">
									<label for="adventure" class="ml-2"> Adventure </label>
								</div>
								<div class="col-2">
									<input type="checkbox" name="genre[]" id="fantasy" value="Fantasy">
									<label for="fantasy" class="ml-2"> Fantasy </label>
								</div>
								<div class="col-2">
									<input type="checkbox" name="genre[]" id="animation" value="Animation">
									<label for="animation" class="ml-2"> Animation </label>
								</div>
								<div class="col-2">
									<input type="checkbox" name="genre[]" id="comedy" value="Comedy">
									<label for="comedy" class="ml-2"> Comedy </label>
								</div>
								<div class="col-2">
									<input type="checkbox" name="genre[]" id="scifi" value="Sci-Fi">
									<label for="scifi" class="ml-2"> Sci-Fi </label>
								</div>
								<div class="col-2">
									<input type="checkbox" name="genre[]" id="mystery" value="Msytery">
									<label for="mystery" class="ml-2"> Mystery </label>
								</div>
								<div class="col-2">
									<input type="checkbox" name="genre[]" id="sport" value="Sport">
									<label for="sport" class="ml-2"> Sport </label>
								</div>
								<div class="col-2">
									<input type="checkbox" name="genre[]" id="horror" value="Horror">
									<label for="horror" class="ml-2"> Horror </label>
								</div>
								<div class="col-2">
									<input type="checkbox" name="genre[]" id="romance" value="Romance">
									<label for="romance" class="ml-2"> Romance </label>
								</div>
							</div>
						</div>
						<div class="form-group my-3">
							<h5>Awards</h5>
							<div class="row form-group ml-3">
								<label class="mt-2" for="award-mp-count-min">
									<h6>Award Count</h6>
								</label>
								<div class="form-group col-md-2">
									<input type="text" name="award-mp-count-min" id="award-mp-count-min" class="form-control" placeholder="min" >
								</div>
								<div class="my-2 mx-1">–</div>
								<div class="form-group col-md-2">
								<input type="text" name="award-mp-count-max" id="award-mp-count-max" class="form-control" placeholder="max" >
								</div>
							</div>
							<label class="ml-3" for="award-mp-name">
								<h6>Award Name</h6>
							</label>
							<div class="form-row align-items-center ml-3">
								<div class="col-auto">
									<input type="checkbox" name="award-mp-name[]" id="mp-best-actor" value="Best Actor">
									<label for="mp-best-actor" class="ml-2"> Best Actor </label>
								</div>
								<div class="col-auto ml-4">
									<input type="checkbox" name="award-mp-name[]" id="mp-best-director" value="Best Director">
									<label for="mp-best-director" class="ml-2"> Best Director </label>
								</div>
								<div class="col-auto ml-4">
									<input type="checkbox" name="award-mp-name[]" id="mp-best-producer" value="Best Producer">
									<label for="mp-best-producer" class="ml-2"> Best Producer </label>
								</div>
								<div class="col-auto ml-4">
									<input type="checkbox" name="award-mp-name[]" id="mp-best-actor-pv" value="Best Actor By Popular Vote">
									<label for="mp-best-actor-pv" class="ml-2"> Best Actor By Popular Vote </label>
								</div>
							</div>
						</div>
						<div class="form-group my-3">
							<h5>Production Company</h5>
							<div class="form-row align-items-center">
								<div class="col-3">
									<input type="checkbox" name="mp-production[]" id="bbc" value="BBC">
									<label for="bbc" class="ml-2"> BBC </label>
								</div>
								<div class="col-3">
									<input type="checkbox" name="mp-production[]" id="bones" value="Bones">
									<label for="bones" class="ml-2"> Bones </label>
								</div>
								<div class="col-3">
									<input type="checkbox" name="mp-production[]" id="dreamworks" value="DreamWorks">
									<label for="dreamworks" class="ml-2"> DreamWorks </label>
								</div>
								<div class="col-3">
									<input type="checkbox" name="mp-production[]" id="gracie" value="Gracie Films">
									<label for="gracie" class="ml-2"> Gracie </label>
								</div>
								<div class="col-3">
									<input type="checkbox" name="mp-production[]" id="grammercy" value="Grammercy Pictures">
									<label for="grammercy" class="ml-2"> Grammercy </label>
								</div>
								<div class="col-3">
									<input type="checkbox" name="mp-production[]" id="gran-via" value="Gran Via">
									<label for="gran-via" class="ml-2"> Gran Via </label>
								</div>
								<div class="col-3">
									<input type="checkbox" name="mp-production[]" id="green-portal" value="Green Portal Productions">
									<label for="green-portal" class="ml-2"> Green Portal </label>
								</div>
								<div class="col-3">
									<input type="checkbox" name="mp-production[]" id="hbo" value="HBO">
									<label for="hbo" class="ml-2"> HBO </label>
								</div>
								<div class="col-3">
									<input type="checkbox" name="mp-production[]" id="high-bridge" value="High Bridge Productions">
									<label for="high-bridge" class="ml-2"> High Bridge </label>
								</div>
								<div class="col-3">
									<input type="checkbox" name="mp-production[]" id="marvel" value="Marvel">
									<label for="marvel" class="ml-2"> Marvel </label>
								</div>
								<div class="col-3">
									<input type="checkbox" name="mp-production[]" id="netflix" value="Netflix">
									<label for="netflix" class="ml-2"> Netflix </label>
								</div>
								<div class="col-3">
									<input type="checkbox" name="mp-production[]" id="summit" value="Summit Entertainment">
									<label for="summit" class="ml-2"> Summit </label>
								</div>
								<div class="col-3">
									<input type="checkbox" name="mp-production[]" id="touchstone" value="Touchstone Pictures">
									<label for="touchstone" class="ml-2"> Touchstone </label>
								</div>
								<div class="col-3">
									<input type="checkbox" name="mp-production[]" id="two-brothers" value="Two Brothers Pictures">
									<label for="two-brothers" class="ml-2"> Two Brothers </label>
								</div>
								<div class="col-3">
									<input type="checkbox" name="mp-production[]" id="universal" value="Universal Television">
									<label for="universal" class="ml-2"> Universal </label>
								</div>
								<div class="col-3">
									<input type="checkbox" name="mp-production[]" id="warner-bros" value="Warner Bros">
									<label for="warner-bros" class="ml-2"> Warner Bros </label>
								</div>
							</div>
						</div>
						<div class="form-group my-3">
							<h5>Location</h5>
							<div class="row form-group ml-3">
								<label class="my-2" for="country">
									<h6>Country</h6>
								</label>
								<div class="form-group mx-3">
									<input type="text" name="location-country" id="country" class="form-control">
								</div>
							</div>
							<div class="row form-group ml-3">
								<label class="my-2" for="city">
									<h6>City</h6>
								</label>
								<div class="form-group mx-3">
									<input type="text" name="location-city" id="city" class="form-control">
								</div>
							</div>
							<div class="row form-group ml-3">
								<label class="my-2" for="zip">
									<h6>Zip</h6>
								</label>
								<div class="form-group mx-3">
									<input type="text"  name="location-zip" id="zip" class="form-control">
								</div>
							</div>
							<div class="row form-group ml-3">
								<label for="exclusive"> Exclusive? </label>
								<div class="form-group mx-3">
									<input type="checkbox" name="location-exclusive" id="exclusive">
								</div>
							</div>
						</div>
						<div class="form-group my-3">
							<h5>Box Office Collection (Movies Only)</h5>
							<div class="row form-group">
								<div class="form-group col-md-2">
									<input type="text" name="movie-collection-min" id="movie-collection-min" class="form-control" placeholder="min" >
								</div>
								<div class="my-2 mx-1">–</div>
								<div class="form-group col-md-2">
									<input type="text" name="movie-collection-max" id="movie-collection-max" class="form-control"  placeholder="max">
								</div>
							</div>
						</div>
						<div class="form-group my-3">
							<h5>Season Count (Series Only)</h5>
							<div class="row form-group">
								<div class="form-group col-md-2">
									<input type="text" name="series-season-min" id="series-season-min" class="form-control" placeholder="min" >
								</div>
								<div class="my-2">–</div>
								<div class="form-group col-md-2">
									<input type="text" name="series-season-max" id="series-season-max" class="form-control" placeholder="max" >
								</div>
							</div>
						</div>
						</form>
					</div>
				</div>
			</div>
			<div class="card" style="width: 800px">
				<div class="card-header" id="headingTwo">
					<h5 class="mb-0">
						<button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
							People
						</button>
					</h5>
				</div>
				<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
					<div class="card-body">
						<div class="form-group my-3">
							<h5>Name</h5>
							<input type="text" class="form-control" id="name" name="people-name">
						</div>
						<div class="form-group my-3">
							<h5>Birthday</h5>
							<div class="row">
								<div class="mx-3">
									<select class="form-select" name="people-dob-equality" id="dob-equality">
										<option value='='>On</option>
										<option value='>'>After</option>
										<option value='<'>Before</option>
									</select>
								</div>
								<input type="date" id="dob-value" name="people-dob-value">
							</div>
						</div>
						<div class="form-group my-3">
							<h5>Role</h5>
							<div class="row form-group ml-3">
								<label class="mt-2" for="role-count-min">
									<h6>Role Count</h6>
								</label>
								<div class="form-group col-md-2">
									<input type="text" name="role-count-min" id="role-count-min" class="form-control" placeholder="min" >
								</div>
								<div class="my-2 mx-1">–</div>
								<div class="form-group col-md-2">
									<input type="text" name="role-count-max" id="role-count-max" class="form-control" placeholder="max" >
								</div>
							</div>
							<label class="ml-3" for="role-name">
								<h6>Role Name</h6>
							</label>
							<div class="form-row align-items-center ml-3">
								<div class="col-2">
									<input type="checkbox" name="role-name[]" id="role-actor" value="Actor">
									<label for="role-actor" class="ml-2"> Actor </label>
								</div>
								<div class="col-2">
									<input type="checkbox" name="role-name[]" id="role-director" value="Director">
									<label for="role-director" class="ml-2"> Director </label>
								</div>
								<div class="col-2">
									<input type="checkbox" name="role-name[]" id="role-producer" value="Producer">
									<label for="role-producer" class="ml-2"> Producer </label>
								</div>
							</div>
						</div>
						<div class="form-group my-3">
							<h5>Awards</h5>
							<div class="row form-group ml-3">
								<label class="mt-2" for="award-p-count-min">
									<h6>Award Count</h6>
								</label>
								<div class="form-group col-md-2">
									<input type="text" name="award-p-count-min" id="award-p-count-min" class="form-control" placeholder="min" >
								</div>
								<div class="my-2 mx-1">–</div>
								<div class="form-group col-md-2">
								<input type="text" name="award-p-count-max" id="award-p-count-max" class="form-control" placeholder="max" >
								</div>
							</div>
							<label class="ml-3" for="award-p-name">
								<h6>Award Name</h6>
							</label>
							<div class="form-row align-items-center ml-3">
								<div class="col-auto">
									<input type="checkbox" name="award-p-name[]" id="p-best-actor" value="Best Actor">
									<label for="p-best-actor" class="ml-2"> Best Actor </label>
								</div>
								<div class="col-auto ml-4">
									<input type="checkbox" name="award-p-name[]" id="p-best-director" value="Best Director">
									<label for="p-best-director" class="ml-2"> Best Director </label>
								</div>
								<div class="col-auto ml-4">
									<input type="checkbox" name="award-p-name[]" id="p-best-producer" value="Best Producer">
									<label for="p-best-producer" class="ml-2"> Best Producer </label>
								</div>
								<div class="col-auto ml-4">
									<input type="checkbox" name="award-p-name[]" id="p-best-actor-pv" value="Best Actor By Popular Vote">
									<label for="p-best-actor-pv" class="ml-2"> Best Actor By Popular Vote </label>
								</div>
							</div>
						</div>
						<div class="form-group my-3">
							<h5>Gender</h5>
							<div class="row">
								<div class="mx-3">
									<input type="radio"  name="people-gender" id="male" class="form-check form-check-inline" value="male">
									<label for="male">Male</label>
								</div>
								<div class="mx-3">
									<input type="radio" name="gender" id="female" class="form-check form-check-inline" value="female">
									<label for="female">Female</label>
								</div>
							</div>
						</div>
						<div class="form-group my-3">
							<h5>Nationality</h5>
							<input type="text" class="form-control" id="people-nationality" name="people-nationality">
						</div>
					</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	</form>

</body>

<script>
	// return home
	$("#goHome").click(function(e) {
		window.location.href = "http://localhost/COSI127b/motion-picture-db/Project%201.3/";
	});

	// return home
	$("#goNext").click(function(e) {
		window.location.href = "http://localhost/COSI127b/motion-picture-db/Project%201.3/selectFields.php";
	});
</script>

</html>
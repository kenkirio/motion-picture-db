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
						<div class="form-group my-3">
							<h5>Title</h5>
							<input type="text" class="form-control" id="mpname" name="mpname">
						</div>
						<div class="form-group my-3">
							<h5>Type</h5>
							<div class="row">
								<div class="mx-3">
									<input type="radio" id="mpmovie" class="form-check form-check-inline" name="mptype">
									<label for="mpmovie">All</label>
								</div>
								<div class="mx-3">
									<input type="radio" id="mpmovie" class="form-check form-check-inline" name="mptype">
									<label for="mpmovie">Movie</label>
								</div>
								<div class="mx-3">
									<input type="radio" id="mpseries" class="form-check form-check-inline" name="mptype">
									<label for="mpseries">Series</label>
								</div>
							</div>
						</div>
						<div class="form-group my-3">
							<label for="mprating">
								<h5>Rating</h5>
							</label>
							<div class="row">
								<div class="form-group col-md-2">
									<input type="text" class="form-control" id="inputZip" placeholder="min">
								</div>
								<div class="my-2 mx-1">–</div>
								<div class="form-group col-md-2">
									<input type="text" class="form-control" id="inputZip" placeholder="max">
								</div>
							</div>							
						</div>
						<div class="form-group my-3">
							<h5>Likes</h5>
							<div class="row form-group ml-3">
								<label class="my-2" for="mplikescount">
									<h6>Like Count</h6>
								</label>
								<div class="form-group col-md-2">
									<input type="text" class="form-control" id="inputZip" placeholder="min">
								</div>
								<div class="my-2 mx-1">–</div>
								<div class="form-group col-md-2">
									<input type="text" class="form-control" id="inputZip" placeholder="max">
								</div>
							</div>
							<div class="row form-group ml-3">
								<label class="my-2" for="mplikescount">
									<h6>User Email</h6>
								</label>
								<div class="form-group mx-3">
									<input type="text" class="form-control" id="inputZip">
								</div>
							</div>
							<div class="row form-group ml-3">
								<label class="my-2" for="mplikescount">
									<h6>User Age</h6>
								</label>
								<div class="form-group col-md-2">
									<input type="text" class="form-control" id="inputZip" placeholder="min">
								</div>
								<div class="my-2 mx-1">–</div>
								<div class="form-group col-md-2">
									<input type="text" class="form-control" id="inputZip" placeholder="max">
								</div>
							</div>
						</div>
						<div class="form-group my-3">
							<h5>Genre</h5>
							<div class="form-row align-items-center">
								<div class="col-2">
									<input type="checkbox" id="Crime" name="genre">
									<label for="Crime" class="ml-2"> Crime </label>
								</div>
								<div class="col-2">
									<input type="checkbox" id="Drama" name="genre">
									<label for="Drama" class="ml-2"> Drama </label>
								</div>
								<div class="col-2">
									<input type="checkbox" id="Action" name="genre">
									<label for="Action" class="ml-2"> Action </label>
								</div>
								<div class="col-2">
									<input type="checkbox" id="History" name="genre">
									<label for="History" class="ml-2"> History </label>
								</div>
								<div class="col-2">
									<input type="checkbox" id="War" name="genre">
									<label for="War" class="ml-2"> War </label>
								</div>
								<div class="col-2">
									<input type="checkbox" id="Thriller" name="genre">
									<label for="Thriller" class="ml-2"> Thriller </label>
								</div>
								<div class="col-2">
									<input type="checkbox" id="Adventure" name="genre">
									<label for="Adventure" class="ml-2"> Adventure </label>
								</div>
								<div class="col-2">
									<input type="checkbox" id="Fantasy" name="genre">
									<label for="Fantasy" class="ml-2"> Fantasy </label>
								</div>
								<div class="col-2">
									<input type="checkbox" id="Animation" name="genre">
									<label for="Animation" class="ml-2"> Animation </label>
								</div>
								<div class="col-2">
									<input type="checkbox" id="Comedy" name="genre">
									<label for="Comedy" class="ml-2"> Comedy </label>
								</div>
								<div class="col-2">
									<input type="checkbox" id="Sci-Fi" name="genre">
									<label for="Sci-Fi" class="ml-2"> Sci-Fi </label>
								</div>
								<div class="col-2">
									<input type="checkbox" id="Msytery" name="genre">
									<label for="Msytery" class="ml-2"> Mystery </label>
								</div>
							</div>
						</div>
						<div class="form-group my-3">
							<h5>Awards</h5>
							<div class="row form-group ml-3">
								<label class="mt-2" for="mplikescount">
									<h6>Award Count</h6>
								</label>
								<div class="form-group col-md-2">
									<input type="text" class="form-control" id="inputZip" placeholder="min">
								</div>
								<div class="my-2 mx-1">–</div>
								<div class="form-group col-md-2">
									<input type="text" class="form-control" id="inputZip" placeholder="max">
								</div>
							</div>
							<label class="ml-3" for="mplikescount">
								<h6>Award Name</h6>
							</label>
							<div class="form-row align-items-center ml-3">
								<div class="col-auto">
									<input type="checkbox" id="Crime" name="genre">
									<label for="Crime" class="ml-2"> Best Actor </label>
								</div>
								<div class="col-auto ml-4">
									<input type="checkbox" id="Crime" name="genre">
									<label for="Crime" class="ml-2"> Best Director </label>
								</div>
								<div class="col-auto ml-4">
									<input type="checkbox" id="Crime" name="genre">
									<label for="Crime" class="ml-2"> Best Producer </label>
								</div>
								<div class="col-auto ml-4">
									<input type="checkbox" id="Crime" name="genre">
									<label for="Crime" class="ml-2"> Best Actor By Popular Vote </label>
								</div>
							</div>
						</div>
						<div class="form-group my-3">
							<h5>Production Company</h5>
							<div class="form-row align-items-center">
								<div class="col-3">
									<input type="checkbox" id="Crime" name="genre">
									<label for="Crime" class="ml-2"> BBC </label>
								</div>
								<div class="col-3">
									<input type="checkbox" id="Crime" name="genre">
									<label for="Crime" class="ml-2"> Bones </label>
								</div>
								<div class="col-3">
									<input type="checkbox" id="Crime" name="genre">
									<label for="Crime" class="ml-2"> Dreamworks </label>
								</div>
								<div class="col-3">
									<input type="checkbox" id="Crime" name="genre">
									<label for="Crime" class="ml-2"> Gracie </label>
								</div>
								<div class="col-3">
									<input type="checkbox" id="Crime" name="genre">
									<label for="Crime" class="ml-2"> Grammercy </label>
								</div>
								<div class="col-3">
									<input type="checkbox" id="Crime" name="genre">
									<label for="Crime" class="ml-2"> Gran Via </label>
								</div>
								<div class="col-3">
									<input type="checkbox" id="Crime" name="genre">
									<label for="Crime" class="ml-2"> Green Portal </label>
								</div>
								<div class="col-3">
									<input type="checkbox" id="Crime" name="genre">
									<label for="Crime" class="ml-2"> HBO </label>
								</div>
								<div class="col-3">
									<input type="checkbox" id="Crime" name="genre">
									<label for="Crime" class="ml-2"> High Bridge </label>
								</div>
								<div class="col-3">
									<input type="checkbox" id="Crime" name="genre">
									<label for="Crime" class="ml-2"> Marvel </label>
								</div>
								<div class="col-3">
									<input type="checkbox" id="Crime" name="genre">
									<label for="Crime" class="ml-2"> Netflix </label>
								</div>
								<div class="col-3">
									<input type="checkbox" id="Crime" name="genre">
									<label for="Crime" class="ml-2"> Summit </label>
								</div>
								<div class="col-3">
									<input type="checkbox" id="Crime" name="genre">
									<label for="Crime" class="ml-2"> Touchstone </label>
								</div>
								<div class="col-3">
									<input type="checkbox" id="Crime" name="genre">
									<label for="Crime" class="ml-2"> Two Brothers </label>
								</div>
								<div class="col-3">
									<input type="checkbox" id="Crime" name="genre">
									<label for="Crime" class="ml-2"> Universal </label>
								</div>
								<div class="col-3">
									<input type="checkbox" id="Crime" name="genre">
									<label for="Crime" class="ml-2"> Warner Bros </label>
								</div>
							</div>
						</div>
						<div class="form-group my-3">
							<h5>Location</h5>
							<div class="row form-group ml-3">
								<label class="my-2" for="mplikescount">
									<h6>Country</h6>
								</label>
								<div class="form-group mx-3">
									<input type="text" class="form-control" id="inputZip">
								</div>
							</div>
							<div class="row form-group ml-3">
								<label class="my-2" for="mplikescount">
									<h6>City</h6>
								</label>
								<div class="form-group mx-3">
									<input type="text" class="form-control" id="inputZip">
								</div>
							</div>
							<div class="row form-group ml-3">
								<label class="my-2" for="mplikescount">
									<h6>Zip</h6>
								</label>
								<div class="form-group mx-3">
									<input type="text" class="form-control" id="inputZip">
								</div>
							</div>
							<div class="row form-group ml-3">
								<label for="exclusive"> Exclusive? </label>
								<div class="form-group mx-3">
									<input type="checkbox" id="exclusive" name="location">
								</div>
							</div>
						</div>
						<div class="form-group my-3">
							<h5>Box Office Collection (Movies Only)</h5>
							<div class="row form-group">
								<div class="form-group col-md-2">
									<input type="text" class="form-control" id="inputZip" placeholder="min">
								</div>
								<div class="my-2 mx-1">–</div>
								<div class="form-group col-md-2">
									<input type="text" class="form-control" id="inputZip" placeholder="max">
								</div>
							</div>
						</div>
						<div class="form-group my-3">
							<h5>Season Count (Series Only)</h5>
							<div class="row form-group">
								<div class="form-group col-md-2">
									<input type="text" class="form-control" id="inputZip" placeholder="min">
								</div>
								<div class="my-2">–</div>
								<div class="form-group col-md-2">
									<input type="text" class="form-control" id="inputZip" placeholder="max">
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
						<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
							People
						</button>
					</h5>
				</div>
				<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
					<div class="card-body">
						<div class="form-group my-3">
							<h5>Name</h5>
							<input type="text" class="form-control" id="mpname" name="mpname">
						</div>
						<div class="form-group my-3">
							<h5>Birthday</h5>
							<div class="row">
								<div class="mx-3">
									<select class="form-control" name="birthdayequality" id="birthdayequality">
										<option value='='>On</option>
										<option value='>'>After</option>
										<option value='<'>Before</option>
									</select>
								</div>
								<input type="date" id="birthday" name="birthday">
							</div>
						</div>
						<div class="form-group my-3">
							<h5>Role</h5>
							<div class="row form-group ml-3">
								<label class="mt-2" for="mplikescount">
									<h6>Role Count</h6>
								</label>
								<div class="form-group col-md-2">
									<input type="text" class="form-control" id="inputZip" placeholder="min">
								</div>
								<div class="my-2 mx-1">–</div>
								<div class="form-group col-md-2">
									<input type="text" class="form-control" id="inputZip" placeholder="max">
								</div>
							</div>
							<label class="ml-3" for="mplikescount">
								<h6>Role Name</h6>
							</label>
							<div class="form-row align-items-center ml-3">
								<div class="col-2">
									<input type="checkbox" id="Crime" name="genre">
									<label for="Crime" class="ml-2"> Actor </label>
								</div>
								<div class="col-2">
									<input type="checkbox" id="Crime" name="genre">
									<label for="Crime" class="ml-2"> Director </label>
								</div>
								<div class="col-2">
									<input type="checkbox" id="Crime" name="genre">
									<label for="Crime" class="ml-2"> Producer </label>
								</div>
							</div>
						</div>
						<div class="form-group my-3">
							<h5>Awards</h5>
							<div class="row form-group ml-3">
								<label class="mt-2" for="mplikescount">
									<h6>Award Count</h6>
								</label>
								<div class="form-group col-md-2">
									<input type="text" class="form-control" id="inputZip" placeholder="min">
								</div>
								<div class="my-2 mx-1">–</div>
								<div class="form-group col-md-2">
									<input type="text" class="form-control" id="inputZip" placeholder="max">
								</div>
							</div>
							<label class="ml-3" for="mplikescount">
								<h6>Award Name</h6>
							</label>
							<div class="form-row align-items-center ml-3">
								<div class="col-auto">
									<input type="checkbox" id="Crime" name="genre">
									<label for="Crime" class="ml-2"> Best Actor </label>
								</div>
								<div class="col-auto ml-4">
									<input type="checkbox" id="Crime" name="genre">
									<label for="Crime" class="ml-2"> Best Director </label>
								</div>
								<div class="col-auto ml-4">
									<input type="checkbox" id="Crime" name="genre">
									<label for="Crime" class="ml-2"> Best Producer </label>
								</div>
								<div class="col-auto ml-4">
									<input type="checkbox" id="Crime" name="genre">
									<label for="Crime" class="ml-2"> Best Actor By Popular Vote </label>
								</div>
							</div>
						</div>
						<div class="form-group my-3">
							<h5>Gender</h5>
							<div class="row">
								<div class="mx-3">
									<input type="radio" id="mpmovie" class="form-check form-check-inline" name="mptype">
									<label for="mpmovie">Male</label>
								</div>
								<div class="mx-3">
									<input type="radio" id="mpmovie" class="form-check form-check-inline" name="mptype">
									<label for="mpmovie">Female</label>
								</div>
							</div>
						</div>
						<div class="form-group my-3">
							<h5>Nationality</h5>
							<input type="text" class="form-control" id="mpname" name="mpname">
						</div>
					</form>
					</div>
				</div>
			</div>
			<div class="card" style="width: 800px">
				<div class="card-header" id="headingThree">
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
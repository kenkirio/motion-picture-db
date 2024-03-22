arr = ["mp-name", "mp-rating", "likes-count", "likes-uemail", "likes-age", "genre", "role-mp-count", "award-mp-count", "award-mp-name", "mp-production", "location-country", "location-city", "location-zip", "movie-boxoffice_collection", "series-season_count", "people-name", "people-dob", "role-p-count", "role-role_name", "award-p-count", "award-p-name", "people-gender", "people-nationality"]

printed = set()

for i in range(1, 6):
	print()
	print(i)
	for thing in arr:
		if len(thing.split("-")) == i:
			print(thing)
			printed.add(thing)

print()
print("Unprinted")

for thing in arr:
	if thing not in printed:
		print(thing)

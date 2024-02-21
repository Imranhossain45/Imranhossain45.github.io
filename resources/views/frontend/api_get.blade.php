$json_data = file_get_contents('api_response.json');

// Decode the JSON data
$test_league_api = json_decode($json_data);

if ($test_league_api) {
$typeMatches = $test_league_api->typeMatches;
$matchesData = [];

foreach ($typeMatches as $typeMatch) {
foreach ($typeMatch->seriesMatches as $seriesMatch) {
if (isset($seriesMatch->seriesAdWrapper->matches)) {
foreach ($seriesMatch->seriesAdWrapper->matches as $match) {
// Extract the match information and add it to the $matchesData array
$matchesData[] = $match;
}
}
}
}

/* $typeMatches = $test_league_api->typeMatches;
$allSeriesMatches = array();

foreach ($typeMatches as $match) {
$allSeriesMatches[] = $match->seriesMatches;
}
return $allSeriesMatches; */

return $matchesData;
} else {
echo "Error decoding JSON data from file.";
}

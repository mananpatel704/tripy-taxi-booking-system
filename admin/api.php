<?php
function haversineGreatCircleDistance($latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo, $earthRadius = 6371)
{
  // Convert from degrees to radians
  $latFrom = deg2rad($latitudeFrom);
  $lonFrom = deg2rad($longitudeFrom);
  $latTo = deg2rad($latitudeTo);
  $lonTo = deg2rad($longitudeTo);

  $latDelta = $latTo - $latFrom;
  $lonDelta = $lonTo - $lonFrom;

  $angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) +
    cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));
  return $angle * $earthRadius;
}

// Example usage: Enter latitudes and longitudes of two locations
$latitudeFrom = 23.2280728;  // New York City Latitude
$longitudeFrom = 72.4609525; // New York City Longitude
$latitudeTo = 22.2736249;  // Los Angeles Latitude
$longitudeTo = 70.7387222; // Los Angeles Longitude

$distance = haversineGreatCircleDistance($latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo);
echo "The distance between the two points is: " . $distance . " kilometers\n";
?>

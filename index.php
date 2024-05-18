<?php
// Array of API URLs
$apiUrls = array(
    'https://vivekdl.000webhostapp.com/Get/server/api?url=',
    'https://vivekdl.000webhostapp.com/Get/server/api2?url=',
    'https://vivekdl.000webhostapp.com/Get/server/api3?url=',
    // Add more URLs as needed
);

// Get the 'url' parameter from the query string
$additionalUrl = isset($_GET['url']) ? $_GET['url'] : '';

// Randomly select an API URL
$randomUrl = $apiUrls[array_rand($apiUrls)];

// Combine the random API URL with the additional URL
$finalUrl = $randomUrl . urlencode($additionalUrl);

// Open the final URL in the browser
header("Location: $finalUrl");
exit();
?>


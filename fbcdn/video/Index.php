<?php

if (isset($_GET['url'])) {
    $urlParameter = $_GET['url'];

    // Construct the full JSON server URL with the 'url' parameter
    $jsonServerUrl = 'https://vivekmasona.000webhostapp.com/aa?url=' . urlencode($urlParameter);

    // Fetch JSON data from the server
    $jsonData = file_get_contents($jsonServerUrl);

    // Decode JSON data
    $data = json_decode($jsonData, true);

    // Check for errors in the JSON response
    if (isset($data['error']) && $data['error']) {
        echo "Error: Unable to fetch video information.";
    } else {
        // Directly redirect to the high-quality video URL
        header("Location: " . $data['video_high']);
        exit;
    }
} else {
    echo "Error: 'url' parameter is missing.";
}

?>


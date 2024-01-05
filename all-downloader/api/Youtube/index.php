<?php

if (isset($_GET['url'])) {
    $urlParameter = $_GET['url'];

    // Construct the full JSON server URL with the 'url' parameter
    $jsonServerUrl = 'https://vivekmasona.000webhostapp.com/test2/?url=' . urlencode($urlParameter);

    // Fetch JSON data from the server
    $jsonData = file_get_contents($jsonServerUrl);

    // Decode JSON data
    $data = json_decode($jsonData, true);

    if (isset($data['Link 4'])) {
        $link4 = $data['Link 4'];
        header("Location: $link4");
        exit;
    } else {
        echo "Error: Link 4 not found in the JSON data.";
    }
} else {
    echo "Error: 'url' parameter is missing.";
}

?>


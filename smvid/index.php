<?php
// Check if the 'url' parameter is present
if (isset($_GET['url'])) {
    // URL of the JSON server
    $jsonServerUrl = 'https://vivekmasona.000webhostapp.com/smvid/server?url=' . urlencode($_GET['url']);

    // Fetch JSON data from the server
    $jsonData = file_get_contents($jsonServerUrl);

    // Decode JSON data
    $data = json_decode($jsonData, true);

    // Check if the data has the required information
    if (isset($data['links'][0]['link'])) {
        // Extract HD link
        $hdLink = $data['links'][0]['link'];

        // Redirect to HD link
        header("Location: $hdLink");
        exit;
    } else {
        echo "Error: Unable to fetch HD link from the provided URL.";
    }
} else {
    echo "Error: 'url' parameter is missing.";
}
?>


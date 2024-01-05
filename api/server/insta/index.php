<?php

// Get the Instagram link parameter
$instagramLink = isset($_GET['link']) ? $_GET['link'] : '';

// Server URL
$serverUrl = 'https://vivekfy-all-api.vercel.app/api/insta';

// Check if the Instagram link is provided
if (!empty($instagramLink)) {
    // Initialize cURL session for the server
    $ch = curl_init($serverUrl . '?link=' . urlencode($instagramLink));

    // Set cURL options for the server request
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Execute cURL session for the server and get the content
    $response = curl_exec($ch);

    // Close cURL session for the server
    curl_close($ch);

    // Check if cURL request to the server was successful
    if ($response !== false) {
        // Decode the JSON response from the server
        $jsonData = json_decode($response, true);

        // Check if decoding was successful
        if ($jsonData !== null) {
            // Access the data array from the server
            $data = $jsonData['data'][0];

            // Extract the CDN URL from the server response
            $cdnUrl = $data['url'];

            // Redirect the user to the CDN URL
            header("Location: $cdnUrl");
            exit;
        } else {
            echo "Error decoding JSON response from the server";
        }
    } else {
        echo "Error fetching data from the server";
    }
} else {
    echo "Instagram link not provided";
}

?>


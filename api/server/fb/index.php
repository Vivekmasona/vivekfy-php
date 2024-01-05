<?php

// Check if the 'url' parameter is set in the request
if (isset($_GET['link'])) {
    // Get the Facebook video URL from the 'url' parameter
    $facebook_video_url = $_GET['link'];

    // Build the API URL with the provided Facebook video URL
    $api_url = 'https://vivekfy-all-api.vercel.app/api/fb?video=' . urlencode($facebook_video_url);

    // Initialize cURL session
    $ch = curl_init();

    // Set cURL options
    curl_setopt($ch, CURLOPT_URL, $api_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    // Execute cURL session and get the API response
    $response = curl_exec($ch);

    // Close cURL session
    curl_close($ch);

    // Check if cURL request was successful
    if ($response !== false) {
        // Decode the JSON response
        $data = json_decode($response, true);

        // Check if 'hd' key exists in the response
        if (isset($data['hd'])) {
            // Extract the HD video link
            $hd_video_link = $data['hd'];

            // Redirect to the HD video link
            header("Location: $hd_video_link");
            exit;
        } else {
            echo "HD video link not found in the API response.";
        }
    } else {
        echo "Error fetching data from the API.";
    }
} else {
    echo "Please provide a 'url' parameter with the Facebook video link.";
}

?>


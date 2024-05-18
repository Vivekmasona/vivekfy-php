<?php
// Check if the 'url' parameter is present
if (isset($_GET['url'])) {
    // Extract video ID from the URL
    $url = $_GET['url'];
    $videoID = extractYouTubeVideoID($url);

    if ($videoID) {
        // URL of the JSON server
        $jsonServerUrl = 'https://vivekdl.000webhostapp.com/Get?url=' . urlencode($videoID);

        // Fetch JSON data from the server
        $jsonData = file_get_contents($jsonServerUrl);

        // Decode JSON data
        $data = json_decode($jsonData, true);

        // Check if the data has the required information
        if (isset($data['link'])) {
            // Extract MP3 link
            $mp3Link = $data['link'];

            // Redirect to MP3 link
            header("Location: $mp3Link");
            exit;
        } else {
            echo "Error: Unable to fetch MP3 link from the provided URL.";
        }
    } else {
        echo "Error: Invalid YouTube video URL.";
    }
} else {
    echo "Error: 'url' parameter is missing.";
}

// Function to extract YouTube video ID
function extractYouTubeVideoID($url) {
    if (preg_match('/youtu\.be\/([a-zA-Z0-9_-]+)/', $url, $matches)) {
        // For youtu.be type URL
        return $matches[1];
    } elseif (preg_match('/youtube\.com\/.*[?&]v=([a-zA-Z0-9_-]+)/', $url, $matches)) {
        // For youtube.com type URL
        return $matches[1];
    } elseif (preg_match('/youtube\.com\/live\/([a-zA-Z0-9_-]+)/', $url, $matches)) {
        // For youtube.com live type URL
        return $matches[1];
    } else {
        return false;
    }
}
?>

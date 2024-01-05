<?php
// Function to sanitize input URL
function sanitizeURL($url) {
    return filter_var($url, FILTER_SANITIZE_URL);
}

// Get the URL parameter
$link = isset($_GET['url']) ? sanitizeURL($_GET['url']) : '';

// Check if a link is provided
if (!empty($link)) {
    // Identify the service based on the link structure
    if (strpos($link, 'youtu.be') !== false || strpos($link, 'youtube.com') !== false) {
        $serverLink = 'https://vivekmasona.000webhostapp.com/mp3?url=' . $link;
    } elseif (strpos($link, 'facebook.com') !== false) {
        $serverLink = 'https://vivekmasona.000webhostapp.com/api/server/fb?link=' . $link;
    } elseif (strpos($link, 'instagram.com') !== false) {
        $serverLink = 'https://vivekmasona.000webhostapp.com/api/server/insta?link=' . $link;
    } else {
        $serverLink = 'Unsupported service';
    }

    // Redirect to the generated server link
    header("Location: $serverLink");
    exit;
} else {
    echo 'Invalid URL';
}
?>

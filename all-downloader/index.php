<?php

if (isset($_GET['url'])) {
    $videoUrl = $_GET['url'];

    // Extract necessary parts from the provided URL
    $rapidAPIKey = "11939ea42cmsh9be181f6708fc39p162794jsn9e46f87d898b";
    $apiHost = "full-downloader-social-media.p.rapidapi.com";

    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => "https://$apiHost/?url=" . urlencode($videoUrl),
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0, // Set timeout to 0 for no timeout
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => [
            "X-RapidAPI-Host: $apiHost",
            "X-RapidAPI-Key: $rapidAPIKey"
        ],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        // Decode the JSON response
        $jsonResponse = json_decode($response, true);

        // Extract the first eight URLs from the JSON response
        $extractedUrls = [];
        $count = 1;

        array_walk_recursive($jsonResponse, function ($value) use (&$extractedUrls, &$count) {
            if ($count <= 8 && filter_var($value, FILTER_VALIDATE_URL)) {
                $label = "Link " . $count;
                $extractedUrls[$label] = $value;
                $count++;
            }
        });

        // Add author information
        $authorInfo = ["Author" => "vivek masona"];

        // Merge the extracted URLs and author information into a single associative array
        $finalResponse = array_merge($extractedUrls, $authorInfo);

        // Output the final JSON response
        echo json_encode($finalResponse, JSON_PRETTY_PRINT);
    }
} else {
    echo "Please provide a valid URL parameter.";
}
?>


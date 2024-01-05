<?php

if (isset($_GET['url'])) {
    $facebookVideoUrl = $_GET['url'];

    // Extract necessary parts from the provided URL
    $rapidAPIKey = "11939ea42cmsh9be181f6708fc39p162794jsn9e46f87d898b";
    $apiHost = "facebook-video-audio-download.p.rapidapi.com";
    $apiEndpoint = "geturl";

    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => "https://$apiHost/$apiEndpoint?video_url=$facebookVideoUrl",
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

        // Add author information
        $jsonResponse['author'] = "vivek Maurya masona";

        // Encode the modified JSON back to a string
        $modifiedResponse = json_encode($jsonResponse);

        // Output the modified JSON
        echo $modifiedResponse;
    }
} else {
    echo "Please provide a valid URL parameter.";
}
?>


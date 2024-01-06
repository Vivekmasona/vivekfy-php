<?php

if (isset($_GET['url'])) {
    $urlParam = $_GET['url'];
    $urlParts = explode("/", $urlParam);

    // Extract necessary parts from the exploded URL
    $rapidAPIKey = "11939ea42cmsh9be181f6708fc39p162794jsn9e46f87d898b";
    $apiHost = "fb-video-reels.p.rapidapi.com";
    $apiEndpoint = "api/getSocialVideo";
    $url = "https://$apiHost/$apiEndpoint?url=$urlParam";

    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => $url,
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
        echo $response;
    }
} else {
    echo "Please provide a valid URL parameter.";
}
?>


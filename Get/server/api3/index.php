
<?php

if (isset($_GET['url'])) {
    $urlParam = $_GET['url'];

    // Extract necessary parts from the provided URL
    $rapidAPIKey = "5c8af6d4f0msha0d80f3f1a7ffe5p16d69djsnbcd6070da273";
    $apiHost = "youtube-mp36.p.rapidapi.com";
    $apiEndpoint = "dl";
    $url = "https://$apiHost/$apiEndpoint?id=$urlParam";

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

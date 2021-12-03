<?php
/*
 *HaveIBeenPwned Email Breach checker script by Professional#0001
 */
$Node = $_GET['email'];
function GetRequest($URL, $Headers)
{
    $curl = curl_init($URL);
    curl_setopt($curl, CURLOPT_URL, $URL);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $Headers);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    $Response = curl_exec($curl);
    curl_close($curl);
    return $Response;
}
$Breaches = json_decode(SendGetRequest("https://haveibeenpwned.com/api/v3/breachedaccount/$Node", array("hibp-api-key: <YOUR_API_KEY>", "user-agent: <YOUR_CUSTOM_AGENT>",)));
foreach ($Breaches as $Breach) {
    print "Database Breach:" . $Breach['Name'] . "\n";
}
?>

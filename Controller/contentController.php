<?php
session_start();

$url ="http://localhost:8082/servicesr_war/webapi/articles/".$category."/json";
$client = curl_init($url);
curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($client);

$articles = json_decode($response, true);
require './Views/indexView.php';

?>
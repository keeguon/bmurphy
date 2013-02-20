<?php

// Autoload
// --------

$loader = require __DIR__.'/vendor/autoload.php';


// Create an OAuth 2.0 consumer
// ----------------------------

$config = array(
    "client_id"      => "212f7687ee8765b8416c48b2062e22904f5806dc3133313034353035393535313234646363376431333065312e3339333334303439"
  , "client_secret"  => "1bced959f2aab4b2e693a80d6b254d1254f21a0d39393334323333383435313234646363376431383236322e3435303631333533"
  , "client_options" => array(
        "site"      => "http://localhost:3000"
      , "token_url" => "/oauth/access_token"
    )
);
$client = new \OAuth2\Client($config["client_id"], $config["client_secret"], $config["client_options"]);


// Retrieve access token and perform request
// -----------------------------------------

try {
  // Get access token
  $accessToken = $client->getToken(array(
      "client_id"     => $config["client_id"]
    , "client_secret" => $config["client_secret"]
    , "grant_type"    => "client_credentials"
    , "parse"         => "json"
  ), array(
      "mode"       => "query"
    , "param_name" => "access_token"
  ));

  // Send request
  $response = $accessToken->get("/hello/keeguon", array("parse" => "json"));

  // Parse response
  $parsedResponse = $response->parse();
  print_r($parsedResponse);
} catch (\Exception $e) {
  print_r($e->getMessage());
}


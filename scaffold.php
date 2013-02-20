<?php

require_once __DIR__.'/bootstrap.php';

// Create new user
$user = new \BMurphy\Models\User('keeguon', '2pmuMJGexo', 'felix.bellanger@gmail.com');
$user->save();

// Create new client
$client = new \BMurphy\Models\Client;
$client->setUser($user);
$client->setName('Sample app');
$client->save();


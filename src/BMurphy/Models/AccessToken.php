<?php

namespace BMurphy\Models;

/**
 * BMurphy\Models\AccessToken entity.
 */
class AccessToken extends \BMurphy\Models\Base\AccessToken
{
  public function __construct($client = null, $user_id = null, $lifetime = null)
  {
    // Throw error if missing required constructor parameters
    if (!$client) {
      throw new \Exception("Invalid construct args.");
    }

    // Constructor
    $this->setClient($client);
    $this->user_id = $user_id;
    $this->token   = bin2hex(\OAuthProvider::generateToken(20, true));
    if ($lifetime && is_int($lifetime)) {
      $this->lifetime      = $lifetime;
      $this->refresh_token = bin2hex(\OAuthProvider::generateToken(20, true));
    }

    parent::__construct();
  }
}

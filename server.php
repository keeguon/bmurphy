<?php

// Load our bootstrap code
// -----------------------

require __DIR__.'/bootstrap.php';

use Symfony\Component\HttpFoundation\Request
  , Symfony\Component\HttpFoundation\Response;


// Silex app
// -----------

$app = new Silex\Application();


// Register providers
// ------------------

$app->register(new Silex\Provider\ValidatorServiceProvider());


// OAuth Routes
// ------------

$app->match('/oauth/access_token', function(Request $request) use ($app) {
  $client_id     = '';
  $client_secret = '';

  // Create standard response
  $response      = new Response();
  $response->headers->add(array(
      'Content-Type'  => 'application/json;charset=UTF-8'
    , 'Cache-Control' => 'no-store'
    , 'Pragma'        => 'no-cache'
  ));

  // Grant type mode (server apps)
  if ($request->get('grant_type')) {
    // Try to retrieve client_id & client_secret depending on the authentication mechanism
    if ($request->headers->has('Authorization') && preg_match('/Basic\s+(.*)$/i', $this->headers->get('Authorization'), $matches) && !($request->get('client_id') && $request->get('client_secret'))) {
      list($client_id, $client_secret) = explode(':', base64_decode($matches[1]));
    } else if (!$request->headers->has('Authorization') && ($request->get('client_id') && $request->get('client_secret'))) {
      list($client_id, $client_secret) = array($request->get('client_id'), $request->get('client_secret'));
    } else {
      // 400 invalid_request
      $response->setContent(json_encode(array(
          'error'             => 'invalid_request'
        , 'error_description' => 'The request is missing a required parameter, includes an unsupported parameter value, repeats a parameter, includes multiple credentials, utilizes more than one mechanism for authenticating the client, or is otherwise malformed.'
      )));
      $response->setStatusCode(400);
      return $response;
    }

    // Try to authentify the client
    if (false === ($client = \BMurphy\Models\Client::authentify($client_id, $client_secret))) {
      // 401 invalid_client
      $response->setContent(json_encode(array(
          'error'             => 'invalid_client'
        , 'error_description' => 'Client authentication failed (e.g. unknown client, no client authentication included, or unsupported authentication method).'
      )));
      $response->setStatusCode(401);
      return $response;
    }

    switch ($request->get('grant_type')) {
      case 'authorization_code':
        // Check required params
        $required_params = array('code', 'redirect_uri');
        for ($i = 0, $count = count($required_params); $i < $count; $i++) {
          if (!$request->get($required_params[$i])) {
            // 400 invalid_request
            $response->setContent(json_encode(array(
                'error'             => 'invalid_request'
              , 'error_description' => 'The request is missing a required parameter, includes an unsupported parameter value, repeats a parameter, includes multiple credentials, utilizes more than one mechanism for authenticating the client, or is otherwise malformed.'
            )));
            $response->setStatusCode(400);
            return $response;
          }
        }

        // Check grant
        if (false !== ($code = \BMurphy\Models\Code::checkGrant($code, $client['id'])) && $request->get('redirect_uri') === $code['redirect_uri']) {
          // Query the DB to see if there's an existing access token
          $qb = \BMurphy\Models\AccessToken::queryBuilder('at')
            ->where('at.client_id = :client_id')
            ->andWhere('at.user_id = :user_id')
            ->setParameters(array('client_id' => $client['id'], 'user_id' => $code['user_id']))
          ;
          $result = $qb->getQuery()->getResult();

          // Get the access token from the query or create one if there was no result and save it
          $access_token = (0 !== count($result)) ? $result[0] : new \BMurphy\Models\AccessToken($client, $code['user_id']);
          if ($access_token->isNew()) {
            $access_token->save();
          }

          // Set content
          $content = array(
              'access_token' => $access_token['token']
            , 'token_type'   => 'bearer'
          );
          if ($access_token['lifetime']) {
            // Compute the remaining lifetime of the token
            $expires_in = ($access_token['created']->getTimestamp() + $access_token['lifetime']) - date_timestamp_get(new \DateTime());

            $content = array_merge($content, array(
                'expires_in'    => ($expires_in < 0) ? 0 : $expires_in
              , 'refresh_token' => $access_token['refresh_token']
            ));
          }
        } else {
          // 400 invalid_grant
          $response->setContent(json_encode(array(
              'error'             => 'invalid_grant'
            , 'error_description' => 'The provided authorization grant (e.g. authorization code, resource owner credentials, client credentials) is invalid, expired, revoked, does not match the redirection URI used in the authorization request, or was issued to another client.'
          )));
          $response->setStatusCode(400);
          return $response;
        }
        break;

      case 'password':
        // Check required params
        $required_params = array('username', 'password');
        for ($i = 0, $count = count($required_params); $i < $count; $i++) {
          if (!$request->get($required_params[$i])) {
            // 400 invalid_request
            $response->setContent(json_encode(array(
                'error'             => 'invalid_request'
              , 'error_description' => 'The request is missing a required parameter, includes an unsupported parameter value, repeats a parameter, includes multiple credentials, utilizes more than one mechanism for authenticating the client, or is otherwise malformed.'
            )));
            $response->setStatusCode(400);
            return $response;
          }
        }

        if (false !== ($user = \BMurphy\Models\User::checkGrant($request->get('username'), $request->get('password')))) {
          // Query the DB to see if there's an existing access token
          $qb = \BMurphy\Models\AccessToken::queryBuilder('at')
            ->where('at.client_id = :client_id')
            ->andWhere('at.user_id = :user_id')
            ->andWhere('at.valid = :valid')
            ->setParameters(array('client_id' => $client['id'], 'user_id' => $user['id'], 'valid' => true))
          ;
          $result = $qb->getQuery()->getResult();

          // Get the access token from the query or create one if there was no result and save it
          $access_token = (0 !== count($result)) ? $result[0] : new \BMurphy\Models\AccessToken($client, $user['id']);
          if ($access_token->isNew()) {
            $access_token->save();
          }

          // Set content
          $content = array(
              'access_token' => $access_token['token']
            , 'token_type'   => 'bearer'
          );
          if ($access_token['lifetime']) {
            // Compute the remaining lifetime of the token
            $expires_in = ($access_token['created']->getTimestamp() + $access_token['lifetime']) - date_timestamp_get(new \DateTime());

            $content = array_merge($content, array(
                'expires_in'    => ($expires_in < 0) ? 0 : $expires_in
              , 'refresh_token' => $access_token['refresh_token']
            ));
          }
        } else {
          // 400 invalid_grant
          $response->setContent(json_encode(array(
              'error'             => 'invalid_grant'
            , 'error_description' => 'The provided authorization grant (e.g. authorization code, resource owner credentials, client credentials) is invalid, expired, revoked, does not match the redirection URI used in the authorization request, or was issued to another client.'
          )));
          $response->setStatusCode(400);
          return $response;
        }
        break;

      case 'client_credentials':
        // Query the DB to see if there's an existing access token
        $qb = \BMurphy\Models\AccessToken::queryBuilder('at')
          ->where('at.client_id = :client_id')
          ->andWhere('at.user_id IS NULL')
          ->andWhere('at.valid = :valid')
          ->setParameters(array('client_id' => $client['id'], 'valid' => true))
        ;
        $result = $qb->getQuery()->getResult();

        // Get the access token from the query or create one if there was no result and save it
        $access_token = (0 !== count($result)) ? $result[0] : new \BMurphy\Models\AccessToken($client);
        if ($access_token->isNew()) {
          $access_token->save();
        }

        // Set content
        $content = array(
            'access_token' => $access_token['token']
          , 'token_type'   => 'bearer'
        );
        if ($access_token['lifetime']) {
          // Compute the remaining lifetime of the token
          $expires_in = ($access_token['created']->getTimestamp() + $access_token['lifetime']) - date_timestamp_get(new \DateTime());

          $content = array_merge($content, array(
              'expires_in'    => ($expires_in < 0) ? 0 : $expires_in
            , 'refresh_token' => $access_token['refresh_token']
          ));
        }
        break;

      case 'refresh_token':
        // Check required params
        $required_params = array('refresh_token');
        for ($i = 0, $count = count($required_params); $i < $count; $i++) {
          if (!$request->get($required_params[$i])) {
            // 400 invalid_request
            $response->setContent(json_encode(array(
                'error'             => 'invalid_request'
              , 'error_description' => 'The request is missing a required parameter, includes an unsupported parameter value, repeats a parameter, includes multiple credentials, utilizes more than one mechanism for authenticating the client, or is otherwise malformed.'
            )));
            $response->setStatusCode(400);
            return $response;
          }
        }

        // Query the DB to find the access token matching the refresh token
        $qb = \BMurphy\Models\AccessToken::queryBuilder('at')
          ->where('at.refresh_token = :refresh_token')
          ->andWhere('at.lifetime IS NOT NULL')
          ->setParameter('refresh_token', $request->get('refresh_token'))
        ;
        $result = $qb->getQuery()->getResult();

        if (1 === count($result)) {
          // Get current token
          $access_token = $result[0];

          // Create a new token based on the existing token
          $new_access_token = new \BMurphy\Models\AccessToken($client, $access_token['user_id'], $access_token['lifetime']);
          if ($new_access_token->isNew()) {
            $new_access_token->save();
          }

          // Delete the old token
          $access_token->delete();

          // Set content
          $content = array(
              'access_token' => $new_access_token['token']
            , 'token_type'   => 'bearer'
          );
          if ($new_access_token['lifetime']) {
            // Compute the remaining lifetime of the token
            $expires_in = ($new_access_token['created']->getTimestamp() + $new_access_token['lifetime']) - date_timestamp_get(new \DateTime());

            $content = array_merge($content, array(
                'expires_in'    => ($expires_in < 0) ? 0 : $expires_in
              , 'refresh_token' => $new_access_token['refresh_token']
            ));
          }
        } else {
          // 400 invalid_grant
          $response->setContent(json_encode(array(
              'error'             => 'invalid_grant'
            , 'error_description' => 'The provided authorization grant (e.g. authorization code, resource owner credentials, client credentials) is invalid, expired, revoked, does not match the redirection URI used in the authorization request, or was issued to another client.'
          )));
          $response->setStatusCode(400);
          return $response;
        }
        break;

      default:
        // 400 unsupported_grant_type
        $response->setContent(json_encode(array(
            'error'             => 'unsupported_grant_type'
          , 'error_description' => 'The authorization grant type is not supported by the authorization server.'
        )));
        $response->setStatusCode(400);
        return $response;
    }
  } else {
    // 400 invalid_request
    $response->setContent(json_encode(array(
        'error'             => 'invalid_request'
      , 'error_description' => 'The request is missing a required parameter, includes an unsupported parameter value, repeats a parameter, includes multiple credentials, utilizes more than one mechanism for authenticating the client, or is otherwise malformed.'
    )));
    $response->setStatusCode(400);
    return $response;
  }

  // If the response wasn't returned so far return it
  $response->setContent(json_encode($content));
  return $response;
})
->method('GET|POST');


// Sample protected resource
// -------------------------

$app->get('/hello/{name}', function(Request $request) use ($app) {
  $token   = '';

  // Create standard response
  $response = new Response();
  $response->headers->add(array(
      'Content-Type'  => 'application/json;charset=UTF-8'
    , 'Cache-Control' => 'no-store'
    , 'Pragma'        => 'no-cache'
  ));

  // Check for token in the request headers or the request parameters
  if ($request->headers->has('Authorization') && preg_match('/Bearer\s+(.*)$/i', $request->headers->get('Authorization'), $matches) && !$request->get('access_token')) {
    $token = $matches[1];
  } else if (!$request->headers->has('Authorization') && $request->get('access_token')) {
    $token = $request->get('access_token');
  } else {
    // 400 invalid_request
    $response->setContent(json_encode(array(
        'error'             => 'invalid_request'
      , 'error_description' => 'The request is missing a required parameter, includes an unsupported parameter value, repeats a parameter, includes multiple credentials, utilizes more than one mechanism for authenticating the client, or is otherwise malformed.'
    )));
    $response->setStatusCode(400);
    return $response;
  }

  // Request DB for token
  if ($token !== '') {
    $qb = \BMurphy\Models\AccessToken::queryBuilder('at')
      ->where('at.token = :token')
      ->andWhere('at.valid = :valid')
      ->setParameters(array('token' => $token, 'valid' => true))
    ;
    $accessToken = $qb->getQuery()->getSingleResult();

    if ($accessToken) {
      // Check if token is expired/valid if access token possesses a lifetime
      if ($accessToken['lifetime']) {
        $expired = (($accessToken['created']->getTimestamp() + $accessToken['lifetime']) - date_timestamp_get(new DateTime()) < 0) ? true : false;
        if ($expired || !$accessToken['valid']) {
          // 401 invalid_token
          $response->setContent(json_encode(array(
              'error'             => 'invalid_token'
            , 'error_description' => 'The provided token is invalid, expired or doesn\'t match any existing tokens.'
          )));
          $response->setStatusCode(401);
          return $response;
        }
      }
    } else {
      // 401 invalid_token
      $response->setContent(json_encode(array(
          'error'             => 'invalid_token'
        , 'error_description' => 'The provided token is invalid, expired or doesn\'t match any existing tokens.'
      )));
      $response->setStatusCode(401);
      return $response;
    }
  }

  // Send response
  $response->setContent(json_encode(array('message' => "Hello " . $request->get('name'))));

  return $response;
});


// Run app
// -------

$app->run();

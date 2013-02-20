<?php

namespace BMurphy\Models;

/**
 * BMurphy\Models\Client entity.
 */
class Client extends \BMurphy\Models\Base\Client
{
  final public static function authentify($client_id, $client_secret)
  {
    $qb = self::queryBuilder('c')
      ->where('c.client_id = :client_id')
      ->andWhere('c.client_secret = :client_secret')
      ->setParameters(array('client_id' => $client_id, 'client_secret' => $client_secret))
    ;
    $result = $qb->getQuery()->getResult();

    return (1 !== count($result)) ? false : $result[0];
  }

  public function __construct()
  {
    // Generate the client_id and client_secret pair
    $this->client_id     = bin2hex($this->generateRandomString(20, true));
    $this->client_secret = bin2hex($this->generateRandomString(20, true));

    parent::__construct();
  }

  private function generateRandomString($length, $strong = false)
  {
    // Read from /dev/urandom to avoid blocking
    $fp = fopen("/dev/urandom", "rb");
    $entropy = fread($fp, 20);
    fclose($fp);

    // In order to circumvent /dev/urandom reusing entropy from its own pool
    // let's add a little bit more entropy depending on our 'strong' option.
    $entropy = !$strong?:$entropy.uniqid(mt_rand(), true);

    return $entropy;
  }
}

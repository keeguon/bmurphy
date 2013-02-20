<?php

namespace BMurphy\Models;

/**
 * BMurphy\Models\User entity.
 */
class User extends \BMurphy\Models\Base\User
{
  // The default computational expense parameter.
  const DEFAULT_COST    = 10;
  // The minimum cost supported by the algorithm.
  const MIN_COST        = 4;
  // Maximum possible size of bcrypt salts.
  const MAX_SALT_LENGTH = 22;

  private
    $options = array()
  ;

  final public static function checkGrant($username, $password)
  {
    $return = false;

    $qb = self::queryBuilder('u')
      ->where('u.username = :username')
      ->setParameter('username', $username)
    ;
    $result = $qb->getQuery()->getResult();

    if (1 === count($result)) {
      $user = $result[0];
      if (crypt($password, $user->getSalt()) === $user->getPassword()) {
        $return = $user;
      }
    }

    return $return;
  }

  public function __construct($username = null, $password = null, $email = null, $opts = array())
  {
    // Default options
    $this->options = array_merge(array(
        'cost'   => self::DEFAULT_COST
      , 'strong' => true
    ), $opts);

    // Constructor
    if ($username) {
      $this->setUsername($username);
    }
    if ($password) {
      $this->setPassword($password);
    }
    if ($email) {
      $this->setEmail($email);
    }

    // Parent constructor
    parent::__construct();
  }

  public function setPassword($password)
  {
    if (!$this->getSalt()) {
      $this->setSalt($this->generateSalt());
    }

    parent::setPassword(crypt($password, $this->getSalt()));
  }

  private function generateSalt()
  {
    // Read from /dev/urandom to avoid blocking
    $fp = fopen("/dev/urandom", "rb");
    $entropy = fread($fp, 20);
    fclose($fp);

    // In order to circumvent /dev/urandom reusing entropy from its own pool
    // let's add a little bit more entropy depending on our 'strong' option.
    $entropy = !$this->options['strong']?:$entropy.uniqid(mt_rand(), true);

    // Extract salt from entropy
    $salt = substr(bin2hex($entropy), 0, self::MAX_SALT_LENGTH);

    return '$2a$'.$this->options['cost'].'$'.$salt;
  }
}

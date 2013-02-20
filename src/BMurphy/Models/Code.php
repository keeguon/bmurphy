<?php

namespace BMurphy\Models;

/**
 * BMurphy\Models\Code entity.
 */
class Code extends \BMurphy\Models\Base\Code
{
  final public static function checkGrant($code, $client_id)
  {
    $qb = self::queryBuilder('c')
      ->where('c.code = :code')
      ->andWhere('c.client_id = :client_id')
      ->andWhere('c.valid = :valid')
      ->setParameters(array('code' => $code, 'client_id' => $client_id, 'valid' => true));
    ;
    $result = $qb->getQuery()->getResult();

    return (1 !== count($result)) ? false : $result[0];
  }
}

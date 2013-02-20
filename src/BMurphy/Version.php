<?php

namespace BMurphy;

class Version
{
  /**
   * Current FriendSpray version
   */
  const VERSION = '0.1.0';

  /**
   * Compares a Doctrine version with the current one.
   *
   * @param string $version Doctrine version to compare.
   * @return int Returns -1 if older, 0 if it is the same, 1 if version
   *             passed as argument is newer.
   */
  public static function compare($version)
  {
    $currentVersion = str_replace(' ', '', strtolower(self::VERSION));
    $version = str_replace(' ', '', $version);

    return version_compare($version, $currentVersion);
  }
}


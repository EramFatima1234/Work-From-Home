<?php

namespace Drupal\timezone;
use Drupal\Core\Session\AccountProxyInterface;

/**
 * Class CurrentUser.
 */
class UserService {

  /**
   * Drupal\Core\Session\AccountProxyInterface definition.
   *
   * @var AccountProxyInterface
   */
  protected $currentUser;

  /**
   * Constructs a new CurrentUser object.
   * @param AccountProxyInterface $current_user
   */
  public function __construct(AccountProxyInterface $current_user) {
    $this->currentUser = $current_user;
  }

  public function isAnony()
  {
    return $this->currentUser->getAccount()->isAnonymous();
  }
  public function getTimezone()
  {
    return $this->currentUser->getAccount()->getTimeZone();
  }

}

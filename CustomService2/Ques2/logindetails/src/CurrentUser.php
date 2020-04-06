<?php

namespace Drupal\logindetails;
use Drupal\Core\Session\AccountProxyInterface;

/**
 * Class CurrentUser.
 */
class CurrentUser {

  /**
   * Drupal\Core\Session\AccountProxyInterface definition.
   *
   * @var \Drupal\Core\Session\AccountProxyInterface
   */
  protected $currentUser;

  /**
   * Constructs a new CurrentUser object.
   */
  public function __construct(AccountProxyInterface $current_user) {
    $this->currentUser = $current_user;
  }

  public function getName()
  {
    return $this->currentUser->getAccount()->getDisplayName();
  }

  public function getLoginTime()
  {
    return $this->currentUser->getAccount()->getLastAccessedTime();
  }

  public function getRoles()
  {
    return $this->currentUser->getAccount()->getRoles();
  }

  public function getTimezone()
  {
    return $this->currentUser->getAccount()->getTimeZone();
  }

}

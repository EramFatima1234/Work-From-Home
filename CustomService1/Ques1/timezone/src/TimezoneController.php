<?php
namespace Drupal\timezone;
use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Datetime\DrupalDateTime;
use Drupal\node\Entity\Node;

class TimezoneController extends ControllerBase
{
  private $user;
  public function run()
  {
    $user = \Drupal::service('my_user_service');

    if($user->isAnony())
    {
      $timezone = new \DateTimeZone('GMT');
    }
    else {
      $timezone = $user->getTimezone();
    }
    // $node= Node::load(2);

    // $date1 = new DrupalDateTime($node->field_date1->value,$timezone);
    // $date2 = new DrupalDateTime($node->field_date2->value,$timezone);

    $date1 = new DrupalDateTime('now',$timezone);
    $date2 = new DrupalDateTime('last Friday',$timezone);

    $datediff = $date1->diff($date2);
    return array('#title' => 'Date Difference',
      '#markup' => 'Date1 : '.$date1->format('Y/M/D : H:m:s a').'<br>Date2 : '.$date2->format('Y/M/D : H:m:s a').'<br>Difference : '.$datediff->format('%y Years %m Months %d days : %h hours %m minutes and %s seconds'),
    );
    //return array('#markup' => '<table><thead><tr><th>Hash</th><th>Password</th></tr></thead><tbody><tr><td>' . $this->t($hash->getHash($pw) . '</td><td>' . $pw . '</td></tr></tbody></table>'));
  }
}

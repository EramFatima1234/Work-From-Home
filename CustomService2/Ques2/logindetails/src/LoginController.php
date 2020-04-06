<?php
namespace Drupal\logindetails;

use Drupal\Core\Controller\ControllerBase;
use Drupal\myservice;

class LoginController extends ControllerBase
{
    private $user;
    public function run()
    {
        $user = \Drupal::service('user_service');
        $name = $user->getName();
        $lastLogin = date('D/M/Y | h:m:s a',$user->getLoginTime());
        $rolesArray = $user->getRoles();
        $timezone = $user->getTimezone();
        $roles = '';
        foreach($rolesArray as $role)
        {
            $roles = $roles.' '.$role;
        }

        return array('#title' => $name,
            '#markup' => 'Name : '.$name.'<br>Last logged in on : '.$lastLogin.'<br>Roles : '.$roles.'<br>Timezone : '.$timezone,        
    );
        //return array('#markup' => '<table><thead><tr><th>Hash</th><th>Password</th></tr></thead><tbody><tr><td>' . $this->t($hash->getHash($pw) . '</td><td>' . $pw . '</td></tr></tbody></table>'));
    }
}


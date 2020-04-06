<?php
namespace Drupal\anonymous_user;

use Drupal\Core\Session\AccountProxy;
use Drupal\Core\Url;
use Symfony\Cmf\Component\Routing\RouteObjectInterface;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\KernelEvents;

class EventSubscriber implements EventSubscriberInterface
{

    protected $account_proxy;

    public function __construct(AccountProxy $current_user)
    {
        $this->account_proxy = $current_user;
    }

    public static function getSubscribedEvents()
    {
        $events[KernelEvents::REQUEST][] = ['onRequest', 10];
        return $events;
    }

    public function onRequest(Event $event)
    {
        $current_user = $this->account_proxy->getAccount();
        $current_route = $event->getRequest()->get(RouteObjectInterface::ROUTE_NAME);
        //\Drupal::messenger()->addStatus(t('cURRENT rOUTE : '.$current_route));
        $ignore_routes_anon = array(
            'user.login',
            'user.pass',
            'user.reset',
        );

        if ($current_user->isAnonymous() && in_array($current_route, $ignore_routes_anon) === false) {
            \Drupal::messenger()->addStatus(t('Please Login to Continue'));
            $response = new RedirectResponse(
                Url::fromRoute(
                    'user.login')->toString()
            );

            $event->setResponse($response);
            $event->
                return;
        }
        if(in_array($current_route, array('user.login','system.404',)))
        {
            $request = \Drupal::request();
            if($route = $request->attributes->get(RouteObjectInterface::ROUTE_OBJECT))
            {
                $route->setDefault('_title','Please Login');
            }
            return;
        }
    }
}

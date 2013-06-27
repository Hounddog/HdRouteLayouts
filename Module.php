<?php
namespace HdRouteLayouts;

class Module
{
    public function onBootstrap($e)
    {
        $e->getApplication()->getEventManager()->getSharedManager()->attach('Zend\Mvc\Controller\AbstractActionController', 'dispatch', function($e) {
            $controller      = $e->getTarget();
            $routeName       = $e->getRouteMatch()->getMatchedRouteName();
            $config          = $e->getApplication()->getServiceManager()->get('config');
            if (isset($config['route_layouts'][$routeName])) {
                $controller->layout($config['route_layouts'][$routeName]);
            }
        }, 100);
    }
}
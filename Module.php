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
            } else {
                $rules = array_keys($config['route_layouts']);
                foreach ($rules as $routeRule) {
                    if (fnmatch($routeRule, $routeName, FNM_CASEFOLD)) {
                        $controller->layout($config['route_layouts'][$routeRule]);
                        break;
                    }
                } 
            }
            
            
        }, 100);
    }
}

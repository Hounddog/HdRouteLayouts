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
            $layoutConfig    = $config['route_layouts'];
            
            if (isset($layoutConfig[$routeName])) {
                $controller->layout($layoutConfig[$routeName]);
            } else {
                $rules = array_keys($layoutConfig);
                foreach ($rules as $routeRule) {    
                    if (fnmatch($routeRule, $routeName, FNM_CASEFOLD)) {
                        $controller->layout($layoutConfig[$routeRule]);
                        break;
                    }
                } 
            }
            
            
        }, 100);
    }
}

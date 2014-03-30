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
            
            foreach (array_keys($config['route_layouts']) as $routeRule) {
                if (fnmatch($routeRule, $routeName, FNM_CASEFOLD)) {
                    $allowedRoles = $this->rules[$routeRule];
                    $controller->layout($config['route_layouts'][$routeRule]);
                    break;
                }
            }
        }
        }, 100);
    }
}

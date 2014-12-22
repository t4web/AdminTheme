<?php
namespace Admin;

use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\ControllerProviderInterface;
use Zend\ModuleManager\Feature\BootstrapListenerInterface;
use Zend\ModuleManager\Feature\ServiceProviderInterface;
use Zend\EventManager\EventInterface;
use Zend\Mvc\MvcEvent;
use Zend\Mvc\Router\RouteMatch;
use Zend\ServiceManager\ServiceLocatorInterface;
use Admin\Navigation\Factory as NavigationFactory;
use Admin\Menu\Navigator;

class Module implements AutoloaderProviderInterface, ConfigProviderInterface,
                        ControllerProviderInterface, ServiceProviderInterface,
                        BootstrapListenerInterface
{

    public function onBootstrap(EventInterface $e)
    {
        $app = $e->getParam('application');
        $em = $app->getEventManager();
        $em->attach(MvcEvent::EVENT_DISPATCH, array($this, 'selectLayoutBasedOnRoute'));
    }

    /**
     * Select the admin layout based on route name
     *
     * @param MvcEvent $e
     * @return void
     */
    public function selectLayoutBasedOnRoute(MvcEvent $e)
    {
        $match = $e->getRouteMatch();
        $controller = $e->getTarget();

        if (!$match instanceof RouteMatch
            || false === strpos($match->getMatchedRouteName(), 'admin')
            || $controller->getEvent()->getResult()->terminate()
        ) {
            return;
        }

        $layout = 'layout/admin';
        $controller->layout($layout);
    }

    public function getConfig($env = null)
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getServiceConfig()
{
    return array(
        'factories' => array(
            'Admin\Menu\Navigator' => function (ServiceLocatorInterface $sl) {
                return new Navigator();
            },
            'Navigation' => function (ServiceLocatorInterface $sl) {
                $factory =  new NavigationFactory();
                return $factory->createService($sl);
            },
        )
    );
}

    public function getControllerConfig()
    {
        return array(
            'invokables' => array(
                'Admin\Controller\Admin\Phpinfo' => 'Admin\Controller\Admin\PhpinfoController',
            )
        );
    }
}

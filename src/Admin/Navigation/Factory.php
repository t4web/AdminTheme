<?php

namespace Admin\Navigation;

use Zend\Navigation\Service\DefaultNavigationFactory;
use Zend\ServiceManager\ServiceLocatorInterface;
use Admin\Menu\Navigator;

class Factory extends DefaultNavigationFactory
{
    protected function getName()
    {
        return 'admin';
    }

    protected function getPages(ServiceLocatorInterface $serviceLocator)
    {
        if (null === $this->pages) {
            /** @var Navigator $navigator */
            $navigator = $serviceLocator->get('Admin\Menu\Navigator');

            $config = $navigator->getConfig();

            $application = $serviceLocator->get('Application');
            $routeMatch  = $application->getMvcEvent()->getRouteMatch();
            $router      = $application->getMvcEvent()->getRouter();
            $pages       = $this->getPagesFromConfig($config);

            $this->pages = $this->injectComponents($pages, $routeMatch, $router);
        }

        return $this->pages;
    }

}
<?php
namespace Admin\UnitTest\ServiceLocator;

use Admin\Module;
use Zend\ServiceManager\ServiceManager;
use Zend\ServiceManager\Config;

class NavigationTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var ServiceManager
     */
    private $serviceManager;

    protected function setUp()
    {
        $module = new Module();

        $this->serviceManager = new ServiceManager(new Config($module->getServiceConfig()));
        $this->serviceManager->setAllowOverride(true);
    }

    public function testCreation()
    {
        $this->markTestIncomplete();
        return;
        $this->assertTrue($this->serviceManager->has('Navigation'));

        $service = $this->serviceManager->get('Navigation');

        $this->assertInstanceOf('Zend\Navigation\Navigation', $service);
    }

}
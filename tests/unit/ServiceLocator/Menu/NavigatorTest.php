<?php
namespace Admin\UnitTest\ServiceLocator\Menu;

use Admin\Module;
use Zend\ServiceManager\ServiceManager;
use Zend\ServiceManager\Config;

class NavigatorTest extends \PHPUnit_Framework_TestCase
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
        $this->assertTrue($this->serviceManager->has('Admin\Menu\Navigator'));

        $service = $this->serviceManager->get('Admin\Menu\Navigator');

        $this->assertInstanceOf('Admin\Menu\Navigator', $service);
    }

}
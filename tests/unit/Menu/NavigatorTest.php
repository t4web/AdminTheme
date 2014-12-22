<?php
namespace Admin\UnitTest\Menu;

use Admin\Menu\Navigator;
use Admin\Menu\Entry;

class NavigatorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Navigator
     */
    private $navigator;

    protected function setUp()
    {
        $this->navigator = new Navigator();
    }

    public function testAdd()
    {
        $entry1 = new Entry('page label 1', 'page1');
        $entry2 = new Entry('page label 2', 'page2');

        $this->navigator->add($entry1);
        $this->navigator->add($entry2);

        $this->assertAttributeContains($entry1, 'config', $this->navigator);
        $this->assertAttributeContains($entry2, 'config', $this->navigator);
    }

    public function testConfig()
    {
        $entry1 = new Entry('page label 1', 'route-page1');
        $entry2 = new Entry('page label 2', 'route-page2');

        $this->navigator->add($entry1);
        $this->navigator->add($entry2);

        $resultConfig = $this->navigator->getConfig();

        $this->assertArrayHasKey('route-page1', $resultConfig);
        $this->assertArrayHasKey('label', $resultConfig['route-page1']);
        $this->assertEquals('page label 1', $resultConfig['route-page1']['label']);
        $this->assertArrayHasKey('route', $resultConfig['route-page1']);
        $this->assertEquals('route-page1', $resultConfig['route-page1']['route']);

        $this->assertArrayHasKey('route-page2', $resultConfig);
        $this->assertArrayHasKey('label', $resultConfig['route-page2']);
        $this->assertEquals('page label 2', $resultConfig['route-page2']['label']);
        $this->assertArrayHasKey('route', $resultConfig['route-page2']);
        $this->assertEquals('route-page2', $resultConfig['route-page2']['route']);

        $this->assertArrayHasKey('admin-dashboard', $resultConfig);
        $this->assertArrayHasKey('label', $resultConfig['admin-dashboard']);
        $this->assertEquals('Dashboard', $resultConfig['admin-dashboard']['label']);
        $this->assertArrayHasKey('route', $resultConfig['admin-dashboard']);
        $this->assertEquals('admin-dashboard', $resultConfig['admin-dashboard']['route']);

        $this->assertArrayHasKey('admin-default', $resultConfig);
        $this->assertArrayHasKey('label', $resultConfig['admin-default']);
        $this->assertEquals('Admin', $resultConfig['admin-default']['label']);
        $this->assertArrayHasKey('route', $resultConfig['admin-default']);
        $this->assertEquals('admin-default', $resultConfig['admin-default']['route']);
    }

}
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
        $entry1 = new Entry('page1', 'page label 1', 'page1');
        $entry2 = new Entry('page2', 'page label 2', 'page2');

        $this->navigator->add($entry1);
        $this->navigator->add($entry2);

        $this->assertAttributeContains($entry1, 'config', $this->navigator);
        $this->assertAttributeContains($entry2, 'config', $this->navigator);
    }

    public function testConfig()
    {
        $entry1 = new Entry('page1', 'page label 1', 'route-page1');
        $entry2 = new Entry('page2', 'page label 2', 'route-page2');

        $this->navigator->add($entry1);
        $this->navigator->add($entry2);

        $resultConfig = $this->navigator->getConfig();

        $this->assertArrayHasKey('page1', $resultConfig);
        $this->assertArrayHasKey('label', $resultConfig['page1']);
        $this->assertEquals('page label 1', $resultConfig['page1']['label']);
        $this->assertArrayHasKey('route', $resultConfig['page1']);
        $this->assertEquals('route-page1', $resultConfig['page1']['route']);

        $this->assertArrayHasKey('page2', $resultConfig);
        $this->assertArrayHasKey('label', $resultConfig['page2']);
        $this->assertEquals('page label 2', $resultConfig['page2']['label']);
        $this->assertArrayHasKey('route', $resultConfig['page2']);
        $this->assertEquals('route-page2', $resultConfig['page2']['route']);
    }

}
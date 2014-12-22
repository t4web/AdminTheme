<?php
namespace Admin\UnitTest\Menu;

use Admin\Menu\Entry;

class EntryTest extends \PHPUnit_Framework_TestCase
{

    public function testConstructor()
    {
        $entryRaw = [
            'label' => 'page label 1',
            'route' => '/page1',
            'icon' => 'icon-1',
        ];

        $entry = new Entry($entryRaw['label'], $entryRaw['route'], $entryRaw['icon']);

        $this->assertEquals($entryRaw['label'], $entry->getLabel());
        $this->assertEquals($entryRaw['route'], $entry->getRoute());
        $this->assertEquals($entryRaw['icon'], $entry->getIcon());
    }

}
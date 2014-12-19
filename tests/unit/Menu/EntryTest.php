<?php
namespace Admin\UnitTest\Menu;

use Admin\Menu\Entry;

class EntryTest extends \PHPUnit_Framework_TestCase
{

    public function testConstructor()
    {
        $entryRaw = [
            'name' => 'page1',
            'label' => 'page label 1',
            'route' => '/page1',
        ];

        $entry = new Entry($entryRaw['name'], $entryRaw['label'], $entryRaw['route']);

        $this->assertEquals($entryRaw['name'], $entry->getName());
        $this->assertEquals($entryRaw['label'], $entry->getLabel());
        $this->assertEquals($entryRaw['route'], $entry->getRoute());
    }

}
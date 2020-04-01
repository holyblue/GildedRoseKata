<?php

namespace App;

class GildedRoseTest extends \PHPUnit\Framework\TestCase
{
    function test_updates_normal_items_before_the_sell_date()
    {
        $items = [new Item("normal", 10, 15)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals("normal", $items[0]->name);
        $this->assertEquals(9, $items[0]->sell_in);
        $this->assertEquals(14, $items[0]->quality);
    }

    function test_updates_normal_items_on_the_sell_date()
    {
        $items = [new Item("normal", 0, 15)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals("normal", $items[0]->name);
        $this->assertEquals(-1, $items[0]->sell_in);
        $this->assertEquals(13, $items[0]->quality);
    }

    function test_updates_normal_items_after_the_sell_date()
    {
        $items = [new Item("normal", -1, 15)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals("normal", $items[0]->name);
        $this->assertEquals(-2, $items[0]->sell_in);
        $this->assertEquals(13, $items[0]->quality);
    }

    function test_updates_normal_items_with_a_quility_0()
    {
        $items = [new Item("normal", 1, 0)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals("normal", $items[0]->name);
        $this->assertEquals(0, $items[0]->sell_in);
        $this->assertEquals(0, $items[0]->quality);
    }
}

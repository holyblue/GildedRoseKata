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
        $this->assertEquals(-1, $items[0]->sell_in);
        $this->assertEquals(13, $items[0]->quality);
    }

    function test_updates_normal_items_after_the_sell_date()
    {
        $items = [new Item("normal", -1, 15)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals(-2, $items[0]->sell_in);
        $this->assertEquals(13, $items[0]->quality);
    }

    function test_updates_normal_items_with_a_quality_0()
    {
        $items = [new Item("normal", 1, 0)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals(0, $items[0]->sell_in);
        $this->assertEquals(0, $items[0]->quality);
    }

    /**
     * brie test start
     */
    function test_updates_brie_items_before_the_sell_date()
    {
        $items = [new Item("Aged Brie", 10, 15)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals(9, $items[0]->sell_in);
        $this->assertEquals(16, $items[0]->quality);
    }

    function test_updates_brie_items_on_the_sell_date()
    {
        $items = [new Item("Aged Brie", 0, 15)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals(-1, $items[0]->sell_in);
        $this->assertEquals(17, $items[0]->quality);
    }

    function test_updates_brie_items_after_the_sell_date()
    {
        $items = [new Item("Aged Brie", -1, 15)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals(-2, $items[0]->sell_in);
        $this->assertEquals(17, $items[0]->quality);
    }

    function test_updates_brie_items_with_a_maxima_quality()
    {
        $items = [new Item("Aged Brie", 1, 50)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals(0, $items[0]->sell_in);
        $this->assertEquals(50, $items[0]->quality);
    }

    function test_updates_brie_items_after_the_sell_date_near_a_maxima_quality()
    {
        $items = [new Item("Aged Brie", 0, 49)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals(-1, $items[0]->sell_in);
        $this->assertEquals(50, $items[0]->quality);
    }

    /**
     * Sulfuras test start
     */
    function test_updates_sulfuras_items_before_the_sell_date()
    {
        $items = [new Item("Sulfuras, Hand of Ragnaros", 10, 15)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals(10, $items[0]->sell_in);
        $this->assertEquals(15, $items[0]->quality);
    }

    function test_updates_sulfuras_items_on_the_sell_date()
    {
        $items = [new Item("Sulfuras, Hand of Ragnaros", 0, 15)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals(0, $items[0]->sell_in);
        $this->assertEquals(15, $items[0]->quality);
    }

    function test_updates_sulfuras_items_after_the_sell_date()
    {
        $items = [new Item("Sulfuras, Hand of Ragnaros", -1, 15)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals(-1, $items[0]->sell_in);
        $this->assertEquals(15, $items[0]->quality);
    }

    function test_updates_sulfuras_items_with_a_quality_0()
    {
        $items = [new Item("Sulfuras, Hand of Ragnaros", 1, 0)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals(1, $items[0]->sell_in);
        $this->assertEquals(0, $items[0]->quality);
    }
}

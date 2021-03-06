<?php

namespace App;

class GildedRoseTest extends \PHPUnit\Framework\TestCase
{
    function test_updates_normal_items_before_the_sell_date()
    {
        $items = [new Item( 10, 15)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals(9, $items[0]->sell_in);
        $this->assertEquals(14, $items[0]->quality);
    }


    function test_updates_normal_items_on_the_sell_date()
    {
        $items = [new Item( 0, 15)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals(-1, $items[0]->sell_in);
        $this->assertEquals(13, $items[0]->quality);
    }

    function test_updates_normal_items_after_the_sell_date()
    {
        $items = [new Item( -1, 15)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals(-2, $items[0]->sell_in);
        $this->assertEquals(13, $items[0]->quality);
    }

    function test_updates_normal_items_with_a_quality_0()
    {
        $items = [new Item( 1, 0)];
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
        $items = [new BrieItem( 10, 15)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals(9, $items[0]->sell_in);
        $this->assertEquals(16, $items[0]->quality);
    }

    function test_updates_brie_items_on_the_sell_date()
    {
        $items = [new BrieItem( 0, 15)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals(-1, $items[0]->sell_in);
        $this->assertEquals(17, $items[0]->quality);
    }

    function test_updates_brie_items_after_the_sell_date()
    {
        $items = [new BrieItem( -1, 15)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals(-2, $items[0]->sell_in);
        $this->assertEquals(17, $items[0]->quality);
    }

    function test_updates_brie_items_with_a_maxima_quality()
    {
        $items = [new BrieItem( 1, 50)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals(0, $items[0]->sell_in);
        $this->assertEquals(50, $items[0]->quality);
    }

    function test_updates_brie_items_after_the_sell_date_near_a_maxima_quality()
    {
        $items = [new BrieItem( 0, 49)];
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
        $items = [new SulfuraItem( 10, 15)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals(10, $items[0]->sell_in);
        $this->assertEquals(15, $items[0]->quality);
    }

    function test_updates_sulfuras_items_on_the_sell_date()
    {
        $items = [new SulfuraItem( 0, 15)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals(0, $items[0]->sell_in);
        $this->assertEquals(15, $items[0]->quality);
    }

    function test_updates_sulfuras_items_after_the_sell_date()
    {
        $items = [new SulfuraItem( -1, 15)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals(-1, $items[0]->sell_in);
        $this->assertEquals(15, $items[0]->quality);
    }

    function test_updates_sulfuras_items_with_a_quality_0()
    {
        $items = [new SulfuraItem( 1, 0)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals(1, $items[0]->sell_in);
        $this->assertEquals(0, $items[0]->quality);
    }

    /*
        “Backstage passes”, like aged brie,
        increases in Quality as it’s SellIn value approaches;
        Quality increases by 2 when there are 10 days or less
        and by 3 when there are 5 days or less
        but Quality drops to 0 after the concert
     */
    function test_updates_backstage_items_before_the_sell_date()
    {
        $items = [new BackstageItem( 20, 15)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals(19, $items[0]->sell_in);
        $this->assertEquals(16, $items[0]->quality);
    }

    function test_updates_backstage_items_before_the_sell_date_with_maxima_quality()
    {
        $items = [new BackstageItem( 20, 50)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals(19, $items[0]->sell_in);
        $this->assertEquals(50, $items[0]->quality);
    }

    function test_updates_backstage_items_near_the_sell_date()
    {
        $items = [new BackstageItem( 11, 10)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals(10, $items[0]->sell_in);
        $this->assertEquals(11, $items[0]->quality);
    }

    function test_updates_backstage_items_near_the_sell_date_with_a_near_maxima_quality()
    {
        $items = [new BackstageItem( 10, 49)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals(9, $items[0]->sell_in);
        $this->assertEquals(50, $items[0]->quality);
    }

    function test_updates_backstage_items_vary_close_to_the_sell_date()
    {
        $items = [new BackstageItem( 5, 15)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals(4, $items[0]->sell_in);
        $this->assertEquals(18, $items[0]->quality);
    }

    function test_updates_backstage_items_very_close_to_the_sell_date_with_a_near_maxima_quality()
    {
        $items = [new BackstageItem( 5, 49)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals(4, $items[0]->sell_in);
        $this->assertEquals(50, $items[0]->quality);
    }

    function test_updates_backstage_items_on_the_sell_date()
    {
        $items = [new BackstageItem( 0, 15)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals(-1, $items[0]->sell_in);
        $this->assertEquals(0, $items[0]->quality);
    }

    function test_updates_backstage_items_after_the_sell_date()
    {
        $items = [new BackstageItem( -1, 15)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals(-2, $items[0]->sell_in);
        $this->assertEquals(0, $items[0]->quality);
    }

    /**
     * test for new item Conjured
     */
    function test_updates_conjured_items_before_the_sell_date()
    {
        $items = [new ConjuredItem( 10, 15)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals(9, $items[0]->sell_in);
        $this->assertEquals(13, $items[0]->quality);
    }


    function test_updates_conjured_items_on_the_sell_date()
    {
        $items = [new ConjuredItem( 0, 15)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals(-1, $items[0]->sell_in);
        $this->assertEquals(11, $items[0]->quality);
    }

    function test_updates_conjured_items_after_the_sell_date()
    {
        $items = [new ConjuredItem( -1, 15)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals(-2, $items[0]->sell_in);
        $this->assertEquals(11, $items[0]->quality);
    }

    function test_updates_conjured_items_with_a_quality_0()
    {
        $items = [new ConjuredItem( 1, 0)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals(0, $items[0]->sell_in);
        $this->assertEquals(0, $items[0]->quality);
    }
}

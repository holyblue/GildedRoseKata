<?php

namespace App;

final class GildedRose
{
    private $items = [];

    public function __construct($items)
    {
        $this->items = $items;
    }

    public static function createItem($itemName)
    {
    }

    public function updateQuality()
    {
        foreach ($this->items as $item) {
            switch ($item->name) {
                case 'Sulfuras, Hand of Ragnaros':
                case 'Backstage passes to a TAFKAL80ETC concert':
                case 'Aged Brie':
                    $item->updateQuality();
                    break;
                case 'Conjured':
                    $this->conjuredQualityUpdate($item);
                    break;
                default:
                    $item->updateQuality();
            }
        }
    }

    private function conjuredQualityUpdate(Item $item)
    {
        $item->sell_in -= 1;
        $item->quality -= 2;

        if ($item->sell_in < 0) {
            $item->quality -= 2;
        }

        if ($item->quality < 0) {
            $item->quality = 0;
        }
    }
}


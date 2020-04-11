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
                case 'Aged Brie':
                    $item->updateQuality();
                    break;
                case 'Sulfuras, Hand of Ragnaros':
                    $this->sulfurasQualityUpdate($item);
                    break;
                case 'Backstage passes to a TAFKAL80ETC concert':
                    $this->backstageQualityUpdate($item);
                    break;
                case 'Conjured':
                    $item->conjuredQualityUpdate($item);
                    break;
                default:
                    $item->updateQuality();
            }
        }
    }

    private function brieQualityUpdate($item)
    {
        $item->sell_in -= 1;
        $item->quality += 1;

        if ($item->sell_in < 0) {
            $item->quality += 1;
        }

        if ($item->quality > 50) {
            $item->quality = 50;
        }
    }

    private function sulfurasQualityUpdate($item)
    {
        // do nothing
    }

    private function backstageQualityUpdate($item)
    {
        $item->quality += 1;

        if ($item->sell_in <= 10) {
            $item->quality += 1;
        }

        if ($item->sell_in <= 5) {
            $item->quality += 1;
        }

        if ($item->sell_in <= 0) {
            $item->quality = 0;
        }

        if ($item->quality > 50) {
            $item->quality = 50;
        }

        $item->sell_in -= 1;
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


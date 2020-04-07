<?php

namespace App;

final class GildedRose
{

    private $items = [];

    public function __construct($items)
    {
        $this->items = $items;
    }

    public function updateQuality()
    {
        foreach ($this->items as $item) {
            switch ($item->name) {
                case 'Aged Brie':
                    $this->brieQualityUpdate($item);
                    break;
                case 'Sulfuras, Hand of Ragnaros':
                    $this->sulfurasQualityUpdate($item);
                    break;
                case 'Backstage passes to a TAFKAL80ETC concert':
                    $this->backstageQualityUpdate($item);
                    break;
                default:
                    $this->normalQualityUpdate($item);
            }
        }
    }

    private function normalQualityUpdate(Item $item)
    {
        $item->sell_in -= 1;
        $item->quality -= 1;

        if ($item->sell_in < 0) {
            $item->quality -= 1;
        }

        if ($item->quality < 0) {
            $item->quality = 0;
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
        $item->sell_in -= 1;
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
    }
}


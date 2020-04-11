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
            $item->updateQuality();
        }
    }
}


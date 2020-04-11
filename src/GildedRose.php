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
        $itemList = [
            'Conjured' => ConjuredItem::class
        ];

        return new $itemList[$itemName]();
    }

    public function addItem($item) {
        $this->items[] = $item;
    }

    public function updateQuality()
    {
        foreach ($this->items as $item) {
            $item->updateQuality();
        }
    }
}


<?php


namespace App;


class BrieItem extends Item
{
    public function __construct($sell_in, $quality)
    {
        parent::__construct($sell_in, $quality);
        $this->name = 'Aged Brie';
    }

    public function updateQuality()
    {
        $this->sell_in -= 1;
        $this->quality += 1;

        if ($this->sell_in < 0) {
            $this->quality += 1;
        }

        if ($this->quality > 50) {
            $this->quality = 50;
        }
    }
}
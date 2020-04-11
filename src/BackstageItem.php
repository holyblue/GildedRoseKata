<?php


namespace App;


class BackstageItem extends Item
{
    public function updateQuality()
    {
        $this->quality += 1;

        if ($this->sell_in <= 10) {
            $this->quality += 1;
        }

        if ($this->sell_in <= 5) {
            $this->quality += 1;
        }

        if ($this->sell_in <= 0) {
            $this->quality = 0;
        }

        if ($this->quality > 50) {
            $this->quality = 50;
        }

        $this->sell_in -= 1;
    }
}
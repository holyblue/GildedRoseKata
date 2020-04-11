<?php

namespace App;

class Item {

    protected $name;
    public $sell_in;
    public $quality;

    function __construct($sell_in, $quality) {
        $this->name = 'normal';
        $this->sell_in = $sell_in;
        $this->quality = $quality;
    }

    public function __toString() {
        return "{$this->name}, {$this->sell_in}, {$this->quality}";
    }

    public function updateQuality()
    {
        $this->sell_in -= 1;
        $this->quality -= 1;

        if ($this->sell_in < 0) {
            $this->quality -= 1;
        }

        if ($this->quality < 0) {
            $this->quality = 0;
        }
    }
}


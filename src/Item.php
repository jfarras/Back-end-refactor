<?php

namespace Runroom\GildedRose;

class Item {

    public $name;
    public $sell_in;
    public $quality;

    function __construct(string $name, int $sell_in, int $quality) {
        $this->name     = $name;
        $this->sell_in  = $sell_in;
        $this->quality  = $quality;
    }

    public function __toString() {
        return "-{$this->name}, {$this->sell_in}, {$this->quality}<br>";
    }
}
?>
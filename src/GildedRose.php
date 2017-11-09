<?php

namespace Runroom\GildedRose;

class GildedRose {

    private $items;
    const QUALITY_MIN    =   0;
    const QUALITY_MAX    =   50;
    const SELL_IN1       =   6;
    const SELL_IN2       =   11;


    function __construct($items) {
        $this->items = $items;
    }
   
    function update_quality() {
        foreach ($this->items as $item) {

            if ($item->name != 'Aged Brie' and $item->name != 'Backstage passes to a TAFKAL80ETC concert') {
                if ($item->quality > self::QUALITY_MIN and $item->name != 'Sulfuras, Hand of Ragnaros') $item->quality--; 
           
            } else  if ($item->quality < self::QUALITY_MAX) {
                    $item->quality++;
                    if ($item->name == 'Backstage passes to a TAFKAL80ETC concert') {
                        if ($item->sell_in < self::SELL_IN2 && $item->sell_in < self::SELL_IN1) $item->quality+=2;          
                        else if ($item->sell_in < self::SELL_IN2 && $item->sell_in >= self::SELL_IN1) $item->quality++;

                    }
            }
            
            if ($item->name != 'Sulfuras, Hand of Ragnaros')  $item->sell_in--;
            
            if ($item->sell_in < 0) {
                if ($item->name != 'Aged Brie') {
                    if ($item->name != 'Backstage passes to a TAFKAL80ETC concert') {
                        if ($item->quality > self::QUALITY_MIN and $item->name != 'Sulfuras, Hand of Ragnaros') {
                                $item->quality--;
                        }
                    } else $item->quality = 0;

                } else if ($item->quality < self::QUALITY_MAX) $item->quality++;            
            }
        }
    }
}
?>